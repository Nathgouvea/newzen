<?php
if (!defined('ABSPATH')) {
    exit;
}

// Basic theme setup
function zensecrets_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    // Register the primary menu location
    register_nav_menus([
        'primary' => __('Primary Menu', 'zensecrets'),
    ]);
    
    // Add WooCommerce support
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'zensecrets_setup');

// Enqueue styles and scripts
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

// Modify WooCommerce product image sizes
function zensecrets_woocommerce_image_sizes() {
    // Set the main product image size
    update_option('woocommerce_thumbnail_image_width', 400);
    update_option('woocommerce_thumbnail_image_height', 533);
    update_option('woocommerce_thumbnail_crop', 1);
    
    // Set the single product image size
    update_option('woocommerce_single_image_width', 800);
    update_option('woocommerce_single_image_height', 1066);
    update_option('woocommerce_single_image_crop', 1);
}
add_action('after_switch_theme', 'zensecrets_woocommerce_image_sizes');

// Add custom classes to WooCommerce product cards
function zensecrets_woocommerce_product_class($classes) {
    $classes[] = 'product-card';
    $classes[] = 'fade-in';
    return $classes;
}
add_filter('woocommerce_post_class', 'zensecrets_woocommerce_product_class', 10, 1);

// Add WooCommerce specific styles
function zensecrets_woocommerce_styles() {
    wp_enqueue_style('zensecrets-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce.css');
}
add_action('wp_enqueue_scripts', 'zensecrets_woocommerce_styles');

// Customize WooCommerce breadcrumbs
function zensecrets_woocommerce_breadcrumbs() {
    return array(
        'delimiter'   => ' &gt; ',
        'wrap_before' => '<nav class="woocommerce-breadcrumb">',
        'wrap_after'  => '</nav>',
        'before'      => '',
        'after'       => '',
        'home'        => _x('Home', 'breadcrumb', 'zensecrets'),
    );
}
add_filter('woocommerce_breadcrumb_defaults', 'zensecrets_woocommerce_breadcrumbs');

// Add support for Mercado Pago and Melhor Envio
function zensecrets_payment_shipping_support() {
    // Add custom classes to payment and shipping sections
    add_filter('woocommerce_payment_gateways', function($gateways) {
        if (class_exists('WC_MercadoPago_Gateway')) {
            $gateways[] = 'WC_MercadoPago_Gateway';
        }
        return $gateways;
    });

    // Add support for Melhor Envio
    if (class_exists('MelhorEnvio')) {
        add_filter('woocommerce_shipping_methods', function($methods) {
            $methods['melhorenvio'] = 'WC_Melhor_Envio_Shipping';
            return $methods;
        });
    }
}
add_action('init', 'zensecrets_payment_shipping_support');

// Customize WooCommerce checkout fields
function zensecrets_customize_checkout_fields($fields) {
    // Add custom classes to checkout fields
    foreach ($fields as $key => $field) {
        $fields[$key]['class'][] = 'form-group';
        $fields[$key]['input_class'][] = 'form-control';
    }
    return $fields;
}
add_filter('woocommerce_checkout_fields', 'zensecrets_customize_checkout_fields');

// Add custom order status for Melhor Envio
function zensecrets_add_custom_order_status() {
    register_post_status('wc-melhorenvio', array(
        'label'                     => 'Melhor Envio',
        'public'                    => true,
        'show_in_admin_status_list' => true,
        'label_count'               => _n_noop('Melhor Envio <span class="count">(%s)</span>', 'Melhor Envio <span class="count">(%s)</span>')
    ));
}
add_action('init', 'zensecrets_add_custom_order_status');

// Add custom order status to WooCommerce order statuses
function zensecrets_add_custom_order_status_to_order_statuses($order_statuses) {
    $new_order_statuses = array();
    foreach ($order_statuses as $key => $status) {
        $new_order_statuses[$key] = $status;
        if ($key === 'wc-processing') {
            $new_order_statuses['wc-melhorenvio'] = 'Melhor Envio';
        }
    }
    return $new_order_statuses;
}
add_filter('wc_order_statuses', 'zensecrets_add_custom_order_status_to_order_statuses');

// Add AJAX cart fragments support
function zensecrets_cart_fragments($fragments) {
    ob_start();
    ?>
    <span class="cart-count"><?php echo WC()->cart ? WC()->cart->get_cart_contents_count() : 0; ?></span>
    <?php
    $fragments['.cart-count'] = ob_get_clean();
    return $fragments;
}
add_filter('woocommerce_add_to_cart_fragments', 'zensecrets_cart_fragments');

// Add AJAX support for cart updates
function zensecrets_enqueue_scripts() {
    wp_enqueue_script('wc-cart-fragments');
}
add_action('wp_enqueue_scripts', 'zensecrets_enqueue_scripts', 99); 