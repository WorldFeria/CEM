<?php 
error_reporting(E_ERROR | E_PARSE);
include("../config/config.php");



?>


<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-app.js"></script>
<!-- FIREBEASE DATABSE----------------------------->
<script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-firestore.js"></script>

<script src="../js/chat/organizador/customControllersOrg.js"></script>
<script src="../js/chat/organizador/FileSaver.min.js"></script>
<script src="../js/chat/dist/notifications.js"></script>
<script src="../js/chat/dist/toastr.min.js"></script>

<link rel="stylesheet" href="../js/chat/dist/toastr.css">
<link rel="stylesheet" href="../js/chat/dist/notifications.css">
<link href="../css/chat/chatStylesOrg.css" rel="stylesheet">


<button id="chatFloatingButton" class="floating-button floating-button-open">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-fill" viewBox="0 0 16 16">
    <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15z" />
  </svg>
</button>

<!--
<button id="globalChatFloatingButton" class="floating-button floating-button-open-global" style="bottom: 105px;" data-toggle="modal" data-target="#modal_global_msg">
  <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-globe2" viewBox="0 0 16 16">
  <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855-.143.268-.276.56-.395.872.705.157 1.472.257 2.282.287V1.077zM4.249 3.539c.142-.384.304-.744.481-1.078a6.7 6.7 0 0 1 .597-.933A7.01 7.01 0 0 0 3.051 3.05c.362.184.763.349 1.198.49zM3.509 7.5c.036-1.07.188-2.087.436-3.008a9.124 9.124 0 0 1-1.565-.667A6.964 6.964 0 0 0 1.018 7.5h2.49zm1.4-2.741a12.344 12.344 0 0 0-.4 2.741H7.5V5.091c-.91-.03-1.783-.145-2.591-.332zM8.5 5.09V7.5h2.99a12.342 12.342 0 0 0-.399-2.741c-.808.187-1.681.301-2.591.332zM4.51 8.5c.035.987.176 1.914.399 2.741A13.612 13.612 0 0 1 7.5 10.91V8.5H4.51zm3.99 0v2.409c.91.03 1.783.145 2.591.332.223-.827.364-1.754.4-2.741H8.5zm-3.282 3.696c.12.312.252.604.395.872.552 1.035 1.218 1.65 1.887 1.855V11.91c-.81.03-1.577.13-2.282.287zm.11 2.276a6.696 6.696 0 0 1-.598-.933 8.853 8.853 0 0 1-.481-1.079 8.38 8.38 0 0 0-1.198.49 7.01 7.01 0 0 0 2.276 1.522zm-1.383-2.964A13.36 13.36 0 0 1 3.508 8.5h-2.49a6.963 6.963 0 0 0 1.362 3.675c.47-.258.995-.482 1.565-.667zm6.728 2.964a7.009 7.009 0 0 0 2.275-1.521 8.376 8.376 0 0 0-1.197-.49 8.853 8.853 0 0 1-.481 1.078 6.688 6.688 0 0 1-.597.933zM8.5 11.909v3.014c.67-.204 1.335-.82 1.887-1.855.143-.268.276-.56.395-.872A12.63 12.63 0 0 0 8.5 11.91zm3.555-.401c.57.185 1.095.409 1.565.667A6.963 6.963 0 0 0 14.982 8.5h-2.49a13.36 13.36 0 0 1-.437 3.008zM14.982 7.5a6.963 6.963 0 0 0-1.362-3.675c-.47.258-.995.482-1.565.667.248.92.4 1.938.437 3.008h2.49zM11.27 2.461c.177.334.339.694.482 1.078a8.368 8.368 0 0 0 1.196-.49 7.01 7.01 0 0 0-2.275-1.52c.218.283.418.597.597.932zm-.488 1.343a7.765 7.765 0 0 0-.395-.872C9.835 1.897 9.17 1.282 8.5 1.077V4.09c.81-.03 1.577-.13 2.282-.287z"/>
