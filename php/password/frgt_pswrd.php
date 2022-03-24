<?php
	if (!isset($_SERVER['HTTP_REFERER'])) {
		header('location:../../index.php');
		exit;
	}

	if (isset($_POST['login-rcver']) && $_POST['login-rcver']!=='' && $_POST['login-rcver']=='loginrcverbutton') {
		$emailcellphone_recovery = $_POST['emailcellphonercver-user'];
		$emailcellphonerecovery = strip_tags($emailcellphone_recovery);

		include "../../config/config.php";
		//$sql_res="SELECT email, cellphone FROM user WHERE (email='$emailcellphonerecovery' OR cellphone='$emailcellphonerecovery')";
		$sql_res="SELECT email FROM user WHERE email='$emailcellphonerecovery'";
		$query_res = mysqli_query($con,$sql_res);
		while ($row_res=mysqli_fetch_array($query_res)) {
			$emaildb=$row_res['email'];
			//$cellphonedb=$row_res['cellphone'];
		}

		if(mysqli_num_rows($query_res)>0) {
			$email_encrypt = base64_encode($emaildb);

			$bytes = random_bytes(5);
			$bytes_hex = bin2hex($bytes);
			$token_encrypt = base64_encode($bytes_hex);

			$codigo_recovery = rand(10000,99999);

			// E-mail
			include 'send_email.php';

			if($mail->Send()){
				$sql_password="INSERT INTO password (email, token, codigo) VALUES ('$emaildb','$bytes_hex','$codigo_recovery')";
				$query_passwordsnewinsert = mysqli_query($con,$sql_password);

				$success=sha1(md5("verificar email"));
				header("location: ../forgot_password.php?message=$success");
			} else {
				$invalid=sha1(md5("no se envio email"));
				header("location: ../forgot_password.php?message=$invalid");
			}

		} else {
			$invalid=sha1(md5("email o numero sin registrar"));
			header("location: ../forgot_password.php?message=$invalid");
		}

	} else {
		$invalid=sha1(md5("invalido"));
		header("location: ../forgot_password.php?message=$invalid");
	}
?>