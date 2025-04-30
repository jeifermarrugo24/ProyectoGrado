<?php

require __DIR__ . '/../../../private/general/PHPMailer/src/Exception.php';
require __DIR__ . '/../../../private/general/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/../../../private/general/PHPMailer/src/SMTP.php';
require __DIR__ . '/../../../private/btca/mails/view.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ModelMail
{
    public function enviar_notificacion($datos)
    {
        $_viewNotificacion  = new viewMail;

        $referencia = $datos['referencia'];
        $tipo_notificacion = $datos['tipo_notificacion'];

        if ($tipo_notificacion == 'recepcion_libro') {

            $especific_prestamo = ModelPrestamos::specific_prestamos($referencia);
            $id = $especific_prestamo['id'];
            $id_estudiante = $especific_prestamo['id_estudiante'];
            $id_libro = $especific_prestamo['id_libro'];
            $fecha_prestamo = $especific_prestamo['fecha_prestamo'];
            $fecha_devolucion = $especific_prestamo['fecha_devolucion'];
            $cantidad = $especific_prestamo['cantidad'];
            $observacion = $especific_prestamo['observacion'];

            $especific_usuario = ModelUsuarios::especific_user($id_estudiante);
            $nombre_usuario = $especific_usuario['nombre'];
            $email_usuario = $especific_usuario['correo'];

            $especific_libro = ModelLibros::espefic_libro($id_libro);
            $titulo = $especific_libro['titulo'];
            $id_autor = $especific_libro['id_autor'];
            $imagen = $especific_libro['imagen'];

            $especific_autor = ModelAutores::especific_autor($id_autor);
            $autor_nombre = $especific_autor['autor_nombre'];
            $autor_apellido = $especific_autor['autor_apellido'];
            $data_prestamo = array(
                'id_usuario' => $id_estudiante,
                'nombre_usuario' => $nombre_usuario,
                'id_libro' => $id_libro,
                'titulo' => $titulo,
                'fecha_prestamo' => $fecha_prestamo,
                'fecha_devolucion' => $fecha_devolucion,
                'cantidad' => $cantidad,
                'observacion' => $observacion,
                'id_autor' => $id_autor,
                'nombre_autor' => $autor_nombre . ' '  . $autor_apellido,
                'imagen_libro' => $imagen,
            );

            $html = $_viewNotificacion->retornarHtmlCorreoRecepcionLibro($data_prestamo);
            $email_array = array();

            if (!empty($email_usuario)) {
                $email_array[] = $email_usuario;
            }

            if (!empty($correo_agencia)) {
                $email_array[] = $correo_agencia;
            }

            if (!empty($email_ejecutivo)) {
                $email_array[] = $email_ejecutivo;
            }

            $envio_correo = $this->sendMailPhpMailer($email_array, $html, "Recepcion del libro $titulo  - Biblioteca JES");

            if ($envio_correo != false) {
                $respuesta = true;
            } else {
                $respuesta = false;
            }
        }

        if ($tipo_notificacion == 'ingreso_prestamo') {

            $especific_prestamo = ModelPrestamos::specific_prestamos($referencia);
            $id = $especific_prestamo['id'];
            $id_estudiante = $especific_prestamo['id_estudiante'];
            $id_libro = $especific_prestamo['id_libro'];
            $fecha_prestamo = $especific_prestamo['fecha_prestamo'];
            $fecha_devolucion = $especific_prestamo['fecha_devolucion'];
            $cantidad = $especific_prestamo['cantidad'];
            $observacion = $especific_prestamo['observacion'];

            $especific_usuario = ModelUsuarios::especific_user($id_estudiante);
            $nombre_usuario = $especific_usuario['nombre'];
            $email_usuario = $especific_usuario['correo'];
            $img_perfil_usuario = $especific_usuario['img_perfil'];


            $especific_libro = ModelLibros::espefic_libro($id_libro);
            $titulo = $especific_libro['titulo'];
            $id_autor = $especific_libro['id_autor'];
            $imagen = $especific_libro['imagen'];
            $id_materia = $especific_libro['id_materia'];

            $especific_categoria = ModelCategorias::especific_categoria($id_materia);
            $materia = $especific_categoria['materia'];

            $especific_autor = ModelAutores::especific_autor($id_autor);
            $autor_nombre = $especific_autor['autor_nombre'];
            $autor_apellido = $especific_autor['autor_apellido'];
            $autor_imagen = $especific_autor['autor_imagen'];

            $data_prestamo = array(
                'id_prestamo' => $id,
                'id_usuario' => $id_estudiante,
                'nombre_usuario' => $nombre_usuario,
                'correo_usuario' => $email_usuario,
                'id_libro' => $id_libro,
                'titulo' => $titulo,
                'categoria' => $materia,
                'fecha_prestamo' => $fecha_prestamo,
                'fecha_devolucion' => $fecha_devolucion,
                'cantidad' => $cantidad,
                'observacion' => $observacion,
                'id_autor' => $id_autor,
                'nombre_autor' => $autor_nombre . ' '  . $autor_apellido,
                'imagen_libro' => $imagen,
                'imagen_usuario' => $img_perfil_usuario,
                'autor_imagen' => $autor_imagen
            );

            $html = $_viewNotificacion->retornarHtmlCorreoPrestamoLibros($data_prestamo);
            $email_array = array();

            if (!empty($email_usuario)) {
                $email_array[] = $email_usuario;
            }

            if (!empty($correo_agencia)) {
                $email_array[] = $correo_agencia;
            }

            if (!empty($email_ejecutivo)) {
                $email_array[] = $email_ejecutivo;
            }

            $envio_correo = $this->sendMailPhpMailer($email_array, $html, "Nuevo prestamo del libro $titulo a $nombre_usuario - Biblioteca JES");

            if ($envio_correo != false) {
                $respuesta = true;
            } else {
                $respuesta = false;
            }
        }


        return $respuesta;
    }
    private function connection_phpMailer($username, $password, $SMTPSecure, $port)
    {
        $this->mail = new PHPMailer(true);
        try {
            $this->mail->SMTPDebug = 0;
            $this->mail->isSMTP();
            $this->mail->Host = 'smtp.gmail.com'; // DEPENDE DE LA CONFIGURACION DEL HOST O MAIL
            $this->mail->SMTPAuth = true;
            $this->mail->Username = $username;
            $this->mail->Password = $password;
            $this->mail->SMTPSecure = $SMTPSecure;
            $this->mail->Port = $port;
            return true;
        } catch (Exception $e) {
            echo 'Error al establecer la conexión SMTP: ' . $e->getMessage();
            return false;
        }
    }

    public function sendMailPhpMailer($to, $body, $subject = "", $cc = "", $is_html = true)
    {
        $credenciales_correo = $this->obtenerCredenciales('correo_electronico');
        $pass = $credenciales_correo['password'];

        $conexion = $this->connection_phpMailer('noreplybjes@gmail.com', "$pass", 'tls', 587);

        if ($conexion) {
            try {
                $this->mail->setFrom('noreplybjes@gmail.com', 'Biblioteca Jes');
                if (is_array($to)) {
                    foreach ($to as $address) {
                        $this->mail->addAddress($address);
                    }
                } else {
                    $this->mail->addAddress($to);
                }

                if (is_array($cc)) {
                    foreach ($cc as $cco) {
                        $this->mail->addCC($cco);
                    }
                } elseif (!empty($cc)) {
                    $this->mail->addCC($cc);
                }

                $this->mail->isHTML($is_html);
                $this->mail->Subject = $subject;
                $this->mail->Body = $body;
                $this->mail->send();
                return true;
            } catch (Exception $e) {
                echo "Error de envío: " . $this->mail->ErrorInfo;
                die;
            }
        }
    }

    private function obtenerCredenciales($tipo_credencial)
    {
        $query = "SELECT * FROM credenciales WHERE 1 = 1 AND tipo_credencial = '$tipo_credencial'";

        $result = consultar($query);

        return $result[0];
    }
}
