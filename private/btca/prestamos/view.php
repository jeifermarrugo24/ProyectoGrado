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

        $img_libro = 'private/../../public/tools/images/images_libros/' . $imagen;

        $especific_autor = ModelAutores::especific_autor($id_autor);
        $autor_nombre = $especific_autor['autor_nombre'];
        $autor_apellido = $especific_autor['autor_apellido'];

        $especific_categoria = ModelCategorias::especific_categoria($id_materia);
        $materia = $especific_categoria['materia'];

        $obtener_categoria = ModelUsuarios::list_usuarios();
        $obtion_usuarios = '';
        $arreglo_usuarios = array();
        foreach ($obtener_categoria as $key => $value) {
            $id = $value['id'];
            $nombre = $value['nombre'];
            $obtion_usuarios .= <<<HTML
                <option value="$id">$nombre</option>
            HTML;
            $arreglo_usuarios[$id] = $nombre;
        }

        $fecha_actual = date("Y-m-d");
        $fecha_exp = date("Y-m-d", strtotime("+5 days"));

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
                                        <div class="row no-gutters" id="contenedor-formulario">
                                            <div class="col-lg-12 px-2 pt-2">
                                                <h2><b style="font-size:17px;">DATOS DEL LIBRO</b></h2>
                                                <hr>
                                            </div>
                                            <div class="col-12">
                                                <div class="row no-gutters">

                                                    <input type="hidden" name="id_libro" id="id_libro" value = "$id_libro">

                                                    <div class="col-lg-12 col-12 mb-3 px-2 m-auto" style="justify-items: center;">
                                                        <div class="card mb-3" style="max-width: 540px;">
                                                            <div class="row g-0 border-1">
                                                                <div class="col-md-4">
                                                                <img src="$img_libro" class="img-fluid rounded-start" alt="...">
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="card-body row">
                                                                        <h4 class="mb-4">$titulo</h4>
                                                                        <p><span style="font-weight:bold;">Autor:</span><br> $autor_nombre $autor_apellido</p>
                                                                        <p><span style="font-weight:bold;">Categoria:</span><br> $materia</p>
                                                                        <p><span style="font-weight:bold;">Cantidad de hojas:</span><br> $num_pagina</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>  
                                                    </div>
                                                    
                                                    <div class="col-lg-12 px-2 pt-2">
                                                        <h2><b style="font-size:17px;">INFORMACION BASICA DEL PRESTAMO</b></h2>
                                                        <hr>
                                                    </div>

                                                    <div class="col-lg-6 col-12 mb-3 px-2">
                                                        <label for="usuario" class="label-input">Nombre Usuario: </label>
                                                        <input id="usuario" name="usuario" type="search" dir="ltr" spellcheck=false autocorrect="off" autocomplete="off" autocapitalize="off">
                                                    </div>


                                                    <div class="col-lg-6 col-12 mb-3 px-2">
                                                        <label for="fecha_prestamo" class="label-input">Fecha Prestamo: </label>
                                                        <input type="date" placeholder="Ingrese Fecha" name="fecha_prestamo" id="fecha_prestamo" value="$fecha_actual" disabled/>
                                                    </div>

                                                    <div class="col-lg-6 col-12 mb-3 px-2">
                                                        <label for="fecha_exp" class="label-input">Fecha Entrega: </label>
                                                        <input type="date" placeholder="Ingrese Fecha" name="fecha_exp" id="fecha_exp" value="$fecha_exp" disabled/>
                                                    </div>

                                                    <div class="col-lg-6 col-12 mb-3 px-2">
                                                        <label for="fecha_exp" class="label-input">Cantidad: </label>
                                                        <input type="number" placeholder="Cantidad de libros a prestar" name="cantidad" id="cantidad" value=""/>
                                                    </div>

                                                    <div class="col-lg-12 col-12 mb-3 px-2">
                                                            <label for="observaciones" class="label-input">Observaciones:</label>
                                                            <textarea id="observaciones" name="observaciones" placeholder="Ingrese observaciones"></textarea>
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
                                                        <button type="submit" class="login-btn" id="ingresar_prestamo_libro">CONFIRMAR PRESTAMO DEL LIBRO</button>
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

        return array("html" => $html, "usuarios" => $arreglo_usuarios);
    }

    public static function editarPrestamoLibrosUsuarios($data)
    {
        $id_prestamo = $data['id'];
        $especfic_prestamo = ModelPrestamos::specific_prestamos($id_prestamo);

        $id_estudiante = $especfic_prestamo['id_estudiante'];
        $id_libro = $especfic_prestamo['id_libro'];
        $fecha_prestamo = $especfic_prestamo['fecha_prestamo'];
        $fecha_devolucion = $especfic_prestamo['fecha_devolucion'];
        $cantidad = $especfic_prestamo['cantidad'];
        $observacion = $especfic_prestamo['observacion'];
        $estado = $especfic_prestamo['estado'];
        $estado_1 = ($estado == 'A') ? 'selected' : '';
        $estado_2 = ($estado == 'I') ? 'selected' : '';

        $especific_libro = ModelLibros::espefic_libro($id_libro);

        $titulo = $especific_libro['titulo'];
        $id_autor = $especific_libro['id_autor'];
        $id_materia = $especific_libro['id_materia'];
        $num_pagina = $especific_libro['num_pagina'];
        $imagen = $especific_libro['imagen'];

        $img_libro = 'private/../../public/tools/images/images_libros/' . $imagen;

        $especific_autor = ModelAutores::especific_autor($id_autor);
        $autor_nombre = $especific_autor['autor_nombre'];
        $autor_apellido = $especific_autor['autor_apellido'];

        $especific_categoria = ModelCategorias::especific_categoria($id_materia);
        $materia = $especific_categoria['materia'];

        $obtener_categoria = ModelUsuarios::list_usuarios();
        $obtion_usuarios = '';
        $arreglo_usuarios = array();
        foreach ($obtener_categoria as $key => $value) {
            $id = $value['id'];
            $nombre = $value['nombre'];
            $obtion_usuarios .= <<<HTML
                <option value="$id">$nombre</option>
            HTML;
            $arreglo_usuarios[$id] = $nombre;
        }

        $usuario_prestamo = $arreglo_usuarios[$id_estudiante];

        $html = <<<HTML
        <div class="flex-grow-1">
            <div class="row no-gutters justify-content-center">
                <div class="pt-4 col-lg-12">
                    <h1 class="pr-3 text-left"><b style="font-size:20px; text-transform:uppercase;">EDITAR PRESTAMO DEL LIBRO $titulo AL USUARIO $usuario_prestamo</b></h1>

                    <div class="col-12 col-lg-12 m-auto">
                        <div class="card">
                            <div class="card-body" style="padding-top:0;">
                                <div class="row no-gutters">
                                    <div class="col-lg-12">
                                        <div class="row no-gutters" id="contenedor-formulario">
                                            <div class="col-lg-12 px-2 pt-2">
                                                <h2><b style="font-size:17px;">DATOS DEL LIBRO</b></h2>
                                                <hr>
                                            </div>
                                            <div class="col-12">
                                                <div class="row no-gutters">

                                                    <input type="hidden" name="id_libro" id="id_libro" value = "$id_libro">
                                                    <input type="hidden" name="id_select" id="id_select" value = "$id_prestamo">

                                                    <div class="col-lg-12 col-12 mb-3 px-2 m-auto" style="justify-items: center;">
                                                        <div class="card mb-3" style="max-width: 540px;">
                                                            <div class="row g-0 border-1">
                                                                <div class="col-md-4">
                                                                <img src="$img_libro" class="img-fluid rounded-start" alt="...">
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="card-body row">
                                                                        <h4 class="mb-4">$titulo</h4>
                                                                        <p><span style="font-weight:bold;">Autor:</span><br> $autor_nombre $autor_apellido</p>
                                                                        <p><span style="font-weight:bold;">Categoria:</span><br> $materia</p>
                                                                        <p><span style="font-weight:bold;">Cantidad de hojas:</span><br> $num_pagina</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>  
                                                    </div>
                                                    
                                                    <div class="col-lg-12 px-2 pt-2">
                                                        <h2><b style="font-size:17px;">INFORMACION BASICA DEL PRESTAMO</b></h2>
                                                        <hr>
                                                    </div>

                                                    <div class="col-lg-6 col-12 mb-3 px-2">
                                                        <label for="usuario" class="label-input">Nombre Usuario: </label>
                                                        <input id="usuario" name="usuario" value="$id_estudiante,$usuario_prestamo" type="search" dir="ltr" spellcheck=false autocorrect="off" autocomplete="off" autocapitalize="off">
                                                    </div>


                                                    <div class="col-lg-6 col-12 mb-3 px-2">
                                                        <label for="fecha_prestamo" class="label-input">Fecha Prestamo: </label>
                                                        <input type="date" placeholder="Ingrese Fecha" name="fecha_prestamo" id="fecha_prestamo" value="$fecha_prestamo"/>
                                                    </div>

                                                    <div class="col-lg-6 col-12 mb-3 px-2">
                                                        <label for="fecha_exp" class="label-input">Fecha Entrega: </label>
                                                        <input type="date" placeholder="Ingrese Fecha" name="fecha_exp" id="fecha_exp" value="$fecha_devolucion"/>
                                                    </div>

                                                    <div class="col-lg-6 col-12 mb-3 px-2">
                                                        <label for="fecha_exp" class="label-input">Cantidad: </label>
                                                        <input type="number" placeholder="Cantidad de libros a prestar" value="$cantidad" name="cantidad" id="cantidad" value=""/>
                                                    </div>

                                                    <div class="col-lg-12 col-12 mb-3 px-2">
                                                            <label for="observaciones" class="label-input">Observaciones:</label>
                                                            <textarea id="observaciones" name="observaciones" placeholder="Ingrese observaciones">$observacion</textarea>
                                                        </div>

                                                    <div class="col-lg-6 col-12 mb-3 px-2">
                                                        <label for="estado" class="label-input">Estado: </label>
                                                        <select name="estado" id="estado">
                                                            <option value="">Seleccionar</option>
                                                            <option value="A" $estado_1 >Activo</option>
                                                            <option value="I" $estado_2>Inactivo</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-lg-12 col-12 px-2">
                                                        <button type="submit" class="login-btn" id="editar_prestamo_libro">EDITAR PRESTAMO DEL LIBRO</button>
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

        return array("html" => $html, "usuarios" => $arreglo_usuarios);
    }

    public static function reingresoLibrosUsuarios()
    {
        $prestamos_list = ModelPrestamos::prestamos_list();
        if (is_array($prestamos_list) && count($prestamos_list) > 0) {
            foreach ($prestamos_list as $key => $value) {
                $id = $value['id'];
                $id_estudiante = $value['id_estudiante'];
                $datos_estudiante = ModelUsuarios::especific_user($id_estudiante);
                $nombre_estudiante = $datos_estudiante['nombre'];
                $id_libro = $value['id_libro'];
                $datos_libro = ModelLibros::espefic_libro($id_libro);
                $titulo_libro = $datos_libro['titulo'];
                $fecha_prestamo = $value['fecha_prestamo'];
                $fecha_devolucion = $value['fecha_devolucion'];
                $cantidad = $value['cantidad'];
                $observacion = $value['observacion'];

                $tbody .= <<<HTML
                    <tr>
                        <td class="text-center">
                            <a href="javascript:void(0)" onclick="ModalEditar('$id', 'modal_editar_prestamo')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="svg-color bi bi-arrows-fullscreen" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M5.828 10.172a.5.5 0 0 0-.707 0l-4.096 4.096V11.5a.5.5 0 0 0-1 0v3.975a.5.5 0 0 0 .5.5H4.5a.5.5 0 0 0 0-1H1.732l4.096-4.096a.5.5 0 0 0 0-.707m4.344 0a.5.5 0 0 1 .707 0l4.096 4.096V11.5a.5.5 0 1 1 1 0v3.975a.5.5 0 0 1-.5.5H11.5a.5.5 0 0 1 0-1h2.768l-4.096-4.096a.5.5 0 0 1 0-.707m0-4.344a.5.5 0 0 0 .707 0l4.096-4.096V4.5a.5.5 0 1 0 1 0V.525a.5.5 0 0 0-.5-.5H11.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707m-4.344 0a.5.5 0 0 1-.707 0L1.025 1.732V4.5a.5.5 0 0 1-1 0V.525a.5.5 0 0 1 .5-.5H4.5a.5.5 0 0 1 0 1H1.732l4.096 4.096a.5.5 0 0 1 0 .707"/>
                                </svg>
                            </a>
                        </td>
                        <td class="text-center p-2">$nombre_estudiante</td>
                        <td class="text-center">$titulo_libro</td>
                        <td class="text-center">$fecha_prestamo</td>
                        <td class="text-center">$fecha_devolucion</td>
                        <td class="text-center">$cantidad</td>
                        <td class="text-center">$observacion</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" onclick="ModalRecibirLibro('$id', 'modal_recibir_prestamo')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-raised-hand" viewBox="0 0 16 16">
                                    <path d="M6 6.207v9.043a.75.75 0 0 0 1.5 0V10.5a.5.5 0 0 1 1 0v4.75a.75.75 0 0 0 1.5 0v-8.5a.25.25 0 1 1 .5 0v2.5a.75.75 0 0 0 1.5 0V6.5a3 3 0 0 0-3-3H6.236a1 1 0 0 1-.447-.106l-.33-.165A.83.83 0 0 1 5 2.488V.75a.75.75 0 0 0-1.5 0v2.083c0 .715.404 1.37 1.044 1.689L5.5 5c.32.32.5.754.5 1.207"/>
                                    <path d="M8 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                HTML;
            }
        } else {
        }

        $html = <<<HTML
            <div class="flex-grow-1 px-4">
                <div class="row no-gutters justify-content-center">
                    <div class="pt-4 px-3 col-lg-12">
                        <h1 class="pr-3 text-left"><b style="font-size:20px; text-transform:uppercase;">Listado De Prestamos</b></h1>

                        <div class="col-12 col-lg-10 p-3 m-auto">
                            <div class="card">
                                <div class="card-body" style="padding-top:0;">
                                    <div class="row no-gutters">
                                        <div class="col-lg-12">
                                            <form class="row no-gutters" id="contenedor-formulario" method="POST" enctype="multipart/form-data">
                                                <div class="col-lg-12 px-2 pt-2">
                                                    <hr>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row no-gutters">
                                                        <div class="table-responsive">
                                                            <table id="DataPage" class="display table-striped my-2" style="width:100%; border: 1px solid #F2F2F2;">
                                                                <thead class="mt-4">
                                                                    <tr>
                                                                        <th class="text-center p-1">EDITAR</th>
                                                                        <th class="text-center p-1">ESTUDIANTE</th>
                                                                        <th class="text-center p-1">LIBRO</th>
                                                                        <th class="text-center p-1">FECHA PRESTAMO</th>
                                                                        <th class="text-center p-1">FECHA DEVOLUCION</th>
                                                                        <th class="text-center p-1">CANTIDAD PRESTADOS</th>
                                                                        <th class="text-center p-1">OBSERVACION</th>
                                                                        <th class="text-center p-1">RECIBIDO</th>
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
