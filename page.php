<?php get_header(); ?>

<main id="main" class="site-main">
    <?php
    // Get the current page slug
    $page_slug = get_post_field('post_name', get_post());
    
    // Map WordPress pages to their specific templates
    $page_mapping = array(
        'aromas' => 'page-aromas.php',
        'acessorios' => 'page-acessorios.php',
        'aromatizadores' => 'page-aromatizadores.php',
        'comprar' => 'page-comprar.php',
        'contato' => 'page-contato.php',
        'velas-aromaticas' => 'page-velas-aromaticas.php',
        'lembrancinhas' => 'page-lembrancinhas.php',
        'kits-especiais' => 'page-kits-especiais.php',
        'home-spray' => 'page-home-spray.php'
    );

    // If we have a specific template for this page, use it
    if (isset($page_mapping[$page_slug])) {
        get_template_part('page', $page_slug);
    } else {
        // Fallback to default WordPress content
        while (have_posts()) :
            the_post();
            get_template_part('template-parts/content', 'page');
        endwhile;
    }
    ?>
</main>

<?php get_footer(); ?> 