</svg>
</button>-->


<div id="customChatBox" class="col-md-5 col-sm-12 floating-message-body floating-message-body-close">

  <div id="customChatboxNavBar" class="chatbox__title row" style="margin: 0px;">

    <div class="col-11" id="currentChat" style="color: white; text-align:start">

      <span class="align-middle">Chat</span>

    </div>

    <div  id="botonCerrarChat" style="cursor: pointer; right: 0;"class="col-1" style="margin: 0px; padding:0px">
		  <i class="fa fa-times" aria-hidden="true"></i>
	  </div>

  </div>

  <div class="container">

    <div class="row">

      <div class="col-6 chat-menu">

        <button id="btn_user_group" class="chat-card shadow-lg consultor-card-seen" onclick="loadMessagesGroup(uid)">

          <div class="row h-100">

            <div class="col-4 my-auto">

              <div class="d-flex justify-content-center" style="pointer-events: none;">
                <div style="color:white ;margin:3px; background-color: rgb(247, 100, 100);" class="circle-avatar ">
                  <svg style=" margin-top:5px" xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
                  </svg>
                </div>
              </div>


            </div>

            <div class="col-8 my-auto" style="padding-left: 0px; text-align:left; ">

              <div class="client-name-style">Chat grupal</div>
              <div class="client-name-style">Disponible para todo visitante</div>

            </div>

          </div>

        </button>

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

<!-- Modal -->
<div class="modal fade" id="modal_global_msg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">Envío de notificaciones globales</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div>
          <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
              <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z" />
              <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z" />
            </svg>
          </span>
          <span>Esta notificación será visualizada por todos los visitantes del tour virtual.</span>
        </div>

        <hr>

        <textarea rows="3" class="form-control" id="input-global-msg" placeholder="Escribe tu mensaje"></textarea>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button id="btn-send-global-msg" type="button" class="btn btn-primary">Enviar</button>

      </div>
    </div>
  </div>
</div>



<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->

<script>
// Your web app's Firebase configuration
var firebaseConfig = {
  apiKey: "AIzaSyCZE9mMfseTH-87SvOxpfcp3nOJy_NpTJk",
  authDomain: "worldferia-912d2.firebaseapp.com",
  projectId: "worldferia-912d2",
  storageBucket: "worldferia-912d2.appspot.com",
  messagingSenderId: "308831597284",
  appId: "1:308831597284:web:cd93b508fdabcc09cf72f1"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);



//var  = prompt("Enter your name");
var name = "<?php echo ($name); ?>";
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

