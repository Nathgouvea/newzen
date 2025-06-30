<?php
/*
Template Name: WooCommerce Thank You
*/
get_header();
?>
<main id="primary" class="site-main zen-thankyou-page">
  <div class="zen-thankyou-wrapper">
    <?php echo do_shortcode('[woocommerce_thankyou]'); ?>
  </div>
</main>
<?php get_footer(); ?> 
