<?php

include_once 'model.php';

class viewLibros
{
    public static function ingresarLibro()
    {

        $obtener_autores = ModelAutores::autores_list();

        $obtion_autores = '';
        $arreglo_autores = array();
        foreach ($obtener_autores as $key => $value) {
            $autor_id = $value['autor_id'];
            $autor_nombre = $value['autor_nombre'];
            $autor_apellido = $value['autor_apellido'];
            $obtion_autores .= <<<HTML
                <option value="$autor_id">$autor_nombre $autor_apellido</option>
            HTML;
            $arreglo_autores[$autor_id] = $autor_nombre . ' ' . $autor_apellido;
        }

        $obtener_categoria = ModelCategorias::categoriasList();
        $obtion_categorias = '';
        $arreglo_categorias = array();
        foreach ($obtener_categoria as $key => $value) {
            $id = $value['id'];
            $materia = $value['materia'];
            $obtion_categorias .= <<<HTML
                <option value="$id">$materia</option>
            HTML;
            $arreglo_categorias[$id] = $materia;
        }

        $html = <<<HTML
            <div class="flex-grow-1 px-4">
                <div class="row no-gutters justify-content-center">
                    <div class="pt-4 px-3 col-lg-12">
                        <h1 class="pr-3 text-left"><b style="font-size:20px; text-transform:uppercase;">Registrar libro</b></h1>

                        <div class="col-12 col-lg-7 p-3 m-auto">
                            <div class="card">
                                <div class="card-body" style="padding-top:0;">
                                    <div class="row no-gutters">
                                        <div class="col-lg-12">
                                            <div class="row no-gutters" id="contenedor-formulario">
                                                <div class="col-lg-12 px-2 pt-2">
                                                    <h2><b style="font-size:17px;">DATOS BASICOS</b></h2>
                                                    <hr>
                                                </div>
                                                <div class="col-12 p-3">
                                                    <div class="row no-gutters">
                                                        <div class="col-lg-12 col-12 mb-3 px-2">
                                                            <label for="titulo" class="label-input">Titulo: </label>
                                                            <input type="text" placeholder="Ingrese Titulo" name="titulo" id="titulo" />
                                                        </div>
                                                        
                                                        <div class="col-lg-12 col-12 mb-3 px-2">
                                                            <label for="descripcion" class="label-input">Descripcion:</label>
                                                            <textarea id="descripcion" name="descripcion" placeholder="Ingrese Descripcion"></textarea>
                                                        </div>

                                                        <div class="col-lg-4 col-12 mb-3 px-2">
                                                            <label for="usuario" class="label-input">Fecha Edicion: </label>
                                                            <input type="date" placeholder="Ingrese Fecha Edicion" name="fecha_edicion" id="fecha_edicion" />
                                                        </div>

                                                        <div class="col-lg-4 col-12 mb-3 px-2">
                                                            <label for="apellido" class="label-input">Cantidad: </label>
                                                            <input type="number" placeholder="Ingrese Cantidad" name="cantidad" id="cantidad" />
                                                        </div>


                                                        <div class="col-lg-4 col-12 mb-3 px-2">
                                                            <label for="usuario" class="label-input">Numero Paginas: </label>
                                                            <input type="number" placeholder="Ingrese Cant. Paginas" name="numero_paginas" id="numero_paginas" />
                                                        </div>
                                                        
                                                        <div class="col-lg-6 col-12 mb-3 px-2">
                                                            <label for="autor" class="label-input">Autor: </label>
                                                            <input id="autores" name="autores" type="search" dir="ltr" spellcheck=false autocorrect="off" autocomplete="off" autocapitalize="off">
                                                        </div>

                                                        <div class="col-lg-6 col-12 mb-3 px-2">
                                                            <label for="categoria" class="label-input">Categorias: </label>
                                                            <input id="categoria" name="categoria" type="search" dir="ltr" spellcheck=false autocorrect="off" autocomplete="off" autocapitalize="off">
                                                        </div>

                                                        <div class="col-lg-6 col-12 mb-3 px-2">
                                                            <label for="estado" class="label-input">Estado: </label>
                                                            <select name="estado" id="estado">
                                                                <option value="">Seleccionar</option>
                                                                <option value="A">Activo</option>
                                                                <option value="I">Inactivo</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-6 col-12 mb-3 px-2">
                                                            <label for="categoria" class="label-input">PDF Libro: </label>
                                                            <input type="file" id="pdf-upload" accept="application/pdf">
                                                        </div>

                                                        <label for="imagen" class="label-input">Portada Libro: </label>
                                                        <div class="wrap col-lg-12" style="justify-items: center;">
                                                            <div class="thumb">
                                                                <img id="img" src="https://i.pinimg.com/originals/ae/42/81/ae4281d2e819ea165a8a324693be165b.jpg"/>
                                                                <button id="remove-img" style="position: absolute; top: 5px; right: 5px; background: red; color: white; border: none; border-radius: 50%; width: 25px; height: 25px; display: none; cursor: pointer;">X</button>
                                                            </div>
                                                            <label for="upload">SUBIR IMAGEN
                                                            <input type='file' id="upload"></label>
                                                        </div>

                                                        <div class="col-lg-12 col-12 px-2 pt-2">
                                                            <button type="submit" class="login-btn" id="ingresar_libros">REGISTRAR</button>
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

        return array("html" => rawurlencode($html), "autores" => $arreglo_autores, 'categorias' => $arreglo_categorias);
    }

