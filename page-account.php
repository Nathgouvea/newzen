<?php
/**
 * Template Name: Minha Conta
 */

get_header();
?>

<main id="primary" class="site-main account-page">
    <div class="container">
        <div class="account-header">
            <h1 class="page-title">Minha Conta</h1>
            <p class="page-description">Gerencie suas informações pessoais, pedidos e preferências</p>
        </div>
        
        <div class="account-content">
            <div class="account-navigation">
                <nav class="account-nav" aria-label="Navegação da conta">
                    <ul class="account-nav__list">
                        <li class="account-nav__item">
                            <a href="<?php echo esc_url( wc_get_account_endpoint_url('dashboard') ); ?>" class="account-nav__link<?php if ( !is_account_page() || ( isset($_GET['section']) && $_GET['section'] === 'dashboard' ) ) echo ' active'; ?>" aria-current="page">
                                <i class="fas fa-home"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="account-nav__item">
                            <a href="<?php echo esc_url( wc_get_account_endpoint_url('orders') ); ?>" class="account-nav__link<?php if ( is_wc_endpoint_url('orders') ) echo ' active'; ?>">
                                <i class="fas fa-shopping-bag"></i>
                                <span>Pedidos</span>
                            </a>
                        </li>
                        <li class="account-nav__item">
                            <a href="<?php echo esc_url( wc_get_account_endpoint_url('downloads') ); ?>" class="account-nav__link<?php if ( is_wc_endpoint_url('downloads') ) echo ' active'; ?>">
                                <i class="fas fa-download"></i>
                                <span>Downloads</span>
                            </a>
                        </li>
                        <li class="account-nav__item">
                            <a href="<?php echo esc_url( wc_get_account_endpoint_url('edit-address') ); ?>" class="account-nav__link<?php if ( is_wc_endpoint_url('edit-address') ) echo ' active'; ?>">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Endereços</span>
                            </a>
                        </li>
                        <li class="account-nav__item">
                            <a href="<?php echo esc_url( wc_get_account_endpoint_url('edit-account') ); ?>" class="account-nav__link<?php if ( is_wc_endpoint_url('edit-account') ) echo ' active'; ?>">
                                <i class="fas fa-user"></i>
                                <span>Detalhes da Conta</span>
                            </a>
                        </li>
                        <li class="account-nav__item">
                            <a href="<?php echo esc_url( wp_logout_url(home_url()) ); ?>" class="account-nav__link account-nav__link--logout">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Sair</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            
            <div class="account-main">
                <?php echo do_shortcode('[woocommerce_my_account]'); ?>
            </div>
        </div>
    </div>
</main>

<style>
.account-page {
    padding: var(--spacing-xl) 0;
    background: var(--color-background-soft);
}

.account-header {
    text-align: center;
    margin-bottom: var(--spacing-xl);
}

.account-header .page-title {
    color: var(--color-text);
    margin-bottom: var(--spacing-sm);
}

.account-header .page-description {
    color: var(--color-text-soft);
    font-size: var(--fs-400);
}

.account-content {
    display: grid;
    grid-template-columns: 280px 1fr;
    gap: var(--spacing-xl);
    background: var(--color-background);
    border-radius: var(--border-radius-lg);
    box-shadow: var(--shadow-md);
    overflow: hidden;
}

.account-navigation {
    background: var(--color-background-soft);
    padding: var(--spacing-lg);
}

.account-nav__list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.account-nav__item {
    margin-bottom: var(--spacing-xs);
}

.account-nav__link {
    display: flex;
    align-items: center;
    padding: var(--spacing-sm) var(--spacing-md);
    color: var(--color-text);
    text-decoration: none;
    border-radius: var(--border-radius-md);
    transition: var(--transition-base);
}

.account-nav__link i {
    margin-right: var(--spacing-sm);
    width: 20px;
    text-align: center;
}

.account-nav__link:hover {
    background: var(--color-accent-light);
    color: var(--color-text);
}

.account-nav__link.active {
    background: var(--color-secondary);
    color: var(--color-white);
}

.account-nav__link--logout {
    color: var(--color-gray-600);
    margin-top: var(--spacing-lg);
    border-top: 1px solid var(--color-gray-300);
    padding-top: var(--spacing-md);
}

.account-nav__link--logout:hover {
    color: var(--color-gray-900);
}

.account-main {
    padding: var(--spacing-xl);
}

/* WooCommerce Overrides */
.woocommerce-MyAccount-navigation {
    display: none;
}

.woocommerce-MyAccount-content {
    width: 100%;
    padding: 0;
}

.woocommerce-MyAccount-content h2 {
    font-size: var(--fs-600);
    margin-bottom: var(--spacing-lg);
    color: var(--color-text);
}

.woocommerce-MyAccount-content .woocommerce-Button {
    background: var(--color-secondary);
    color: var(--color-white);
    padding: var(--spacing-sm) var(--spacing-lg);
    border-radius: var(--border-radius-md);
    border: none;
    cursor: pointer;
    transition: var(--transition-base);
}

.woocommerce-MyAccount-content .woocommerce-Button:hover {
    background: var(--color-secondary-dark);
}

/* Responsive Design */
@media (max-width: 992px) {
    .account-content {
        grid-template-columns: 1fr;
    }
    
    .account-navigation {
        padding: var(--spacing-md);
    }
    
    .account-nav__list {
        display: flex;
        flex-wrap: wrap;
        gap: var(--spacing-xs);
    }
    
    .account-nav__item {
        margin: 0;
    }
    
    .account-nav__link {
        padding: var(--spacing-xs) var(--spacing-sm);
    }
    
    .account-nav__link--logout {
        margin-top: 0;
        border-top: none;
        padding-top: var(--spacing-xs);
    }
}

@media (max-width: 576px) {
    .account-page {
        padding: var(--spacing-lg) 0;
    }
    
    .account-header {
        margin-bottom: var(--spacing-lg);
    }
    
    .account-main {
        padding: var(--spacing-md);
    }
    
    .account-nav__list {
        flex-direction: column;
    }
    
    .account-nav__link {
        padding: var(--spacing-sm) var(--spacing-md);
    }
}
</style>

<?php get_footer(); ?> 