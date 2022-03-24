<?php
if (!isset($_SERVER['HTTP_REFERER'])) {
	header('location:../index.php');
	exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="../assets/img/icons/icon_wf.ico">

  <title>¿Problemas al Iniciar Sesión? CEM | World Ferias</title>

  <link href="https://fonts.googleapis.com" rel="preconnect" >
	<link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/login/login.css">

  <link rel="stylesheet" href="../css/notyf/notyf.min.css">
</head>

<body onload="disableBackspace()" class="forgot_password">
  <main class="d-flex align-items-center justify-content-center min-vh-100 py-3 py-md-0">
    <div class="col-sm-9 col-md-8 col-lg-6 col-lg-5">
      <div class="container">
        <div class="card login-card frgt_pswrd">
          <div class="row no-gutters">
            <div class="col-md-6">

            </div>
            <div class="col-md-6">
              <div class="card-body">

                <p class="text-center login-card-description-2">¿PROBLEMAS AL INICIAR SESIÓN?</p>

                <div class="abs-center">
                  <form action="password/frgt_pswrd.php" method="post">
                    <div class="form-group">
                      <input type="text" name="emailcellphonercver-user" id="emailcellphonercver-user" class="form-control" placeholder="Correo Electrónico" required>
                    </div>
                    <button type="submit" name="login-rcver" id="login-rcver" value="loginrcverbutton" class="btn btn-block login-btn">Recuperar Contraseña</button>
                  </form>
                </div>

                <div class="row justify-content-center">
                  <a type="button" class="btn login-btn-pswrd" href="../index.php">Regresar</a>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script src="../js/jquery-3.6.0.min.js"></script>
  <script src="../js/notyf/notyf.min.js"></script>

  <script src="../js/login/forgot_password.js"></script>

  <?php
  $invalid1 = sha1(md5("email o numero sin registrar"));
  $invalid2 = sha1(md5("invalido"));
  $invalid3 = sha1(md5("no data"));
  $invalid4 = sha1(md5("no se envio email"));
  $success = sha1(md5("verificar email"));
  if (isset($_REQUEST['message']) && $_REQUEST['message'] == $invalid1) {
  ?>
    <script>
      notyf.open({
        type: 'warning',
        //message: '<b>¡AVISO!</b> Tu E-mail o Número de Teléfonico no esta registrado.'
        message: '<b>¡AVISO!</b> Tu E-mail no esta registrado.'
      });
    </script>
  <?php
  } else if (isset($_REQUEST['message']) && $_REQUEST['message'] == $invalid2) {
  ?>
    <script>
      notyf.open({
        type: 'warning',
        message: '<b>¡BIEN HECHO!</b> No es posible proceder con la Solicitud.'
      });
    </script>
  <?php
  } else if (isset($_REQUEST['message']) && $_REQUEST['message'] == $invalid3) {
  ?>
    <script>
      notyf.open({
        type: 'danger',
        message: '<b>¡ERROR!</b> Datos no Recibidos.'
      });
    </script>
  <?php
  } else if (isset($_REQUEST['message']) && $_REQUEST['message'] == $invalid4) {
  ?>
    <script>
      notyf.open({
        type: 'danger',
        message: '<b>¡ERROR!</b> No se completo el envio a tu E-mail.'
      });
    </script>
  <?php
  } else if (isset($_REQUEST['message']) && $_REQUEST['message'] == $success) {
  ?>
    <script>
      notyf.open({
        type: 'success',
        message: '<b>¡BIEN HECHO!</b> Verifica tu email para restablecer tu Contraseña.'
      });
    </script>
  <?php
  }
  ?>

</body>

</html>