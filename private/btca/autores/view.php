<?php

class viewAutores
{
    public static function ingresarAutor()
    {
        $html = <<<HTML
            <div class="flex-grow-1 px-4">
                <div class="row no-gutters justify-content-center">
                    <div class="pt-4 px-3 col-lg-12">
                        <h1 class="pr-3 text-left"><b style="font-size:20px; text-transform:uppercase;">Registrar Autor</b></h1>

                        <div class="col-12 col-lg-7 p-3 m-auto">
                            <div class="card">
                                <div class="card-body" style="padding-top:0;">
                                    <div class="row no-gutters">
                                        <div class="col-lg-12">
                                            <div class="row no-gutters" id="contenedor-formulario">
                                                <div class="col-lg-12 px-2 pt-2">
                                                    <h2><b style="font-size:17px;">DATOS DEL AUTOR</b></h2>
                                                    <hr>
                                                </div>
                                                <div class="col-12 p-3">
                                                    <div class="row no-gutters">
                                                        <div class="col-lg-6 col-12 mb-3 px-2">
                                                            <label for="nombre_autor" class="label-input">Nombre: </label>
                                                            <input type="text" placeholder="Ingrese Nombre" name="nombre_autor" id="nombre_autor" />
                                                        </div>
                                                        
                                                        <div class="col-lg-6 col-12 mb-3 px-2">
                                                            <label for="apellido_autor" class="label-input">Apellido: </label>
                                                            <input type="text" placeholder="Ingrese Apellido" name="apellido_autor" id="apellido_autor" />
                                                        </div>

                                                        <div class="col-lg-12 col-12 mb-3 px-2">
                                                            <label for="descripcion_autor" class="label-input">Descripcion Autor: </label>
                                                            <textarea id="descripcion_autor" name="descripcion_autor" placeholder="Ingrese Descripcion Del Autor"></textarea>
                                                        </div>

                                                        <div class="col-lg-6 col-12 mb-3 px-2">
                                                            <label for="estado" class="label-input">Estado: </label>
                                                            <select name="estado" id="estado">
                                                                <option value="">Seleccionar</option>
                                                                <option value="A">Activo</option>
                                                                <option value="I">Inactivo</option>
                                                            </select>
                                                        </div>

                                                        <label for="imagen" class="label-input">Imagen Autor: </label>
                                                        <div class="wrap col-lg-12" style="justify-items: center;">
                                                            <div class="thumb">
                                                                <img id="img" src="https://png.pngtree.com/png-clipart/20230915/original/pngtree-plus-sign-symbol-simple-design-pharmacy-logo-black-vector-png-image_12186664.png"/>
                                                                <button id="remove-img" style="position: absolute; top: 5px; right: 5px; background: red; color: white; border: none; border-radius: 50%; width: 25px; height: 25px; display: none; cursor: pointer;">X</button>
                                                            </div>
                                                            <label for="upload">SUBIR IMAGEN
                                                            <input type='file' id="upload"></label>
                                                        </div>

                                                        <div class="col-lg-12 col-12 px-2 pt-2">
                                                            <button type="submit" class="login-btn" id="ingresar_autor">REGISTRAR</button>
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

    public static function consultarAutor()
    {

        $autores = ModelAutores::autores_list();
        $card_autor = '';
        foreach ($autores as $key => $value) {
            $autor_id = $value['autor_id'];
            $autor_nombre = $value['autor_nombre'];
            $autor_apellido = $value['autor_apellido'];
            $autor_descripcion = utf8_decode($value['autor_descripcion']);
            $descripcion_corta = substr($autor_descripcion, 0, 100);
            $autor_imagen = $value['autor_imagen'];

            $url_imagen = '../public/tools/images/images_autores/' . $autor_imagen;

            $card_autor .= <<<HTML
                <div class="col-12 col-sm-6 col-lg-3 my-2">
                    <div class="card" id="card">
                        <div class="profile-container text-center">
                            <img src="$url_imagen" class="img-fluid rounded-circle">
                        </div>
                        <div class="profile-info text-center mt-3">
                            <h1 class="h5">$autor_nombre $autor_apellido</h1>
                            <p class="job-title">Escritor</p>
                            <p class="desc">
                                $descripcion_corta...
                                <span class="more-text" style="display: none;">
                                    $autor_descripcion
                                </span>
                                <a href="javascript:void(0);" class="see-more"><br>Ver mas</a>
                            </p>
                        </div>
                        <div class="profile-social text-center d-flex justify-content-end">
                            <a href="javascript:void(0)" onclick="ModalEditar('$autor_id', 'modal_editar_autores')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"/>
                                </svg>
                            </a>
                        </div>
                        <div class="card-bottom"></div>
                    </div>
                </div>
            HTML;
        }

        $html = <<<HTML
            <div class="flex-grow-1 px-4">
                <div class="row no-gutters justify-content-center">
                    <div class="pt-4 col-lg-12">
                        <h1 class="pr-3 text-left">
                            <b style="font-size:20px; text-transform:uppercase;">Listado De Autores</b>
                        </h1>
                        <div class="row">
                            $card_autor
                        </div>
                    </div>
                </div>
            </div>
        HTML;

        return $html;
    }

    public static function ModalEditarAutor($data)
    {
        $id_autor = $data['id'];
        $specific_autor = ModelAutores::especific_autor($id_autor);

        $autor_id = $specific_autor['autor_id'];
        $autor_nombre = $specific_autor['autor_nombre'];
        $autor_apellido = $specific_autor['autor_apellido'];
        $autor_descripcion = $specific_autor['autor_descripcion'];
        $autor_imagen = $specific_autor['autor_imagen'];
        $img_autor = 'private/../../public/tools/images/images_autores/' . $autor_imagen;
        $autor_estado = $specific_autor['autor_estado'];

        $selected_estado_A = ($autor_estado == 'A') ? 'selected' : '';
        $selected_estado_I = ($autor_estado == 'I') ? 'selected' : '';

        $html = <<<HTML
            <div class="flex-grow-1">
                <div class="row no-gutters justify-content-center">
                    <div class="pt-4 px-3 col-lg-12">
                        <h1 class="pr-3 text-left"><b style="font-size:20px; text-transform:uppercase;">Editar Autor</b></h1>

                        <div class="col-12 col-lg-12 m-auto">
                            <div class="card">
                                <div class="card-body" style="padding-top:0;">
                                    <div class="row no-gutters">
                                        <div class="col-lg-12">
                                            <div class="row no-gutters" id="contenedor-formulario">
                                                <div class="col-lg-12 px-2 pt-2">
                                                    <h2><b style="font-size:17px;">DATOS DEL AUTOR - $autor_nombre $autor_apellido</b></h2>
                                                    <hr>
                                                </div>
                                                <div class="col-12 p-3">
                                                    <div class="row no-gutters">
                                                        <input type="hidden" id="autor_id" value = "$autor_id">
                                                        
                                                        <div class="col-lg-6 col-12 mb-3 px-2">
                                                            <label for="nombre_autor" class="label-input">Nombre: </label>
                                                            <input type="text" placeholder="Ingrese Nombre" name="nombre_autor" id="nombre_autor" value="$autor_nombre"/>
                                                        </div>
                                                        
                                                        <div class="col-lg-6 col-12 mb-3 px-2">
                                                            <label for="apellido_autor" class="label-input">Apellido: </label>
                                                            <input type="text" placeholder="Ingrese Apellido" name="apellido_autor" id="apellido_autor" value="$autor_apellido"/>
                                                        </div>

                                                        <div class="col-lg-12 col-12 mb-3 px-2">
                                                            <label for="descripcion_autor" class="label-input">Descripcion Autor: </label>
                                                            <textarea id="descripcion_autor" name="descripcion_autor" placeholder="Ingrese Descripcion Del Autor">$autor_descripcion</textarea>
                                                        </div>

                                                        <div class="col-lg-6 col-12 mb-3 px-2">
                                                            <label for="estado" class="label-input">Estado: </label>
                                                            <select name="estado" id="estado">
                                                                <option value="">Seleccionar</option>
                                                                <option value="A" $selected_estado_A>Activo</option>
                                                                <option value="I" $selected_estado_I>Inactivo</option>
                                                            </select>
                                                        </div>

                                                        <label for="imagen" class="label-input">Imagen Autor: </label>
                                                        <div class="wrap col-lg-12" style="justify-items: center;">
                                                            <div class="thumb">
                                                                <img id="img" src="$img_autor"/>
                                                                <button id="remove-img" style="position: absolute; top: 5px; right: 5px; background: red; color: white; border: none; border-radius: 50%; width: 25px; height: 25px; display: none; cursor: pointer;">X</button>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12 col-12 px-2 pt-2">
                                                            <button type="submit" class="login-btn" id="editar_autor">EDITAR</button>
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
