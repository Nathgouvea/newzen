<?php
/**
 * Template part for displaying the cart page dynamically from WooCommerce
 */
// Handle cart update action
if (isset($_POST['update_cart']) && isset($_POST['cart']) && wp_verify_nonce($_POST['woocommerce-cart-nonce'], 'woocommerce-cart')) {
    error_log('Cart update logic triggered');
    echo '<div style="color:red; font-weight:bold;">Cart update logic triggered</div>';
    foreach ($_POST['cart'] as $cart_item_key => $values) {
        $qty = isset($values['qty']) ? (int) $values['qty'] : 0;
        WC()->cart->set_quantity($cart_item_key, $qty, false);
    }
    WC()->cart->calculate_totals();
    wp_safe_redirect(wc_get_cart_url());
    exit;
}
if (!function_exists('WC') || !WC()->cart) {
    echo '<p>Carrinho está vazio ou WooCommerce não está ativo.</p>';
    return;
}
$cart = WC()->cart;
$cart_items = $cart->get_cart();
$total_items = $cart->get_cart_contents_count();
?>

<div class="cart-page">
    <div class="cart-container">
        <h1 class="cart-title">Seu Carrinho <span class="cart-count">(<?php echo $total_items; ?> item<?php echo $total_items == 1 ? '' : 's'; ?>)</span></h1>
        <form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
            <?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>
            <!-- Cart Items -->
            <div class="cart-items">
                <?php if (empty($cart_items)) : ?>
                    <p>Seu carrinho está vazio.</p>
                <?php else : ?>
                    <?php foreach ($cart_items as $cart_item_key => $cart_item) :
                        $_product   = $cart_item['data'];
                        $product_id = $cart_item['product_id'];
                        if (!$_product || !$cart_item['quantity']) continue;
                        $product_permalink = $_product->is_visible() ? $_product->get_permalink($cart_item) : '';
                        $input_id = 'quantity_' . $cart_item_key;
                        $min = 1;
                        $max = $_product->get_max_purchase_quantity();
                        $step = 1;
                        $value = $cart_item['quantity'];
                    ?>
                    <div class="cart-item">
                        <div class="item-image">
                            <?php echo $_product->get_image(); ?>
                        </div>
                        <div class="item-details">
                            <h3 class="item-name">
                                <?php if ($product_permalink) : ?>
                                    <a href="<?php echo esc_url($product_permalink); ?>"><?php echo $_product->get_name(); ?></a>
                                <?php else : ?>
                                    <?php echo $_product->get_name(); ?>
                                <?php endif; ?>
                            </h3>
                            <p class="item-price"><?php echo wc_price($cart_item['line_total']); ?></p>
                            <div class="item-quantity enhanced-quantity">
                                <label for="<?php echo esc_attr($input_id); ?>" class="quantity-label">Quantidade:</label>
                                <button type="button" class="quantity-btn minus" aria-label="Diminuir">-</button>
                                <input
                                    type="number"
                                    id="<?php echo esc_attr($input_id); ?>"
                                    name="cart[<?php echo esc_attr($cart_item_key); ?>][qty]"
                                    class="cart-qty-input"
                                    min="<?php echo esc_attr($min); ?>"
                                    max="<?php echo esc_attr($max); ?>"
                                    step="<?php echo esc_attr($step); ?>"
                                    value="<?php echo esc_attr($value); ?>"
                                    autocomplete="off"
                                >
                                <button type="button" class="quantity-btn plus" aria-label="Aumentar">+</button>
                            </div>
                        </div>
                        <a href="<?php echo esc_url(wc_get_cart_remove_url($cart_item_key)); ?>" class="remove-item" aria-label="Remover">×</a>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <!-- Cart Actions -->
            <?php if (!empty($cart_items)) : ?>
            <div class="actions">
                <button type="submit" class="button" name="update_cart" value="<?php esc_attr_e('Atualizar Carrinho', 'woocommerce'); ?>"><?php esc_html_e('Atualizar Carrinho', 'woocommerce'); ?></button>
            </div>
            <?php endif; ?>
        </form>
        <!-- Cart Summary -->
        <div class="cart-summary">
            <h2>Resumo do Pedido</h2>
            <div class="summary-row">
                <span>Subtotal</span>
                <span><?php echo $cart->get_cart_subtotal(); ?></span>
            </div>
            <div class="summary-row">
                <span>Frete</span>
                <span><?php echo WC()->cart->get_cart_shipping_total() ? WC()->cart->get_cart_shipping_total() : 'A calcular'; ?></span>
            </div>
            <div class="summary-row total">
                <span>Total</span>
                <span><?php echo $cart->get_total(); ?></span>
            </div>
            <?php if (!empty($cart_items)) : ?>
            <a href="<?php echo esc_url(wc_get_checkout_url()); ?>" class="checkout-btn">Finalizar Compra</a>
            <?php endif; ?>
            <div class="continue-shopping">
                <a href="<?php echo home_url('/shop'); ?>">← Continuar comprando</a>
            </div>
        </div>
    </div>
</div>

<style>
.cart-page {
    padding: 2rem 0;
    background-color: #f8f8f8;
    min-height: 100vh;
}

.cart-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1rem;
    display: grid;
    grid-template-columns: 1fr 350px;
    gap: 2rem;
}

