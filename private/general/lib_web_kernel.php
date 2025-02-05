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
include_once __DIR__ . "/../btca/categorias/view.php";
include_once __DIR__ . "/../btca/libros/view.php";
include_once __DIR__ . "/../btca/prestamos/view.php";

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
    //FIN ADMINISTRADOR DE PERFILES

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

    //ADMINISTRADOR DE CATEGORIAS
    if ($contenido == "config-categoria-ingresar") {
        $msj = viewCategorias::ingresarCategoria();
    } else if ($contenido == 'config-categoria-consultar') {
        $msj = viewCategorias::consultarCategoria();
    }
    //FIN ADMINISTRADOR DE CATEGORIAS

    //ADMINISTRADOR DE LIBROS
    if ($contenido == "config-ingresar-libro") {
        $msj = viewLibros::ingresarLibro();

        $retorno = array(
            "code" => "200",
            "message" => $msj['html'],
            "autores" => $msj['autores'],
            "categorias" => $msj['categorias']
        );

        return json_encode($retorno);
    } else if ($contenido == 'config-consultar-libro') {
        $msj = viewLibros::consultarLibros();
    }
    //FIN ADMINISTRADOR DE LIBROS

    //ADMINISTRADOR DE PRESTAMOS
    if ($contenido == "config-prestamos-libros") {
        $msj = viewPrestamos::prestamoLibros();
    } else if ($contenido == 'config-categoria-consultar') {
        $msj = viewCategorias::consultarCategoria();
    }
    //FIN ADMINISTRADOR DE CATEGORIAS

    $retorno = json_encode(
        array(
            "code" => $code,
            "message" => rawurlencode(utf8_encode($msj)),
        )
    );
    return $retorno;
}
