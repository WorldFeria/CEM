$(document).ready(function () {
  window.setTimeout(function () {
    $("#autoremove_alert").fadeTo(1000, 0).slideUp(750, function () {
      $(this).remove();
    });
  }, 1000);
});