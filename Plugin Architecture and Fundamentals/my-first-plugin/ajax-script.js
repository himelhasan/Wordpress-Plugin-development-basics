jQuery(document).ready(function ($) {
  console.log("ready first plugin");

  $("#first-secure-plugin-form").on("submit", function (e) {
    e.preventDefault();

    $.ajax({
      type: "POST",
      url: siteData.ajaxURL,
      data: {
        action: "first_plugin_action",
        nonce: siteData.nonce,
        form_data: $(this).serialize(),
      },
      success: function (response) {
        console.log(response);
      },
    });
  });
});
