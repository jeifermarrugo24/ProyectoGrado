<?php

class viewPrestamos
{
    public static function prestamoLibros()
    {
        $libros_list = ModelLibros::obtener_libros();

        foreach ($libros_list as $key => $value) {
            $id = $value['id'];
            $titulo = $value['titulo'];
            $cantidad = $value['cantidad'];
            $id_autor = $value['id_autor'];
            $id_editorial = $value['id_editorial'];
            $anio_edicion = $value['anio_edicion'];
            $id_materia = $value['id_materia'];
            $num_pagina = $value['num_pagina'];
            $descripcion = $value['descripcion'];
            $imagen = $value['imagen'];
            $estado = $value['estado'];

            $img_libro = 'private/../../public/tools/images/images_libros/' . $imagen;


            $especific_autor = ModelAutores::especific_autor($id_autor);
            $autor_nombre = $especific_autor['autor_nombre'];
            $autor_apellido = $especific_autor['autor_apellido'];

            $especific_categoria = ModelCategorias::especific_categoria($id_materia);
            $materia = $especific_categoria['materia'];

            $htmlbook .= <<<HTML
                <li style="position:relative;" class="book-container-g">
                    <a target="_blank">
                        <div class="bk-book book-1 bk-bookdefault">
                            <div class="bk-front">
                                <div class="bk-cover">
                                    <h2><img src="$img_libro" width="260" height="398"></h2>
                                </div>
                                <div class="bk-cover-back"></div>
                            </div>
                            <div class="bk-back"></div>
                            <div class="bk-right"></div>
                            <div class="bk-left">
                                <h2><span>$autor_nombre $autor_apellido - $materia</span></h2>
                            </div>
                        </div>
                    </a>
                    <div class="wrapper-prestamo">
                        <div class="btn-container-prestamo d-flex align-items-center justify-content-start">
                            <a id="prestar_libro_usuario" class="btn-prestamo btn--1" atr_id='$id'>
                                <div class="content">
                                    <div class="front">
                                        <div class="border"></div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-bag" viewBox="0 0 16 16">
                                            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
                                        </svg>
                                    </div>
                                    <div class="back">
                                        <div class="border"></div>
                                        <p>Entregar</p>
                                    </div>
                                </div>
                            </a>                         
                            <div class="inventario-container d-flex align-items-center">
                                <span style="color:white; font-weight:bold;">Inventario:</span>
                                <input type="text" value="$cantidad" class="inventario-input" disabled>
                            </div>
                        </div>
                    </div>
                </li>
                
            HTML;
        }

        $html = <<<HTML
        <div class="flex-grow-1 px-4">
                <div class="row no-gutters justify-content-center">
                    <div class="pt-4 px-3 col-lg-12">
                        <h1 class="pr-3 text-left"><b style="font-size:20px; text-transform:uppercase;">Listado De libro</b></h1>

                        <div class="col-12 col-lg-12 m-auto">
                            <div class="">
                                <div class="card-body" style="padding-top:0;">
                                    <div class="row no-gutters">
                                        <div class="col-lg-12" style="padding:0px;">
                                            <div class="form-group has-search">
                                                <span class="fa fa-search form-control-feedback"></span>
                                                <input type="text" class="form-control" placeholder="Buscar en el contenido..." oninput="consultarContendoLibros(this, 'consultar-contenido-libros-prestamo');">
                                            </div>
                                            <div class="loader-content d-none"></div>
                                            <ul class="bk-list clearfix content-ul-books">
                                                $htmlbook
                                            </ul>
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

    public static function contenidoBusquedaLibroPrestamo($params)
    {
        $valor = $params['valor'];

        $libros_list = ModelLibros::obtener_libros($valor);

        foreach ($libros_list as $key => $value) {
            $id = $value['id'];
            $id_autor = $value['id_autor'];
            $id_materia = $value['id_materia'];
            $cantidad = $value['cantidad'];
            $imagen = $value['imagen'];

            $img_libro = 'private/../../public/tools/images/images_libros/' . $imagen;


            $especific_autor = ModelAutores::especific_autor($id_autor);
            $autor_nombre = $especific_autor['autor_nombre'];
            $autor_apellido = $especific_autor['autor_apellido'];

            $especific_categoria = ModelCategorias::especific_categoria($id_materia);
            $materia = $especific_categoria['materia'];

            $html .= <<<HTML
                <li style="">
                    <a target="_blank">
                        <div class="bk-book book-1 bk-bookdefault">
                            <div class="bk-front">
                                <div class="bk-cover">
                                    <h2><img src="$img_libro" width="260" height="398"></h2>
                                </div>
                                <div class="bk-cover-back"></div>
                            </div>
                            <div class="bk-back"></div>
                            <div class="bk-right"></div>
                            <div class="bk-left">
                                <h2><span>$autor_nombre $autor_apellido - $materia</span></h2>
                            </div>
                        </div>
                    </a>
                    <div class="wrapper-prestamo">
                        <div class="btn-container-prestamo d-flex align-items-center justify-content-start">
                        <a id="prestar_libro_usuario" class="btn-prestamo btn--1" atr_id='$id'>
                            <div class="content">
                                    <div class="front">
                                        <div class="border"></div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-bag" viewBox="0 0 16 16">
                                            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
                                        </svg>
                                    </div>
                                    <div class="back">
                                        <div class="border"></div>
                                        <p>Entregar</p>
                                    </div>
                                </div>
                            </a>                         
                            <div class="inventario-container d-flex align-items-center">
                                <span style="color:white; font-weight:bold;">Inventario:</span>
                                <input type="text" value="$cantidad" class="inventario-input" disabled>
                            </div>
                        </div>
                    </div>
                </li>
                
            HTML;
        }

        return $html;
    }

    public static function PrestamoLibrosUsuarios($data)
    {
        $id_libro = $data['id'];
        $especific_libro = ModelLibros::espefic_libro($id_libro);

        $id = $especific_libro['id'];
        $titulo = $especific_libro['titulo'];
        $cantidad = $especific_libro['cantidad'];
        $id_autor = $especific_libro['id_autor'];
        $id_editorial = $especific_libro['id_editorial'];
        $anio_edicion = $especific_libro['anio_edicion'];
        $id_materia = $especific_libro['id_materia'];
        $num_pagina = $especific_libro['num_pagina'];
        $descripcion = $especific_libro['descripcion'];
        $imagen = $especific_libro['imagen'];
        $estado = $especific_libro['estado'];

        $html = <<<HTML
        <div class="flex-grow-1">
            <div class="row no-gutters justify-content-center">
                <div class="pt-4 col-lg-12">
                    <h1 class="pr-3 text-left"><b style="font-size:20px; text-transform:uppercase;">PRESTAMO DE LIBROS A USUARIO</b></h1>

                    <div class="col-12 col-lg-12 m-auto">
                        <div class="card">
                            <div class="card-body" style="padding-top:0;">
                                <div class="row no-gutters">
                                    <div class="col-lg-12">
                                        <div class="row no-gutters" id="contenedor-formulario-edit">
                                            <div class="col-lg-12 px-2 pt-2">
                                                <h2><b style="font-size:17px;">DATOS DEL USUARIO - $nombre</b></h2>
                                                <hr>
                                            </div>
                                            <div class="col-12 p-3">
                                                <div class="row no-gutters">

                                                    <input type="hidden" id="id_usuario" value = "$id">

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
