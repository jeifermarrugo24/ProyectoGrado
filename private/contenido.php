<?php

date_default_timezone_set('America/Bogota');
include_once dirname(__FILE__) . '/general/lib_web_kernel.php';

if ($action == "session-start") {
    include_once dirname(__FILE__) . '/general/lib_user_information.php';
    $array_armado = array(
        "user_login" => $user_login,
        "password_login" => $password_login
    );

    $data = json_encode($array_armado);
    $data = $array_armado;
    $result = validate_session_data($data);
}

if ($action == "consultar-contenido") {
    $array_armado = array(
        "atr_contenido" => $atr_contenido,
    );
    $data = json_encode($array_armado);
    $data = $array_armado;

    $result = getContenido($data);
}

echo $result;
