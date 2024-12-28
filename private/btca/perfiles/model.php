<?php

class ModelPerfiles
{
    public static function perfilesList()
    {
        $query = "SELECT * FROM perfiles WHERE 1 = 1 AND perfil_estado = 'A'";

        $result = consultar($query);

        return $result;
    }
}
