<?php

class ModelPermisos
{

    public static function permisos_by_perfil($id_perfil)
    {
        $query = "SELECT * FROM permisos_menus WHERE 1=1 AND permiso_profile_id = '$id_perfil' AND permiso_status='A'";

        $result = consultar($query);

        return $result;
    }

    public static function asignar_permisos_usuario($data)
    {

        $perfil = $data['perfil'];
        $estado = 'A';
        $checks_menus = $data['checks_menus'];
        $response = ltrim($checks_menus, ',');
        $checksArray = explode(',', $response);

        $checksPermisosId = array_map(function ($item) {
            return (int) str_replace('check_', '', $item);
        }, $checksArray);


        $obtener_permisos = "SELECT * FROM permisos_menus WHERE permiso_profile_id = '$perfil'";
        $res_permisos = consultar($obtener_permisos);

        if (is_array($res_permisos) && count($res_permisos) > 0) {
            $delete_menus = "DELETE FROM permisos_menus WHERE permiso_profile_id = '$perfil'";
            $result = eliminar($delete_menus);
            if ($result) {
                foreach ($checksPermisosId as $key => $menu_id) {
                    $query_insert_permisos = "INSERT INTO permisos_menus (permiso_menu_id, permiso_profile_id, permiso_status) VALUES ('$menu_id','$perfil','$estado')";
                    $result_insert = insertar($query_insert_permisos);
                }
            }
        } else {
            foreach ($checksPermisosId as $key => $menu_id) {
                $query_insert_permisos = "INSERT INTO permisos_menus (permiso_menu_id, permiso_profile_id, permiso_status) VALUES ('$menu_id','$perfil','$estado')";
                $result_insert = insertar($query_insert_permisos);
            }
        }

        return $result_insert;
    }
}
