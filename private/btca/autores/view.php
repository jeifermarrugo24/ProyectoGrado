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
                            <div class="row">
                                <div class="col-12 col-lg-2 my-2">
                                    <div class="contenedor_card">
                                        <div class="card_profile p-4" id="profileCard">
                                            <img class="img_profile" src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?q=80&w=2080&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Profile Picture" class="noSelect">
                                            <h2 class="title-login noSelect" style="color:black; padding-bottom:0;">John Doe</h2>
                                            <div class="d-flex justify-content-end">
                                                <button class="login-btn" style="border-radius:25px;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pencil m-2" viewBox="0 0 16 16">
                                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        <div>
                                    </div>
    
                                    <div class="" id="infoBox">
                                        <h2 class="title-login noSelect">About Me</h2>
                                        <p id = "p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero, quibusdam delectus? Officia optio eveniet molestias explicabo culpa quos delectus ratione laudantium. Laborum obcaecati totam quasi animi illum veritatis laboriosam veniam?
                                            Quis impedit eveniet, asperiores atque neque debitis aliquid quisquam, odit itaque reprehenderit quidem! Exercitationem aperiam dolore laborum aliquam, vitae incidunt animi mollitia amet. Impedit, qui! Provident, dicta molestiae. Exercitationem, voluptates.</p>
    
                                        <div class="pills">
                                            <span class="pill">JavaScript</span>
                                            <span class="pill">Python</span>
                                            <span class="pill">Java</span>
                                            <span class="pill">C#</span>
                                            <span class="pill">HTML</span>
                                            <span class="pill">CSS</span>
                                            <span class="pill">SQL</span>
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
