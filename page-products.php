<?php
/* Template Name: Product Category Page */
get_header();
?>
<main class="products-page">
  <div class="products-intro">
    <h1 class="page-title"><?php the_title(); ?></h1>
    <div class="page-description">
      <?php
      // Show the page content from the editor
      while (have_posts()) : the_post();
        the_content();
      endwhile;
      ?>
    </div>
  </div>
  <div class="products-grid">
    <?php
    // Get the category slug from a custom field
    $category_slug = get_post_meta(get_the_ID(), 'product_category_slug', true);
    if ($category_slug) {
      $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'tax_query' => array(
          array(
            'taxonomy' => 'product_cat',
            'field' => 'slug',
            'terms' => $category_slug
          )
        )
      );
      $products = new WP_Query($args);
      if ($products->have_posts()) {
        while ($products->have_posts()) {
          $products->the_post();
          global $product;
          get_template_part('template-parts/content', 'product');
        }
      } else {
        echo '<p class="no-products">Nenhum produto encontrado nesta categoria.</p>';
      }
      wp_reset_postdata();
    } else {
      echo '<p class="no-products">Nenhuma categoria definida para esta página. Adicione o campo personalizado <strong>product_category_slug</strong> com o slug da categoria desejada.</p>';
    }
    ?>
  </div>
</main>
<?php get_footer(); ?> 