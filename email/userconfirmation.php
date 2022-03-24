<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="../assets/img/icons/icon_wf.ico">
    <title>Validación Usuario | CEM</title>

    <link href="https://fonts.googleapis.com" rel="preconnect">
	<link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login/login.css">
</head>

<body class="index">
    <main class="d-flex align-items-center justify-content-center min-vh-100 py-3 py-md-0">
        <div class="col-sm-12 col-md-8 col-lg-6 col-lg-5">
            <div class="container">
                <div class="card login-card">
                    <div class="card-body userconfimation">
                        <div class="brand-wrapper">
                            <img src="../assets/img/logos/email/logo-cem.png" alt="Custom Event Management" title="Custom Event Management" class="logo">
                        </div>
                        <?php
                        switch ($_GET['c']) {
                            case 'exh':
                                validateUser();
                                break;
                            case 'adv':
                                validateAdv();
                                break;
                            case 'stnexh':
                                confirmStandExhibitor();
                                break;
                            case 'stnadv':
                                confirmStandAdviser();
                                break;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <ul class="list-group list-group-flush socialmedia">
            <li class="list-group-item"><a class="login-card-footer-face" href="https://www.facebook.com/World-Ferias-107217804528494/?ref=page_internal" target="_blank"><i class="fab fa-facebook"></i></a></li>
            <li class="list-group-item"><a class="login-card-footer-insta" href="https://www.instagram.com/world_ferias/" target="_blank"><i class="fab fa-instagram"></i></a></li>
            <li class="list-group-item"><a class="login-card-footer-whats" href="https://api.whatsapp.com/send?phone=525542274069&text=¡Hola!%20Bienvenido%20al%20soporte%20de%20World%20Ferias.%20¿Cómo%20podemos%20ayudarte?" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
            <li class="list-group-item"><a class="login-card-footer-email" href="mailto:soporte@worldferias.com" target="_blank"><i class="far fa-envelope"></i></a></li>
        </ul>
    </main>

    <script src="https://kit.fontawesome.com/0d6be13fd8.js" crossorigin="anonymous"></script>
    <script src="../js/jquery-3.6.0.min.js"></script>

</html>

<?php
function confirmStandAdviser() {

    include("../config/config.php");
    $email = base64_decode($_GET['k']);
    echo $email;


    $query = "SELECT `confirm` FROM adviser where email2 = '$email';";

    $query2 = "UPDATE `adviser` SET `confirm` = 1 WHERE (`email2` = '$email');"; //ESTO NO VA DAR POR EL MODO SEGURO DE LA BASE DE DATOS


    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {

        if ($data['confirm'] == true) {

?>
            <div class="text-justify">
                <h3>
                    Ya has aceptado esta invitación.
                </h3>
            </div>

            <br>

            <div class="text-justify">
                Ahora puedes editar y personalizar tu stand de este la plataforma CEM
            </div>

            <br>

            <a href="cem.worlferias.com" target="_blank"> <button class="btn btn-block login-btn mb-4">¡Vamos allá!</button> </a>

            <?php

        } else {

            if (!mysqli_query($con, $query2)) {

                echo "Error validating stand adviser: " . mysqli_error($con);
            } else {

            ?>

                <p class="text-center login-card-description">¡Has aceptado participar en este stand con éxito!</p>

                <br>

                <div class="text-justify">
                    Ahora puedes ayudar a la atención de visitantes de este la plataforma CEM y de nuestra APP.
                </div>

                <br>
                <br>

                <a href="https://cem.worldferias.com" target="_blank"> <button class="btn btn-block login-btn mb-4">¡Vamos allá!</button> </a>

                <br>

                <script>

                </script>
            <?php

            }
        }
    }

    mysqli_close($con);
}

function confirmStandExhibitor()
{

    include("../config/config.php");
    $stand_id = $_GET['s'];
    $email = base64_decode($_GET['k']);
    echo $email;


    $query = "SELECT `status` FROM stand_evento where correo_expositor = '$email';";

    $query2 = "UPDATE `stand_evento` SET `status` = 'Confirmado' WHERE (`correo_expositor` = '$email') AND(`id_stand` = '$stand_id');";


    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {
        //echo $data['is_validated'];

        if ($data['status'] == 'Confirmado') {

            ?>
            <div class="text-justify">
                <h3>
                    Ya has aceptado esta invitación.
                </h3>
            </div>

            <br>

            <div class="text-justify">
                Ahora puedes editar y personalizar tu stand de este la plataforma CEM
            </div>

            <br>

            <a href="cem.worlferias.com" target="_blank"> <button class="btn btn-block login-btn mb-4">¡Vamos allá!</button> </a>

            <?php

        } else {
            if (!mysqli_query($con, $query2)) {

                echo "Error validating stand exhibitor: " . mysqli_error($con);
            } else {
            ?>

                <h3 class="text-center login-card-description">¡Has aceptado este stand con éxito!</h3>

                <br>

                <div class="text-justify">
                    Ahora puedes editar y personalizar tu stand de este la plataforma CEM
                </div>

                <br>
                <br>

                <a href="https://cem.worldferias.com" target="_blank"> <button class="btn btn-block login-btn mb-4">¡Vamos allá!</button> </a>

                <br>

                <script>

                </script>
            <?php

            }
        }
    }

    mysqli_close($con);
}

function validateAdv()
{
    include("../config/config.php");

    $email = base64_decode($_GET['k']);
    echo $email;

    //AQUÍ DEBO hacer que confirm sea 1 en cada una de las columnas de la tabla adviser donde esté el id del user advicer ------------------------------
    $array = null;

    $query = "SELECT count(*) as n_stands FROM adviser WHERE email2 = '$email' ;";
    $res = mysqli_query($con, $query);


    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }

    $n_stands = $array["data"][0]['n_stands'];


    $array = null;

    $query = "SELECT `id_table` FROM adviser WHERE email2 = '$email' ;";
    $res = mysqli_query($con, $query);


    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }

    for ($i = 0; $i < $n_stands; $i++) {

        $id_table = $array["data"][$i]['id_table'];

        $query = "UPDATE `adviser` SET `confirm` = 1 WHERE id_table = '$id_table';";
        $res = mysqli_query($con, $query);
    }
    $array = null;


    //---------------------------------------------

    $query = "SELECT `is_validated`, `first_name` FROM user where email = '$email';";

    $query2 = "UPDATE `user` SET `is_validated` = true WHERE (`email` = '$email');";


    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {

        if ($data['is_validated'] == 1) {

            ?>
            <br>
            <br>

            <div class="text-center">
                <h3>
                    Usuario validado
                </h3>
            </div>

            <br>

            <a href="https://cem.worldferias.com" target="_blank"> <button class="btn btn-block login-btn mb-4">Iniciar Sesión</button> </a>

            <br>

            <?php

        } else {
            if (!mysqli_query($con, $query2)) {
                echo "Error validating user: " . mysqli_error($con);
            } else {
            ?>

                <p class="text-center login-card-description">Usuario validado con éxito!</p>

                <br>

                <div class="text-justify">
                    Estimad@ <?php echo $data['first_name']; ?>, tu usario se ha validado con éxito, por lo cual ya podrá hacer uso de la plataforma CEM y de todas sus ventajas. Gracias por unirte a nuestro equipo!
                </div>

                <br>

                <div class="text-justify">
                    Tus credenciales serán el correo el electrónico al que le llegó la invitación y un password autogenerado, el cual podrá cambiar en cualquier momento desde la plataforma CEM. Por favor descargue el archivo .txt que contiene dicha información.
                </div>

                <br>

                <button onclick="download('credentials.txt', 'Correo Electrónico -> <?php echo $email; ?> \nContraseña -> UserCEM2021#$ ')" id="btn-credentials" class="btn btn-block login-btn mb-4">Descargar mis credenciales</button>

                <a href="https://cem.worldferias.com" target="_blank"> <button class="btn btn-block login-btn mb-4">Iniciar Sesión</button> </a>

                <script>
                    function download(filename, text) {
                        var element = document.createElement('a');
                        element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
                        element.setAttribute('download', filename);

                        element.style.display = 'none';
                        document.body.appendChild(element);

                        element.click();

                        document.body.removeChild(element);
                    }
                </script>
            <?php

            }
        }
    }

    mysqli_close($con);
};

