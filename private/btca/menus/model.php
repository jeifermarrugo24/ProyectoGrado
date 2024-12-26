<?php
class ModelMenus
{
    public static function menus_list($parent_id)
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
}
