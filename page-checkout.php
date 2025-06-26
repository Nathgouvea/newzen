<?php
/**
 * Template Name: Checkout
 */

get_header();
?>

<main id="primary" class="site-main checkout-page">
    <?php echo do_shortcode('[woocommerce_checkout]'); ?>
</main>

<?php get_footer(); ?> 