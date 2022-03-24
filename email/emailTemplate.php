<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="telephone=no" name="format-detection">
    <title></title>
</head>

<body style="font-family: Helvetica ;  background-color:#EAEDED; background-repeat:repeat; background-size: auto; padding:32px;">
<!--<body style="font-family: Helvetica ; background-repeat:repeat; background-size: auto; padding:32px;">-->
    <center>


        <?php

        switch ($kind) {
            
            case 'validateExh':
                include 'validateExh.php';
                break;

            case 'validateAdv':
                include 'validateAdv.php';
                break;

            case 'confirmStandExh';
                include 'confirmStandExh.php';
                break;
        }

        ?>

        <div>
            <img src="https://cem.worldferias.com/email/img/email_footer.jpg" alt="Si considera que este correo le fue envíado por error, haga caso omiso del mismo">
        </div>


    </center>

</body>

</html>