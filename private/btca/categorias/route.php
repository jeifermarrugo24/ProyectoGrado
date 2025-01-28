<?php
include_once 'model.php';
include_once 'view.php';

if ($action == 'ingresar_categoria') {
    $data = $_POST;
    $res = ModelCategorias::ingresar_categoria($data);
    if ($res) {
        $res = array('code' => '200', 'message' => 'Categoria guardada correctamente.');
    } else {
        $res = array('code' => '501', 'message' => 'No se pudó ingresar el perfil.');
    }
    $result = json_encode($res);
}

if ($action == 'modal_editar_categoria') {
    $data = $_POST;
    $res = viewCategorias::modalEditarCategoria($data);
    if ($res) {
        $res = array('code' => '200', 'message' => 'Contenido mostrado correctamente', 'html' => $res);
    } else {
        $res = array('code' => '501', 'message' => 'No se pudó mostrar el contenido');
    }
    $result = json_encode($res);
}
