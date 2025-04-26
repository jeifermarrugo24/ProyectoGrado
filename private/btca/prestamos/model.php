<?php
class ModelPrestamos
{
    public static function ingresar_prestamo_libro($data)
    {

        $usuario = $data['usuario'];
        $fecha_prestamo = $data['fecha_prestamo'];
        $fecha_exp = $data['fecha_exp'];
        $cantidad = $data['cantidad'];
        $observaciones = $data['observaciones'];
        $estado = $data['estado'];
        $id_libro = $data['id_libro'];

        $datos = explode(",", $usuario);
        $id_usuario = $datos[0];

        $sqlquery = "INSERT INTO prestamo (id_estudiante, id_libro, fecha_prestamo, fecha_devolucion, cantidad, observacion, estado) VALUES ('$id_usuario', '$id_libro', '$fecha_prestamo', '$fecha_exp', '$cantidad', '$observaciones', '$estado')";

        $res = insertar($sqlquery);

        if ($res) {

            $query = "SELECT cantidad FROM libro WHERE 1 = 1 AND id = '$id_libro'";
            $result = consultar($query)[0];
            if ($result) {
                $cantidad_actual = $result['cantidad'];
                $cantidad_restante = $cantidad_actual - $cantidad;
                $query = "UPDATE libro SET cantidad = '$cantidad_restante' WHERE id = '$id_libro'";
                $result = actualizar($query);
            }
        }

        return $res;
    }

    public static function editar_prestamo_libro($data)
    {
        $usuario = $data['usuario'];
        $fecha_prestamo = $data['fecha_prestamo'];
        $fecha_exp = $data['fecha_exp'];
        $cantidad = $data['cantidad'];
        $observaciones = $data['observaciones'];
        $estado = $data['estado'];
        $id_libro = $data['id_libro'];
        $id = $data['id_select'];

        $datos = explode(",", $usuario);
        $id_usuario = $datos[0];

        $sqlquery = "UPDATE prestamo SET id_estudiante = '$id_usuario', id_libro = '$id_libro', fecha_prestamo = '$fecha_prestamo', fecha_devolucion = '$fecha_exp', cantidad = '$cantidad', observacion = '$observaciones', estado = '$estado' WHERE id = '$id'";

        $res = actualizar($sqlquery);

        if ($res) {
            $query = "SELECT cantidad FROM libro WHERE 1 = 1 AND id = '$id_libro'";
            $result = consultar($query)[0];
            if ($result) {
                $cantidad_actual = $result['cantidad'];
                if ($estado == 'I') {
                    $cantidad_restante = $cantidad_actual + $cantidad;
                } else {
                    $cantidad_restante = $cantidad_actual;
                }
                $query = "UPDATE libro SET cantidad = '$cantidad_restante' WHERE id = '$id_libro'";
                $result = actualizar($query);
            }
        }

        return $res;
    }

    public static function prestamos_list()
    {
        $query = "SELECT * FROM prestamo WHERE 1 = 1";

        $result = consultar($query);

        return $result;
    }

    public static function specific_prestamos($id_prestamo)
    {
        $query = "SELECT * FROM prestamo WHERE 1 = 1 AND id = '$id_prestamo'";

        $result = consultar($query);

        return $result[0];
    }
}
