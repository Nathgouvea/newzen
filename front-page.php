<?php
/**
 * The main template file for the front page
 *
 * @package ZenSecrets
 */

get_header();
?>

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
      <span class="trust-slider-arrow">
        <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
          <path d="M12 8L20 16L12 24" stroke="#A18A6B" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </span>
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
      <?php
      // Query products from the Mais Vendidos category
      $args = array(
          'post_type' => 'product',
          'posts_per_page' => -1,
          'tax_query' => array(
              array(
                  'taxonomy' => 'product_cat',
                  'field' => 'slug',
                  'terms' => 'mais-vendidos'
              )
          )
      );
      $products = new WP_Query($args);

      if ($products->have_posts()) {
          $product_cards = [];
          while ($products->have_posts()) {
              $products->the_post();
              ob_start();
              get_template_part('template-parts/content', 'product');
              $product_cards[] = ob_get_clean();
          }
          $chunks = array_chunk($product_cards, 4);
          foreach ($chunks as $i => $chunk) {
              echo '<div class="product-slide' . ($i === 0 ? ' active' : '') . '" role="tabpanel" aria-labelledby="slide-' . ($i+1) . '">';
              echo '<div class="product-grid">';
              foreach ($chunk as $card) {
                  echo $card;
              }
              echo '</div></div>';
          }
      } else {
          echo '<p class="no-products">Nenhum produto encontrado na categoria Mais Vendidos.</p>';
      }
      wp_reset_postdata();
      ?>
      <!-- Product Slider Navigation -->
      <div class="product-slider-nav" role="tablist">
        <button class="product-slider-arrow prev" aria-label="Previous products">←</button>
        <div class="product-slider-dots">
          <?php
          if (!empty($chunks)) {
            for ($j = 0; $j < count($chunks); $j++) {
              echo '<button class="product-slider-dot' . ($j === 0 ? ' active' : '') . '" data-slide="' . $j . '" role="tab" aria-controls="slide-' . ($j+1) . '"' . ($j === 0 ? ' aria-selected="true"' : '') . ' aria-label="Ir para slide ' . ($j+1) . '"></button>';
            }
          }
          ?>
        </div>
        <button class="product-slider-arrow next" aria-label="Next products">→</button>
      </div>
    </div>
  </section>

  <!-- Velas Aromáticas Section -->
  <section
    class="featured-products container"
    id="velas-aromaticas"
    role="region"
    aria-label="Velas Aromáticas"
  >
    <div class="section-header">
      <h2 class="section-title">Velas Aromáticas</h2>
    </div>
    <div class="products-grid">
      <?php
      // Query products from the Velas Aromáticas category
      $args = array(
          'post_type' => 'product',
          'posts_per_page' => -1,
          'tax_query' => array(
              array(
                  'taxonomy' => 'product_cat',
                  'field' => 'slug',
                  'terms' => 'velas-aromaticas'
              )
          )
      );

      $products = new WP_Query($args);

      if ($products->have_posts()) {
          while ($products->have_posts()) {
              $products->the_post();
              global $product;
              
              // Include our custom product card template
              get_template_part('template-parts/content', 'product');
          }
      } else {
          echo '<p class="no-products">Nenhum produto encontrado na categoria Velas Aromáticas.</p>';
      }

      // Reset post data
      wp_reset_postdata();
      ?>
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
            src="<?php echo get_template_directory_uri(); ?>/assets/imagens/all-candles.webp"
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
            src="<?php echo get_template_directory_uri(); ?>/assets/imagens/all-aromatizadores.webp"
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
            src="<?php echo get_template_directory_uri(); ?>/assets/imagens/all-homespray.webp"
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
            src="<?php echo get_template_directory_uri(); ?>/assets/imagens/Lembrancinha.webp"
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
