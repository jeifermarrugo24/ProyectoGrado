<?php

class ModelAutores
{
    public static function autores_list()
    {
        $sql = "SELECT * FROM autores";
    }
    public static function ingresar_autor($data)
    {
        $nombre_autor = $data['nombre_autor'];
        $apellido_autor = $data['apellido_autor'];
        $descripcion_autor = $data['descripcion_autor'];
        $estado = $data['estado'];
        if (isset($_FILES['file'])) {
            $file = $_FILES['file'];
            $fileName = $file['name'];
            $fileTmpName = $file['tmp_name'];
            $fileSize = $file['size'];
            $fileType = $file['type'];
            $uploadDirectory = 'public/tools/images/images_autores/';
            $destPath = $uploadDirectory . $fileName;

            if (!is_dir($uploadDirectory)) {
                mkdir($uploadDirectory, 0777, true);
            }

            move_uploaded_file($fileTmpName, $destPath);
            $imagen = $fileName;
        } else {
            $imagen = 'https://static.vecteezy.com/system/resources/previews/011/186/876/non_2x/male-profile-picture-symbol-vector.jpg';
        }

        $sqlquery = "INSERT INTO autor (autor_nombre, autor_apellido, autor_descripcion, autor_estado, autor_imagen) VALUES ('$nombre_autor', '$apellido_autor', '$descripcion_autor', '$estado', '$imagen')";

        $res = insertar($sqlquery);

        return $res;
    }
}
