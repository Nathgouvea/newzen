<?php
get_header();
?>
<main>
  <!-- Example: Hero Section with Correct Asset Paths -->
  <section class="hero">
    <picture>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/imagens/hero-image.jpg" alt="Hero Image" />
    </picture>
    <div class="hero__content">
      <h1 class="hero__title">Zen Secrets - Harmonia e Bem-Estar Através do Aroma</h1>
      <p>Velas e aromas criados para o seu ritual de bem-estar. Produtos exclusivos Zen Secrets para harmonia e bem-estar em seu ambiente.</p>
    </div>
  </section>
  <!-- Example: Logo -->
  <div class="header__logo">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/imagens/zen-logo.svg" alt="Zen Secrets Logo" class="logo__image" width="100" height="100" />
  </div>
  <!-- Add more sections from index.html here, always updating asset links as above -->
</main>
<?php get_footer(); ?> 