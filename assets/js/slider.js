document.addEventListener("DOMContentLoaded", function () {
  // Get all slider elements
  const slider = document.querySelector(".hero-slider");
  const slides = document.querySelectorAll(".slide");
  const dots = document.querySelectorAll(".hero-slider-dot");
  const prevButton = document.querySelector(".hero-slider-arrow.prev");
  const nextButton = document.querySelector(".hero-slider-arrow.next");

  let currentSlide = 0;
  let isAnimating = false;

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
        goToSlide(index);
      }
    });
  });

  // Event listeners for arrows
  prevButton.addEventListener("click", () => {
    goToSlide(currentSlide - 1);
  });

  nextButton.addEventListener("click", () => {
    goToSlide(currentSlide + 1);
  });

  // Auto advance slides
  let slideInterval = setInterval(() => {
    goToSlide(currentSlide + 1);
  }, 5000);

  // Pause auto-advance on hover
  slider.addEventListener("mouseenter", () => {
    clearInterval(slideInterval);
  });

  // Resume auto-advance when mouse leaves
  slider.addEventListener("mouseleave", () => {
    slideInterval = setInterval(() => {
      goToSlide(currentSlide + 1);
    }, 5000);
  });

  // Keyboard navigation
  document.addEventListener("keydown", (e) => {
    if (e.key === "ArrowLeft") {
      goToSlide(currentSlide - 1);
    } else if (e.key === "ArrowRight") {
      goToSlide(currentSlide + 1);
    }
  });
});
