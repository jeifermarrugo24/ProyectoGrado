<?php

include_once 'model.php';

if ($action == 'ingresar_usuario') {
    $data = $_POST;
    $res = ModelUsuarios::ingresar_usuarios($data);
    if ($res) {
        $res = array('code' => '200', 'message' => 'Usuario guardado correctamente.');
    } else {
        $res = array('code' => '501', 'message' => 'No se pudó ingresar el usuario.');
    }
    $result = json_encode($res);
}
