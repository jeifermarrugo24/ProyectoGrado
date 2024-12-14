<?php

function retornar_perfiles_creados($selector = true)
{
    $query = <<<QUERY
	SELECT id, title	
	FROM profiles
	WHERE status = 'A' 
	ORDER BY title
QUERY;

    $resultado = ($recurso == FALSE) ? consultar($query) : ejecutar_query($query);
    $salida = array();
    if (($resultado != FALSE) && (count($resultado) > 0)) {
        if ($selector) {
            foreach ($resultado as $key => $val) {
                $id = $val['id'];
                $nombre = $val['title'];
                $salida[$id] = utf8_decode($nombre);
            }
        } else {
            $salida = $resultado;
        }
    }
    return $salida;
}

function retornar_hoteles($id_dif = '', $id_hotel = '')
{
    if (!empty($id_dif)) {
        $where = " AND hoteles_id != '$id_dif'";
    }

    if (!empty($id_hotel)) {
        $where = " AND hoteles_id = '$id_hotel'";
    }

    $query = <<<QUERY
	SELECT hoteles_id as id, hoteles_titulo as nombre
	FROM reservas_hoteles
	WHERE hoteles_estado = 'A' $where
	ORDER BY hoteles_orden
QUERY;
    $resultado = ($recurso == FALSE) ? consultar($query) : ejecutar_query($query);
    $salida = array();
    if (($resultado != FALSE) && (count($resultado) > 0)) {
        while (list($key, $val) = each($resultado)) {
            $id = $val['id'];
            $nombre = $val['nombre'];
            $salida[$id] = $nombre;
        }
    }
    return $salida;
}
