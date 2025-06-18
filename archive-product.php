<?php
/**
 * The Template for displaying product archives (shop page)
 *
 * This template can be overridden by copying it to yourtheme/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer) will
 * need to copy the new files to your theme to maintain compatibility. We try to do this as little as possible,
 * but it does happen. When this occurs the version of the template file will be bumped and the readme will list
 * any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main>
  <section class="hero hero--unified">
    <div
      class="hero__bg"
      style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/imagens/all-hero.png')"
    ></div>
    <div class="hero__content">
      <h1 class="hero__title"><?php woocommerce_page_title(); ?></h1>
    </div>
  </section>

  <section class="category-tags wrapper">
    <div class="tags-container">
      <a href="/comprar/#aromatizadores" class="category-tag">Aromatizadores</a>
      <a href="/comprar/#home-spray" class="category-tag">Home Spray</a>
      <a href="/comprar/#velas" class="category-tag">Velas Aromáticas</a>
      <a href="/comprar/#kits" class="category-tag">Kits Especiais</a>
      <a href="/comprar/#lembrancinhas" class="category-tag">Lembrancinhas</a>
      <a href="/comprar/#acessorios" class="category-tag">Acessórios</a>
    </div>
  </section>

  <div class="container">
    <section class="featured-products" id="todos-produtos" role="region" aria-label="Todos Produtos">
      <?php
        /**
         * WooCommerce hooks for notices, result count, ordering, etc.
         */
        do_action( 'woocommerce_before_main_content' );
        if ( woocommerce_product_loop() ) {
          do_action( 'woocommerce_before_shop_loop' );
          woocommerce_product_loop_start();
          if ( wc_get_loop_prop( 'total' ) ) {
            while ( have_posts() ) {
              the_post();
              wc_get_template_part( 'content', 'product' );
            }
          }
          woocommerce_product_loop_end();
          do_action( 'woocommerce_after_shop_loop' );
        } else {
          do_action( 'woocommerce_no_products_found' );
        }
        do_action( 'woocommerce_after_main_content' );
      ?>
    </section>
  </div>
</main>
<?php get_footer(); ?> 