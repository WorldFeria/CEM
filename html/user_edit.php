<?php
error_reporting(0);
$id_event = $_GET['idevent'];
//$name_event = $_GET['nameevent'];

include("../config/config.php");


session_start();
$idrol = $_SESSION['user-idrol'];






$query = "SELECT id_user,first_name,last_name,email from user where id_rol2 = 2;";
$res = mysqli_query($con, $query);
while ($data = mysqli_fetch_assoc($res)) {
    $arrayOrg["data"][] = $data;
}


$query = "SELECT * from user where id_rol2 = 3 ";
$res = mysqli_query($con, $query);
while ($data = mysqli_fetch_assoc($res)) {
    $array["data"][] = $data;
}




$query = "SELECT nombre_pabellon,id_pabellon,codigo_pabellon  from pabellon where id_evento = '$id_event';";
$res = mysqli_query($con, $query);
while ($data = mysqli_fetch_assoc($res)) {
    $array1["data"][] = $data;
}


$query = "SELECT count(*) as cantidad from pabellon where id_evento = '$id_event';";
$res = mysqli_query($con, $query);
while ($data = mysqli_fetch_assoc($res)) {
    $canntidad_pabellones["data"][] = $data;
}






$query = "SELECT * from user where id_rol2 = 4;";
$res = mysqli_query($con, $query);
while ($data = mysqli_fetch_assoc($res)) {
    $arrayAsesor["data"][] = $data;
}


$query = "SELECT * from user where id_rol2 = 8;";
$res = mysqli_query($con, $query);
while ($data = mysqli_fetch_assoc($res)) {
    $arrayVendedor["data"][] = $data;
}



$query = "SELECT codigo_stand,id_stand,id_pabellon from stand_evento where status = 'Sin Asignar' ;";
$res = mysqli_query($con, $query);
while ($data = mysqli_fetch_assoc($res)) {
    $array2["data"][] = $data;
}


$query = "SELECT codigo_stand,id_stand,id_pabellon from stand_evento where status in ('Confirmado','En espera')  ;";
$res = mysqli_query($con, $query);
while ($data = mysqli_fetch_assoc($res)) {
    $arraystand["data"][] = $data;
}


?>
<link rel="stylesheet" href="../css/notyf/notyf.min.css">
<link rel="stylesheet" href="../css/lead_styles.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap5.min.css"/>
 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

<script src="../js/notyf/notyf.min.js"></script>
<script src="../js/userEdit.js"></script>

<div id="<?php echo $id_event; ?>" class="obtener_id_evento"> </div>

