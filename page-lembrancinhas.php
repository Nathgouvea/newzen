<?php
/* Template Name: Lembrancinhas Custom */
get_header();
?>
<main class="products-page">
  <div class="products-intro">
    <h1 class="page-title">Lembrancinhas</h1>
    <p class="page-description">
      Nossas lembrancinhas são perfeitas para presentear em ocasiões
      especiais. Cada item é cuidadosamente selecionado e personalizado para
      criar momentos memoráveis.
    </p>
  </div>

  <div class="products-grid">
    <?php
    // Query products from the Lembrancinhas category
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => 'lembrancinhas'
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
        echo '<p class="no-products">Nenhum produto encontrado na categoria Lembrancinhas.</p>';
    }

    // Reset post data
    wp_reset_postdata();
    ?>
  </div>
</main>
<?php get_footer(); ?> 