// Import Alpine.js if not present
if (typeof Alpine === "undefined") {
  const script = document.createElement("script");
  script.src = "https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js";
  script.defer = true;
  document.head.appendChild(script);
}

document.addEventListener("DOMContentLoaded", () => {
  // Header scroll behavior
  const header = document.querySelector(".header");
  let lastScroll = 0;
  const scrollThreshold = 100; // Minimum scroll amount before showing/hiding header

  // window.addEventListener("scroll", () => {
  //   const currentScroll = window.pageYOffset;

  //   // Always show header at the top of the page
  //   if (currentScroll <= 0) {
  //     header.classList.remove("scroll-up");
  //     header.classList.remove("scroll-down");
  //     header.classList.remove("scrolled");
  //     return;
  //   }

  //   // Add scrolled class for background when scrolling down
  //   if (currentScroll > 50) {
  //     header.classList.add("scrolled");
  //   } else {
  //     header.classList.remove("scrolled");
  //   }

  //   // Handle header show/hide based on scroll direction
  //   if (currentScroll > lastScroll && currentScroll > scrollThreshold) {
  //     // Scrolling down
  //     header.classList.remove("scroll-up");
  //     header.classList.add("scroll-down");
  //   } else if (currentScroll < lastScroll) {
  //     // Scrolling up
  //     header.classList.remove("scroll-down");
  //     header.classList.add("scroll-up");
  //   }

  //   lastScroll = currentScroll;
  // });

  // Initialize Alpine.js for mobile navigation
  document.addEventListener("alpine:init", () => {
    Alpine.data("mobileNav", () => ({
      isOpen: false,
      toggle() {
        this.isOpen = !this.isOpen;
        document.body.style.overflow = this.isOpen ? "hidden" : "";
      },
    }));

    Alpine.data("productCarousel", () => ({
      isPaused: false,
      pauseOnHover() {
        this.isPaused = true;
      },
      resumeOnLeave() {
        this.isPaused = false;
      },
    }));
  });

  // Handle mobile dropdowns
  const navItems = document.querySelectorAll(".nav__item");

  navItems.forEach((item) => {
    const link = item.querySelector(".nav__link");
    const dropdown = item.querySelector(".dropdown");

    if (dropdown) {
      link.addEventListener("click", (e) => {
        // Only prevent default and toggle dropdown on mobile
        if (window.innerWidth <= 768) {
          e.preventDefault();
          dropdown.classList.toggle("show");

          // Close other dropdowns
          navItems.forEach((otherItem) => {
            if (otherItem !== item) {
              const otherDropdown = otherItem.querySelector(".dropdown");
              if (otherDropdown) {
                otherDropdown.classList.remove("show");
              }
            }
          });
        }
      });
    }
  });

  // Smooth scroll for anchor links (excluding category tags)
  document
    .querySelectorAll('a[href^="#"]:not(.category-tag)')
    .forEach((anchor) => {
      anchor.addEventListener("click", function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute("href"));

        if (target) {
          target.scrollIntoView({
            behavior: "smooth",
            block: "start",
          });
          // Close mobile menu after clicking
          const nav = document.querySelector(".nav");
          const menuToggle = document.querySelector(".menu-toggle");
          nav?.classList.remove("active");
          menuToggle?.classList.remove("active");
        }
      });
    });

  // Fade in animations on scroll
  const fadeElements = document.querySelectorAll(".fade-in");
  const observerOptions = {
    threshold: 0.1,
    rootMargin: "0px 0px -50px 0px",
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("visible");
        observer.unobserve(entry.target);
      }
    });
  }, observerOptions);

  fadeElements.forEach((element) => observer.observe(element));

  // Close mobile menu when clicking outside
  document.addEventListener("click", (e) => {
    const nav = document.querySelector(".nav");
    const menuToggle = document.querySelector(".menu-toggle");
    if (!nav?.contains(e.target) && !menuToggle?.contains(e.target)) {
      nav?.classList.remove("active");
      menuToggle?.classList.remove("active");
    }
  });

  // Enhanced Search Bar Functionality for Header
  const searchForms = document.querySelectorAll(".search-form");
  searchForms.forEach(function (form) {
    const input = form.querySelector(".search-input");
    const icon = form.querySelector(".search-icon");
    if (!input || !icon) return;

    // Only toggle input if input is hidden (width 0 or opacity 0)
    icon.addEventListener("click", function (e) {
      // Only toggle if input is not visible
      if (!form.classList.contains("active")) {
        e.preventDefault();
        form.classList.add("active");
        input.focus();
      }
      // If already active, let the form submit
    });

    // Hide input when clicking outside
    document.addEventListener("click", function (e) {
      if (!form.contains(e.target)) {
        form.classList.remove("active");
      }
    });

    // If input is visible, allow normal submit
    form.addEventListener("submit", function (e) {
      if (!form.classList.contains("active")) {
        e.preventDefault();
        form.classList.add("active");
        input.focus();
      }
      // Otherwise, let the form submit as normal
    });
  });

  // Initialize MicroModal only for product lightbox links
  const productLightboxLinks = document.querySelectorAll(
    "[data-micromodal-trigger]"
  );
  if (productLightboxLinks.length > 0) {
    MicroModal.init({
      openTrigger: "data-micromodal-trigger",
      closeTrigger: "data-micromodal-close",
      openClass: "is-open",
      disableScroll: true,
      disableFocus: false,
      awaitOpenAnimation: false,
      awaitCloseAnimation: false,
      debugMode: false,
    });
  }

  /* Pause Novidades slider on hover/focus */
  document
    .querySelectorAll(
      "#novidades .product-slider-arrow, #novidades .product-slider-dots"
    )
    .forEach((el) =>
      el.addEventListener("mouseenter", () => clearInterval(window.novTimer))
    );

  /* contact form handling with Formspree */
  const contactForm = document.getElementById("contactForm");
  if (contactForm) {
    const successMessage = document.getElementById("formSuccess");
    const errorMessage = document.getElementById("formError");
    const submitButton = contactForm.querySelector(".btn-submit");
    const originalButtonText = submitButton.innerHTML;

    // Hide any existing messages
    function hideMessages() {
      if (successMessage) successMessage.style.display = "none";
      if (errorMessage) errorMessage.style.display = "none";
    }

    // Show loading state
    function showLoading() {
      submitButton.disabled = true;
      submitButton.innerHTML =
        '<i class="fas fa-spinner fa-spin"></i> Enviando...';
    }

    // Reset button state
    function resetButton() {
      submitButton.disabled = false;
      submitButton.innerHTML = originalButtonText;
    }

    // Show success message
    function showSuccess() {
      hideMessages();
      if (successMessage) {
        successMessage.style.display = "flex";
        successMessage.scrollIntoView({ behavior: "smooth", block: "center" });
      }
      contactForm.reset();
    }

    // Show error message
    function showError() {
      hideMessages();
      if (errorMessage) {
        errorMessage.style.display = "flex";
        errorMessage.scrollIntoView({ behavior: "smooth", block: "center" });
      }
    }

    // Form validation
    function validateForm() {
      let valid = true;
      const requiredFields = ["name", "email", "subject", "message"];

      requiredFields.forEach((fieldName) => {
        const field = contactForm.querySelector(`[name="${fieldName}"]`);
        const errorElement = document.getElementById(
          `err-${
            fieldName === "name"
              ? "nome"
              : fieldName === "message"
              ? "msg"
              : fieldName
          }`
        );

        if (field && errorElement) {
          if (!field.checkValidity()) {
            errorElement.textContent = "Campo obrigatório";
            valid = false;
          } else {
            errorElement.textContent = "";
          }
        }
      });

      return valid;
    }

    contactForm.addEventListener("submit", async (e) => {
      e.preventDefault();

      // Hide any existing messages
      hideMessages();

      // Validate form
      if (!validateForm()) {
        return;
      }

      // Show loading state
      showLoading();

      try {
        const formData = new FormData(contactForm);
        const response = await fetch(contactForm.action, {
          method: "POST",
          body: formData,
          headers: {
            Accept: "application/json",
          },
        });

        if (response.ok) {
          showSuccess();
        } else {
          showError();
        }
      } catch (error) {
        console.error("Form submission error:", error);
        showError();
      } finally {
        resetButton();
      }
    });

    // Clear error messages when user starts typing
    const inputs = contactForm.querySelectorAll("input, textarea, select");
    inputs.forEach((input) => {
      input.addEventListener("input", () => {
        const fieldName = input.name;
        const errorElement = document.getElementById(
          `err-${
            fieldName === "name"
              ? "nome"
              : fieldName === "message"
              ? "msg"
              : fieldName
          }`
        );
        if (errorElement) {
          errorElement.textContent = "";
        }
      });
    });
  }

  // Aroma tabs smooth scrolling
  document.querySelectorAll(".aroma-tabs a").forEach((a) => {
    a.addEventListener("click", (e) => {
      e.preventDefault();
      document
        .querySelector(a.getAttribute("href"))
        .scrollIntoView({ behavior: "smooth", block: "start" });
    });
  });

  // Category Tags Active State for Aromas page only
  const aromaDetails = document.querySelectorAll(".aroma-accordion details");
  const aromaCategoryTags = document.querySelectorAll(
    ".aroma-accordion .category-tag"
  );

  // Only run aroma-specific code if we're on the aromas page
  if (aromaDetails.length > 0 && aromaCategoryTags.length > 0) {
    // Update active tag on scroll
    window.addEventListener("scroll", () => {
      let current = "";

      aromaDetails.forEach((detail) => {
        const detailTop = detail.offsetTop;
        const detailHeight = detail.clientHeight;
        if (pageYOffset >= detailTop - 200) {
          current = detail.getAttribute("id");
        }
      });

      aromaCategoryTags.forEach((tag) => {
        tag.classList.remove("active");
        if (tag.getAttribute("href").slice(1) === current) {
          tag.classList.add("active");
        }
      });
    });

    // Smooth scroll to section when clicking tags
    aromaCategoryTags.forEach((tag) => {
      tag.addEventListener("click", function (e) {
        e.preventDefault();
        const targetId = this.getAttribute("href");
        const targetDetail = document.querySelector(targetId);

        if (targetDetail) {
          targetDetail.scrollIntoView({ behavior: "smooth" });
          targetDetail.setAttribute("open", true);
        }
      });
    });
  }

  // Mobile Menu Toggle
  const nav = document.querySelector(".nav");
  const openBtn = document.querySelector(".menu-toggle--open");
  const closeBtn = nav ? nav.querySelector(".menu-toggle--close") : null;

  function openMenu() {
    nav.classList.add("active");
    openBtn.style.display = "none";
    document.body.style.overflow = "hidden";
  }

  function closeMenu() {
    nav.classList.remove("active");
    openBtn.style.display = "block";
    document.body.style.overflow = "";
  }

  if (openBtn && nav) {
    openBtn.addEventListener("click", openMenu);
  }
  if (closeBtn && nav) {
    closeBtn.addEventListener("click", closeMenu);
  }

  // Optional: close menu when clicking outside nav (mobile only)
  document.addEventListener("click", (e) => {
    if (
      nav.classList.contains("active") &&
      !nav.contains(e.target) &&
      e.target !== openBtn
    ) {
      closeMenu();
    }
  });
});

// Ensure progress bar is correct on thank you page
window.addEventListener("DOMContentLoaded", function () {
  var progressBar = document.querySelector(".cart-progress-bar");
  if (progressBar && window.location.href.indexOf("order-received") !== -1) {
    var steps = progressBar.querySelectorAll(".progress-step");
    steps.forEach(function (step) {
      step.classList.remove("active");
    });
    if (steps[2]) steps[2].classList.add("active");
  }
});
