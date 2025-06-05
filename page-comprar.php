<?php
/* Template Name: Comprar Custom */
get_header();
?>
<main>
  <section class="hero hero--unified">
    <div
      class="hero__bg"
      style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/imagens/all-hero.png')"
    ></div>
    <div class="hero__content">
      <h1 class="hero__title">Nossos Produtos</h1>
    </div>
  </section>

  <section class="category-tags wrapper">
    <div class="tags-container">
      <a href="#aromatizadores" class="category-tag">Aromatizadores</a>
      <a href="#home-spray" class="category-tag">Home Spray</a>
      <a href="#velas" class="category-tag">Velas Aromáticas</a>
      <a href="#kits" class="category-tag">Kits Especiais</a>
      <a href="#lembrancinhas" class="category-tag">Lembrancinhas</a>
      <a href="#acessorios" class="category-tag">Acessórios</a>
    </div>
  </section>

  <!-- Mais Vendidos Section -->
  <div class="container">
    <section
      class="featured-products"
      id="todos-produtos"
      role="region"
      aria-label="Todos Produtos"
    >
      <div class="product-slider">
        <div
          class="product-slide active"
          role="tabpanel"
          aria-labelledby="slide-1"
        >
          <div class="product-grid">
            <article class="product-card fade-in">
              <div class="product-card__image-container">
                <img
                  src="<?php echo get_template_directory_uri(); ?>/assets/imagens/vala-bamboo.png"
                  alt="Vela Bamboo"
                  class="product-card__image"
                  loading="lazy"
                  decoding="async"
                />
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
                <img
                  src="<?php echo get_template_directory_uri(); ?>/assets/imagens/homespray-chabranco.png"
                  alt="Home Spray Chá Branco"
                  class="product-card__image"
                  loading="lazy"
                  decoding="async"
                />
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
                <img
                  src="<?php echo get_template_directory_uri(); ?>/assets/imagens/homespray-flordefigo.png"
                  alt="Home Spray Flor de Figo"
                  class="product-card__image"
                  loading="lazy"
                  decoding="async"
                />
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
                <img
                  src="<?php echo get_template_directory_uri(); ?>/assets/imagens/vela-palosanto.png"
                  alt="Vela Palo Santo"
                  class="product-card__image"
                  loading="lazy"
                  decoding="async"
                />
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
      </div>
    </section>
  </div>
</main>
<?php get_footer(); ?> 