<script type="text/javascript">
    var idFatherEvent = <?php echo $id_event ?>;

    var cantidad_pabellones = <?php echo $canntidad_pabellones["data"][0]['cantidad'] ?>;


    if (idRol == 1) {
        $('.boton-regreso-evento').click(function() {
            $('#page_content').load(`eventAdmin.php`);
        });

    } else {

        $('.boton-regreso-evento').click(function() {
            $('#page_content').load(`event.php`);
        });
    }

    var clickButtonOrg = function() {
        $("#boton_subir_org").attr("hidden", "");
        var elegirOrg = document.getElementById("elegirOrg").value = '0'; //
        funcion_elegido_org();

    }

    var funcion_elegido_org = function() {

        var elegirOrg = document.getElementById("elegirOrg"); //

        if (elegirOrg.value == '0') {
            $("#div_nuevo_org").attr("hidden", "");
            $("#boton_subir_org").attr("hidden", "");

        }

        if (elegirOrg.value == 'S') {
            $("#boton_subir_org").attr("hidden", "");
            $("#div_nuevo_org").removeAttr("hidden");

        }

        if (elegirOrg.value != 'S' && elegirOrg.value != '0') {
            $("#div_nuevo_org").attr("hidden", "");
            $("#boton_subir_org").removeAttr("hidden");


        }





    }




    document.getElementById('agregar_nuevoOrg').addEventListener('input', function() {

        campo = event.target;

        emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
        //Se muestra un texto a modo de ejemplo, luego va a ser un icono
        if (emailRegex.test(campo.value)) {

            $("#boton_subir_org").removeAttr("hidden");


        } else {

            $("#boton_subir_org").attr("hidden", "");

        }


    });

    //----------------------------EXPOSITORES




    var clickButtonExp = function() {
        document.getElementById("elegir_exp").value = "0"; //
        funcion_elegido_exp();

    }



    var funcion_elegido_exp = function() {
        elegir_pabe_expositor_fun();
        var elegir_exp = document.getElementById("elegir_exp");
        var hidden_exist = elegir_exp.getAttribute("hidden");
        var value_exist = elegir_exp.value;

        var elegir_pabellon = document.getElementById("input_pabe_exp"); //este es el div

        var escribir_correo_asesor = document.getElementById("div_nuevo_exp"); //este es el div
        var input_correo_expositor = document.getElementById("agregar_nuevoExp"); //este es el input


        if (value_exist == "0") {
            $("#input_pabe_exp").attr("hidden", "");
            document.getElementById("elegir_pabe_exp").value = '0'; //por alguna razón tuve que poner esto, si no no funciona stands

            $("#div_nuevo_exp").attr("hidden", "");
            input_correo_expositor.value = "";

        } else if (value_exist != 'S' && value_exist != '0') { //o sea que es un asesor en la lista

            $("#div_nuevo_exp").attr("hidden", "");
            input_correo_expositor.value = "";

            $("#input_pabe_exp").removeAttr("hidden");


        } else if (value_exist == 'S') { //o sea que es un nuevo asesor
            $("#input_pabe_exp").attr("hidden", "");
            document.getElementById("elegir_pabe_exp").value = '0'; //por alguna razón tuve que poner esto, si no no funciona stands
            $("#div_nuevo_exp").removeAttr("hidden");

        }

        var correo_input = document.getElementById("div_nuevo_exp"); //este es el div
        var hidden_correo_exist = correo_input.getAttribute("hidden");


        if (hidden_correo_exist != null) { //si el div está oculto su valor es default
            $("#name_nuevo_exp").attr("hidden", "");
            $("#apellido_nuevo_exp").attr("hidden", "");
            $("#tel_nuevo_exp").attr("hidden", "");

        } else {
            $("#name_nuevo_exp").removeAttr("hidden");
            $("#apellido_nuevo_exp").removeAttr("hidden");
            $("#tel_nuevo_exp").removeAttr("hidden");

        }


        elegir_pabe_expositor_fun();

    }


    var elegir_pabe_expositor_fun = function() {

        var elegir_pabellon = document.getElementById("input_pabe_exp"); //este es el div
        var select_pabellon = document.getElementById("elegir_pabe_exp"); //este es el select

        var value_exist = select_pabellon.value;
        var hidden_exist = elegir_pabellon.getAttribute("hidden");


        if (hidden_exist != null) { //si el div está oculto su valor es default
            select_pabellon.value = '0';
        }

        if (value_exist != '0') { //si se seleccionó un pabellón aparece el stand


            $(".ocultar_stand").attr("hidden", "");

            $('.expositor' + value_exist).removeAttr("hidden");


            $("#div_stand_expositor").removeAttr("hidden");
            document.getElementById("elegir_stand_expo").value = '0';


        } else if (value_exist == '0') {
            $("#div_stand_expositor").attr("hidden", "");

        }

        elegir_stand_expositor_fun();

    }

    var elegir_stand_expositor_fun = function() {

        var elegir_stand = document.getElementById("div_stand_expositor"); //este es el div
        var hidden_exist = elegir_stand.getAttribute("hidden");

        var select_stand = document.getElementById("elegir_stand_expo"); //este es el select
        var value_exist = select_stand.value;


        if (hidden_exist != null) { //si el div está oculto su valor es default
            select_stand.value = '0';

        }
        if (value_exist != '0') { //si se seleccionó un pabellón aparece el stand

            //primero saber cuantos pabellones hay

            //luego 
            $("#boton_subir_exp").removeAttr("hidden"); //Aquí va el botón

        } else if (value_exist == '0') {
            $("#boton_subir_exp").attr("hidden", "");

        }

    }

    var correo = false;

    document.getElementById('agregar_nuevoExp').addEventListener('input', function() {
        checarCamposExpositor();
        campo = event.target;
        emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
        //Se muestra un texto a modo de ejemplo, luego va a ser un icono
        if (emailRegex.test(campo.value)) {
            correo = true;
        } else {
            correo = false;
        }

        checarCamposExpositor();
    });

    var nombre = false;

    document.getElementById('nombreExpositor').addEventListener('input', function() {
        checarCamposExpositor();
        campo = event.target;
        emailRegex = /^[a-zA-Z]{3,}/i;
        //Se muestra un texto a modo de ejemplo, luego va a ser un icono
        if (emailRegex.test(campo.value)) {
            nombre = true;
        } else {
            nombre = false;
        }

        checarCamposExpositor();
    });

    var apellido = false;

    document.getElementById('apellidoExpositor').addEventListener('input', function() {
        checarCamposExpositor();
        campo = event.target;
        emailRegex = /^[a-zA-Z]{3,}/i;
        //Se muestra un texto a modo de ejemplo, luego va a ser un icono
        if (emailRegex.test(campo.value)) {
            apellido = true;
        } else {
            apellido = false;
        }

        checarCamposExpositor();
    });

    var telefono = false;

    document.getElementById('telefonoExpositor').addEventListener('input', function() {
        checarCamposExpositor();
        campo = event.target;
        emailRegex = /^[0-9]{10}/i;
        //Se muestra un texto a modo de ejemplo, luego va a ser un icono
        if (emailRegex.test(campo.value)) {
            telefono = true;
        } else {
            telefono = false;
        }

        checarCamposExpositor();
    });

    var checarCamposExpositor = function() {
        elegir_pabe_expositor_fun();

        if (correo && nombre && apellido && telefono) {

            $("#input_pabe_exp").removeAttr("hidden");

        } else {

            $("#input_pabe_exp").attr("hidden", "");

        }
        document.getElementById("elegir_pabe_exp").value = '0'; //por alguna razón tuve que poner esto, si no no funciona stands
        elegir_pabe_expositor_fun();
    }

    //-------------------------VENDEDOR

    var apretar_boton_vendedor = function() {
        var elegirVendedor = document.getElementById("elegirVendedor").value = '0';
        funcionElegirVendedor();

    }


    var funcionElegirVendedor = function() {
        elegir_pabe_vendedor_fun();
        var elegirVendedor = document.getElementById("elegirVendedor");
        var hidden_exist = elegirVendedor.getAttribute("hidden");
        var value_exist = elegirVendedor.value;

        var elegir_pabellon = document.getElementById("input_pabe_vendedor"); //este es el div

        var escribir_correo_vendedor = document.getElementById("div_nuevo_vendedor"); //este es el div
        var input_correo_vendedor = document.getElementById("agregar_nuevoVendedor"); //este es el input


        if (value_exist == '0') {
            $("#input_pabe_vendedor").attr("hidden", "");
            document.getElementById("elegir_pabe_vendedor").value = '0'; //por alguna razón tuve que poner esto, si no no funciona stands

            $("#div_nuevo_vendedor").attr("hidden", "");
            input_correo_vendedor.value = "";

        } else if (value_exist != 'Z' && value_exist != '0') { //o sea que es un asesor en la lista

            $("#div_nuevo_vendedor").attr("hidden", "");
            input_correo_vendedor.value = "";

            $("#input_pabe_vendedor").removeAttr("hidden");


        } else if (value_exist == 'Z') { //o sea que es un nuevo asesor
            $("#input_pabe_vendedor").attr("hidden", "");
            document.getElementById("elegir_pabe_vendedor").value = '0'; //por alguna razón tuve que poner esto, si no no funciona stands
            $("#div_nuevo_vendedor").removeAttr("hidden");


        }


        var correo_input = document.getElementById("div_nuevo_vendedor"); //este es el div
        var hidden_correo_exist = correo_input.getAttribute("hidden");


        if (hidden_correo_exist != null) { //si el div está oculto su valor es default
            $("#name_nuevo_vendedor").attr("hidden", "");
            $("#apellido_nuevo_vendedor").attr("hidden", "");
            $("#tel_nuevo_vendedor").attr("hidden", "");

        } else {
            $("#name_nuevo_vendedor").removeAttr("hidden");
            $("#apellido_nuevo_vendedor").removeAttr("hidden");
            $("#tel_nuevo_vendedor").removeAttr("hidden");

        }

        elegir_pabe_vendedor_fun();

    }


    var elegir_pabe_vendedor_fun = function() {

        var elegir_pabellon = document.getElementById("input_pabe_vendedor"); //este es el div
        var select_pabellon = document.getElementById("elegir_pabe_vendedor"); //este es el select

        var value_exist = select_pabellon.value;
        var hidden_exist = elegir_pabellon.getAttribute("hidden");


        if (hidden_exist != null) { //si el div está oculto su valor es default
            select_pabellon.value = '0';
        }

        if (value_exist != '0') { //si se seleccionó un pabellón aparece el stand


            $(".ocultar_stand").attr("hidden", "");

            $('.asesor' + value_exist).removeAttr("hidden");


            $("#div_stand_vendedor").removeAttr("hidden");
            document.getElementById("elegir_stand_vendedor").value = '0';


        } else if (value_exist == '0') {
            $("#div_stand_vendedor").attr("hidden", "");

        }

        elegir_stand_vendedor_fun();

    }

    var elegir_stand_vendedor_fun = function() {

        var elegir_stand = document.getElementById("div_stand_vendedor"); //este es el div
        var hidden_exist = elegir_stand.getAttribute("hidden");

        var select_stand = document.getElementById("elegir_stand_vendedor"); //este es el select
        var value_exist = select_stand.value;


        if (hidden_exist != null) { //si el div está oculto su valor es default
            select_stand.value = '0';

        }
        if (value_exist != '0') { //si se seleccionó un pabellón aparece el stand

            //primero saber cuantos pabellones hay

            //luego 
            $("#boton_subir_vendedor").removeAttr("hidden"); //Aquí va el botón

        } else if (value_exist == '0') {
            $("#boton_subir_vendedor").attr("hidden", "");

        }

    }

    var correoVendor = false;

    document.getElementById('agregar_nuevoVendedor').addEventListener('input', function() {
        checarCamposVendedor();
        campo = event.target;
        emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
        //Se muestra un texto a modo de ejemplo, luego va a ser un icono
        if (emailRegex.test(campo.value)) {
            correoVendor = true;
        } else {
            correoVendor = false;
        }

        checarCamposVendedor();
    });

    var nombreVendedor = false;

    document.getElementById('nombreVendedor').addEventListener('input', function() {
        checarCamposVendedor();
        campo = event.target;
        emailRegex = /^[a-zA-Z]{3,}/i;
        //Se muestra un texto a modo de ejemplo, luego va a ser un icono
        if (emailRegex.test(campo.value)) {
            nombreVendedor = true;
        } else {
            nombreVendedor = false;
        }

        checarCamposVendedor();
    });

    var apellidoVendedor = false;

    document.getElementById('apellidoVendedor').addEventListener('input', function() {
        checarCamposVendedor();
        campo = event.target;
        emailRegex = /^[a-zA-Z]{3,}/i;
        //Se muestra un texto a modo de ejemplo, luego va a ser un icono
        if (emailRegex.test(campo.value)) {
            apellidoVendedor = true;
        } else {
            apellidoVendedor = false;
        }

        checarCamposVendedor();
    });

    var telefonoVendedor = false;

    document.getElementById('telefonoVendedor').addEventListener('input', function() {
        checarCamposVendedor();
        campo = event.target;
        emailRegex = /^[0-9]{10}/i;
        //Se muestra un texto a modo de ejemplo, luego va a ser un icono
        if (emailRegex.test(campo.value)) {
            telefonoVendedor = true;
        } else {
            telefonoVendedor = false;
        }

        checarCamposVendedor();
    });

    var checarCamposVendedor = function() {
        elegir_pabe_vendedor_fun();


        if (correoVendor && nombreVendedor && apellidoVendedor && telefonoVendedor) {
            $("#input_pabe_vendedor").removeAttr("hidden");


        } else {

            $("#input_pabe_vendedor").attr("hidden", "");

        }
        document.getElementById("elegir_pabe_vendedor").value = '0'; //por alguna razón tuve que poner esto, si no no funciona stands
        elegir_pabe_vendedor_fun();
    }


    //----------------------------ASESORES

    var apretar_boton_asesor = function() {
        var elegir_asesor = document.getElementById("elegir_asesor").value = '0';
        funcion_elegido_asesor();

    }


    var funcion_elegido_asesor = function() {
        elegir_pabe_asesor_fun();
        var elegir_asesor = document.getElementById("elegir_asesor");
        var hidden_exist = elegir_asesor.getAttribute("hidden");
        var value_exist = elegir_asesor.value;

        var elegir_pabellon = document.getElementById("input_pabe_asesor"); //este es el div

        var escribir_correo_asesor = document.getElementById("div_nuevo_asesor"); //este es el div
        var input_correo_asesor = document.getElementById("agregar_nuevoAsesor"); //este es el input


        if (value_exist == '0') {
            $("#input_pabe_asesor").attr("hidden", "");
            document.getElementById("elegir_pabe_asesor").value = '0'; //por alguna razón tuve que poner esto, si no no funciona stands

            $("#div_nuevo_asesor").attr("hidden", "");
            input_correo_asesor.value = "";

        } else if (value_exist != 'Z' && value_exist != '0') { //o sea que es un asesor en la lista

            $("#div_nuevo_asesor").attr("hidden", "");
            input_correo_asesor.value = "";

            $("#input_pabe_asesor").removeAttr("hidden");


        } else if (value_exist == 'Z') { //o sea que es un nuevo asesor
            $("#input_pabe_asesor").attr("hidden", "");
            document.getElementById("elegir_pabe_asesor").value = '0'; //por alguna razón tuve que poner esto, si no no funciona stands
            $("#div_nuevo_asesor").removeAttr("hidden");


        }


        var correo_input = document.getElementById("div_nuevo_asesor"); //este es el div
        var hidden_correo_exist = correo_input.getAttribute("hidden");


        if (hidden_correo_exist != null) { //si el div está oculto su valor es default
            $("#name_nuevo_asesor").attr("hidden", "");
            $("#apellido_nuevo_asesor").attr("hidden", "");
            $("#tel_nuevo_asesor").attr("hidden", "");

        } else {
            $("#name_nuevo_asesor").removeAttr("hidden");
            $("#apellido_nuevo_asesor").removeAttr("hidden");
            $("#tel_nuevo_asesor").removeAttr("hidden");

        }

        elegir_pabe_asesor_fun();

    }


    var elegir_pabe_asesor_fun = function() {

        var elegir_pabellon = document.getElementById("input_pabe_asesor"); //este es el div
        var select_pabellon = document.getElementById("elegir_pabe_asesor"); //este es el select

        var value_exist = select_pabellon.value;
        var hidden_exist = elegir_pabellon.getAttribute("hidden");


        if (hidden_exist != null) { //si el div está oculto su valor es default
            select_pabellon.value = '0';
        }

        if (value_exist != '0') { //si se seleccionó un pabellón aparece el stand


            $(".ocultar_stand").attr("hidden", "");

            $('.asesor' + value_exist).removeAttr("hidden");


            $("#div_stand_asesor").removeAttr("hidden");
            document.getElementById("elegir_stand_asesor").value = '0';


        } else if (value_exist == '0') {
            $("#div_stand_asesor").attr("hidden", "");

        }

        elegir_stand_asesor_fun();

    }

    var elegir_stand_asesor_fun = function() {

        var elegir_stand = document.getElementById("div_stand_asesor"); //este es el div
        var hidden_exist = elegir_stand.getAttribute("hidden");

        var select_stand = document.getElementById("elegir_stand_asesor"); //este es el select
        var value_exist = select_stand.value;


        if (hidden_exist != null) { //si el div está oculto su valor es default
            select_stand.value = '0';

        }
        if (value_exist != '0') { //si se seleccionó un pabellón aparece el stand

            //primero saber cuantos pabellones hay

            //luego 
            $("#boton_subir_asesor").removeAttr("hidden"); //Aquí va el botón

        } else if (value_exist == '0') {
            $("#boton_subir_asesor").attr("hidden", "");

        }

    }

    var correoAsesor = false;

    document.getElementById('agregar_nuevoAsesor').addEventListener('input', function() {
        checarCamposAsesor();
        campo = event.target;
        emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
        //Se muestra un texto a modo de ejemplo, luego va a ser un icono
        if (emailRegex.test(campo.value)) {
            correoAsesor = true;
        } else {
            correoAsesor = false;
        }

        checarCamposAsesor();
    });

    var nombreAsesor = false;

    document.getElementById('nombreAsesor').addEventListener('input', function() {
        checarCamposAsesor();
        campo = event.target;
        emailRegex = /^[a-zA-Z]{3,}/i;
        //Se muestra un texto a modo de ejemplo, luego va a ser un icono
        if (emailRegex.test(campo.value)) {
            nombreAsesor = true;
        } else {
            nombreAsesor = false;
        }

        checarCamposAsesor();
    });

    var apellidoAsesor = false;

    document.getElementById('apellidoAsesor').addEventListener('input', function() {
        checarCamposAsesor();
        campo = event.target;
        emailRegex = /^[a-zA-Z]{3,}/i;
        //Se muestra un texto a modo de ejemplo, luego va a ser un icono
        if (emailRegex.test(campo.value)) {
            apellidoAsesor = true;
        } else {
            apellidoAsesor = false;
        }

        checarCamposAsesor();
    });

    var telefonoAsesor = false;

    document.getElementById('telefonoAsesor').addEventListener('input', function() {
        checarCamposAsesor();
        campo = event.target;
        emailRegex = /^[0-9]{10}/i;
        //Se muestra un texto a modo de ejemplo, luego va a ser un icono
        if (emailRegex.test(campo.value)) {
            telefonoAsesor = true;
        } else {
            telefonoAsesor = false;
        }

        checarCamposAsesor();
    });

    var checarCamposAsesor = function() {
        elegir_pabe_asesor_fun();


        if (correoAsesor && nombreAsesor && apellidoAsesor && telefonoAsesor) {
            $("#input_pabe_asesor").removeAttr("hidden");


        } else {

            $("#input_pabe_asesor").attr("hidden", "");

        }
        document.getElementById("elegir_pabe_asesor").value = '0'; //por alguna razón tuve que poner esto, si no no funciona stands
        elegir_pabe_asesor_fun();
    }



    //----------------------------VISITANTES


    document.getElementById('invitarNuevoVisitante').addEventListener('input', function() {

        campo = event.target;

        emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
        //Se muestra un texto a modo de ejemplo, luego va a ser un icono
        if (emailRegex.test(campo.value)) {

            $("#botonInvitarVisitante").removeAttr("hidden");




        } else {

            $("#botonInvitarVisitante").attr("hidden", "");


        }

    });
