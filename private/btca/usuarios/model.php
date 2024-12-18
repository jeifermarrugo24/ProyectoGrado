<?php
class ModelUsuarios
{

    public static function list_perfiles()
    {
        $query = "SELECT * FROM perfiles WHERE 1 = 1 AND perfil_estado = 'A' AND perfil_id != '1' ORDER BY perfil_nombre ASC";

        $result = consultar($query);

        return $result;
    }
}
