<?php
require '../../vendor/autoload.php';
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

try{
    $mail = new PHPMailer(true);

    $mail->Mailer = "smtp"; //comentar para cuando estemos en servidor
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = "soporte@worldferias.com";
    $mail->Password = "c3mw0rlfer1az";
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;

    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
    );

    $mail->setLanguage('es', '/optional/path/to/language/directory/');

    ob_start();
    include 'template/template_chngpswrd.php';
    $string = ob_get_clean();

    $mail->setFrom ("soporte@wodferias.com", "CEM WORLD FERIAS");
    $mail->addAddress($emaildb);
    $mail->addReplyTo("soporte@wodferias.com");

    //content
    $mail->isHTML(true);
    $mail->Subject = 'CEM WORLD FERIAS - Restablecer Contrasena';
    $mail->Body = $string;

}catch(Exception $e){
    echo 'Send Failed: ', $mail->ErrorInfo;
}
?>