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
      style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/imagens/hero-zen.webp')"
    ></div>
    <div class="hero__content">
      <h1 class="hero__title"><?php woocommerce_page_title(); ?></h1>
    </div>
  </section>

  <?php echo do_shortcode('[zen_category_tags]'); ?>

  <div class="container">
    <!-- Todos os Produtos Section -->
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

    <?php
    // Generate sections dynamically based on product categories
    $categories = get_terms(array(
        'taxonomy' => 'product_cat',
        'hide_empty' => true,
        'orderby' => 'name',
        'order' => 'ASC'
    ));
    
    if (!empty($categories) && !is_wp_error($categories)) {
        foreach ($categories as $category) {
            $category_slug = $category->slug;
            $category_name = $category->name;
            ?>
            <section class="featured-products" id="<?php echo esc_attr($category_slug); ?>" role="region" aria-label="<?php echo esc_attr($category_name); ?>" style="display: none;">
                <div class="product-grid">
                    <?php
                    // Query for products in this category
                    $category_query = new WP_Query(array(
                        'post_type' => 'product',
                        'posts_per_page' => -1,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'product_cat',
                                'field' => 'slug',
                                'terms' => $category_slug
                            )
                        )
                    ));
                    
                    if ($category_query->have_posts()) {
                        while ($category_query->have_posts()) {
                            $category_query->the_post();
                            wc_get_template_part('content', 'product');
                        }
                    }
                    wp_reset_postdata();
                    ?>
                </div>
            </section>
            <?php
        }
    }
    ?>
  </div>
</main>
<?php get_footer(); ?> 