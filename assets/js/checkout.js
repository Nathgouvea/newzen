/**
 * Checkout Page Enhancements
 * Modern, elegant, and user-friendly checkout experience
 */

document.addEventListener("DOMContentLoaded", function () {
  "use strict";

  // Initialize checkout enhancements
  initCheckoutEnhancements();
});

function initCheckoutEnhancements() {
  // Progress indicator functionality
  initProgressIndicator();

  // Form field enhancements
  enhanceFormFields();

  // Payment method interactions
  enhancePaymentMethods();

  // Order review enhancements
  enhanceOrderReview();

  // Loading states
  initLoadingStates();

  // Smooth scrolling
  initSmoothScrolling();
}

/**
 * Progress Indicator
 */
function initProgressIndicator() {
  const progressSteps = document.querySelectorAll(".checkout-progress__step");
  const formSections = document.querySelectorAll(
    ".woocommerce-billing-fields, .woocommerce-shipping-fields, #order_review"
  );

  if (!progressSteps.length) return;

  // Update progress based on form completion
  function updateProgress() {
    let completedSteps = 0;

    formSections.forEach((section, index) => {
      const inputs = section.querySelectorAll(
        "input[required], select[required]"
      );
      const filledInputs = Array.from(inputs).filter(
        (input) => input.value.trim() !== ""
      );

      if (inputs.length > 0 && filledInputs.length === inputs.length) {
        completedSteps = Math.max(completedSteps, index + 1);
      }
    });

    progressSteps.forEach((step, index) => {
      if (index < completedSteps) {
        step.classList.add("active");
      } else {
        step.classList.remove("active");
      }
    });
  }

  // Listen for form changes
  const formInputs = document.querySelectorAll(
    ".woocommerce-checkout input, .woocommerce-checkout select"
  );
  formInputs.forEach((input) => {
    input.addEventListener("change", updateProgress);
    input.addEventListener("blur", updateProgress);
  });

  // Initial progress check
  updateProgress();
}

/**
 * Form Field Enhancements
 */
function enhanceFormFields() {
  const formFields = document.querySelectorAll(".form-row");

  formFields.forEach((field) => {
    const input = field.querySelector("input, select, textarea");
    const label = field.querySelector("label");

    if (!input || !label) return;

    // Add floating label effect
    if (input.value.trim() !== "") {
      field.classList.add("has-value");
    }

    input.addEventListener("focus", () => {
      field.classList.add("is-focused");
    });

    input.addEventListener("blur", () => {
      field.classList.remove("is-focused");
      if (input.value.trim() !== "") {
        field.classList.add("has-value");
      } else {
        field.classList.remove("has-value");
      }
    });

    input.addEventListener("input", () => {
      if (input.value.trim() !== "") {
        field.classList.add("has-value");
      } else {
        field.classList.remove("has-value");
      }
    });

    // Add validation feedback
    input.addEventListener("invalid", (e) => {
      e.preventDefault();
      field.classList.add("is-invalid");
    });

    input.addEventListener("input", () => {
      if (field.classList.contains("is-invalid")) {
        field.classList.remove("is-invalid");
      }
    });
  });
}

/**
 * Payment Method Enhancements
 */
function enhancePaymentMethods() {
  const paymentMethods = document.querySelectorAll(".wc_payment_method");

  paymentMethods.forEach((method) => {
    const radio = method.querySelector('input[type="radio"]');
    const label = method.querySelector("label");

    if (!radio || !label) return;

    // Add click handler to entire payment method area
    method.addEventListener("click", (e) => {
      if (e.target !== radio) {
        radio.checked = true;
        radio.dispatchEvent(new Event("change", { bubbles: true }));
      }
    });

    // Add visual feedback on selection
    radio.addEventListener("change", () => {
      paymentMethods.forEach((m) => m.classList.remove("is-selected"));
      if (radio.checked) {
        method.classList.add("is-selected");
      }
    });

    // Initialize selected state
    if (radio.checked) {
      method.classList.add("is-selected");
    }
  });
}

/**
 * Order Review Enhancements
 */
function enhanceOrderReview() {
  const orderTable = document.querySelector(".shop_table");

  if (!orderTable) return;

  // Add row hover effects
  const tableRows = orderTable.querySelectorAll("tr");
  tableRows.forEach((row) => {
    row.addEventListener("mouseenter", () => {
      row.style.backgroundColor = "rgba(107, 79, 196, 0.02)";
    });

    row.addEventListener("mouseleave", () => {
      row.style.backgroundColor = "";
    });
  });

  // Animate total on update
  const totalRow = orderTable.querySelector(".order-total");
  if (totalRow) {
    totalRow.addEventListener("DOMSubtreeModified", () => {
      totalRow.style.transform = "scale(1.02)";
      setTimeout(() => {
        totalRow.style.transform = "";
      }, 200);
    });
  }
}

/**
 * Loading States
 */
function initLoadingStates() {
  const placeOrderBtn = document.getElementById("place_order");
  const formWrapper = document.querySelector(".checkout-form-wrapper");

  if (!placeOrderBtn || !formWrapper) return;

  placeOrderBtn.addEventListener("click", () => {
    // Add loading state
    formWrapper.classList.add("loading");
    placeOrderBtn.disabled = true;
    placeOrderBtn.innerHTML =
      '<span class="loading-spinner"></span> Processando...';

    // Remove loading state after form submission (or timeout)
    setTimeout(() => {
      formWrapper.classList.remove("loading");
      placeOrderBtn.disabled = false;
      placeOrderBtn.innerHTML = "Finalizar Compra";
    }, 5000); // Fallback timeout
  });

  // Listen for form submission events
  document.addEventListener("woocommerce_checkout_place_order", () => {
    formWrapper.classList.add("loading");
  });

  document.addEventListener("woocommerce_checkout_order_processed", () => {
    formWrapper.classList.remove("loading");
  });
}

