jQuery(function ($) {
  // Debounce function to limit the rate at which a function can fire
  function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
      const later = () => {
        clearTimeout(timeout);
        func(...args);
      };
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
    };
  }

  // Handle quantity changes
  $(".woocommerce").on(
    "change",
    ".quantity input",
    debounce(function (e) {
      const $input = $(this);
      const qty = $input.val();
      const $row = $input.closest(".cart_item");
      const cartItemKey = $row.find(".product-remove a").data("cart-item-key");

      $row.block({
        message: null,
        overlayCSS: {
          background: "#fff",
          opacity: 0.6,
        },
      });

      $.ajax({
        type: "POST",
        url: wc_cart_params.ajax_url,
        data: {
          action: "update_cart_item_quantity",
          cart_item_key: cartItemKey,
          quantity: qty,
          security: wc_cart_params.update_cart_nonce,
        },
        success: function (response) {
          if (response.success) {
            $(document.body).trigger("updated_cart_totals");
            $row.unblock();
          }
        },
      });
    }, 500)
  );

  // Mobile swipe to remove
  if ("ontouchstart" in window) {
    let touchStartX = 0;
    let touchEndX = 0;
    const threshold = 100; // minimum distance for swipe

    $(".cart_item").on("touchstart", function (e) {
      touchStartX = e.touches[0].clientX;
    });

    $(".cart_item").on("touchmove", function (e) {
      touchEndX = e.touches[0].clientX;
      const distance = touchStartX - touchEndX;

      if (distance > 0) {
        $(this).css("transform", `translateX(-${Math.min(distance, 100)}px)`);
      }
    });

    $(".cart_item").on("touchend", function () {
      const distance = touchStartX - touchEndX;

      if (distance > threshold) {
        const $removeLink = $(this).find(".product-remove a");
        if ($removeLink.length) {
          $removeLink[0].click();
        }
      } else {
        $(this).css("transform", "");
      }
    });
  }

  // Update cart totals without page reload
  $(document.body).on("updated_cart_totals", function () {
    $.ajax({
      url: wc_cart_params.ajax_url,
      data: {
        action: "get_cart_totals",
      },
      success: function (response) {
        if (response.success) {
          $(".cart-collaterals").html(response.data.html);
        }
      },
    });
  });
});
