<?php
/**
 * Template Name: Carrinho
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="cart-progress-bar">
        <div class="progress-step active">
            <span class="step-number">1</span>
            <span class="step-label">Carrinho</span>
        </div>
        <div class="progress-step">
            <span class="step-number">2</span>
            <span class="step-label">Checkout</span>
        </div>
        <div class="progress-step">
            <span class="step-number">3</span>
            <span class="step-label">Confirmação</span>
        </div>
    </div>

    <?php
    if (WC()->cart->is_empty()) {
        ?>
        <div class="empty-cart">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/imagens/empty-cart.svg" alt="Carrinho Vazio" class="empty-cart-image">
            <h2>Seu carrinho está vazio</h2>
            <p>Explore nossa coleção e encontre produtos incríveis para você!</p>
            <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="button continue-shopping">Continuar Comprando</a>
        </div>
        <?php
    } else {
        echo do_shortcode('[woocommerce_cart]');
    }
    ?>
</main>

<?php get_footer(); ?> 