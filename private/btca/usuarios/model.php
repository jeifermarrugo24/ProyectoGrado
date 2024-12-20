<?php
class ModelUsuarios
{

    public static function list_perfiles($id = '')
    {
        $query = "SELECT * FROM perfiles WHERE 1 = 1 AND perfil_estado = 'A' AND perfil_id != '1' AND perfil_id = '$id' ORDER BY perfil_nombre ASC";

        $result = consultar($query);

        return $result;
    }

    public static function ingresar_usuarios($data)
    {
        $nombre = $data['nombre'];
        $apellido = $data['apellido'];
        $usuario = $data['usuario'];
        $password = md5($data['password']);
        $perfil = $data['perfil'];
        $estado = $data['estado'];
        if (isset($_FILES['file'])) {
            $file = $_FILES['file'];
            $fileName = $file['name'];
            $fileTmpName = $file['tmp_name'];
            $fileSize = $file['size'];
            $fileType = $file['type'];
            $uploadDirectory = 'public/tools/images/images_perfiles/';
            $destPath = $uploadDirectory . $fileName;

            if (!is_dir($uploadDirectory)) {
                mkdir($uploadDirectory, 0777, true);
            }

            move_uploaded_file($fileTmpName, $destPath);
            $imagen = $fileName;
        } else {
            $imagen = 'https://static.vecteezy.com/system/resources/previews/011/186/876/non_2x/male-profile-picture-symbol-vector.jpg';
        }

        $sqlquery = "INSERT INTO usuarios (usuario, nombre, perfil, clave, img_perfil, estado) VALUES ('$usuario', '$nombre $apellido', '$perfil', '$password', '$imagen', '$estado')";

        $res = insertar($sqlquery);

        return $res;
    }

    public static function list_usuarios()
    {

        $query = "SELECT id, usuario, nombre, perfil, img_perfil, estado FROM usuarios WHERE 1=1 AND estado='1'";
        $result = consultar($query);

        return $result;
    }
}
