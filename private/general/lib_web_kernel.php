<?php

include_once "lib_configuration.php";
include_once "lib_data_base.php";
include_once "lib_general.php";
include_once "operaciones.php";
include_once __DIR__ . "/generalClases.php";

include_once __DIR__ . "/../btca/menus/view.php";
include_once __DIR__ . "/../btca/usuarios/view.php";
include_once __DIR__ . "/../btca/permisos/view.php";
include_once __DIR__ . "/../btca/perfiles/view.php";
include_once __DIR__ . "/../btca/autores/view.php";

function getContenido($params)
{
    $contenido = $params['atr_contenido'];
    $code = "200";

    if ($contenido == 'cerrar_session') {
        include_once __DIR__ . "/lib_user_information.php";
        echo cerrar_sesion_actual();
        exit();
    }

    //ADMINISTRADOR DE USUARIOS
    if ($contenido == "accion_ingresar_usuario") {
        $msj = ViewUsuarios::ingresarUsuarios();
    } else if ($contenido == "accion_consultar_usuario") {
        $msj = ViewUsuarios::consultarUsuarios();
    }
    //FIN ADMINISTRADOR DE USUARIOS

    //ADMINISTRADOR DE PERFILES
    if ($contenido == "accion_ingresar_perfil") {
        $msj = ViewPerfiles::ingresarPerfiles();
    } else if ($contenido == "accion_consultar_perfil") {
        $msj = ViewPerfiles::consultarPerfiles();
    }
    //FIN ADMINISTRADOR DE USUARIOS

    //ADMINISTRADOR DE MENUS
    if ($contenido == "accion_ingresar_menu") {
        $msj = viewMenu::ingresarNuevoMenu();
    }
    //FIN ADMINISTRADOR DE MENUS

    //ADMINISTRADOR DE PERMISOS
    if ($contenido == "accion_ingresar_permiso") {
        $msj = viewPermisos::permisos_usuario();
    }
    //FIN ADMINISTRADOR DE PERMISOS

    //ADMINISTRADOR DE AUTORES
    if ($contenido == "accion_ingresar_autor") {
        $msj = viewAutores::ingresarAutor();
    } else if ($contenido == 'accion_consultar_autores') {
        $msj = viewAutores::consultarAutor();
    }

    //FIN ADMINISTRADOR DE AUTORES


    $retorno = json_encode(
        array(
            "code" => $code,
            "message" => rawurlencode(utf8_encode($msj))
        )
    );
    return $retorno;
}
