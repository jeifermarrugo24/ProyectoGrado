<?php

class ModelMenu {}

class HelperMenu
{

    public static function getMenu($id = 2, $profile = 1, $tipo = 0)
    {
        $html = "";
        $query = "SELECT * FROM menus WHERE menu_parentid = '$id' AND menu_estado = 'A' ORDER BY menu_orden ASC, menu_parentid ASC";

        $res_consulta = consultar($query);

        if (is_array($res_consulta) && count($res_consulta) > 0) {
            foreach ($res_consulta as $key => $value) {

                $menu_id = $value['menu_id'];
                $menu_title = $value['menu_title'];
                $menu_estado = $value['menu_estado'];
                $menu_icono = $value['menu_icono'];
                $menu_parentid = $value['menu_parentid'];
                $menu_orden = $value['menu_orden'];
                $menu_url = $value['menu_url'];
                $menu_action = $value['menu_action'];

                $child_menu = self::getMenu($menu_id, $profile, $tipo);

                $query_permisos = "SELECT * FROM permisos_menus WHERE permiso_status = 'A' AND 	permiso_menu_id = '$menu_id' AND permiso_profile_id = '$profile'";
                $permisos = consultar($query_permisos);

                if (strlen(trim($menu_action)) < 1 && strlen(trim($menu_url)) > 0) {
                    $apertura_cabecera_enlace = "<a class='nav-link' href='$menu_url' target=''>";
                    $cerrar_cabecera_enlace = "</a>";
                } else {
                    $apertura_cabecera_enlace = "<a class='traer-contenido submenus' contenido='$menu_action' style='cursor:pointer;'>";
                    $cerrar_cabecera_enlace = "</a>";
                }

                if (is_array($permisos) && count($permisos) > 0) {
                    if (!empty($child_menu)) {
                        $html .= <<<HTML
                    <li class="nav-item">
                        <a href="#" class="nav-link" >
                            $menu_icono
                            <p>
                                $menu_title
                                <i class="right fas fa-angle-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview pl-4">
                            $child_menu
                        </ul>
                    </li>
                    HTML;
                    } else {
                        $html .= <<<HTML
                            <li class="nav-item">
                                $apertura_cabecera_enlace
                                $menu_icono
                                <p>
                                    $menu_title
                                </p>
                                $cerrar_cabecera_enlace
                            </li>
                        HTML;
                    }
                }
            }
        }

        return $html;
    }
}
