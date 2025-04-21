document.addEventListener("DOMContentLoaded", () => {
  const searchForm = document.querySelector(".search-form");
  const searchInput = document.querySelector(".search-input");
  const searchIcon = document.querySelector(".search-icon");

  if (!searchForm || !searchInput || !searchIcon) return;

  function toggleSearch(e) {
    e.preventDefault();
    searchForm.classList.toggle("active");
    if (searchForm.classList.contains("active")) {
      searchInput.focus();
    }
  }

  searchIcon.addEventListener("click", toggleSearch);

  // Close search on click outside
  document.addEventListener("click", (e) => {
    if (
      !searchForm.contains(e.target) &&
      searchForm.classList.contains("active")
    ) {
      searchForm.classList.remove("active");
    }
  });

  // Close search on escape key
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && searchForm.classList.contains("active")) {
      searchForm.classList.remove("active");
    }
  });
});
