<?php 
error_reporting(E_ERROR | E_PARSE);
include("../config/config.php");



?>


<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-app.js"></script>
<!-- FIREBEASE DATABSE----------------------------->
<script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-firestore.js"></script>

<link rel="stylesheet" href="../js/chat/dist/notifications.css">
<link href="../css/chat_styles.css" rel="stylesheet">

<script src="../js/chat/soporte/custom_controllers.js"></script>
<script src="../js/chat/soporte/FileSaver.min.js"></script>
<script src="../js/chat/dist/notifications.js"></script>


<button id="chatFloatingButton" class="floating-button floating-button-open">
  <i id="float-button-icon" class="fa fa-comment"></i>
</button>

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


      <div class="col-md-6 col-sm-6 chat-menu" style="height:560px; overflow:auto;">

        <div>
          <button id="btn_user_0" class="chat-card shadow-lg consultor-card-seen" onclick="loadMessagesGroup(uid)">

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
        </div>

        <main id="contenidoListaChats">

        </main>

      </div>


      <div class="col-md-6 col-sm-6" style="padding: 0px;">


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
        Los mensajes chats que lleguen a la bandeja de entrada partir de este momento serán distribuidos de manera automática entre sus asesores conectados.
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
    var sender = "<?php echo ($name); ?>";
  var uid = <?php echo ($id); ?>;
  var email = "<?php echo ($email); ?>";

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
  
  //console.log('doc ready');

  var today = new Date();
  var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
  var yyyy = today.getFullYear();



  function chatsInInboxListener() {

var standCollection = firebase.firestore()
  .collection("vocafestival")
  .doc("worldFeriasChats")
  .collection("individual")
  .where('email', '==', `<?php echo $email ?>`);


standCollection.onSnapshot(query => {

  query.forEach(doc => {
    var c_standId = doc.data().id;
    var collection = firebase.firestore()
      .collection("vocafestival")
      .doc("worldFeriasChats")
      .collection("individual")
      .doc(`standId:${c_standId}`)
      .collection("conversations")
      .where('holder', '==', '0');


    collection.onSnapshot(query => {

      query.forEach(doc => {

        inboxTimeout(doc.data().id, c_standId);
      })

    })

  })

})

}


