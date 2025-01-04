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
        $html = <<<HTML
            <div class="flex-grow-1 px-4">
                <div class="row no-gutters justify-content-center">
                    <div class="pt-4 col-lg-12">
                        <h1 class="pr-3 text-left"><b style="font-size:20px; text-transform:uppercase;">Listado De Autores</b></h1>

                            <div class="col-12 col-lg-3 m-auto">
                                <div class="container">
                                    <div class="card">
                                    <figure class="card__thumb">
                                        <img
                                        src="https://images.unsplash.com/photo-1573865526739-10659fec78a5?q=80&w=2030&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                        alt="Picture by Amber Kipp"
                                        class="card__image"
                                        />
                                        <figcaption class="card__caption">
                                        <h2 class="card__title">
                                            Here's What Your Cat Actually Thinks Of You
                                        </h2>
                                        <p class="card__snippet">
                                            In ac sem bibendum, posuere leo et, accumsan dolor. Sed lacinia
                                            aliquet tellus. Aliquam pellentesque vel diam sit amet euismod.
                                            Donec et sem et mi placerat malesuada. Nullam at pharetra elit.
                                            Class aptent taciti sociosqu ad litora torquent per conubia nostra,
                                            per inceptos himenaeos. Maecenas fringilla at justo sit amet tempus.
                                            Interdum et malesuada fames ac ante ipsum primis in faucibus.
                                        </p>
                                        <a href="" class="card__button">Read more</a>
                                        </figcaption>
                                    </figure>
                                    </div>
                                    
                                    <p class="copyright">Picture by Amber Kipp</p>
                                </div>
                            </div>
                            
                    </div>
                </div>
            </div>
        HTML;

        return $html;
    }
}
