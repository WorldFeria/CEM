$(document).ready(function () {

  function cards() {
    $.ajax({
      url: '../php/ajax/eventExh.php',
      success: function (data) {
        $(".outer_divExh").html(data);
      }
    })
  }

  cards();
})