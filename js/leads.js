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
        { "data": "score" },
        { "data": "firstname" },
        { "data": "lastname" },
        { "data": "email" },
        { "data": "dial" },
        { "data": "cellphone" },
        //{"data":"country"},
        { "data": "creation" },
        { "defaultContent": "<div class='d-flex justify-content-center'><button class='btn btn-primary edit-lean' style='margin:2px'><i class='bx bx-pencil nav_logo-icon'></i></button> <!--<button class='btn btn-success excel-lean' style='margin:2px' ><i class='bx bx-columns nav_logo-icon'></i></button> -->  <button class='btn btn-danger' style='margin:2px'><i class='bx bx-trash-alt nav_logo-icon'></i></button> </div>" }

      ]

    });

    obtain_lead_data("#leads_table tbody", table);

  }

  var obtain_lead_data = function(tbody, table){
    $(tbody).on("click", "button.edit-lean",function(){
      var data = table.row( $(this).parents("tr") ).data();
      //console.log(data);
      var id_customer = data["id_customer"];
      var programinterest = data["program_interest"];
      var id_source = data["source"];
      console.log(id_customer);
      $('#page_content').load(`lead_details.php?customer=${id_customer}&idprogram=${programinterest}&source=${id_source}`);
    })
  };

  /*Notif*/
  const notyf = new Notyf({
    types: [
      {
        type: 'success',
        duration: 10000,
        dismissible: true,
        ripple: true,
        position: {
          x: 'right',
          y: 'top',
        },
        background: 'green',
        icon: false
      },
      {
        type: 'info',
        duration: 10000,
        dismissible: true,
        ripple: true,
        position: {
          x: 'right',
          y: 'top',
        },
        background: 'blue',
        icon: false
      },
      {
        type: 'warning',
        duration: 10000,
        dismissible: true,
        ripple: true,
        position: {
          x: 'right',
          y: 'top',
        },
        background: 'orange',
        icon: false
      },
      {
        type: 'danger',
        duration: 10000,
        dismissible: true,
        ripple: true,
        position: {
          x: 'right',
          y: 'top',
        },
        background: 'red',
        icon: false
      },
    ]
  });

  /*Account Information*/
  var ufname = document.getElementById("ufname");
  var ulname = document.getElementById("ulname");
  var email = document.getElementById("email");
  var prefix = document.getElementById("prefix");
  var cellphone = document.getElementById("cellphone");

  regex_nm = /^(?![\s.]+$)[a-zA-Z\s.]{3,}.*$/;
  regex_ln = /^(?![\s.]+$)[a-zA-Z\s.]{3,}.*$/;
  regex_email = /^([a-zA-Z0-9_\.\+-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
  regex_prefix = /^\d{1,}$/;
  regex_number = /^\d{10}$/;

  /*Program Interest*/
  var programinte = document.getElementById("program_inte");

  /*Source*/
  var sources = document.getElementById("sources");

  setProgressBar(current);

  $(".next").click(function () {

    if (current==1) { //Validate Account Information
      if (ufname.value.trim() === "") {
        notyf.open({
          type: 'warning',
          message: '<b>Warning! </b> <i>Firts Name</i> is Empty, please fill it.'
        });
        return false;
      }
      if (!regex_nm.test(ufname.value)) {
        notyf.open({
          type: 'warning',
          message: '<b>Warning! </b> <i>Firts Name</i> is Empty, please fill it.'
        });
        return false;
      }
  
      if (ulname.value.trim() === "") {
        notyf.open({
          type: 'warning',
          message: '<b>Warning! </b> <i>Last Name</i> is Empty, please fill it.'
        });
        return false;
      }
      if (!regex_ln.test(ulname.value)) {
        notyf.open({
          type: 'warning',
          message: '<b>Warning! </b> <i>Last Name</i> is Empty, please fill it.'
        });
        return false;
      }
  
      if (email.value.trim() === "") {
        notyf.open({
          type: 'warning',
          message: '<b>Warning! </b> <i>E-mail</i> is Empty, please fill it.'
        });
        return false;
      }
      if (!regex_email.test(email.value)) {
        notyf.open({
          type: 'warning',
          message: '<b>Warning! </b> <i>E-mail</i> is Empty, please fill it.'
        });
        return false;
      }
  
      if (prefix.value.trim() === "") {
        notyf.open({
          type: 'warning',
          message: '<b>Warning! </b> <i>Prefix</i> is Empty, please select an option.'
        });
        return false;
      }
      if (!regex_prefix.test(prefix.value)) {
        notyf.open({
          type: 'warning',
          message: '<b>Warning! </b> <i>Prefix</i> is Empty, please select an option.'
        });
        return false;
      }
      
      if (cellphone.value.trim() === "") {
        notyf.open({
          type: 'warning',
          message: '<b>Warning! </b> <i>Cellphone</i> is Empty, please fill it.'
        });
        return false;
      }
      if (!regex_number.test(cellphone.value)) {
        notyf.open({
          type: 'warning',
          message: '<b>Warning! </b> <i>Cellphone</i> is Empty, please fill it.'
        });
        return false;
      }
    }
    if (current==2) { //Validate Program Interest
      if (programinte.value.trim() === "") {
        notyf.open({
          type: 'warning',
          message: '<b>Warning! </b> <i>Program of Interest</i> is Empty.'
        });
        return false;
      }
      if (countrie.value.trim() === "") {
        notyf.open({
          type: 'warning',
          message: '<b>Warning! </b> <i>Country of Interest</i> is Empty.'
        });
        return false;
      }
      if (startstudies.value.trim() === "") {
        notyf.open({
          type: 'warning',
          message: '<b>Warning! </b> <i>Date</i> is Empty.'
        });
        return false;
      }
      if (paidmd.value.trim() === "") {
        notyf.open({
          type: 'warning',
          message: '<b>Warning! </b> <i>Paid Mode</i> is Empty.'
        });
        return false;
      }
      if (budget.value.trim() === "") {
        notyf.open({
          type: 'warning',
          message: '<b>Warning! </b> <i>Budget Available</i> is Empty.'
        });
        return false;
      }
      if (lnlevel.value.trim() === "") {
        notyf.open({
          type: 'warning',
          message: '<b>Warning! </b> <i>Language Level</i> is Empty.'
        });
        return false;
      }
    }
    if (current==3) { //Validate Program Interest
      if (sources.value.trim() === "") {
        notyf.open({
          type: 'warning',
          message: '<b>Warning! </b> <i>Source</i> is Empty.'
        });
        return false;
      }
      if (specificsource.value.trim() === "") {
        notyf.open({
          type: 'warning',
          message: '<b>Warning! </b> <i>Specific Source</i> is Empty.'
        });
        return false;
      }
    }

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

      var contentModal = document.getElementById("fieldsetContent");
      if (current>=1) {
        contentModal.scrollIntoView({
          behavior: 'smooth'
        });
      }
  });

  $(window).scroll(function (){
      var windowHeight = $(window).scrollTop();
      var contenido2 = $("#contenido2").offset();
      contenido2 = contenido2.top;

      if (windowHeight >= contenido2) {
        $('#aviso').fadeIn(500);

      } else {
        $('#aviso').fadeOut(500);
      }
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

  
  /*Account Information*/
  ufname.addEventListener('blur',function(){
    if (!regex_nm.test(this.value)){
      notyf.open({
        type: 'warning',
        message: '<b>Warning! </b> This is not a valid <i>First Name</i> or greater than 3 digits.'
      });
      return false;
    }
  });
  ulname.addEventListener('blur',function(){
    if (!regex_ln.test(this.value)){
      notyf.open({
        type: 'warning',
        message: '<b>Warning! </b> This is not a valid <i>Last Name</i> or greater than 3 digits.'
      });
      return false;
    }
  });

  email.addEventListener('blur',function(){
    if (!regex_email.test(this.value)){
      notyf.open({
        type: 'warning',
        message: '<b>Warning! </b> This is not a valid <i>E-mail</i>.'
      });
      return false;
    }
  });
  email.addEventListener('blur',function(){
    $.ajax({
      type: "POST",
      url: '../php/ajax/verify_email.php?email='+this.value,   
      success: function(datos){
        $("#stateemail").html(datos);
      }
    });
  });

  prefix.addEventListener('blur',function(){
    if (!regex_prefix.test(this.value)){
      notyf.open({
        type: 'warning',
        message: '<b>Warning! </b> This is not a valid <i>Prefix</i>'
      });
      return false;
    }
  });

  cellphone.addEventListener('blur',function(){
    if (!regex_number.test(this.value)) {
      notyf.open({
        type: 'warning',
        message: '<b>Warning! </b> This is not a valid <i>Cellphone</i> or equal to 10 digits.'
      });
      return false;
    }
  });
  cellphone.addEventListener('blur',function(){
    $.ajax({
      type: "POST",
      url: '../php/ajax/verify_cellphone.php?cellphone='+this.value,
      success: function(datos){
        $("#statecellphone").html(datos);
      }
    });
  });
  $('#help_message').text('The Cellphone must be equal to 10 digits.');
  $('#help_message').addClass('text-dark');
	var input_phone=  document.getElementById('cellphone');
	var max = 10;
	input_phone.addEventListener('keyup',function(){
		var len = $(this).val().length;
		if (len >= max){
			this.value = this.value.slice(0,max);
			$('#help_message').text('0 remaining numbers.');
      $('#help_message').removeClass('text-dark');   
			$('#help_message').addClass('text-success');
		} else {
			var ch = max - len;
			$('#help_message').text(ch + ' remaining numbers.');
			$('#help_message').removeClass('text-success');
      $('#help_message').addClass('text-dark');
		}	
	});

  /*Program of Interest*/
  rechargeanswers_programinterest();
  $("#program_inte").on('change', function() {
      rechargeanswers_programinterest();
  });
  function rechargeanswers_programinterest() {
    var idprogram = $('#program_inte').val();
      $.ajax({
          url: '../php/ajax/answers_programinterest.php?action=ajax&idprogram='+idprogram,
          success: function(data){
              $(".answers_programinterest").html(data);
          }
      })
  };

  programinte.addEventListener('blur',function(){
    if (this.value.trim() === "") {
      notyf.open({
        type: 'warning',
        message: '<b>Warning! </b> <i>Program of Interest</i> is Empty, please select an option.'
      });
      return false;
    }
  });

  /*Source*/
  $("#sources").on('change', function() {
    rechargeanswers_source();
  });
  function rechargeanswers_source() {
    var idsource = $('#sources').val();
      $.ajax({
          url: '../php/ajax/answers_source.php?action=ajax&idsource='+idsource,
          success: function(data){
              $(".answers_source").html(data);
          }
      })
  };

  sources.addEventListener('blur',function(){
    if (this.value.trim() === "") {
      notyf.open({
        type: 'warning',
        message: '<b>Warning! </b> <i>Source</i> is Empty, please select an option.'
      });
      return false;
    }
  });

  $( "#msform" ).submit(function( event ) {
		$('#save_msform').attr("disabled", false);
	
		var parametros = $(this).serialize();
		$.ajax({
				type: "POST",
				url: "../php/actions/add_msform.php",
				data: parametros,
				beforeSend: function(objeto){
					$("#results_msform").html("Mensaje: Cargando...");
				},
				success: function(datos){
          $("#results_msform").html(datos);
          $('#save_msform').attr("disabled", false);
          load(1);
        }
		});
	event.preventDefault();
	})

  $("#btn_modal_leads").click(function () {
    $("#modal_leads").modal("show");
  });

  $('#close').click(function() {
    //location.reload();
    $('#page_content').load('leads.php');
  });
  $('#btn_reload_leads').click(function(){
    console.log('reloading...')
    $('#page_content').load('leads.php');
  })

  listar();

})