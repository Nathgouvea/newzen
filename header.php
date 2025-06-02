<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Velas e aromas criados para o seu ritual de bem-estar. Produtos exclusivos Zen Secrets para harmonia e bem-estar em seu ambiente." />
    <title>Zen Secrets - Harmonia e Bem-Estar Através do Aroma</title>
    <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/assets/imagens/logo.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        rel="preload"
        as="style"
        href="https://fonts.googleapis.com/css2?family=Arimo:wght@400;700&family=Brown+Sugar&display=swap"
    />
    <link
        href="https://fonts.googleapis.com/css2?family=Arimo:wght@400;700&family=Brown+Sugar&display=swap"
        rel="stylesheet"
    />
    <link
        href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap"
        rel="stylesheet"
    />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        media="print"
        onload="this.media='all'"
    />
    <noscript>
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        />
    </noscript>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css" />
    <?php wp_head(); ?>
</head>
<body>
    <header class="header">
        <div class="header__container container">
            <div class="header__logo">
                <div class="logo">
                    <img
                        src="<?php echo get_template_directory_uri(); ?>/assets/imagens/zen-logo.svg"
                        alt="Zen Secrets Logo"
                        href="index.html"
                        class="logo__image"
                        width="100"
                        height="100"
                    />
                </div>
            </div>

            <button class="menu-toggle menu-toggle--open" aria-label="Abrir menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <nav class="nav">
                <div class="nav__inner">
                    <button
                        class="menu-toggle menu-toggle--close"
                        aria-label="Fechar menu"
                    >
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <div class="nav__mobile-actions">
                        <form class="search-form" role="search">
                            <input
                                type="search"
                                placeholder="Buscar..."
                                aria-label="Search"
                                class="search-input"
                            />
                            <button type="submit" class="search-icon" aria-label="Buscar">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                        <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>" class="user-actions__item" aria-label="Minha conta">
                            <i class="fas fa-user"></i>
                        </a>
                    </div>
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="index.html" class="nav__link active">Início</a>
                        </li>
                        <li class="nav__item">
                            <a href="comprar" class="nav__link">Comprar</a>
                            <ul class="dropdown">
                                <li>
                                    <a href="aromatizadores">Aromatizadores</a>
                                </li>
                                <li><a href="home-spray">Home Spray</a></li>
                                <li><a href="velas-aromaticas">Velas Aromáticas</a></li>
                                <li><a href="kits-especiais">Kits Especiais</a></li>
                                <li><a href="lembrancinhas">Lembrancinhas</a></li>
                                <li><a href="acessorios">Acessórios</a></li>
                            </ul>
                        </li>
                        <li class="nav__item">
                            <a href="aromas" class="nav__link">Sobre os Aromas</a>
                        </li>
                        <li class="nav__item">
                            <a href="contato" class="nav__link">Fale Conosco</a>
                        </li>
                    </ul>
                    <!-- Mobile-only: Search and Account -->
                </div>
            </nav>

            <div class="header__actions">
                <div class="user-actions">
                    <div class="header__nav-search">
                        <div class="search-bar">
                            <form class="search-form" role="search">
                                <input
                                    type="search"
                                    placeholder="Buscar..."
                                    aria-label="Search"
                                    class="search-input"
                                />
                                <button
                                    type="button"
                                    class="search-icon"
                                    aria-label="Toggle search"
                                >
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>" class="user-actions__item" aria-label="Minha conta">
                        <i class="fas fa-user"></i>
                    </a>
                    <a href="<?php echo wc_get_cart_url(); ?>" class="user-actions__item" aria-label="Carrinho">
                        <i class="far fa-shopping-bag"></i>
                        <span class="cart-count"><?php echo WC()->cart ? WC()->cart->get_cart_contents_count() : 0; ?></span>
                    </a>
                </div>
            </div>
        </div>
    </header>
<?php wp_body_open(); ?> 