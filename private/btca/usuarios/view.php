<?php

include_once 'model.php';

class ViewUsuarios
{
    public static function ingresarUsuarios()
    {

        $obtener_perfiles = ModelUsuarios::list_perfiles();

        $obtion_perfiles = '';
        foreach ($obtener_perfiles as $key => $value) {
            $perfil_id = $value['perfil_id'];
            $perfil_nombre = $value['perfil_nombre'];
            $obtion_perfiles .= <<<HTML
                <option value="$perfil_id">$perfil_nombre</option>
            HTML;
        }

        $html = <<<HTML
            <div class="flex-grow-1 px-4">
                <div class="row no-gutters justify-content-center">
                    <div class="pt-4 px-3 col-lg-12">
                        <h1 class="pr-3 text-left"><b style="font-size:20px; text-transform:uppercase;">Registrar usuarios</b></h1>

                        <div class="col-12 col-lg-7 p-3 m-auto">
                            <div class="card">
                                <div class="card-body" style="padding-top:0;">
                                    <div class="row no-gutters">
                                        <div class="col-lg-12">
                                            <form class="row no-gutters" id="contenedor-formulario" method="POST" enctype="multipart/form-data">
                                                <div class="col-lg-12 px-2 pt-2">
                                                    <h2><b style="font-size:17px;">DATOS DEL USUARIO</b></h2>
                                                    <hr>
                                                </div>
                                                <div class="col-12 p-3">
                                                    <div class="row no-gutters">
                                                        <div class="col-lg-6 col-12 mb-3 px-2">
                                                            <label for="nombre" class="label-input">Nombre: </label>
                                                            <input type="text" placeholder="Ingrese Nombre" name="nombre" id="nombre" />
                                                        </div>
                                                        
                                                        <div class="col-lg-6 col-12 mb-3 px-2">
                                                            <label for="apellido" class="label-input">Apellido: </label>
                                                            <input type="text" placeholder="Ingrese Apellido" name="apellido" id="apellido" />
                                                        </div>

                                                        <div class="col-lg-12 col-12 mb-3 px-2">
                                                            <label for="usuario" class="label-input">Usuario Ingreso: </label>
                                                            <input type="text" placeholder="Ingrese Usuario" name="usuario" id="usuario" />
                                                        </div>

                                                        <div class="col-lg-12 col-12 mb-3 px-2">
                                                            <label for="password" class="label-input">Contrase&ntilde;a: </label>
                                                            <input type="password" placeholder="Ingrese Contrase&ntilde;a" id="password" name="password" />
                                                        </div>

                                                        <div class="col-lg-6 col-12 mb-3 px-2">
                                                            <label for="Perfil" class="label-input">Perfil: </label>
                                                            <select name="perfil" id="perfil">
                                                                <option value="">Seleccionar</option>
                                                                $obtion_perfiles
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-6 col-12 mb-3 px-2">
                                                            <label for="estado" class="label-input">Estado: </label>
                                                            <select name="estado" id="estado">
                                                                <option value="">Seleccionar</option>
                                                                <option value="1">Activo</option>
                                                                <option value="0">Inactivo</option>
                                                            </select>
                                                        </div>

                                                        <label for="imagen" class="label-input">Imagen Perfil: </label>
                                                        <div class="wrap col-lg-12" style="justify-items: center;">
                                                            <div class="thumb">
                                                                <img id="img" src="https://png.pngtree.com/png-clipart/20230915/original/pngtree-plus-sign-symbol-simple-design-pharmacy-logo-black-vector-png-image_12186664.png"/>
                                                                <button id="remove-img" style="position: absolute; top: 5px; right: 5px; background: red; color: white; border: none; border-radius: 50%; width: 25px; height: 25px; display: none; cursor: pointer;">X</button>
                                                            </div>
                                                            <label for="upload">SUBIR IMAGEN
                                                            <input type='file' id="upload"></label>
                                                        </div>

                                                        <div class="col-lg-12 col-12 px-2 pt-2">
                                                            <button type="submit" class="login-btn" id="ingresar_usuario">REGISTRAR</button>
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

    public static function consultarUsuarios()
    {


        $list_usuarios = ModelUsuarios::list_usuarios();
        $tbody = '';
        if (is_array($list_usuarios) && count($list_usuarios) > 0) {
            foreach ($list_usuarios as $key => $value) {

                $id = $value['id'];
                $usuario = $value['usuario'];
                $nombre = $value['nombre'];
                $perfil = $value['perfil'];
                if ($perfil == '1') {
                    $perfil_nombre = <<<HTML
                        <span class="badge text-bg-primary" style="padding:6px;">Superadministrador</span>
                    HTML;
                } else {
                    $perfil_usuario = ModelUsuarios::list_perfiles($perfil);
                    $perfil_nombre = $perfil_usuario[0]['perfil_nombre'];
                }
                $estado = $value['estado'];
                if ($estado == '1') {
                    $estado = 'Activo';
                } else {
                    $estado = 'Inactivo';
                }

                $tbody .= <<<HTML
                    <tr>
                        <td class="text-center p-2">$id</td>
                        <td class="text-center">$nombre</td>
                        <td class="text-center">$usuario</td>
                        <td class="text-center">$perfil_nombre</td>
                        <td class="text-center">$estado</td>
                    </tr>
                HTML;
            }
        }

        $html = <<<HTML
            <div class="flex-grow-1 px-4">
                <div class="row no-gutters justify-content-center">
                    <div class="pt-4 px-3 col-lg-12">
                        <h1 class="pr-3 text-left"><b style="font-size:20px; text-transform:uppercase;">Listado De Usuarios</b></h1>

                        <div class="col-12 col-lg-10 p-3 m-auto">
                            <div class="card">
                                <div class="card-body" style="padding-top:0;">
                                    <div class="row no-gutters">
                                        <div class="col-lg-12">
                                            <form class="row no-gutters" id="contenedor-formulario" method="POST" enctype="multipart/form-data">
                                                <div class="col-lg-12 px-2 pt-2">
                                                    <h2><b style="font-size:17px;">DATOS DE LOS USUARIOS REGISTRADOS</b></h2>
                                                    <hr>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row no-gutters">
                                                        <div class="table-responsive">
                                                            <table id="DataPage" class="display table-striped my-2" style="width:100%; border: 1px solid #F2F2F2;">
                                                                <thead class="mt-4">
                                                                    <tr>
                                                                        <th class="text-center p-1">ID</th>
                                                                        <th class="text-center p-1">NOMBRE</th>
                                                                        <th class="text-center p-1">USUARIO</th>
                                                                        <th class="text-center p-1">PERFIL</th>
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
}