function logOrganizer() {

var collection = firebase.firestore()
  .collection("event1")
  .doc("worldFeriasChats")
  .collection("individual")
  .doc(`standId:organizer`);

collection.get().then((doc) => {

  if (doc.exists) {
    //isConnected = doc.data().isConnected;
    //onlineListener();

  } else {
    //alert("No such document!");
    var colStand = firebase.firestore()
      .collection("event1")
      .doc("worldFeriasChats")
      .collection("individual")
      .doc(`organizer`);

    colStand.set({
      id: '<?php echo $id ?>',
      name: '<?php echo $name ?> <?php echo $lastname ?>',
      email: '<?php echo $email ?>',
    });

  }

}).catch((error) => {
  console.log("Error getting document:", error);
});

}
function logStand() {

<?php

$queryAdvisers = "SELECT id_stand, correo_expositor, name_stand, codigo_stand FROM stand_evento where correo_expositor != 'NULL';";

$resAdvisers = mysqli_query($con, $queryAdvisers);

while ($row = mysqli_fetch_assoc($resAdvisers)) {

  $stan_id = $row['id_stand'];
  $stan_email = $row['correo_expositor'];
  $stan_name = $row['name_stand'];
  $num_stand = $row['codigo_stand'];

?>


  var collection = firebase.firestore()
    .collection("event1")
    .doc("worldFeriasChats")
    .collection("individual")
    .doc(`standId:<?php echo $stan_id ?>`);

  collection.get().then((doc) => {

    if (doc.exists) {
      //isConnected = doc.data().isConnected;
      //onlineListener();

    } else {
      //alert("No such document!");
      var colStand = firebase.firestore()
        .collection("event1")
        .doc("worldFeriasChats")
        .collection("individual")
        .doc(`standId:<?php echo $stan_id ?>`);

      colStand.set({
        id: "<?php echo $stan_id ?>",
        standname: '<?php echo $stan_name ?>',
        email: '<?php echo $stan_email ?>',
        num_stand: '<?php echo $num_stand ?>',
      });

    }

  }).catch((error) => {
    console.log("Error getting document:", error);
  });

<?php

}

?>

}
function loadMessagesSupport(uid) {

curr_stand = 'support';
curr_customer = uid;

var collection = firebase.firestore()
  .collection("event1")
  .doc("worldFeriasChats")
  .collection("individual")
  .doc(`standId:support`)
  .collection("conversations");

collection.doc(`visitorId:${uid}`).set({
  id: `${uid}`,
  name: `${name}`,
  lastName: `${lastname}`,
  email: `${email}`,
  phone: `${phone}`,
})

collection = firebase.firestore()
  .collection("event1")
  .doc("worldFeriasChats")
  .collection("individual")
  .doc(`standId:support`)
  .collection("conversations")
  .doc(`visitorId:${uid}`)
  .collection("messages");

collection.get()
  .then((docSnapshot) => {
    if (docSnapshot.exist) {
      //alert("dice que simón");
      //getMessagesSupport('support');

    } else {

      collection.onSnapshot((doc) => {
        //collection.doc(`vistorId:${uid}`)
        collection.doc("botMessage").set({

          "email": "bot@worldferias.com",
          "sender": "Bot",
          "message": `Gracias por escribir a soporte técnico, ${name}. \n¿Cómo podemos ayudarte?`,
          "date": "0000000000",
          "time": (new Date().getHours().toString().padStart(2, '0') + ":" + new Date().getMinutes().toString().padStart(2, '0'))

        })
      });
      getMessagesSupport('support');

    }

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
//console.log(`${curr_stand}`);
//firebase.firestore().collection("messages").orderBy("date")
var collection = firebase.firestore()
  .collection("event1")
  .doc("worldFeriasChats")
  .collection("individual")
  .doc(`standId:support`)
  .collection("conversations")
  .doc(`visitorId:${uid}`)
  .collection("messages");

collection.orderBy("date")
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
          <span style="display:none;">${doc.data().date}</span>

          <span class="d-flex justify-content-start">
            <span class="message-data-label" style="color:black">${doc.data().sender}</span>
            <span class="message-data-label"> &nbsp; | ${doc.data().time}</span>
          </span>
          
          <div class="d-flex justify-content-start">
            <span class="mw-100 message-badge-left shadow-lg">${doc.data().message}</span>
          </div>
        `
      }


      contenidoProtegido.scrollTop = contenidoProtegido.scrollHeight;
      chatContainer.scrollTop = chatContainer.scrollHeight;

    })

  })

}

function sendMessage(customer, stndId) {

//getMessage  
var message = document.getElementById("message").value;
var contenidoProtegido = document.getElementById("contenidoProtegido");
var chatContainer = document.getElementById("chatContainer");

var collection;

if (message != "") {

  if (stndId != 'group_chat') {

    collection = firebase.firestore()
      .collection("event1")
      .doc("worldFeriasChats")
      .collection("individual")
      .doc(`standId:${stndId}`)
      .collection("conversations")
      .doc(`visitorId:${customer}`)
      .collection("messages");

  } else {

    collection = firebase.firestore()
      .collection("event1")
      .doc("worldFeriasChats")
      .collection("individual")
      .doc(`group_chat`)
      .collection("messages");

  }

  collection.add({
      "email": email,
      "sender": name,
      "message": message,
      "date": (yyyy + mm + dd + new Date().getHours().toString().padStart(2, '0') + new Date().getMinutes().toString().padStart(2, '0') + new Date().getSeconds().toString().padStart(2, '0') + new Date().getMilliseconds().toString().padStart(2, '0')),
      "time": (new Date().getHours().toString().padStart(2, '0') + ":" + new Date().getMinutes().toString().padStart(2, '0')),
      "isfrommod": "true",
    })
    .then(res => {
      //console.log('Message sended');
    })
    .catch(e => console.log(e))

  $('#messageForm').children('input').val('')
}
//prevent form from submiting
return false;

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

var elements = contenidoProtegido.getElementsByTagName('span');

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

//firebase.firestore().collection("messages").orderBy("date")
var collection = firebase.firestore()
  .collection("event1")
  .doc("worldFeriasChats")
  .collection("individual")
  .doc(`standId:support`)
  .collection("conversations")
  .doc(`visitorId:${cstmrId}`)
  .collection("messages");

collection.orderBy("date")
  .onSnapshot(query => {

    contenidoProtegido.innerHTML = '';

    query.forEach(doc => {

      //console.log(doc.data())

      if (doc.data().email == email) {
        contenidoProtegido.innerHTML += `
          <span style="display:none;">${doc.data().date}</span>
          <span class="message-data-label d-flex justify-content-end">${doc.data().sender} | ${doc.data().time}</span>
          <div class=" d-flex justify-content-end">
             <span class="mw-100 message-badge-right shadow-lg " >${doc.data().message}</span> 
          </div>
        `
      } else {

        contenidoProtegido.innerHTML += `
            <span style="display:none;">${doc.data().date}</span>
            <span class="message-data-label d-flex justify-content-start">${doc.data().sender} | ${doc.data().time}</span>
            <div class="d-flex justify-content-start" >
              <span class="mw-100 message-badge-left shadow-lg ">${doc.data().message}</span>
            </div>
          `
      }


      contenidoProtegido.scrollTop = contenidoProtegido.scrollHeight;
      chatContainer.scrollTop = chatContainer.scrollHeight;

    })

  })

}


function getChats(stndId, hId) {

///event1/worldFeriasChats/individual/standId:1/vistorId:1
var collection = firebase.firestore()
  .collection("event1")
  .doc("worldFeriasChats")
  .collection("individual")
  .doc(`standId:support`)
  .collection("conversations");


collection.onSnapshot(query => {


  document.getElementById('contenidoListaChats').innerHTML = ``;

  query.forEach(doc => {

    //console.log(doc.data())

    var customerId = doc.data().id;
    var customerEmail = doc.data().email;
    var customerName = doc.data().name;
    var customerLastName = doc.data().lastName;
    var customerPhone = doc.data().phone;
    var standName = doc.data().standname;
    var interestArea = doc.data().interestarea;


    document.getElementById('contenidoListaChats').innerHTML += `

      <div id="btn_stand_${stndId}_user_${customerId}" style="padding:8px; margin:0; margin-top:8px; " class="row chat-card consultor-card-seen shadow-lg">

        <button class="col-10 btn-transparent" onclick="getMessages('${customerId}', '${customerName}', '${customerLastName}', '${customerEmail}','${customerPhone}', 'support', '${interestArea}'), markAsSeen('support','${customerId}')">

          <div class="row h-100">

            <div class="col-3 my-auto" style="padding: 0px; " >

              <img src="img/avatars/img_avatar2.png" alt="Avatar" class="circle-avatar">

            </div>

            <div class="col-7 my-auto" style="padding-left: 8px; text-align:left; ">

              <div class="client-name-style">${customerName}</div>
              <div class="client-name-style">${customerEmail}</div>

            </div>

          </div>

        </button>

        <button onclick="fillCardUserInfo('${customerId}', '${customerName}', '${customerLastName}', '${customerPhone}', '${customerEmail}', '${interestArea}')" class="col-2 my-auto btn-transparent" data-toggle="modal" data-target="#customerInfoModal">

          <svg class="btn-costumer-info" data-toggle="tooltip" data-placement="top" title="Acerca de ${customerName}"  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
          </svg>

        </button>

      </div>

      `

    seenChatListener(customerId, 'support')

  })

})

}


function seenChatListener(cstmrId, c_stnd) {

var collection = firebase.firestore()
  .collection("event1")
  .doc("worldFeriasChats")
  .collection("individual")
  .doc(`standId:support`)
  .collection('conversations')
  .doc(`visitorId:${cstmrId}`);

collection.onSnapshot(query => {

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


function loadMessagesGroup(uid) {

curr_stand = 'group';
curr_customer = uid;

var collection = firebase.firestore()
  .collection("event1")
  .doc("worldFeriasChats")
  .collection("individual")
  .doc(`group_chat`)
  .collection("messages");

collection.get()
  .then((docSnapshot) => {
    if (docSnapshot.exist) {
      //alert("dice que simón");
      //getMessagesGroup('group_chat');

    } else {

      collection.onSnapshot((doc) => {
        //collection.doc(`vistorId:${uid}`)
        collection.doc("botMessage").set({

          "email": "bot@worldferias.com",
          "sender": "Bot",
          "message": `Este es el chat grupal del evento.
      Por el momento no se han envíado mensajes,
      ¿Por qué no inicias tú? 😊`,
          "date": "0000000000",
          "time": (new Date().getHours().toString().padStart(2, '0') + ":" + new Date().getMinutes().toString().padStart(2, '0'))

        })
      });

      getMessagesGroup('group_chat');

    }

  });

}


function getMessagesGroup(c_stnd) {

curr_stand = c_stnd;

var currChatLabel = document.getElementById("currentChat");
currChatLabel.innerHTML = `

<span class="align-middle">Chateando con: Chat Grupal</span>

<button id="btnDownloadChat" onclick="downloadChat()" class="  btn-downloadchat" data-toggle="tooltip" data-placement="top" title="Descargar chat con ${curr_customerName}">
<i id="float-button-icon" class="fa fa-download"></i>
</button>

`;
//console.log(`${curr_stand}`);
//firebase.firestore().collection("messages").orderBy("date")
var collection = firebase.firestore()
  .collection("event1")
  .doc("worldFeriasChats")
  .collection("individual")
  .doc(`group_chat`)
  .collection("messages");

collection.orderBy("date")
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

        if (doc.data().isfrommod == "true") {

          contenidoProtegido.innerHTML += `
              <span style="display:none;">${doc.data().date}</span>

              <span class="d-flex justify-content-start">
                <span class="message-data-label" style="color:black">${doc.data().sender}</span>
                <span class="message-data-label"> &nbsp; | ${doc.data().time}</span>
              </span>
    
              <div class="d-flex justify-content-start">
                <span class="mw-100 message-badge-left-mod shadow-lg">${doc.data().message}</span>
              </div>
              `

        } else {

          contenidoProtegido.innerHTML += `
              <span style="display:none;">${doc.data().date}</span>

              <span class="d-flex justify-content-start">
                <span class="message-data-label" style="color:black">${doc.data().sender}</span>
                <span class="message-data-label"> &nbsp; | ${doc.data().time}</span>
              </span>

              <div class="d-flex justify-content-start">
                <span class="mw-100 message-badge-left shadow-lg">${doc.data().message}</span>
              </div>
              
            `

        }

      }


      contenidoProtegido.scrollTop = contenidoProtegido.scrollHeight;
      chatContainer.scrollTop = chatContainer.scrollHeight;

    })

  })

}
logOrganizer();
</script>