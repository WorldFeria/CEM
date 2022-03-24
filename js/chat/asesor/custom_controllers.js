


(function ($) {
    jQuery(document).ready(function () {

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


        //alert(`${isConnected}`)


        /*jQuery.checkIfConnected = function(){
            alert(`${isConnected}`)
            if(isConnected == "true"){
                $isConnectedButton.addClass("btn-danger");
                $isConnectedButton.text("Desconectado");
            }else{

            }
        }*/


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


        jQuery("#btnIsConnected").click(
            function(){

                var collection = firebase.firestore()
                .collection("event1")
                .doc("worldFeriasChats")
                .collection("individual")
                .doc(`adviser:${uid}`);
                

                if($isConnectedButton.hasClass('btn-success')){

                    collection.update({
                        isholderonline: "false",
                    })

                }if($isConnectedButton.hasClass('btn-danger')){

                    collection.update({
                        isholderonline: "true",
                    })
                
                }
            }
        );


    });

})(jQuery);

