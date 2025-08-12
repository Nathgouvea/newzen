# Button System Quick Reference

## Quick Start

### Basic Button

```html
<button class="button">Click Me</button>
```

### Primary Button (Purple background)

```html
<button class="button button--primary">Primary Action</button>
```

### Secondary Button (Outline)

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

## Button Variants

| Class                | Style             | Use Case                |
| -------------------- | ----------------- | ----------------------- |
| `.button`            | Purple background | Default primary actions |
| `.button--secondary` | Purple outline    | Secondary actions       |
| `.button--ghost`     | Transparent       | Minimal/navigation      |
| `.button--small`     | Smaller size      | Compact spaces          |
| `.button--large`     | Larger size       | Hero sections           |
| `.button--full`      | Full width        | Forms, mobile           |
| `.button--icon`      | With icon spacing | Actions with icons      |

## WooCommerce Integration

### Cart Buttons

```html
<a href="#" class="woocommerce button">Add to Cart</a>
<button class="woocommerce button" name="update_cart">Update Cart</button>
```

### Checkout Buttons

```html
<button class="woocommerce button" id="place_order">Place Order</button>
```

### Product Buttons

```html
<button class="single_add_to_cart_button">Add to Cart</button>
```

## Special Buttons

### Remove Button (Cart)

```html
<a href="#" class="remove">×</a>
```

### Search Button

```html
<button class="search-icon">🔍</button>
```

### Menu Toggle

```html
<button class="menu-toggle">
  <span></span>
  <span></span>
  <span></span>
</button>
```

## Button with Icons

### Icon + Text

```html
<button class="button button--icon">
  <i class="fas fa-shopping-cart"></i>
  Add to Cart
</button>
```

### Icon Only

```html
<button class="button button--icon-only">
  <i class="fas fa-heart"></i>
</button>
```

## Responsive Behavior

- **Desktop**: Standard padding and sizing
- **Tablet (≤768px)**: Slightly smaller padding
- **Mobile (≤480px)**: Compact padding, full-width buttons

## State Classes

| State    | Class            | Description             |
| -------- | ---------------- | ----------------------- |
| Hover    | `:hover`         | Automatic hover effects |
| Focus    | `:focus-visible` | Keyboard navigation     |
| Active   | `:active`        | Click/press state       |
| Disabled | `:disabled`      | Disabled state          |

## CSS Variables

```css
--color-secondary: #6b4fc4      /* Primary purple */
--color-secondary-dark: #4f3a96 /* Darker purple */
--color-white: #fafaf7          /* White text */
--color-text: #1b1b1b           /* Dark text */
```

## Common Patterns

### Form Submit Button

```html
<button type="submit" class="button button--full">Submit Form</button>
```

### Navigation Button

```html
<a href="/shop" class="button button--secondary">Shop Now</a>
```

### Action Button

```html
<button class="button button--primary button--icon">
  <i class="fas fa-plus"></i>
  Add Item
</button>
```

### Call-to-Action

```html
<button class="button button--large button--primary">Get Started Today</button>
```

## Troubleshooting

### Button Not Styling?

- Check if element has `.button` class
- Ensure no conflicting CSS
- Verify CSS is loaded

### Hover Not Working?

- Check for JavaScript interference
- Verify no CSS overrides
- Test in different browsers

### Focus States Missing?

- Test with Tab key navigation
- Check for `outline: none` CSS
- Verify focus-visible support

## Migration Checklist

- [ ] Replace old button classes with `.button`
- [ ] Add appropriate variant classes
- [ ] Test hover and focus states
- [ ] Verify responsive behavior
- [ ] Check accessibility
- [ ] Test in different browsers

## Best Practices

1. **Always use semantic HTML**: `<button>` for actions, `<a>` for links
2. **Include proper ARIA labels** for screen readers
3. **Test keyboard navigation** with Tab key
4. **Use appropriate button variants** for context
5. **Keep button text concise** and action-oriented
6. **Test on mobile devices** for touch targets
7. **Avoid multiple button variants** on same page
8. **Use consistent naming** for button classes

## Examples by Context

### Hero Section

```html
<div class="hero__ctas">
  <button class="button button--large button--primary">Shop Now</button>
  <button class="button button--large button--secondary">Learn More</button>
</div>
```

### Product Card

```html
<div class="product-card__footer">
  <button class="button button--full">Add to Cart</button>
</div>
```

### Form

```html
<form>
  <input type="text" placeholder="Email" />
  <button type="submit" class="button button--full">Subscribe</button>
</form>
```

### Navigation

```html
<nav>
  <a href="/shop" class="button button--ghost">Shop</a>
  <a href="/about" class="button button--ghost">About</a>
  <a href="/contact" class="button button--primary">Contact</a>
</nav>
```

