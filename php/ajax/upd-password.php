<?php

session_start();
include "../../config/config.php";

if (!empty($_POST['pswrdNew']) and !empty($_POST['pswrdNew2'])) {
	$id = $_SESSION['user-id'];

	$new_password = $_POST['pswrdNew'];
	$confirm_new_password = $_POST['pswrdNew2'];

	if ($new_password == $confirm_new_password) {
		$password_cifr = password_hash($confirm_new_password, PASSWORD_DEFAULT, array("cost" => 15));
		//Encriptacion de password con metodo Hash(), array aumenta el costo o fuerza de encriptado	

		$update_passwd = mysqli_query($con, "UPDATE user set password=\"$password_cifr\" where id_user=$id");
		if ($update_passwd) {
?>
			<script>
				notyf.open({
					type: 'success',
					message: '<b>¡Bien hecho! </b> Contraseña actualizada correctamente.'
				});
			</script>
		<?php
		}
	} else {
		?>
		<script>
			notyf.open({
				type: 'warning',
				message: '<b>¡Aviso! </b> Las contraseñas no coinciden.'
			});
		</script>
<?php
	}
}
?>