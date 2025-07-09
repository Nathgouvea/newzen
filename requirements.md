Perfect — let's do this right from the ground up.
Here's your clean, clear, and complete requirements document (in natural language, ideal for Cursor) for building the static HTML/CSS/JS version of the Zen Secrets website first — no PHP, no WordPress yet.

⸻

🌿 Zen Secrets – Static Website Requirements

🧘 Objetivo

Criar o site completo da Zen Secrets utilizando HTML, CSS e JavaScript puro — sem PHP, sem WordPress.
O foco é construir todas as páginas, estrutura visual, responsividade e interações leves.
Depois, esse projeto será transformado em tema WordPress.

⸻

📁 Estrutura de Arquivos

Organize o projeto da seguinte forma:

zen-secrets/
├── index.html ← Página inicial
├── comprar.html ← Página da loja com categorias
├── aromas.html ← Página sobre os aromas
├── contato.html ← Página de contato
├── assets/
│ ├── css/
│ │ └── style.css
│ ├── js/
│ │ └── main.js
│ ├── fonts/ ← Fonte Arimo
│ └── imagens/ ← Imagens dos produtos, logo etc.

⸻

🎨 Identidade Visual
• Estilo: Minimalista, sensorial, elegante
• Fonte: Arimo (Google Fonts)
• Cores:
• Fundo: Branco #ffffff
• Texto: Preto #000000
• Elementos decorativos: Cinza #afafaf
• Layout: Máximo de 1200px, centralizado, espaçamento amplo
• Responsivo: Sim, mobile-first

⸻

📄 Páginas do Site

⸻

1. Home – index.html
   • Logo da Zen Secrets no topo
   • Menu principal com as seções:
   • Início
   • Comprar (com dropdown)
   • Sobre os Aromas (com dropdown)
   • Fale Conosco
   • Hero section:
   • Título: "Harmonia e Bem-Estar Através do Aroma"
   • Texto descritivo
   • Botão CTA: "Conheça nossos Produtos"
   • Imagem de destaque (vela ou ambiente sensorial)
   • Rodapé com redes sociais e direitos autorais

⸻

2. Comprar – comprar.html
   • Menu com dropdown funcional (hover):
   • Aromatizadores
   • Home Spray
   • Velas Aromáticas
   • Kits Especiais
   • Lembrancinhas
   • Acessórios
   • Estrutura visual em grid com cards de produto:
   • Nome
   • Imagem
   • Descrição curta
   • Botão (ex: "Ver Produto" ou "Comprar")
   • Filtro ou barra de busca (estático)

⸻

3. Sobre os Aromas – aromas.html
   • Lista de aromas com blocos:
   • Nome
   • Família Olfativa
   • Intensidade e Projeção
   • Notas
   • Descrição
   • Aromas:
   • Flor de Figo
   • Chá Branco
   • Marinho
   • Vela Bamboo
   • Vela Palo Santo

⸻

4. Fale Conosco – contato.html
   • Texto de introdução
   • Links diretos:
   • WhatsApp: (16) 99162-6921
   • Instagram: @secretszen
   • Formulário de sugestão (simples — nome, mensagem, botão)

⸻

🔎 Funcionalidades Básicas com JS
• Menu dropdown com JS simples para mobile (toggle no menu)
• Animação leve de fade-in nos blocos do hero e produtos
• Scroll suave nos links internos
• Nenhum framework JS, apenas vanilla JS

⸻

📦 Extras
• Imagens reais serão colocadas na pasta /assets/imagens/
• Usar alt em todas as imagens
• Todas as páginas devem estar conectadas entre si via links no menu
• O layout deve funcionar bem em mobile e tablet

⸻

Quer que eu agora gere para você os arquivos index.html e style.css iniciais com o header + hero + estrutura de navegação prontos?

## CSS Refactor Proposal for WooCommerce & Theme

### Recommended Structure

- `assets/css/woocommerce/cart.css` – Cart page styles only
- `assets/css/woocommerce/checkout.css` – Checkout page styles only
- `assets/css/woocommerce/single-product.css` – Single product page styles only
- `assets/css/woocommerce.css` – General WooCommerce/shop/product grid styles
- `assets/css/newzen-woocommerce.css` – Variables and utility classes (imported by all others)

### Import Strategy

- At the top of each WooCommerce CSS file, import `newzen-woocommerce.css` (using `@import` or via build process if using SCSS/PostCSS).
- In your theme, enqueue only the CSS files needed for each page (e.g., only load `cart.css` on the cart page).

### Best Practices

- **Remove legacy/commented code** from all CSS files.
- **Namespace** WooCommerce styles (e.g., with `.wc-newzen` or `body.woocommerce-cart`) to avoid conflicts.
- **Centralize variables/utilities** in `newzen-woocommerce.css`.
- **Delete unused/backup files** (done: `cart.css.bak`).
- **Keep files modular** for easier maintenance, unless your site is very small (then you may merge all into `woocommerce.css`).

## Website Improvement Checklist (Excluding Blog/Posts)