function getChats(stndId, hId) {
    console.log('getting');

    ///vocafestival/worldFeriasChats/individual/standId:1/vistorId:1
    var collection = firebase.firestore()
      .collection("vocafestival")
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

  function logExpositor() {

var collection = firebase.firestore()
  .collection("vocafestival")
  .doc("worldFeriasChats")
  .collection("individual")
  .doc(`expositor:${uid}`);

collection.get().then((doc) => {

  if (doc.exists) {
    //isConnected = doc.data().isConnected;
    //onlineListener();
  } else {
    //alert("No such document!");
    var colStand = firebase.firestore()
      .collection("vocafestival")
      .doc("worldFeriasChats")
      .collection("individual")
      .doc(`expositor:${uid}`);

    colStand.set({
      id: `${uid}`,
      expo_email: '<?php echo $email ?>',
      autochatbot: 'false'
    });

  }

}).catch((error) => {
  console.log("Error getting document:", error);
});



}

function autoChatListener() {

var collection = firebase.firestore()
  .collection("vocafestival")
  .doc("worldFeriasChats")
  .collection("individual")
  .doc(`expositor:${uid}`);

collection.onSnapshot(query => {


  if (query.data().autochatbot == "true") {
    autoChatAdministrator = true;
    $('#chatBotModal').modal('show');
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
var collection;


if (message != "") {

  if (stndId != 'group_chat') {
    //console.log(stndId);

    collection = firebase.firestore()
      .collection("vocafestival")
      .doc("worldFeriasChats")
      .collection("individual")
      .doc(`standId:${stndId}`)
      .collection("conversations")
      .doc(`visitorId:${customer}`)
      .collection("messages");

  } else {

    collection = firebase.firestore()
      .collection("vocafestival")
      .doc("worldFeriasChats")
      .collection("individual")
      .doc(`group_chat`)
      .collection("messages");

  }

  collection.add({
      "email": email,
      "sender": sender,
      "message": message,
      "date": (yyyy + mm + dd + new Date().getHours().toString().padStart(2, '0') + new Date().getMinutes().toString().padStart(2, '0') + new Date().getSeconds().toString().padStart(2, '0') + new Date().getMilliseconds().toString().padStart(2, '0')),
      "time": (new Date().getHours().toString().padStart(2, '0') + ":" + new Date().getMinutes().toString().padStart(2, '0')),
      "isfrommod": "true",
    })
    .then(res => {
      console.log('Message sended');
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
      .collection("vocafestival")
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
function logSupport() {

  var collection = firebase.firestore()
    .collection("vocafestival")
    .doc("worldFeriasChats")
    .collection("individual")
    .doc(`standId:support`);

  collection.get().then((doc) => {

    if (doc.exists) {
      //isConnected = doc.data().isConnected;
      //onlineListener();

    } else {
      //alert("No such document!");
      var colStand = firebase.firestore()
        .collection("vocafestival")
        .doc("worldFeriasChats")
        .collection("individual")
        .doc(`standId:support`);

      colStand.set({
        id: "0",
        standname: 'support',
        email: 'info@worldferias.com',
        num_stand: '0',
      });

    }

  }).catch((error) => {
    console.log("Error getting document:", error);
  });

}


function getMessagesGroup(c_stnd) {

console.log('get group');


curr_stand = c_stnd;

var currChatLabel = document.getElementById("currentChat");
currChatLabel.innerHTML = `

<span class="align-middle">Chateando con: Chat grupal</span>

<button id="btnDownloadChat" onclick="downloadChat()" class="  btn-downloadchat" data-toggle="tooltip" data-placement="top" title="Descargar chat con ${curr_customerName}">
<i id="float-button-icon" class="fa fa-download"></i>
</button>

`;
//console.log(`${curr_stand}`);
//firebase.firestore().collection("messages").orderBy("date")
var collection = firebase.firestore()
  .collection("vocafestival")
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

        if (doc.data().isfrommod == 'true') {

          contenidoProtegido.innerHTML += `
            <span style="display:none;">${doc.data().date}</span>
            
            <span class="d-flex justify-content-start">
              <span class="message-data-label" style="color:black">${doc.data().sender}</span>
              <span class="message-data-label"> &nbsp; | ${doc.data().time}</span>
            </span>

            <div class="d-flex justify-content-start" >
              <span class="mw-100 message-badge-left shadow-lg" style="background-color: #f76464;">${doc.data().message}</span>
            </div>
          `

        } else {

          contenidoProtegido.innerHTML += `
            <span style="display:none;">${doc.data().date}</span>
           
            <span class="d-flex justify-content-start">
              <span class="message-data-label" style="color:black">${doc.data().sender}</span>
              <span class="message-data-label"> &nbsp; | ${doc.data().time}</span>
            </span>

            <div class="d-flex justify-content-start" >
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


function loadMessagesGroup(uid) {

console.log('load group');

curr_stand = 'group';
curr_customer = uid;

var collection = firebase.firestore()
  .collection("vocafestival")
  .doc("worldFeriasChats")
  .collection("individual")
  .doc(`group_chat`)
  .collection("messages");
//rootCollection.doc(`standId:${stand_id}`).set({})

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


function markAsSeen(c_stndId, cstmrId) {
    //console.log(`${c_stndId}`)
    var collection = firebase.firestore()
      .collection("vocafestival")
      .doc("worldFeriasChats")
      .collection("individual")
      .doc(`standId:support`)
      .collection('conversations')
      .doc(`visitorId:${cstmrId}`)
      .update({
        seen: "true"
      });

  }
function seenChatListener(cstmrId, c_stnd) {

  var collection = firebase.firestore()
    .collection("vocafestival")
    .doc("worldFeriasChats")
    .collection("individual")
    .doc(`standId:support`)
    .collection('conversations')
    .doc(`visitorId:${cstmrId}`);

  collection.onSnapshot(query => {

    var cardMessageSeen = document.getElementById(`btn_stand_0_user_${cstmrId}`);

    if (query.data().seen == "true") {

      cardMessageSeen.classList.remove("consultor-card-not-seen")
      cardMessageSeen.classList.add("consultor-card-seen")

    } else {
      cardMessageSeen.classList.remove("consultor-card-seen")
      cardMessageSeen.classList.add("consultor-card-not-seen")
    }

  })

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
      console.log("<?php echo $stan_id ?>");


      var collection = firebase.firestore()
        .collection("vocafestival")
        .doc("worldFeriasChats")
        .collection("individual")
        .doc(`standId:<?php echo $stan_id ?>`);

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

  $adviser_id = $row['id_user'];
  $adviser_name = $row['name'];
  $adviser_lastname = $row['lastname'];

?>

standConsultorsContainer.innerHTML += `

<button id="card-adviser-<?php echo $adviser_id ?>" onclick="getStandsDivs( '<?php echo $adviser_id ?>' , '<?php echo $adviser_name ?>'  )" class="col-11  droptarget consultor-card shadow-lg card-adviser-offline" 

ondragenter="dragEnter(event)" 
ondragleave="dragLeave(event)" 
ondrop="drop(event, <?php echo $adviser_id ?>, '<?php echo $adviser_name ?>' )" 
ondragover="allowDrop(event)" >

  <div class="d-flex justify-content-center" style="pointer-events: none;">
    <img style="margin:4px"  src="img/avatars/img_avatar2.png" alt="Avatar" class="circle-avatar ">
  </div>

  <div class="d-flex justify-content-center" style="pointer-events: none;" >
    <span><?php echo $adviser_name ?> <?php echo $adviser_lastname ?></span>
  </div>

</button>

`
<?php

}

?>

  }
  logStand();
  logSupport();
  chatsInInboxListener();
  getChats('0');

  console.log('doc ready');

</script>

