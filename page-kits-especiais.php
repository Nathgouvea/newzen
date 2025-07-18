<?php
/* Template Name: Kits Especiais Custom */
get_header();
?>
<main class="products-page">
  <div class="products-intro">
    <h1 class="page-title">Kits Especiais</h1>
    <p class="page-description">
      Nossos kits especiais são cuidadosamente selecionados para oferecer uma
      experiência completa de aromaterapia. Cada kit combina diferentes
      produtos para criar momentos únicos de bem-estar e relaxamento.
    </p>
  </div>

  <div class="products-grid">
    <?php
    // Query products from the Kits Especiais category
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => 'kits-especiais'
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
        echo '<p class="no-products">Nenhum produto encontrado na categoria Kits Especiais.</p>';
    }

    // Reset post data
    wp_reset_postdata();
    ?>
  </div>
</main>
<?php get_footer(); ?> 