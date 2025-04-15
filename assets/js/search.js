document.addEventListener("DOMContentLoaded", function () {
  const searchIcon = document.querySelector(".search-icon");
  const searchOverlay = document.querySelector(".search-overlay");
  const searchClose = document.querySelector(".search-close");
  const searchInput = document.querySelector(".search-input");

  // Open search overlay
  searchIcon.addEventListener("click", function (e) {
    e.preventDefault();
    searchOverlay.classList.add("active");
    searchInput.focus();
  });

  // Close search overlay
  searchClose.addEventListener("click", function () {
    searchOverlay.classList.remove("active");
  });

  // Close search overlay when pressing Escape key
  document.addEventListener("keydown", function (e) {
    if (e.key === "Escape" && searchOverlay.classList.contains("active")) {
      searchOverlay.classList.remove("active");
    }
  });

  // Close search overlay when clicking outside
  searchOverlay.addEventListener("click", function (e) {
    if (e.target === searchOverlay) {
      searchOverlay.classList.remove("active");
    }
  });
});
