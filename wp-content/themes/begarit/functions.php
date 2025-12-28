<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// -------------------------------------------------------------------------------------------
// 1. ПОДКЛЮЧЕНИЕ СТИЛЕЙ И СКРИПТОВ (ОСТАВЛЯЕМ, ЧТОБЫ ДИЗАЙН НЕ СЛОМАЛСЯ)
// -------------------------------------------------------------------------------------------
add_action( 'wp_enqueue_scripts', 'ns_child_enqueue_assets' );
function ns_child_enqueue_assets() {
    // Регистрируем стиль родителя
    if ( ! wp_style_is( 'storefront-style', 'registered' ) ) {
        wp_register_style(
            'storefront-style',
            get_template_directory_uri() . '/style.css',
            array(),
            wp_get_theme( 'storefront' )->get( 'Version' )
        );
    }

    // Подключаем стиль родителя
    wp_enqueue_style( 'storefront-style' );

    // Подключаем стиль дочерней темы
    wp_enqueue_style(
        'ns-child-style',
        get_stylesheet_uri(),
        array( 'storefront-style' ),
        file_exists( get_stylesheet_directory() . '/style.css' ) ? filemtime( get_stylesheet_directory() . '/style.css' ) : wp_get_theme()->get( 'Version' )
    );

    // Подключаем JS скрипты темы
    if ( file_exists( get_stylesheet_directory() . '/assets/js/script.js' ) ) {
        wp_enqueue_script(
            'ns-child-script',
            get_stylesheet_directory_uri() . '/assets/js/script.js',
            array( 'jquery' ),
            filemtime( get_stylesheet_directory() . '/assets/js/script.js' ),
            true
        );
    }

    if ( file_exists( get_stylesheet_directory() . '/assets/js/filter.js' ) ) {
        wp_enqueue_script(
            'ns-child-filter',
            get_stylesheet_directory_uri() . '/assets/js/filter.js',
            array(),
            filemtime( get_stylesheet_directory() . '/assets/js/filter.js' ),
            true
        );
    }
}

// -------------------------------------------------------------------------------------------
// 2. ТЕМНАЯ/СВЕТЛАЯ ТЕМА (ОСТАВЛЯЕМ, ЭТО НЕ ВЛИЯЕТ НА ОПЛАТУ)
// -------------------------------------------------------------------------------------------
/* function add_theme_loader_script() {
  echo '<script>
  (function() {
    try {
      // 1. Если в памяти ничего нет ("theme" не найдена), считаем, что это "light"
      var savedTheme = localStorage.getItem("theme") || "light";

      if (savedTheme === "dark") {
        document.body.classList.add("dark");
        document.body.classList.remove("light");
      } else {
        // Во всех остальных случаях (light или первый заход)
        document.body.classList.add("light");
        document.body.classList.remove("dark");
      }
    } catch (e) {
      // При любой ошибке ставим светлую
      document.body.classList.add("light");
    }
  })();
  </script>';
}
add_action( 'wp_body_open', 'add_theme_loader_script' ); */

// -------------------------------------------------------------------------------------------
// ВСЁ ОСТАЛЬНОЕ (РЕДИРЕКТЫ, ФУНКЦИИ ТОВАРОВ) УДАЛЕНО
// -------------------------------------------------------------------------------------------