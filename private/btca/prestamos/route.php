<?php

include_once 'model.php';
include_once 'view.php';

if ($action == "consultar-contenido-libros-prestamo") {
    $data = $_POST;
    $valor = $data['valor'];
    $res = viewPrestamos::contenidoBusquedaLibroPrestamo($data);
    if ($res) {
        $res = array('code' => '200', 'message' => 'contenido mostrado correctamente.', 'html' => $res);
    } else {
        $res = array('code' => '501', 'message' => "No se encontró el contenido para '$valor'.");
    }
    $result = json_encode($res);
}

if ($action == 'modal_prestamo_libros') {
    $data = $_POST;
    $res = viewPrestamos::PrestamoLibrosUsuarios($data);
    if ($res) {
        $res = array('code' => '200', 'message' => 'Contenido mostrado correctamente', 'html' => $res['html'], 'usuarios' => $res['usuarios']);
    } else {
        $res = array('code' => '501', 'message' => 'No se pudó mostrar el contenido');
    }
    $result = json_encode($res);
}

if ($action == 'ingresar_prestamo_libro') {
    $data = $_POST;
    $usuario = $data['usuario'];
    $datos = explode(",", $usuario);
    $nombre = $datos[1];
    $res = ModelPrestamos::ingresar_prestamo_libro($data);
    if ($res) {
        $res = array('code' => '200', 'message' => "Libro al usuario $nombre prestado correctamente.");
    } else {
        $res = array('code' => '501', 'message' => "No se pudó prestar el libro al usuario $nombre.");
    }
    $result = json_encode($res);
}

if ($action == 'modal_editar_prestamo') {
    $data = $_POST;
    $res = viewPrestamos::editarPrestamoLibrosUsuarios($data);
    if ($res) {
        $res = array('code' => '200', 'message' => 'Contenido mostrado correctamente', 'html' => $res['html'], 'usuarios' => $res['usuarios']);
    } else {
        $res = array('code' => '501', 'message' => 'No se pudó mostrar el contenido');
    }
    $result = json_encode($res);
}

if ($action == 'modal_recibir_prestamo') {
    $data = $_POST;
    $res = viewPrestamos::recibirPrestamoLibrosUsuarios($data);
    if ($res) {
        $res = array('code' => '200', 'message' => 'Contenido mostrado correctamente', 'html' => $res['html'], 'usuarios' => $res['usuarios']);
    } else {
        $res = array('code' => '501', 'message' => 'No se pudó mostrar el contenido');
    }
    $result = json_encode($res);
}


if ($action == 'editar_prestamo_libro') {
    $data = $_POST;
    $usuario = $data['usuario'];
    $datos = explode(",", $usuario);
    $nombre = $datos[1];
    $res = ModelPrestamos::editar_prestamo_libro($data);
    if ($res) {
        $res = array('code' => '200', 'message' => "Libro actualizado correctamente, asignado al usuario $nombre.");
    } else {
        $res = array('code' => '501', 'message' => "No se pudó prestar el libro al usuario $nombre.");
    }
    $result = json_encode($res);
}

if ($action == 'recepcion_libro_prestado') {
    $data = $_POST;
    $res = ModelPrestamos::recepcion_libro_prestado($data);
    if ($res) {
        $res = array('code' => '200', 'message' => "Libro recibido correctamente.");
    } else {
        $res = array('code' => '501', 'message' => "No se pudó prestar el libro al usuario $nombre.");
    }
    $result = json_encode($res);
}
