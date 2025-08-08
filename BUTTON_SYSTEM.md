# Unified Button System Documentation

## Overview

This document describes the unified button system implemented across the NewZen WordPress theme. All buttons now follow consistent styling, behavior, and accessibility standards.

## Base Button Classes

### Primary Selectors

The unified system targets all button elements using these selectors:

```css
.button,
.btn,
button,
input[type="submit"],
input[type="button"],
.woocommerce #respond input#submit,
.woocommerce a.button,
.woocommerce button.button,
.woocommerce input.button,
.woocommerce #respond input#submit.alt,
.woocommerce a.button.alt,
.woocommerce button.button.alt,
.woocommerce input.button.alt;
```

## Default Button Properties

### Layout

- `display: inline-flex`
- `align-items: center`
- `justify-content: center`
- `gap: 0.5rem`

### Sizing

- `padding: 0.75rem 1.5rem`
- `min-height: 44px`
- `min-width: 120px`

### Typography

- `font-family: var(--font-family)`
- `font-size: 0.875rem`
- `font-weight: 500`
- `line-height: 1.2`
- `letter-spacing: 0.02em`

### Visual

- `border-radius: 100px` (fully rounded)
- `border: 2px solid transparent`
- `background: var(--color-secondary)` (purple)
- `color: var(--color-white)`

### Interactions

- `transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1)`
- Hover: `translateY(-2px)` + purple box shadow
- Focus: `outline: 2px solid var(--color-secondary)` + offset

## Button Variants

### Primary Button (Default)

```css
.button--primary,
.btn--primary,
.hero__cta-primary,
.product-card__button:hover,
.btn-collection:hover,
.custom-order__cta,
.btn-submit,
.checkout-button,
#place_order,
.single_add_to_cart_button
```

**Style**: Purple background with white text

### Secondary Button (Outline)

```css
.button--secondary,
.btn--secondary,
.hero__cta-secondary,
.product-card__button,
.btn-collection;
```

**Style**: Transparent background with purple border and text

### Ghost Button (Minimal)

```css
.button--ghost,
.btn--ghost;
```

**Style**: Transparent background and border

## Button Sizes

### Small

```css
.button--small,
.btn--small;
```

- `padding: 0.5rem 1rem`
- `font-size: 0.8rem`
- `min-height: 36px`
- `min-width: 100px`

### Large

```css
.button--large,
.btn--large,
.hero .button,
.hero__cta-primary,
.hero__cta-secondary;
```

- `padding: 1rem 2rem`
- `font-size: 1rem`
- `min-height: 52px`
- `min-width: 160px`

### Extra Large

```css
.button--xl,
.btn--xl;
```

- `padding: 1.25rem 2.5rem`
- `font-size: 1.125rem`
- `min-height: 60px`
- `min-width: 200px`

## Special Button Types

### Full Width

```css
.button--full,
.btn--full,
.product-card__button,
.btn-submit;
```

- `width: 100%`
- `justify-content: center`

### With Icons

```css
.button--icon,
.btn--icon;
```

- `gap: 0.75rem`

### Icon Only

```css
.button--icon-only,
.btn--icon-only;
```

- `padding: 0.75rem`
- `min-width: 44px`
- `width: 44px`
- `height: 44px`

### Remove Button (Cart)

```css
.remove,
.product-remove a;
```

- `background: var(--color-gray-100)`
- `color: #d32f2f`
- `min-width: 32px`
- `width: 32px`
- `height: 32px`
- `border-radius: 50%`

### Search Button

```css
.search-icon,
.search-submit;
```

- `background: transparent`
- `color: var(--color-text)`
- No hover effects

### Menu Toggle

```css
.menu-toggle
```

- `background: transparent`
- `color: var(--color-text)`
- No border radius

## State Management

### Hover States

- `background: var(--color-secondary-dark)`
- `color: var(--color-white)`
- `transform: translateY(-2px)`
- `box-shadow: 0 4px 12px rgba(107, 79, 196, 0.25)`

### Active States

- `transform: translateY(0)`
- `box-shadow: 0 2px 6px rgba(107, 79, 196, 0.2)`

