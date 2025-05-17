# Zen Secrets — HTML → WordPress + WooCommerce Migration Playbook

> **Purpose**  Hand this file to **Cursor AI**. It contains everything the agent needs—inventory of legacy assets, conversion blueprint, strict coding rules, build commands, and QA checklist—to generate a production‑ready WordPress theme and WooCommerce store that reproduces the existing static site.

---

## 0 · Project Meta

| Key                | Value                         |
| ------------------ | ----------------------------- |
| Source repo branch | `legacy-html`                 |
| Target repo branch | `main` (WordPress)            |
| Local stack        | Local WP 8 (PHP 8.1, MySQL 8) |
| WordPress ver.     | 6.5 LTS                       |
| WooCommerce ver.   | 9.x                           |
| Go‑live            | **TBD**                       |

---

## 1 · Legacy Asset Inventory

### HTML pages → WP target template

| File                    | Static purpose                   | WP / WC template                         |
| ----------------------- | -------------------------------- | ---------------------------------------- |
| `index.html`            | Landing page                     | `front‑page.php`                         |
| `comprar.html`          | All products overview            | `woocommerce/archive-product.php`        |
| `acessorios.html`       | Category — Acessórios            | Product‑cat archive (`acessorios`)       |
| `aromatizadores.html`   | Category — Aromatizadores        | Product‑cat archive (`aromatizadores`)   |
| `home-spray.html`       | Category — Home Spray            | Product‑cat archive (`home-spray`)       |
| `kits-especiais.html`   | Category — Kits Especiais        | Product‑cat archive (`kits-especiais`)   |
| `lembrancinhas.html`    | Category — Lembrancinhas         | Product‑cat archive (`lembrancinhas`)    |
| `velas-aromaticas.html` | Category — Velas Aromáticas      | Product‑cat archive (`velas-aromaticas`) |
| `aromas.html`           | Informational — scents catalogue | `page-aromas.php`                        |
| `contato.html`          | Contact page                     | `page-contato.php` + CF7                 |

### Global assets

- **CSS**  `style.css` (legacy) — imported into theme SCSS pipeline.
- **JavaScript**

  - `main.js` — header behaviour, search, mobile nav, util fns.
  - `product-slider.js` — product carousel component.
  - `slider.js` — hero slider component.
  - `search.js` — (empty stub; logic moved to `main.js`).

- **Images & fonts** in `assets/imagens`, `assets/fonts` (copy unchanged into `theme/assets/`).

> _All above files are now present in the repo. Cursor must fail the build if any additional `<script>` or `<img>` reference is unresolved._

---

## 2 · Theme Scaffold Tasks

1. `wp scaffold _s zensecrets --sassify` → remove unneeded boilerplate CSS.

2. Copy legacy CSS into `src/scss/legacy.scss`; create SCSS modules `components/_woocommerce.scss`, `layout/_header.scss`, etc.

3. Build pipeline via **npm scripts**:

   - `npm run dev` = watch + HMR.
   - `npm run build` = production build (purge CSS, autoprefixer, cssnano, esbuild for JS).

4. In `functions.php`:

   ```php
   add_action( 'after_setup_theme', function() {
     add_theme_support( 'woocommerce' );
     add_theme_support( 'title-tag' );
     add_theme_support( 'align-wide' );
     register_nav_menus( [ 'primary' => __( 'Primary', 'zensecrets' ), 'footer' => __( 'Footer', 'zensecrets' ) ] );
   } );

   add_action( 'wp_enqueue_scripts', function() {
     $ver = filemtime( get_stylesheet_directory() . '/dist/css/style.css' );
     wp_enqueue_style( 'zs-style', get_stylesheet_directory_uri() . '/dist/css/style.css', [], $ver );

     wp_register_script( 'zs-main', get_stylesheet_directory_uri() . '/dist/js/main.js', [ 'jquery', 'wp-i18n' ], filemtime( get_stylesheet_directory() . '/dist/js/main.js' ), true );
     wp_register_script( 'zs-slider', get_stylesheet_directory_uri() . '/dist/js/slider.js', [ 'jquery' ], filemtime( get_stylesheet_directory() . '/dist/js/slider.js' ), true );
     wp_register_script( 'zs-product-slider', get_stylesheet_directory_uri() . '/dist/js/product-slider.js', [ 'jquery' ], filemtime( get_stylesheet_directory() . '/dist/js/product-slider.js' ), true );

     wp_enqueue_script( 'zs-main' );
     if ( is_front_page() ) wp_enqueue_script( 'zs-slider' );
     if ( is_shop() || is_product_category() ) wp_enqueue_script( 'zs-product-slider' );
   } );
   ```

5. Split templates: `header.php`, `footer.php`, optional `sidebar.php`; include `wp_head()` / `wp_footer()` hooks.

6. Override WooCommerce templates under `theme/woocommerce/` as per **Inventory** table.

   - Prefix custom classes with `zs-` and keep Woo core classes intact for JS.

---

## 3 · WooCommerce Setup