    public static function consultarLibros()
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
            $pdf_name = $value['pdf_name'];

            if ($pdf_name == '' || $pdf_name == NULL) {
                $pdf_name = 'NO-PDF.pdf';
            }

            $img_libro = 'private/../../public/tools/images/images_libros/' . $imagen;
            $pdf_libro = 'private/../../public/tools/pdf/pdf_libros/' . $pdf_name;

            $especific_autor = ModelAutores::especific_autor($id_autor);
            $autor_nombre = $especific_autor['autor_nombre'];
            $autor_apellido = $especific_autor['autor_apellido'];

            $especific_categoria = ModelCategorias::especific_categoria($id_materia);
            $materia = $especific_categoria['materia'];

            $htmlbook .= <<<HTML
                <li style="position:relative;">
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
                        <div class="btn-container-prestamo d-flex">
                            <a id="" class="btn-prestamo btn--1" atr_id='$id' onclick="generarPDF('$pdf_libro', '$pdf_name')">
                                <div class="content d-flex">
                                    <div class="front">
                                        <div class="border"></div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                        </svg>
                                    </div>
                                    <div class="back">
                                        <div class="border"></div>
                                        <p>Entregar</p>
                                    </div>
                                </div>
                            </a> 
                            <div class="">
                                <span style="color:white; font-weight:bold;">Ver Libro PDF</span>
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
                                                <input type="text" class="form-control" placeholder="Buscar en el contenido..." oninput="consultarContendoLibros(this, 'consultar-contenido-libros');">
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

            <script src="https://acrobatservices.adobe.com/view-sdk/viewer.js"></script>
        
        HTML;

        return $html;
    }

    public static function contenidoBusquedaLibro($params)
    {
        $valor = $params['valor'];

        $libros_list = ModelLibros::obtener_libros($valor);

        foreach ($libros_list as $key => $value) {
            $id = $value['id'];
            $id_autor = $value['id_autor'];
            $id_materia = $value['id_materia'];
            $imagen = $value['imagen'];

            $img_libro = 'private/../../public/tools/images/images_libros/' . $imagen;


            $especific_autor = ModelAutores::especific_autor($id_autor);
            $autor_nombre = $especific_autor['autor_nombre'];
            $autor_apellido = $especific_autor['autor_apellido'];

            $especific_categoria = ModelCategorias::especific_categoria($id_materia);
            $materia = $especific_categoria['materia'];

            $html .= <<<HTML
                <li style="position:relative;">
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
                    <!--<div class="box-menu-book">
                        <div class="wrapper-book">
                            <div class="hamburger-book">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        <div class="menu-book">
                            <a href="#" class="active"><span class="icon fa fa-info-circle"></span><span class="text">Informacion Adicional</span></a>
                            <a href="#"><span class="icon fa fa-edit"></span><span class="text">Editar Libro</span></a>
                         </div>
                    </div>-->
                </li>
                
            HTML;
        }

        return $html;
    }
}
