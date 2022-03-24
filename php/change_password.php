<?php
if (!isset($_SERVER['HTTP_REFERER'])) {
  header('location:../index.php');
  exit;
}

if (isset($_GET['data'])) {
  $email = base64_decode($_GET['data']);
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

  <title>Cambia tu  Contraseña CEM | World Ferias</title>

  <link href="https://fonts.googleapis.com" rel="preconnect" >
	<link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/login/login.css">

  <link rel="stylesheet" href="../css/notyf/notyf.min.css">
  <link rel="stylesheet" href="../css/sweetalert2/sweetalert2.min.css">
</head>

<body onload="disableBackspace()" class="change_password">
  <main class="d-flex align-items-center justify-content-center min-vh-100 py-3 py-md-0">
    <div class="col-sm-9 col-md-8 col-lg-7 col-lg-5">
      <div class="container">
        <div class="card login-card chng_pswrd">
          <div class="row no-gutters">
            <div class="col-md-6">

            </div>
            <div class="col-md-6">
              <div class="card-body">

                <p class="text-center login-card-description-2">CAMBIA TU CONTRASEÑA</p>

                <div class="abs-center">
                  <form action="password/chng_pswrd.php" method="post">
                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                    <div class="form-label-group">
                      <input type="password" name="pswrd_1" id="pswrd_1" class="form-control chng_pswrd" placeholder="Nueva Contraseña" required>
                    </div>
                    <div class="form-label-group">
                      <input type="password" name="pswrd_2" id="pswrd_2" class="form-control chng_pswrd" placeholder="Confirmar Nueva Contraseña" required>
                      <small class="text-white">Solo se permite un cambio de Contraseña por Solicitud.</small>
                    </div>
                    <div class="form-group text-center text-white">
                      <input type="checkbox" onclick="showPasswords()"> Mostrar Contraseñas</input>
                    </div>
                    <button type="submit" name="reset_pswrd" id="reset_pswrd" value="reset_pswrd" class="btn btn-block login-btn mb-4">Restablecer Contraseña</button>
                  </form>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script src="https://kit.fontawesome.com/0d6be13fd8.js" crossorigin="anonymous"></script>
  <script src="../js/jquery-3.6.0.min.js"></script>
  <script src="../js/pwstrength-bootstrap/i18next.js"></script>
  <script src="../js/pwstrength-bootstrap/pwstrength.js"></script>
  <script src="../js/notyf/notyf.min.js"></script>
  <script src="../js/sweetalert2/sweetalert2.min.js"></script>

  <script src="../js/login/change_password.js"></script>

  <?php
  $invalid1 = sha1(md5("invalido"));
  $invalid2 = sha1(md5("not password update"));
  $invalid3 = sha1(md5("passwords dont match"));
  $success = sha1(md5("password update"));
  if (isset($_GET['message']) && $_GET['message'] == $invalid1) {
  ?>
    <script>
      notyf.open({
        type: 'warning',
        message: '<b>¡AVISO!</b> No es posible proceder con la Solicitud.'
      });
    </script>
  <?php
  } else if (isset($_GET['message']) && $_GET['message'] == $invalid2) {
  ?>
    <script>
      notyf.open({
        type: 'danger',
        message: '<b>¡ERROR!</b> No se actualizo tu Contraseña.'
      });
  <?php
  } else if (isset($_GET['message']) && $_GET['message'] == $success) {
  ?>
    <script>
      Swal.fire({
				title: '¡BIEN HECHO!',
				icon: 'success',
        allowOutsideClick: false,
        html: 'Contraseña actualizada Correctamente.<br>Serás redirigido en <b></b> segundos.',
        timer: 6000,
        timerProgressBar: true,
        didOpen: () => {
          Swal.showLoading()
          const b = Swal.getHtmlContainer().querySelector('b')
          timerInterval = setInterval(() => {
            b.textContent = (Swal.getTimerLeft()/1000).toFixed(0)
          }, 1000)
        },
        willClose: () => {
          clearInterval(timerInterval)
        }
			}).then((result) => {
        if (result.dismiss === Swal.DismissReason.timer) {
          location.href="../index.php";
        }
      })
    </script>
  <?php
  } else if (isset($_GET['message']) && $_GET['message'] == $invalid3) {
  ?>
    <script>
      notyf.open({
        type: 'warning',
        message: '<b>¡AVISO!</b> Las Contraseñas no coinciden.'
      });
    </script>
  <?php
  }
  ?>

</body>
</html>