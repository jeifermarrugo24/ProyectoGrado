<?php

include_once 'model.php';
include_once 'view.php';

if ($action == 'ingresar_libro') {
    $data = $_POST;
    $res = ModelLibros::ingresar_libro($data);
    if ($res) {
        $res = array('code' => '200', 'message' => 'Libro guardado correctamente.');
    } else {
        $res = array('code' => '501', 'message' => 'No se pudó ingresar el usuario.');
    }
    $result = json_encode($res);
}
