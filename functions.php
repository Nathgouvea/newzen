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

// Remove "Avaliações" (Reviews) tab from single product page
add_filter('woocommerce_product_tabs', function($tabs) {
    unset($tabs['reviews']);
    return $tabs;
}, 98);

// Show product images in WooCommerce order review (checkout summary)
add_filter('woocommerce_cart_item_name', function($product_name, $cart_item, $cart_item_key) {
    if (is_checkout()) {
        $product = $cart_item['data'];
        if ($product && $product->get_image()) {
            $thumbnail = $product->get_image(array(48,48), array('class' => 'product-thumbnail'));
            $product_name = $thumbnail . '<span>' . $product_name . '</span>';
        }
    }
    return $product_name;
}, 10, 3);

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
    
    // Enqueue product filter script for comprar page and WooCommerce archive
    if (is_page_template('page-comprar.php') || is_page('comprar') || is_page('produtos') || is_shop() || is_product_category()) {
        wp_enqueue_script('zensecrets-product-filter', get_template_directory_uri() . '/assets/js/product-filter.js', array('jquery'), '1.0.0', true);
    }
    
    // Enqueue checkout enhancements script
    if (is_checkout()) {
        wp_enqueue_script('zensecrets-checkout', get_template_directory_uri() . '/assets/js/checkout.js', array('jquery'), '1.0.0', true);
    }
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
    // Base WooCommerce styles
    wp_enqueue_style('zensecrets-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce.css');
    
    if (is_checkout()) {
        wp_dequeue_style('zensecrets-checkout'); // Remove old checkout styles
        wp_enqueue_style('zensecrets-checkout', get_template_directory_uri() . '/assets/css/woocommerce/checkout.css', array('woocommerce-general'));
    }
    
    if (is_cart()) {
        wp_enqueue_style('zensecrets-cart', get_template_directory_uri() . '/assets/css/woocommerce/cart.css', array('woocommerce-general', 'newzen-woocommerce'));
    }
}
add_action('wp_enqueue_scripts', 'zensecrets_woocommerce_styles', 15); // Priority 15 to load after WooCommerce core but before overrides

// Add single product styles with higher priority to override base styles
function zensecrets_single_product_styles() {
    if (is_product()) {
        wp_enqueue_style('zensecrets-single-product', get_template_directory_uri() . '/assets/css/woocommerce/single-product.css', array('zensecrets-woocommerce'));
    }
}
add_action('wp_enqueue_scripts', 'zensecrets_single_product_styles', 16); // Priority 16 to load after base WooCommerce styles

// Add inline CSS to force related products grid layout
function zensecrets_force_related_products_grid() {
    if (is_product()) {
        echo '<style>
        /* Force grid layout for related products */
        .related.products ul.products {
            display: grid !important;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)) !important;
            gap: 2rem !important;
            list-style: none !important;
            padding: 0 !important;
            margin: 0 !important;
            margin-top: 0 !important;
        }
        .related.products ul.products li.product {
            margin: 0 !important;
            width: auto !important;
            float: none !important;
            clear: none !important;
        }
        
        /* Override any WooCommerce default styles */
        .woocommerce .related.products ul.products {
            display: grid !important;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)) !important;
            gap: 2rem !important;
            list-style: none !important;
            padding: 0 !important;
            margin: 0 !important;
            margin-top: 0 !important;
        }
        .woocommerce .related.products ul.products li.product {
            margin: 0 !important;
            width: auto !important;
            float: none !important;
            clear: none !important;
        }
        
        /* Override columns-4 class */
        .related.products ul.products.columns-4 {
            display: grid !important;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)) !important;
            gap: 2rem !important;
            list-style: none !important;
            padding: 0 !important;
            margin: 0 !important;
            margin-top: 0 !important;
        }
        </style>';
    }
}
add_action('wp_head', 'zensecrets_force_related_products_grid', 999);

// Temporarily disable custom override to restore related products
// function zensecrets_override_related_products() {
//     // Remove the default related products output
//     remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
//     
//     // Add our custom related products output
//     add_action('woocommerce_after_single_product_summary', 'zensecrets_custom_related_products', 20);
// }
// add_action('init', 'zensecrets_override_related_products', 5);

