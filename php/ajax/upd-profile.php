<?php
session_start();
include "../../config/config.php";

$id = $_SESSION['user-id'];

$names = strtoupper($_POST['mod_names']);
$lastnames = strtoupper($_POST['mod_lastnames']);

$update = mysqli_query($con, "UPDATE user SET first_name=\"$names\", last_name=\"$lastnames\" WHERE id_user=$id");
if ($update) {
?>
	<script>
		notyf.open({
			type: 'success',
			message: '<b>¡Bien hecho! </b> Datos Actualizados correctamente.'
		});
	</script>
<?php
} else {
?>
	<script>
		notyf.open({
			type: 'danger',
			message: '<b>¡Error! </b> Lo siento algo ha salido mal intenta nuevamente: <?php mysqli_error($con); ?>'
		});
	</script>
<?php
}
?>