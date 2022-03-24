


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

    });

})(jQuery);