// Custom related products function
function zensecrets_custom_related_products() {
    global $product;
    
    if (!$product) {
        error_log('Debug: No product found in zensecrets_custom_related_products');
        return;
    }
    
    $related_products = wc_get_related_product_ids($product->get_id());
    
    if (empty($related_products)) {
        error_log('Debug: No related products found for product ' . $product->get_id());
        return;
    }
    
    error_log('Debug: Found ' . count($related_products) . ' related products');
    
    echo '<section class="related products">';
    echo '<h2>Produtos relacionados</h2>';
    echo '<ul class="products" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 2rem; list-style: none; padding: 0; margin: 0;">';
    
    foreach ($related_products as $related_product_id) {
        $related_product = wc_get_product($related_product_id);
        if ($related_product && $related_product->is_visible()) {
            echo '<li class="product" style="margin: 0;">';
            
            // Set up the global product variable for the template
            global $product;
            $original_product = $product;
            $product = $related_product;
            
            // Include the product card template
            get_template_part('template-parts/content', 'product');
            
            // Restore the original product
            $product = $original_product;
            
            echo '</li>';
        }
    }
    
    echo '</ul>';
    echo '</section>';
}

// Fallback: If our custom function doesn't work, restore the default
function zensecrets_fallback_related_products() {
    if (is_product()) {
        // Check if related products section exists
        $related_section = ob_get_contents();
        if (strpos($related_section, 'related products') === false) {
            // If no related products section found, add the default one
            add_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
        }
    }
}
add_action('wp_footer', 'zensecrets_fallback_related_products');

// Enqueue central WooCommerce overrides (namespaced under .wc-newzen)
function zensecrets_enqueue_wc_overrides() {
    if (class_exists('WooCommerce')) {
        // Path to new central stylesheet
        $style_path = get_template_directory() . '/assets/css/newzen-woocommerce.css';
        
        wp_enqueue_style(
            'newzen-woocommerce',
            get_template_directory_uri() . '/assets/css/newzen-woocommerce.css',
            array('woocommerce-layout', 'woocommerce-general', 'woocommerce-smallscreen'),
            file_exists($style_path) ? filemtime($style_path) : '1.0.0'
        );
    }
}
add_action('wp_enqueue_scripts', 'zensecrets_enqueue_wc_overrides', 20); // Priority 20 to load after page-specific styles

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

// Set WooCommerce products per page globally
add_filter('loop_shop_per_page', function($cols) {
    return 8; // Change this number to your desired amount
}, 20);

// Remove stock quantity display from single product pages
add_filter('woocommerce_get_stock_html', '__return_empty_string');

// Change coupon button text to 'Aplicar' on checkout
add_filter('woocommerce_coupon_button_text', function($text) {
    if (is_checkout()) {
        return 'Aplicar';
    }
    return $text;
});

// Always show the coupon form on checkout (no click required)
add_action('wp_head', function() {
    if (is_checkout()) {
        echo '<style>.woocommerce-form-coupon-toggle { display: none !important; } .woocommerce-form-coupon { display: flex !important; }</style>';
    }
});

