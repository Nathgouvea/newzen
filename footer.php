    <footer class="footer">
        <div class="container">
            <div class="footer__content">
                <div class="footer__logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/imagens/zen-logo.svg" 
                         alt="Zen Secrets Logo" 
                         width="100"
                         height="100">
                </div>
                <div class="footer__links">
                    <h3>Links Rápidos</h3>
                    <ul>
                        <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                        <li><a href="<?php echo esc_url(home_url('/aromas')); ?>">Aromas</a></li>
                        <li><a href="<?php echo esc_url(home_url('/velas-aromaticas')); ?>">Velas Aromáticas</a></li>
                        <li><a href="<?php echo esc_url(home_url('/aromatizadores')); ?>">Aromatizadores</a></li>
                        <li><a href="<?php echo esc_url(home_url('/acessorios')); ?>">Acessórios</a></li>
                        <li><a href="<?php echo esc_url(home_url('/kits-especiais')); ?>">Kits Especiais</a></li>
                        <li><a href="<?php echo esc_url(home_url('/lembrancinhas')); ?>">Lembrancinhas</a></li>
                        <li><a href="<?php echo esc_url(home_url('/contato')); ?>">Contato</a></li>
                    </ul>
                </div>
                <div class="footer__social">
                    <h3>Redes Sociais</h3>
                    <div class="social-links">
                        <a href="#" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram"></i></a>
                        <a href="#" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook"></i></a>
                        <a href="#" target="_blank" rel="noopener noreferrer"><i class="fab fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer__bottom">
                <p>&copy; <?php echo date('Y'); ?> Zen Secrets. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html> 