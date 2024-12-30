<?php
include_once 'model.php';
include_once 'view.php';

if ($action == 'ingresar_perfil_usuario') {
    $data = $_POST;
    $res = ModelPerfiles::ingresar_perfil($data);
    if ($res) {
        $res = array('code' => '200', 'message' => 'Perfil guardado correctamente.');
    } else {
        $res = array('code' => '501', 'message' => 'No se pudó ingresar el perfil.');
    }
    $result = json_encode($res);
}

if ($action == 'modal_editar_perfil') {
    $data = $_POST;
    $res = viewPerfiles::modalEditarPerfil($data);
    if ($res) {
        $res = array('code' => '200', 'message' => 'Contenido mostrado correctamente', 'html' => $res);
    } else {
        $res = array('code' => '501', 'message' => 'No se pudó mostrar el contenido');
    }
    $result = json_encode($res);
}
