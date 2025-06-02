<?php
/**
 * Template Name: Minha Conta
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php echo do_shortcode('[woocommerce_my_account]'); ?>
</main>

<?php get_footer(); ?> 