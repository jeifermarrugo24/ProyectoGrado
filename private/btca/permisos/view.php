<?php
include_once 'model.php';

class viewPermisos
{
    public static function permisos_usuario()
    {
        $menus = ModelMenus::menus_list2(0);
        $acordeon_item = '';

        $perfiles = ModelPerfiles::perfilesList();
        $obtion_perfiles = '';
        if (is_array($perfiles) && count($perfiles) > 0) {
            foreach ($perfiles as $key => $perfil) {
                $perfil_id = $perfil['perfil_id'];
                $perfil_nombre = $perfil['perfil_nombre'];
                $obtion_perfiles .= <<<HTML
                    <option value="$perfil_id">$perfil_nombre</option>
                HTML;
            }
        }

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
                            <div id="flush-collapseSubmenu_$submenu_id" class="accordion-collapse collapse">
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
                        <div id="flush-collapse_$menu_id" class="accordion-collapse collapse">
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
                    <h1 class="pr-3 text-left"><b style="font-size:20px; text-transform:uppercase;">Permisos De Usuario</b></h1>
    
                    <div class="col-12 col-lg-6 p-3 m-auto">
                        <div class="card">
                            <div class="card-body" style="padding-top:0;">
                                <div class="row no-gutters">
                                    <div class="col-lg-12">
                                        <div class="row no-gutters" id="contenedor-formulario">
                                            <div class="col-lg-12 px-2 pt-2 pb-2">
                                                <h2><b style="font-size:17px;">MENUS</b></h2>
                                                <hr>
                                                <div class="col-lg-12 col-12 mb-3 px-2">
                                                    <select name="perfil" id="perfil">
                                                        <option value="">Seleccionar</option>
                                                        $obtion_perfiles
                                                    </select>
                                                </div>
                                                <div class="mr-2">
                                                    <div class="form-check form-switch d-flex justify-content-end">
                                                        <div style="margin-right: 50px;">
                                                            <label for="">Seleccionar Todos</label>
                                                        </div>
                                                        <div>
                                                            <input class="form-check-input select_all" type="checkbox" role="switch">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

    
                                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                            <div class="">
                                
                                            </div>
                                                $acordeon_item
                                            </div>

                                            <div class="col-lg-12 col-12 px-2 pt-2">
                                                <button type="submit" class="login-btn" id="asignar_permisos">ASIGNAR PERMISOS</button>
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
