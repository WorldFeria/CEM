<!DOCTYPE html>
<html lang="es">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<meta name="author" content="Spotynet SA de CV" />
	<meta name="copyright" content="Spotynet SA de CV" />
	<meta name="description" content="C.E.M. (Custom Event Management) por WorldFerias" />
	<meta name="keywords" content="CEM, WorldFerias, Eventos Virtuales, Ferias Virtuales, SpotyNet, WF" />

	<link rel="icon" href="assets/img/icons/icon_wf.ico">
	<title>INICIAR SESIÓN | CEM</title>

	<link href="https://fonts.googleapis.com" rel="preconnect">
	<link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link href="https://necolas.github.io/normalize.css/8.0.1/normalize.css" rel="stylesheet">
	<link href="css/notyf/notyf.min.css" rel="stylesheet">
	<link href="css/login/login.css" rel="stylesheet">
</head>

<body onload="disableBackspace()" class="index">
	<main class="d-flex align-items-center justify-content-center min-vh-100 py-3 py-md-0">
		<div class="col-sm-12 col-md-8 col-lg-6 col-lg-5">
			<div class="container">
				<div class="card login-card">
					<div class="row no-gutters">
						<div class="col-md-6">

						</div>
						<div class="col-md-6">
							<div class="card-body">

								<div class="abs-center">
									<form id="formlogin" action="php/action/login.php" method="post">
										<div class="form-label-group">
											<input type="text" name="emailcellphone-user" id="emailcellphone-user" class="form-control" placeholder="Correo Electrónico" required>
										</div>
										<div class="form-label-group">
											<input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required>
											<span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
										</div>
										<button type="button" id="loginbtn" class="btn btn-block login-btn">Iniciar Sesión</button>
									</form>
								</div>

								<div class="row justify-content-center">
									<a class="login-btn-pswrd" href="php/forgot_password.php">¿Olvidaste tu contraseña?</a>
								</div>
							</div>
						</div>
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
	<script src="js/jquery-3.6.0.min.js"></script>
	<script src="js/notyf/notyf.min.js"></script>
	<script src="https://www.google.com/recaptcha/api.js?render=6Lcdr00cAAAAAPUYKJxQK2mU6iE6Qnd_fRB43haD"></script>
	<script src="js/login/login.js"></script>

	<?php
	$invalid1 = sha1(md5("contrasena o email invalido"));
	$invalid2 = sha1(md5("otro usuario esta en linea"));
	$invalid3 = sha1(md5("acceso denegado credencial erronea"));
	$invalid4 = sha1(md5("captcha invalido"));
	if (isset($_GET['message']) && $_GET['message'] == $invalid1) {
	?>
		<script>
			notyf.open({
				type: 'danger',
				//message: '<b>¡ERROR!</b> Correo Electronico/Número Telefonico o Contraseña erroneos.'
				message: '<b>¡ERROR!</b> Correo Electronico o Contraseña erroneos.'
			});
		</script>
	<?php
	} else if (isset($_GET['message']) && $_GET['message'] == $invalid2) {
	?>
		<script>
			notyf.open({
				type: 'warning',
				message: '<b>¡ADVERTENCIA!</b> Solo puedes tener una Sesión activa.'
			});
		</script>
	<?php
	} else if (isset($_GET['message']) && $_GET['message'] == $invalid3) {
	?>
		<script>
			notyf.open({
				type: 'danger',
				message: '<b>¡ERROR!</b> Acceso denegado.'
			});
		</script>
	<?php
	} else if (isset($_GET['message']) && $_GET['message'] == $invalid4) {
	?>
		<script>
			notyf.open({
				type: 'danger',
				message: '<b>¡ADVERTENCIA!</b> Captcha invalido.'
			});
		</script>
	<?php
	}
	?>

</body>

</html>