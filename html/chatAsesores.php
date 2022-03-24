<?php
error_reporting(E_ERROR | E_PARSE);
include("../config/config.php");

?>

<script>
  //alert("asdasd");
  //var  = prompt("Enter your name");
  var sender = "<?php echo ($name); ?>";
  console.log( sender + "\n");

  var lastname = "<?php echo ($lastname); ?>";
  console.log( lastname + "\n");

  var uid = <?php echo ($id); ?>;
  console.log( uid + "\n");

  var email = "<?php echo ($email); ?>";
  console.log( email + "\n");

  var phone = "<?php echo ($cellphone); ?>";
  console.log( phone + "\n");

  const email_stand = "<?php echo ($_SESSION['user-adv-stand']); ?>";
  console.log( email_stand + "\n");

</script>


<link rel="stylesheet" href="dist/chat/notifications.css">
<script src="dist/chat/notifications.js"></script>


<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-app.js"></script>
<!-- FIREBEASE DATABSE----------------------------->
<script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-firestore.js"></script>

<script src="../js/chat/asesor/chat.js"></script>
<script src="../js/chat/asesor/custom_controllers.js"></script>
<script src="../js/chat/asesor/FileSaver.min.js"></script>

<link href="../css/chat/chat_stylesAdv.css" rel="stylesheet">

<link href="../js/chat/dist/toastr.css" rel="stylesheet">
<script src="../js/chat/dist/toastr.min.js"></script>




<button id="chatFloatingButton" class="floating-button floating-button-open">
  <i id="float-button-icon" class="fa fa-comment"></i>
</button>

<div id="customChatBox" class=" floating-message-body floating-message-body-close">

  <div id="customChatboxNavBar" class="chatbox__title row" style="margin: 0px;">

  <div class="col-6" id="currentChat" style="color: white; text-align:start">

<span class="align-middle">Chat</span>

</div>


<div class="col-5" style="margin: 0px; padding:0px">
Mi estado:
<button id="btnIsConnected" type="button" class="btn btn-danger">Conectado</button>
</div>

<div  id="botonCerrarChat" style="cursor: pointer; right: 0;"class="col-1" style="margin: 0px; padding:0px">
<i class="fa fa-times" aria-hidden="true"></i>
</div>

</div>

  <div class="container">
    <div class="row">


      <div class="col-6 chat-menu" style="overflow:auto; height: 560px;">

        <button id="btn_user_0" class="chat-card shadow-lg consultor-card-seen" onclick="loadMessagesSupport(uid)">

          <div class="row h-100">

            <div class="col-4 my-auto" style="padding: 0px; ">

              <img src="img/avatars/support.png" alt="Avatar" class="circle-avatar">

            </div>

            <div class="col-8 my-auto" style="padding-left: 0px; text-align:left; ">

              <div class="client-name-style">Soporte</div>
              <div class="client-name-style">info@worldferias.com</div>

            </div>

          </div>

        </button>

        <main id="contenidoListaChats">

          <div style="color: rgb(199, 199, 199); font: size 14px;"></div>

        </main>

      </div>


      <div class="col-6" style="padding: 0px;">


        <div id="chatContainer" class="chatbox__body" style="overflow:auto; height:520px;">

          <main id="contenidoProtegido">

            <div class="d-flex justify-content-start container">
              <span class="mw-100 message-badge-left shadow-lg" style="background-color:#FF7D7D;">Seleccione un chat para comenzar</span>
            </div>


          </main>

        </div>

        <form id="messageForm" onsubmit="return sendMessage(curr_customer, curr_stand);" class="input-group bg-dark" style="position:relative; height: 30px; bottom:0px">
          <input class="form-control" id="message" type="text" placeholder="Enviar mensaje" autocomplete="off">
          <!-- <input type="submit"> -->
          <div class="input-group-append">
            <button class="btn btn-primary">Enviar</button>
          </div>
        </form>

      </div>


    </div>
  </div>

</div>

<!-- Modal -->
<div class="modal fade" id="customerInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Información sobre el cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="customerInfoModalContent" class="modal-body">

        <div class="my-auto d-flex justify-content-center" style="padding: 0px; ">
          <img src="img/avatars/img_avatar2.png" style="height:150px; width:150px;" alt="Avatar" class="circle-avatar">
        </div>

        <hr>
        <span style="font-size: 20px;" id="lblFullName_info" class="my-auto d-flex justify-content-center"></span>
        <hr>
        <div style="padding: 2rem;">
          <div class="card-user-info">
            <span>Nombre(s): </span>
            <span id="lblName_info"></span>
          </div>
          <div class="card-user-info">
            <span>Apellidos(s): </span>
            <span id="lblLastName_info"></span>
          </div>
          <div class="card-user-info">
            <span>E-mail: </span>
            <span id="lblEmail_info"></span>
          </div>
          <div class="card-user-info">
            <span>Teléfono: </span>
            <span id="lblNumber_info"></span>
          </div>
          <div class="card-user-info">
            <span>Área de interés: </span>
            <span id="lblInterests_info"></span>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Entendido</button>
      </div>
    </div>
  </div>
</div>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->


<script>
  
  function getStandsDivs() {
    var contenidoListaChats = document.getElementById("contenidoListaChats");
    //console.log('<?php echo $id_expositor; ?>' + '<?php echo $id; ?>');
    //alert('<?php $id_expositor ?>')

    <?php
    $queryStands = "
   SELECT id, email, nm_commercial, num_stand
   FROM standsexpotuescuelaconvalor    
   WHERE (id_userexpo = $id_expositor);  
 ";


    $resStands = mysqli_query($con, $queryStands);

    while ($row = mysqli_fetch_assoc($resStands)) {

      $stan_id = $row['id'];
      $stan_email = $row['email'];
      $stan_name = $row['nm_commercial'];
      $num_stand = $row['num_stand'];

    ?>

      console.log('<?php echo $stan_id; ?>');
      contenidoListaChats.innerHTML += `<!-- <span style="color:black; margin-bottom:0px"><?php echo $stan_name; ?></span>
      <hr style="margin:0px"> -->
      <div id="div_chats_stand_<?php echo $stan_id; ?>">
      </div>`;

      getChats(<?php echo $stan_id; ?>);

    <?php
    }
    ?>

    contenidoListaChats.scrollTop = contenidoListaChats.scrollHeight;
  }
</script>