jQuery(document).ready(function ($) {
  console.log("My script is loaded!");

  $("#secure-contact-form").on("submit", function (e) {
    e.preventDefault();
  });
});
