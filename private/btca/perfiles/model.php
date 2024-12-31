<?php

class ModelPerfiles
{
    public static function perfilesList()
    {
        $query = "SELECT * FROM perfiles WHERE 1 = 1 AND perfil_estado = 'A'";

        $result = consultar($query);

        return $result;
    }

    public static function ingresar_perfil($data)
    {
        $nombre_perfil = $data['nombre_perfil'];
        $estado_perfil = $data['estado_perfil'];

        $query = "INSERT INTO perfiles (perfil_nombre, perfil_estado) VALUES ('$nombre_perfil', '$estado_perfil')";

        $result = insertar($query);

        return $result;
    }

    public static function editar_perfil($data)
    {
        $perfil_id = $data['perfil_id'];
        $nombre_perfil = $data['nombre_perfil'];
        $estado_perfil = $data['estado_perfil'];

        $query = "UPDATE perfiles SET perfil_nombre = '$nombre_perfil', perfil_estado = '$estado_perfil' WHERE perfil_id = '$perfil_id'";

        $result = actualizar($query);

        return $result;
    }

    public static function especific_perfil($id)
    {
        $query = "SELECT * FROM perfiles WHERE 1 = 1 AND perfil_estado = 'A' AND perfil_id = '$id'";

        $result = consultar($query);

        return $result[0];
    }
}
