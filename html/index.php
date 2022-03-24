<?php
include "../php/head.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="../assets/img/icons/icon_wf.ico">
    <title>CEM | World Ferias</title>

    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap5.min.js"></script>

    <script src="../js/Chart.bundle.min.js"></script>
    <script src="../js/chartjs-plugin-labels.js"></script>
    <script src="../js/jquery-jvectormap-2.0.5.min.js"></script>
    <script src="../js/jquery-jvectormap-world-mill.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>

    <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>

    <link href="../css/bootstrap5.css" rel="stylesheet">

    <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">

    <link rel="stylesheet" href="../css/notyf/notyf.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/bundle.js"></script>
    <script src="../js/jquery.dateselect.js"></script>
    <link rel="stylesheet" href="../css/jquery.dateselect.css">


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/ea88bbb9af.js" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="../css/main.css">

    <script src="../js/main.js"></script>
    <script src="../js/locales-all.min.js"></script>
    <script src="../js/mainCalendar.js"></script>

    <script src="../js/sideMenu.js"></script>
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">

    <link href="../css/aos/aos.css" rel="stylesheet">

    <script>
        var email = '<?php echo $email ?>';
        var uid = <?php echo $id ?>;
        var idRol = <?php echo $idrol ?>;

        //alert (uid);
    </script>
</head>

<html>

