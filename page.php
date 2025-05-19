<?php get_header(); ?>

<main id="main" class="site-main">
    <?php
    // Get the current page slug
    $page_slug = get_post_field('post_name', get_post());
    
    // Map WordPress pages to original HTML files
    $page_mapping = array(
        'aromas' => 'aromas.html',
        'acessorios' => 'acessorios.html',
        'aromatizadores' => 'aromatizadores.html',
        'comprar' => 'comprar.html',
        'contato' => 'contato.html',
        'velas-aromaticas' => 'velas-aromaticas.html',
        'lembrancinhas' => 'lembrancinhas.html',
        'kits-especiais' => 'kits-especiais.html',
        'home-spray' => 'home-spray.html',
        'inicio' => 'index.html'
    );

    // If we have a mapping for this page, include the original HTML file
    if (isset($page_mapping[$page_slug])) {
        include get_template_directory() . '/' . $page_mapping[$page_slug];
    } else {
        // Fallback to default WordPress content
        while (have_posts()) :
            the_post();
            the_content();
        endwhile;
    }
    ?>
</main>

<?php get_footer(); ?> 