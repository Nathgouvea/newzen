jQuery(document).ready(function ($) {
  // Get all category tags and product sections
  const categoryTags = $(".category-tag");
  const productSections = $(".product-section");

  // Check if elements exist
  if (categoryTags.length === 0) {
    return; // Exit if no category tags found
  }

  // Log initial setup for debugging (removed console.log)
  // console.log("Category tags found:", categoryTags.length);
  // console.log("Product sections found:", productSections.length);

  // If no category tags, don't proceed
  if (categoryTags.length === 0) {
    return;
  }

  // Log each tag and section for debugging (removed console.log)
  categoryTags.each(function (index) {
    // console.log(`Tag ${index}:`, $(this).text(), "href:", $(this).attr("href"));
  });

  productSections.each(function (index) {
    // console.log(`Section ${index}:`, $(this).attr("id"));
  });

  // Handle click events on category tags
  categoryTags.on("click", function (e) {
    e.preventDefault();

    // Log click detection (removed console.log)
    // console.log("=== CLICK DETECTED ===");

    const $tag = $(this);
    const targetId = $tag.attr("href").substring(1); // Remove the # from href

    // Log clicked tag info (removed console.log)
    // console.log("Clicked tag:", $tag.text());
    // console.log("Target ID:", targetId);

    // Remove active class from all tags
    categoryTags.removeClass("active");

    // Add active class to clicked tag
    $tag.addClass("active");

    // Hide all product sections
    productSections.hide();

    // Show the target section
    const targetSection = $("#" + targetId);
    if (targetSection.length > 0) {
      targetSection.show();
      // Log success (removed console.log)
      // console.log("✓ Showing section:", targetId);
    } else {
      // Log error (removed console.log)
      // console.log("✗ Section not found:", targetId);
    }
  });

  // Set default active state
  function setDefaultActive() {
    // Show "todos-produtos" section by default
    productSections.hide();
    $("#todos-produtos").show();

    // Set first tag as active
    categoryTags.first().addClass("active");

    // Log default state (removed console.log)
    // console.log("✓ Default section shown: todos-produtos");
  }

  // Initialize the filter
  function initFilter() {
    setDefaultActive();
    // Log initialization (removed console.log)
    // console.log("=== PRODUCT FILTER INITIALIZED ===");
  }

  // Start the filter
  initFilter();
});
