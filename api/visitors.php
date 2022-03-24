<?php
  /*if (!isset($_SERVER['HTTP_REFERER'])) {
    header('location:../../index.php');
    exit;
  }*/

   header("Content-Type: application/json; charset=UTF-8");
  $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

  function remove_accents($string) {
    $string = str_replace(
      array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
      array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
      $string
    );
    $string = str_replace(
      array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
      array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
      $string
    );
    $string = str_replace(
      array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
      array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
      $string
    );
    $string = str_replace(
      array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
      array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
      $string
    );
    $string = str_replace(
      array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
      array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
      $string
    );
    $string = str_replace(
      array('Ñ', 'ñ', 'Ç', 'ç'),
      array('N', 'n', 'C', 'c'),
      $string
    );
    return $string;
  }

  if ($contentType === "application/json" && $_REQUEST["page"] == "canada") {
	  $decodedDataCanada = json_decode(file_get_contents('php://input'), true);

    $program = $decodedDataCanada['program'];
    $firstname = remove_accents($decodedDataCanada['firstName']);
    $lastname = remove_accents($decodedDataCanada['lastName']);
    $age = $decodedDataCanada['age'];
    $countryOrigin = $decodedDataCanada['countryOrigin'];
    $city = $decodedDataCanada['city'];
    $email = $decodedDataCanada['email'];
    $phone = $decodedDataCanada['phone'];
    $countryDestiny = $decodedDataCanada['countryDestiny'];
    $dateStart = $decodedDataCanada['dateStart'];
    $paymentMethod = $decodedDataCanada['paymentMethod'];
    $investmentAmount = $decodedDataCanada['investmentAmount'];
    $leadpriority = $decodedDataCanada['leadpriority'];
    $desired_lang = $decodedDataCanada['desired_lang']; //Idioma
    $desired_gradeschool = $decodedDataCanada['desired_gradeschool']; //High School
    $desired_lodging = $decodedDataCanada['desired_lodging']; 
    $desired_type_grade = $decodedDataCanada['desired_type_grade']; //College y Universidades
    $desired_type_area_co = $decodedDataCanada['desired_type_area_co']; 
    $desired_type_area_et = $decodedDataCanada['desired_type_area_et']; //Estudia y Trabaja

    include("../config/config.php");
    $sql_visitorstudentCanada = "INSERT INTO visitorsCanadaClassEducation (program, firstName, lastName, age, countryOrigin, city, email, phone, countryDestiny, dateStart, paymentMethod, investmentAmount, leadpriority, desired_lang, desired_gradeschool, desired_lodging, desired_type_grade, desired_type_area_co, desired_type_area_et) VALUES ('$program','$firstname','$lastname','$age','$countryOrigin','$city','$email','$phone','$countryDestiny','$dateStart','$paymentMethod','$investmentAmount','$leadpriority','$desired_lang','$desired_gradeschool','$desired_lodging','$desired_type_grade','$desired_type_area_co','$desired_type_area_et')";
		$querynew_visitorstudentCanada = mysqli_query($con, $sql_visitorstudentCanada);

    die(json_encode([
      'value' => 1,
      'error' => null,
      'data' => $decodedData,
    ]));

  } else if ($contentType === "application/json" && $_REQUEST["page"] == "italia") {
    $decodedDataItalia = json_decode(file_get_contents('php://input'), true);

    $program = $decodedDataItalia['program'];
    $firstname = remove_accents($decodedDataItalia['firstName']);
    $lastName = remove_accents($decodedDataItalia['lastName']);
    $age = $decodedDataItalia['age'];
    $countryOrigin = $decodedDataItalia['countryOrigin'];
    $city = $decodedDataItalia['city'];
    $email = $decodedDataItalia['email'];
    $phone = $decodedDataItalia['phone'];
    $date = $decodedDataItalia['date'];
    $pay = $decodedDataItalia['pay'];
    $interest = $decodedDataItalia['interest'];

    include("../config/config.php");
    $sql_visitorstudentItalia = "INSERT INTO visitorsItaliaClassEducation (program, firstName, lastName, age, countryOrigin, city, email, phone, dateStart, paymentMethod, leadpriority) VALUES ('$program','$firstname','$lastName','$age','$countryOrigin','$city','$email','$phone','$date','$pay','$interest')";
		$querynew_visitorstudentItalia = mysqli_query($con, $sql_visitorstudentItalia);

    die(json_encode([
      'value' => 1,
      'error' => null,
      'data' => $decodedData,
    ]));
  }