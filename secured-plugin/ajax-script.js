jQuery(document).ready(function ($) {
  console.log("loaded");

  $("#secure-plugin-form").on("submit", function (e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: siteInfo.ajaxUrl,
      data: {
        action: "secure_form_submit",
        nonce: siteInfo.nonce,
        form_data: $(this).serialize(),
      },
      success: function (response) {
        console.log(response);
      },
    });
  });
});
