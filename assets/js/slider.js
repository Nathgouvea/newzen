document.addEventListener("DOMContentLoaded", function () {
  // Get all slider elements with null checks
  const slider = document.querySelector(".hero-slider");
  if (!slider) return; // Exit if slider container not found

  const slides = slider.querySelectorAll(".slide");
  const dots = slider.querySelectorAll(".hero-slider-dot");
  const prevButton = slider.querySelector(".hero-slider-arrow.prev");
  const nextButton = slider.querySelector(".hero-slider-arrow.next");

  // Exit if required elements are not found
  if (!slides.length || !dots.length) return;

  let currentSlide = 0;
  let isAnimating = false;
  let slideInterval;

  // Function to go to a specific slide
  function goToSlide(index) {
    if (isAnimating) return;
    isAnimating = true;

    // Remove active class from current slide and dot
    slides[currentSlide].classList.remove("active");
    dots[currentSlide].classList.remove("active");

    // Update current slide index
    currentSlide = index;
    if (currentSlide >= slides.length) currentSlide = 0;
    if (currentSlide < 0) currentSlide = slides.length - 1;

    // Add active class to new slide and dot
    slides[currentSlide].classList.add("active");
    dots[currentSlide].classList.add("active");

    // Reset animation flag after transition
    setTimeout(() => {
      isAnimating = false;
    }, 1200);
  }

  // Event listeners for dots
  dots.forEach((dot, index) => {
    dot.addEventListener("click", () => {
      if (currentSlide !== index) {
        stopAutoplay();
        goToSlide(index);
      }
    });
  });

  // Event listeners for arrows
  if (prevButton) {
    prevButton.addEventListener("click", () => {
      stopAutoplay();
      goToSlide(currentSlide - 1);
    });
  }

  if (nextButton) {
    nextButton.addEventListener("click", () => {
      stopAutoplay();
      goToSlide(currentSlide + 1);
    });
  }

  // Auto advance slides
  function startAutoplay() {
    if (slideInterval) return;
    slideInterval = setInterval(() => {
      goToSlide(currentSlide + 1);
    }, 5000);
  }

  function stopAutoplay() {
    if (slideInterval) {
      clearInterval(slideInterval);
      slideInterval = null;
    }
  }

  // Start autoplay
  startAutoplay();

  // Pause auto-advance on hover
  slider.addEventListener("mouseenter", stopAutoplay);

  // Resume auto-advance when mouse leaves
  slider.addEventListener("mouseleave", startAutoplay);

  // Keyboard navigation
  document.addEventListener("keydown", (e) => {
    if (e.key === "ArrowLeft") {
      stopAutoplay();
      goToSlide(currentSlide - 1);
    } else if (e.key === "ArrowRight") {
      stopAutoplay();
      goToSlide(currentSlide + 1);
    }
  });
});
