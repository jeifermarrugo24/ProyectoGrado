<?php
class ModelUsuarios
{

    public static function list_perfiles()
    {
        $query = "SELECT * FROM perfiles WHERE 1 = 1 AND perfil_estado = 'A' AND perfil_id != '1' ORDER BY perfil_nombre ASC";

        $result = consultar($query);

        return $result;
    }

    public static function ingresar_usuarios($data)
    {
        $nombre = $data['nombre'];
        $apellido = $data['apellido'];
        $usuario = $data['usuario'];
        $password = md5($data['password']);
        $confirm_password = $data['confirm_password'];
        $perfil = $data['perfil'];
        $estado = $data['estado'];
        $imagen = trim($data['imagen']);
        print_r($imagen);
        die;

        $sqlquery = "INSERT INTO usuarios (usuario, nombre, perfil, clave, img_perfil, estado) VALUES ('$usuario', '$nombre $apellido', '$perfil', '$password', '$imagen', '$estado')";

        $res = insertar($sqlquery);

        return $res;
    }
}
