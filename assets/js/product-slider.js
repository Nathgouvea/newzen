document.addEventListener("DOMContentLoaded", () => {
  const slider = document.querySelector(".product-slider");
  const slides = document.querySelectorAll(".product-slide");
  const dots = document.querySelectorAll(".product-slider-dot");
  const prevButton = document.querySelector(".product-slider-arrow.prev");
  const nextButton = document.querySelector(".product-slider-arrow.next");

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

    // Add active classes
    slides[currentSlide].classList.add("active");
    dots[currentSlide].classList.add("active");

    // Reset animation flag
    setTimeout(() => {
      isAnimating = false;
    }, 800);
  }

  function nextSlide() {
    const next = (currentSlide + 1) % slides.length;
    updateSlide(next);
  }

  function prevSlide() {
    const prev = (currentSlide - 1 + slides.length) % slides.length;
    updateSlide(prev);
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
    autoplayInterval = setInterval(nextSlide, 7000);
  }

  function stopAutoplay() {
    if (autoplayInterval) {
      clearInterval(autoplayInterval);
    }
  }

  // Start autoplay
  startAutoplay();

  // Pause autoplay on hover
  slider.addEventListener("mouseenter", stopAutoplay);
  slider.addEventListener("mouseleave", startAutoplay);
});
