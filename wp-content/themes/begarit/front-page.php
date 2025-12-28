<?php
get_header(); ?>
<?php if (is_front_page()): ?>


  <main>
    <div class="hero">
      <div class="container">
        <div class="hero-info">
          <p><img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/img/tag.webp'); ?>"><span>Интервью +
              Составление тз</span>Бессплатно</p>
          <h1>Надежно. Просто. <span>Digital.</span></h1>
          <p>Превращаем ваши идеи в эффективные IT-решения. Предлагаем разработку полного цикла: от замысла до готового
            продукта под ключ.</p>
          
          <div class="fedya">
            <a href="#service">К товарам</a>
          </div>
          
        </div>
       </div>
      
    

      <div class="custom-slider-container">
        <div class="vignette vignette-left"></div>
        <div class="vignette vignette-right"></div>
        <div class="custom-slider-wrapper">
          <div class="slide"><img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/img/home-page.webp'); ?>" alt="Описание проекта 1"></div>
          <div class="slide"><img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/img/home.webp'); ?>" alt="Описание проекта 2"></div>
          <div class="slide"><img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/img/invite-our-team.webp'); ?>" alt="Описание проекта 3"></div>
          <div class="slide"><img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/img/mor.webp'); ?>" alt="Описание проекта 4"></div>
          <div class="slide"><img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/img/qBittirent.webp'); ?>" alt="Описание проекта 5"></div>
        </div>
      </div>
    </div>

    <div class="our-service" id="service">
        <div class="container">
          <div class="our-service-info">
            <h1>Наши предложения</h1>
            <p>Посмотрите наши самых востребованные товары</p>
            <a href="https://www.begarit-studio.ru/registration-applications/?service_name=Общий формат заявки">Оставить заявку</a>
          </div>

          <div class="service-card">
            
            <div class="service-card-item" onclick="openSimpleModal('Лэндинги и Визитки', '15 000₽', '1 недели', '<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/gk.webp' ); ?>', 'Разработаем современный сайт для качественной презентации вашего продукта или услуги в интернете. Это эффективный инструмент, который структурированно расскажет о ваших преимуществах и побудит посетителя оставить заявку или связаться с вами.', 'https://www.begarit-studio.ru/registration-applications/?service_name=Лэндинги и Визитки')">
              <div class="card-img" style="background-image: url('<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/gk.webp' ); ?>') ">
                <span>от 1 недели</span>
              </div>
              <div class="service-card-info">
                <h1>Лэндинги и Визитки (Быстрый старт)</h1>
                <div class="service-price">
                  <p>от 15 000₽</p>
                  <span>Подробнее ></span>
                </div>
              </div>
            </div>

            <div class="service-card-item" onclick="openSimpleModal('Интернет-магазины', '25 000₽', '2 недель', '<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/shop.webp' ); ?>', 'Создадим полноценную торговую площадку с удобным каталогом и подключенной системой оплаты. Мы автоматизируем процесс продаж, чтобы ваш бизнес мог принимать заказы круглосуточно и без участия менеджеров.', 'https://www.begarit-studio.ru/registration-applications/?service_name=Интернет-магазины')">
              <div class="card-img" style="background-image: url('<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/shop.webp' ); ?>')">
                <span class="timework">от 2 недель</span>
              </div>
              <div class="service-card-info">
                <h1>Интернет-магазины (E-commerce)</h1>
                <div class="service-price">
                  <p>от 25 000₽</p>
                  <span>Подробнее ></span>
                </div>
              </div>
            </div>

            <div class="service-card-item" onclick="openSimpleModal('Корпоративные сайты', '35 000₽', '3 недель', '<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/corsite.webp' ); ?>', 'Спроектируем масштабный ресурс, который укрепит имидж компании и доверие со стороны партнеров. Сайт станет вашим официальным цифровым офисом, где удобно представлена вся информация о деятельности, услугах и документации бизнеса.', 'https://www.begarit-studio.ru/registration-applications/?service_name=Корпоративные сайты')">
             <div class="card-img" style="background-image: url('<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/corsite.webp' ); ?>')">
                <span class="timework">от 3 недель</span>
              </div>
              <div class="service-card-info">
                <h1>Корпоративные сайты и Порталы</h1>
                <div class="service-price">
                  <p>от 35 000₽</p>
                  <span>Подробнее ></span>
                </div>
              </div>
            </div>
            
            <div class="service-card-item" onclick="openSimpleModal('UI/UX Дизайн', '10 000₽', '1 недели', '<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/uiux.webp' ); ?>', 'Продумаем логику и визуальный стиль сайта так, чтобы пользователю было комфортно с ним взаимодействовать. Грамотный дизайн выделит ваш бренд на фоне конкурентов и сделает путь клиента к покупке интуитивно понятным.', 'https://www.begarit-studio.ru/registration-applications/?service_name=UI/UX Дизайн')">
              <div class="card-img" style="background-image: url('<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/uiux.webp' ); ?>')">
                <span>от 1 недель</span>
              </div>
              <div class="service-card-info">
                <h1>UI/UX Дизайн и Брендинг</h1>
                <div class="service-price">
                  <p>от 10 000₽</p>
                  <span>Подробнее ></span>
                </div>
              </div>
            </div>

           <div class="service-card-item" onclick="openSimpleModal('Маркетинг', '25 000₽', '3 недель', '<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/mr.webp' ); ?>', 'Настроим стратегию привлечения целевой аудитории из поисковых систем и социальных сетей. Мы обеспечим вашему бизнесу видимость в интернете и стабильный поток обращений от людей, заинтересованных в покупке.', 'https://www.begarit-studio.ru/registration-applications/?service_name=Маркетинг')">
              <div class="card-img" style="background-image: url('<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/mr.webp' ); ?>')">
                <span class="timework">от 3 недель</span>
              </div>
              <div class="service-card-info">
                <h1>Маркетинг и Продвижение</h1>
                <div class="service-price">
                  <p>от 25 000₽</p>
                  <span>Подробнее ></span>
                </div>
              </div>
            </div>

           <div class="service-card-item" onclick="openSimpleModal('Техподдержка', '5 000₽', '1 недели', '<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/sup.webp' ); ?>', 'Гарантируем стабильную работу вашего веб-ресурса и своевременное обновление информации. Мы берем на себя полное техническое сопровождение и защиту от сбоев, чтобы ваш сайт всегда был доступен для клиентов.', 'https://www.begarit-studio.ru/registration-applications/?service_name=Техподдержка')">
              <div class="card-img" style="background-image: url('<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/sup.webp' ); ?>')">
                <span class="timework">от 1 недели</span>
              </div>
              <div class="service-card-info">
                <h1>Техподдержка и Сервис</h1>
                <div class="service-price">
                  <p>от 5 000₽</p>
                  <span>Подробнее ></span>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    
      <div class="road-map">
        <div class="container">
          <h1 class="road-map-h1">Путь вашего проекта</h1>
          <div class="parent">
            <div class="div2"style="background-image: url('<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/line.webp' ); ?>');"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/Ellipse1.webp' ); ?>" alt=""></div>
            <div class="div3"style="background-image: url('<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/line.webp' ); ?>');"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/Ellipse2.webp' ); ?>" alt=""></div>
            <div class="div4"style="background-image: url('<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/line.webp' ); ?>');"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/Ellipse2.webp' ); ?>" alt=""></div>
            <div class="div5"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/Ellipse4.webp' ); ?>" alt=""></div>
            <div class="div6">
              <h1>1. Анализ</h1> 
              <p>Погружаемся в ваш бизнес, изучаем цели и аудиторию. Формируем стратегию.</p>
            </div>
            <div class="div7">
              <h1>2. Дизайн</h1>
              <p>Создаем интерактивные прототипы и финализируем UI/UX дизайн. Тестируем на пользователях.</p>
            </div>
            <div class="div8">
              <h1>3. Разработка</h1>
              <p>Пишем код, настраиваем бэкенд и API. Работаем короткими спринтами с регулярными демо.</p>
            </div>
            <div class="div9">
              <h1>4. Запуск</h1>
              <p>Проводим финальное тестирование, разворачиваем проект и передаем вам. Празднуем!</p>
            </div>
            <div class="div10">
               <h1>2. Дизайн</h1>
              <p>Создаем интерактивные прототипы и финализируем UI/UX дизайн. Тестируем на пользователях.</p>
            </div>
            <div class="div11">
              <h1>4. Запуск</h1>
              <p>Проводим финальное тестирование, разворачиваем проект и передаем вам. Празднуем!</p>
            </div>
          </div>
        </div>
      </div>
    
    <div class="container">
      <div class="studio-info" id="studio-steck">
    	<h1>Стек студии</h1>
    	<p>Если вы не нашли в нашем стеке интересующие вас технологии, то свяжитесь с нашей <a href="https://t.me/begaritstudio">поддержкой</a>.</p>  
      </div>
    <div class="table-container">
      
        <table>
            <thead>
                <tr>
                    <th>Категории разработки</th>
                    <th>Технологии и Инструменты</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>UI/UX Дизайн</td>
                    <td>Figma, Framer, Photoshop, Image Generation Models</td>
                </tr>
                <tr>
                    <td>Frontend</td>
                    <td>React, Next.js, Vue.js, Nuxt.js, HTML5, CSS3, Tailwind CSS</td>
                </tr>
                <tr>
                    <td>Backend</td>
                    <td>Node.js (Express), Python (Django/FastAPI), PHP (Laravel)</td>
                </tr>
                <tr>
                    <td>Базы данных</td>
                    <td>PosrgresQL, MySQL, MongoDB, Redis</td>
                </tr>
                <tr>
                    <td>CMS и No-Code</td>
                    <td>Wordpress, Webflow, Wix, Tilda</td>
                </tr>
                <tr>
                    <td>DevOps инфраструктура</td>
                    <td>Docker, Kubernetes, Nginx, AWS, Google Cloud, Yandex Cloud</td>
                </tr>
            </tbody>
        </table>
       </div>  
    </div>

  </main>

  <div id="simpleModalOverlay" class="sm-overlay" onclick="closeSimpleModal(event)">
      <div class="sm-modal">
          <button class="sm-close" onclick="closeSimpleModal(event)">×</button>
          
          <div id="smImage" class="sm-image"></div>
          
          <div class="sm-body">
              <h2 id="smTitle" class="sm-title"></h2>
              
              <div class="sm-meta">
                  <div class="sm-meta-item">
                      <span class="sm-label">Стоимость:</span>
                      <strong id="smPrice" class="sm-value"></strong>
                  </div>
                  <div class="sm-meta-item">
                      <span class="sm-label">Срок:</span>
                      <strong id="smTime" class="sm-value"></strong>
                  </div>
              </div>
              
              <p id="smDesc" class="sm-desc"></p>
              
              <a id="smLink" href="#" class="sm-btn">Связаться с нами</a>
          </div>
      </div>
  </div>

  <script>
     
      function openSimpleModal(title, price, time, imageUrl, desc, linkUrl) {
     
          document.getElementById('smTitle').innerText = title;
          document.getElementById('smPrice').innerText = "от " + price;
          document.getElementById('smTime').innerText = "от " + time;
          document.getElementById('smDesc').innerText = desc;
          document.getElementById('smLink').href = linkUrl;
          document.getElementById('smImage').style.backgroundImage = "url('" + imageUrl + "')";
          
         
          const scrollbarWidth = window.innerWidth - document.documentElement.clientWidth;
          document.body.style.paddingRight = scrollbarWidth + "px";
          
         
          document.body.classList.add('modal-open');
          
          const overlay = document.getElementById('simpleModalOverlay');
          overlay.style.display = 'flex';
          
         
          setTimeout(() => {
              overlay.classList.add('show');
          }, 10);
      }


      function closeSimpleModal(e) {
          if (e.target.classList.contains('sm-overlay') || e.target.classList.contains('sm-close')) {
              const overlay = document.getElementById('simpleModalOverlay');
              
             
              overlay.classList.remove('show');
              
         
              setTimeout(() => {
                  overlay.style.display = 'none';
                  document.body.classList.remove('modal-open');
                  document.body.style.paddingRight = ""; 
              }, 300);
          }
      }
      

      document.addEventListener('keydown', function(e) {
          if (e.key === 'Escape') {
              const overlay = document.getElementById('simpleModalOverlay');
              if(overlay.style.display === 'flex') {
                  overlay.classList.remove('show');
                  setTimeout(() => {
                      overlay.style.display = 'none';
                      document.body.classList.remove('modal-open');
                      document.body.style.paddingRight = "";
                  }, 300);
              }
          }
      });
  </script>

<?php endif; ?>
<?php get_footer(); ?>