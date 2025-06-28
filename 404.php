<?php
get_header();
?>
<style>
/* Modern 404 Styles */
.zen-404-section-bg {
  min-height: 60vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 7rem 1rem 2.5rem 1rem;
  background: linear-gradient(135deg, #f5f3ff 0%, #f8fafc 100%);
  animation: fadeIn404 1.2s cubic-bezier(.4,0,.2,1);
}
@keyframes fadeIn404 {
  from { opacity: 0; transform: translateY(30px); }
  to { opacity: 1; transform: none; }
}
.zen-404-logo {
  width: 70px;
  height: 70px;
  object-fit: contain;
  margin-bottom: 1.2rem;
  opacity: 0.93;
}
.zen-404-image {
  width: 150px;
  height: 150px;
  object-fit: cover;
  border-radius: 50%;
  margin-bottom: 2.5rem;
  opacity: 0.96;
  box-shadow: 0 0 0 8px #ede9fe, 0 4px 24px rgba(120, 80, 200, 0.10);
  transition: box-shadow 0.2s;
}
.zen-404-image:hover {
  box-shadow: 0 0 0 12px #e0e7ff, 0 8px 32px rgba(120, 80, 200, 0.13);
}
.zen-404-title {
  font-size: 2.3rem;
  color: var(--color-secondary-dark, #6d28d9);
  font-weight: 800;
  margin-bottom: 1.2rem;
  letter-spacing: -1px;
  text-align: center;
}
.zen-404-desc {
  color: var(--color-text-soft, #6b7280);
  font-size: 1.15rem;
  margin-bottom: 2.2rem;
  text-align: center;
}
.zen-404-btn {
  display: inline-block;
  background: var(--color-secondary, #8b5cf6);
  color: var(--color-white, #fff);
  padding: 0.85rem 2.2rem;
  border-radius: 100px;
  text-decoration: none;
  font-weight: 600;
  font-size: 1.1rem;
  transition: background 0.2s, box-shadow 0.2s;
  margin-top: 1.2rem;
  box-shadow: 0 2px 8px rgba(0,0,0,0.06);
}
.zen-404-btn:hover {
  background: var(--color-secondary-dark, #6d28d9);
  box-shadow: 0 4px 16px rgba(0,0,0,0.10);
}
.zen-404-categories {
  margin-top: 2.2rem;
  display: flex;
  gap: 1.2rem;
  flex-wrap: wrap;
  justify-content: center;
}
.zen-404-cat-link {
  color: var(--color-secondary, #8b5cf6);
  background: #f3f0ff;
  border-radius: 100px;
  padding: 0.5rem 1.3rem;
  font-weight: 500;
  text-decoration: none;
  font-size: 1rem;
  transition: background 0.18s, color 0.18s, box-shadow 0.18s;
  box-shadow: 0 1px 4px rgba(139,92,246,0.06);
}
.zen-404-cat-link:hover {
  background: var(--color-secondary, #8b5cf6);
  color: #fff;
  box-shadow: 0 2px 8px rgba(139,92,246,0.13);
}
.zen-404-secondary-link {
  display: block;
  margin-top: 1.2rem;
  color: #6b7280;
  text-align: center;
  text-decoration: underline;
  font-size: 1rem;
  transition: color 0.18s;
}
.zen-404-secondary-link:hover {
  color: var(--color-secondary, #8b5cf6);
}
@media (max-width: 600px) {
  .zen-404-section-bg {
    padding: 3rem 0.5rem 2rem 0.5rem;
  }
  .zen-404-image {
    width: 100px;
    height: 100px;
  }
  .zen-404-logo {
    width: 48px;
    height: 48px;
  }
  .zen-404-categories {
    gap: 0.6rem;
  }
}
</style>
<main class="zen-404-section-bg" role="main" aria-label="Página não encontrada">
  <img src="<?php echo get_template_directory_uri(); ?>/assets/imagens/404-illustration.svg" alt="Ilustração de erro 404 - página não encontrada" class="zen-404-image"/>
  <h1 class="zen-404-title">Oops! Aroma não encontrado...</h1>
  <p class="zen-404-desc">Parece que essa página se perdeu na bruma.<br>Que tal explorar nossos aromas e produtos favoritos?</p>
  <a href="<?php echo home_url('/comprar/'); ?>" class="zen-404-btn" aria-label="Voltar para a loja">Voltar para a loja</a>
  <div class="zen-404-categories" aria-label="Categorias populares">
    <a href="<?php echo home_url('/aromatizadores/'); ?>" class="zen-404-cat-link">Aromatizadores</a>
    <a href="<?php echo home_url('/home-spray/'); ?>" class="zen-404-cat-link">Home Spray</a>
    <a href="<?php echo home_url('/velas-aromaticas/'); ?>" class="zen-404-cat-link">Velas Aromáticas</a>
    <a href="<?php echo home_url('/kits-especiais/'); ?>" class="zen-404-cat-link">Kits Especiais</a>
    <a href="<?php echo home_url('/lembrancinhas/'); ?>" class="zen-404-cat-link">Lembrancinhas</a>
    <a href="<?php echo home_url('/acessorios/'); ?>" class="zen-404-cat-link">Acessórios</a>
  </div>
  <a href="<?php echo home_url('/'); ?>" class="zen-404-secondary-link">Ou volte para a página inicial</a>
</main>
<?php
get_footer(); 