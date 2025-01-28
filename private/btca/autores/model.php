<?php

class ModelAutores
{
    public static function autores_list()
    {
        $sql = "SELECT * FROM autor WHERE autor_estado = 'A'";

        $result = consultar($sql);

        return $result;
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

    public static function editar_autor($data)
    {
        $id_autor = $data['id_autor'];
        $nombre_autor = $data['nombre_autor'];
        $apellido_autor = $data['apellido_autor'];
        $descripcion_autor = $data['descripcion_autor'];
        $estado = $data['estado'];

        $sql_query = "UPDATE autor SET autor_nombre = '$nombre_autor', autor_apellido = '$apellido_autor', autor_descripcion = '$descripcion_autor', autor_estado = '$estado' WHERE autor_id = ''";

        $res = actualizar($sql_query);

        return $res;
    }

    public static function especific_autor($id)
    {
        $query = "SELECT autor_id, autor_nombre, autor_apellido, autor_nombre, autor_descripcion, autor_imagen, autor_estado FROM autor WHERE 1=1 AND autor_id = '$id' AND autor_estado='A'";
        $result = consultar($query);

        return $result[0];
    }
}
