<?php
	if (!isset($_SERVER['HTTP_REFERER'])) {
		header('location:../../index.php');
		exit;
	}

	if (isset($_POST['reset_code']) && $_POST['reset_code']!=='' && $_POST['reset_code']=='resetcodebutton') {
		include "../../config/config.php";

		$email = $_POST['email'];
		$emailrecovery = strip_tags($email);//Devuelve string con bytes NULL y las etiquetas HTML y PHP retirados
		$email_encrypt = base64_encode($emailrecovery);
		$token = $_POST['token'];
		$tokenrecovery = strip_tags($token);
		$token_encrypt = base64_encode($tokenrecovery);
		$codeemail = $_POST['code_email'];
		$codeemailrecovery = strip_tags($codeemail);

		$sql_res="SELECT * FROM password WHERE email='$emailrecovery' AND token='$tokenrecovery' AND codigo='$codeemailrecovery'";
		$query_res = mysqli_query($con,$sql_res);

		if(mysqli_num_rows($query_res)>0) {
			while ($row_res=mysqli_fetch_array($query_res)) {
				$createtime=$row_res['createtime'];
			}

			$date_act=date("Y-m-d H:i:s");
			$seconds=strtotime($date_act) - strtotime($createtime);
			$minutes=$seconds/60;

			if($minutes>=15) {
				$invalid=sha1(md5("token vencido"));
				header("location: ../reset_password.php?message=$invalid&dat1=$email_encrypt&dat2=$token_encrypt");
			} else {
				header("location: ../change_password.php?data=$email_encrypt");
			}
		} else {
			$invalid=sha1(md5("codigo incorrecto"));
			header("location: ../reset_password.php?message=$invalid&dat1=$email_encrypt&dat2=$token_encrypt");
		}

	} else {
		$invalid=sha1(md5("invalido"));
		header("location: ../reset_password.php?message=$invalid&dat1=$email_encrypt&dat2=$token_encrypt");
	}
?>