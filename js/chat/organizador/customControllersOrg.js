


(function ($) {
    jQuery(document).ready(function () {

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "6000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          }

        var $chatFloatButton = $('#chatFloatingButton'),
            $openFloatButton = 'floating-button-open',
            $closeFloatButton = 'floating-button-close',

            $customChatBox = $('#customChatBox'),
            $openChatBox = 'floating-message-body-open',
            $closeChatBox = 'floating-message-body-close';

        $floatButtonIcon = $('#float-button-icon');
        $messageIcon = 'fa-comment';
        $closeIcon = 'fa-times';

        $chatBoxNavBar = $('#customChatboxNavBar');

        $isConnectedButton = $('#btnIsConnected');


        jQuery("#btn-send-global-msg").click(function () {

            if (document.getElementById("input-global-msg").value.length > 0) {
                console.log('SEND')
                message = document.getElementById("input-global-msg").value;
                //console.log( document.getElementById("input-global-msg").value )

                collection = firebase.firestore()
                    .collection("event1")
                    .doc("global_messages")
                    .collection("messages");

                collection.add({
                    "uid": uid,
                    "sender": name,
                    "message": message,
                    "date": (yyyy + mm + dd + new Date().getHours().toString().padStart(2, '0') + new Date().getMinutes().toString().padStart(2, '0') + new Date().getSeconds().toString().padStart(2, '0') + new Date().getMilliseconds().toString().padStart(2, '0')),
                    "time": (new Date().getHours().toString().padStart(2, '0') + ":" + new Date().getMinutes().toString().padStart(2, '0')),
                })
                    .then(res => {
                        //console.log('Message sended');
                        jQuery('#input-global-msg').val('');

                        toastr["success"]("Notificación enviada correctamente");

                    })
                    .catch(e => {
                        console.log(e)
                        toastr["error"]("Error con el envío de notificación");
                    })

            } else {
                
            }

        })



        jQuery("#chatFloatingButton").click(

            function () {

                if ($customChatBox.hasClass($closeChatBox)) {

                    $customChatBox.removeClass($closeChatBox);
                    $customChatBox.addClass($openChatBox);

                    $chatFloatButton.removeClass($openFloatButton);
                    $chatFloatButton.addClass($closeFloatButton);

                    $floatButtonIcon.removeClass($messageIcon)
                    $floatButtonIcon.addClass($closeIcon)


                } else {
                    $customChatBox.removeClass($openChatBox);
                    $customChatBox.addClass($closeChatBox);

                    $chatFloatButton.removeClass($closeFloatButton);
                    $chatFloatButton.addClass($openFloatButton);

                    $floatButtonIcon.removeClass($closeIcon)
                    $floatButtonIcon.addClass($messageIcon)
                }
            }

        );
        jQuery("#botonCerrarChat").click(

            function () {

                if ($customChatBox.hasClass($closeChatBox)) {

                    $customChatBox.removeClass($closeChatBox);
                    $customChatBox.addClass($openChatBox);

                    $chatFloatButton.removeClass($openFloatButton);
                    $chatFloatButton.addClass($closeFloatButton);

                    $floatButtonIcon.removeClass($messageIcon)
                    $floatButtonIcon.addClass($closeIcon)


                } else {
                    $customChatBox.removeClass($openChatBox);
                    $customChatBox.addClass($closeChatBox);

                    $chatFloatButton.removeClass($closeFloatButton);
                    $chatFloatButton.addClass($openFloatButton);

                    $floatButtonIcon.removeClass($closeIcon)
                    $floatButtonIcon.addClass($messageIcon)
                }
            }

        );
    });

})(jQuery);

