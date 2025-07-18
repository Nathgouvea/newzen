<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer) will
 * need to copy the new files to your theme to maintain compatibility. We try to do this as little as possible,
 * but it does happen. When this occurs the version of the template file will be bumped and the readme will list
 * any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header( 'shop' );
?>
<main class="single-product">
  <div class="container">
    <?php wc_print_notices(); ?>
    <?php
    /**
     * woocommerce_before_main_content hook.
     *
     * @hooked woocommerce_output_content_wrapper - 10 (outputs <div id="primary" class="content-area">)
     * @hooked woocommerce_breadcrumb - 20
     */
    do_action( 'woocommerce_before_main_content' );
    ?>

    <?php while ( have_posts() ) : the_post(); ?>
      <div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'product', $product ); ?>>
        <?php
        /**
         * Two-column layout: Gallery (left), Summary (right)
         */
        ?>
        <?php
        /**
         * woocommerce_before_single_product_summary hook.
         *
         * @hooked woocommerce_show_product_sale_flash - 10
         * @hooked woocommerce_show_product_images - 20
         */
        do_action( 'woocommerce_before_single_product_summary' );
        ?>
        <div class="summary entry-summary">
          <?php
          /**
           * woocommerce_single_product_summary hook.
           *
           * @hooked woocommerce_template_single_title - 5
           * @hooked woocommerce_template_single_rating - 10
           * @hooked woocommerce_template_single_price - 10
           * @hooked woocommerce_template_single_excerpt - 20
           * @hooked woocommerce_template_single_add_to_cart - 30
           * @hooked woocommerce_template_single_meta - 40
           * @hooked woocommerce_template_single_sharing - 50
           */
          do_action( 'woocommerce_single_product_summary' );
          ?>
          <?php
          // Output the shipping calculator below the cart form
          echo '<div class="shipping-calculator-row">';
          do_action('woocommerce_after_add_to_cart_form');
          echo '</div>';
          ?>
        </div>
      </div>
      <?php
      /**
       * woocommerce_after_single_product_summary hook.
       *
       * @hooked woocommerce_output_product_data_tabs - 10
       * @hooked woocommerce_upsell_display - 15
       * @hooked woocommerce_output_related_products - 20
       */
      do_action( 'woocommerce_after_single_product_summary' );
      ?>
    <?php endwhile; // end of the loop. ?>

    <?php
    /**
     * woocommerce_after_main_content hook.
     *
     * @hooked woocommerce_output_content_wrapper_end - 10 (outputs </div>)
     */
    do_action( 'woocommerce_after_main_content' );
    ?>
  </div>
</main>
<?php get_footer( 'shop' ); ?> 