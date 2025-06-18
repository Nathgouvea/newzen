<?php
/**
 * Template Name: Checkout
 */

get_header();
?>

<main id="primary" class="site-main checkout-page">
    <div class="checkout-hero">
        <div class="container">
            <div class="checkout-hero__content">
                <h1 class="checkout-title">
                    <span class="checkout-title__icon">✨</span>
                    Finalizar Compra
                </h1>
                <p class="checkout-subtitle">Complete sua experiência Zen com segurança e tranquilidade</p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="checkout-progress">
            <div class="checkout-progress__step active">
                <div class="checkout-progress__icon">1</div>
                <span class="checkout-progress__label">Informações</span>
            </div>
            <div class="checkout-progress__step">
                <div class="checkout-progress__icon">2</div>
                <span class="checkout-progress__label">Pagamento</span>
            </div>
            <div class="checkout-progress__step">
                <div class="checkout-progress__icon">3</div>
                <span class="checkout-progress__label">Confirmação</span>
            </div>
        </div>

        <div class="checkout-content">
            <div class="checkout-form-wrapper">
                <?php echo do_shortcode('[woocommerce_checkout]'); ?>
            </div>
            
            <div class="checkout-sidebar">
                <div class="checkout-benefits">
                    <h3 class="checkout-benefits__title">
                        <i class="fas fa-shield-alt"></i>
                        Compra Segura
                    </h3>
                    <ul class="checkout-benefits__list">
                        <li>
                            <i class="fas fa-lock"></i>
                            Pagamento 100% seguro
                        </li>
                        <li>
                            <i class="fas fa-shipping-fast"></i>
                            Entrega rápida
                        </li>
                        <li>
                            <i class="fas fa-undo"></i>
                            Garantia de 30 dias
                        </li>
                        <li>
                            <i class="fas fa-headset"></i>
                            Suporte 24/7
                        </li>
                    </ul>
                </div>

                <div class="checkout-trust">
                    <div class="checkout-trust__badges">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/imagens/visa.png" alt="Visa" class="checkout-trust__badge">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/imagens/mastercard.png" alt="Mastercard" class="checkout-trust__badge">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/imagens/pix.png" alt="PIX" class="checkout-trust__badge">
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?> 