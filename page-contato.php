<?php
/* Template Name: Contato Custom */
get_header();
?>
<main id="main">
  <!-- HERO -->
  <section class="hero hero--unified">
    <div
      class="hero__bg"
      style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/imagens/Foto-tela-inicial-.webp'), url('<?php echo get_template_directory_uri(); ?>/assets/imagens/hero-zen.webp')"
    ></div>
    <div class="hero__content">
      <h1 class="hero__title">Fale Conosco</h1>
      <p class="hero__text">
        Estamos aqui para ajudar você a encontrar o aroma perfeito para seu
        ambiente
      </p>
    </div>
  </section>

  <section class="contact-main-section">
    <div class="container">
      <div class="contact-columns">
        <div class="contact-channels-wrapper">
          <div class="section-header">
            <h2 class="section-title">Escolha seu canal favorito</h2>
            <p class="section-description">
              Estamos disponíveis em diversos canais para melhor atendê-lo
            </p>
          </div>
          <div class="contact-channels__grid">
            <a
              href="mailto:secretszen888@gmail.com"
              class="channel-card"
              aria-label="Enviar um e‑mail"
            >
              <div class="channel-card__icon">
                <i class="fas fa-envelope"></i>
              </div>
              <div class="channel-card__content">
                <h3>E-mail</h3>
                <span class="channel-card__contact"
                  >secretszen888@gmail.com</span
                >
                <p class="channel-card__description">
                  Resposta em até 24h úteis
                </p>
              </div>
            </a>
            <a
              href="https://wa.me/5516991626921"
              class="channel-card"
              aria-label="Abrir WhatsApp"
            >
              <div class="channel-card__icon">
                <i class="fab fa-whatsapp"></i>
              </div>
              <div class="channel-card__content">
                <h3>WhatsApp</h3>
                <span class="channel-card__contact">(16) 99162-6921</span>
                <p class="channel-card__description">
                  Atendimento em horário comercial
                </p>
              </div>
            </a>
            <a
              href="https://instagram.com/secretszen"
              class="channel-card"
              aria-label="Abrir Instagram"
            >
              <div class="channel-card__icon">
                <i class="fab fa-instagram"></i>
              </div>
              <div class="channel-card__content">
                <h3>Instagram</h3>
                <span class="channel-card__contact">@secretszen</span>
                <p class="channel-card__description">
                  Siga-nos para novidades e dicas
                </p>
              </div>
            </a>
          </div>
        </div>
        <div class="contact-form-wrapper">
          <div class="section-header">
            <h2 class="section-title">Envie sua mensagem</h2>
            <p class="section-description">
              Preencha o formulário abaixo e entraremos em contato o mais
              breve possível
            </p>
          </div>
          <form 
            id="contactForm" 
            class="contact-form" 
            action="https://formspree.io/f/xovlkqqz"
            method="POST"
            novalidate
          >
            <div class="form-grid">
              <div class="form-row">
                <label for="nome">Nome completo*</label>
                <div class="input-wrapper">
                  <input
                    id="nome"
                    name="name"
                    type="text"
                    placeholder="Digite seu nome"
                    required
                  />
                  <i class="fas fa-user input-icon"></i>
                </div>
                <span class="error" id="err-nome" aria-live="polite"></span>
              </div>
              <div class="form-row">
                <label for="email">E‑mail*</label>
                <div class="input-wrapper">
                  <input
                    id="email"
                    name="email"
                    type="email"
                    placeholder="seu@email.com"
                    required
                  />
                  <i class="fas fa-envelope input-icon"></i>
                </div>
                <span
                  class="error"
                  id="err-email"
                  aria-live="polite"
                ></span>
              </div>
              <div class="form-row">
                <label for="tel">Telefone (opcional)</label>
                <div class="input-wrapper">
                  <input
                    id="tel"
                    name="phone"
                    type="tel"
                    inputmode="tel"
                    placeholder="(00) 00000-0000"
                  />
                  <i class="fas fa-phone input-icon"></i>
                </div>
              </div>
              <div class="form-row">
                <label for="assunto">Assunto*</label>
                <div class="input-wrapper">
                  <select id="assunto" name="subject" required>
                    <option value="">Selecione um assunto</option>
                    <option value="geral">Geral</option>
                    <option value="pedido">Pedido</option>
                    <option value="parcerias">Parcerias</option>
                    <option value="outro">Outro</option>
                  </select>
                  <i class="fas fa-chevron-down input-icon"></i>
                </div>
                <span class="error" id="err-subject" aria-live="polite"></span>
              </div>
            </div>
            <div class="form-row form-row--full">
              <label for="msg">Mensagem*</label>
              <div class="input-wrapper">
                <textarea
                  id="msg"
                  name="message"
                  rows="6"
                  placeholder="Digite sua mensagem aqui..."
                  required
                ></textarea>
                <i class="fas fa-comment-alt input-icon"></i>
              </div>
              <span class="error" id="err-msg" aria-live="polite"></span>
            </div>
            <div class="form-actions">
              <button
                class="button button--primary btn-submit"
                type="submit"
              >
                <i class="fas fa-paper-plane"></i>
                Enviar mensagem
              </button>
            </div>
            
            <!-- Success Message -->
            <div id="formSuccess" class="form-message form-message--success" style="display: none;">
              <i class="fas fa-check-circle"></i>
              <div class="form-message__content">
                <h4>Mensagem enviada com sucesso!</h4>
                <p>Obrigado por entrar em contato conosco. Retornaremos em breve.</p>
              </div>
            </div>
            
            <!-- Error Message -->
            <div id="formError" class="form-message form-message--error" style="display: none;">
              <i class="fas fa-exclamation-circle"></i>
              <div class="form-message__content">
                <h4>Erro ao enviar mensagem</h4>
                <p>Desculpe, ocorreu um erro ao enviar sua mensagem. Tente novamente ou entre em contato conosco pelo WhatsApp.</p>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ teaser -->
  <section class="faq-section wrapper">
    <div class="section-header">
      <h2 class="section-title">Perguntas Frequentes</h2>
      <p class="section-description">
        Tire suas dúvidas sobre nossos produtos e serviços
      </p>
    </div>
    <div class="faq-grid">
      <details class="faq-item">
        <summary>
          <i class="fas fa-truck"></i>
          <span>Envio</span>
        </summary>
        <div class="faq-content">
          <p>
            Enviamos para todo o Brasil em até 2 dias úteis após a
            confirmação do pagamento.
          </p>
        </div>
      </details>
      <details class="faq-item">
        <summary>
          <i class="fas fa-undo"></i>
          <span>Devoluções</span>
        </summary>
        <div class="faq-content">
          <p>
            Garantimos a satisfação total com nossos produtos. Caso não
            fique satisfeito, entre em contato conosco pelo WhatsApp para
            solicitar a devolução ou troca. Nossa equipe irá orientá-lo em
            todo o processo.
          </p>
        </div>
      </details>
      <details class="faq-item">
        <summary>
          <i class="fas fa-leaf"></i>
          <span>Sustentabilidade</span>
        </summary>
        <div class="faq-content">
          <p>
            Comprometidos com o meio ambiente, nossos produtos são
            desenvolvidos pensando na sustentabilidade.
          </p>
          <ul>
            <li>Frascos 100% recicláveis</li>
            <li>Embalagens eco-friendly</li>
          </ul>
        </div>
      </details>
    </div>
  </section>
</main>
<?php get_footer(); ?> 