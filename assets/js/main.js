document.addEventListener("DOMContentLoaded", () => {
  // Mobile menu toggle
  const menuToggle = document.querySelector(".menu-toggle");
  const nav = document.querySelector(".nav");
  const dropdownItems = document.querySelectorAll(".has-dropdown");

  if (menuToggle && nav) {
    menuToggle.addEventListener("click", () => {
      nav.classList.toggle("active");
      menuToggle.classList.toggle("active");
    });
  }

  // Handle dropdown menus on mobile
  dropdownItems.forEach((item) => {
    const link = item.querySelector("a");

    if (window.innerWidth <= 768) {
      link.addEventListener("click", (e) => {
        e.preventDefault();
        item.classList.toggle("active");
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
});
