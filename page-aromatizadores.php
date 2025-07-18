<?php
/* Template Name: Aromatizadores Custom */
get_header();
?>
<main class="products-page">
  <div class="products-intro">
    <h1 class="page-title">Aromatizadores</h1>
    <p class="page-description">
      Nossos aromatizadores são desenvolvidos para proporcionar uma
      experiência única de fragrância em seu ambiente. Com diferentes
      formatos e aromas, você pode escolher o que melhor combina com seu
      espaço.
    </p>
  </div>

  <div class="products-grid">
    <?php
    // Query products from the Aromatizadores category
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => 'aromatizadores'
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
        echo '<p class="no-products">Nenhum produto encontrado na categoria Aromatizadores.</p>';
    }

    // Reset post data
    wp_reset_postdata();
    ?>
  </div>
</main>
<?php get_footer(); ?> 