<?php
class ModelLibros
{
    public static function ingresar_libro($data)
    {
        $titulo = $data['titulo'];
        $descripcion = $data['descripcion'];
        $fecha_edicion = $data['fecha_edicion'];
        $cantidad = $data['cantidad'];
        $numero_paginas = $data['numero_paginas'];
        $autores = $data['autores'];
        $datos = explode(",", $autores);
        $id_autor = $datos[0];
        $categoria = $data['categoria'];
        $datos = explode(",", $categoria);
        $id_categoria = $datos[0];
        $estado = $data['estado'];

        if (isset($_FILES['file'])) {
            $file = $_FILES['file'];
            $fileName = $file['name'];
            $fileTmpName = $file['tmp_name'];
            $fileSize = $file['size'];
            $fileType = $file['type'];
            $uploadDirectory = 'public/tools/images/images_libros/';
            $destPath = $uploadDirectory . $fileName;

            if (!is_dir($uploadDirectory)) {
                mkdir($uploadDirectory, 0777, true);
            }

            move_uploaded_file($fileTmpName, $destPath);
            $imagen = $fileName;
        } else {
            $imagen = 'https://static.vecteezy.com/system/resources/previews/011/186/876/non_2x/male-profile-picture-symbol-vector.jpg';
        }

        $sqlquery = "INSERT INTO libro (titulo, cantidad, id_autor, anio_edicion, id_materia, num_pagina, descripcion, imagen, estado) VALUES ('$titulo', '$cantidad', '$id_autor', '$fecha_edicion', '$id_categoria', '$numero_paginas', '$descripcion', '$imagen', '$estado')";

        $res = insertar($sqlquery);

        return $res;
    }
}
