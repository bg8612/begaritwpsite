<?php

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
 

    <style>
.left-nav,nav{display:flex;align-items:center}.site-header-wrapper,.site-header-wrapper:before,.site-header:after{border:none;box-shadow:none;margin:0!important}.site-header{position:sticky;position:-webkit-sticky;top:0;width:100%;z-index:1000;background-color:var(--nav-bg,#fff);box-shadow:var(--box-shadow);padding-top:30px;padding-bottom:30px;transition:padding .3s}#themeButton,.burger-btn{background:0 0;cursor:pointer}@media (max-width:782px){.site-header{padding-top:20px;padding-bottom:20px}}nav{justify-content:space-between;margin-top:0;margin-bottom:0;height:77px}.right-nav a{background-color:var(--button-bg);color:var(--text-botton-color);padding:9px 27px;border-radius:10px}.left-nav{gap:50px}.left-nav ul,.right-nav{align-items:center;display:flex}.left-nav svg{padding-right:10px}.left-nav ul{gap:50px;margin:0}.left-nav ul li a{text-decoration:none;color:var(--text-color);font-size:16px;font-weight:500}.right-nav{gap:20px}.left-nav h1,.mm-header h1{align-items:center;margin:0}.left-nav h1{display:flex;font-size:28px;font-family:SF-Pro-Display-Bold,sans-serif;color:var(--text-color)}.mm-header h1,.mm-links a{font-size:24px;color:#000}#themeButton{border:none;padding:0}.right-nav .header-avatar-link{background-color:transparent;padding:0;border-radius:50%}.right-nav .header-avatar-link .avatar{width:57px;height:57px;border-radius:50%;object-fit:cover;display:block}.burger-btn{display:none;border:none;padding:5px;z-index:1001}#mobileMenu>div.mm-header>button>svg,.mobile-menu-overlay{background-color:#fff}.burger-icon{width:24px;height:18px;display:flex;flex-direction:column;justify-content:space-between}.burger-icon span{display:block;width:100%;height:2px;background-color:#000;border-radius:2px}.mobile-menu-overlay{position:fixed;top:0;left:0;width:100%;height:100%;height:100dvh;z-index:2000;transform:translateX(-100%);transition:transform .3s cubic-bezier(.4, 0, .2, 1);display:flex;flex-direction:column;overflow-y:auto}.mobile-menu-overlay.active{transform:translateX(0)}.mm-header{display:flex;justify-content:space-between;align-items:center;padding:40px 30px 20px}.mm-header h1{display:flex;gap:10px}.mm-close-btn{background:0 0;border:none;cursor:pointer;padding:0;display:flex;align-items:center;justify-content:center;color:#000}.mm-links{flex-grow:1;padding:20px 30px;list-style:none;margin:0;display:flex;flex-direction:column;gap:20px}.mm-auth-btn,.mm-links a{display:block;text-decoration:none}.mm-footer{padding:30px 30px 50px;margin-top:auto;padding-bottom:calc(30px + env(safe-area-inset-bottom))}.mm-auth-btn{width:100%;background-color:#000;color:#fff;text-align:center;padding:12px 0;border-radius:10px;font-size:18px}.mm-user-profile{display:flex;align-items:center;justify-content:space-between;padding-top:10px}.mm-user-info{display:flex;align-items:center;gap:25px;text-decoration:none;color:inherit}.mm-user-info .avatar{width:57px;height:57px;border-radius:50%;object-fit:cover}.mm-user-details{display:flex;flex-direction:column}.mm-user-name{font-size:18px;color:#000;line-height:1.2}.mm-user-role{font-size:16px;color:#666;margin-top:5px}.mm-logout-link{color:#000;padding:8px;display:flex}@media (max-width:992px){.site-header{position:relative!important;top:auto!important;left:auto!important;transform:none!important;height:auto!important;padding-top:20px;padding-bottom:20px}body{padding-top:0!important}.site-header+.container{margin-top:20px!important}#themeButton,.left-nav ul,.right-nav .header-avatar-link,.right-nav a{display:none!important}.burger-btn{display:block}.container{padding:0 20px}}body>header>div.container>nav>div.right-nav>button.burger-btn>div>span{background-color:var(--burder-mune-span)}body>header>div.container>nav>div.right-nav>button.burger-btn:hover{background-color:var(--button)} 
    </style>


    <header class="site-header">

        <div class="container">

            <nav>
                <div class="left-nav">
                    <a href="https://www.begarit-studio.ru"><h1>

                        <svg class="dark-svg" width="37" height="39" viewBox="0 0 37 39" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M27.6689 2.51855C27.9318 2.17822 28.4763 2.3639 28.4766 2.79395V23.4688C28.4766 27.3281 25.6629 30.5416 21.9414 31.2373C21.8066 31.2626 21.6876 31.3445 21.6201 31.4639L21.043 32.4844C20.9567 32.6369 20.9667 32.8261 21.0684 32.9688L24.333 37.5488C24.4177 37.6674 24.5545 37.7383 24.7002 37.7383H26.7871C27.1152 37.7383 27.4121 37.879 27.627 38.1074C27.7458 38.2338 27.8394 38.3871 27.8994 38.5576C27.982 38.7925 27.7724 38.9999 27.5234 39H24.0391C23.8932 39 23.7565 38.9293 23.6719 38.8105L18.5088 31.5664C18.4242 31.4478 18.2872 31.3771 18.1416 31.377H15.2295C15.067 31.377 14.9169 31.465 14.8369 31.6064L14.3408 32.4844C14.2546 32.6369 14.2636 32.8261 14.3652 32.9688L17.6299 37.5488C17.7145 37.6675 17.8514 37.7382 17.9971 37.7383H20.085C20.4129 37.7383 20.709 37.8792 20.9238 38.1074C21.0427 38.2338 21.1372 38.3871 21.1973 38.5576C21.2797 38.7923 21.0701 38.9997 20.8213 39H17.3369C17.1911 39 17.0534 38.9293 16.9688 38.8105L11.8057 31.5664C11.7211 31.4478 11.584 31.3765 11.4385 31.3828C8.25431 31.5215 5.91606 34.4906 6.5791 37.6455C6.63105 37.8927 6.69237 38.1479 6.76367 38.4111C6.84319 38.7047 6.62643 39 6.32227 39H0.451172C0.0769744 38.9997 -0.133858 38.5698 0.0947266 38.2734L5.41309 31.377L27.6689 2.51855ZM36.1514 0C36.5258 0 36.7374 0.430045 36.5088 0.726562L30.624 8.3584C30.3612 8.69916 29.8156 8.51327 29.8154 8.08301V2.36621C29.8154 1.05991 30.8933 5.4258e-05 32.2227 0H36.1514Z"
                                fill="black" />
                        </svg>
                        <svg class="light-svg" width="37" height="39" viewBox="0 0 37 39" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M27.6689 2.51855C27.9318 2.17822 28.4763 2.3639 28.4766 2.79395V23.4688C28.4766 27.3281 25.6629 30.5416 21.9414 31.2373C21.8066 31.2626 21.6876 31.3445 21.6201 31.4639L21.043 32.4844C20.9567 32.6369 20.9667 32.8261 21.0684 32.9688L24.333 37.5488C24.4177 37.6674 24.5545 37.7383 24.7002 37.7383H26.7871C27.1152 37.7383 27.4121 37.879 27.627 38.1074C27.7458 38.2338 27.8394 38.3871 27.8994 38.5576C27.982 38.7925 27.7724 38.9999 27.5234 39H24.0391C23.8932 39 23.7565 38.9293 23.6719 38.8105L18.5088 31.5664C18.4242 31.4478 18.2872 31.3771 18.1416 31.377H15.2295C15.067 31.377 14.9169 31.465 14.8369 31.6064L14.3408 32.4844C14.2546 32.6369 14.2636 32.8261 14.3652 32.9688L17.6299 37.5488C17.7145 37.6675 17.8514 37.7382 17.9971 37.7383H20.085C20.4129 37.7383 20.709 37.8792 20.9238 38.1074C21.0427 38.2338 21.1372 38.3871 21.1973 38.5576C21.2797 38.7923 21.0701 38.9997 20.8213 39H17.3369C17.1911 39 17.0534 38.9293 16.9688 38.8105L11.8057 31.5664C11.7211 31.4478 11.584 31.3765 11.4385 31.3828C8.25431 31.5215 5.91606 34.4906 6.5791 37.6455C6.63105 37.8927 6.69237 38.1479 6.76367 38.4111C6.84319 38.7047 6.62643 39 6.32227 39H0.451172C0.0769744 38.9997 -0.133858 38.5698 0.0947266 38.2734L5.41309 31.377L27.6689 2.51855ZM36.1514 0C36.5258 0 36.7374 0.430045 36.5088 0.726562L30.624 8.3584C30.3612 8.69916 29.8156 8.51327 29.8154 8.08301V2.36621C29.8154 1.05991 30.8933 5.4258e-05 32.2227 0H36.1514Z"
                                fill="white" />
                        </svg>

                        Begarit
                    </h1></a>
                    <ul>
                        <li><a href="https://www.begarit-studio.ru/registration-applications/?service_name=GeneralApplicationFormat">Связаться с нами</a></li>
                        <li><a href="https://www.begarit-studio.ru/#studio-steck">Инструменты</a></li>
                        <li><a href="https://t.me/begaritstudio" target="_blank">Поддержка</a></li>
                        <li><a href="https://www.begarit-studio.ru/#service">К товарам</a></li>
                    </ul>
                </div>
                <div class="right-nav">
                    <button id="themeButton">

                        <svg class="dark-svg" width="28" height="28" viewBox="0 0 28 28" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M24.8933 20.8541C24.6639 20.866 24.4472 20.866 24.2177 20.866C20.5086 20.866 17.0162 19.5133 14.3904 17.0472C11.7647 14.5811 10.3244 11.3009 10.3244 7.81729C10.3244 5.83004 10.796 3.91463 11.6755 2.17878C12.0706 1.41262 12.5422 0.682366 13.0903 0C12.1216 0.0957707 11.1912 0.287311 10.2862 0.550681C4.32096 2.32244 0 7.55392 0 13.7431C0 21.3808 6.58978 27.57 14.7218 27.57C19.2212 27.57 23.2363 25.6785 25.9385 22.6977C26.5503 22.0153 27.1111 21.2731 27.57 20.483C26.7033 20.6865 25.811 20.8182 24.8933 20.8541ZM14.7218 25.6546C7.72419 25.6546 2.03939 20.3154 2.03939 13.7431C2.03939 9.06231 4.92003 5.01599 9.10078 3.06466C8.56544 4.56108 8.28502 6.15327 8.28502 7.81729C8.28502 15.7064 14.7856 22.1709 23.0196 22.7455C20.8018 24.5652 17.8956 25.6546 14.7218 25.6546Z"
                                fill="black" />
                        </svg>
                        <svg class="light-svg" width="28" height="28" viewBox="0 0 28 28"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_1776_32150)">
                                <path
                                    d="M13.7785 2.75451V0.917969M13.7785 26.6299V24.7934M24.8051 13.774H26.6429M2.75183 13.774H0.914062M4.5896 4.59104L2.75183 2.75451M24.8051 2.75451L22.9673 4.59104M4.5896 22.9568L2.75183 24.7934M24.8051 24.7934L22.9673 22.9568M19.2918 13.774C19.2918 16.8172 16.8236 19.2837 13.7785 19.2837C10.7333 19.2837 8.26515 16.8172 8.26515 13.774C8.26515 10.7308 10.7333 8.26423 13.7785 8.26423C16.8236 8.26423 19.2918 10.7308 19.2918 13.774Z"
                                    stroke="white" stroke-width="1.83777" stroke-linecap="square" />
                            </g>
                            <defs>
                                <clipPath id="clip0_1776_32150">
                                    <rect width="28" height="28" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>

                    </button>

                    
                    <?php
                    // Проверяем, авторизован ли пользователь
                    if ( is_user_logged_in() ) {
                        // --- Пользователь АВТОРИЗОВАН ---
                        
                        // Получаем URL страницы "Мой аккаунт" WooCommerce
                        $myaccount_url = get_permalink( get_option( 'woocommerce_myaccount_page_id' ) );
                        
                        // Получаем текущего пользователя
                        $current_user = wp_get_current_user();
                        ?>
                        
                        <a href="<?php echo esc_url( $myaccount_url ); ?>" class="header-avatar-link">
                            <?php 
                            // Выводим аватар. 
                            // Функция get_avatar( $user_id, $size )
                            // Плагин "Customize My Account Page" должен автоматически 
                            // подменить стандартный Gravatar на загруженное изображение.
                            echo get_avatar( $current_user->ID, 57 ); 
                            ?>
                        </a>

                        <?php
                    } else {
                        // --- Пользователь НЕ АВТОРИЗОВАН ---
                        
                        // Получаем URL страницы "Мой аккаунт" (страница входа/регистрации)
                        $myaccount_url = get_permalink( get_option( 'woocommerce_myaccount_page_id' ) );
                        ?>
                        
                        <a href="<?php echo esc_url( $myaccount_url ); ?>">Войти</a>
                        
                        <?php
                    }
                    ?>
                  
                  	<!-- Вставь это внутри <div class="right-nav">, перед закрывающим </div> -->
					<button class="burger-btn" onclick="openMenu()">
					    <div class="burger-icon">
				        <span></span>
          				<span></span>
				        <span></span>
					    </div>
					</button>

                </div>
            </nav>
        </div>
      
      
      	<!-- МОБИЛЬНОЕ МЕНЮ (Вставить перед закрытием header) -->
<div class="mobile-menu-overlay" id="mobileMenu">
    
    <!-- Шапка меню -->
    <div class="mm-header">
        <h1>
             <!-- Тот же SVG логотип, что и в шапке -->
             <svg width="37" height="39" viewBox="0 0 37 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M27.6689 2.51855C27.9318 2.17822 28.4763 2.3639 28.4766 2.79395V23.4688C28.4766 27.3281 25.6629 30.5416 21.9414 31.2373C21.8066 31.2626 21.6876 31.3445 21.6201 31.4639L21.043 32.4844C20.9567 32.6369 20.9667 32.8261 21.0684 32.9688L24.333 37.5488C24.4177 37.6674 24.5545 37.7383 24.7002 37.7383H26.7871C27.1152 37.7383 27.4121 37.879 27.627 38.1074C27.7458 38.2338 27.8394 38.3871 27.8994 38.5576C27.982 38.7925 27.7724 38.9999 27.5234 39H24.0391C23.8932 39 23.7565 38.9293 23.6719 38.8105L18.5088 31.5664C18.4242 31.4478 18.2872 31.3771 18.1416 31.377H15.2295C15.067 31.377 14.9169 31.465 14.8369 31.6064L14.3408 32.4844C14.2546 32.6369 14.2636 32.8261 14.3652 32.9688L17.6299 37.5488C17.7145 37.6675 17.8514 37.7382 17.9971 37.7383H20.085C20.4129 37.7383 20.709 37.8792 20.9238 38.1074C21.0427 38.2338 21.1372 38.3871 21.1973 38.5576C21.2797 38.7923 21.0701 38.9997 20.8213 39H17.3369C17.1911 39 17.0534 38.9293 16.9688 38.8105L11.8057 31.5664C11.7211 31.4478 11.584 31.3765 11.4385 31.3828C8.25431 31.5215 5.91606 34.4906 6.5791 37.6455C6.63105 37.8927 6.69237 38.1479 6.76367 38.4111C6.84319 38.7047 6.62643 39 6.32227 39H0.451172C0.0769744 38.9997 -0.133858 38.5698 0.0947266 38.2734L5.41309 31.377L27.6689 2.51855ZM36.1514 0C36.5258 0 36.7374 0.430045 36.5088 0.726562L30.624 8.3584C30.3612 8.69916 29.8156 8.51327 29.8154 8.08301V2.36621C29.8154 1.05991 30.8933 5.4258e-05 32.2227 0H36.1514Z" fill="black" />
            </svg>
            Begarit
        </h1>
        <button class="mm-close-btn" onclick="closeMenu()">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M15 18l-6-6 6-6"/>
            </svg>
        </button>
    </div>

    <!-- Ссылки -->
    <ul class="mm-links">
                       <li><a href="https://www.begarit-studio.ru/registration-applications/?service_name=Общий формат заявки">Связаться с нами</a></li>
                      
                        <li><a href="https://t.me/begaritstudio" target="_blank">Поддержка</a></li>
    </ul>

    <!-- Футер меню (Логика авторизации) -->
    <div class="mm-footer">
        <?php if ( is_user_logged_in() ) : 
            $current_user = wp_get_current_user();
            $user_role = !empty($current_user->roles) ? $current_user->roles[0] : 'user';
            $myaccount_url = get_permalink( get_option( 'woocommerce_myaccount_page_id' ) );
        ?>
            <!-- Если вошел -->
            <div class="mm-user-profile">
                <a href="<?php echo esc_url($myaccount_url); ?>" class="mm-user-info">
                    <?php echo get_avatar( $current_user->ID, 50, '', '', ['class' => 'avatar'] ); ?>
                    <div class="mm-user-details">
                        <span class="mm-user-name"><?php echo esc_html( $current_user->display_name ); ?></span>
                        <span class="mm-user-role"><?php echo esc_html( $user_role ); ?></span>
                    </div>
                </a>
                <a href="<?php echo wp_logout_url( home_url() ); ?>" class="mm-logout-link">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                        <polyline points="16 17 21 12 16 7"></polyline>
                        <line x1="21" y1="12" x2="9" y2="12"></line>
                    </svg>
                </a>
            </div>
        <?php else : 
            $myaccount_url = get_permalink( get_option( 'woocommerce_myaccount_page_id' ) );
        ?>
            <!-- Если гость -->
            <a href="<?php echo esc_url( $myaccount_url ); ?>" class="mm-auth-btn">Войти</a>
        <?php endif; ?>
    </div>
</div>

<script>
    function openMenu() {
        // Открываем меню
        document.getElementById('mobileMenu').classList.add('active');
        
        // Блокируем скролл на HTML и BODY
        document.body.classList.add('no-scroll');
        document.documentElement.classList.add('no-scroll');
    }

    function closeMenu() {
        // Закрываем меню
        document.getElementById('mobileMenu').classList.remove('active');
        
        // Возвращаем скролл
        document.body.classList.remove('no-scroll');
        document.documentElement.classList.remove('no-scroll');
    }
</script>
      
    </header>


    <div class="container">
    </div>