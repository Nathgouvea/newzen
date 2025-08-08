<?php
/* Template Name: Comprar Custom */
get_header();
?>
<main>
  <section class="hero hero--unified">
    <div
      class="hero__bg"
      style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/imagens/Foto-tela-inicial-.webp'), url('<?php echo get_template_directory_uri(); ?>/assets/imagens/hero-zen.webp')"
    ></div>
    <div class="hero__content">
      <h1 class="hero__title">Nossos Produtos</h1>
    </div>
  </section>

  <section class="category-tags wrapper">
    <div class="tags-container">
      <a href="#todos-produtos" class="category-tag active">Todos</a>
      <a href="#aromatizadores" class="category-tag">Aromatizadores</a>
      <a href="#home-spray" class="category-tag">Home Spray</a>
      <a href="#velas" class="category-tag">Velas Aromáticas</a>
      <a href="#kits" class="category-tag">Kits Especiais</a>
      <a href="#lembrancinhas" class="category-tag">Lembrancinhas</a>
      <a href="#acessorios" class="category-tag">Acessórios</a>
    </div>
  </section>

  <div class="container">
    <!-- Todos os Produtos Section -->
    <section
      class="featured-products"
      id="todos-produtos"
      role="region"
      aria-label="Todos Produtos"
    >
      <div class="product-grid">
        <article class="product-card fade-in" data-category="velas">
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

        <article class="product-card fade-in" data-category="home-spray">
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

        <article class="product-card fade-in" data-category="home-spray">
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

        <article class="product-card fade-in" data-category="velas">
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
    </section>

    <!-- Aromatizadores Section -->
    <section
      class="featured-products"
      id="aromatizadores"
      role="region"
      aria-label="Aromatizadores"
      style="display: none;"
    >
      <div class="product-grid">
        <article class="product-card fade-in">
          <div class="product-card__image-container">
            <img
              src="<?php echo get_template_directory_uri(); ?>/assets/imagens/aromatizador-chabranco.webp"
              alt="Aromatizador Chá Branco"
              class="product-card__image"
              loading="lazy"
              decoding="async"
            />
          </div>
          <div class="product-card__content">
            <h3 class="product-card__title">Aromatizador Chá Branco</h3>
            <div class="product-card__footer">
              <div class="product-card__price">R$89,90</div>
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
              src="<?php echo get_template_directory_uri(); ?>/assets/imagens/aromatizador-flordefigo.webp"
              alt="Aromatizador Flor de Figo"
              class="product-card__image"
              loading="lazy"
              decoding="async"
            />
          </div>
          <div class="product-card__content">
            <h3 class="product-card__title">Aromatizador Flor de Figo</h3>
            <div class="product-card__footer">
              <div class="product-card__price">R$89,90</div>
              <button class="product-card__button">
                <i class="far fa-bag-shopping"></i>
                Comprar Agora
              </button>
            </div>
          </div>
        </article>
      </div>
    </section>

    <!-- Home Spray Section -->
    <section
      class="featured-products"
      id="home-spray"
      role="region"
      aria-label="Home Spray"
      style="display: none;"
    >
      <div class="product-grid">
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
      </div>
    </section>

    <!-- Velas Aromáticas Section -->
    <section
      class="featured-products"
      id="velas"
      role="region"
      aria-label="Velas Aromáticas"
      style="display: none;"
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
    </section>

    <!-- Kits Especiais Section -->
    <section
      class="featured-products"
      id="kits"
      role="region"
      aria-label="Kits Especiais"
      style="display: none;"
    >
      <div class="product-grid">
        <article class="product-card fade-in">
          <div class="product-card__image-container">
            <img
              src="<?php echo get_template_directory_uri(); ?>/assets/imagens/Kit-cha-Branco-.webp"
              alt="Kit Chá Branco"
              class="product-card__image"
              loading="lazy"
              decoding="async"
            />
          </div>
          <div class="product-card__content">
            <h3 class="product-card__title">Kit Chá Branco</h3>
            <div class="product-card__footer">
              <div class="product-card__price">R$159,90</div>
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
              src="<?php echo get_template_directory_uri(); ?>/assets/imagens/Kit-F-Figo-.webp"
              alt="Kit Flor de Figo"
              class="product-card__image"
              loading="lazy"
              decoding="async"
            />
          </div>
          <div class="product-card__content">
            <h3 class="product-card__title">Kit Flor de Figo</h3>
            <div class="product-card__footer">
              <div class="product-card__price">R$159,90</div>
              <button class="product-card__button">
                <i class="far fa-bag-shopping"></i>
                Comprar Agora
              </button>
            </div>
          </div>
        </article>
      </div>
    </section>

    <!-- Lembrancinhas Section -->
    <section
      class="featured-products"
      id="lembrancinhas"
      role="region"
      aria-label="Lembrancinhas"
      style="display: none;"
    >
      <div class="product-grid">
        <article class="product-card fade-in">
          <div class="product-card__image-container">
            <img
              src="<?php echo get_template_directory_uri(); ?>/assets/imagens/lembrancinhas.webp"
              alt="Lembrancinhas"
              class="product-card__image"
              loading="lazy"
              decoding="async"
            />
          </div>
          <div class="product-card__content">
            <h3 class="product-card__title">Lembrancinhas Personalizadas</h3>
            <div class="product-card__footer">
              <div class="product-card__price">A partir de R$29,90</div>
              <button class="product-card__button">
                <i class="far fa-bag-shopping"></i>
                Comprar Agora
              </button>
            </div>
          </div>
        </article>
      </div>
    </section>

    <!-- Acessórios Section -->
    <section
      class="featured-products"
      id="acessorios"
      role="region"
      aria-label="Acessórios"
      style="display: none;"
    >
      <div class="product-grid">
        <article class="product-card fade-in">
          <div class="product-card__image-container">
            <img
              src="<?php echo get_template_directory_uri(); ?>/assets/imagens/vela-bamboo.png"
              alt="Suporte para Vela"
              class="product-card__image"
              loading="lazy"
              decoding="async"
            />
          </div>
          <div class="product-card__content">
            <h3 class="product-card__title">Suporte para Vela</h3>
            <div class="product-card__footer">
              <div class="product-card__price">R$45,90</div>
              <button class="product-card__button">
                <i class="far fa-bag-shopping"></i>
                Comprar Agora
              </button>
            </div>
          </div>
        </article>
      </div>
    </section>
  </div>
</main>

<?php get_footer(); ?> 