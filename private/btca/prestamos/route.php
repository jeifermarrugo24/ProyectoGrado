<?php

include_once 'model.php';
include_once 'view.php';

if ($action == "consultar-contenido-libros-prestamo") {
    $data = $_POST;
    $res = viewPrestamos::contenidoBusquedaLibroPrestamo($data);
    if ($res) {
        $res = array('code' => '200', 'message' => 'contenido mostrado correctamente.', 'html' => $res);
    } else {
        $res = array('code' => '501', 'message' => 'No se mostrar el contenido.');
    }
    $result = json_encode($res);
}
