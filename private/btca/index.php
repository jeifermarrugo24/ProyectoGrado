<?php

date_default_timezone_set('America/Bogota');
include_once dirname(__FILE__) . '/../general/lib_web_kernel.php';
include_once dirname(__FILE__) . '/../general/lib_user_information.php';

$vrand = rand(100, 9999);
$check_status = check_session_status();
$user_id = $user_name = $hora_actual = $txt_iniciales = "";

if ($check_status == false) {
    header("Location: ../");
    exit();
} else {
    $user_id = $check_status['user_id'];
    $user_name = $check_status['user_name'];
    $user_last_name = $check_status['user_last_name'];
    $user_imagen = $check_status['user_imagen'];
    if ($user_imagen != 'https://static.vecteezy.com/system/resources/previews/011/186/876/non_2x/male-profile-picture-symbol-vector.jpg') {
        $user_imagen = $url_servidor . '/../public/tools/images/images_perfiles/' . $user_imagen;
    }
    $txt_iniciales = $user_name[0] . $user_last_name[0];
    $hora_actual = date("H:i");
    if ($user_imagen == "") {
        $user_imagen = "https://static.vecteezy.com/system/resources/previews/011/186/876/non_2x/male-profile-picture-symbol-vector.jpg";
    }
}

$html_menu = HelperMenu::getMenu(0, $_SESSION['USER_PROFILE']);
//$html_submenus = HelperMenu::getSubmenus();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INICIO - BIBLIOTECA JES</title>
    <link rel="shortcut icon" href="<?php echo $url_servidor; ?>/../public/tools/images/icono.png" type="image/x-icon">

    <link href="<?php echo $url_servidor; ?>/../public/tools/magnific/magnific-popup.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $url_servidor; ?>/../public/tools/alertify/alertify.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $url_servidor; ?>/../public/tools/alertify/default.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $url_servidor; ?>/../public/tools/alertify/semantic.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $url_servidor; ?>/../public/tools/alertify/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $url_servidor; ?>/../public/tools/spinner/spinner.css?version=<?php echo $vrand; ?>" rel="stylesheet">
    <link href="<?php echo $url_servidor; ?>/../public/tools/css/main.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $url_servidor; ?>/../../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo $url_servidor; ?>/../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="<?php echo $url_servidor; ?>/../../plugins/fontawesome-free/css/all.min.css">
    <link href="<?php echo $url_servidor; ?>/../public/tools/datatables/dataTables.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo $url_servidor; ?>/../public/tools/css/autocomplete/autoComplete.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">

    <input type="hidden" id="section" value="principal">

    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Messages Dropdown Menu -->

                <!-- Notifications Dropdown Menu -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link dropdown-item w-100 traer-contenido hvr-shrink option-menu-mobile"
                        style="font-size: 14px;" contenido="cerrar_session"
                        href="javascript:void(0);">
                        <strong>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="14" height="14" fill="#ff3f3f">
                                <path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z" />
                            </svg>
                        </strong>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="<?php echo $url_servidor; ?>/../public/tools/images/icono.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">BIBLIOTECA JES</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php echo $user_imagen ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo $user_name ?></a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <?php echo $html_menu ?>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper iframe-mode" data-widget="iframe" data-loading-screen="750">
            <div class="nav navbar navbar-expand navbar-white navbar-light border-bottom p-0">
            </div>
            <div class="tab-content">
                <div class="tab-empty">
                    <h2 class="display-4">Sin pagina seleccionada!</h2>
                </div>
                <div class="tab-loading">
                    <div>
                        <h2 class="display-4">Cargando...<i class="fa fa-sync fa-spin"></i></h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>

    <div id="spinner">
        <div><img src="<?php echo $url_servidor; ?>/../public/tools/images/cargador-spinner.gif?vers=1.2" alt="Procesando..." /></div>
        <!-- <img src="../public/tools/spinner/ajax-loader.gif" alt="Procesando..."/> -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.9/dist/autoComplete.min.js"></script>
    <script src="<?php echo $url_servidor; ?>/../public/tools/spinner/spinner.js?version=<?php echo $vrand; ?>"></script>
    <script src="<?php echo $url_servidor; ?>/../public/tools/js/jquery-3.7.1.min.js"></script>
    <script src="<?php echo $url_servidor; ?>/../public/tools/magnific/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo $url_servidor; ?>/../public/tools/alertify/alertify.min.js"></script>
    <script src="<?php echo $url_servidor; ?>/../../plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo $url_servidor; ?>/../../plugins/jquery-ui/jquery-ui.min.js"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="<?php echo $url_servidor; ?>/../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="<?php echo $url_servidor; ?>/../../dist/js/adminlte.js"></script>
    <script src="<?php echo $url_servidor; ?>/../../dist/js/demo.js"></script>
    <script src="<?php echo $url_servidor; ?>/../public/tools/datatables/dataTables.min.js"></script>
    <script src="<?php echo $url_servidor; ?>/../public/tools/datatables/dataTables.bootstrap5.js"></script>
    <script src="<?php echo $url_servidor; ?>/../public/tools/datatables/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="<?php echo $url_servidor; ?>/../public/tools/js/main.js?version=<?php echo $vrand; ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>