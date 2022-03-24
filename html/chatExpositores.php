<?php 
error_reporting(E_ERROR | E_PARSE);
include("../config/config.php");



?>
<link rel="stylesheet" href="../js/chat/dist/notifications.css">
<link href="../js/chat/dist/toastr.css" rel="stylesheet">

<link href="../css/chat/chatStylesExp.css" rel="stylesheet">
<!--<link rel="stylesheet" href="../css/chat/appExp.css">-->

<script src="../js/chat/expositor/custom_controllers.js"></script>
<script src="../js/chat/expositor/FileSaver.min.js"></script>

<script src="../js/chat/dist/notifications.js"></script>
<script src="../js/chat/dist/toastr.min.js"></script>


<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.4.1/firebase-analytics.js"></script>
<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->


<button id="chatFloatingButton" class="floating-button floating-button-open">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-fill" viewBox="0 0 16 16">
    <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15z" />
  </svg>
</button>


<div id="customChatBox" class="floating-message-body floating-message-body-close">

  <div id="customChatboxNavBar" class="chatbox__title row" style="margin: 0px;">

    <div class="col-4" id="currentChat" style="color: white; text-align:start">

      <span class="align-middle">Chat</span>

    </div>


    <div class="col-7" style="margin: 0px; padding:0px">
      Auto-gestión de chats:
      <button id="btnMessageBot" data-target="#chatBotModal" type="button" class="btn btn-danger">Desactivado</button>
    </div>
    <div  id="botonCerrarChat" style="cursor: pointer; right: 0;"class="col-1" style="margin: 0px; padding:0px">
		  <i class="fa fa-times" aria-hidden="true"></i>
	  </div>

  </div>

  <div class="container">
    <div class="row">

      <main id="standConsultorsContainer" class="col-3 " style="overflow:auto; height:550px; padding: 0px;">


      </main>



      <div class="col-4 chat-menu" style="height:560px; overflow:auto;">

        <button id="btn_user_0" class="chat-card consultor-card-seen shadow-lg" onclick="loadMessagesSupport(uid)">

          <div class="row h-100">

            <div class="col-4 my-auto" style="padding: 0px; ">

              <img style="pointer-events: none;" src="img/avatars/support.png" alt="Avatar" class="circle-avatar">

            </div>

            <div class="col-8 my-auto" style="padding-left: 0px; text-align:left; ">

              <div class="client-name-style">Soporte</div>
              <!-- <div class="client-name-style">support@worldferias.com</div> -->

            </div>

          </div>

        </button>

        <div class="" style="color: rgb(192, 192, 192);">
          <h4 id="lblInbox">BANDEJA DE ENTRADA</h4>
        </div>


        <main id="contenidoListaChats">

          <div style="color: rgb(199, 199, 199); font: size 14px;"></div>

        </main>

      </div>


      <div class="col-5" style="padding: 0px;">


        <div id="chatContainer" class="chatbox__body" style="overflow:auto; height:530px;">

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
<div class="modal fade" id="chatBotModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Importante! El autochat está activado.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Los mensajes que lleguen a la bandeja de entrada a partir de este momento serán distribuidos de manera automática entre sus asesores disponibles.
        Todos los chats que ya se encontraran en la bandeja anteriormente tendrán que ser administrados de manera manual.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Entendido</button>
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
          <img src="img/avatars/avatar_user.png" style="height:150px; width:150px;" alt="Avatar" class="circle-avatar">
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




<script>
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyCZE9mMfseTH-87SvOxpfcp3nOJy_NpTJk",
    authDomain: "worldferia-912d2.firebaseapp.com",
    databaseURL: "https://worldferia-912d2-default-rtdb.firebaseio.com",
    projectId: "worldferia-912d2",
    storageBucket: "worldferia-912d2.appspot.com",
    messagingSenderId: "308831597284",
    appId: "1:308831597284:web:cd93b508fdabcc09cf72f1",
    measurementId: "G-66S2VJMR7T"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
</script>

