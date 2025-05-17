# Zen Secrets — WordPress Migration Project Plan

## Phase 1: Environment Setup & Theme Foundation

- [ ] 1.1. Set up local WordPress environment

  - [ ] Install Local WP 8
  - [ ] Configure PHP 8.1 and MySQL 8
  - [ ] Install WordPress 6.5 LTS
  - [ ] Install WooCommerce 9.x

- [ ] 1.2. Create theme foundation
  - [ ] Generate starter theme: `wp scaffold _s zensecrets --sassify`
  - [ ] Remove unnecessary boilerplate CSS
  - [ ] Set up npm build pipeline
  - [ ] Configure `functions.php` with required theme support
  - [ ] Test build process (`npm run dev` and `npm run build`)

## Phase 2: Asset Migration & Theme Structure

- [ ] 2.1. Migrate static assets

  - [ ] Copy images from `assets/imagens` to `theme/assets/`
  - [ ] Copy fonts from `assets/fonts` to `theme/assets/`
  - [ ] Import legacy CSS into `src/scss/legacy.scss`
  - [ ] Create SCSS module structure

- [ ] 2.2. Set up theme templates
  - [ ] Create `header.php` and `footer.php`
  - [ ] Implement `wp_head()` and `wp_footer()` hooks
  - [ ] Set up navigation menus
  - [ ] Create basic template hierarchy

## Phase 3: WooCommerce Integration

- [ ] 3.1. Basic WooCommerce setup

  - [ ] Configure product categories
  - [ ] Set up Aroma attribute
  - [ ] Create CSV template for product import
  - [ ] Test basic product display

- [ ] 3.2. Customize WooCommerce templates
  - [ ] Override `archive-product.php`
  - [ ] Create category-specific templates
  - [ ] Customize product display
  - [ ] Test category archives

## Phase 4: Page Templates & Content

- [ ] 4.1. Convert static pages

  - [ ] Create `front-page.php`
  - [ ] Implement `page-aromas.php`
  - [ ] Set up `page-contato.php` with Contact Form 7
  - [ ] Test all page templates

- [ ] 4.2. Implement JavaScript functionality
  - [ ] Migrate `main.js` functionality
  - [ ] Set up `product-slider.js`
  - [ ] Implement `slider.js`
  - [ ] Test all interactive features

## Phase 5: Search & Additional Features

- [ ] 5.1. Implement search functionality

  - [ ] Add WordPress search to `main.js`
  - [ ] Style search results
  - [ ] Test search functionality

- [ ] 5.2. Polish and optimization
  - [ ] Run performance tests
  - [ ] Check WCAG 2.1 AA compliance
  - [ ] Test responsive design
  - [ ] Fix any remaining issues

## Phase 6: Payment & Shipping (Future Phase)

- [ ] 6.1. Payment integration

  - [ ] Install Mercado Pago plugin
  - [ ] Configure sandbox environment
  - [ ] Test payment flow

- [ ] 6.2. Shipping setup
  - [ ] Install Melhor Envio plugin
  - [ ] Configure shipping methods
  - [ ] Test shipping calculations

## Testing Checklist for Each Phase

- [ ] PHPCS validation
- [ ] Build process works
- [ ] Responsive design check
- [ ] Cross-browser testing
- [ ] WordPress theme validation
- [ ] WooCommerce compatibility

## Notes

- Each phase should be completed and tested before moving to the next
- Regular commits after each completed task
- Document any issues or decisions in commit messages
- Keep the existing CSS structure unless absolutely necessary to change
- Follow WordPress coding standards throughout
