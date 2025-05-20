<?php
/* Template Name: Velas Aromáticas Custom */
get_header();
?>
<main class="products-page">
  <div class="products-intro">
    <h1 class="page-title">Velas Aromáticas</h1>
    <p class="page-description">
      Nossas velas aromáticas são feitas com cera de soja 100% natural e
      fragrâncias premium. Cada vela é cuidadosamente elaborada para criar
      uma atmosfera acolhedora e relaxante em seu ambiente.
    </p>
  </div>

  <div class="products-grid">
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
</main>
<?php get_footer(); ?> 