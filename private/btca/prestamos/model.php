<?php
require_once __DIR__ . '/../../../private/btca/mails/model.php';

class ModelPrestamos
{
    public static function ingresar_prestamo_libro($data)
    {

        $mail = new ModelMail();

        $usuario = $data['usuario'];
        $fecha_prestamo = $data['fecha_prestamo'];
        $fecha_exp = $data['fecha_exp'];
        $cantidad = $data['cantidad'];
        $observaciones = $data['observaciones'];
        $estado = $data['estado'];
        $id_libro = $data['id_libro'];

        $datos = explode(",", $usuario);
        $id_usuario = $datos[0];

        $sqlquery = "INSERT INTO prestamo (id_estudiante, id_libro, fecha_prestamo, fecha_devolucion, cantidad, observacion, recibido, estado) VALUES ('$id_usuario', '$id_libro', '$fecha_prestamo', '$fecha_exp', '$cantidad', '$observaciones', 'N','$estado')";

        $res = insertar_traer_id($sqlquery);

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

        $id_last_prestamo = $res;

        $array_correo = array(
            'referencia' => $id_last_prestamo,
            'tipo_notificacion' => 'ingreso_prestamo'
        );

        $mail->enviar_notificacion($array_correo);


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

    public static function prestamos_list($recibido = "")
    {
        if ($recibido != '') {
            $sql_condicion .= "AND recibido = '$recibido'";
        }

        $query = "SELECT * FROM prestamo WHERE 1 = 1 $sql_condicion";

        $result = consultar($query);

        return $result;
    }

    public static function specific_prestamos($id_prestamo)
    {
        $query = "SELECT * FROM prestamo WHERE 1 = 1 AND id = '$id_prestamo'";

        $result = consultar($query);

        return $result[0];
    }

    public static function recepcion_libro_prestado($data)
    {
        $mail = new ModelMail();

        $id_prestamo = $data['id_prestamo'];
        $data_prestamo = ModelPrestamos::specific_prestamos($id_prestamo);
        $id_libro = $data_prestamo['id_libro'];
        $cantidad_prestada = $data_prestamo['cantidad'];
        $fecha_actual = date('Y-m-d H:i:s');

        $sql_insert = "INSERT INTO recepcion_libros(recepcion_fecha, recepcion_id_prestamo, recepcion_id_libro) VALUES ('$fecha_actual','$id_prestamo','$id_libro')";

        $res = insertar($sql_insert);

        if ($res) {
            $sql_update = "UPDATE prestamo SET recibido = 'S' WHERE id = '$id_prestamo'";
            $res_update = actualizar($sql_update);
            if ($res_update) {
                $query = "SELECT cantidad FROM libro WHERE 1 = 1 AND id = '$id_libro'";
                $result = consultar($query)[0];
                if ($result) {
                    $cantidad_actual = $result['cantidad'];
                    $cantidad_total = $cantidad_actual + $cantidad_prestada;
                    $query = "UPDATE libro SET cantidad = '$cantidad_total' WHERE id = '$id_libro'";
                    $result = actualizar($query);
                }
            }
        }

        $array_correo = array(
            'referencia' => $id_prestamo,
            'tipo_notificacion' => 'recepcion_libro'
        );


        $mail->enviar_notificacion($array_correo);

        return $res;
    }
}
