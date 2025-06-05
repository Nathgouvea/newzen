<?php
/*
 * Template for WooCommerce Shop Page with Custom Styles
 * Based on page-comprar.php but uses WooCommerce product loop and filters
 */
get_header();
?>
<main>
  <section class="hero hero--unified">
    <div
      class="hero__bg"
      style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/imagens/all-hero.png')"
    ></div>
    <div class="hero__content">
      <h1 class="hero__title">Todos os Produtos</h1>
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
        do_action( 'woocommerce_before_shop_loop' );

        if ( woocommerce_product_loop() ) {
          woocommerce_product_loop_start();
          if ( wc_get_loop_prop( 'total' ) ) {
            while ( have_posts() ) {
              the_post();
              wc_get_template_part( 'content', 'product' );
            }
          }
          woocommerce_product_loop_end();
        } else {
          do_action( 'woocommerce_no_products_found' );
        }

        do_action( 'woocommerce_after_shop_loop' );
        do_action( 'woocommerce_after_main_content' );
      ?>
    </section>
  </div>
</main>
<?php get_footer(); ?> 