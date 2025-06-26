<?php
get_header();
?>
<main class="woocommerce-cart" style="min-height:60vh;display:flex;align-items:center;justify-content:center;flex-direction:column;padding:4rem 1rem 2rem 1rem;background:var(--color-background-soft);">
  <div class="cart-empty" style="max-width:500px;margin:0 auto;text-align:center;">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/imagens/hero-zen2.webp" alt="Página não encontrada" class="empty-cart-image" style="width:120px;margin-bottom:2rem;opacity:0.8;"/>
    <h1 style="font-size:2.2rem;color:var(--color-secondary-dark);font-weight:700;margin-bottom:1rem;">404 - Página não encontrada</h1>
    <p style="color:var(--color-text-soft);font-size:1.1rem;margin-bottom:2rem;">Desculpe, não encontramos o que você procurava.<br>Veja nossos produtos ou volte para a loja.</p>
    <a href="/shop" class="continue-shopping" style="display:inline-block;background:var(--color-secondary);color:var(--color-white);padding:0.75rem 2rem;border-radius:var(--border-radius-md);text-decoration:none;font-weight:500;transition:var(--transition-base);margin-top:1rem;">Voltar para a loja</a>
  </div>
  <div style="width:100%;max-width:1200px;margin:3rem auto 0 auto;">
    <h2 style="text-align:center;color:var(--color-secondary-dark);font-size:1.5rem;margin-bottom:2rem;">Produtos em destaque</h2>
    <?php echo do_shortcode('[products limit=4 columns=4 orderby=popularity]'); ?>
  </div>
</main>
<?php
get_footer(); 