document.addEventListener("DOMContentLoaded", () => {
  // Get all slider elements with null checks
  const slider = document.querySelector(".product-slider");
  if (!slider) return;

  const slides = slider.querySelectorAll(".product-slide");
  const dots = slider.querySelectorAll(".product-slider-dot");
  const prevButton = slider.querySelector(".product-slider-arrow.prev");
  const nextButton = slider.querySelector(".product-slider-arrow.next");

  if (!slides.length || !dots.length) return;

  let currentSlide = 0;
  let isAnimating = false;
  let autoplayInterval;

  // Initialize first slide
  updateSlide(0);

  function updateSlide(index) {
    if (isAnimating) return;
    isAnimating = true;

    // Remove active classes
    slides[currentSlide].classList.remove("active");
    dots[currentSlide].classList.remove("active");

    // Update current slide
    currentSlide = index;
    if (currentSlide >= slides.length) currentSlide = 0;
    if (currentSlide < 0) currentSlide = slides.length - 1;

    // Add active classes
    slides[currentSlide].classList.add("active");
    dots[currentSlide].classList.add("active");

    // Reset animation flag
    setTimeout(() => {
      isAnimating = false;
    }, 800);
  }

  function nextSlide() {
    updateSlide((currentSlide + 1) % slides.length);
  }

  function prevSlide() {
    updateSlide((currentSlide - 1 + slides.length) % slides.length);
  }

  // Event Listeners
  if (prevButton) {
    prevButton.addEventListener("click", (e) => {
      e.preventDefault();
      stopAutoplay();
      prevSlide();
    });
  }

  if (nextButton) {
    nextButton.addEventListener("click", (e) => {
      e.preventDefault();
      stopAutoplay();
      nextSlide();
    });
  }

  // Dot navigation
  dots.forEach((dot, index) => {
    dot.addEventListener("click", (e) => {
      e.preventDefault();
      if (currentSlide !== index) {
        stopAutoplay();
        updateSlide(index);
      }
    });
  });

  // Keyboard navigation
  document.addEventListener("keydown", (e) => {
    if (e.key === "ArrowLeft") {
      stopAutoplay();
      prevSlide();
    } else if (e.key === "ArrowRight") {
      stopAutoplay();
      nextSlide();
    }
  });

  // Auto-advance slides
  function startAutoplay() {
    if (autoplayInterval) return;
    autoplayInterval = setInterval(nextSlide, 7000);
  }

  function stopAutoplay() {
    if (autoplayInterval) {
      clearInterval(autoplayInterval);
      autoplayInterval = null;
    }
  }

  // Start autoplay
  startAutoplay();

  // Pause autoplay on hover
  slider.addEventListener("mouseenter", stopAutoplay);
  slider.addEventListener("mouseleave", startAutoplay);
});
