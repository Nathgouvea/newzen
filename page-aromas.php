<?php
/* Template Name: Aromas Custom */
get_header();
?>
<main class="aromas-page">
  <!-- HERO -->
  <section class="hero hero--unified">
    <div
      class="hero__bg"
      style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/imagens/all-hero.png')"
    ></div>
    <div class="hero__content">
      <h1 class="hero__title">Nossos Aromas</h1>
    </div>
  </section>

  <section class="category-tags wrapper">
    <div class="tags-container">
      <a href="#figo" class="category-tag">Flor de Figo</a>
      <a href="#chabranco" class="category-tag">Chá Branco</a>
      <a href="#bamboo" class="category-tag">Bamboo</a>
      <a href="#marinho" class="category-tag">Marinho</a>
      <a href="#palosanto" class="category-tag">Palo Santo</a>
    </div>
  </section>

  <div class="container">
    <section class="aroma-accordion">
      <details id="figo" open>
        <summary>Flor de Figo</summary>
        <div class="aroma-content">
          <div class="aroma-image-container">
            <img
              src="<?php echo get_template_directory_uri(); ?>/assets/imagens/all-flordefigo.png"
              alt="Flor de Figo"
              class="aroma-image"
              loading="lazy"
            />
          </div>
          <div class="aroma-content-right">
            <div class="aroma-details">
              <div class="aroma-details-row">
                <div class="aroma-info">
                  <h3>Notas de Topo</h3>
                  <p>Bergamota, Limão Siciliano</p>
                </div>
                <div class="aroma-info">
                  <h3>Notas de Coração</h3>
                  <p>Flor de Figo, Jasmim, Lírio</p>
                </div>
                <div class="aroma-info">
                  <h3>Notas de Fundo</h3>
                  <p>Âmbar, Almíscar, Madeira</p>
                </div>
              </div>
            </div>
            <div class="aroma-notes">
              <h2>Características</h2>
              <div class="aroma-description">
                <p>
                  Uma fragrância sofisticada que combina a doçura da flor de
                  figo com notas cítricas e florais. Perfeita para criar um
                  ambiente elegante e acolhedor.
                </p>
              </div>
            </div>
          </div>
        </div>
      </details>

      <details id="chabranco">
        <summary>Chá Branco</summary>
        <div class="aroma-content">
          <div class="aroma-image-container">
            <img
              src="<?php echo get_template_directory_uri(); ?>/assets/imagens/all-chabranco.png"
              alt="Chá Branco"
              class="aroma-image"
              loading="lazy"
            />
          </div>
          <div class="aroma-content-right">
            <div class="aroma-details">
              <div class="aroma-details-row">
                <div class="aroma-info">
                  <h3>Notas de Topo</h3>
                  <p>Bergamota, Limão Siciliano</p>
                </div>
                <div class="aroma-info">
                  <h3>Notas de Coração</h3>
                  <p>Chá Branco, Jasmim, Lírio</p>
                </div>
                <div class="aroma-info">
                  <h3>Notas de Fundo</h3>
                  <p>Âmbar, Almíscar, Madeira</p>
                </div>
              </div>
            </div>
            <div class="aroma-notes">
              <h2>Características</h2>
              <div class="aroma-description">
                <p>
                  Uma fragrância suave e relaxante inspirada no tradicional
                  chá branco. Ideal para momentos de tranquilidade e
                  meditação.
                </p>
              </div>
            </div>
          </div>
        </div>
      </details>

      <details id="bamboo">
        <summary>Bamboo</summary>
        <div class="aroma-content">
          <div class="aroma-image-container">
            <img
              src="<?php echo get_template_directory_uri(); ?>/assets/imagens/vala-bamboo.png"
              alt="Bamboo"
              class="aroma-image"
              loading="lazy"
            />
          </div>
          <div class="aroma-content-right">
            <div class="aroma-details">
              <div class="aroma-details-row">
                <div class="aroma-info">
                  <h3>Notas de Topo</h3>
                  <p>Bergamota, Limão Siciliano</p>
                </div>
                <div class="aroma-info">
                  <h3>Notas de Coração</h3>
                  <p>Bamboo, Jasmim, Lírio</p>
                </div>
                <div class="aroma-info">
                  <h3>Notas de Fundo</h3>
                  <p>Âmbar, Almíscar, Madeira</p>
                </div>
              </div>
            </div>
            <div class="aroma-notes">
              <h2>Características</h2>
              <div class="aroma-description">
                <p>
                  Uma fragrância refrescante com notas verdes de bambu.
                  Perfeita para trazer energia e vitalidade ao ambiente.
                </p>
              </div>
            </div>
          </div>
        </div>
      </details>

      <details id="marinho">
        <summary>Marinho</summary>
        <div class="aroma-content">
          <div class="aroma-image-container">
            <img
              src="<?php echo get_template_directory_uri(); ?>/assets/imagens/marinho.png"
              alt="Marinho"
              class="aroma-image"
              loading="lazy"
            />
          </div>
          <div class="aroma-content-right">
            <div class="aroma-details">
              <div class="aroma-details-row">
                <div class="aroma-info">
                  <h3>Notas de Topo</h3>
                  <p>Bergamota, Limão Siciliano</p>
                </div>
                <div class="aroma-info">
                  <h3>Notas de Coração</h3>
                  <p>Marinho, Jasmim, Lírio</p>
                </div>
                <div class="aroma-info">
                  <h3>Notas de Fundo</h3>
                  <p>Âmbar, Almíscar, Madeira</p>
                </div>
              </div>
            </div>
            <div class="aroma-notes">
              <h2>Características</h2>
              <div class="aroma-description">
                <p>
                  Uma fragrância fresca e revigorante com notas marinhas.
                  Ideal para trazer a sensação de praia e verão para seu
                  ambiente.
                </p>
              </div>
            </div>
          </div>
        </div>
      </details>

      <details id="palosanto">
        <summary>Palo Santo</summary>
        <div class="aroma-content">
          <div class="aroma-image-container">
            <img
              src="<?php echo get_template_directory_uri(); ?>/assets/imagens/vela-palosanto.png"
              alt="Palo Santo"
              class="aroma-image"
              loading="lazy"
            />
          </div>
          <div class="aroma-content-right">
            <div class="aroma-details">
              <div class="aroma-details-row">
                <div class="aroma-info">
                  <h3>Notas de Topo</h3>
                  <p>Bergamota, Limão Siciliano</p>
                </div>
                <div class="aroma-info">
                  <h3>Notas de Coração</h3>
                  <p>Palo Santo, Jasmim, Lírio</p>
                </div>
                <div class="aroma-info">
                  <h3>Notas de Fundo</h3>
                  <p>Âmbar, Almíscar, Madeira</p>
                </div>
              </div>
            </div>
            <div class="aroma-notes">
              <h2>Características</h2>
              <div class="aroma-description">
                <p>
                  Uma fragrância mística e amadeirada do Palo Santo.
                  Perfeita para momentos de introspecção e conexão espiritual.
                </p>
              </div>
            </div>
          </div>
        </div>
      </details>
    </section>
  </div>
</main>
<?php get_footer(); ?> 