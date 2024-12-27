<?php
class ModelMenus
{
    public static function menus_list($parent_id)
    {

        $condition = '';
        if ($parent_id == 0 || $parent_id != '') {
            $condition .= "AND menu_parentid = '$parent_id'";
        }

        $query = "SELECT * FROM menus WHERE 1 = 1 AND menu_estado = 'A' $condition AND menu_id != '1' ORDER BY menu_orden ASC, menu_parentid ASC, menu_title ASC";

        $result = consultar($query);

        return $result;
    }

    public static function menus_list2($parent_id)
    {

        $condition = '';
        if ($parent_id == 0 || $parent_id != '') {
            $condition .= "AND menu_parentid = '$parent_id'";
        }

        $query = "SELECT * FROM menus WHERE 1 = 1 AND menu_estado = 'A' $condition ORDER BY menu_orden ASC, menu_parentid ASC, menu_title ASC";

        $result = consultar($query);

        return $result;
    }

    public static function menus_by_id($id_menu)
    {
        $condition = '';
        if ($id_menu == 0 || $id_menu != '') {
            $condition .= "AND menu_id = '$id_menu'";

            $query = "SELECT * FROM menus WHERE 1 = 1 AND menu_estado = 'A' $condition ORDER BY menu_orden ASC, menu_parentid ASC, menu_title ASC";

            $result = consultar($query);

            return $result[0];
        }
    }

    public static function IngresarNuevoMenu($data)
    {
        $title = $data['title'];
        $orden = $data['orden'];
        $parentid = $data['parentid'];
        $padre = explode(' - ', $parentid)[0];
        $icono = $data['icono'];
        $url = $data['url'];
        $estado = $data['estado'];
        $action_menu = $data['action_menu'];

        $sqlquery = "INSERT INTO menus (menu_title, menu_estado, menu_icono, menu_parentid, menu_orden, menu_url, menu_action) VALUES ('$title', '$estado', '$icono', '$padre', '$orden', '$url', '$action_menu')";

        $res = insertar($sqlquery);

        return $res;
    }

    public static function EditarMenuSeleccionado($data)
    {
        $id_menu = $data['id_menu'];
        $title = $data['title'];
        $orden = $data['orden'];
        $parentid = $data['parentid'];
        $padre = explode(' - ', $parentid)[0];
        $icono = $data['icono'];
        $url = $data['url'];
        $estado = $data['estado'];
        $action_menu = trim($data['action_menu']);

        $sqlquery = "UPDATE menus SET menu_title = '$title', menu_estado = '$estado', menu_icono = '$icono', menu_parentid = '$padre', menu_orden = '$orden', menu_url = '$url', menu_action = '$action_menu' WHERE menu_id = '$id_menu'";

        $res = actualizar($sqlquery);

        return $res;
    }
}
