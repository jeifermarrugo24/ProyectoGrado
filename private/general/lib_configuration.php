<?php

function depurar_dump($variable)
{
    ob_start();
    var_dump($variable);
    $string = ob_get_clean();
    depurar($string);
}

function depurar($somecontent)
{
    global $id_usuario_actual;
    $filename = 'dump.txt';
    $current = file_get_contents($filename);
    $current .= "$somecontent\n";
    file_put_contents($filename, $current);
}

require_once 'lib_ini.php';
/* ///////////////////////////////////////////////////////////////
  // Modulo: lib_configuracion.inc
  // Fecha: 2010/09/20
  // autor: MC
  // Descripcion: Funciones Generales de Soporte
  /////////////////////////////////////////////////////////////// */

////////////////////// Variables Globales //////////////////////////////////////
if (is_array($_SERVER)) {
    if (isset($_SERVER['SERVER_NAME'])) {
        $servidor = strip_tags($_SERVER['SERVER_NAME']);
    } else {
        $servidor = "externo";
    }
    if (isset($_SERVER['SERVER_ADDR'])) {
        $dir_ip = strip_tags($_SERVER['SERVER_ADDR']);
    } else {
        $dir_ip = "externo";
    }
    if (isset($_SERVER['SCRIPT_NAME'])) {
        $directorio = strip_tags($_SERVER['SCRIPT_NAME']);
    } else {
        $directorio = "externo";
    }
    if (isset($_SERVER['SCRIPT_NAME'])) {
        $php = $_SERVER['SCRIPT_NAME'];
    } else {
        $php = "externo";
    }
}

if (IS_DEMOS) {
    $ruta = "https://" . $servidor . dirname($directorio);
    if ($servidor == 'localhost') {
        $ruta = "http://" . $servidor . dirname($directorio);
    }
    $puerto_usuario_db_web = "port=" . DB_PORT_WEB;
    $clave_usuario_db_web = DB_PASS_WEB;
    $host_usuario_db_web = DB_HOST_WEB;
    $url_page = "/localhost/biblioteca_proyecto_grado/private";
} else {
    $ruta = "https://" . $servidor;
    $puerto_usuario_db_web = "port=" . DB_PORT_WEB;
    $clave_usuario_db_web = "password=" . DB_PASS_WEB;
    $host_usuario_db_web = "host=" . DB_HOST_WEB;
    $url_page = "/localhost/biblioteca_proyecto_grado/private";
}

$usuario_db = DB_USER_WEB;
$bd = DB_NAME_WEB;
$url_servidor = $ruta;
$url_reservas = "reserva-ahora";
$url_reservas = "reservas";
$url_administracion = "$url_servidor/mantenimiento";
$bd_geolocation = 'dbname=' . DB_NAME_GEOLOCATION;

$id_agencia_actual = 3;

/* ///////////////////////////////////////////////////////////////
  Costantes Globales
  /////////////////////////////////////////////////////////////// */

define("ITEMS_CONSULTAS", 15);

if (!empty($_GET)) {
    foreach ($_GET as $name => $value) {
        if (is_string($value)) {
            $$name = trim($value);
        } else {
            $$name = $value;
        }
    }
}

if (!empty($_POST)) {
    foreach ($_POST as $name => $value) {
        if (is_string($value)) {
            $$name = trim($value);
        } else {
            $$name = $value;
        }
    }
}

if (!empty($_FILES)) {
    while (list($name, $value) = each($_FILES)) {
        $nom = $name . "_name";
        $$nom = $_FILES[$name]['name'];
        $nom = $name . "_type";
        $$nom = $_FILES[$name]['type'];
        $nom = $name . "_size";
        $$nom = $_FILES[$name]['size'];
        $nom = $name . "_tmp_name";
        $$nom = $_FILES[$name]['tmp_name'];
    }
}
//////////////////////Variables Globales
if (!isset($tarea_programada) && $tarea_programada != 'listo') {
    $nombre_sesion = "bibliotecaVirtual*";
    session_name($nombre_sesion);
    session_start();
    //depurar("SESS2: ".json_encode($_SESSION));
    if (!empty($_SESSION)) {
        while (list($name, $value) = each($_SESSION)) {
            $$name = $value;
        }
    }
}

////////////////////// Variables Globales de url//////////////////////////////////////
$nombre_proyecto = "biblioteca-virtual";
$ruta_imagen = "public/tools/images";
$ruta_recursos = "tools";
