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

  window.addEventListener("scroll", () => {
    const currentScroll = window.pageYOffset;

    // Always show header at the top of the page
    if (currentScroll <= 0) {
      header.classList.remove("scroll-up");
      header.classList.remove("scroll-down");
      header.classList.remove("scrolled");
      return;
    }

    // Add scrolled class for background when scrolling down
    if (currentScroll > 50) {
      header.classList.add("scrolled");
    } else {
      header.classList.remove("scrolled");
    }

    // Handle header show/hide based on scroll direction
    if (currentScroll > lastScroll && currentScroll > scrollThreshold) {
      // Scrolling down
      header.classList.remove("scroll-up");
      header.classList.add("scroll-down");
    } else if (currentScroll < lastScroll) {
      // Scrolling up
      header.classList.remove("scroll-down");
      header.classList.add("scroll-up");
    }

    lastScroll = currentScroll;
  });

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

  // Smooth scroll for anchor links
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
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

  // Search Bar Functionality
  const searchForm = document.querySelector(".search-form");
  const searchIcon = document.querySelector(".search-icon");
  const searchInput = document.querySelector(".search-input");

  if (searchIcon && searchForm && searchInput) {
    searchIcon.addEventListener("click", (e) => {
      e.preventDefault();
      searchForm.classList.toggle("active");
      if (searchForm.classList.contains("active")) {
        searchInput.focus();
      }
    });

    document.addEventListener("click", (e) => {
      if (!searchForm.contains(e.target)) {
        searchForm.classList.remove("active");
      }
    });

    // Add search form submit handler
    searchForm.addEventListener("submit", function (e) {
      e.preventDefault();
      const query = searchInput.value.trim();
      if (query) {
        const normalized = query.toLowerCase();
        // Category and product mapping
        const redirects = [
          // Categories
          {
            keywords: [
              "velas",
              "velas aromaticas",
              "vela aromatica",
              "vela aromáticas",
              "velas aromáticas",
            ],
            url: "velas-aromaticas.html",
          },
          {
            keywords: ["aromatizadores", "aromatizador"],
            url: "aromatizadores.html",
          },
          {
            keywords: ["home spray", "homespray", "home sprays"],
            url: "home-spray.html",
          },
          {
            keywords: ["kits", "kits especiais", "kit especial"],
            url: "kits-especiais.html",
          },
          {
            keywords: ["lembrancinhas", "lembrancinha"],
            url: "lembrancinhas.html",
          },
          {
            keywords: ["acessorios", "acessórios", "acessório", "acessorio"],
            url: "acessorios.html",
          },
          // Aromas (redirect to aromas.html)
          {
            keywords: [
              "aroma",
              "aromas",
              "bamboo",
              "bambu",
              "chá branco",
              "cha branco",
              "flor de figo",
              "figo",
              "palo santo",
              "baunilha",
              "lavanda",
              "alecrim",
              "jasmim",
              "cedro",
              "canela",
              "rosa",
              "sândalo",
              "sandalo",
              "limão siciliano",
              "limao siciliano",
              "frutas vermelhas",
              "frutas",
              "verbena",
              "patchouli",
              "patchoulli",
              "amber",
              "âmbar",
              "ambar",
              "madeira",
              "madeiras",
              "citrus",
              "coco",
              "musk",
              "floral",
              "oriental",
              "gourmand",
              "herbal",
              "frutado",
              "especiarias",
            ],
            url: "aromas.html",
          },
          // Products
          { keywords: ["vela bamboo"], url: "velas-aromaticas.html" },
          { keywords: ["vela palo santo"], url: "velas-aromaticas.html" },
          {
            keywords: ["vela chá branco", "vela cha branco"],
            url: "velas-aromaticas.html",
          },
          { keywords: ["vela flor de figo"], url: "velas-aromaticas.html" },
          {
            keywords: ["home spray chá branco", "home spray cha branco"],
            url: "home-spray.html",
          },
          { keywords: ["home spray flor de figo"], url: "home-spray.html" },
        ];
        let found = false;
        for (const item of redirects) {
          if (item.keywords.some((k) => normalized === k)) {
            window.location.href = `${item.url}?search=${encodeURIComponent(
              query
            )}`;
            found = true;
            break;
          }
        }
        if (!found) {
          window.location.href = `comprar.html?search=${encodeURIComponent(
            query
          )}`;
        }
      }
    });
  }

  // Initialize MicroModal only for product lightbox links
  const productLightboxLinks = document.querySelectorAll(
    "[data-micromodal-trigger]"
  );
  if (productLightboxLinks.length > 0) {
    MicroModal.init({
      onShow: (modal) => console.log(`${modal.id} is shown`),
      onClose: (modal) => console.log(`${modal.id} is hidden`),
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

  /* contact form inline validation */
  const f = document.getElementById("contactForm");
  if (f) {
    f.addEventListener("submit", (e) => {
      e.preventDefault();
      let valid = true;
      ["nome", "email", "msg"].forEach((id) => {
        const field = f[id];
        const err = document.getElementById("err-" + id);
        if (!field.checkValidity()) {
          err.textContent = "Campo obrigatório";
          valid = false;
        } else {
          err.textContent = "";
        }
      });
      if (valid) {
        f.reset();
        f.querySelector(".form-success").hidden = false;
      }
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

  // Category Tags Active State for Aromas page
  const aromaDetails = document.querySelectorAll(".aroma-accordion details");
  const aromaCategoryTags = document.querySelectorAll(".category-tag");

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