- [ ] **Search Results Page**
  - Create `search.php` for displaying search results
  - Optionally, add a `no-results.php` for empty searches
- [ ] **WooCommerce Account Pages**
  - Ensure all WooCommerce account endpoints (orders, downloads, addresses, account details) are styled and supported
  - Check and complete templates in `woocommerce/myaccount/` if needed
- [ ] **WooCommerce Cart Page**
  - Confirm `page-cart.php` is mapped and styled correctly
  - Optionally, add/override `woocommerce/cart/cart.php` for more control
- [ ] **WooCommerce Templates**
  - Add/override templates for:
    - Thank You / Order Received (`woocommerce/checkout/thankyou.php`)
    - Order Pay (`woocommerce/checkout/order-pay.php`)
    - My Account endpoints (as needed)
    - WooCommerce emails (if custom email templates are desired)
- [ ] **Legal/Informational Pages**
  - Create and link to Privacy Policy, Terms & Conditions, Shipping & Returns pages (as WordPress pages)
- [ ] **Contact/Custom Forms**
  - Ensure `page-contato.php` includes a working contact form (plugin or custom)
- [ ] **Sidebar/Widgets**
  - Add `sidebar.php` and register widget areas if you want sidebars (e.g., for shop or custom pages)
- [ ] **Navigation Menus**
  - Consider adding a footer menu or additional navigation areas
- [ ] **Accessibility & SEO**
  - Review templates for accessibility best practices (ARIA, alt text, etc.)
  - Add meta tags, schema, and other SEO improvements as needed

---

_Update this checklist as you add features or identify new needs!_

## 📝 Expanded Website Checklist

### 1. Static HTML/CSS/JS Version

- [ ] All static pages (`index.html`, `comprar.html`, `aromas.html`, `contato.html`) are present and fully implemented
- [ ] All navigation links work and connect pages as described
- [ ] Dropdown menus work on desktop (hover) and mobile (toggle)
- [ ] Hero section on home page matches requirements (title, text, CTA, image)
- [ ] Product grid/cards on Comprar page with all required info and buttons
- [ ] Aromas page includes all required aroma blocks with correct info
- [ ] Contact page includes WhatsApp, Instagram, and a working suggestion form (with validation)
- [x] All images use descriptive alt attributes
- [ ] All pages are responsive (mobile-first, tablet, desktop)
- [ ] Minimal, elegant, and consistent visual style (fonts, colors, spacing)
- [ ] Vanilla JS only (no frameworks)
- [ ] Smooth scroll for internal links
- [ ] Light fade-in animation for hero and product blocks
- [ ] All static assets (images, fonts, CSS, JS) are in the correct folders
- [ ] 404 page is styled and user-friendly

### 2. WordPress Theme Conversion

- [ ] All static pages are converted to WordPress templates (`front-page.php`, `page-comprar.php`, etc.)
- [ ] Navigation menus are dynamic (use `wp_nav_menu`)
- [ ] All content is editable via WordPress admin (pages, products, aromas, contact info)
- [ ] WooCommerce is fully integrated and styled (cart, checkout, account, product, shop, thank you, etc.)
- [ ] All WooCommerce templates are overridden as needed for custom design
- [ ] WooCommerce account endpoints are styled and supported
- [ ] Contact form is functional (plugin or custom, with validation and success/error messages)
- [ ] Search results page (`search.php`) and no-results page (`no-results.php`) are implemented and styled
- [ ] Sidebar/widget areas are registered if needed
- [ ] Footer menu or additional navigation areas are added if required
- [ ] Legal/informational pages (Privacy Policy, Terms, Shipping & Returns) are created and linked
- [ ] Accessibility best practices are followed (ARIA, keyboard navigation, color contrast, etc.)
- [ ] SEO best practices are followed (meta tags, schema, alt text, etc.)
- [ ] All images and assets are optimized for web
- [ ] Theme is translation-ready (use `__()` and `_e()` functions)
- [ ] Theme passes WordPress theme check (if planning to distribute)

### 3. General/Best Practices

- [ ] Remove all unused/commented code from CSS/JS
- [ ] Centralize variables/utilities in a single CSS file and import as needed
- [ ] Namespace all custom styles to avoid conflicts
- [ ] Modularize CSS for easier maintenance (as described in requirements)
- [ ] Test on all major browsers and devices
- [ ] All forms have client-side and server-side validation
- [ ] Custom error/success messages for forms and actions
- [ ] Animations are accessible (respect `prefers-reduced-motion`)
- [ ] All interactive elements are keyboard accessible
- [ ] Google Fonts are loaded efficiently (swap, display options)
- [ ] Font Awesome or icon set is loaded only where needed

### 4. Extras/Polish

- [x] Social media links in the footer are present and open in new tabs
- [x] All pages are connected and navigation is intuitive
- [x] 404 page is styled and user-friendly
- [x] Accessibility and SEO audits are performed
- [x] All content is proofread and free of typos

---

_Update this checklist as you add features or identify new needs!_
