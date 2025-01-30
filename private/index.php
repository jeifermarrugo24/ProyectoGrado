<?php

include_once dirname(__FILE__) . '/general/lib_web_kernel.php';
include_once dirname(__FILE__) . '/general/lib_user_information.php';
$vrand = rand(100, 9999);
$check_status = check_session_status();

if ($check_status == false) {
    //header("Location: ../");exit();
} else {
    $user_id = $check_status['user_id'];
    $user_name = $check_status['user_name'];
    $user_last_name = $check_status['user_last_name'];
    $txt_iniciales = $user_name[0] . $user_last_name[0];
    $hora_actual = date("H:i");

    header("Location: $url_servidor/btca");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JES-Login</title>
    <link rel="shortcut icon" href="<?php echo $url_servidor; ?>/public/tools/images/icono.jpg" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="<?php echo $url_servidor; ?>/public/tools/magnific/magnific-popup.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $url_servidor; ?>/public/tools/alertify/alertify.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $url_servidor; ?>/public/tools/alertify/default.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $url_servidor; ?>/public/tools/alertify/semantic.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $url_servidor; ?>/public/tools/alertify/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $url_servidor; ?>/public/tools/spinner/spinner.css?version=<?php echo $vrand; ?>" rel="stylesheet">
    <link href="<?php echo $url_servidor; ?>/public/tools/css/main.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #222431;
            padding: 40px 20px;
        }

        html,
        body {
            height: 100%;
        }

        body {
            text-align: center;
        }

        body:before {
            content: "";
            height: 100%;
            display: inline-block;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div id="particles-js" class="snow"></div>
    <main class="row mx-auto bg-light rounded">
        <!-- Imagen de la izquierda, oculta en pantallas pequeñas -->
        <div class="left-side col-12 col-md-5 p-0 d-none"></div>

        <!-- Formulario -->
        <div class="col-12 col-md-7 right-side p-4">

            <div class="row justify-content-center no-gutters pb-2">
                <div class="py-3 col-5 text-center"><img src="public/tools/images/logo_biblioteca.png"
                        class="img-fluid" alt="" /></div>
            </div>

            <div class="btn-group d-flex flex-column flex-md-row gap-2 mb-4">
                <button class="btn d-flex align-items-center justify-content-center">
                    <img class="logo" src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/d1c98974-c62d-4071-8bd2-ab859fc5f4e9" alt="" />
                    <span>Ingresar con google</span>
                </button>
                <button class="btn d-flex align-items-center justify-content-center">
                    <img class="logo" src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/2021_Facebook_icon.svg/2048px-2021_Facebook_icon.svg.png" alt="" />
                    <span>Ingresar con facebook</span>
                </button>
            </div>

            <div class="or">O</div>

            <label for="email">Usuario</label>
            <input type="text" placeholder="Ingrese Usuario" name="user_login" id="user_login" />

            <label for="password">Contraseña</label>
            <input type="password" placeholder="Ingrese Contraseña" id="password_login" name="password_login" />

            <button type="submit" class="login-btn" id="send-button">Ingresar</button>
            <div class="links">
                <a href="javascript:void(0);">Olvidaste tu contraseña?</a>
                <a href="javascript:void(0);" onclick="modalMagnificPopup('modal-user-register')">No tienes una cuenta?</a>
            </div>


        </div>
    </main>

    <div class="d-none">
        <div class="container3 mfp-hide row" id="modal-user-register">

            <div class="fondo_main_1 col-lg-5" style="margin:auto; background:#eee; border-radius:10px;">
                <div class="p-3 text-right" style="position: relative;">
                    <a class="pt-3 pr-2" onclick="modalMagnificPopupClose();"
                        style="position: absolute; top: 0; right: 10px; cursor: pointer; font-size: 25px; color: red;">X
                    </a>
                </div>

                <!-- body code goes here -->
                <div class="p-2">
                    <div class="d-flex justify-content-center no-gutters pt-2">
                        <div class="col-lg-12">
                            <h1>SÍ NO TIENES UNA CUENTA <br> TEN EN CUENTA QUE</h1>
                            <div>
                                <p>
                                    Debes comunicarte con nosotros.
                                    <br>
                                    Nuestros canales de atención disponibles son:
                                </p>
                                <ul style="font-size: 14px;">
                                    <li><b>Celular:</b> 3022268606</li>
                                    <li><b>Email:</b> jeifer.marrugo@unicolombo.edu.co</li>
                                    <li><b>Oficinas:</b> Unicolombo
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>


                    <div class="row justify-content-center no-gutters">
                        <div class="py-3 col-5 text-center"><img src="public/tools/images/logo_biblioteca.png"
                                class="img-fluid" alt="" /></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="spinner">
        <div><img src="<?php echo $url_servidor; ?>/public/tools/images/cargador-spinner.gif?vers=1.2" alt="Procesando..." /></div>
        <!-- <img src="../public/tools/spinner/ajax-loader.gif" alt="Procesando..."/> -->
    </div>

    <script src="<?php echo $url_servidor; ?>/public/tools/spinner/spinner.js?version=<?php echo $vrand; ?>"></script>
    <script src="<?php echo $url_servidor; ?>/public/tools/js/jquery-3.7.1.min.js"></script>
    <script src="<?php echo $url_servidor; ?>/public/tools/js/main.js?version=<?php echo $vrand; ?>"></script>
    <script src="<?php echo $url_servidor; ?>/public/tools/magnific/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo $url_servidor; ?>/public/tools/alertify/alertify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>