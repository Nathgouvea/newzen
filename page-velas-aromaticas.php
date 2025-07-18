<?php
/* Template Name: Velas Aromáticas Custom */
get_header();
?>
<main class="products-page">
  <div class="products-intro">
    <h1 class="page-title">Velas Aromáticas</h1>
    <p class="page-description">
      Nossas velas aromáticas são feitas com cera de soja 100% natural e
      fragrâncias premium. Cada vela é cuidadosamente elaborada para criar
      uma atmosfera acolhedora e relaxante em seu ambiente.
    </p>
  </div>

  <div class="products-grid">
    <?php
    // Query products from the Velas Aromáticas category
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => 'velas-aromaticas'
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
        echo '<p class="no-products">Nenhum produto encontrado na categoria Velas Aromáticas.</p>';
    }

    // Reset post data
    wp_reset_postdata();
    ?>
  </div>
</main>
<?php get_footer(); ?> 