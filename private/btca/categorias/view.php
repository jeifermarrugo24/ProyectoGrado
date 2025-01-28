<?php

class viewCategorias
{
    public static function ingresarCategoria()
    {
        $html = <<<HTML
            <div class="flex-grow-1 px-4">
                <div class="row no-gutters justify-content-center">
                    <div class="pt-4 px-3 col-lg-12">
                        <h1 class="pr-3 text-left"><b style="font-size:20px; text-transform:uppercase;">Registrar Categoria</b></h1>

                        <div class="col-12 col-lg-7 p-3 m-auto">
                            <div class="card">
                                <div class="card-body" style="padding-top:0;">
                                    <div class="row no-gutters">
                                        <div class="col-lg-12">
                                            <div class="row no-gutters" id="contenedor-formulario">
                                                <div class="col-lg-12 px-2 pt-2">
                                                    <h2><b style="font-size:17px;">DATOS CATEGORIA</b></h2>
                                                    <hr>
                                                </div>
                                                <div class="col-12 p-3">
                                                    <div class="row no-gutters">
                                                        <div class="col-lg-6 col-12 mb-3 px-2">
                                                            <label for="nombre" class="label-input">Nombre Categoria: </label>
                                                            <input type="text" placeholder="Ingrese Nombre" name="nombre_categoria" id="nombre_categoria" />
                                                        </div>

                                                        <div class="col-lg-6 col-12 mb-3 px-2">
                                                            <label for="estado" class="label-input">Estado: </label>
                                                            <select name="categoria_estado" id="categoria_estado">
                                                                <option value="">Seleccionar</option>
                                                                <option value="A">Activo</option>
                                                                <option value="I">Inactivo</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-12 col-12 px-2 pt-2">
                                                            <button type="submit" class="login-btn" id="ingresar_categoria">REGISTRAR</button>
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

    public static function consultarCategoria()
    {
        $list_categorias = ModelCategorias::categoriasList();
        $tbody = '';
        if (is_array($list_categorias) && count($list_categorias) > 0) {
            foreach ($list_categorias as $key => $value) {

                $id = $value['id'];
                $materia = $value['materia'];
                $estado = $value['estado'];
                if ($estado == 'A') {
                    $estado_categoria = 'Activo';
                } else {
                    $estado_categoria = 'Inactivo';
                }

                $tbody .= <<<HTML
                    <tr>
                        <td class="text-center">
                        <a href="javascript:void(0)" onclick="ModalEditar('$id', 'modal_editar_categoria')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="svg-color bi bi-arrows-fullscreen" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M5.828 10.172a.5.5 0 0 0-.707 0l-4.096 4.096V11.5a.5.5 0 0 0-1 0v3.975a.5.5 0 0 0 .5.5H4.5a.5.5 0 0 0 0-1H1.732l4.096-4.096a.5.5 0 0 0 0-.707m4.344 0a.5.5 0 0 1 .707 0l4.096 4.096V11.5a.5.5 0 1 1 1 0v3.975a.5.5 0 0 1-.5.5H11.5a.5.5 0 0 1 0-1h2.768l-4.096-4.096a.5.5 0 0 1 0-.707m0-4.344a.5.5 0 0 0 .707 0l4.096-4.096V4.5a.5.5 0 1 0 1 0V.525a.5.5 0 0 0-.5-.5H11.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707m-4.344 0a.5.5 0 0 1-.707 0L1.025 1.732V4.5a.5.5 0 0 1-1 0V.525a.5.5 0 0 1 .5-.5H4.5a.5.5 0 0 1 0 1H1.732l4.096 4.096a.5.5 0 0 1 0 .707"/>
                            </svg>
                        </a>
                        </td>
                        <td class="text-center p-2">$id</td>
                        <td class="text-center">$materia</td>
                        <td class="text-center">$estado_categoria</td>
                    </tr>
                HTML;
            }
        }

        $html = <<<HTML
            <div class="flex-grow-1 px-4">
                <div class="row no-gutters justify-content-center">
                    <div class="pt-4 px-3 col-lg-12">
                        <h1 class="pr-3 text-left"><b style="font-size:20px; text-transform:uppercase;">Listado De Categorias</b></h1>

                        <div class="col-12 col-lg-10 p-3 m-auto">
                            <div class="card">
                                <div class="card-body" style="padding-top:0;">
                                    <div class="row no-gutters">
                                        <div class="col-lg-12">
                                            <form class="row no-gutters" id="contenedor-formulario" method="POST" enctype="multipart/form-data">
                                                <div class="col-lg-12 px-2 pt-2">
                                                    <h2><b style="font-size:17px;">DATOS DE LAS CATEGORIAS REGISTRADAS</b></h2>
                                                    <hr>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row no-gutters">
                                                        <div class="table-responsive">
                                                            <table id="DataPage" class="display table-striped my-2" style="width:100%; border: 1px solid #F2F2F2;">
                                                                <thead class="mt-4">
                                                                    <tr>
                                                                        <th class="text-center p-1">EDITAR</th>
                                                                        <th class="text-center p-1">ID CATEGORIA</th>
                                                                        <th class="text-center p-1">NOMBRE CATEGORIA</th>
                                                                        <th class="text-center p-1">ESTADO CATEGORIA</th>
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

    public static function modalEditarCategoria($data)
    {

        $id_categoria = $data['id'];
        $categoria = ModelCategorias::especific_categoria($id_categoria);

        $id = $categoria['id'];
        $materia = $categoria['materia'];
        $estado = $categoria['estado'];

        $selected_estado_1 = ($estado == 'A') ? 'selected' : '';
        $selected_estado_0 = ($estado == 'I') ? 'selected' : '';

        $html = <<<HTML
        <div class="flex-grow-1">
            <div class="row no-gutters justify-content-center">
                <div class="pt-4 col-lg-12">
                    <h1 class="pr-3 text-left"><b style="font-size:20px; text-transform:uppercase;">EDITAR CATEGORIA</b></h1>

                    <div class="col-12 col-lg-12 m-auto">
                        <div class="card">
                            <div class="card-body" style="padding-top:0;">
                                <div class="row no-gutters">
                                    <div class="col-lg-12">
                                        <div class="row no-gutters" id="contenedor-formulario-edit">
                                            <div class="col-lg-12 px-2 pt-2">
                                                <h2><b style="font-size:17px;">DATOS DE LA CATEGORIA - $materia</b></h2>
                                                <hr>
                                            </div>
                                            <div class="col-12 p-3">
                                                <div class="row no-gutters">

                                                    <input type="hidden" id="categoria_id" value = "$id">

                                                    <div class="col-lg-6 col-12 mb-3 px-2">
                                                        <label for="nombre_perfil" class="label-input">Nombre Categoria: </label>
                                                        <input type="text" placeholder="Ingrese Nombre" name="nombre_perfil" id="nombre_perfil" value="$materia"/>
                                                    </div>

                                                    <div class="col-lg-6 col-12 mb-3 px-2">
                                                        <label for="estado_perfil" class="label-input">Estado Categoria: </label>
                                                        <select name="estado_perfil" id="estado_perfil">
                                                            <option value="">Seleccionar</option>
                                                            <option value="A" $selected_estado_1>Activo</option>
                                                            <option value="I" $selected_estado_0>Inactivo</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-lg-12 col-12 px-2">
                                                        <button type="submit" class="login-btn" id="editar_categoria">EDITAR CATEGORIA</button>
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
