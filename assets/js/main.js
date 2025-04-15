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

  // Mobile menu toggle
  const menuToggle = document.querySelector(".menu-toggle");
  const nav = document.querySelector(".nav");

  if (menuToggle && nav) {
    menuToggle.addEventListener("click", () => {
      nav.classList.toggle("active");
      menuToggle.classList.toggle("active");
    });
  }

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
    if (!nav?.contains(e.target) && !menuToggle?.contains(e.target)) {
      nav?.classList.remove("active");
      menuToggle?.classList.remove("active");
    }
  });

  // Search Bar Functionality
  const searchForm = document.querySelector(".search-form");
  const searchIcon = document.querySelector(".search-icon");
  const searchInput = document.querySelector(".search-input");

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
});
