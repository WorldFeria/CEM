<?php
  session_start();
  include "../config/config.php";
  if (!isset($_SESSION['user-id']) && $_SESSION['user-id'] == null) {
    $invalid2 = sha1(md5("sesion no iniciada"));
    header("location: ../index.php?invalid=$invalid2");
  }

  $id = $_SESSION['user-id'];
  $query = mysqli_query($con, "SELECT id_rol2, email, cellphone, first_name, last_name, profile_pic, id_rol, rol_name FROM user, rolUser WHERE id_rol=id_rol2 AND id_user=$id");
  while ($row = mysqli_fetch_array($query)) {
    $_SESSION['user-email'] = $row['email'];
    $email = $_SESSION['user-email'];
    $_SESSION['user-cellphone'] = $row['cellphone'];
    $cellphone = $_SESSION['user-cellphone'];
    $_SESSION['user-name'] = $row['first_name'];
    $name = $_SESSION['user-name'];
    $_SESSION['user-lastname'] = $row['last_name'];
    $lastname = $_SESSION['user-lastname'];
    $_SESSION['user-profilepic'] = $row['profile_pic'];
    $profilepic = $_SESSION['user-profilepic'];

    $_SESSION['user-idrol'] = $row['id_rol'];
    $idrol = $_SESSION['user-idrol'];
    $_SESSION['user-rolname'] = $row['rol_name'];
    $rolName = $_SESSION['user-rolname'];

    if($idrol == 4){
      $queryAdv = mysqli_query($con, "SELECT id_stand2 FROM adviser WHERE email2 = '$email' ");
      while ($row = mysqli_fetch_array($queryAdv)) {
        $_SESSION['user-adv-stand'] = $row['id_stand2'];
      }
    }
  }

  if($_SESSION['user-rolname']=='admin') {
    $_SESSION['roluser-name'] = 'ADMINISTRADOR';
    $rolusername = $_SESSION['roluser-name'];
  } 
  else if($_SESSION['user-rolname']=='organizer') {
    $_SESSION['roluser-name'] = 'ORGANIZADOR';
    $rolusername = $_SESSION['roluser-name'];
  } 
  else if ($_SESSION['user-rolname']=='exhibitor') {
    $_SESSION['roluser-name'] = 'EXPOSITOR';
    $rolusername = $_SESSION['roluser-name'];
  }
  else if ($_SESSION['user-rolname']=='adviser') {
    $_SESSION['roluser-name'] = 'ASESOR';
    $rolusername = $_SESSION['roluser-name'];
  }
  /*elseif ($_SESSION['user-rolname']!='organizer') {
    session_destroy();
    $invalid=sha1(md5("acceso denegado, credencial erronea"));
    header("location: ../../index.php?message=$invalid");
  }*/

  mysqli_free_result($query);
  mysqli_close($con);
?>