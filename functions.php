<?php
if (!defined('ABSPATH')) {
    exit;
}

// Basic theme setup
function zensecrets_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'zensecrets_setup');

// Enqueue original styles and scripts
function zensecrets_scripts() {
    // Enqueue the original stylesheet
    wp_enqueue_style('zensecrets-style', get_stylesheet_uri());
    wp_enqueue_style('zensecrets-original', get_template_directory_uri() . '/assets/css/style.css');
    
    // Enqueue Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css');
    
    // Enqueue Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Arimo:wght@400;700&family=Brown+Sugar&family=Sacramento&display=swap');
    
    // Enqueue original scripts
    wp_enqueue_script('zensecrets-main', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'zensecrets_scripts'); 