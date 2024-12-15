jQuery(document).ready(function ($) {
  function showPopup() {
    $("#homepage-popup").fadeIn();
  }

  // Sanitize and validate click events
  function safeClickHandler(selector, callback) {
    $(document).on("click", selector, function (e) {
      e.preventDefault(); // Prevent default actions
      e.stopPropagation(); // Stop event bubbling
      if (typeof callback === "function") {
        callback.call(this, e);
      }
    });
  }

  // Safe popup interactions
  safeClickHandler(".popup-close", function () {
    $("#homepage-popup").fadeOut();
  });

  safeClickHandler(".popup-overlay", function (e) {
    if ($(e.target).hasClass("popup-overlay")) {
      $("#homepage-popup").fadeOut();
    }
  });

  // Show popup
  showPopup();
});
