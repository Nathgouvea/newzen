<?php get_header(); ?>
<main id="main" class="site-main zen-search-main">
    <?php if ( have_posts() ) : ?>
        <?php echo do_shortcode('[zen_search_results]'); ?>
    <?php else : ?>
        <?php get_template_part('no-results'); ?>
    <?php endif; ?>
</main>
<?php get_footer(); ?> 