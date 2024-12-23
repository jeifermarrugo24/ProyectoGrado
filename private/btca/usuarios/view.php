<?php

include_once 'model.php';

class ViewUsuarios
{
    public static function ingresarUsuarios()
    {

        $obtener_perfiles = ModelUsuarios::list_perfiles('');

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
                                            <div class="row no-gutters" id="contenedor-formulario">
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
                                                            <div style="margin-top:15px;">
                                                                <div class="progress mt-3">
                                                                    <div class="progress-bar" id="progressBar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                                <ul class="validationList">
                                                                    <li id="length">Minimo Caracteres: 8</li>
                                                                    <li id="upperCase">Mayuscula.</li>
                                                                    <li id="lowerCase">Minuscula.</li>
                                                                    <li id=number>Numero.</li>
                                                                    <li id="specialCharacter">Caracter Especial.</li>
                                                                </ul>
                                                            </div>
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
                    $editar_user = '-';
                } else {
                    $perfil_usuario = ModelUsuarios::list_perfiles($perfil);
                    $perfil_nombre = $perfil_usuario[0]['perfil_nombre'];
                    $editar_user = <<<HTML
                        <a href="javascript:void(0)" onclick="EditarUser('$id')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="svg-color bi bi-arrows-fullscreen" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M5.828 10.172a.5.5 0 0 0-.707 0l-4.096 4.096V11.5a.5.5 0 0 0-1 0v3.975a.5.5 0 0 0 .5.5H4.5a.5.5 0 0 0 0-1H1.732l4.096-4.096a.5.5 0 0 0 0-.707m4.344 0a.5.5 0 0 1 .707 0l4.096 4.096V11.5a.5.5 0 1 1 1 0v3.975a.5.5 0 0 1-.5.5H11.5a.5.5 0 0 1 0-1h2.768l-4.096-4.096a.5.5 0 0 1 0-.707m0-4.344a.5.5 0 0 0 .707 0l4.096-4.096V4.5a.5.5 0 1 0 1 0V.525a.5.5 0 0 0-.5-.5H11.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707m-4.344 0a.5.5 0 0 1-.707 0L1.025 1.732V4.5a.5.5 0 0 1-1 0V.525a.5.5 0 0 1 .5-.5H4.5a.5.5 0 0 1 0 1H1.732l4.096 4.096a.5.5 0 0 1 0 .707"/>
                            </svg>
                        </a>
                    HTML;
                }
                $estado = $value['estado'];
                if ($estado == '1') {
                    $estado = 'Activo';
                } else {
                    $estado = 'Inactivo';
                }

                $tbody .= <<<HTML
                    <tr>
                        <td class="text-center">
                            $editar_user
                        </td>
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
                                                                        <th class="text-center p-1">EDITAR</th>
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

    public static function editarUsuario($data)
    {

        $id_usuario = $data['id_usuario'];
        $usuario = ModelUsuarios::especific_user($id_usuario);

        $id = $usuario['id'];
        $usuario_ingreso = $usuario['usuario'];
        $nombre = $usuario['nombre'];
        $perfil = $usuario['perfil'];
        $img_perfil = $usuario['img_perfil'];
        if ($img_perfil != 'https://static.vecteezy.com/system/resources/previews/011/186/876/non_2x/male-profile-picture-symbol-vector.jpg') {
            $img_perfil = 'private/../../public/tools/images/images_perfiles/' . $img_perfil;
        }
        $estado = $usuario['estado'];
        $selected_estado_1 = ($estado == '1') ? 'selected' : '';
        $selected_estado_0 = ($estado == '0') ? 'selected' : '';


        $obtener_perfiles = ModelUsuarios::list_perfiles('');

        $obtion_perfiles = '';
        foreach ($obtener_perfiles as $key => $value) {
            $perfil_id = $value['perfil_id'];
            $perfil_nombre = $value['perfil_nombre'];
            $selected_perfil = ($perfil_id == $perfil) ? 'selected' : '';
            $obtion_perfiles .= <<<HTML
            <option value="$perfil_id" $selected_perfil>$perfil_nombre</option>
        HTML;
        }

        $html = <<<HTML
        <div class="flex-grow-1">
            <div class="row no-gutters justify-content-center">
                <div class="pt-4 col-lg-12">
                    <h1 class="pr-3 text-left"><b style="font-size:20px; text-transform:uppercase;">EDITAR USUARIO</b></h1>

                    <div class="col-12 col-lg-12 m-auto">
                        <div class="card">
                            <div class="card-body" style="padding-top:0;">
                                <div class="row no-gutters">
                                    <div class="col-lg-12">
                                        <div class="row no-gutters" id="contenedor-formulario">
                                            <div class="col-lg-12 px-2 pt-2">
                                                <h2><b style="font-size:17px;">DATOS DEL USUARIO - $nombre</b></h2>
                                                <hr>
                                            </div>
                                            <div class="col-12 p-3">
                                                <div class="row no-gutters">
                                                    <div class="col-lg-6 col-12 mb-3 px-2">
                                                        <label for="nombre" class="label-input">Nombre: </label>
                                                        <input type="text" placeholder="Ingrese Nombre" name="nombre" id="nombre" value="$nombre"/>
                                                    </div>

                                                    <div class="col-lg-6 col-12 mb-3 px-2">
                                                        <label for="apellido" class="label-input">Apellido: </label>
                                                        <input type="text" placeholder="Ingrese Apellido" name="apellido" id="apellido" />
                                                    </div>

                                                    <div class="col-lg-12 col-12 mb-3 px-2">
                                                        <label for="usuario" class="label-input">Usuario Ingreso: </label>
                                                        <input type="text" placeholder="Ingrese Usuario" name="usuario" id="usuario" value="$usuario_ingreso"/>
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
                                                            <option value="1" $selected_estado_1>Activo</option>
                                                            <option value="0" $selected_estado_0>Inactivo</option>
                                                        </select>
                                                    </div>

                                                    <label for="imagen" class="label-input">Imagen Perfil: </label>
                                                    <div class="wrap col-lg-12" style="justify-items: center;">
                                                        <div class="thumb">
                                                            <img id="img" src="$img_perfil"/>
                                                            <button id="remove-img" style="position: absolute; top: 5px; right: 5px; background: red; color: white; border: none; border-radius: 50%; width: 25px; height: 25px; display: none; cursor: pointer;">X</button>
                                                        </div>
                                                        <label for="upload">SUBIR IMAGEN
                                                        <input type='file' id="upload"></label>
                                                    </div>

                                                    <div class="col-lg-12 col-12 px-2">
                                                        <button type="submit" class="login-btn" id="editar_usuario">EDITAR USUARIO</button>
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
