<?php
/*
Template Name: WooCommerce Thank You
*/
get_header();
?>
<main id="primary" class="site-main zen-thankyou-page">
  <div class="cart-progress-bar">
      <div class="progress-step">
          <span class="step-number">1</span>
          <span class="step-label">Carrinho</span>
      </div>
      <div class="progress-step">
          <span class="step-number">2</span>
          <span class="step-label">Checkout</span>
      </div>
      <div class="progress-step active">
          <span class="step-number">3</span>
          <span class="step-label">Confirmação</span>
      </div>
  </div>
  <div class="zen-thankyou-wrapper">
    <?php echo do_shortcode('[woocommerce_thankyou]'); ?>
  </div>
</main>
<?php get_footer(); ?> 