<script>
  //var  = prompt("Enter your name");
  var sender = "<?php echo ($name); ?>";
  var uid = <?php echo ($id); ?>;
  var email = "<?php echo ($email); ?>";
  var lastname = "<?php echo ($lastname); ?>";
  var phone = "<?php echo ($cellphone); ?>";




  var stand_id = "1"; /*------------*/
  var curr_customer = "";
  var curr_customerEmail = "";
  var curr_customerName = "";
  var curr_customerLastName = "";
  var curr_customerPhone = "";
  var dragged_customer = "-1";
  var curr_holder = "";
  var curr_holderId = "";
  var advisersOnline = [];
  var inboxChats = [];
  var autoChatAdministrator = false;
  var curr_stand = "";
  var curr_iArea = "";
  //var contenidoListaChats = document.getElementById("contenidoListaChats");
  var btnIsChatBotActivated = document.getElementById("btnMessageBot");


  //var btnDownloadChat = document.getElementById("btnDownloadChat");
  //btnDownloadChat.style.display = "none";

  var today = new Date();
  var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
  var yyyy = today.getFullYear();

  var mainCollection = firebase.firestore()
    .collection("vocafestival")
    .doc("worldFeriasChats")
    .collection("individual")

  var expCollection = firebase.firestore()
    .collection("vocafestival")
    .doc("worldFeriasChats")
    .collection("individual")
    .doc(`expositor:${uid}`)

  logExpositor();
  //logStand();
  logAdvisersNueva();
  //createDummyMessage();
  getStandConsultors();
  chatsInInboxListener();
  autoChatListener();
  getStandsDivs('0', 'Inbox');

  //getChats('0', 'inbox');
  //checkIfOnline();
  console.log('doc ready');


  function logExpositor() {

    expCollection.get().then((doc) => {

      if (doc.exists) {
        //isConnected = doc.data().isConnected;
        //onlineListener();
      } else {
        //alert("No such document!");
        colStand = mainCollection
          .doc(`expositor:${uid}`)
          .set({
            id: `${uid}`,
            expo_email: '<?php echo $email ?>',
            autochatbot: 'false'
          });

      }

    }).catch((error) => {
      console.log("Error getting document:", error);
    });



  }

  function logStand() {
    alert("logStand");
    <?php

    $queryAdvisers ="SELECT id_stand, correo_expositor, name_stand, codigo_stand FROM stand_evento where correo_expositor != 'NULL';";

    $resAdvisers = mysqli_query($con, $queryAdvisers);

    while ($row = mysqli_fetch_assoc($resAdvisers)) {

      $stan_id = $row['id_stand'];
      $stan_email = $row['correo_expositor'];
      $stan_name = $row['name_stand'];
      $num_stand = $row['codigo_stand'];

    ?>
    alert(<?php echo $stan_id ?>);


      mainCollection
        .doc(`standId:<?php echo $stan_id ?>`)
        .collection("conversations")
        .doc(`visitorId:${uid}`)
        .get().then((doc) => {
          alert("minimo");

          if (doc.exists) {
            //isConnected = doc.data().isConnected;
            //onlineListener();
            alert("if");

          } else {
            alert("No such document!");
            mainCollection
              .doc(`standId:<?php echo $stan_id ?>`)
              .collection("conversations")
              .doc(`visitorId:${uid}`)
              .set({
                id: "<?php echo $stan_id ?>",
                standname: '<?php echo $stan_name ?>',
                email: '<?php echo $stan_email ?>',
                num_stand: '<?php echo $num_stand ?>',
              });

          }

        }).catch((error) => {
    alert("error");
          console.log("Error getting document:", error);
        });

    <?php

    }

    ?>

  }



  function autoChatListener() {

    expCollection.onSnapshot(query => {


      if (query.data().autochatbot == "true") {
        autoChatAdministrator = true;
        $('#chatBotModal').modal();
        btnIsChatBotActivated.classList.remove("btn-danger")
        btnIsChatBotActivated.classList.add("btn-success")
        btnIsChatBotActivated.innerHTML = "Activado";

      } else {
        autoChatAdministrator = false;
        btnIsChatBotActivated.classList.remove("btn-success")
        btnIsChatBotActivated.classList.add("btn-danger")
        btnIsChatBotActivated.innerHTML = "Desactivado";
      }

    })

  }



  function sendMessage(customer, stndId) {

    //console.log(stndId);

    //getMessage  
    var message = document.getElementById("message").value;
    var contenidoProtegido = document.getElementById("contenidoProtegido");
    var chatContainer = document.getElementById("chatContainer");

    if (message != "") {

      //save in database
      mainCollection
        .doc(`standId:${stndId}`)
        .collection("conversations")
        .doc(`visitorId:${customer}`)
        .collection("messages")
        .add({
          "email": email,
          "sender": sender,
          "message": message,
          "date": (yyyy + mm + dd + new Date().getHours().toString().padStart(2, '0') + new Date().getMinutes().toString().padStart(2, '0') + new Date().getSeconds().toString().padStart(2, '0') + new Date().getMilliseconds().toString().padStart(2, '0')),
          "time": (new Date().getHours().toString().padStart(2, '0') + ":" + new Date().getMinutes().toString().padStart(2, '0'))
        })
        .then(res => {
          console.log('Message sended');
        })
        .catch(e => console.log(e))

      $('#messageForm').children('input').val('')
    }

    if (stndId == 'support') {
      markAsNotSeenSupport()
    }
    //prevent form from submiting
    return false;

  }

  function markAsNotSeenSupport() {


  mainCollection
      .doc(`standId:support`)
      .collection('conversations')
      .doc(`visitorId:${uid}`)
      .update({
        seen: 'false'
      });

  }

  function downloadChat() {

    var fileName = `chat_${curr_customerLastName}_${dd}${mm}${yyyy}`;
    var text = `Fecha de descarga: ${dd}/${mm}/${yyyy} \n`;
    text += `Recibido por: ${sender} \n`;
    text += `Email del recibidor: ${email} \n`;
    text += `Nombre de contacto: ${curr_customerName} ${curr_customerLastName} \n`;
    text += `Email de contacto: ${curr_customerEmail} \n`;
    text += `Telefono de contacto: ${curr_customerPhone} \n`;
    text += `Área de interés: ${curr_iArea} \n`;
    text += `\n`;

    var elements = contenidoProtegido.getElementsByClassName('msg');

    for (var i = 0; i < elements.length; i = i + 3) {
      text += `Date: ${elements[i].innerHTML.substring(6,8)}/${elements[i].innerHTML.substring(4,6)}/${elements[i].innerHTML.substring(0,4)} \n`;
      text += `Sender: ${elements[i+1].innerHTML} \n`;
      text += `Message: ${elements[i+2].innerHTML} \n`;
      text += `\n`;
    }

    var blob = new Blob([text], {
      type: "text/plain; charset=utf-8"
    });

    saveAs(blob, fileName);

  }


  function getMessages(cstmrId, cstmrName, cstmrLastName, csrmEmail, csrmPhone, c_stnd, c_ia) {
    curr_stand = c_stnd;
    curr_customer = cstmrId;
    curr_customerName = cstmrName;
    curr_customerLastName = cstmrLastName;
    curr_customerEmail = csrmEmail;
    curr_customerPhone = csrmPhone;
    curr_iArea = c_ia;

    var currChatLabel = document.getElementById("currentChat");
    currChatLabel.innerHTML = `

    <span class="align-middle">Chateando con: ${curr_customerName} ${curr_customerLastName}</span>
      
    <button id="btnDownloadChat" onclick="downloadChat()" class="btn-downloadchat" data-toggle="tooltip" data-placement="top" title="Descargar chat con ${curr_customerName}">
      <i id="float-button-icon" class="fa fa-download"></i>
    </button>
    
    `;


    mainCollection
      .doc(`standId:${c_stnd}`)
      .collection("conversations")
      .doc(`visitorId:${cstmrId}`)
      .collection("messages")
      .orderBy("date")
      .onSnapshot(query => {

        contenidoProtegido.innerHTML = '';

        query.forEach(doc => {

          //console.log(doc.data())

          if (doc.data().email == email) {
            contenidoProtegido.innerHTML += `
              <span class="msg" style="display:none;">${doc.data().date}</span>
              
              <span class="d-flex justify-content-end">
                  <span class="msg message-data-label"> ${doc.data().time}  |</span>
                  <span class="message-data-label" style="color:black"> &nbsp; ${doc.data().sender}</span>
              </span>

              <div class=" d-flex justify-content-end">
                 <span class=" msg mw-100 message-badge-right shadow-lg " >${doc.data().message}</span> 
              </div>
            `
          } else {
            contenidoProtegido.innerHTML += `
              <span class="msg"  style="display:none;">${doc.data().date}</span>
              
              <span class="d-flex justify-content-start">
                <span class=msg "message-data-label" style="color:black">${doc.data().sender}</span>
                <span class="message-data-label"> &nbsp; | ${doc.data().time}</span>
              </span>

              <div class="d-flex justify-content-start">
                <span class="msg mw-100 message-badge-left shadow-lg">${doc.data().message}</span>
              </div>
            `
          }


          contenidoProtegido.scrollTop = contenidoProtegido.scrollHeight;
          chatContainer.scrollTop = chatContainer.scrollHeight;

        })

      })

  }


  function loadMessagesSupport(uid) {

    curr_stand = 'support';
    curr_customer = uid;

    mainCollection
      .doc(`standId:support`)
      .collection("conversations")
      .doc(`visitorId:${uid}`)
      .get().then((mdoc) => {
        if (mdoc.exist) {

        } else {

          mainCollection
            .doc(`standId:support`)
            .collection("conversations")
            .doc(`visitorId:${uid}`).set({
              id: `${uid}`,
              name: `${sender}`,
              lastName: `${lastname}`,
              email: `${email}`,
              phone: `${phone}`,
            })

        }
      })



    mainCollection
      .doc(`standId:support`)
      .collection("conversations")
      .doc(`visitorId:${uid}`)
      .get()
      .then((docSnapshot) => {
        if (docSnapshot.exist) {
          //alert("dice que simón")

        } else {

          mainCollection
            .doc(`standId:support`)
            .collection("conversations")
            .doc(`visitorId:${uid}`).onSnapshot((doc) => {
              //collection.doc(`vistorId:${uid}`)
              mainCollection
                .doc(`standId:support`)
                .collection("conversations")
                .doc(`visitorId:${uid}`).collection('messages').doc("botMessage").set({

                  "email": "bot@worldferias.com",
                  "sender": "Bot",
                  "message": `Gracias por escribir a soporte técnico, ${name}. \n¿Cómo podemos ayudarte?`,
                  "date": "0000000000",
                  "time": (new Date().getHours().toString().padStart(2, '0') + ":" + new Date().getMinutes().toString().padStart(2, '0'))

                })
            });


        }

        getMessagesSupport('support');

      });

  }



  function getMessagesSupport(c_stnd) {

    curr_stand = c_stnd;

    var currChatLabel = document.getElementById("currentChat");
    currChatLabel.innerHTML = `

  <span class="align-middle">Chateando con: Soporte WF</span>
    
  <button id="btnDownloadChat" onclick="downloadChat()" class="  btn-downloadchat" data-toggle="tooltip" data-placement="top" title="Descargar chat con ${curr_customerName}">
    <i id="float-button-icon" class="fa fa-download"></i>
  </button>

  `;

    mainCollection
      .doc(`standId:support`)
      .collection("conversations")
      .doc(`visitorId:${uid}`)
      .collection("messages")
      .orderBy("date")
      .onSnapshot(query => {

        contenidoProtegido.innerHTML = '';

        query.forEach(doc => {

          //console.log(doc.data())

          if (doc.data().email == email) {
            contenidoProtegido.innerHTML += `
                <span style="display:none;">${doc.data().date}</span>
              
                <span class="d-flex justify-content-end">
                    <span class="message-data-label"> ${doc.data().time}  |</span>
                    <span class="message-data-label" style="color:black"> &nbsp; ${doc.data().sender}</span>
                </span>

                <div class=" d-flex justify-content-end">
                  <span class="mw-100 message-badge-right shadow-lg " >${doc.data().message}</span> 
                </div>
              `
          } else {
            contenidoProtegido.innerHTML += `
              <span class="msg" style="display:none;">${doc.data().date}</span>
            
              <span class="d-flex justify-content-start">
                <span class="msg message-data-label" style="color:black">${doc.data().sender}</span>
                <span class="message-data-label"> &nbsp; | ${doc.data().time}</span>
              </span>

              <div class="d-flex justify-content-start">
                <span class="msg mw-100 message-badge-left shadow-lg">${doc.data().message}</span>
              </div>
            `
          }


          contenidoProtegido.scrollTop = contenidoProtegido.scrollHeight;
          chatContainer.scrollTop = chatContainer.scrollHeight;

        })

      })

  }



  function getStandsDivs(hId, holder) {
    //alert("<?php echo $id ?>")

    var contenidoListaChats = document.getElementById("contenidoListaChats");
    contenidoListaChats.innerHTML = '';

    <?php
    $queryStands = "SELECT id_stand, correo_expositor, name_stand, codigo_stand FROM stand_evento where correo_expositor != 'NULL';"; 
    
    $resStands = mysqli_query($con, $queryStands);

    while ($row = mysqli_fetch_assoc($resStands)) {

      $stan_id = $row['id_stand'];
      $stan_email = $row['correo_expositor'];
      $stan_name = $row['name_stand'];
      $num_stand = $row['codigo_stand'];

    ?>

      console.log('<?php echo $stan_name; ?>');
      contenidoListaChats.innerHTML += `<!-- <span style="color:black; margin-bottom:0px"><?php echo $stan_name; ?></span>
      <hr style="margin:0px"> -->
      <div id="div_chats_stand_<?php echo $stan_id; ?>"></div>`;

      getChats(hId, holder, <?php echo $stan_id; ?>);

    <?php

    }

    ?>
  }




  function getChats(hId, holder, stndId) {
    //alert(hId, stndId)


    mainCollection
      .doc(`standId:${stndId}`)
      .collection('conversations')
      .where('holder', '==', `${hId}`)
      .onSnapshot(query => {

        var lblHolder = document.getElementById("lblInbox");
        lblHolder.innerHTML = `${holder}`;


        var standChats = document.getElementById(`div_chats_stand_${stndId}`);
        standChats.innerHTML = ``;

        query.forEach(doc => {


          var customerId = doc.data().id;
          var customerEmail = doc.data().email;
          var customerName = doc.data().name;
          var customerLastName = doc.data().lastName;
          var customerPhone = doc.data().phone;
          var interestArea = doc.data().interestarea;
          var standName = doc.data().standname;

          standChats.innerHTML += `

          <div id="btn_stand_${stndId}_user_${customerId}" style="padding:8px; margin:0; margin-top:8px; " class="row chat-card consultor-card-seen shadow-lg draggable"
          ondragstart="dragStart(event, '${customerId}', '${stndId}')" 
            draggable="true" >

            <button class="col-10 btn-transparent" onclick="getMessages('${customerId}', '${customerName}', '${customerLastName}', '${customerEmail}','${customerPhone}', '${stndId}', '${interestArea}')">

              <div class="row h-100">

                <div class="col-3 my-auto" style="padding: 0px; " >

                  <img src="img/avatars/avatar_user.png" alt="Avatar" class="circle-avatar">

                </div>

                <div class="col-7 my-auto" style="padding-left: 8px; text-align:left; ">

                  <div class="client-name-style">${customerName}</div>
                  <div class="client-name-style">Interés: ${interestArea}</div>

                </div>

              </div>

            </button>

            <button onclick="fillCardUserInfo('${customerId}', '${customerName}', '${customerLastName}', '${customerPhone}', '${customerEmail}', '${interestArea}')" class=" d-flex justify-content-center col-2 my-auto btn btn-warning" data-toggle="modal" data-target="#customerInfoModal">

              <svg class="btn-costumer-info " data-toggle="tooltip" data-placement="top" title="Acerca de ${customerName}"  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
              </svg>

            </button>

          </div>

          `

          seenChatListener(customerId, stndId)
        })

      });

  }


  function seenChatListener(cstmrId, c_stnd) {

    mainCollection
      .doc(`standId:${c_stnd}`)
      .collection('conversations')
      .doc(`visitorId:${cstmrId}`)
      .onSnapshot(query => {

        var cardMessageSeen = document.getElementById(`btn_stand_${c_stnd}_user_${cstmrId}`);

        if (query.data().seen == "true") {

          cardMessageSeen.classList.remove("consultor-card-not-seen")
          cardMessageSeen.classList.add("consultor-card-seen")

        } else {
          cardMessageSeen.classList.remove("consultor-card-seen")
          cardMessageSeen.classList.add("consultor-card-not-seen")
        }

      })

  }




  function getStandConsultors() {
    var standConsultorsContainer = document.getElementById('standConsultorsContainer');


    standConsultorsContainer.innerHTML += `

      <button id="card-adviser-0" onclick="getStandsDivs( '0' , 'Inbox'  )" class="col-11  droptarget consultor-card shadow-lg card-adviser-online" 

      ondragenter="dragEnter(event)" 
      ondragleave="dragLeave(event)" 
      ondrop="drop(event, '0', 'Inbox' )" 
      ondragover="allowDrop(event)" >

        <div class="d-flex justify-content-center" style="pointer-events: none;">
        <div style="color:white ;margin:3px; background-color: rgb(247, 100, 100);" class="circle-avatar my-auto">
              <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="" viewBox="0 0 16 16">
                <path d="M4.98 4a.5.5 0 0 0-.39.188L1.54 8H6a.5.5 0 0 1 .5.5 1.5 1.5 0 1 0 3 0A.5.5 0 0 1 10 8h4.46l-3.05-3.812A.5.5 0 0 0 11.02 4H4.98zm-1.17-.437A1.5 1.5 0 0 1 4.98 3h6.04a1.5 1.5 0 0 1 1.17.563l3.7 4.625a.5.5 0 0 1 .106.374l-.39 3.124A1.5 1.5 0 0 1 14.117 13H1.883a1.5 1.5 0 0 1-1.489-1.314l-.39-3.124a.5.5 0 0 1 .106-.374l3.7-4.625z" />
              </svg>
            </div>
        </div>

        <div class="d-flex justify-content-center" style="pointer-events: none;" >
          <span> Entrantes </span>
        </div>

      </button>

      `

    <?php

    $queryAdvisers = "SELECT first_name, last_name, id_user FROM user    WHERE (id_rol2 = 4);";

    $resAdvisers = mysqli_query($con, $queryAdvisers);

    while ($row = mysqli_fetch_assoc($resAdvisers)) {

      $adviser_id = $row['first_name'];
      $adviser_name = $row['last_name'];
      $adviser_lastname = $row['id_user'];

    ?>

      standConsultorsContainer.innerHTML += `

      <button id="card-adviser-<?php echo $adviser_id ?>" onclick="getStandsDivs( '<?php echo $adviser_id ?>' , '<?php echo $adviser_name ?>'  )" class="col-11  droptarget consultor-card shadow-lg card-adviser-offline" 

      ondragenter="dragEnter(event)" 
      ondragleave="dragLeave(event)" 
      ondrop="drop(event, <?php echo $adviser_id ?>, '<?php echo $adviser_name ?>' )" 
      ondragover="allowDrop(event)" >

        <div class="d-flex justify-content-center" style="pointer-events: none;">
          <img style="margin:4px"  src="img/avatars/avatar_asesor.png" alt="Avatar" class="circle-avatar ">
        </div>

        <div class="d-flex justify-content-center" style="pointer-events: none;" >
          <span><?php echo $adviser_name ?> <?php echo $adviser_lastname ?></span>
        </div>

      </button>

      `
      adviserOnlineListener(<?php echo $adviser_id ?>);

    <?php

    }

    ?>

  }


  function adviserOnlineListener(adviserId) {
    //alert(adviserId);

    mainCollection
      .doc(`adviser:${adviserId}`)
      .onSnapshot(query => {
        //alert(query.data().isholderonline);

        var cardIsConnected = document.getElementById(`card-adviser-${adviserId}`);


        if (query.data().isholderonline == "true") {

          cardIsConnected.classList.remove("card-adviser-offline")
          cardIsConnected.classList.add("card-adviser-online")
          advisersOnline.push(adviserId);

        } else {
          cardIsConnected.classList.remove("card-adviser-online")
          cardIsConnected.classList.add("card-adviser-offline")

          if (advisersOnline.includes(adviserId)) {
            var index = advisersOnline.indexOf(adviserId);

            if (index > -1) {
              advisersOnline.splice(index, 1);
            }
          }

        }


      })

  }

  function logAdvisersNueva(){
  <?php

  $queryAdvisers = "SELECT first_name, last_name, id_user FROM user  WHERE (id_rol2 = 4);";

  $resAdvisers = mysqli_query($con, $queryAdvisers);

  while ($row = mysqli_fetch_array($resAdvisers)) {

    $adviser_id = $row['id_user']; 
    $adviser_name = $row['last_name'];
    $adviser_lastname = $row['first_name'];

  ?>
    var collection = firebase.firestore()
    .collection("vocafestival")
    .doc("worldFeriasChats")
    .collection("individual")
    .doc(`adviser:<?php echo $adviser_id ?>`);

    collection.get().then((doc) => {


      if (doc.exists) {
          //alert("yes");
          //isConnected = doc.data().isConnected;
          //onlineListener();

        } else {
          //alert("No such document!");

          var colStand = firebase.firestore()
            .collection("vocafestival")
            .doc("worldFeriasChats")
            .collection("individual")
            .doc(`adviser:<?php echo $adviser_id ?>`);

          colStand.set({

            adviser:"<?php echo $adviser_id ?>" ,
            advisername:"<?php echo $adviser_name.' '.$adviser_lastname ?>" ,
            id:"<?php echo $adviser_id ?>" ,
            isholderonline:"false" ,


          });

        }

}).catch((error) => {
  console.log("Error loggin adviser:", error);
});

<?php

}

?>

}

  function logAdvisers() {
    //var curr_adviser;
    <?php

    $queryAdvisers = "SELECT first_name, last_name, id_user FROM user  WHERE (id_rol2 = 4);";

    $resAdvisers = mysqli_query($con, $queryAdvisers);

    while ($row = mysqli_fetch_array($resAdvisers)) {

      $adviser_id = $row['first_name'];
      $adviser_name = $row['last_name'];
      $adviser_lastname = $row['id_user'];

    ?>
    alert("entrando");

      mainCollection
        .where('adviser', '==', '<?php echo $adviser_id ?>')
        .get()
        .then((doc) => {
          alert("123");

          if (doc.exists) {
            alert(`Succes!`);

          } else {
            alert(`:C !`);
            mainCollection
              .doc(`adviser:${curr_adviser}`)
              .set({
                id: `${curr_adviser}`,
                adviser: '<?php echo $adviser_id ?>',
                email: `${email}`,
                isConnected: "false"
              });

          }

        }).catch((error) => {
          console.log("Error loggin adviser:", error);
        });

    <?php

    }

    ?>

  }



  function dragStart(event, ctmrId, c_sntd) {

    dragged_customer = ctmrId;
    curr_stand = c_sntd;
    console.log(`${dragged_customer}`);
    event.dataTransfer.setData("Text", event.target.id);
    //console.log('dragging');
  }

  function allowDrop(event) {
    event.preventDefault();
    event.dataTransfer.setData("Text", event.target.id);

  }


  function drop(event, hId, holder) {

    //console.log('droped');
    event.preventDefault();

    collection = mainCollection
      .doc(`standId:${curr_stand}`)
      .collection('conversations')
      .doc(`visitorId:${dragged_customer}`);


    var data = event.dataTransfer.getData("Text");

    event.target.appendChild(document.getElementById(data));
    event.target.removeChild(document.getElementById(data));

    event.target.style.border = "";

    collection.update({
      holder: `${hId}`,
    })


    collectionAdviser = mainCollection
      .doc(`adviser:${hId}`);

    collectionAdviser.get().then(doc => {

      if (doc.exists) {

        var numberChats = doc.chats;

        collection.update({
          chats: numberChats + 1,
        })

      } else {
        //alert("No such document!");

      }

    }).catch((error) => {
      console.log("Error getting document:", error);
    });

    //getChats(hId, holder);
    //getChats('0', 'Inbox');

    const myNotification = window.createNotification({
      // options here
      displayCloseButton: true,
    });

    myNotification({
      title: 'Exito!',
      message: `Chat asignado a ${holder} correctamente.`
    });

    eventFire(document.getElementById(`card-adviser-${hId}`), 'click');
    //getChats(hId, holder);

  }

  function dragEnter(event) {

    if (event.target.classList.contains('droptarget')) {
      //console.log('entered');
      event.target.style.border = "3px solid #FFE83C";
    }
  }

  function dragLeave(event) {

    if (event.target.classList.contains('droptarget')) {
      //console.log('leave');
      event.target.style.border = "";

    }
  }



  function chatsInInboxListener() {

    var standCollection = mainCollection
      .where('email', '==', `<?php echo $email ?>`);


    standCollection.onSnapshot(query => {

      query.forEach(doc => {
        var c_standId = doc.data().id;

        mainCollection
          .doc(`standId:${c_standId}`)
          .collection("conversations")
          .where('holder', '==', '0')
          .onSnapshot(query => {

            query.forEach(doc => {

              inboxTimeout(doc.data().id, c_standId);

            })

          })

      })

    })

  }


  function inboxTimeout(ctmrId, c_standId) {

    setTimeout(

      function() {
        if (autoChatAdministrator == true) {

          if (advisersOnline.length > 0) {

            var randHolder = random_item(advisersOnline);

            mainCollection
              .doc(`standId:${c_standId}`)
              .collection('conversations')
              .doc(`visitorId:${ctmrId}`)
              .update({
                holder: `${randHolder}`,
              })

          } else {

            const myNotification = window.createNotification({
              // options here
              displayCloseButton: true,
              theme: 'error',
              showDuration: 3500,
            });

            myNotification({
              title: 'Advertencia!',
              message: `No hay asesores disponibles para asignar este chat \n
              Se le tendrá que asignar de manera manual.`
            });

          }

        }
      },

      2000

    );
  }

  function random_item(items) {
    return items[Math.floor(Math.random() * items.length)];
  }




  function eventFire(el, etype) {
    if (el.fireEvent) {
      el.fireEvent('on' + etype);
    } else {
      var evObj = document.createEvent('Events');
      evObj.initEvent(etype, true, false);
      el.dispatchEvent(evObj);
    }
  }

  function fillCardUserInfo(cId, cN, cLN, cP, cE, aI) {

    var userInfoFullName = document.getElementById('lblFullName_info');
    var userInfoName = document.getElementById('lblName_info');
    var userInfoLastName = document.getElementById('lblLastName_info');
    var userInfoEmail = document.getElementById('lblEmail_info');
    var userInfoNumber = document.getElementById('lblNumber_info');
    var userInfoInterest = document.getElementById('lblInterests_info');

    userInfoFullName.innerHTML = `${cN + ' ' + cLN}`;
    userInfoName.innerHTML = `${cN}`;
    userInfoLastName.innerHTML = `${cLN}`;
    userInfoEmail.innerHTML = `${cE}`;
    userInfoNumber.innerHTML = `${cP}`;
    userInfoInterest.innerHTML = `${aI}`;

  }
</script>