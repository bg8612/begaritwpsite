<?php
/*
Template Name: Страница Спасибо
*/
get_header(); 
?>

  <style>
    .thanks {
      max-width: 434px;
      width: 100%;
      margin: auto;
      margin-top: 100px;
      margin-bottom: 100px;
    }
    
    .thanks img {
      margin: auto; 
    }
    
    .thanks h1 {
      font-size: 28px;
      font-family: "SF-Pro-Display-Bold", sans-serif;
      padding-top: 10px;
      padding-bottom: 10px;
      text-align: center;
      color: var(--text-color);
      margin: 0;
    }
    
    .thanks p {
      font-size: 18px;
      font-family: "SF-Pro-Display-Regular", sans-serif;
      text-align: center;
      color: var(--text-color);
      margin: 0;
    }
  </style>

<div class="container">
    <div class="thanks">
       <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/thanks.png" alt="Успешно">
       <h1>Спасибо за заявку!</h1>
       <p>Ваша заявка успешно принята. Наш менеджер свяжется с вами в ближайшее время.</p>
    </div>
</div>

<?php get_footer(); ?>