</script>




<br>
<div class="text-left">
    <button type="button" class="btn btn-outline-primary btn-sm boton-regreso-evento">Eventos</button> /
    <button type="button" class="btn btn-outline-primary btn-sm disabled">Actual</button>
</div><br>

<div class="accordion" id="accordionExample">

    <?php

    if ($idrol == 1) {



    ?>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" style="font-size: .9em">
                    Organizadores
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">

                    <div class="main_container" style="margin-top: 0">


                        <div class="d-flex justify-content-center ">
                            <button onclick="clickButtonOrg()" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".modalAgregarOrg">
                                Invitar Organizador <i class='fa fa-plus-circle align-middle'></i>
                            </button>
                        </div><br>



                        <div class="card" style="padding: 18px;">
                            <div class=" col-12 table-responsive">
                                <table class="table table-striped table-borderless " id="tabla_organizador" style="width:100%">
                                    <thead>
                                        <tr class="t-header">
                                            <th scope="col">ID</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Apellido</th>
                                            <th scope="col">Correo</th>
                                            <th scope="col">Telefono</th>
                                            <th scope="col">Editar</th>
                                            <th scope="col">Desvincular<br>Evento</th>

                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    <?php

    }


    if ($idrol <= 2 && ($id_event==161 || $id_event==167)) {



    ?>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingVendedor">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseVendedor" aria-expanded="false" aria-controls="collapseVendedor" style="font-size: .9em">
                    Vendedores
                </button>
            </h2>
            <div id="collapseVendedor" class="accordion-collapse collapse" aria-labelledby="headingVendedor" data-bs-parent="#accordionExample">
                <div class="accordion-body">

                    <div class="main_container" style="margin-top: 0">


                        <div class="d-flex justify-content-center ">
                            <button onclick="apretar_boton_vendedor()" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".modal_agregarVendedor">
                                Agregar Vendedor <i class='fa fa-plus-circle align-middle'></i>
                            </button>
                        </div><br>



                        <div class="card" style="padding: 18px;">
                            <div class=" col-12 table-responsive">
                                <table class="table table-striped table-borderless " id="tablaVendedor" style="width:100%">
                                    <thead>
                                        <tr class="t-header">
                                            <th scope="col">ID</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Apellido</th>
                                            <th scope="col">Correo </th>
                                            <th scope="col">Telefono</th>
                                            <th scope="col">Stand</th>
                                            <th scope="col">Editar</th>
                                            <th scope="col">Desvincular<br>Stand</th>

                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>



    <?php

    }


    if ($idrol <= 2 && ($id_event==161 || $id_event==167)) {



    ?>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="font-size: .9em">
                    Expositores
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">

                    <div class="main_container" style="margin-top: 0">


                        <div class="d-flex justify-content-center ">
                            <button onclick="clickButtonExp()" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".modal_agregarExp">
                                Invitar Expositor <i class='fa fa-plus-circle align-middle'></i>
                            </button>
                        </div><br>



                        <div class="card" style="padding: 18px;">
                            <div class=" col-12 table-responsive">
                                <table class="table table-striped table-borderless " id="tabla_expositor" style="width:100%">
                                    <thead>
                                        <tr class="t-header">
                                            <th scope="col">ID</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Apellido</th>
                                            <th scope="col">Correo </th>
                                            <th scope="col">Telefono</th>
                                            <th scope="col">Stand Asignado</th>
                                            <th scope="col">Estatus</th>
                                            <th scope="col">Editar</th>
                                            <th scope="col">Desvincular<br>Stand</th>

                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>



    <?php

    }


    if ($idrol <= 3 && ($id_event==161 || $id_event==167)) {



    ?>


        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="font-size: .9em">
                    Asesores de stands
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">

                    <div class="main_container" style="margin-top: 0">


                        <div class="d-flex justify-content-center ">
                            <button onclick="apretar_boton_asesor()" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".modal_agregarAsesor">
                                Invitar Asesor <i class='fa fa-plus-circle align-middle'></i>
                            </button>
                        </div><br>


                        <div class="card" style="padding: 18px;">
                            <div class=" col-12 table-responsive">
                                <table class="table table-striped table-borderless " id="tabla_asesor" style="width:100%">
                                    <thead>
                                        <tr class="t-header">
                                            <th scope="col">ID</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Apellido</th>
                                            <th scope="col">Correo </th>
                                            <th scope="col">Telefono</th>
                                            <th scope="col">Stand Asignado</th>
                                            <th scope="col">Estatus</th>
                                            <th scope="col">Editar</th>
                                            <th scope="col">Desvincular<br>Stand</th>

                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>


    <?php

    }


    if ($idrol <= 2) {



    ?>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" style="font-size: .9em">
                    Visitantes
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                <div class="accordion-body">

                    <div class="main_container" style="margin-top: 0">
                        <?php
                        if ($idrol == 1) {
                        ?>
                            <div class="d-flex justify-content-center ">
                                <button onclick="apretar_boton_visitante()" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".modalAgregarVisitantes">
                                    Invitar Visitantes <i class='fa fa-plus-circle align-middle'></i>
                                </button>
                            </div><br>
                        <?php
                        }
                        ?>

                        <?php
                        if ($id_event=='167') {
                        ?>
                            <div class="card" style="padding: 18px;">
                                <div class=" col-12 table-responsive">
                                    <table class="table table-striped table-borderless " id="tabla_visitante" style="width:100%">
                                        <thead>
                                            <tr class="t-header">
                                                <th scope="col">ID</th>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Apellido</th>
                                                <th scope="col">Correo </th>
                                                <th scope="col">Telefono</th>
                                                <th scope="col">Rol</th>
                                                <th scope="col">Rol2</th>
                                                <th scope="col">Escuela</th>
                                                <th scope="col">País</th>
                                                <th scope="col">Editar</th>
                                                <th scope="col">Desvincular<br>Evento</th>

                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        <?php
                        } else if ($id_event=='169') {
                        ?>
                            <div class="card" style="padding: 18px;">
                                <div class=" col-12 table-responsive">
                                    <table class="table table-striped table-borderless" id="tabla_visitantesClassEducation_Canada" style="width:100%">
                                        <thead>
                                            <tr class="t-header">
                                                <th scope="col">Programa</th>
                                                <th scope="col">Nombre(s)</th>
                                                <th scope="col">Apellido(s)</th>
                                                <th scope="col">Edad</th>
                                                <th scope="col">Pais Origen</th>
                                                <th scope="col">Ciudad</th>
                                                <th scope="col">Correo</th>
                                                <th scope="col">Telefono</th>
                                                <th scope="col">Pais Destino</th>
                                                <th scope="col">Fecha de Inicio</th>
                                                <th scope="col">Metodo de Pago</th>
                                                <th scope="col">Monto de Inversion</th>
                                                <th scope="col">Prioridad</th>
                                                <th scope="col">Fecha</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        <?php
                        } else if ($id_event=='170') {
                        ?>
                            <div class="card" style="padding: 18px;">
                                <div class=" col-12 table-responsive">
                                    <table class="table table-striped table-borderless" id="tabla_visitantesClassEducation_Italia" style="width:100%">
                                        <thead>
                                            <tr class="t-header">
                                                <th scope="col">Programa</th>
                                                <th scope="col">Nombre(s)</th>
                                                <th scope="col">Apellido(s)</th>
                                                <th scope="col">Edad</th>
                                                <th scope="col">Pais Origen</th>
                                                <th scope="col">Ciudad</th>
                                                <th scope="col">Correo</th>
                                                <th scope="col">Telefono</th>
                                                <th scope="col">Fecha de Inicio</th>
                                                <th scope="col">Metodo de Pago</th>
                                                <th scope="col">Prioridad</th>
                                                <th scope="col">Fecha</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                    </div>

                </div>
            </div>
        </div>

    <?php

    }

    ?>



</div>




<div class=" modal fade modalEditarExpAse" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">

            <div class="modal-header">

                <form id="formEditarUser" class="row g-3 needs-validation" novalidate>
                    <h5 class="modal-title">Editar datos del usuario</h5>

                    <input hidden type="text" readonly="" name="id_user" id="id_user">
                    <input hidden type="text" readonly="" name="tipo_user" id="tipo_user">
                    <input hidden type="text" readonly="" name="status" id="status">
                    <input hidden type="text" readonly="" name="stand" id="stand">

                    <div class="col-md-6">
                        <label for="nombreUser" class="form-label">Nombre:</label>
                        <input type="text" name="nombre" id="nombreUser">
                    </div>
                    <div class="col-md-6">
                        <label for="apellidoUser" class="form-label">Apellido:</label>
                        <input type="text" name="apellido" id="apellidoUser">
                    </div>

                    <div class="col-6">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar

                    </div>

                    <div class="col-6">
                        <button id="botonGuardarCambios" style="float: right;" class="btn btn-primary" type="submit">Guardar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>





<div class=" modal fade modalAgregarOrg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">

            <div class="modal-header">

                <form id="formAgregarOrg" class="row g-3 needs-validation" novalidate>
                    <input hidden type="text" name="nameEvent" value="<?php echo $id_event ?>" id="nameEvent">

                    <div class="col-md-8">
                        <label for="elegirOrg" class="form-label">Organizador</label>
                        <select onchange="funcion_elegido_org()" name="elegirOrg" class="form-select" id="elegirOrg" required>
                            <option selected disabled value="0">Choose...</option>
                            <option value="S">Nuevo Organizador</option>



                            <?php
                            for ($i = 0; $i < sizeof($arrayOrg["data"]); $i++) {

                            ?>

                                <option value="<?php echo ($arrayOrg["data"][$i]["id_user"]); ?>">
                                    <?php echo ($arrayOrg["data"][$i]["first_name"] . " " . $arrayOrg["data"][$i]["last_name"] . " : " . $arrayOrg["data"][$i]["email"]); ?>

                                </option>

                            <?php
                            }

                            ?>


                        </select>

                    </div>


                    <div hidden id="div_nuevo_org" class="col-md-8">
                        <label for="agregar_nuevoOrg" class="form-label">Correo del nuevo organizador :</label>
                        <input pattern="" class="correo" name="agregar_nuevoOrg" class="form-select" id="agregar_nuevoOrg" required>


                        </select>

                    </div>

                    <br>

                    <div class="col-6">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar

                    </div>

                    <div class="col-6">
                        <button id="boton_subir_org" hidden style="float: right;" class="btn btn-primary" type="submit">Invitar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>






<div class=" modal fade modal_agregarExp" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">

            <div class="modal-header">

                <form id="formAgregarExp" class="row g-3 needs-validation" novalidate>
                    <input hidden type="text" name="nameEvent" value="<?php echo $id_event ?>" id="nameEvent">



                    <div class="col-md-8">
                        <label for="elegir_exp" class="form-label">Expositor</label>
                        <select onchange="funcion_elegido_exp()" name="elegir_exp" class="form-select" id="elegir_exp" required>
                            <option selected disabled value="0">Choose...</option>
                            <option value="S">Nuevo Expositor</option>



                            <?php
                            for ($i = 0; $i < sizeof($array["data"]); $i++) {

                            ?>

                                <option title="<?php echo ($array["data"][$i]["email"]); ?>" id="<?php echo ($array["data"][$i]["id_user"]); ?>" value="<?php echo ($array["data"][$i]["id_user"]); ?>">
                                    <?php echo ($array["data"][$i]["first_name"] . " " . $array["data"][$i]["last_name"] . " : " . $array["data"][$i]["email"]); ?>

                                </option>

                            <?php
                            }

                            ?>


                        </select>

                    </div>




                    <div hidden id="div_nuevo_exp" class="mb-3">
                        <label for="agregar_nuevoExp" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="agregar_nuevoExp" name="agregar_nuevoExp" placeholder="example@example.com" required>

                    </div>


                    <div hidden id="name_nuevo_exp" class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombreExpositor" name="nombreExpositor" placeholder="Nombre" pattern="^[a-zA-Z]{3,}" required>

                    </div>

                    <div hidden id="apellido_nuevo_exp" class="mb-3">
                        <label class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellidoExpositor" name="apellidoExpositor" placeholder="Apellido" pattern="^[a-zA-Z]{3,}" required>

                    </div>
                    <div hidden id="tel_nuevo_exp" class="row g-2">
                        <div class="col-md-4">
                            <label class="form-label">País</label>
                            <select class="form-select" name="countryExpositor" id="countryExpositor">

                            </select>
                        </div>
                        <div class="col-md-8">
                            <label class="form-label">Teléfono</label>
                            <input type="number" class="form-control" id="telefonoExpositor" name="telefonoExpositor" placeholder="5512345678" pattern="^[0-9]{10}" required>
                            <h6><span id="help_cellphone" class="help-block badge bg-light mt-2"></span></h6>
                        </div>
                    </div>



                    <div hidden id="input_pabe_exp" class="col-md-7">
                        <label for="elegir_pabe_exp" class="form-label">Pabellón</label>
                        <select onchange="elegir_pabe_expositor_fun()" name="elegir_pabe_exp" class="form-select" id="elegir_pabe_exp" required>
                            <option selected disabled value="0">Choose...</option>


                            <?php


                            for ($i = 0; $i < sizeof($array1["data"]); $i++) {

                            ?>

                                <option value="<?php echo ($array1["data"][$i]["codigo_pabellon"]); ?>">
                                    <?php echo ($array1["data"][$i]["nombre_pabellon"]); ?>

                                </option>



                            <?php
                            }

                            ?>



                        </select>

                    </div>



                    <div hidden id="div_stand_expositor" class="col-md-5">
                        <label for="elegir_stand_expo" class="form-label">Stand :</label>
                        <select onchange="elegir_stand_expositor_fun()" name="elegir_stand_expo" class="form-select" id="elegir_stand_expo" required>
                            <option selected disabled value="0">Choose...</option>


                            <?php

                            for ($i = 0; $i < sizeof($array2["data"]); $i++) {

                            ?>

                                <option class="ocultar_stand <?php echo 'expositor' . substr($array2["data"][$i]["codigo_stand"], 0, 2); ?>" value="<?php echo ($array2["data"][$i]["id_stand"]); ?>">
                                    <?php echo ($array2["data"][$i]["codigo_stand"]); ?>

                                </option>





                            <?php
                            }

                            ?>

                        </select>

                    </div>







                    <br>

                    <div class="col-6">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar

                    </div>

                    <div class="col-6">
                        <button id="boton_subir_exp" hidden style="float: right;" class="btn btn-primary" type="submit">Invitar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class=" modal fade modal_agregarAsesor" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">

            <div class="modal-header">

                <form id="formAgregarAsesor" class="row g-3 needs-validation" novalidate>
                    <input hidden type="text" name="nameEvent" value="<?php echo $id_event ?>" id="nameEvent">

                    <div class="col-md-8">
                        <label for="elegir_asesor" class="form-label">Asesor: </label>
                        <select onchange="funcion_elegido_asesor()" name="elegir_asesor" class="form-select" id="elegir_asesor" required>
                            <option selected disabled value="0">Choose...</option>
                            <option value="Z">Nuevo Asesor</option>



                            <?php
                            for ($i = 0; $i < sizeof($arrayAsesor["data"]); $i++) {

                            ?>

                                <option title="<?php echo ($arrayAsesor["data"][$i]["email"]); ?>" value="<?php echo ($arrayAsesor["data"][$i]["id_user"]); ?>">
                                    <?php echo ($arrayAsesor["data"][$i]["first_name"] . " " . $arrayAsesor["data"][$i]["last_name"] . " : " . $arrayAsesor["data"][$i]["email"]); ?>

                                </option>

                            <?php
                            }

                            ?>

                        </select>

                    </div>



                    <div hidden id="div_nuevo_asesor" class="mb-3">
                        <label for="agregar_nuevoAsesor" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="agregar_nuevoAsesor" name="agregar_nuevoAsesor" placeholder="example@example.com" required>

                    </div>


                    <div hidden id="name_nuevo_asesor" class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombreAsesor" name="nombreAsesor" placeholder="Nombre" pattern="^[a-zA-Z]{3,}" required>

                    </div>

                    <div hidden id="apellido_nuevo_asesor" class="mb-3">
                        <label class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellidoAsesor" name="apellidoAsesor" placeholder="Apellido" pattern="^[a-zA-Z]{3,}" required>

                    </div>

                    <div hidden id="tel_nuevo_asesor" class="row g-2">
                        <div class="col-md-4">
                            <label class="form-label">País</label>
                            <select class="form-select" name="countryAsesor" id="countryAsesor">

                            </select>
                        </div>
                        <div class="col-md-8">
                            <label class="form-label">Teléfono</label>
                            <input type="number" class="form-control" id="telefonoAsesor" name="telefonoAsesor" placeholder="5512345678" pattern="^[0-9]{10}" required>
                            <h6><span id="help_cellphone" class="help-block badge bg-light mt-2"></span></h6>
                        </div>
                    </div>        

                    <div hidden id="input_pabe_asesor" class="col-md-7">
                        <label for="elegir_pabe_asesor" class="form-label">Pabellón</label>
                        <select onchange="elegir_pabe_asesor_fun()" name="elegir_pabe_asesor" class="form-select" id="elegir_pabe_asesor" required>
                            <option selected disabled value="0">Choose...</option>





                            <?php


                            for ($i = 0; $i < sizeof($array1["data"]); $i++) {

                            ?>

                                <option value="<?php echo ($array1["data"][$i]["codigo_pabellon"]); ?>">
                                    <?php echo ($array1["data"][$i]["nombre_pabellon"]); ?>

                                </option>

                            <?php
                            }

                            ?>



                        </select>

                    </div>


                    <div hidden id="div_stand_asesor" class="col-md-5">
                        <label for="elegir_stand_asesor" class="form-label">Stand :</label>
                        <select onchange="elegir_stand_asesor_fun()" name="elegir_stand_asesor" class="form-select" id="elegir_stand_asesor" required>
                            <option selected disabled value="0">Choose...</option>


                            <?php




                            for ($i = 0; $i < sizeof($arraystand["data"]); $i++) {

                            ?>
                                <!---->
                                <option class="ocultar_stand <?php echo 'asesor' . substr($arraystand["data"][$i]["codigo_stand"], 0, 2); ?>" value="<?php echo ($arraystand["data"][$i]["id_stand"]); ?>">
                                    <?php echo ($arraystand["data"][$i]["codigo_stand"]); ?>

                                </option>

                            <?php
                            }

                            ?>



                        </select>

                    </div>

                    <div class="col-6">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar

                    </div>

                    <div class="col-6">
                        <button id="boton_subir_asesor" hidden style="float: right;" class="btn btn-primary" type="submit">Invitar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class=" modal fade modal_agregarVendedor" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">

            <div class="modal-header">

                <form id="formAgregarVendedor" class="row g-3 needs-validation" novalidate>
                    <input hidden type="text" name="nameEvent" value="<?php echo $id_event ?>" id="nameEvent">

                    <div class="col-md-8">
                        <label for="elegirVendedor" class="form-label">Vendedor: </label>
                        <select onchange="funcionElegirVendedor()" name="elegirVendedor" class="form-select" id="elegirVendedor" required>
                            <option selected disabled value="0">Choose...</option>
                            <option value="Z">Nuevo Vendedor</option>



                            <?php
                            for ($i = 0; $i < sizeof($arrayVendedor["data"]); $i++) {

                            ?>

                                <option title="<?php echo ($arrayVendedor["data"][$i]["email"]); ?>" value="<?php echo ($arrayVendedor["data"][$i]["id_user"]); ?>">
                                    <?php echo ($arrayVendedor["data"][$i]["first_name"] . " " . $arrayVendedor["data"][$i]["last_name"] . " : " . $arrayVendedor["data"][$i]["email"]); ?>

                                </option>

                            <?php
                            }

                            ?>

                        </select>

                    </div>



                    <div hidden id="div_nuevo_vendedor" class="mb-3">
                        <label for="agregar_nuevoVendedor" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="agregar_nuevoVendedor" name="agregar_nuevoVendedor" placeholder="example@example.com" required>
                    </div>


                    <div hidden id="name_nuevo_vendedor" class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombreVendedor" name="nombreVendedor" placeholder="Nombre" pattern="^[a-zA-Z]{3,}" required>

                    </div>

                    <div hidden id="apellido_nuevo_vendedor" class="mb-3">
                        <label class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellidoVendedor" name="apellidoVendedor" placeholder="Apellido" pattern="^[a-zA-Z]{3,}" required>

                    </div>
                    <div hidden id="tel_nuevo_vendedor" class="row g-2">
                        <div class="col-md-4">
                            <label class="form-label">País</label>
                            <select class="form-select" name="countryVendedor" id="countryVendedor">

                            </select>
                        </div>
                        <div class="col-md-8">
                            <label class="form-label">Teléfono</label>
                            <input type="number" class="form-control" id="telefonoVendedor" name="telefonoVendedor" placeholder="5512345678" pattern="^[0-9]{10}" required>
                            <h6><span id="help_cellphone" class="help-block badge bg-light mt-2"></span></h6>
                        </div>
                    </div>

                    <div hidden id="input_pabe_vendedor" class="col-md-7">
                        <label for="elegir_pabe_vendedor" class="form-label">Pabellón</label>
                        <select onchange="elegir_pabe_vendedor_fun()" name="elegir_pabe_vendedor" class="form-select" id="elegir_pabe_vendedor" required>
                            <option selected disabled value="0">Choose...</option>





                            <?php


                            for ($i = 0; $i < sizeof($array1["data"]); $i++) {

                            ?>

                                <option value="<?php echo ($array1["data"][$i]["codigo_pabellon"]); ?>">
                                    <?php echo ($array1["data"][$i]["nombre_pabellon"]); ?>

                                </option>

                            <?php
                            }

                            ?>



                        </select>

                    </div>


                    <div hidden id="div_stand_vendedor" class="col-md-5">
                        <label for="elegir_stand_vendedor" class="form-label">Stand :</label>
                        <select onchange="elegir_stand_vendedor_fun()" name="elegir_stand_vendedor" class="form-select" id="elegir_stand_vendedor" required>
                            <option selected disabled value="0">Choose...</option>


                            <?php




                            for ($i = 0; $i < sizeof($arraystand["data"]); $i++) {

                            ?>
                                <!---->
                                <option class="ocultar_stand <?php echo 'asesor' . substr($arraystand["data"][$i]["codigo_stand"], 0, 2); ?>" value="<?php echo ($arraystand["data"][$i]["id_stand"]); ?>">
                                    <?php echo ($arraystand["data"][$i]["codigo_stand"]); ?>

                                </option>

                            <?php
                            }

                            ?>



                        </select>

                    </div>

                    <div class="col-6">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar

                    </div>

                    <div class="col-6">
                        <button id="boton_subir_vendedor" hidden style="float: right;" class="btn btn-primary" type="submit">Invitar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class=" modal fade modalStandsVendidos" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">

            <div class="modal-header">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nombre Stand</th>
                            <th scope="col">Ubicación</th>
                            <th scope="col">Expositor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>----</td>
                            <td>----</td>
                            <td>----</td>
                        </tr>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>



<div class=" modal fade modalAgregarVisitantes" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">

            <div class="modal-header">

                <form id="formAgregarVisit" class="row g-3 needs-validation" novalidate>



                    <div id="divNuevoVisitante" class="mb-3">
                        <label for="invitarNuevoVisitante" class="form-label">Correo del visitante a invitar :</label>
                        <input type="email" class="form-control" id="invitarNuevoVisitante" name="invitarNuevoVisitante" placeholder="example@example.com" required>

                    </div>


                    <div class="col-6">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar

                    </div>

                    <div class="col-6">
                        <button hidden id="botonInvitarVisitante" style="float: right;" class="btn btn-primary" type="submit">Invitar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>







<?php
mysqli_free_result($res);
mysqli_close($con);
?>