// Remove the default coupon form placement
remove_action('woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10);
// Add the coupon form after billing details
add_action('woocommerce_after_checkout_billing_form', 'woocommerce_checkout_coupon_form', 5);

// Enqueue cart scripts
function newzen_enqueue_cart_scripts() {
    if (is_cart()) {
        wp_enqueue_script('newzen-cart', get_template_directory_uri() . '/assets/js/cart.js', array('jquery'), '1.0.0', true);
    }
}
add_action('wp_enqueue_scripts', 'newzen_enqueue_cart_scripts');

// AJAX cart quantity update
function newzen_update_cart_item_quantity() {
    check_ajax_referer('update-cart', 'security');

    $cart_item_key = sanitize_text_field($_POST['cart_item_key']);
    $quantity = absint($_POST['quantity']);

    if ($cart_item_key && isset(WC()->cart->get_cart()[$cart_item_key])) {
        WC()->cart->set_quantity($cart_item_key, $quantity);
        WC_AJAX::get_refreshed_fragments();
    }

    wp_send_json_success();
}
add_action('wp_ajax_update_cart_item_quantity', 'newzen_update_cart_item_quantity');
add_action('wp_ajax_nopriv_update_cart_item_quantity', 'newzen_update_cart_item_quantity');

// AJAX get cart totals
function newzen_get_cart_totals() {
    ob_start();
    woocommerce_cart_totals();
    $cart_totals_html = ob_get_clean();

    wp_send_json_success(array(
        'html' => $cart_totals_html
    ));
}
add_action('wp_ajax_get_cart_totals', 'newzen_get_cart_totals');
add_action('wp_ajax_nopriv_get_cart_totals', 'newzen_get_cart_totals');

// Add cart item key to remove link
function newzen_cart_item_remove_link($link, $cart_item_key) {
    return str_replace('class="remove"', 'class="remove" data-cart-item-key="' . esc_attr($cart_item_key) . '"', $link);
}
add_filter('woocommerce_cart_item_remove_link', 'newzen_cart_item_remove_link', 10, 2);

// Remove the 'informações adicionais' (order comments) field and its title from checkout
add_filter('woocommerce_checkout_fields', function($fields) {
    unset($fields['order']['order_comments']);
    return $fields;
});
add_filter('woocommerce_checkout_fields', function($fields) {
    if (isset($fields['order'])) {
        $fields['order'] = array(); // Remove all additional fields, including heading
    }
    return $fields;
}, 20);
add_filter('woocommerce_enable_order_notes_field', '__return_false');

add_filter('woocommerce_checkout_fields', function($fields) {
    // Remove company name, CNPJ, and country fields
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_cnpj']);
    unset($fields['billing']['billing_country']);
    // Add custom class to 'bairro' and 'cidade' fields for row alignment
    if (isset($fields['billing']['billing_neighborhood'])) {
        $fields['billing']['billing_neighborhood']['class'][] = 'form-row-bairro-cidade';
    }
    if (isset($fields['billing']['billing_city'])) {
        $fields['billing']['billing_city']['class'][] = 'form-row-bairro-cidade';
    }
    // Add custom class to 'telefone' and 'email' fields for row alignment
    if (isset($fields['billing']['billing_phone'])) {
        $fields['billing']['billing_phone']['class'][] = 'form-row-phone-email';
    }
    if (isset($fields['billing']['billing_email'])) {
        $fields['billing']['billing_email']['class'][] = 'form-row-phone-email';
    }
    return $fields;
}, 30);

// Completely disable shipping address section - force billing address for shipping
add_filter('woocommerce_cart_needs_shipping_address', '__return_false');
add_filter('woocommerce_cart_needs_shipping', '__return_true');
add_filter('woocommerce_enable_order_notes_field', '__return_false');

// Remove shipping fields from checkout
add_filter('woocommerce_checkout_fields', function($fields) {
    // Remove all shipping fields
    if (isset($fields['shipping'])) {
        unset($fields['shipping']);
    }
    return $fields;
}, 99);

// Force shipping address to be same as billing
add_filter('woocommerce_checkout_posted_data', function($data) {
    // Always copy billing to shipping
    $billing_fields = array(
        'first_name', 'last_name', 'company', 'address_1', 'address_2', 
        'city', 'state', 'postcode', 'country', 'phone', 'email'
    );
    
    foreach ($billing_fields as $field) {
        if (isset($data['billing_' . $field])) {
            $data['shipping_' . $field] = $data['billing_' . $field];
        }
    }
    
    // Force ship_to_different_address to false
    $data['ship_to_different_address'] = false;
    
    return $data;
}, 10);

// Auto-copy billing address to shipping when "ship to different address" is not selected
add_filter('woocommerce_checkout_posted_data', function($data) {
    // If ship to different address is not selected, copy billing to shipping
    if (!isset($data['ship_to_different_address']) || !$data['ship_to_different_address']) {
        $billing_fields = array(
            'first_name', 'last_name', 'company', 'address_1', 'address_2', 
            'city', 'state', 'postcode', 'country', 'phone', 'email'
        );
        
        foreach ($billing_fields as $field) {
            if (isset($data['billing_' . $field])) {
                $data['shipping_' . $field] = $data['billing_' . $field];
            }
        }
    }
    
    return $data;
}, 20);

// Remove validation for 'Tipo de Pessoa' if any plugin is still requiring it
add_filter('woocommerce_checkout_posted_data', function($data) {
    unset($data['billing_persontype']);
    return $data;
}, 10, 1);
add_filter('woocommerce_checkout_fields', function($fields) {
    if (isset($fields['billing']['billing_persontype'])) {
        $fields['billing']['billing_persontype']['required'] = false;
    }
    return $fields;
}, 40);

// Zen Secrets Search Results Shortcode
function zen_search_results_shortcode() {
    if (!is_search()) return '';
    $query = get_search_query();
    ob_start();
    ?>
    <section class="zen-search-results">
        <h1 class="zen-search-title">Resultados para: <span><?php echo esc_html($query); ?></span></h1>
        <?php if (have_posts()) : ?>
            <ul class="zen-search-list">
                <?php while (have_posts()) : the_post(); ?>
                    <li class="zen-search-item">
                        <a href="<?php the_permalink(); ?>" class="zen-search-link">
                            <h2 class="zen-search-item-title"><?php the_title(); ?></h2>
                            <p class="zen-search-excerpt"><?php echo get_the_excerpt(); ?></p>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php else : ?>
            <div class="zen-search-no-results">
                <p>Nenhum resultado encontrado para "<?php echo esc_html($query); ?>".</p>
                <a href="<?php echo home_url(); ?>" class="zen-search-back">Voltar para a página inicial</a>
            </div>
        <?php endif; ?>
    </section>
    <?php
    wp_reset_postdata();
    return ob_get_clean();
}
add_shortcode('zen_search_results', 'zen_search_results_shortcode');

// Remove WooCommerce Downloads endpoint from My Account
add_filter('woocommerce_account_menu_items', function($items) {
    unset($items['downloads']);
    return $items;
}, 99);

add_filter('woocommerce_get_query_vars', function($vars) {
    unset($vars['downloads']);
    return $vars;
}, 99);

add_filter('woocommerce_get_order_item_totals', function($totals, $order, $tax_display) {
    if (isset($totals['order_total'])) {
        unset($totals['order_total']);
    }
    return $totals;
}, 10, 3); 

// --- WooCommerce Cart Progress Bar on Cart, Checkout, and Thank You Pages ---
function zen_cart_progress_bar($active = 0) {
    ?>
    <div class="cart-progress-bar">
        <div class="progress-step<?php if ($active === 1) echo ' active'; ?>">
            <span class="step-number">1</span>
            <span class="step-label">Carrinho</span>
        </div>
        <div class="progress-step<?php if ($active === 2) echo ' active'; ?>">
            <span class="step-number">2</span>
            <span class="step-label">Checkout</span>
        </div>
        <div class="progress-step<?php if ($active === 3) echo ' active'; ?>">
            <span class="step-number">3</span>
            <span class="step-label">Confirmação</span>
        </div>
    </div>
    <?php
}

add_action('woocommerce_before_main_content', function() {
    global $wp;
    if (is_cart()) {
        zen_cart_progress_bar(1);
    } elseif (is_checkout() && !isset($wp->query_vars['order-received'])) {
        zen_cart_progress_bar(2);
    } elseif (isset($wp->query_vars['order-received'])) {
        zen_cart_progress_bar(3);
    }
}, 5); 

// Remove Melhor Envio shipping calculator from all product page hooks (try common function names)
add_action('init', function() {
    remove_action('woocommerce_before_add_to_cart_button', 'me_calc_shipping', 10);
    remove_action('woocommerce_after_add_to_cart_form', 'me_calc_shipping', 10);
    remove_action('woocommerce_before_add_to_cart_button', 'me_calc_shipping_product', 10);
    remove_action('woocommerce_after_add_to_cart_form', 'me_calc_shipping_product', 10);
    remove_action('woocommerce_before_add_to_cart_button', 'mefrete_simulador', 10);
    remove_action('woocommerce_after_add_to_cart_form', 'mefrete_simulador', 10);
});
// Fallback: Hide by CSS in case any HTML remains
add_action('wp_head', function() {
    echo '<style>.shipping-calculator-row, #woocommerce-correios-calculo-de-frete-na-pagina-do-produto { display: none !important; }</style>';
}); 

// Change single product page add to cart button text to 'Comprar'
add_filter('woocommerce_product_single_add_to_cart_text', function($text) {
    return 'Comprar';
}); 

// --- Force quantity input on single product page ---
add_filter('woocommerce_is_sold_individually', function($return, $product) {
    if (is_product()) {
        return false; // Always allow quantity selection on single product page
    }
    return $return;
}, 10, 2);

// Shortcode for dynamic category tags
function zen_category_tags_shortcode($atts) {
    $atts = shortcode_atts(array(
        'exclude' => '',
        'include' => '',
        'orderby' => 'name',
        'order' => 'ASC'
    ), $atts);
    
    // Get product categories
    $args = array(
        'taxonomy' => 'product_cat',
        'hide_empty' => true,
        'orderby' => $atts['orderby'],
        'order' => $atts['order']
    );
    
    // Handle include/exclude
    if (!empty($atts['exclude'])) {
        $args['exclude'] = explode(',', $atts['exclude']);
    }
    if (!empty($atts['include'])) {
        $args['include'] = explode(',', $atts['include']);
    }
    
    $categories = get_terms($args);
    
    if (empty($categories) || is_wp_error($categories)) {
        return '';
    }
    
    $output = '<section class="category-tags wrapper">';
    $output .= '<div class="tags-container">';
    
    // Add "Todos" (All) option
    $output .= '<a href="#todos-produtos" class="category-tag active">Todos</a>';
    
    // Add category tags
    foreach ($categories as $category) {
        $category_id = $category->term_id;
        $category_name = $category->name;
        $category_slug = $category->slug;
        
        $output .= sprintf(
            '<a href="#%s" class="category-tag">%s</a>',
            esc_attr($category_slug),
            esc_html($category_name)
        );
    }
    
    $output .= '</div>';
    $output .= '</section>';
    
    return $output;
}
add_shortcode('zen_category_tags', 'zen_category_tags_shortcode'); 