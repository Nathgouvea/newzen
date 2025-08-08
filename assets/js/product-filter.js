jQuery(document).ready(function ($) {
  console.log("=== PRODUCT FILTER SCRIPT LOADED ===");

  // Check if we're on a page with category tags
  const categoryTags = $(".category-tag");
  const productSections = $(".featured-products");

  console.log("Category tags found:", categoryTags.length);
  console.log("Product sections found:", productSections.length);

  if (categoryTags.length === 0) {
    console.log("No category tags found - script will not run");
    return;
  }

  // Log what we found
  categoryTags.each(function (index) {
    console.log(`Tag ${index}:`, $(this).text(), "href:", $(this).attr("href"));
  });

  productSections.each(function (index) {
    console.log(`Section ${index}:`, $(this).attr("id"));
  });

  // Simple click handler
  categoryTags.on("click", function (e) {
    console.log("=== CLICK DETECTED ===");
    e.preventDefault();
    e.stopPropagation();

    const $tag = $(this);
    const href = $tag.attr("href");
    const targetId = href.replace(/^.*#/, "");

    console.log("Clicked tag:", $tag.text());
    console.log("Target ID:", targetId);

    // Hide all sections
    productSections.hide();

    // Show target section
    const targetSection = $(`#${targetId}`);
    if (targetSection.length) {
      targetSection.show();
      console.log("✓ Showing section:", targetId);
    } else {
      console.log("✗ Section not found:", targetId);
    }

    // Update active state
    categoryTags.removeClass("active");
    $tag.addClass("active");

    return false;
  });

  // Show default section
  const defaultSection = $("#todos-produtos");
  if (defaultSection.length) {
    productSections.hide();
    defaultSection.show();
    console.log("✓ Default section shown: todos-produtos");
  }

  // Set first tag as active
  if (categoryTags.length > 0) {
    categoryTags.first().addClass("active");
  }

  console.log("=== PRODUCT FILTER INITIALIZED ===");
});
