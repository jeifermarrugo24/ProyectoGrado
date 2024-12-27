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
                } else if (strlen(trim($menu_action)) != '') {
                    $apertura_cabecera_enlace = "<a class='traer-contenido submenus' contenido='$menu_action' style='cursor:pointer;'>";
                    $cerrar_cabecera_enlace = "</a>";
                }

                if (is_array($permisos) && count($permisos) > 0) {
                    if (!empty($child_menu) || $menu_icono != '') {
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

        function renderSubmenus($parentId, $parentAccordionId)
        {
            $submenus = ModelMenus::menus_list($parentId);
            $sub_acordeon_item = '';

            if (is_array($submenus) && count($submenus) > 0) {
                foreach ($submenus as $submenu) {
                    $submenu_id = $submenu['menu_id'];
                    $submenu_title = $submenu['menu_title'];
                    $submenu_icono = $submenu['menu_icono'];

                    // Crear un identificador único para cada submenú
                    $submenu_accordion_id = "{$parentAccordionId}_submenu_$submenu_id";
                    $sub_submenus = renderSubmenus($submenu_id, $submenu_accordion_id);

                    if ($sub_submenus) {
                        $sub_acordeon_item .= <<<HTML
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSubmenu_$submenu_id" aria-expanded="false" aria-controls="flush-collapseSubmenu_$submenu_id">
                                    <div class="d-flex mx-2">
                                        <div class="mr-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="check_$submenu_id">
                                            </div>
                                        </div>
                                        <div class="mr-2">
                                            $submenu_icono
                                        </div>
                                        <div> 
                                            $submenu_title
                                        </div>
                                    </div>
                                </button>
                            </h2>
                            <div id="flush-collapseSubmenu_$submenu_id" class="accordion-collapse collapse" data-bs-parent="#$submenu_accordion_id">
                                <div class="accordion-body">
                                    <div class="accordion" id="accordionFlushExample_$submenu_id">
                                        $sub_submenus
                                    </div>
                                </div>
                            </div>
                        </div>
                        HTML;
                    } else {
                        $sub_acordeon_item .= <<<HTML
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse_$submenu_id" aria-expanded="false" aria-controls="flush-collapse_$submenu_id">
                                    <div class="d-flex mx-2">
                                        <div class="mr-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="check_$submenu_id">
                                            </div>
                                        </div>
                                        <div class="mr-2">
                                            $submenu_icono
                                        </div>
                                        <div> 
                                            $submenu_title
                                        </div>
                                    </div>
                                </button>
                            </h2>
                        </div>
                        HTML;
                    }
                }
            }

            return $sub_acordeon_item;
        }

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

                // Crear un identificador único para el acordeón principal
                $accordion_id = "accordionFlushExample_$menu_id";
                $sub_acordeon_item = renderSubmenus($menu_id, $accordion_id);

                if ($sub_acordeon_item) {
                    $acordeon_item .= <<<HTML
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse_$menu_id" aria-expanded="false" aria-controls="flush-collapse_$menu_id">
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
                        <div id="flush-collapse_$menu_id" class="accordion-collapse collapse" data-bs-parent="#$accordion_id">
                            <div class="accordion-body">
                                <div class="accordion" id="$accordion_id">
                                    $sub_acordeon_item
                                </div>
                            </div>
                        </div>
                    </div>
                    HTML;
                } else {
                    $acordeon_item .= <<<HTML
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse_$menu_id" aria-expanded="false" aria-controls="flush-collapse_$menu_id">
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
                    </div>
                    HTML;
                }
            }
        }

        // Código HTML principal
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
                                            <div class="col-lg-12 px-2 pt-2 pb-2">
                                                <h2><b style="font-size:17px;">MENUS</b></h2>
                                                <hr>
                                                <div class="d-flex justify-content-end">
                                                    <button type="button" id="btn-nuevo-menu" class="btn btn-dark mb-2 mr-2" style="font-size:12px;" disabled>Nuevo Menu</button>
                                                    <button type="button" id="btn-editar-menu" class="btn btn-primary mb-2" style="font-size:12px;" disabled>Editar Menu</button>
                                                </div>
                                            </div>
    
                                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                            <div class="">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button style="background-color:#343a40; color:white;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse_0" aria-expanded="false" aria-controls="flush-collapse_0">
                                                        <div class="d-flex mx-2">
                                                            <div class="mr-2">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox" role="switch" id="check_0">
                                                                </div>
                                                            </div>
                                                            <div class="mr-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                                                                </svg>
                                                            </div>
                                                            <div> 
                                                                Menu Principal
                                                            </div>
                                                        </div>
                                                    </button>
                                                </h2>
                                            </div>
                                            </div>
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

    public static function modal_acciones_menu($data, $accion)
    {
        $id_menu = $data['id_menu'];
        $menus_info = ModelMenus::menus_by_id($id_menu);
        if ($accion == 'editar') {
            $menu_id = $menus_info['menu_id'];
            $menu_title = $menus_info['menu_title'];
            $menu_estado = $menus_info['menu_estado'];
            $menu_icono = trim($menus_info['menu_icono']);
            $menu_parentid = $menus_info['menu_parentid'];
            $menu_orden = $menus_info['menu_orden'];
            $menu_url = trim($menus_info['menu_url']);
            $menu_action = trim($menus_info['menu_action']);

            $selected_estado_1 = ($menu_estado == 'A') ? 'selected' : '';
            $selected_estado_0 = ($menu_estado == 'I') ? 'selected' : '';

            $menu_title_f = '- ' . $menu_title;
            $text_accion = 'EDITAR MENU';
        } else {
            if ($menus_info['menu_id'] == '') {
                $menus_info['menu_id'] = 0;
            }
            $menu_parentid = $menus_info['menu_id'];
            $text_accion = 'INGRESAR MENU';
        }

        $padre = ModelMenus::menus_by_id($menu_parentid);
        $menu_title_padre = $padre['menu_title'];
        if ($menu_parentid == '0') {
            $menu_title_padre = 'Menu Principal';
        }

        $html = <<<HTML
        <div class="flex-grow-1">
            <div class="row no-gutters justify-content-center">
                <div class="pt-4 col-lg-12">
                    <h1 class="pr-3 text-left"><b style="font-size:20px; text-transform:uppercase;">EDITAR MENU</b></h1>

                    <div class="col-12 col-lg-12 m-auto">
                        <div class="card">
                            <div class="card-body" style="padding-top:0;">
                                <div class="row no-gutters">
                                    <div class="col-lg-12">
                                        <div class="row no-gutters" id="contenedor-formulario-edit">
                                            <div class="col-lg-12 px-2 pt-2">
                                                <h2><b style="font-size:17px;">DATOS DEL MENU $menu_title_f</b></h2>
                                                <hr>
                                            </div>
                                            <div class="col-12 p-3">
                                                <div class="row no-gutters">

                                                    <input type="hidden" id="id_menu" value = "$menu_id">

                                                    <div class="col-lg-6 col-12 mb-3 px-2">
                                                        <label for="title" class="label-input">Titulo: </label>
                                                        <input type="text" placeholder="Ingrese Titulo" name="title" id="title" value="$menu_title"/>
                                                    </div>
                                                    
                                                    <div class="col-lg-6 col-12 mb-3 px-2">
                                                        <label for="parentid" class="label-input">Padre: </label>
                                                        <input type="text" placeholder="Ingrese padre" name="parentid" id="parentid" value="$menu_parentid - $menu_title_padre" disabled/>
                                                    </div>

                                                    <div class="col-lg-6 col-12 mb-3 px-2">
                                                        <label for="orden" class="label-input">Orden: </label>
                                                        <input type="number" placeholder="Ingrese Orden" name="orden" id="orden" value="$menu_orden"/>
                                                    </div>
                                                    
                                                    <div class="col-lg-6 col-12 mb-3 px-2">
                                                        <label for="action" class="label-input">Action: </label>
                                                        <input type="text" placeholder="Ingrese accion" name="action" id="action" value=" $menu_action "/>
                                                    </div>

                                                    <div class="col-lg-12 col-12 mb-3 px-2">
                                                        <label for="icono" class="label-input">Svg Icono (nav-link):</label>
                                                        <textarea id="icono" name="icono" placeholder="Ingrese Svg Icono">$menu_icono</textarea>
                                                    </div>

                                                    <div class="col-lg-12 col-12 mb-3 px-2">
                                                        <label for="url" class="label-input">Url: </label>
                                                        <input type="url" placeholder="Ingrese url" name="url" id="url" value="$menu_url"/>
                                                    </div>
                                                    

                                                    <div class="col-lg-6 col-12 mb-3 px-2">
                                                        <label for="estado" class="label-input">Estado: </label>
                                                        <select name="estado" id="estado">
                                                            <option value="">Seleccionar</option>
                                                            <option value="A" $selected_estado_1>Activo</option>
                                                            <option value="I" $selected_estado_0>Inactivo</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-lg-12 col-12 px-2">
                                                        <button type="submit" class="login-btn" action_realizar="$accion" id="enviar_accion_menu">$text_accion</button>
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
            </div>
        </div>
    HTML;

        return $html;
    }
}
