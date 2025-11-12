/**
 * QRCode JavaScript
 *
 * This file generates the actual QR code using the QRCode.js library.
 * It runs when the page is fully loaded.
 */

// Wait for the DOM to be fully loaded before running our code
document.addEventListener("DOMContentLoaded", function () {
  // Find the QR code container element
  var qrcodeElement = document.querySelector(".simple-qrcode");

  // Exit if no QR code element is found
  if (!qrcodeElement) {
    return;
  }

  // Get the URL to encode (passed from PHP via wp_localize_script)
  var url = simpleQRCodeData.currentUrl;

  // Get size and color from data attributes
  var size = parseInt(qrcodeElement.getAttribute("data-size")) || 128;
  var color = qrcodeElement.getAttribute("data-color") || "#000000";

  // Generate the QR code
  // QRCode is provided by the QRCode.js library
  try {
    new QRCode(qrcodeElement, {
      text: url, // The URL to encode
      width: size, // Width of QR code
      height: size, // Height of QR code
      colorDark: color, // Color of the dark squares
      colorLight: "#ffffff", // Color of the light squares (always white)
      correctLevel: QRCode.CorrectLevel.H, // High error correction
    });

    // Log success message (helpful for debugging)
    console.log("Simple QRCode: QR code generated successfully for URL:", url);
  } catch (error) {
    // Log error if QR code generation fails
    console.error("Simple QRCode: Failed to generate QR code:", error);
  }
});
