<?php
include_once 'model.php';
include_once 'view.php';

if ($action == 'modal_ingresar_menu') {
    $data = $_POST;
    $res = viewMenu::modal_acciones_menu($data, 'ingresar');
    if ($res) {
        $res = array('code' => '200', 'message' => 'Contenido mostrado correctamente', 'html' => $res);
    } else {
        $res = array('code' => '501', 'message' => 'No se pudó mostrar el contenido');
    }
    $result = json_encode($res);
}

if ($action == 'modal_editar_menu') {
    $data = $_POST;
    $res = viewMenu::modal_acciones_menu($data, 'editar');
    if ($res) {
        $res = array('code' => '200', 'message' => 'Contenido mostrado correctamente', 'html' => $res);
    } else {
        $res = array('code' => '501', 'message' => 'No se pudó mostrar el contenido');
    }
    $result = json_encode($res);
}
