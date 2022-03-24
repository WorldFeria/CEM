<?php
	define('DB_HOST', '74.208.168.156');
	define('DB_USER', 'cemadmin');
	define('DB_PASS', 'DBcem2021#%');
	define('DB_NAME', 'cem');

	$con = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if(!$con){
        die("<h2 style='text-align:center'>¡Imposible conectarse a la base de datos! </h2>" .  mysqli_connect_error() );
    }
    if (@mysqli_connect_errno()) {
        die("La conexión falló: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
    
?>