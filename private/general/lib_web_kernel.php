<?php

include_once "lib_configuration.php";
include_once "lib_data_base.php";
include_once "lib_general.php";
include_once "operaciones.php";
include_once __DIR__ . "/generalClases.php";

include_once __DIR__ . "/../btca/menus/view.php";
include_once __DIR__ . "/../btca/usuarios/view.php";

function getContenido($params)
{
    $contenido = $params['atr_contenido'];
    $code = "200";

    if ($contenido == 'salir-extranet') {
        include_once __DIR__ . "/lib_user_information.php";
        echo cerrar_sesion_actual();
        exit();
    }

    if ($contenido == "accion_ingresar_usuario") {
        $msj = ViewUsuarios::ingresarUsuarios();
    } else if ($contenido == "accion_consultar_usuario") {
        $msj = ViewUsuarios::consultarUsuarios();
    }

    $retorno = json_encode(
        array(
            "code" => $code,
            "message" => rawurlencode(utf8_encode($msj))
        )
    );
    return $retorno;
}
