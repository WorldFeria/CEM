$(document).ready(function () {

  var current_fs, next_fs, previous_fs; //fieldsets
  var opacity;
  var current = 1;
  var steps = $("fieldset").length;

  var listar = function () {
    var table = $('#leads_table').DataTable({
      "destroy": true,
      "ajax": {
        "method": "POST",
        "url": "../php/leads_list.php",
        "data": {
          "param": "customers",
        }
      },
      "columns": [

        {
          data: "name_status",
          render: function (data, type, row) {
            return `<div class="card_name_leads ${data} d-flex justify-content-center">${data}</div>`;
          }
        },
        { "data": "id_customer" },
        { "data": "firstname" },
        { "data": "lastname" },
        { "data": "email" },
        { "data": "dial" },
        { "data": "cellphone" },
        //{"data":"country"},
        { "data": "creation" },
        { "defaultContent": "<div class='d-flex justify-content-center' > <button class='btn btn-primary edit-lean' style='margin:2px'><i class='bx bx-pencil nav_logo-icon'></i></button>  <button class='btn btn-success excel-lean' style='margin:2px' ><i class='bx bx-columns nav_logo-icon'></i></button>  <button class='btn btn-danger' style='margin:2px'><i class='bx bx-trash-alt nav_logo-icon'></i></button> </div>" }

      ]

    });

    obtain_lead_data("#leads_table tbody", table);

  }

  var obtain_lead_data = function (tbody, table) {

    $(tbody).on("click", "button.edit-lean", function () {
      var data = table.row($(this).parents("tr")).data();
      //console.log(data);
      var id_customer = data["id_customer"];
      console.log(id_customer);
      $('#page_content').load(`lead_details.php?customer=${id_customer}`);

    })

  };

  setProgressBar(current);

  $(".next").click(function () {

    current_fs = $(this).parent();
    next_fs = $(this).parent().next();

    //Add Class Active
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active-form");

    //show the next fieldset
    next_fs.show();
    //hide the current fieldset with style
    current_fs.animate({ opacity: 0 }, {
      step: function (now) {
        // for making fielset appear animation
        opacity = 1 - now;

        current_fs.css({
          'display': 'none',
          'position': 'relative'
        });
        next_fs.css({ 'opacity': opacity });
      },
      duration: 500
    });
    setProgressBar(++current);
  });

  $(".previous").click(function () {

    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();

    //Remove class active
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active-form");

    //show the previous fieldset
    previous_fs.show();

    //hide the current fieldset with style
    current_fs.animate({ opacity: 0 }, {
      step: function (now) {
        // for making fielset appear animation
        opacity = 1 - now;

        current_fs.css({
          'display': 'none',
          'position': 'relative'
        });
        previous_fs.css({ 'opacity': opacity });
      },
      duration: 500
    });
    setProgressBar(--current);
  });

  function setProgressBar(curStep) {
    var percent = parseFloat(100 / steps) * curStep;
    percent = percent.toFixed();
    $(".progress-bar")
      .css("width", percent + "%")
  }

  $(".submit").click(function () {
    return false;
  })


  $("#btn_modal_leads").click(function () {
    $("#modal_leads").modal("show");

  });


  $('#btn_reload_leads').click(function(){
    console.log('reloading...')
    $('#page_content').load('leads.php');
  })
  

  listar();


})