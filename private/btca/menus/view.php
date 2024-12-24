<?php
include_once 'model.php';

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
                                <i class="right fas fa-angle-right mr-2"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="margin-top: 10px; margin-left: 10px;">
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

class viewMenu
{

    public static function ingresarNuevoMenu()
    {

        $menus = ModelMenus::menus_list(0);
        $acordeon_item = '';

        if (is_array($menus) && count($menus) > 0) {
            foreach ($menus as $key => $value) {
                $menu_id = $value['menu_id'];
                $menu_title = $value['menu_title'];
                $menu_estado = $value['menu_estado'];
                $menu_icono = $value['menu_icono'];
                $menu_parentid = $value['menu_parentid'];
                $menu_orden = $value['menu_orden'];
                $menu_url = $value['menu_url'];
                $menu_action = $value['menu_action'];

                $acordeon_item .= <<<HTML
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse_$menu_id" data-bs-target="#flush-collapseOne_$menu_id" aria-expanded="false" aria-controls="flush-collapseOne_$menu_id">
                            <div class="d-flex mx-2">
                                <div class="mr-2">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="check_$menu_id">
                                    </div>
                                </div>
                                <div class="mr-2">
                                    $menu_icono 
                                </div>
                                <div> 
                                    $menu_title
                                </div>
                            </div>
                        </button>
                        </h2>
                        <div id="flush-collapseOne_$menu_id" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample_$menu_id">
                        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                        </div>
                    </div>
                HTML;
            }
        }

        $html = <<<HTML
            <div class="flex-grow-1 px-4">
                <div class="row no-gutters justify-content-center">
                    <div class="pt-4 px-3 col-lg-12">
                        <h1 class="pr-3 text-left"><b style="font-size:20px; text-transform:uppercase;">Listado Y Registro De Menus</b></h1>

                        <div class="col-12 col-lg-6 p-3 m-auto">
                            <div class="card">
                                <div class="card-body" style="padding-top:0;">
                                    <div class="row no-gutters">
                                        <div class="col-lg-12">
                                            <div class="row no-gutters" id="contenedor-formulario">
                                                <div class="col-lg-12 px-2 pt-2">
                                                    <h2><b style="font-size:17px;">MENUS</b></h2>
                                                    <hr>
                                                </div>

                                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                                    $acordeon_item
                                                </div>

                                            </div>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        HTML;

        return $html;
    }
}
