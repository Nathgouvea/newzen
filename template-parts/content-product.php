<?php
/**
 * The template for displaying product content in loops
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility
if (empty($product) || !$product->is_visible()) {
    return;
}
?>
<article <?php wc_product_class('product-card fade-in', $product); ?>>
    <div class="product-card__image-container">
        <?php
        // Get the product image
        $image_id = $product->get_image_id();
        $image_url = wp_get_attachment_image_url($image_id, 'full');
        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
        ?>
        <img
            src="<?php echo esc_url($image_url); ?>"
            alt="<?php echo esc_attr($image_alt); ?>"
            class="product-card__image"
            loading="lazy"
            decoding="async"
        />
    </div>
    <div class="product-card__content">
        <h3 class="product-card__title"><?php echo esc_html($product->get_name()); ?></h3>
        <div class="product-card__footer">
            <div class="product-card__price"><?php echo $product->get_price_html(); ?></div>
            <a href="<?php echo esc_url($product->add_to_cart_url()); ?>" class="product-card__button">
                <i class="far fa-bag-shopping"></i>
                <?php echo esc_html($product->add_to_cart_text()); ?>
            </a>
        </div>
    </div>
</article> 