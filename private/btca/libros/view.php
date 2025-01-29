<?php

include_once 'model.php';

class viewLibros
{
    public static function ingresarLibro()
    {

        $obtener_autores = ModelAutores::autores_list();

        $obtion_autores = '';
        foreach ($obtener_autores as $key => $value) {
            $autor_id = $value['autor_id'];
            $autor_nombre = $value['autor_nombre'];
            $autor_apellido = $value['autor_apellido'];
            $obtion_autores .= <<<HTML
                <option value="$autor_id">$autor_nombre $autor_apellido</option>
            HTML;
        }

        $obtener_categoria = ModelCategorias::categoriasList();
        $obtion_categorias = '';
        foreach ($obtener_categoria as $key => $value) {
            $id = $value['id'];
            $materia = $value['materia'];
            $obtion_categorias .= <<<HTML
                <option value="$id">$materia</option>
            HTML;
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
                                                            <select name="autor" id="autor">
                                                                <option value="">Seleccionar</option>
                                                                $obtion_autores
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-6 col-12 mb-3 px-2">
                                                            <label for="categoria" class="label-input">Categoria: </label>
                                                            <select name="categoria" id="categoria">
                                                                <option value="">Seleccionar</option>
                                                                $obtion_categorias
                                                            </select>
                                                        </div>

                                                        <div class="autoComplete_wrapper">
                                                            <input id="autoComplete" type="search" dir="ltr" spellcheck=false autocorrect="off" autocomplete="off" autocapitalize="off">
                                                        </div>

                                                        <div class="col-lg-6 col-12 mb-3 px-2">
                                                            <label for="estado" class="label-input">Estado: </label>
                                                            <select name="estado" id="estado">
                                                                <option value="">Seleccionar</option>
                                                                <option value="A">Activo</option>
                                                                <option value="I">Inactivo</option>
                                                            </select>
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
}