function validateUser() {
    include("../config/config.php");

    $email = base64_decode($_GET['k']);
    echo $email;

    //AQUÍ DEBO PONER QUE SE PONGA CONFIRMADO SI YA TIENE UN STAND ------------------------------

    $array = null;
    $query = "SELECT count(*) as n_stands FROM stand_evento WHERE correo_expositor = '$email' ;";
    $res = mysqli_query($con, $query);
    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }
    $n_stands = $array["data"][0]['n_stands'];

    $array = null;

    $query = "SELECT `id_stand` FROM stand_evento WHERE correo_expositor = '$email' ;";
    $res = mysqli_query($con, $query);
    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }
    for ($i = 0; $i < $n_stands; $i++) {
        $id_stand = $array["data"][$i]['id_stand'];
        $query = "UPDATE `stand_evento` SET `status` = 'Confirmado' WHERE id_stand = '$id_stand';";
        $res = mysqli_query($con, $query);
    }
    $array = null;

    //---------------------------------------------

    $query = "SELECT `is_validated`, `first_name` FROM user where email = '$email';";
    $query2 = "UPDATE `user` SET `is_validated` = true WHERE (`email` = '$email');";
    $res = mysqli_query($con, $query);
    while ($data = mysqli_fetch_assoc($res)) {
        if ($data['is_validated'] == 1) {
        ?>
            <br>
            <br>

            <div class="text-center">
                <h3>
                    Usuario validado
                </h3>
            </div>

            <br>
            <a href="https://cem.worldferias.com" target="_blank"> <button class="btn btn-block login-btn mb-4">Iniciar Sesión</button> </a>
            <br>

        <?php
        } else {
            if (!mysqli_query($con, $query2)) {
                echo "Error validating user: " . mysqli_error($con);
            } else {
            ?>

                <p class="text-center login-card-description">Usuario validado con éxito!</p>

                <br>

                <div class="text-justify">
                    Estimad@ <?php echo $data['first_name']; ?>, tu usario se ha validado con éxito, por lo cual ya podrá hacer uso de la plataforma CEM y de todas sus ventajas. Gracias por unirte a nuestro equipo!
                </div>

                <br>

                <div class="text-justify">
                    Tus credenciales serán el correo el electrónico al que le llegó la invitación y un password autogenerado, el cual podrá cambiar en cualquier momento desde la plataforma CEM. Por favor descargue el archivo .txt que contiene dicha información.
                </div>

                <br>

                <button onclick="download('credentials.txt', 'Correo Electrónico -> <?php echo $email; ?> \nContraseña -> UserCEM2021#$ ')" id="btn-credentials" class="btn btn-block login-btn mb-4">Descargar mis credenciales</button>

                <a href="https://cem.worldferias.com" target="_blank"> <button class="btn btn-block login-btn mb-4">Iniciar Sesión</button> </a>

                <script>
                    function download(filename, text) {
                        var element = document.createElement('a');
                        element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
                        element.setAttribute('download', filename);

                        element.style.display = 'none';
                        document.body.appendChild(element);

                        element.click();

                        document.body.removeChild(element);
                    }
                </script>
<?php
            }
        }
    }
    mysqli_close($con);
}
?>