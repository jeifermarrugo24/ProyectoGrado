<?php
include_once 'model.php';

class viewPerfiles
{
    public static function ingresarPerfiles()
    {
        $html = <<<HTML
            <div class="flex-grow-1 px-4">
                <div class="row no-gutters justify-content-center">
                    <div class="pt-4 px-3 col-lg-12">
                        <h1 class="pr-3 text-left"><b style="font-size:20px; text-transform:uppercase;">Registrar Perfiles</b></h1>

                        <div class="col-12 col-lg-7 p-3 m-auto">
                            <div class="card">
                                <div class="card-body" style="padding-top:0;">
                                    <div class="row no-gutters">
                                        <div class="col-lg-12">
                                            <div class="row no-gutters" id="contenedor-formulario">
                                                <div class="col-lg-12 px-2 pt-2">
                                                    <h2><b style="font-size:17px;">DATOS DEL PERFIL</b></h2>
                                                    <hr>
                                                </div>
                                                <div class="col-12 p-3">
                                                    <div class="row no-gutters">
                                                        <div class="col-lg-6 col-12 mb-3 px-2">
                                                            <label for="nombre_perfil" class="label-input">Nombre: </label>
                                                            <input type="text" placeholder="Ingrese Nombre" name="nombre_perfil" id="nombre_perfil" />
                                                        </div>

                                                        <div class="col-lg-6 col-12 mb-3 px-2">
                                                            <label for="estado_perfil" class="label-input">Estado: </label>
                                                            <select name="estado_perfil" id="estado_perfil">
                                                                <option value="">Seleccionar</option>
                                                                <option value="A">Activo</option>
                                                                <option value="I">Inactivo</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-12 col-12 px-2 pt-2">
                                                            <button type="submit" class="login-btn" id="ingresar_perfil">REGISTRAR</button>
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

    public static function consultarPerfiles()
    {

        $list_perfiles = ModelPerfiles::perfilesList();
        $tbody = '';
        if (is_array($list_perfiles) && count($list_perfiles) > 0) {
            foreach ($list_perfiles as $key => $value) {

                $perfil_id = $value['perfil_id'];
                $perfil_nombre = $value['perfil_nombre'];
                $perfil_estado = $value['perfil_estado'];
                if ($perfil_estado == 'A') {
                    $perfil_estado = 'Activo';
                } else {
                    $perfil_estado = 'Inactivo';
                }

                if ($perfil_id != '1') {
                    $text_editar = <<<HTML
                        <a href="javascript:void(0)" onclick="ModalEditar('$perfil_id', 'modal_editar_perfil')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="svg-color bi bi-arrows-fullscreen" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M5.828 10.172a.5.5 0 0 0-.707 0l-4.096 4.096V11.5a.5.5 0 0 0-1 0v3.975a.5.5 0 0 0 .5.5H4.5a.5.5 0 0 0 0-1H1.732l4.096-4.096a.5.5 0 0 0 0-.707m4.344 0a.5.5 0 0 1 .707 0l4.096 4.096V11.5a.5.5 0 1 1 1 0v3.975a.5.5 0 0 1-.5.5H11.5a.5.5 0 0 1 0-1h2.768l-4.096-4.096a.5.5 0 0 1 0-.707m0-4.344a.5.5 0 0 0 .707 0l4.096-4.096V4.5a.5.5 0 1 0 1 0V.525a.5.5 0 0 0-.5-.5H11.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707m-4.344 0a.5.5 0 0 1-.707 0L1.025 1.732V4.5a.5.5 0 0 1-1 0V.525a.5.5 0 0 1 .5-.5H4.5a.5.5 0 0 1 0 1H1.732l4.096 4.096a.5.5 0 0 1 0 .707"/>
                            </svg>
                        </a>
                    HTML;
                } else {
                    $text_editar = '-';
                }

                $tbody .= <<<HTML
                    <tr>
                        <td class="text-center">
                        $text_editar
                        </td>
                        <td class="text-center p-2">$perfil_id</td>
                        <td class="text-center">$perfil_nombre</td>
                        <td class="text-center">$perfil_estado</td>
                    </tr>
                HTML;
            }
        }

        $html = <<<HTML
            <div class="flex-grow-1 px-4">
                <div class="row no-gutters justify-content-center">
                    <div class="pt-4 px-3 col-lg-12">
                        <h1 class="pr-3 text-left"><b style="font-size:20px; text-transform:uppercase;">Listado De Perfiles</b></h1>

                        <div class="col-12 col-lg-10 p-3 m-auto">
                            <div class="card">
                                <div class="card-body" style="padding-top:0;">
                                    <div class="row no-gutters">
                                        <div class="col-lg-12">
                                            <form class="row no-gutters" id="contenedor-formulario" method="POST" enctype="multipart/form-data">
                                                <div class="col-lg-12 px-2 pt-2">
                                                    <h2><b style="font-size:17px;">DATOS DE LOS PERFILES REGISTRADOS</b></h2>
                                                    <hr>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row no-gutters">
                                                        <div class="table-responsive">
                                                            <table id="DataPage" class="display table-striped my-2" style="width:100%; border: 1px solid #F2F2F2;">
                                                                <thead class="mt-4">
                                                                    <tr>
                                                                        <th class="text-center p-1">EDITAR</th>
                                                                        <th class="text-center p-1">ID</th>
                                                                        <th class="text-center p-1">NOMBRE</th>
                                                                        <th class="text-center p-1">ESTADO</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    $tbody
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                    </div>
                                                </div>
                                            </form>
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

    public static function modalEditarPerfil($data)
    {

        $id_perfil = $data['id'];
        $perfil = ModelPerfiles::especific_perfil($id_perfil);

        $perfil_id = $perfil['perfil_id'];
        $perfil_nombre = $perfil['perfil_nombre'];
        $perfil_estado = $perfil['perfil_estado'];

        $selected_estado_1 = ($perfil_estado == 'A') ? 'selected' : '';
        $selected_estado_0 = ($perfil_estado == 'I') ? 'selected' : '';

        $html = <<<HTML
        <div class="flex-grow-1">
            <div class="row no-gutters justify-content-center">
                <div class="pt-4 col-lg-12">
                    <h1 class="pr-3 text-left"><b style="font-size:20px; text-transform:uppercase;">EDITAR PERFIL</b></h1>

                    <div class="col-12 col-lg-12 m-auto">
                        <div class="card">
                            <div class="card-body" style="padding-top:0;">
                                <div class="row no-gutters">
                                    <div class="col-lg-12">
                                        <div class="row no-gutters" id="contenedor-formulario-edit">
                                            <div class="col-lg-12 px-2 pt-2">
                                                <h2><b style="font-size:17px;">DATOS DEL PERFIL - $perfil_nombre</b></h2>
                                                <hr>
                                            </div>
                                            <div class="col-12 p-3">
                                                <div class="row no-gutters">

                                                    <input type="hidden" id="perfil_id" value = "$perfil_id">

                                                    <div class="col-lg-6 col-12 mb-3 px-2">
                                                        <label for="nombre_perfil" class="label-input">Nombre: </label>
                                                        <input type="text" placeholder="Ingrese Nombre" name="nombre_perfil" id="nombre_perfil" value="$perfil_nombre"/>
                                                    </div>

                                                    <div class="col-lg-6 col-12 mb-3 px-2">
                                                        <label for="estado_perfil" class="label-input">Estado: </label>
                                                        <select name="estado_perfil" id="estado_perfil">
                                                            <option value="">Seleccionar</option>
                                                            <option value="A" $selected_estado_1>Activo</option>
                                                            <option value="I" $selected_estado_0>Inactivo</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-lg-12 col-12 px-2">
                                                        <button type="submit" class="login-btn" id="editar_perfil">EDITAR PERFIL</button>
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
