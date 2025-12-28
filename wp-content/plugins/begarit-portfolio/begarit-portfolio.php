<?php
/*
Plugin Name: Begarit Portfolio Manager
Description: Плагин для управления карточками проектов, метриками и таблицами на странице портфолио.
Version: 1.0
Author: Begarit Studio
*/

// 1. Регистрация типа записи "Проект"
add_action('init', 'begarit_register_portfolio_cpt');
function begarit_register_portfolio_cpt() {
    register_post_type('portfolio_project', [
        'labels' => [
            'name' => 'Проекты',
            'singular_name' => 'Проект',
            'add_new' => 'Добавить проект',
            'add_new_item' => 'Добавить новый проект',
            'edit_item' => 'Редактировать проект',
        ],
        'public' => true,
        'menu_icon' => 'dashicons-grid-view',
        'supports' => ['title', 'thumbnail', 'editor'], // title=Название, thumbnail=Обложка, editor=Описание (О проекте)
        'rewrite' => ['slug' => 'project'],
    ]);
}

// 2. Добавление полей (Meta Boxes)
add_action('add_meta_boxes', 'begarit_add_meta_boxes');
function begarit_add_meta_boxes() {
    add_meta_box('begarit_project_details', 'Настройки карточки и Инфо', 'begarit_render_details_box', 'portfolio_project', 'normal', 'high');
    add_meta_box('begarit_project_metrics', 'Метрики успеха', 'begarit_render_metrics_box', 'portfolio_project', 'normal', 'high');
    add_meta_box('begarit_project_gallery', 'Галерея (Аккордеон)', 'begarit_render_gallery_box', 'portfolio_project', 'normal', 'high');
    add_meta_box('begarit_project_table', 'Таблица: Результаты в цифрах', 'begarit_render_table_box', 'portfolio_project', 'normal', 'high');
}

// Рендер блока деталей
function begarit_render_details_box($post) {
    $type = get_post_meta($post->ID, '_bg_type', true);
    $tags = get_post_meta($post->ID, '_bg_tags', true); // Храним как строку через запятую
    $short_desc = get_post_meta($post->ID, '_bg_short_desc', true);
    $client = get_post_meta($post->ID, '_bg_client', true);
    $year = get_post_meta($post->ID, '_bg_year', true);
    
    wp_nonce_field('begarit_save_portfolio', 'begarit_portfolio_nonce');
    ?>
    <style>
        .bg-row { margin-bottom: 15px; }
        .bg-row label { display: block; font-weight: bold; margin-bottom: 5px; }
        .bg-row input[type="text"], .bg-row textarea { width: 100%; }
    </style>
    <div class="bg-row">
        <label>Тип проекта (Категория)</label>
        <input type="text" name="bg_type" value="<?php echo esc_attr($type); ?>" placeholder="Например: Финтех / Приложение">
    </div>
    <div class="bg-row">
        <label>Теги (через запятую)</label>
        <input type="text" name="bg_tags" value="<?php echo esc_attr($tags); ?>" placeholder="UX Research, Mobile App, Design System">
    </div>
    <div class="bg-row">
        <label>Краткое описание (для превью карточки)</label>
        <textarea name="bg_short_desc" rows="3"><?php echo esc_textarea($short_desc); ?></textarea>
    </div>
    <div class="bg-row" style="display:flex; gap:20px;">
        <div style="flex:1;">
            <label>Клиент</label>
            <input type="text" name="bg_client" value="<?php echo esc_attr($client); ?>">
        </div>
        <div style="flex:1;">
            <label>Год</label>
            <input type="text" name="bg_year" value="<?php echo esc_attr($year); ?>">
        </div>
    </div>
    <?php
}

// Рендер блока метрик (Повторитель)
function begarit_render_metrics_box($post) {
    $metrics = get_post_meta($post->ID, '_bg_metrics', true);
    if (!is_array($metrics)) $metrics = [];
    ?>
    <div id="bg-metrics-wrapper">
        <?php foreach ($metrics as $metric) : ?>
            <div class="bg-metric-row" style="margin-bottom:10px; display:flex; gap:10px;">
                <input type="text" name="bg_metrics[]" value="<?php echo esc_attr($metric); ?>" style="flex:1;" placeholder="Например: +40% Retention">
                <button type="button" class="button remove-row">✕</button>
            </div>
        <?php endforeach; ?>
    </div>
    <button type="button" class="button button-primary" id="add-metric">Добавить метрику</button>
    
    <script>
    jQuery(document).ready(function($){
        $('#add-metric').click(function(){
            $('#bg-metrics-wrapper').append('<div class="bg-metric-row" style="margin-bottom:10px; display:flex; gap:10px;"><input type="text" name="bg_metrics[]" style="flex:1;" placeholder="Новая метрика"><button type="button" class="button remove-row">✕</button></div>');
        });
        $(document).on('click', '.remove-row', function(){ $(this).parent().remove(); });
    });
    </script>
    <?php
}

