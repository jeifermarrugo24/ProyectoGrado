<?php
include_once 'model.php';
include_once 'view.php';


if ($action == 'asignar_permisos_usuarios') {
    $data = $_POST;
    $res = ModelPermisos::asignar_permisos_usuario($data);
    if ($res) {
        $res = array('code' => '200', 'message' => 'Permisos asignados correctamente.');
    } else {
        $res = array('code' => '501', 'message' => 'No se pudieron asignar los permisos');
    }
    $result = json_encode($res);
}

if ($action == 'obtener_permisos_by_perfiles') {
    $id_perfil = $_POST['perfil'];
    $res =  ModelPermisos::permisos_by_perfil($id_perfil);
    $permisos = array();
    foreach ($res as $key => $value) {
        $permisos[] = array(
            'permiso_id' => $value['permiso_id'],
            'permiso_menu_id' => $value['permiso_menu_id'],
            'permiso_profile_id' => $value['permiso_profile_id'],
            'permiso_status' => $value['permiso_status']
        );
    }

    if ($res) {
        $res = array('code' => '200', 'message' => 'Permisos del perfil ' . $id_perfil . ' obtenidos correctamente.', 'permisos' => $permisos);
    } else {
        $res = array('code' => '501', 'message' => 'Este perfil no tiene permisos asignados');
    }
    $result = json_encode($res);
}
