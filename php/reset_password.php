<?php
if (isset($_REQUEST['dat1']) and isset($_REQUEST['dat2'])) {
  $email = base64_decode($_REQUEST['dat1']);
  $token = base64_decode($_REQUEST['dat2']);
} else {
  $invalid = sha1(md5("no data"));
  header("location: forgot_password.php?message=$invalid");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="../assets/img/icons/icon_wf.ico">

  <title>Ingresa tu Código CEM | World Ferias</title>

  <link href="https://fonts.googleapis.com" rel="preconnect" >
	<link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/login/login.css">

  <link rel="stylesheet" href="../css/notyf/notyf.min.css">
</head>

<body onload="disableBackspace()" class="reset_password">
  <main class="d-flex align-items-center justify-content-center min-vh-100 py-3 py-md-0">
    <div class="col-sm-9 col-md-8 col-lg-6 col-lg-5">
      <div class="container">
        <div class="card login-card rst_pswrd">
          <div class="row no-gutters">
            <div class="col-md-6">

            </div>
            <div class="col-md-6">
              <div class="card-body">

                <p class="text-center login-card-description-2">INGRESA TU CÓDIGO</p>

                <div class="abs-center">
                  <form action="password/rst_pswrd.php" method="post">
                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                    <input type="hidden" name="token" value="<?php echo $token; ?>">
                    <div class="form-group">
                      <input type="input" name="code_email" id="code_email" class="form-control" placeholder="Tu Codigo enviado por E-mail" required>
                    </div>
                    <button type="submit" name="reset_code" id="reset_code" value="resetcodebutton" class="btn btn-block login-btn">Validad Código</button>
                  </form>
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

  <script src="../js/login/reset_password.js"></script>

  <?php
  $invalid1 = sha1(md5("token vencido"));
  $invalid2 = sha1(md5("codigo incorrecto"));
  $invalid3 = sha1(md5("invalido"));
  if (isset($_GET['message']) && $_GET['message'] == $invalid1) {
  ?>
    <script>
      notyf.open({
        type: 'warning',
        message: '<b>¡AVISO!</b> El codigo ha Caducado.'
      });
    </script>
  <?php
  } else if (isset($_REQUEST['message']) && $_REQUEST['message'] == $invalid2) {
  ?>
    <script>
      notyf.open({
        type: 'danger',
        message: '<b>¡ERROR!</b> Codigo Incorrecto.'
      });
    </script>
  <?php
  } else if (isset($_REQUEST['message']) && $_REQUEST['message'] == $invalid3) {
  ?>
    <script>
      notyf.open({
        type: 'warning',
        message: '<b>¡AVISO!</b> No es posible proceder con la Solicitud.'
      });
    </script>
  <?php
  }
  ?>

</body>
</html>