// Рендер блока Галереи (Повторитель картинок)
function begarit_render_gallery_box($post) {
    $gallery = get_post_meta($post->ID, '_bg_gallery', true);
    if (!is_array($gallery)) $gallery = [];
    ?>
    <div id="bg-gallery-wrapper">
        <p><i>Первая картинка будет открываться по умолчанию.</i></p>
        <ul id="bg-gallery-list" style="margin-bottom: 15px;">
            <?php foreach ($gallery as $img_url) : ?>
                <li style="display:flex; gap:10px; align-items:center; margin-bottom:5px;">
                    <img src="<?php echo esc_url($img_url); ?>" style="width:50px; height:50px; object-fit:cover; border-radius:4px;">
                    <input type="text" name="bg_gallery[]" value="<?php echo esc_url($img_url); ?>" style="flex:1;">
                    <button type="button" class="button remove-img">✕</button>
                </li>
            <?php endforeach; ?>
        </ul>
        <button type="button" class="button" id="add-gallery-img">Добавить картинку</button>
    </div>
    <script>
    jQuery(document).ready(function($){
        var frame;
        $('#add-gallery-img').click(function(e){
            e.preventDefault();
            if (frame) { frame.open(); return; }
            frame = wp.media({
                title: 'Выберите картинку для галереи',
                button: { text: 'Добавить в галерею' },
                multiple: false
            });
            frame.on('select', function(){
                var attachment = frame.state().get('selection').first().toJSON();
                $('#bg-gallery-list').append('<li style="display:flex; gap:10px; align-items:center; margin-bottom:5px;"><img src="'+attachment.url+'" style="width:50px; height:50px; object-fit:cover; border-radius:4px;"><input type="text" name="bg_gallery[]" value="'+attachment.url+'" style="flex:1;"><button type="button" class="button remove-img">✕</button></li>');
            });
            frame.open();
        });
        $(document).on('click', '.remove-img', function(){ $(this).closest('li').remove(); });
    });
    </script>
    <?php
}

// Рендер блока Таблицы (Повторитель 3 колонок)
function begarit_render_table_box($post) {
    $table = get_post_meta($post->ID, '_bg_table', true);
    if (!is_array($table)) $table = [];
    ?>
    <div id="bg-table-wrapper">
        <div style="display:flex; font-weight:bold; margin-bottom:10px;">
            <div style="flex:2; padding-right:10px;">Метрика</div>
            <div style="flex:1; padding-right:10px;">До</div>
            <div style="flex:1; padding-right:10px;">После (Зеленый график)</div>
            <div style="width:30px;"></div>
        </div>
        <div id="bg-table-rows">
            <?php foreach ($table as $row) : ?>
                <div class="bg-table-row" style="display:flex; margin-bottom:10px;">
                    <input type="text" name="bg_table_metric[]" value="<?php echo esc_attr($row['metric']); ?>" style="flex:2; margin-right:10px;" placeholder="Название метрики">
                    <input type="text" name="bg_table_before[]" value="<?php echo esc_attr($row['before']); ?>" style="flex:1; margin-right:10px;" placeholder="Было">
                    <input type="text" name="bg_table_after[]" value="<?php echo esc_attr($row['after']); ?>" style="flex:1; margin-right:10px;" placeholder="Стало">
                    <button type="button" class="button remove-row">✕</button>
                </div>
            <?php endforeach; ?>
        </div>
        <button type="button" class="button button-primary" id="add-table-row">Добавить строку</button>
    </div>
    <script>
    jQuery(document).ready(function($){
        $('#add-table-row').click(function(){
            $('#bg-table-rows').append('<div class="bg-table-row" style="display:flex; margin-bottom:10px;"><input type="text" name="bg_table_metric[]" style="flex:2; margin-right:10px;" placeholder="Название метрики"><input type="text" name="bg_table_before[]" style="flex:1; margin-right:10px;" placeholder="Было"><input type="text" name="bg_table_after[]" style="flex:1; margin-right:10px;" placeholder="Стало"><button type="button" class="button remove-row">✕</button></div>');
        });
    });
    </script>
    <?php
}

// 3. Сохранение данных
add_action('save_post', 'begarit_save_portfolio_data');
function begarit_save_portfolio_data($post_id) {
    if (!isset($_POST['begarit_portfolio_nonce']) || !wp_verify_nonce($_POST['begarit_portfolio_nonce'], 'begarit_save_portfolio')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    // Простые поля
    $fields = ['bg_type', 'bg_tags', 'bg_short_desc', 'bg_client', 'bg_year'];
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
        }
    }

    // Метрики (массив)
    if (isset($_POST['bg_metrics'])) {
        $metrics = array_map('sanitize_text_field', $_POST['bg_metrics']);
        update_post_meta($post_id, '_bg_metrics', $metrics);
    } else {
        delete_post_meta($post_id, '_bg_metrics');
    }

    // Галерея (массив ссылок)
    if (isset($_POST['bg_gallery'])) {
        $gallery = array_map('esc_url_raw', $_POST['bg_gallery']);
        update_post_meta($post_id, '_bg_gallery', $gallery);
    } else {
        delete_post_meta($post_id, '_bg_gallery');
    }

    // Таблица (сложный массив)
    if (isset($_POST['bg_table_metric'])) {
        $table_data = [];
        $metrics = $_POST['bg_table_metric'];
        $befores = $_POST['bg_table_before'];
        $afters = $_POST['bg_table_after'];
        
        for ($i = 0; $i < count($metrics); $i++) {
            if (!empty($metrics[$i])) {
                $table_data[] = [
                    'metric' => sanitize_text_field($metrics[$i]),
                    'before' => sanitize_text_field($befores[$i]),
                    'after' => sanitize_text_field($afters[$i]),
                ];
            }
        }
        update_post_meta($post_id, '_bg_table', $table_data);
    } else {
        delete_post_meta($post_id, '_bg_table');
    }
}

// Подключение медиа-загрузчика
add_action('admin_enqueue_scripts', function() {
    wp_enqueue_media();
});
?>