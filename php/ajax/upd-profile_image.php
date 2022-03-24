<?php
session_start();

define('CUATROMB', 4194304);
include "../../config/config.php";
error_reporting(E_ERROR | E_PARSE | E_NOTICE);

$id = $_SESSION['user-id'];

if (isset($_FILES["fileimg"])) {
  $file = $_FILES["fileimg"];
  $name = $file["name"];
  $type = $file["type"];
  $tmp_n = $file["tmp_name"];
  $size = $file["size"];
  $folder = "../../assets/img/profiles/users/$id/";

  if ($type != 'image/jpg' && $type != 'image/jpeg' && $type != 'image/png') {
?>
    <div class="alert alert-warning alert-dismissible fade show col-md-12 col-sm-12 col-xs-12" role="alert">
    <strong>¡Alerta!</strong> El archivo no es compatible o no es una Imagen.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <script>
      notyf.open({
        type: 'warning',
        message: '<b>¡Alerta! </b> El archivo no es compatible o no es una Imagen.'
      });
    </script>
  <?php
  } else if ($size > CUATROMB) {
  ?>
    <div class="alert alert-danger alert-dismissible fade show col-md-12 col-sm-12 col-xs-12" role="alert">
      <strong>¡Error!</strong> El tamaño máximo permitido es un 4MB, buscar otra Imagen de menor resolución.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <script>
      notyf.open({
        type: 'danger',
        message: '<b>¡Error! </b> El tamaño máximo permitido es un 4MB, buscar otra Imagen de menor resolución.'
      });
    </script>
    <?php
  } else {
    mkdir("$folder", 0777);
    $src = $folder . $name;
    @move_uploaded_file($tmp_n, $src);
    //Mover el archivo a su ruta destino

    $query = mysqli_query($con, "UPDATE user set profile_pic=\"$name\" where id_user=$id");
    if ($query) {
    ?>
      <script>
        notyf.open({
          type: 'success',
          message: '<b>¡Bien hecho! </b> Imagen de Perfil actualizada correctamente.'
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
  }
}
?>