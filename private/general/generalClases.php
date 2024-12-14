<?php
class ValidateCampos
{

    public static function validarDatos($tipo, $obligatorio = "S", $string = "", $columna = "", $nro_minimo = 1, $nro_max = 0, $contar_error = true)
    {
        global $error_validacion_datos, $error_validacion_datos_array, $parametro;
        $error_validacion_datos_array = array();
        if ($obligatorio == "S" && strlen($string) == 0) {
            $error_validacion_datos++;
            $parametro["$columna"] = "";
            return false;
        }

        if ($obligatorio == "N" && strlen($string) == 0) {
            return true;
        }
        if ($nro_minimo > 0 && strlen($string) > 0 && strlen($string) < $nro_minimo) {
            $error_validacion_datos++;
            $parametro["$columna"] = "";
            return false;
        }
        if ($nro_max > 0 && strlen($string) > 0 && strlen($string) > $nro_max) {
            $error_validacion_datos++;
            $parametro["$columna"] = "";
            return false;
        }
        $preg = "";
        $date = false;
        switch ($tipo) {
            case "email":
                $preg = "/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/";
                break;
            case "texto":
                $preg = "/^[a-zA-Z0-9ñÑáàäâªÁÀÂÄéèëêÉÈÊËÊíìïîÍÌÏÎóòöôÓÒÖÔÓúùüûÚÙÛÜçÇ ]+$/";
                break;
            case "alfanumerico":
                $preg = "/^[a-zA-Z0-9ñÑáàäâªÁÀÂÄéèëêÉÈÊËÊíìïîÍÌÏÎóòöôÓÒÖÔÓúùüûÚÙÛÜç°,;()Ç?:@+-_#.~ ]+$/";
                break;
            case "date":
                //10
                $date = true;
                $string = str_replace("/", "-", $string);
                $preg = "/^[0-9-]+$/";
                break;
            case "timestamp":
                //19
                $date = true;
                $string = str_replace("/", "-", $string);
                $string = str_replace(":", "_", $string);
                $preg = "/^[0-9-_ ]+$/";
                break;
            case "numero":
                $preg = "/^[0-9]+$/";
                break;
            case "float":
                $preg = "/^[0-9.,-]+$/";
                break;
            case "url":
                $preg = "/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";
                break;
            default:
                $error_validacion_datos++;
                $parametro["$columna"] = "";
                return false;
                break;
        }

        if (preg_match($preg, $string) && strlen($string) > 0) {
            if ($date) {
                $string = str_replace("_", ":", $string);
            }
            $parametro["$columna"] = $string;
            return $string;
        } else {
            $error_validacion_datos++;
            $parametro["$columna"] = "";
            return false;
        }
    }
}
