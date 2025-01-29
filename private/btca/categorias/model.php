<?php

class ModelCategorias
{

    public static function categoriasList()
    {
        $query = "SELECT * FROM materia WHERE 1 = 1 AND estado = 'A'";

        $result = consultar($query);

        return $result;
    }

    public static function especific_categoria($id)
    {
        $query = "SELECT * FROM materia WHERE 1 = 1 AND estado = 'A' AND id = '$id'";

        $result = consultar($query);

        return $result[0];
    }

    public static function ingresar_categoria($data)
    {
        $nombre_categoria = $data['nombre_categoria'];
        $categoria_estado = $data['categoria_estado'];

        $query = "INSERT INTO materia (materia, estado) VALUES ('$nombre_categoria', '$categoria_estado')";

        $result = insertar($query);

        return $result;
    }

    public static function editar_categoria($data)
    {
        $nombre_categoria = $data['nombre_categoria'];
        $estado_categoria = $data['estado_categoria'];
        $categoria_id = $data['categoria_id'];

        $query = "UPDATE materia SET materia = '$nombre_categoria', estado = '$estado_categoria' WHERE id = '$categoria_id'";

        $result = actualizar($query);
        return $result;
    }
}
