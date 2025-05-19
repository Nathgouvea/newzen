<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Velas e aromas criados para o seu ritual de bem-estar. Produtos exclusivos Zen Secrets para harmonia e bem-estar em seu ambiente.">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="header">
    <div class="header__container container">
        <div class="header__logo">
            <div class="logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/imagens/zen-logo.svg" 
                         alt="Zen Secrets Logo" 
                         class="logo__image"
                         width="100"
                         height="100">
                </a>
            </div>
        </div>

        <button class="menu-toggle menu-toggle--open" aria-label="Abrir menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
        
        <nav class="nav">
            <div class="nav__inner">
                <button class="menu-toggle menu-toggle--close" aria-label="Fechar menu">
                    <span></span>
                    <span></span>
                </button>
                <ul class="nav__list">
                    <li><a href="<?php echo esc_url(home_url('/')); ?>" class="nav__link">Home</a></li>
                    <li><a href="<?php echo esc_url(home_url('/aromas')); ?>" class="nav__link">Aromas</a></li>
                    <li><a href="<?php echo esc_url(home_url('/velas-aromaticas')); ?>" class="nav__link">Velas Aromáticas</a></li>
                    <li><a href="<?php echo esc_url(home_url('/aromatizadores')); ?>" class="nav__link">Aromatizadores</a></li>
                    <li><a href="<?php echo esc_url(home_url('/acessorios')); ?>" class="nav__link">Acessórios</a></li>
                    <li><a href="<?php echo esc_url(home_url('/kits-especiais')); ?>" class="nav__link">Kits Especiais</a></li>
                    <li><a href="<?php echo esc_url(home_url('/lembrancinhas')); ?>" class="nav__link">Lembrancinhas</a></li>
                    <li><a href="<?php echo esc_url(home_url('/contato')); ?>" class="nav__link">Contato</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header> 