/**
 * Smooth Scrolling
 */
function initSmoothScrolling() {
  // Smooth scroll to form sections when clicking progress steps
  const progressSteps = document.querySelectorAll(".checkout-progress__step");
  const formSections = document.querySelectorAll(
    ".woocommerce-billing-fields, .woocommerce-shipping-fields, #order_review"
  );

  progressSteps.forEach((step, index) => {
    step.addEventListener("click", () => {
      if (formSections[index]) {
        formSections[index].scrollIntoView({
          behavior: "smooth",
          block: "start",
        });
      }
    });
  });
}

/**
 * Trust Indicators Animation
 */
function initTrustIndicators() {
  const trustBadges = document.querySelectorAll(".checkout-trust__badge");

  trustBadges.forEach((badge, index) => {
    badge.style.animationDelay = `${index * 0.1}s`;
    badge.classList.add("animate-in");
  });
}

/**
 * Benefits List Animation
 */
function initBenefitsAnimation() {
  const benefitsList = document.querySelectorAll(".checkout-benefits__list li");

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry, index) => {
        if (entry.isIntersecting) {
          entry.target.style.animationDelay = `${index * 0.1}s`;
          entry.target.classList.add("animate-in");
        }
      });
    },
    { threshold: 0.1 }
  );

  benefitsList.forEach((item) => {
    observer.observe(item);
  });
}

/**
 * Form Validation Enhancement
 */
function enhanceFormValidation() {
  const form = document.querySelector(".woocommerce-checkout");

  if (!form) return;

  form.addEventListener("submit", (e) => {
    const requiredFields = form.querySelectorAll(
      "input[required], select[required]"
    );
    let isValid = true;

    requiredFields.forEach((field) => {
      if (!field.value.trim()) {
        isValid = false;
        field.classList.add("is-invalid");

        // Scroll to first invalid field
        if (isValid === false) {
          field.scrollIntoView({
            behavior: "smooth",
            block: "center",
          });
        }
      } else {
        field.classList.remove("is-invalid");
      }
    });

    if (!isValid) {
      e.preventDefault();

      // Show error message
      showNotification(
        "Por favor, preencha todos os campos obrigatórios.",
        "error"
      );
    }
  });
}

/**
 * Notification System
 */
function showNotification(message, type = "info") {
  // Remove existing notifications
  const existingNotification = document.querySelector(".checkout-notification");
  if (existingNotification) {
    existingNotification.remove();
  }

  // Create notification element
  const notification = document.createElement("div");
  notification.className = `checkout-notification checkout-notification--${type}`;
  notification.innerHTML = `
        <div class="checkout-notification__content">
            <i class="fas fa-${
              type === "error" ? "exclamation-circle" : "info-circle"
            }"></i>
            <span>${message}</span>
        </div>
        <button class="checkout-notification__close">&times;</button>
    `;

  // Add to page
  document.body.appendChild(notification);

  // Show notification
  setTimeout(() => {
    notification.classList.add("show");
  }, 100);

  // Auto-hide after 5 seconds
  setTimeout(() => {
    notification.classList.remove("show");
    setTimeout(() => {
      notification.remove();
    }, 300);
  }, 5000);

  // Close button functionality
  const closeBtn = notification.querySelector(".checkout-notification__close");
  closeBtn.addEventListener("click", () => {
    notification.classList.remove("show");
    setTimeout(() => {
      notification.remove();
    }, 300);
  });
}

/**
 * Accessibility Enhancements
 */
function enhanceAccessibility() {
  // Add ARIA labels and roles
  const progressSteps = document.querySelectorAll(".checkout-progress__step");
  progressSteps.forEach((step, index) => {
    step.setAttribute("role", "button");
    step.setAttribute("tabindex", "0");
    step.setAttribute(
      "aria-label",
      `Etapa ${index + 1}: ${
        step.querySelector(".checkout-progress__label").textContent
      }`
    );

    // Keyboard navigation
    step.addEventListener("keydown", (e) => {
      if (e.key === "Enter" || e.key === " ") {
        e.preventDefault();
        step.click();
      }
    });
  });

  // Focus management
  const formInputs = document.querySelectorAll(
    ".woocommerce-checkout input, .woocommerce-checkout select, .woocommerce-checkout textarea"
  );
  formInputs.forEach((input) => {
    input.addEventListener("focus", () => {
      input.closest(".form-row").classList.add("is-focused");
    });

    input.addEventListener("blur", () => {
      input.closest(".form-row").classList.remove("is-focused");
    });
  });
}

// Initialize all enhancements when DOM is ready
document.addEventListener("DOMContentLoaded", function () {
  initCheckoutEnhancements();
  initTrustIndicators();
  initBenefitsAnimation();
  enhanceFormValidation();
  enhanceAccessibility();
});

// Export functions for potential external use
window.CheckoutEnhancements = {
  showNotification,
  updateProgress: initProgressIndicator,
  enhanceFormFields,
  enhancePaymentMethods,
};