.cart-title {
    grid-column: 1 / -1;
    font-size: 2rem;
    margin-bottom: 2rem;
    color: #333;
}

.cart-items {
    background: white;
    border-radius: 12px;
    padding: 1.5rem;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.cart-item {
    display: grid;
    grid-template-columns: 100px 1fr auto;
    gap: 1.5rem;
    padding: 1.5rem 0;
    border-bottom: 1px solid #eee;
}

.cart-item:last-child {
    border-bottom: none;
}

.item-image img {
    width: 100%;
    height: auto;
    border-radius: 8px;
    object-fit: cover;
}

.item-details {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.item-name {
    font-size: 1.1rem;
    font-weight: 500;
    color: #333;
}

.item-price {
    font-size: 1.1rem;
    color: #666;
}

.item-quantity {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-top: 0.5rem;
}

.quantity-btn {
    width: 30px;
    height: 30px;
    border: 1px solid #ddd;
    background: white;
    border-radius: 4px;
    cursor: pointer;
    font-size: 1.2rem;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s;
}

.quantity-btn:hover {
    background: #f5f5f5;
}

.item-quantity input {
    width: 50px;
    height: 30px;
    border: 1px solid #ddd;
    border-radius: 4px;
    text-align: center;
    font-size: 0.9rem;
}

.remove-item {
    background: none;
    border: none;
    font-size: 1.5rem;
    color: #999;
    cursor: pointer;
    padding: 0.5rem;
    transition: color 0.2s;
}

.remove-item:hover {
    color: #ff4444;
}

.cart-summary {
    background: white;
    border-radius: 12px;
    padding: 1.5rem;
    height: fit-content;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.cart-summary h2 {
    font-size: 1.5rem;
    margin-bottom: 1.5rem;
    color: #333;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    padding: 0.75rem 0;
    color: #666;
}

.summary-row.total {
    border-top: 2px solid #eee;
    margin-top: 0.75rem;
    padding-top: 1rem;
    font-weight: 600;
    color: #333;
    font-size: 1.1rem;
}

.checkout-btn {
    width: 100%;
    padding: 1rem;
    background: #333;
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    font-weight: 500;
    cursor: pointer;
    margin-top: 1.5rem;
    transition: background-color 0.2s;
}

.checkout-btn:hover {
    background: #444;
}

.continue-shopping {
    text-align: center;
    margin-top: 1rem;
}

.continue-shopping a {
    color: #666;
    text-decoration: none;
    font-size: 0.9rem;
    transition: color 0.2s;
}

.continue-shopping a:hover {
    color: #333;
}

.cart-title .cart-count {
    font-size: 1.1rem;
    font-weight: 400;
    color: #888;
    margin-left: 0.5rem;
}
.quantity-label {
    margin-right: 0.5rem;
    font-size: 0.95rem;
    color: #555;
}
.enhanced-quantity {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}
.cart-qty-input {
    width: 80px !important;
    height: 44px;
    padding: 0.5rem 1rem;
    border: 2px solid #bbb;
    border-radius: 8px;
    text-align: center;
    font-size: 1.2rem;
    margin: 0 0.5rem;
    background: #f9f9f9;
    transition: border-color 0.2s;
}
.cart-qty-input:focus {
    border-color: #333;
    outline: none;
    background: #fff;
}
.quantity-btn {
    width: 38px;
    height: 38px;
    border: 1.5px solid #bbb;
    background: #fff;
    border-radius: 50%;
    cursor: pointer;
    font-size: 1.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.2s, border-color 0.2s;
    color: #333;
    font-weight: 600;
}
.quantity-btn:hover {
    background: #f0f0f0;
    border-color: #888;
}

@media (max-width: 768px) {
    .cart-container {
        grid-template-columns: 1fr;
    }
    
    .cart-item {
        grid-template-columns: 80px 1fr auto;
        gap: 1rem;
    }
    
    .item-quantity {
        flex-wrap: wrap;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle quantity changes (do NOT auto-submit)
    document.querySelectorAll('.enhanced-quantity').forEach(function(qtyBox) {
        var minus = qtyBox.querySelector('.quantity-btn.minus');
        var plus = qtyBox.querySelector('.quantity-btn.plus');
        var input = qtyBox.querySelector('input[type="number"]');
        
        if (!input) return;
        
        minus.addEventListener('click', function() {
            var min = parseInt(input.getAttribute('min')) || 1;
            var val = parseInt(input.value) || min;
            if (val > min) {
                input.value = val - 1;
                // No form submission here
            }
        });
        
        plus.addEventListener('click', function() {
            var max = parseInt(input.getAttribute('max')) || 9999;
            var val = parseInt(input.value) || 1;
            if (val < max) {
                input.value = val + 1;
                // No form submission here
            }
        });
    });

    // Handle remove item clicks
    document.querySelectorAll('.remove-item').forEach(function(removeBtn) {
        removeBtn.addEventListener('click', function(e) {
            e.preventDefault();
            if (confirm('Tem certeza que deseja remover este item do carrinho?')) {
                window.location.href = this.href;
            }
        });
    });
});
</script>

<?php
// Handle remove item action
if (isset($_POST['remove_cart_item'])) {
    $cart_item_key = sanitize_text_field($_POST['remove_cart_item']);
    WC()->cart->remove_cart_item($cart_item_key);
    wp_safe_redirect(wc_get_cart_url());
    exit;
}
?> 