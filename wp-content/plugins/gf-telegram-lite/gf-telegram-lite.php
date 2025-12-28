<?php
/**
 * Plugin Name: Gravity Forms Telegram Pro
 * Description: Отправка уведомлений в Telegram. Простое указание получателей через запятую.
 * Version: 3.3
 * Author: Begarit Studio
 * Text Domain: gf-telegram-pro
 */

defined( 'ABSPATH' ) || die();

define( 'GF_TELEGRAM_PRO_VERSION', '3.3' );

add_action( 'gform_loaded', array( 'GF_Telegram_Pro_Bootstrap', 'load' ), 5 );

class GF_Telegram_Pro_Bootstrap {
    public static function load() {
        if ( ! method_exists( 'GFForms', 'include_addon_framework' ) ) {
            return;
        }
        GFForms::include_addon_framework();
        return GF_Telegram_Pro::get_instance();
    }
}

if ( class_exists( 'GFAddOn' ) ) {
    class GF_Telegram_Pro extends GFAddOn {

        protected $_version = GF_TELEGRAM_PRO_VERSION;
        protected $_min_gravityforms_version = '2.5';
        protected $_slug = 'gf-telegram-pro';
        protected $_path = 'gf-telegram-pro/gf-telegram-pro.php';
        protected $_full_path = __FILE__;
        protected $_title = 'Telegram Settings';
        protected $_short_title = 'Telegram';

        private static $_instance = null;

        public static function get_instance() {
            if ( self::$_instance == null ) {
                self::$_instance = new GF_Telegram_Pro();
            }
            return self::$_instance;
        }

        public function init() {
            parent::init();
            add_action( 'gform_after_submission', array( $this, 'process_submission' ), 10, 2 );
        }

        /**
         * 1. НАСТРОЙКИ ИНТЕРФЕЙСА
         */
        public function plugin_settings_fields() {
            return array(
                array(
                    'title'  => esc_html__( 'Подключение бота', 'gf-telegram-pro' ),
                    'fields' => array(
                        array(
                            'name'    => 'tg_bot_token',
                            'label'   => esc_html__( 'Bot Token', 'gf-telegram-pro' ),
                            'type'    => 'text',
                            'class'   => 'large',
                            'tooltip' => esc_html__( 'Токен от @BotFather', 'gf-telegram-pro' ),
                        ),
                        // Вернули стандартное текстовое поле
                        array(
                            'name'        => 'tg_chat_ids',
                            'label'       => esc_html__( 'Получатели (Chat ID)', 'gf-telegram-pro' ),
                            'type'        => 'text', 
                            'class'       => 'large',
                            'placeholder' => '12345678, 87654321',
                            'description' => esc_html__( 'Введите ID чатов через запятую. Например: 12345678, -987654321', 'gf-telegram-pro' ),
                        ),
                    ),
                ),
                array(
                    'title'  => esc_html__( 'Редактор сообщений', 'gf-telegram-pro' ),
                    'fields' => array(
                        array(
                            'name'        => 'tg_message_template',
                            'label'       => esc_html__( 'Шаблон сообщения', 'gf-telegram-pro' ),
                            'type'        => 'textarea',
                            'class'       => 'large',
                            'allow_html'  => true, 
                            'description' => 'Переменные:<br><code>{form_title}</code>, <code>{date}</code>, <code>{all_fields}</code>, <code>{entry_id}</code>',
                            'default_value' => "🔔 <b>Новая заявка:</b> {form_title}\n\n{all_fields}\n\n📅 Дата: {date}",
                        ),
                    ),
                ),
            );
        }

        /**
         * 2. ОБРАБОТКА И ОТПРАВКА
         */
        public function process_submission( $entry, $form ) {
            $settings = $this->get_plugin_settings();
            $token    = rgar( $settings, 'tg_bot_token' );
            $chat_ids_str = rgar( $settings, 'tg_chat_ids' ); // Получаем строку
            $template = rgar( $settings, 'tg_message_template' );

            if ( empty( $token ) || empty( $chat_ids_str ) ) {
                return;
            }

            // Разбиваем строку по запятой и чистим от пробелов
            $chat_ids = explode( ',', $chat_ids_str );
            
            // Очистка массива ID
            $clean_ids = array();
            foreach ( $chat_ids as $id ) {
                $trimmed = trim( $id );
                // Разрешаем цифры и знак минуса (для групп)
                if ( ! empty( $trimmed ) && ( is_numeric( $trimmed ) || preg_match('/^-?\d+$/', $trimmed) ) ) {
                    $clean_ids[] = $trimmed;
                }
            }
            // Убираем дубликаты
            $clean_ids = array_unique( $clean_ids );

            if ( empty( $clean_ids ) ) return;

            // --- Сборка контента ---
            $fields_content = '';
            foreach ( $form['fields'] as $field ) {
                if ( $this->is_field_hidden( $field ) ) continue;

                $value = RGFormsModel::get_lead_field_value( $entry, $field );
                if ( GFCommon::is_empty_array( $value ) ) continue;

                $display_value = $field->get_value_entry_detail( $value, '', false, 'text' );
                $display_value = strip_tags( $display_value );
                
                // Экранирование спецсимволов (<, >, &) чтобы Telegram не выдавал ошибку 400
                $display_value = html_entity_decode( $display_value, ENT_QUOTES | ENT_HTML5 );
                $display_value = htmlspecialchars( $display_value, ENT_QUOTES | ENT_HTML5 );

                if ( ! empty( $display_value ) ) {
                    $fields_content .= "🔸 <b>" . esc_html( $field->label ) . ":</b> " . $display_value . "\n";
                }
            }

            if ( empty( $template ) ) {
                $template = "🔔 <b>Новая заявка:</b> {form_title}\n\n{all_fields}";
            }

            $message = str_replace( '{form_title}', esc_html( $form['title'] ), $template );
            $message = str_replace( '{date}', date_i18n( 'd.m.Y H:i' ), $message );
            $message = str_replace( '{entry_id}', rgar( $entry, 'id' ), $message );
            $message = str_replace( '{source_url}', rgar( $entry, 'source_url' ), $message );
            $message = str_replace( '{all_fields}', $fields_content, $message );

            // --- Рассылка ---
            foreach ( $clean_ids as $chat_id ) {
                $this->send_telegram( $token, $chat_id, $message );
            }
        }

        private function send_telegram( $token, $chat_id, $text ) {
            $url = "https://api.telegram.org/bot{$token}/sendMessage";
            
            $body = array(
                'chat_id'    => $chat_id,
                'text'       => $text,
                'parse_mode' => 'HTML',
                'disable_web_page_preview' => true
            );

            wp_remote_post( $url, array(
                'body'    => $body,
                'timeout' => 10,
            ));
        }

        private function is_field_hidden( $field ) {
            if ( $field->isHidden ) return true;
            if ( in_array( $field->type, array( 'html', 'captcha', 'page', 'section' ) ) ) return true;
            return false;
        }
    }
}