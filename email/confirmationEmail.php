<?php
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


$opc = $_REQUEST['param'];

switch ($opc) {

    case 'create_exh':
        sendExhEmail();
        break;

    case 'confirm_stand_exh';
        confirmStandExhibitor();
        break;
    /*
    case 'confirm_stand_adv':
        confirmStandAdv();
        break;
    */
    case 'create_adv';
        sendAdvEmail();
        break;
}
function confirmStandAdv(){

}


function sendAdvEmail()
{

    $kind = "validateAdv";

    $email = $_REQUEST['email'];
    $email_encrypt = base64_encode($email);
    //$name = $_POST['name'];

    try {

        $mail = new PHPMailer(true);

        $mail->Mailer = "smtp";
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = "soporte@worldferias.com";
        $mail->Password = "c3mw0rlfer1az"; //las claves no pueden tener carteres especiales
        $mail->SMTPSecure = "tls";
        $mail->Port = 587;

        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        ob_start();
        include 'emailTemplate.php';
        $string = ob_get_clean();
        //str_replace( "replaceEmail", $email, $string );

        $mail->setFrom("soporte@worldferias.com", "WorldFerias No Reply");
        //$mail->addAddress("soporte@worldferias.com");
        $mail->addAddress($email);
        $mail->addReplyTo("soporte@worldferias.com");

        //content
        $mail->isHTML(true);
        $mail->Subject = 'CONFIRMAR PARTICIPACIÓN VOCA FESTIVAL';
        $mail->Body = $string;

        if ($mail->Send()) {

            echo 'Email has been sended successfully';
        } else {
            echo 'Email has NOT been sended';
        }
    } catch (Exception $e) {
        echo 'Send Failed: ', $mail->ErrorInfo;
    }
}


function sendExhEmail()
{

    $kind = "validateExh";

    $email = $_REQUEST['email'];
    $email_encrypt = base64_encode($email);
    //$name = $_POST['name'];

    try {

        $mail = new PHPMailer(true);

        $mail->CharSet = 'UTF-8';
        $mail->Mailer = "smtp";
        //$mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = 'smtp.gmail.com';
        $mail->Username = "soporte@worldferias.com";
        $mail->Password = "c3mw0rlfer1az"; //las claves no pueden tener carteres especiales
        //$mail->SMTPSecure = "tls";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        $mail->Port = 587;
        $mail->IsHTML(true);
        //$pdf =  file_get_contents('https://development.worldferias.com/cem/email/pdf/exh.pdf');
        //$mail->AddAttachment($pdf, 'manual_expositor.pdf');
        $mail->addAttachment('pdf/exh.pdf', 'manual_expositor.pdf');
        //$mail->addAttachment('img/adviser.jpg', 'adviser.jpg');

        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );


        ob_start();
        include 'emailTemplate.php';
        $string = ob_get_clean();

        //$mail->setFrom("soporte@worldferias.com", "WorldFerias No Reply");
        $mail->From = "soporte@worldferias.com";
        $mail->FromName = "World Ferias";
        //$mail->setFrom("soporte@worldferias.com", "soporte@worldferias.com");
        $mail->addAddress($email);
        $mail->addReplyTo("soporte@worldferias.com");

        //content
//$mail->isHTML(true);
        $mail->Subject = 'INVITACIÓN PARA EXPOSITOR VOCA FESTIVAL';
        $mail->Body = $string;

        if ($mail->Send()) {

            echo 'Email has been sended successfully';
        } else {
            echo 'Email has NOT  been sended ';
        }
    } catch (Exception $e) {
        echo 'Send Failed: ', $mail->ErrorInfo;
    }
}


function confirmStandExhibitor()
{

    $kind = "confirmStandExh";
    $email = $_REQUEST['email'];
    $stand_id = $_REQUEST['id_stand'];
    $email_encrypt = base64_encode($email);
    //$name = $_POST['name'];

    try {

        $mail = new PHPMailer(true);

        $mail->Mailer = "smtp";
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = "soporte@worldferias.com";
        $mail->Password = "c3mw0rlfer1az"; //las claves no pueden tener carteres especiales
        $mail->SMTPSecure = "tls";
        $mail->Port = 587;

        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        //recipients

        ob_start();
        include 'emailTemplate.php';
        $string = ob_get_clean();
        //str_replace( "replaceEmail", $email, $string );

        $mail->setFrom("soporte@worldferias.com", "WorldFerias No Reply");
        //$mail->addAddress("soporte@worldferias.com");
        $mail->addAddress($email);
        $mail->addReplyTo("soporte@worldferias.com");

        //content
        $mail->isHTML(true);
        $mail->Subject = 'VOCA FESTIVAL';
        $mail->Body = $string;

        if ($mail->Send()) {

            echo 'Email has been sended successfully';
        } else {
            echo 'Email has NOT  been sended ';
        }
    } catch (Exception $e) {
        echo 'Send Failed: ', $mail->ErrorInfo;
    }
}


