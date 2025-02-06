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
        $res = array('code' => '200', 'message' => 'Contenido mostrado correctamente', 'html' => $res);
    } else {
        $res = array('code' => '501', 'message' => 'No se pudó mostrar el contenido');
    }
    $result = json_encode($res);
}
