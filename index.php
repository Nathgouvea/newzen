<?php
/**
 * The main template file
 *
 * @package ZenSecrets
 */

get_header();
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="Velas e aromas criados para o seu ritual de bem-estar. Produtos exclusivos Zen Secrets para harmonia e bem-estar em seu ambiente."
    />
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
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
    <style>
      :root {
        --color-primary: #1a1a1a;
        --color-secondary: #6b4fc4;
        --color-secondary-light: #8c77d1;
        --color-secondary-dark: #4f3a96;
        --color-black: #1b1b1b;
        --color-white: #fafaf7;
        --color-gray-100: #f8f8f8;
        --color-gray-900: #212121;
        --color-text: var(--color-gray-900);
        --color-background: var(--color-white);
        --header-height: 100px;
        --font-family: "Arimo", system-ui, sans-serif;
        --fs-900: clamp(2rem, 5vw, 4.5rem);
        --fs-700: clamp(1.5rem, 4vw, 2rem);
        --fs-600: clamp(1.25rem, 3vw, 1.5rem);
        --fs-400: clamp(0.875rem, 2vw, 1rem);
      }
      body {
        font-family: var(--font-family);
        color: var(--color-text);
        background: var(--color-background);
        line-height: 1.7;
        font-weight: 300;
        font-size: var(--fs-400);
      }
      .container {
        width: min(100% - 2rem, 1200px);
        padding: 0 clamp(1rem, 3vw, 2rem);
        margin: 0 auto;
      }
      .header {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
        background: linear-gradient(
          135deg,
          rgba(60, 60, 60, 0.98) 0%,
          rgba(90, 90, 90, 0.95) 30%,
          rgba(75, 75, 75, 0.95) 50%,
          rgba(90, 90, 90, 0.95) 70%,
          rgba(60, 60, 60, 0.98) 100%
        );
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        backdrop-filter: blur(10px);
      }
      .header__container {
        display: grid;
        grid-template-columns: auto 1fr auto;
        align-items: center;
        height: var(--header-height);
        padding: 0 clamp(1rem, 3vw, 2rem);
        max-width: min(100% - 2rem, 1200px);
        margin: 0 auto;
      }
      .logo__image {
        height: 100px;
        width: auto;
        display: block;
      }
      .nav {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 3rem;
        height: 100%;
      }
      .nav__list {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 2rem;
        height: 100%;
        list-style: none;
        margin: 0;
        padding: 0;
      }
      .nav__link {
        color: var(--color-white);
        text-decoration: none;
        font-size: 0.9375rem;
        font-weight: 500;
        padding: 0.5rem 0.75rem;
        border-radius: 6px;
        letter-spacing: 0.3px;
      }
      .hero {
        position: relative;
        width: 100%;
        height: 62vh;
        overflow: hidden;
        background: var(--color-background);
      }
      .hero picture {
        width: 100%;
        height: 80vh;
        display: flex;
        align-items: flex-end;
        justify-content: center;
      }
      .hero img {
        width: 100%;
        height: 80vh;
        object-fit: cover;
        object-position: center bottom;
      }
      .hero__content {
        position: absolute;
        top: 40%;
        left: 54%;
        transform: translate(-50%, -50%);
        margin: 0 auto;
        width: 100%;
        box-sizing: border-box;
        padding: 4rem 3rem 4rem 3rem;
        border-radius: 18px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        text-align: left;
        gap: 0;
        justify-content: left;
      }
      .hero__title {
        font-family: "Sacramento", cursive !important;
        font-size: 3.5rem;
        font-weight: 400;
        margin-bottom: 1rem;
        color: var(--color-text);
        line-height: 1.2;
      }
    </style>
    <?php wp_head(); ?>
  </head>
  <body>
  <?php get_header();?>

    <main>
      <!-- Hero Section -->
      <section class="hero">
        <picture>
          <source srcset="<?php echo get_template_directory_uri(); ?>/assets/imagens/Foto-tela-inicial-.webp" type="image/webp" />
          <img
            src="<?php echo get_template_directory_uri(); ?>/assets/imagens/Foto-tela-inicial-.webp"
            width="1920"
            height="1080"
            alt="ZenSecrets candle trio"
            fetchpriority="high"
            decoding="async"
          />
        </picture>
        <div class="hero__content">
          <h1 class="hero__title">Ilumine seus sentidos</h1>
          <p class="hero__text">
            Velas e aromas criados para o seu ritual de bem-estar.
          </p>
          <div class="hero__ctas">
            <a class="button hero__cta-primary" href="#mais-vendidos"
              >Comprar Agora</a
            >
            <a class="button hero__cta-secondary" href="#colecoes"
              >Ver Coleções</a
            >
          </div>
        </div>
      </section>

      <!-- Trust Indicators -->
      <section class="trust-indicators">
        <div class="container">
          <h2 class="visually-hidden">Nossos diferenciais</h2>
          <div class="trust-grid">
            <div class="trust-item">
              <i class="far fa-credit-card"></i>
              <div class="trust-item__content">
                <h3 class="trust-item__title">Pagamento facilitado</h3>
                <p class="trust-item__subtitle">
                  Cartão, Pix e Boleto Bancário
                </p>
              </div>
            </div>

            <div class="trust-item">
              <i class="far fa-truck"></i>
              <div class="trust-item__content">
                <h3 class="trust-item__title">Envio para todo Brasil</h3>
                <p class="trust-item__subtitle">Rastreamento disponível</p>
              </div>
            </div>

            <div class="trust-item">
              <i class="fas fa-shield-alt"></i>
              <div class="trust-item__content">
                <h3 class="trust-item__title">Compra Segura</h3>
                <p class="trust-item__subtitle">Seus dados protegidos</p>
              </div>
            </div>

            <a
              href="https://wa.me/5516991626921"
              class="trust-item trust-item--link"
            >
              <i class="fab fa-whatsapp"></i>
              <div class="trust-item__content">
                <h3 class="trust-item__title">Ficou em dúvida?</h3>
                <p class="trust-item__subtitle">Chama no WhatsApp</p>
              </div>
            </a>
          </div>
        </div>
      </section>

      <!-- Mais Vendidos Section -->
      <section
        class="featured-products container"
        id="mais-vendidos"
        role="region"
        aria-label="Mais Vendidos"
      >
        <div class="section-header">
          <h2 class="section-title">Mais Vendidos</h2>
        </div>
        <div class="product-slider">
          <!-- Slide 1 -->
          <div
            class="product-slide active"
            role="tabpanel"
            aria-labelledby="slide-1"
          >
            <div class="product-grid">
              <article class="product-card fade-in">
                <div class="product-card__image-container">
                  <picture>
                    <source
                      srcset="<?php echo get_template_directory_uri(); ?>/assets/imagens/vala-bamboo.webp"
                      type="image/webp"
                    />
                    <img
                      src="<?php echo get_template_directory_uri(); ?>/assets/imagens/vala-bamboo.png"
                      alt="Vela Bamboo"
                      class="product-card__image"
                      loading="lazy"
                      decoding="async"
                      width="400"
                      height="533"
                    />
                  </picture>
                </div>
                <div class="product-card__content">
                  <h3 class="product-card__title">Vela Bamboo</h3>
                  <div class="product-card__footer">
                    <div class="product-card__price">R$69,90</div>
                    <button class="product-card__button">
                      <i class="far fa-bag-shopping"></i>
                      Comprar Agora
                    </button>
                  </div>
                </div>
              </article>

              <article class="product-card fade-in">
                <div class="product-card__image-container">
                  <picture>
                    <source
                      srcset="<?php echo get_template_directory_uri(); ?>/assets/imagens/homespray-chabranco.webp"
                      type="image/webp"
                    />
                    <img
                      src="<?php echo get_template_directory_uri(); ?>/assets/imagens/homespray-chabranco.png"
                      alt="Home Spray Chá Branco"
                      class="product-card__image"
                      loading="lazy"
                      decoding="async"
                      width="400"
                      height="533"
                    />
                  </picture>
                </div>
                <div class="product-card__content">
                  <h3 class="product-card__title">Home Spray Chá Branco</h3>
                  <div class="product-card__footer">
                    <div class="product-card__price">R$75,90</div>
                    <button class="product-card__button">
                      <i class="far fa-bag-shopping"></i>
                      Comprar Agora
                    </button>
                  </div>
                </div>
              </article>

              <article class="product-card fade-in">
                <div class="product-card__image-container">
                  <picture>
                    <source
                      srcset="<?php echo get_template_directory_uri(); ?>/assets/imagens/homespray-flordefigo.webp"
                      type="image/webp"
                    />
                    <img
                      src="<?php echo get_template_directory_uri(); ?>/assets/imagens/homespray-flordefigo.png"
                      alt="Home Spray Flor de Figo"
                      class="product-card__image"
                      loading="lazy"
                      decoding="async"
                      width="400"
                      height="533"
                    />
                  </picture>
                </div>
                <div class="product-card__content">
                  <h3 class="product-card__title">Home Spray Flor de Figo</h3>
                  <div class="product-card__footer">
                    <div class="product-card__price">R$75,90</div>
                    <button class="product-card__button">
                      <i class="far fa-bag-shopping"></i>
                      Comprar Agora
                    </button>
                  </div>
                </div>
              </article>

              <article class="product-card fade-in">
                <div class="product-card__image-container">
                  <picture>
                    <source
                      srcset="<?php echo get_template_directory_uri(); ?>/assets/imagens/vela-palosanto.webp"
                      type="image/webp"
                    />
                    <img
                      src="<?php echo get_template_directory_uri(); ?>/assets/imagens/vela-palosanto.png"
                      alt="Vela Palo Santo"
                      class="product-card__image"
                      loading="lazy"
                      decoding="async"
                      width="400"
                      height="533"
                    />
                  </picture>
                </div>
                <div class="product-card__content">
                  <h3 class="product-card__title">Vela Palo Santo</h3>
                  <div class="product-card__footer">
                    <div class="product-card__price">R$69,90</div>
                    <button class="product-card__button">
                      <i class="far fa-bag-shopping"></i>
                      Comprar Agora
                    </button>
                  </div>
                </div>
              </article>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="product-slide" role="tabpanel" aria-labelledby="slide-2">
            <div class="product-grid">
              <article class="product-card fade-in">
                <div class="product-card__image-container">
                  <picture>
                    <source
                      srcset="<?php echo get_template_directory_uri(); ?>/assets/imagens/vela-chabranco.webp"
                      type="image/webp"
                    />
                    <img
                      src="<?php echo get_template_directory_uri(); ?>/assets/imagens/vela-chabranco.png"
                      alt="Vela Chá Branco"
                      class="product-card__image"
                      loading="lazy"
                      decoding="async"
                      width="400"
                      height="533"
                    />
                  </picture>
                </div>
                <div class="product-card__content">
                  <h3 class="product-card__title">Vela Chá Branco</h3>
                  <div class="product-card__footer">
                    <div class="product-card__price">R$69,90</div>
                    <button class="product-card__button">
                      <i class="far fa-bag-shopping"></i>
                      Comprar Agora
                    </button>
                  </div>
                </div>
              </article>

              <article class="product-card fade-in">
                <div class="product-card__image-container">
                  <picture>
                    <source
                      srcset="<?php echo get_template_directory_uri(); ?>/assets/imagens/vela-flordefigo.webp"
                      type="image/webp"
                    />
                    <img
                      src="<?php echo get_template_directory_uri(); ?>/assets/imagens/vela-flordefigo.png"
                      alt="Vela Flor de Figo"
                      class="product-card__image"
                      loading="lazy"
                      decoding="async"
                      width="400"
                      height="533"
                    />
                  </picture>
                </div>
                <div class="product-card__content">
                  <h3 class="product-card__title">Vela Flor de Figo</h3>
                  <div class="product-card__footer">
                    <div class="product-card__price">R$69,90</div>
                    <button class="product-card__button">
                      <i class="far fa-bag-shopping"></i>
                      Comprar Agora
                    </button>
                  </div>
                </div>
              </article>

              <article class="product-card fade-in">
                <div class="product-card__image-container">
                  <picture>
                    <source
                      srcset="<?php echo get_template_directory_uri(); ?>/assets/imagens/homespray-chabranco.webp"
                      type="image/webp"
                    />
                    <img
                      src="<?php echo get_template_directory_uri(); ?>/assets/imagens/homespray-chabranco.png"
                      alt="Home Spray Chá Branco"
                      class="product-card__image"
                      loading="lazy"
                      decoding="async"
                      width="400"
                      height="533"
                    />
                  </picture>
                </div>
                <div class="product-card__content">
                  <h3 class="product-card__title">Home Spray Chá Branco</h3>
                  <div class="product-card__footer">
                    <div class="product-card__price">R$75,90</div>
                    <button class="product-card__button">
                      <i class="far fa-bag-shopping"></i>
                      Comprar Agora
                    </button>
                  </div>
                </div>
              </article>

              <article class="product-card fade-in">
                <div class="product-card__image-container">
                  <picture>
                    <source
                      srcset="<?php echo get_template_directory_uri(); ?>/assets/imagens/homespray-flordefigo.webp"
                      type="image/webp"
                    />
                    <img
                      src="<?php echo get_template_directory_uri(); ?>/assets/imagens/homespray-flordefigo.png"
                      alt="Home Spray Flor de Figo"
                      class="product-card__image"
                      loading="lazy"
                      decoding="async"
                      width="400"
                      height="533"
                    />
                  </picture>
                </div>
                <div class="product-card__content">
                  <h3 class="product-card__title">Home Spray Flor de Figo</h3>
                  <div class="product-card__footer">
                    <div class="product-card__price">R$75,90</div>
                    <button class="product-card__button">
                      <i class="far fa-bag-shopping"></i>
                      Comprar Agora
                    </button>
                  </div>
                </div>
              </article>
            </div>
          </div>

          <!-- Product Slider Navigation -->
          <div class="product-slider-nav" role="tablist">
            <button
              class="product-slider-arrow prev"
              aria-label="Previous products"
            >
              ←
            </button>
            <div class="product-slider-dots">
              <button
                class="product-slider-dot active"
                data-slide="0"
                role="tab"
                aria-controls="slide-1"
                aria-selected="true"
                aria-label="Ir para slide 1"
              ></button>
              <button
                class="product-slider-dot"
                data-slide="1"
                role="tab"
                aria-controls="slide-2"
                aria-label="Ir para slide 2"
              ></button>
            </div>
            <button
              class="product-slider-arrow next"
              aria-label="Next products"
            >
              →
            </button>
          </div>
        </div>
      </section>

      <!-- Novidades Section -->
      <section
        class="featured-products container"
        id="novidades"
        role="region"
        aria-label="Novidades"
      >
        <div class="section-header">
          <h2 class="section-title">Novidades</h2>
        </div>
        <div class="product-slider">
          <!-- Slide 1 -->
          <div
            class="product-slide active"
            role="tabpanel"
            aria-labelledby="slide-1"
          >
            <div class="product-grid">
              <article class="product-card fade-in">
                <div class="product-card__image-container">
                  <picture>
                    <source
                      srcset="<?php echo get_template_directory_uri(); ?>/assets/imagens/vala-bamboo.webp"
                      type="image/webp"
                    />
                    <img
                      src="<?php echo get_template_directory_uri(); ?>/assets/imagens/vala-bamboo.png"
                      alt="Vela Bamboo"
                      class="product-card__image"
                      loading="lazy"
                      decoding="async"
                      width="400"
                      height="533"
                    />
                  </picture>
                </div>
                <div class="product-card__content">
                  <h3 class="product-card__title">Vela Bamboo</h3>
                  <div class="product-card__footer">
                    <div class="product-card__price">R$69,90</div>
                    <button class="product-card__button">
                      <i class="far fa-bag-shopping"></i>
                      Comprar Agora
                    </button>
                  </div>
                </div>
              </article>

              <article class="product-card fade-in">
                <div class="product-card__image-container">
                  <picture>
                    <source
                      srcset="<?php echo get_template_directory_uri(); ?>/assets/imagens/homespray-chabranco.webp"
                      type="image/webp"
                    />
                    <img
                      src="<?php echo get_template_directory_uri(); ?>/assets/imagens/homespray-chabranco.png"
                      alt="Home Spray Chá Branco"
                      class="product-card__image"
                      loading="lazy"
                      decoding="async"
                      width="400"
                      height="533"
                    />
                  </picture>
                </div>
                <div class="product-card__content">
                  <h3 class="product-card__title">Home Spray Chá Branco</h3>
                  <div class="product-card__footer">
                    <div class="product-card__price">R$75,90</div>
                    <button class="product-card__button">
                      <i class="far fa-bag-shopping"></i>
                      Comprar Agora
                    </button>
                  </div>
                </div>
              </article>

              <article class="product-card fade-in">
                <div class="product-card__image-container">
                  <picture>
                    <source
                      srcset="<?php echo get_template_directory_uri(); ?>/assets/imagens/homespray-flordefigo.webp"
                      type="image/webp"
                    />
                    <img
                      src="<?php echo get_template_directory_uri(); ?>/assets/imagens/homespray-flordefigo.png"
                      alt="Home Spray Flor de Figo"
                      class="product-card__image"
                      loading="lazy"
                      decoding="async"
                      width="400"
                      height="533"
                    />
                  </picture>
                </div>
                <div class="product-card__content">
                  <h3 class="product-card__title">Home Spray Flor de Figo</h3>
                  <div class="product-card__footer">
                    <div class="product-card__price">R$75,90</div>
                    <button class="product-card__button">
                      <i class="far fa-bag-shopping"></i>
                      Comprar Agora
                    </button>
                  </div>
                </div>
              </article>

              <article class="product-card fade-in">
                <div class="product-card__image-container">
                  <picture>
                    <source
                      srcset="<?php echo get_template_directory_uri(); ?>/assets/imagens/vela-palosanto.webp"
                      type="image/webp"
                    />
                    <img
                      src="<?php echo get_template_directory_uri(); ?>/assets/imagens/vela-palosanto.png"
                      alt="Vela Palo Santo"
                      class="product-card__image"
                      loading="lazy"
                      decoding="async"
                      width="400"
                      height="533"
                    />
                  </picture>
                </div>
                <div class="product-card__content">
                  <h3 class="product-card__title">Vela Palo Santo</h3>
                  <div class="product-card__footer">
                    <div class="product-card__price">R$69,90</div>
                    <button class="product-card__button">
                      <i class="far fa-bag-shopping"></i>
                      Comprar Agora
                    </button>
                  </div>
                </div>
              </article>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="product-slide" role="tabpanel" aria-labelledby="slide-2">
            <div class="product-grid">
              <article class="product-card fade-in">
                <div class="product-card__image-container">
                  <picture>
                    <source
                      srcset="<?php echo get_template_directory_uri(); ?>/assets/imagens/vela-chabranco.webp"
                      type="image/webp"
                    />
                    <img
                      src="<?php echo get_template_directory_uri(); ?>/assets/imagens/vela-chabranco.png"
                      alt="Vela Chá Branco"
                      class="product-card__image"
                      loading="lazy"
                      decoding="async"
                      width="400"
                      height="533"
                    />
                  </picture>
                </div>
                <div class="product-card__content">
                  <h3 class="product-card__title">Vela Chá Branco</h3>
                  <div class="product-card__footer">
                    <div class="product-card__price">R$69,90</div>
                    <button class="product-card__button">
                      <i class="far fa-bag-shopping"></i>
                      Comprar Agora
                    </button>
                  </div>
                </div>
              </article>

              <article class="product-card fade-in">
                <div class="product-card__image-container">
                  <picture>
                    <source
                      srcset="<?php echo get_template_directory_uri(); ?>/assets/imagens/vela-flordefigo.webp"
                      type="image/webp"
                    />
                    <img
                      src="<?php echo get_template_directory_uri(); ?>/assets/imagens/vela-flordefigo.png"
                      alt="Vela Flor de Figo"
                      class="product-card__image"
                      loading="lazy"
                      decoding="async"
                      width="400"
                      height="533"
                    />
                  </picture>
                </div>
                <div class="product-card__content">
                  <h3 class="product-card__title">Vela Flor de Figo</h3>
                  <div class="product-card__footer">
                    <div class="product-card__price">R$69,90</div>
                    <button class="product-card__button">
                      <i class="far fa-bag-shopping"></i>
                      Comprar Agora
                    </button>
                  </div>
                </div>
              </article>

              <article class="product-card fade-in">
                <div class="product-card__image-container">
                  <picture>
                    <source
                      srcset="<?php echo get_template_directory_uri(); ?>/assets/imagens/homespray-chabranco.webp"
                      type="image/webp"
                    />
                    <img
                      src="<?php echo get_template_directory_uri(); ?>/assets/imagens/homespray-chabranco.png"
                      alt="Home Spray Chá Branco"
                      class="product-card__image"
                      loading="lazy"
                      decoding="async"
                      width="400"
                      height="533"
                    />
                  </picture>
                </div>
                <div class="product-card__content">
                  <h3 class="product-card__title">Home Spray Chá Branco</h3>
                  <div class="product-card__footer">
                    <div class="product-card__price">R$75,90</div>
                    <button class="product-card__button">
                      <i class="far fa-bag-shopping"></i>
                      Comprar Agora
                    </button>
                  </div>
                </div>
              </article>

              <article class="product-card fade-in">
                <div class="product-card__image-container">
                  <picture>
                    <source
                      srcset="<?php echo get_template_directory_uri(); ?>/assets/imagens/homespray-flordefigo.webp"
                      type="image/webp"
                    />
                    <img
                      src="<?php echo get_template_directory_uri(); ?>/assets/imagens/homespray-flordefigo.png"
                      alt="Home Spray Flor de Figo"
                      class="product-card__image"
                      loading="lazy"
                      decoding="async"
                      width="400"
                      height="533"
                    />
                  </picture>
                </div>
                <div class="product-card__content">
                  <h3 class="product-card__title">Home Spray Flor de Figo</h3>
                  <div class="product-card__footer">
                    <div class="product-card__price">R$75,90</div>
                    <button class="product-card__button">
                      <i class="far fa-bag-shopping"></i>
                      Comprar Agora
                    </button>
                  </div>
                </div>
              </article>
            </div>
          </div>

          <!-- Product Slider Navigation -->
          <div class="product-slider-nav" role="tablist">
            <button
              class="product-slider-arrow prev"
              aria-label="Previous products"
            >
              ←
            </button>
            <div class="product-slider-dots">
              <button
                class="product-slider-dot active"
                data-slide="0"
                role="tab"
                aria-controls="slide-1"
                aria-selected="true"
                aria-label="Ir para slide 1"
              ></button>
              <button
                class="product-slider-dot"
                data-slide="1"
                role="tab"
                aria-controls="slide-2"
                aria-label="Ir para slide 2"
              ></button>
            </div>
            <button
              class="product-slider-arrow next"
              aria-label="Next products"
            >
              →
            </button>
          </div>
        </div>
      </section>

      <!-- Brand Promise Strip -->
      <section class="brand-strip">
        <div class="container" style="max-width: 1200px">
          <div class="brand-strip__content">
            <div class="brand-strip__text">
              <h2>Aromas que transformam ambientes</h2>
              <p>
                Na Zen Secrets, acreditamos no poder dos aromas para criar
                experiências únicas e memoráveis. Cada produto é cuidadosamente
                elaborado para trazer harmonia e bem-estar ao seu espaço. Nossas
                fragrâncias exclusivas são desenvolvidas por especialistas,
                combinando ingredientes naturais de alta qualidade para
                proporcionar momentos de verdadeiro relaxamento e conexão com
                seus sentidos.
              </p>
            </div>
            <div class="brand-strip__image">
              <img
                src="<?php echo get_template_directory_uri(); ?>/assets/imagens/all-chabranco.png"
                alt="Produtos ZenSecrets em ambiente zen"
                loading="lazy"
                decoding="async"
                width="600"
                height="400"
              />
            </div>
          </div>
        </div>
        <section class="image-mosaic">
          <figure class="mosaic-item mosaic-item--large">
            <img
              src="<?php echo get_template_directory_uri(); ?>/assets/imagens/vala-bamboo.png"
              alt="Vela aromática em ambiente aconchegante"
              loading="lazy"
              decoding="async"
              width="400"
              height="533"
            />
            <figcaption>
              <a href="#" class="quick-buy-link">Bamboo</a>
            </figcaption>
          </figure>
          <figure class="mosaic-item">
            <img
              src="<?php echo get_template_directory_uri(); ?>/assets/imagens/all-flordefigo.png"
              alt="Aromatizador em mesa de centro"
              loading="lazy"
              decoding="async"
              width="400"
              height="533"
            />
            <figcaption>
              <a href="#" class="quick-buy-link">Flor de Figo</a>
            </figcaption>
          </figure>
          <figure class="mosaic-item">
            <img
              src="<?php echo get_template_directory_uri(); ?>/assets/imagens/all-chabranco.png"
              alt="Home spray em bancada"
              loading="lazy"
              decoding="async"
              width="400"
              height="533"
            />
            <figcaption>
              <a href="#" class="quick-buy-link">Chá Branco</a>
            </figcaption>
          </figure>
          <figure class="mosaic-item">
            <img
              src="<?php echo get_template_directory_uri(); ?>/assets/imagens/marinho.png"
              alt="Home spray em bancada"
              loading="lazy"
              decoding="async"
              width="400"
              height="533"
            />
            <figcaption>
              <a href="#" class="quick-buy-link">Marinho</a>
            </figcaption>
          </figure>
          <figure class="mosaic-item">
            <img
              src="<?php echo get_template_directory_uri(); ?>/assets/imagens/vela-palosanto.png"
              alt="Home spray em bancada"
              loading="lazy"
              decoding="async"
              width="400"
              height="533"
            />
            <figcaption>
              <a href="#" class="quick-buy-link">Palo Santo</a>
            </figcaption>
          </figure>
        </section>
      </section>

      <!-- Sobre os Aromas Section -->
      <section class="aromas-section">
        <div class="container">
          <div class="section-header">
            <h2 class="section-title">Nossos Produtos Queridos</h2>
            <p class="section-description">
              Descubra nossa linha completa de produtos para harmonizar seu
              ambiente
            </p>
          </div>

          <div class="categories-grid">
            <!-- Velas Aromáticas Card -->
            <a
              href="velas-aromaticas.html"
              class="category-card category-card--link"
            >
              <img
                src="<?php echo get_template_directory_uri(); ?>/assets/imagens/vela-chabranco.png"
                alt="Velas Aromáticas Zen Secrets"
                class="category-card__image"
                loading="lazy"
                decoding="async"
                width="400"
                height="533"
              />
              <div class="category-card__overlay">
                <h3 class="category-card__title">Velas Aromáticas</h3>
                <p class="category-card__description">
                  Fragrâncias exclusivas para criar momentos especiais em seu
                  ambiente
                </p>
              </div>
            </a>

            <!-- Aromatizador Card -->
            <a
              href="aromatizadores.html"
              class="category-card category-card--link"
            >
              <img
                src="<?php echo get_template_directory_uri(); ?>/assets/imagens/homespray-chabranco.png"
                alt="Aromatizadores Zen Secrets"
                class="category-card__image"
                loading="lazy"
                decoding="async"
                width="400"
                height="533"
              />
              <div class="category-card__overlay">
                <h3 class="category-card__title">Aromatizadores</h3>
                <p class="category-card__description">
                  Perfume seu espaço com nossas essências naturais duradouras
                </p>
              </div>
            </a>

            <!-- Home Spray Card -->
            <a href="home-spray.html" class="category-card category-card--link">
              <img
                src="<?php echo get_template_directory_uri(); ?>/assets/imagens/homespray-flordefigo.png"
                alt="Home Sprays Zen Secrets"
                class="category-card__image"
                loading="lazy"
                decoding="async"
                width="400"
                height="533"
              />
              <div class="category-card__overlay">
                <h3 class="category-card__title">Home Spray</h3>
                <p class="category-card__description">
                  Fragrâncias refrescantes para uma atmosfera instantaneamente
                  agradável
                </p>
              </div>
            </a>
          </div>
        </div>
      </section>

      <!-- Kits Especiais Section -->
      <section
        id="kits"
        class="featured-products container"
        aria-label="Kits Especiais"
      >
        <div class="section-header">
          <h2 class="section-title">Kits Especiais</h2>
        </div>
        <div class="product-slider">
          <!-- Slide 1 -->
          <div
            class="product-slide active"
            role="tabpanel"
            aria-labelledby="slide-1"
          >
            <div class="product-grid">
              <article class="product-card fade-in">
                <div class="product-card__image-container">
                  <picture>
                    <source
                      srcset="<?php echo get_template_directory_uri(); ?>/assets/imagens/vala-bamboo.webp"
                      type="image/webp"
                    />
                    <img
                      src="<?php echo get_template_directory_uri(); ?>/assets/imagens/vala-bamboo.png"
                      alt="Vela Bamboo"
                      class="product-card__image"
                      loading="lazy"
                      decoding="async"
                      width="400"
                      height="533"
                    />
                  </picture>
                </div>
                <div class="product-card__content">
                  <h3 class="product-card__title">Vela Bamboo</h3>
                  <div class="product-card__footer">
                    <div class="product-card__price">R$69,90</div>
                    <button class="product-card__button">
                      <i class="far fa-bag-shopping"></i>
                      Comprar Agora
                    </button>
                  </div>
                </div>
              </article>

              <article class="product-card fade-in">
                <div class="product-card__image-container">
                  <picture>
                    <source
                      srcset="<?php echo get_template_directory_uri(); ?>/assets/imagens/homespray-chabranco.webp"
                      type="image/webp"
                    />
                    <img
                      src="<?php echo get_template_directory_uri(); ?>/assets/imagens/homespray-chabranco.png"
                      alt="Home Spray Chá Branco"
                      class="product-card__image"
                      loading="lazy"
                      decoding="async"
                      width="400"
                      height="533"
                    />
                  </picture>
                </div>
                <div class="product-card__content">
                  <h3 class="product-card__title">Home Spray Chá Branco</h3>
                  <div class="product-card__footer">
                    <div class="product-card__price">R$75,90</div>
                    <button class="product-card__button">
                      <i class="far fa-bag-shopping"></i>
                      Comprar Agora
                    </button>
                  </div>
                </div>
              </article>

              <article class="product-card fade-in">
                <div class="product-card__image-container">
                  <picture>
                    <source
                      srcset="<?php echo get_template_directory_uri(); ?>/assets/imagens/homespray-flordefigo.webp"
                      type="image/webp"
                    />
                    <img
                      src="<?php echo get_template_directory_uri(); ?>/assets/imagens/homespray-flordefigo.png"
                      alt="Home Spray Flor de Figo"
                      class="product-card__image"
                      loading="lazy"
                      decoding="async"
                      width="400"
                      height="533"
                    />
                  </picture>
                </div>
                <div class="product-card__content">
                  <h3 class="product-card__title">Home Spray Flor de Figo</h3>
                  <div class="product-card__footer">
                    <div class="product-card__price">R$75,90</div>
                    <button class="product-card__button">
                      <i class="far fa-bag-shopping"></i>
                      Comprar Agora
                    </button>
                  </div>
                </div>
              </article>

              <article class="product-card fade-in">
                <div class="product-card__image-container">
                  <picture>
                    <source
                      srcset="<?php echo get_template_directory_uri(); ?>/assets/imagens/vela-palosanto.webp"
                      type="image/webp"
                    />
                    <img
                      src="<?php echo get_template_directory_uri(); ?>/assets/imagens/vela-palosanto.png"
                      alt="Vela Palo Santo"
                      class="product-card__image"
                      loading="lazy"
                      decoding="async"
                      width="400"
                      height="533"
                    />
                  </picture>
                </div>
                <div class="product-card__content">
                  <h3 class="product-card__title">Vela Palo Santo</h3>
                  <div class="product-card__footer">
                    <div class="product-card__price">R$69,90</div>
                    <button class="product-card__button">
                      <i class="far fa-bag-shopping"></i>
                      Comprar Agora
                    </button>
                  </div>
                </div>
              </article>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="product-slide" role="tabpanel" aria-labelledby="slide-2">
            <div class="product-grid">
              <article class="product-card fade-in">
                <div class="product-card__image-container">
                  <picture>
                    <source
                      srcset="<?php echo get_template_directory_uri(); ?>/assets/imagens/vela-chabranco.webp"
                      type="image/webp"
                    />
                    <img
                      src="<?php echo get_template_directory_uri(); ?>/assets/imagens/vela-chabranco.png"
                      alt="Vela Chá Branco"
                      class="product-card__image"
                      loading="lazy"
                      decoding="async"
                      width="400"
                      height="533"
                    />
                  </picture>
                </div>
                <div class="product-card__content">
                  <h3 class="product-card__title">Vela Chá Branco</h3>
                  <div class="product-card__footer">
                    <div class="product-card__price">R$69,90</div>
                    <button class="product-card__button">
                      <i class="far fa-bag-shopping"></i>
                      Comprar Agora
                    </button>
                  </div>
                </div>
              </article>

              <article class="product-card fade-in">
                <div class="product-card__image-container">
                  <picture>
                    <source
                      srcset="<?php echo get_template_directory_uri(); ?>/assets/imagens/vela-flordefigo.webp"
                      type="image/webp"
                    />
                    <img
                      src="<?php echo get_template_directory_uri(); ?>/assets/imagens/vela-flordefigo.png"
                      alt="Vela Flor de Figo"
                      class="product-card__image"
                      loading="lazy"
                      decoding="async"
                      width="400"
                      height="533"
                    />
                  </picture>
                </div>
                <div class="product-card__content">
                  <h3 class="product-card__title">Vela Flor de Figo</h3>
                  <div class="product-card__footer">
                    <div class="product-card__price">R$69,90</div>
                    <button class="product-card__button">
                      <i class="far fa-bag-shopping"></i>
                      Comprar Agora
                    </button>
                  </div>
                </div>
              </article>

              <article class="product-card fade-in">
                <div class="product-card__image-container">
                  <picture>
                    <source
                      srcset="<?php echo get_template_directory_uri(); ?>/assets/imagens/homespray-chabranco.webp"
                      type="image/webp"
                    />
                    <img
                      src="<?php echo get_template_directory_uri(); ?>/assets/imagens/homespray-chabranco.png"
                      alt="Home Spray Chá Branco"
                      class="product-card__image"
                      loading="lazy"
                      decoding="async"
                      width="400"
                      height="533"
                    />
                  </picture>
                </div>
                <div class="product-card__content">
                  <h3 class="product-card__title">Home Spray Chá Branco</h3>
                  <div class="product-card__footer">
                    <div class="product-card__price">R$75,90</div>
                    <button class="product-card__button">
                      <i class="far fa-bag-shopping"></i>
                      Comprar Agora
                    </button>
                  </div>
                </div>
              </article>

              <article class="product-card fade-in">
                <div class="product-card__image-container">
                  <picture>
                    <source
                      srcset="<?php echo get_template_directory_uri(); ?>/assets/imagens/homespray-flordefigo.webp"
                      type="image/webp"
                    />
                    <img
                      src="<?php echo get_template_directory_uri(); ?>/assets/imagens/homespray-flordefigo.png"
                      alt="Home Spray Flor de Figo"
                      class="product-card__image"
                      loading="lazy"
                      decoding="async"
                      width="400"
                      height="533"
                    />
                  </picture>
                </div>
                <div class="product-card__content">
                  <h3 class="product-card__title">Home Spray Flor de Figo</h3>
                  <div class="product-card__footer">
                    <div class="product-card__price">R$75,90</div>
                    <button class="product-card__button">
                      <i class="far fa-bag-shopping"></i>
                      Comprar Agora
                    </button>
                  </div>
                </div>
              </article>
            </div>
          </div>

          <!-- Product Slider Navigation -->
          <div class="product-slider-nav" role="tablist">
            <button
              class="product-slider-arrow prev"
              aria-label="Previous products"
            >
              ←
            </button>
            <div class="product-slider-dots">
              <button
                class="product-slider-dot active"
                data-slide="0"
                role="tab"
                aria-controls="slide-1"
                aria-selected="true"
                aria-label="Ir para slide 1"
              ></button>
              <button
                class="product-slider-dot"
                data-slide="1"
                role="tab"
                aria-controls="slide-2"
                aria-label="Ir para slide 2"
              ></button>
            </div>
            <button
              class="product-slider-arrow next"
              aria-label="Next products"
            >
              →
            </button>
          </div>
        </div>
      </section>

      <!-- Newsletter moved to footer -->
      <section class="custom-order">
        <div class="container">
          <div class="custom-order__container">
            <div class="custom-order__content">
              <h2 class="custom-order__title">
                Encomende com a gente sua lembrancinha
              </h2>
              <p class="custom-order__text">
                Torne seu evento ainda mais especial com nossas lembrancinhas
                personalizadas. Criamos produtos únicos que vão marcar o seu
                momento e encantar seus convidados.
              </p>
              <div class="custom-order__features">
                <div class="custom-order__feature">
                  <i class="fas fa-gift"></i>
                  <span class="custom-order__feature-text"
                    >Produtos personalizados para seu evento</span
                  >
                </div>
                <div class="custom-order__feature">
                  <i class="fas fa-heart"></i>
                  <span class="custom-order__feature-text"
                    >Fragrâncias exclusivas</span
                  >
                </div>
                <div class="custom-order__feature">
                  <i class="fas fa-star"></i>
                  <span class="custom-order__feature-text"
                    >Embalagens especiais</span
                  >
                </div>
                <div class="custom-order__feature">
                  <i class="fas fa-check-circle"></i>
                  <span class="custom-order__feature-text"
                    >Atendimento personalizado</span
                  >
                </div>
              </div>
              <div class="custom-order__cta-wrapper">
                <a href="https://wa.me/5516991626921" class="custom-order__cta">
                  <i class="fab fa-whatsapp"></i>
                  Faça seu pedido pelo WhatsApp
                </a>
              </div>
            </div>
            <div class="custom-order__image-wrapper">
              <img
                src="<?php echo get_template_directory_uri(); ?>/assets/imagens/lembrancinhas.png"
                alt="Lembrancinhas personalizadas Zen Secrets"
                class="custom-order__image"
                loading="lazy"
                decoding="async"
                width="600"
                height="400"
              />
            </div>
          </div>
        </div>
      </section>
    </main>

    <?php get_footer(); ?>

    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/product-slider.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/slider.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/search.js"></script>
  </body>
</html>
