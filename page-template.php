<?php
/**
 * Template Name: Simple Page Template
 * Description: A minimal page template
 */

get_header();
?>

<main>
    <div class="container">
        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                the_content();
            endwhile;
        endif;
        ?>
    </div>
</main>

<?php get_footer(); ?>
