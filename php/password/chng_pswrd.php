<?php
	if (!isset($_SERVER['HTTP_REFERER'])) {
		header('location:../../index.php');
		exit;
	}

	if (isset($_POST['reset_pswrd']) && $_POST['reset_pswrd']!=='') {
		include "../../config/config.php";

		$email = $_POST['email'];
		$emailrecovery = strip_tags($email);
		$email_encrypt = base64_encode($emailrecovery);
		$new_password = $_POST['pswrd_1'];
		$newpasswordrecovery = strip_tags($new_password);
		$confirm_new_password = $_POST['pswrd_2'];
		$confirmnewpasswordrecovery = strip_tags($confirm_new_password);

		if($newpasswordrecovery==$confirmnewpasswordrecovery) {
			$password_cifr=password_hash($confirmnewpasswordrecovery, PASSWORD_DEFAULT, array("cost"=>15));
			//Encriptacion de password con metodo Password Hassh(), array aumenta el costo o fuerza de encriptado	

			$sql_res="SELECT id_user FROM user WHERE email='$emailrecovery'";
			$query_res = mysqli_query($con,$sql_res);
			while ($row_res=mysqli_fetch_array($query_res)) {
				$iduser=$row_res['id_user'];
			}
			
			$update_passwd=mysqli_query($con,"UPDATE user SET password=\"$password_cifr\" WHERE id_user=$iduser");
			if ($update_passwd) {
				$success=sha1(md5("password update"));
				header("location: ../change_password.php?message=$success");
			} else {
				$invalid=sha1(md5("not password update"));
				header("location: ../change_password.php?message=$invalid&data=$email_encrypt");
			}
		} else {
			$invalid=sha1(md5("passwords dont match"));
			header("location: ../change_password.php?message=$invalid&data=$email_encrypt");
		}

	} else {
		$invalid=sha1(md5("invalido"));
		header("location: ../change_password.php?message=$invalid");
	}
?>