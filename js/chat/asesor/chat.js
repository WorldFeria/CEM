

/*var firebaseConfig = {
    apiKey: "AIzaSyCZE9mMfseTH-87SvOxpfcp3nOJy_NpTJk",
    authDomain: "worldferia-912d2.firebaseapp.com",
    projectId: "worldferia-912d2",
    storageBucket: "worldferia-912d2.appspot.com",
    messagingSenderId: "308831597284",
    appId: "1:308831597284:web:cd93b508fdabcc09cf72f1"
  };*/

  const firebaseConfig = {
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

  //var stand_id = "3"; /*------------*/
  var curr_customer = "";
  var curr_iArea = "";
  var curr_customerEmail = "";
  var curr_customerName = "";
  var curr_customerLastName = "";
  var curr_customerPhone = "";
  var onlineDocRef = "";

  var curr_stand = "";

  //var btnDownloadChat = document.getElementById("btnDownloadChat");
  //btnDownloadChat.style.display = "none";

  var today = new Date();
  var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
  var yyyy = today.getFullYear();

  var mainCollection = firebase.firestore()
    .collection("event1")
    .doc("worldFeriasChats")
    .collection("individual")
    .doc(`adviser:${uid}`)

  var standCollection = firebase.firestore()
    .collection("event1")
    .doc("worldFeriasChats")
    .collection("individual")


  //logStand();
  logAdviser();
  onlineListener();
  getStandsDivs();
  //createDummyMessage();
  //getChats();
  //getOnline();

  function logAdviser() {

    mainCollection
      .get()
      .then((doc) => {

        if (doc.exists) {
          //alert(" document!");
          //isConnected = doc.data().isConnected;
          //onlineListener();

        } else {
          //alert("No such document!");
          //console.log(uid);

          mainCollection
            .set({
              id: `${uid}`,
              adviser: `${uid}`,
              isholderonline: `false`,
              advisername: `${sender} ${lastname}`,
              //chats: 0,
            });

        }

      }).catch((error) => {
        console.log("Error getting adviser:", error);
      });

  }



  function onlineListener() {


    mainCollection.onSnapshot(query => {

      var btnIsConnected = document.getElementById("btnIsConnected");

      if (query.data().isholderonline == "true") {

        btnIsConnected.classList.remove("btn-danger")
        btnIsConnected.classList.add("btn-success")
        btnIsConnected.innerHTML = "Conectado";

      } else {
        btnIsConnected.classList.remove("btn-success")
        btnIsConnected.classList.add("btn-danger")
        btnIsConnected.innerHTML = "Desconectado";
      }

    })

  }





  function sendMessage(customer, stndId) {



    //getMessage  
    var message = document.getElementById("message").value;
    var contenidoProtegido = document.getElementById("contenidoProtegido");
    var chatContainer = document.getElementById("chatContainer");

    if (message != "") {

      //save in database
      var collection = standCollection
        .doc(`standId:${stndId}`)
        .collection("conversations")
        .doc(`visitorId:${customer}`)
        .collection("messages");

      collection.add({
          "email": email,
          "sender": sender,
          "message": message,
          "date": (yyyy + mm + dd + new Date().getHours().toString().padStart(2, '0') + new Date().getMinutes().toString().padStart(2, '0') + new Date().getSeconds().toString().padStart(2, '0') + new Date().getMilliseconds().toString().padStart(2, '0')),
          "time": (new Date().getHours().toString().padStart(2, '0') + ":" + new Date().getMinutes().toString().padStart(2, '0')),

        })
        .then(res => {
          console.log('Message sended');
        })
        .catch(e => console.log(e))

      $('#messageForm').children('input').val('')
    }
    //prevent form from submiting

    if (stndId == 'support') {
      markAsNotSeenSupport()
    }


    return false;

  }

  function markAsNotSeenSupport() {


    standCollection
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
      
    <button id="btnDownloadChat" onclick="downloadChat()" class="  btn-downloadchat" data-toggle="tooltip" data-placement="top" title="Descargar chat con ${curr_customerName}">
      <i id="float-button-icon" class="fa fa-download"></i>
    </button>
    
    `;

    standCollection
      .doc(`standId:${curr_stand}`)
      .collection("conversations")
      .doc(`visitorId:${cstmrId}`)
      .collection("messages").orderBy("date")
      .onSnapshot(query => {

        contenidoProtegido.innerHTML = '';

        query.forEach(doc => {

          //console.log(doc.data())

          if (doc.data().email == email) {
            contenidoProtegido.innerHTML += `
              <span class="msg" style="display:none;">${doc.data().date}</span>
             
              <span class="d-flex justify-content-end">
                    <span class="message-data-label"> ${doc.data().time}  |</span>
                    <span class=" msg message-data-label" style="color:black"> &nbsp; ${doc.data().sender}</span>
                </span>

              <div class=" d-flex justify-content-end">
                 <span msg class="mw-100 message-badge-right shadow-lg " >${doc.data().message}</span> 
              </div>
            `
          } else {
            contenidoProtegido.innerHTML += `
              <span class="msg" style="display:none;">${doc.data().date}</span>
             
              <span class="d-flex justify-content-start">
                <span class="message-data-label" style="color:black">${doc.data().sender}</span>
                <span class="msg message-data-label"> &nbsp; | ${doc.data().time}</span>
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

    var collection = standCollection
      .doc(`standId:support`)
      .collection("conversations");

    collection.doc(`visitorId:${uid}`).set({
      id: `${uid}`,
      name: `${name}`,
      lastName: `${lastname}`,
      email: `${email}`,
      phone: `${phone}`,
      seen: `false`,
    })

    collection = standCollection
      .doc(`standId:support`)
      .collection("conversations")
      .doc(`visitorId:${uid}`)
      .collection("messages");
    //rootCollection.doc(`standId:${stand_id}`).set({})

    collection.get()
      .then((docSnapshot) => {
        if (docSnapshot.exist) {
          //alert("dice que simón");
          getMessages(stand_id, uid);

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

    standCollection
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
          <span class="msg" style="display:none;">${doc.data().date}</span>
         
          <span class="d-flex justify-content-end">
              <span class="message-data-label"> ${doc.data().time}  |</span>
              <span class="msg message-data-label" style="color:black"> &nbsp; ${doc.data().sender}</span>
          </span>

          <div class=" d-flex justify-content-end">
             <span class="msg mw-100 message-badge-right shadow-lg " >${doc.data().message}</span> 
          </div>
        `
          } else {
            contenidoProtegido.innerHTML += `
          <span class="msg"  style="display:none;">${doc.data().date}</span>
        
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


  function getChats(stndId) {

    ///event1/worldFeriasChats/individual/standId:1/vistorId:1
    var collection = standCollection
      .doc(`standId:${stndId}`)
      .collection("conversations")
      .where('holder', '==', `${uid}`);


    collection.onSnapshot(query => {


      document.getElementById(`div_chats_stand_${stndId}`).innerHTML = ``;

      query.forEach(doc => {

        //console.log(doc.data())

        var customerId = doc.data().id;
        var customerEmail = doc.data().email;
        var customerName = doc.data().name;
        var customerLastName = doc.data().lastName;
        var customerPhone = doc.data().phone;
        var standName = doc.data().standname;
        var interestArea = doc.data().interestarea;


        document.getElementById(`div_chats_stand_${stndId}`).innerHTML += `

          <div id="btn_stand_${stndId}_user_${customerId}" style="padding:8px; margin:0; margin-top:8px; " class="row chat-card consultor-card-seen shadow-lg">

            <button class="col-10 btn-transparent" onclick="getMessages('${customerId}', '${customerName}', '${customerLastName}', '${customerEmail}','${customerPhone}', '${stndId}', '${interestArea}'), markAsSeen('${stndId}','${customerId}')">

              <div class="row h-100">

                <div class="col-3 my-auto" style="padding: 0px; " >

                  <img src="img/avatars/img_avatar2.png" alt="Avatar" class="circle-avatar">

                </div>

                <div class="col-7 my-auto" style="padding-left: 8px; text-align:left; ">

                  <div class="client-name-style">${customerName}</div>
                  <div class="client-name-style">Interés: ${interestArea}</div>

                </div>

              </div>

            </button>

            <button onclick="fillCardUserInfo('${customerId}', '${customerName}', '${customerLastName}', '${customerPhone}', '${customerEmail}', '${interestArea}')" class=" d-flex justify-content-center btn btn-warning col-2 my-auto" data-toggle="modal" data-target="#customerInfoModal">

              <svg class="btn-costumer-info " data-toggle="tooltip" data-placement="top" title="Acerca de ${customerName}"  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
              </svg>

            </button>

          </div>

          `

        seenChatListener(customerId, stndId)

      })

    })

  }

  function seenChatListener(cstmrId, c_standId) {

    //alert(c_standId, cstmrId);

    var collection = standCollection
      .doc(`standId:${c_standId}`)
      .collection('conversations')
      .doc(`visitorId:${cstmrId}`);

    collection.onSnapshot(query => {

      var cardMessageSeen = document.getElementById(`btn_stand_${c_standId}_user_${cstmrId}`);

      if (query.data().seen == "true") {

        cardMessageSeen.classList.remove("consultor-card-not-seen")
        cardMessageSeen.classList.add("consultor-card-seen")

      } else {
        cardMessageSeen.classList.remove("consultor-card-seen")
        cardMessageSeen.classList.add("consultor-card-not-seen")
      }


    })

  }


  function markAsSeen(c_stndId, cstmrId) {
    //console.log(`${c_stndId}`)
    var collection = standCollection
      .doc(`standId:${c_stndId}`)
      .collection('conversations')
      .doc(`visitorId:${cstmrId}`)
      .update({
        seen: 'true'
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