- Terms (product cat): Aromatizadores, Home Spray, Velas Aromáticas, Kits Especiais, Lembrancinhas, Acessórios.
- Attribute: _Aroma_ (global, used for variations) - to be set up before product import.
- Product import with WP All Import using the following CSV template:

```csv
Type,SKU,Name,Published,Featured,Catalog visibility,Short description,Description,Date sale price starts,Date sale price ends,Tax status,Tax class,In stock?,Stock,Backorders allowed?,Sold individually?,Weight (kg),Length (cm),Width (cm),Height (cm),Allow customer reviews?,Purchase note,Sale price,Regular price,Categories,Tags,Shipping class,Images,Download limit,Download expiry days,Parent,Grouped products,Upsells,Cross-sells,External URL,Button text,Position,Attribute 1 name,Attribute 1 value(s),Attribute 1 visible,Attribute 1 global,Attribute 2 name,Attribute 2 value(s),Attribute 2 visible,Attribute 2 global
simple,SKU001,Product Name,1,0,visible,Short description,Full description,,,,taxable,1,10,0,0,0.5,10,10,10,1,,,99.90,129.90,"Aromatizadores, Home Spray",,default,image1.jpg,image2.jpg,,,0,,,,
variable,SKU002,Variable Product,1,0,visible,Short description,Full description,,,,taxable,1,10,0,0,0.5,10,10,10,1,,,99.90,129.90,"Velas Aromáticas, Kits Especiais",,default,image1.jpg,image2.jpg,,,0,,,,
variation,SKU002-1,Variation 1,1,0,visible,,,,,,,taxable,1,5,0,0,0.5,10,10,10,1,,,89.90,119.90,,,,default,,,0,SKU002,,,,
```

- **Shipping**: plugin _Melhor Envio_ with token, Correios PAC + SEDEX (to be configured in later stage).
- **Payments**: plugin _Mercado Pago Checkout Pro_ in _sandbox_ (to be configured in later stage).

---

## 4 · `.cursorrules` — Final Version

```
# === Cursor AI Project Rules ===============================

You are a senior WordPress & WooCommerce engineer.  All code you emit **must**:

- Follow **WordPress Coding Standards** (PHPCS) — 4‑space indent, no tabs.
- Prefix **every** custom PHP function / class with `zs_`.
- Escape outputs (`esc_html`, `esc_attr`, `wp_kses_post`) and sanitise inputs (`sanitize_text_field`, `absint`, etc.).
- Use core APIs & hooks *instead of* editing plugin/core files.  Prefer actions/filters (`add_action`, `add_filter`) over template hacks.
- Register & version assets with `wp_enqueue_*`, supplying **dependency arrays** and using `filemtime()` for cache‑busting.
- Localise scripts via `wp_set_script_translations` / `wp.i18n` if you output any text in JS.
- Make all strings translation‑ready: wrap with `__( 'string', 'zensecrets' )` or `_x()`.
- Produce **Gutenberg‑compatible** markup and add `add_theme_support( 'align-wide' )`.  Any block patterns live in `/patterns/` with `block.json`.
- No inline `<style>` or `<script>` blocks; migrate to SCSS/JS files.
- Adhere to **WCAG 2.1 AA**: labels, alt text, contrast, focus styles.
- Ensure compatibility with PHP 8.1; declare strict types when useful.
- For AJAX, always verify nonce with `check_ajax_referer()` and die with `wp_send_json_*`.
- Never output debug code (`var_dump`, `console.log`) in production builds.
- After generating/modifying SCSS or JS, run `npm run build`.
- When finished, emit a checklist of changed files so CI can run `phpcs`, `npm run build`, and `wp theme validate`.
- Preserve existing CSS structure unless there's a compelling reason to change it.
- Implement WordPress search functionality in `main.js` (final step).
```

> **Tip for prompts**
>
> - _"Generate a page template `page-aromas.php` that loops through ACF repeater `aroma_list` and outputs accordions, respecting the rules."_
> - _"Move product data tabs below related products using WooCommerce hooks only."_

---

## 5 · QA Checklist

- [ ] Homepage layout parity (desktop & mobile).
- [ ] Shop grid, category archives load with correct products.
- [ ] Product page gallery, price, variations behave.
- [ ] Cart totals, Melhor Envio shipping rates calculate after CEP.
- [ ] Checkout fields incl. CPF (Brazilian Market plugin) validate; Mercado Pago sandbox completes.
- [ ] E‑mail notifications sent (use MailHog locally).
- [ ] Lighthouse score ≥ 85 desktop.
- [ ] No PHPCS errors: `phpcs -p --standard=WordPress wp-content/themes/zensecrets`.
- [ ] Database search‑replace complete on deploy: `wp search-replace http://zensecrets.local https://zen‑secrets.com`.

---

## 6 · Useful Commands & Scripts

```bash
# spin up wp-env (optional dev container)
wp-env start

# validate theme & run tests
git checkout main
npm ci
npm run build
phpcs -p --standard=WordPress wp-content/themes/zensecrets
wp theme validate zensecrets

# export DB before launch
wp db export prelaunch.sql
```

---

### End of Playbook