### Focus States

- `outline: 2px solid var(--color-secondary)`
- `outline-offset: 2px`
- `box-shadow: 0 0 0 4px rgba(107, 79, 196, 0.1)`

### Disabled States

- `opacity: 0.6`
- `cursor: not-allowed`
- `background: var(--color-gray-400)`
- `color: var(--color-gray-600)`
- No transforms or shadows

## Responsive Behavior

### Mobile (≤768px)

- `padding: 0.625rem 1.25rem`
- `font-size: 0.8rem`
- `min-height: 40px`

### Small Mobile (≤480px)

- `padding: 0.5rem 1rem`
- `font-size: 0.75rem`
- `min-height: 36px`
- Full-width buttons: `width: 100%`

## Usage Examples

### Basic Button

```html
<button class="button">Click Me</button>
```

### Primary Button

```html
<button class="button button--primary">Primary Action</button>
```

### Secondary Button

```html
<button class="button button--secondary">Secondary Action</button>
```

### Large Button

```html
<button class="button button--large">Large Button</button>
```

### Full Width Button

```html
<button class="button button--full">Full Width</button>
```

### Button with Icon

```html
<button class="button button--icon">
  <i class="fas fa-shopping-cart"></i>
  Add to Cart
</button>
```

### WooCommerce Button

```html
<a href="#" class="woocommerce button">Shop Now</a>
```

## Migration Notes

### What Changed

1. **Border Radius**: All buttons now use `100px` (fully rounded)
2. **Padding**: Standardized to `0.75rem 1.5rem`
3. **Font Size**: Standardized to `0.875rem`
4. **Colors**: Consistent purple theme (`var(--color-secondary)`)
5. **Hover Effects**: Unified `translateY(-2px)` + box shadow
6. **Accessibility**: Proper focus states and keyboard navigation

### Removed Inconsistencies

- ❌ Different border radius values (8px, 12px, 100px)
- ❌ Inconsistent padding sizes
- ❌ Different font sizes
- ❌ Mixed background colors
- ❌ Inconsistent hover effects
- ❌ Missing focus states

### Added Benefits

- ✅ Consistent visual design
- ✅ Better accessibility
- ✅ Easier maintenance
- ✅ Responsive behavior
- ✅ Unified interaction patterns
- ✅ Proper state management

## CSS Variables Used

```css
--color-secondary: #6b4fc4
--color-secondary-dark: #4f3a96
--color-secondary-light: #8c77d1
--color-white: #fafaf7
--color-text: #1b1b1b
--color-gray-100: #f8f8f8
--color-gray-200: #f3f3f0
--color-gray-400: #bdbdbd
--color-gray-600: #757575
--font-family: "Arimo", system-ui, sans-serif
```

## Browser Support

- ✅ Chrome 60+
- ✅ Firefox 55+
- ✅ Safari 12+
- ✅ Edge 79+
- ✅ Mobile browsers

## Accessibility Features

- **Focus Indicators**: Clear outline on keyboard navigation
- **Color Contrast**: Meets WCAG AA standards
- **Touch Targets**: Minimum 44px height for mobile
- **Screen Readers**: Proper semantic markup
- **Keyboard Navigation**: Full keyboard support
- **Reduced Motion**: Respects user preferences

## Troubleshooting

### Button Not Styling

1. Check if the element has the correct class
2. Ensure the unified button system CSS is loaded
3. Check for conflicting CSS with higher specificity

### Hover Effects Not Working

1. Verify the button has proper cursor styles
2. Check for JavaScript interference
3. Ensure no CSS is overriding hover states

### Focus States Missing

1. Test with keyboard navigation (Tab key)
2. Check for CSS that removes outlines
3. Verify focus-visible selector support

### Mobile Issues

1. Check viewport meta tag
2. Test touch targets (minimum 44px)
3. Verify responsive breakpoints

## Future Enhancements

- [ ] Dark mode support
- [ ] Animation variants
- [ ] Loading states
- [ ] Success/error states
- [ ] Custom color themes
- [ ] Micro-interactions