<body id="body-pd" oncontextmenu='return false' class='snippet-body body-pd'>

    <div class="bg-image"></div>

    <header class="header body-pd" id="header">
        <div class="header_toggle">
            <i class='bx bx-chevron-left' id="header-toggle"></i>


        </div>
        <div>
            <button id="theme_switch" class="theme-switch">
                <span> <i class='bx bx-sun'></i> </span>
                <span> <i class='bx bx-moon'></i> </span>
            </button>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <div class="header_img">
                    <?php if ($profilepic == 'default.png') { ?>
                        <img src="../assets/img/profiles/default/<?php echo $profilepic; ?>" class="d-inline-block align-top" alt="<?php echo $name . " " . $lastname; ?>" title="<?php echo $name . " " . $lastname; ?>">
                    <?php } else { ?>
                        <img src="../assets/img/profiles/users/<?php echo $id; ?>/<?php echo $profilepic; ?>" class="d-inline-block align-top" alt="<?php echo $name . " " . $lastname; ?>" title="<?php echo $name . " " . $lastname; ?>">
                    <?php } ?>
                </div>&nbsp;
                <div class="text-nowrap bd-highlight">
                    <?php echo $name . " " . $lastname ?>
                </div>
            </div>
        </nav>
    </header>

    <div class="l-navbar show" id="nav-bar" style="padding-top: 8px;">
        <nav class="custom-nav">
            <div>

                <div class="nav_logo" style="text-decoration: none;">
                    <i class='bx bx-layer nav_logo-icon align-middle'></i>
                    <img src="../assets/img/logos/logo-cem.png" height="35" width="70" class="nav_logo-name align-middle" alt="CUSTOMER EVENT MANAGEMENT" title="CUSTOMER EVENT MANAGEMENT">
                </div>

                <div id="sidebar_nav" class="nav_list">

                    <?php
                    if ($idrol == 1) {

                        include "../html/chatSoporte.php";

                    ?>

                        <a href="dashboard" class="nav_link active"> <i class='bx bx-pie-chart nav_icon'></i>
                            <span class="nav_name">Dashboard</span>
                        </a>
                        <a href="eventAdmin" class="nav_link"> <i class='bx bxs-calendar-event nav_icon'></i>
                            <span class="nav_name">Eventos</span>
                        </a>
                        <a href="deadline" class="nav_link"> <i class='bx bxs-calendar nav_icon'></i>
                            <span class="nav_name">Hoja de Ruta</span>
                        </a>
                        <a href="#" data-bs-toggle="dropdown" aria-expanded="false" class="nav_link"> <i class='bx bx-user-plus nav_icon'></i>
                            <span class="nav_name">Usuarios</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="allUsers">Todos</a></li>
                            <li><a class="dropdown-item" href="ponentes">Expositores</a></li>
                            <li><a class="dropdown-item" href="adviser">Asesores</a></li>
                            <li><a class="dropdown-item" href="visitors">Visitantes</a></li>
                        </ul>
                        <a href="settings" class="nav_link"><i class='bx bx-cog nav_icon'></i>
                            <span class="nav_name">Configuración</span>
                        </a>
                        <a href="help_center" class="nav_link"> <i class='bx bxs-help-circle nav_icon'></i>
                            <span class="nav_name">Centro de Ayuda</span>
                        </a>
                    <?php
                    } else if ($idrol == 2) {

                        include "../html/chatOrzanizadores.php";

                    ?>
                        <a href="dashboard" class="nav_link active"> <i class='bx bx-pie-chart nav_icon'></i>
                            <span class="nav_name">Dashboard</span>
                        </a>
                        <a href="eventOrg" class="nav_link"> <i class='bx bxs-calendar-event nav_icon'></i>
                            <span class="nav_name">Eventos</span>
                        </a>
                        <a href="deadline" class="nav_link"> <i class='bx bxs-calendar nav_icon'></i>
                            <span class="nav_name">Hoja de Ruta</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="allUsers">Todos</a></li>
                            <li><a class="dropdown-item" href="ponentes">Expositores</a></li>
                            <li><a class="dropdown-item" href="adviser">Asesores</a></li>
                            <li><a class="dropdown-item" href="visitors">Visitantes</a></li>
                        </ul>
                        <a href="settings" class="nav_link"><i class='bx bx-cog nav_icon'></i>
                            <span class="nav_name">Configuración</span>
                        </a>
                        <a href="help_center" class="nav_link"> <i class='bx bxs-help-circle nav_icon'></i>
                            <span class="nav_name">Centro de Ayuda</span>
                        </a>
                    <?php
                    } else if ($idrol == 3) {

                        include "../html/chatExpositores.php";

                    ?>
                        <a href="dashboardExh" class="nav_link active"> <i class='bx bx-pie-chart nav_icon'></i>
                            <span class="nav_name">Dashboard</span>
                        </a>
                        <a href="eventExh" class="nav_link"> <i class='bx bxs-calendar-event nav_icon'></i>
                            <span class="nav_name">Eventos</span>
                        </a>
                        <a href="confeExp" class="nav_link"> <i class='bx bxs-time-five nav_icon'></i>
                            <span class="nav_name">Mis conferencias</span>
                        </a>                        
                        <a href="deadline" class="nav_link"> <i class='bx bxs-calendar nav_icon'></i>
                            <span class="nav_name">Hoja de Ruta</span>
                        </a>
                        <a href="adviser" class="nav_link"> <i class='bx bx-user-plus nav_icon'></i>
                            <span class="nav_name">Mis asesores</span>
                        </a>
                        <a href="settingsExh" class="nav_link"><i class='bx bx-cog nav_icon'></i>
                            <span class="nav_name">Configuración</span>
                        </a>
                        <a href="help_center" class="nav_link"> <i class='bx bxs-help-circle nav_icon'></i>
                            <span class="nav_name">Centro de Ayuda</span>
                        </a>
                    <?php
                    }else if ($idrol == 4) {

                    ?>  
                        <a href="dashboardExh" class="nav_link active"> <i class='bx bx-pie-chart nav_icon'></i>
                            <span class="nav_name">Dashboard</span>
                        </a>
                  
                        <a href="adviser" class="nav_link"> <i class='bx bx-user-plus nav_icon'></i>
                            <span class="nav_name">Chats</span>
                        </a>
                     
                    <?php
                        include "../html/chatAsesores.php";
                    }
                    ?>

                </div>
            </div>

            <a href="../php/action/logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i>
                <span class="nav_name">Salir</span>
            </a>

        </nav>
    </div>

    <!--Main Container start-->
    <div id="page_content">

    </div><br>
    <!--Main Container end-->

    <!-- Footer -->
    <div id="footer_nav">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand">&nbsp;&nbsp;
                <img src="../assets/img/logos/logo-cem.png" height="35" width="70" class="d-inline-block align-top" alt="CUSTOMER EVENT MANAGEMENT" title="CUSTOMER EVENT MANAGEMENT">
            </a>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="index" id="menu-footernav"><strong><?php echo $rolusername; ?></strong></a>
                    <a class="nav-item nav-link" href="https://worldferias.com/" target="_blank">World Ferias &copy 2021</a>
                </div>
            </div>
            <span class="navbar-text">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="aboutus" id="menu-footernav">Acerca de Nosotros</a>
                    <a class="nav-item nav-link" href="privacy" id="menu-footernav">Aviso de Privacidad</a>
                    <a class="nav-item nav-link" href="terms" id="menu-footernav">Términos y Condiciones</a>
                </div>
            </span>
        </nav>
    </div>

    <script src="../js/aos/aos.js"></script>
    <script src="../js/notyf/notyf.min.js"></script>
    <script src="../js/index.js"></script>

    <?php
    $wlm_msj = sha1(md5("bienvenido usuario"));
    if (isset($_GET['wlmmsj']) && $_GET['wlmmsj'] == $wlm_msj) {
    ?>

        <script>
            notyf.open({
                type: 'wlmmsj',
                message: '<b>BIENVENIDO a CEM</b><br><?php echo  $name . " " . $lastname; ?>'
            });
        </script>
    <?php
    }
    ?>

</body>

</html>