<?php
include_once 'model.php';
include_once 'view.php';

if ($action == 'ingresar_autor') {
    $data = $_POST;
    $res = ModelAutores::ingresar_autor($data);
    if ($res) {
        $res = array('code' => '200', 'message' => 'Autor guardado correctamente.');
    } else {
        $res = array('code' => '501', 'message' => 'No se pudó ingresar el autor.');
    }
    $result = json_encode($res);
}

if ($action == 'editar_autor') {
    $data = $_POST;
    $res = ModelAutores::editar_autor($data);
    if ($res) {
        $res = array('code' => '200', 'message' => 'Autor actualizado correctamente.');
    } else {
        $res = array('code' => '501', 'message' => 'No se pudó ingresar el autor.');
    }
    $result = json_encode($res);
}

if ($action == 'modal_editar_autores') {
    $data = $_POST;
    $res = viewAutores::ModalEditarAutor($data);
    if ($res) {
        $res = array('code' => '200', 'message' => 'Contenido mostrado correctamente', 'html' => $res);
    } else {
        $res = array('code' => '501', 'message' => 'No se pudó mostrar el contenido');
    }
    $result = json_encode($res);
}
