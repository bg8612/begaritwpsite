<?php
/**
 * Footer Template
 */
?>


<footer class="footer">
  <div class="footer-container">
    <div class="footer-content">
      <!-- Левая колонка с логотипом и описанием -->
      <div class="footer-info">
        <div class="footer-logo">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.svg"
               alt="<?php bloginfo('name'); ?>"
               class="footer-logo-img" />
          <span class="footer-logo-text">Begarit</span>
        </div>
        <p class="footer-description">
          Begarit — это студия, создающая уникальные сайты, которые помогают
          бизнесу выделяться. Мы разрабатываем удобные и эффективные
          решения, ориентированные на вашу аудиторию. Наша цель — усилить
          ваш бренд через дизайн и современные технологии.
        </p>
        
        <p class="footer-description">ИП Никитин Александр Юрьевич<br>ОГРНИП 325690000054781, ИНН 691407473729</p>
      </div>

      <!-- Колонки с ссылками -->
      <div class="footer-links">
        <div class="footer-column">
          <h3>Комьюнити</h3>
          <a href="https://discord.gg/pBVkkCEBBG" class="footer-link" target="_blank" rel="noopener noreferrer">
            Discord
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
              <path d="M4 12L12 4M12 4H5M12 4V11" stroke="currentColor" stroke-width="1.5"/>
            </svg>
          </a>
          <a href="https://t.me/begaritstudio_news" class="footer-link" target="_blank" rel="noopener noreferrer">
            Telegram
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
              <path d="M4 12L12 4M12 4H5M12 4V11" stroke="currentColor" stroke-width="1.5"/>
            </svg>
          </a>
        </div>

        <div class="footer-column">
          <h3>Поддержка</h3>
          <a href="https://t.me/begaritstudio" class="footer-link" target="_blank" rel="noopener noreferrer">
            Telegram
          </a>
          <a href="mailto:begaritstudio@gmail.com" class="footer-link" target="_blank" rel="noopener noreferrer">
            Почта
          </a>
        </div>

        <div class="footer-column">
          <h3>Компания</h3>
          <a href="https://t.me/begaritstudio" class="footer-link" target="_blank" rel="noopener noreferrer">
            Карьера
         </a>
         <a href="https://t.me/begaritstudio" class="footer-link" target="_blank" rel="noopener noreferrer">
           Сотрудничество
         </a>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <div class="footer-legal">
        <a href="https://docs.google.com/document/d/1jBkhnt_nh-Vho8BzIi6AXf_kpd1vAC1A/edit"
           target="_blank" rel="noopener noreferrer">
          Политика обработки персональных данных
        </a>
        <a href="https://docs.google.com/document/d/17W4zXS8PjcV_ew_PazlleIKQv1O4Hsm6KDa1_0V13Mo/edit?usp=sharing"
           rel="noopener noreferrer">
          Публичная Оферта
        </a>
      </div>
      <div class="footer-credits">
        <span>© <?php echo date('Y'); ?> www.begarit-studio.ru</span>
        <span>Design By Andrey Zamyatin</span>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
