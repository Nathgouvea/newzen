<?php
/* Template Name: Home Spray Custom */
get_header();
?>
<main class="products-page">
  <div class="products-intro">
    <h1 class="page-title">Home Spray</h1>
    <p class="page-description">
      Nossos Home Sprays são perfeitos para refrescar instantaneamente
      qualquer ambiente. Com uma combinação única de fragrâncias, eles
      trazem uma sensação de bem-estar e frescor ao seu espaço.
    </p>
  </div>

  <div class="products-grid">
    <?php
    // Query products from the Home Spray category
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => 'home-spray'
            )
        )
    );

    $products = new WP_Query($args);

    if ($products->have_posts()) {
        while ($products->have_posts()) {
            $products->the_post();
            global $product;
            
            // Include our custom product card template
            get_template_part('template-parts/content', 'product');
        }
    } else {
        echo '<p class="no-products">Nenhum produto encontrado na categoria Home Spray.</p>';
    }

    // Reset post data
    wp_reset_postdata();
    ?>
  </div>
</main>
<?php get_footer(); ?> 