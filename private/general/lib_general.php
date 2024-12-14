<?php

$arreglo_tipo_documentos = array("application/pdf", "application/msword", "application/msexcel", "application/vnd.ms-excel", "text/plain", "application/zip");
$arreglo_tipo_imagen = array("image/gif", "image/png", "image/jpeg", "image/pjpeg");
$arreglo_tipos_files = array('doc' => 'Word', 'docx' => 'Word', 'xls' => 'Excel', 'xlsx' => 'Excel', 'pps' => 'Power', 'ppt' => 'Power', 'pptx' => 'Power', 'jpg' => 'Imagen', 'gif' => 'Imagen', 'jpeg', 'png' => 'Imagen', 'bmp' => 'Imagen', 'zip' => 'Zip');

$arreglo_meses_es = array("1" => "Enero", "2" => "Febrero", "3" => "Marzo", "4" => "Abril", "5" => "Mayo", "6" => "Junio", "7" => "Julio", "8" => "Agosto", "9" => "Septiembre", "10" => "Octubre", "11" => "Noviembre", "12" => "Diciembre");
$arreglo_meses_en = array("1" => "January", "2" => "February", "3" => "March", "4" => "April", "5" => "May", "6" => "June", "7" => "July", "8" => "August", "9" => "September", "10" => "October", "11" => "November", "12" => "December");
$meses_resumidos = array("1" => "Ene", "2" => "Feb", "3" => "Mar", "4" => "Abr", "5" => "May", "6" => "Jun", "7" => "Jul", "8" => "Ago", "9" => "Sept", "10" => "Oct", "11" => "Nov", "12" => "Dic");
$meses_resumidos_en = array("1" => "Jan", "2" => "Feb", "3" => "Mar", "4" => "Apr", "5" => "May", "6" => "Jun", "7" => "Jul", "8" => "Aug", "9" => "Sep", "10" => "Oct", "11" => "Nov", "12" => "Dec");
$arreglo_exp_regulares = array(
    "strmail" => "/^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)+/",
    "strnumero" => "/^(\+|-)?\\d+$/",
    "strfloat" => "/^(((\+|-)?\d+(\.\d*)?)|((\+|-)?(\d*\.)?\d+))$/",
    "strcadena" => "/^\\s*\\S+\\s*/",
    "strmovil" => "/^\d{5,20}$/",
    "strfecha" => "/^[1-9]\\d\\d\\d-[0-1]\\d-[0-3]\\d$/"
);
$dias_en = array(0 => "Sunday", 1 => "Monday", 2 => "Tuesday", 3 => "Wednesday", 4 => "Thursday", 5 => "Friday", 6 => "Saturday");
$dias_es = array(0 => "Domingo", 1 => "Lunes", 2 => "Martes", 3 => "Mi&eacute;rcoles", 4 => "Jueves", 5 => "Viernes", 6 => "S&aacute;bado");
$tipos_identificacion = array("1" => "C&eacute;dula", "2" => "Pasaporte", "3" => "Tarjeta de Identidad", "4" => "C&eacute;dula de extranjer&iacute;a", "5" => "N.I.T.");

/* Arreglos Dorado */
$arreglo_acomodaciones = array('1' => 'SGL', '2' => 'DBL', '3' => 'TPL', '4' => 'CPL');
$arreglo_forma_pago = array('1' => 'En l&iacute;nea', '2' => 'Consignaciones', '3' => 'Transferencias', '4' => 'Cupo de credito');

//FORMA PAGO EVENTOS
$arreglo_condicional = array('si' => 'Si', 'no' => 'No');

/* General de Paagos */
$arreglo_estados_pagos = array('P' => 'Pendiente', 'C' => 'Cancelado', 'A' => 'Aprobado');

/* Arreglos Gema Tours */
$arreglo_estados_basicos = array('A' => 'Activo', 'I' => 'Inactivo');
$arreglo_estados_reservas = array('P' => 'Sin confirmar', 'C' => 'Confirmada', 'R' => 'Abierta', 'I' => 'Cancelada');
$arreglo_estados_reservas_extranet = array('P' => 'Pendiente', 'C' => 'Cancelada', 'A' => 'Aprobada');
$arreglo_tipos_incrementos_tarifas = array("1" => "%", "2" => "Valor");
$arreglo_si_no = array("S" => "Si", "N" => "No");
$arreglo_tipos_especif = array("numerico" => "Numerico", "texto" => "Texto", "cadena" => "Cadena");
$arr_tipoh = array("1" => "Normal", "2" => "Boutique", "3" => "Hospeder&iacute;a", "4" => "Finca", '5' => 'Apartamento', '6' => 'Caba&ntilde;a', '7' => 'Casa Flotante', '8' => 'Ecohab', '9' => 'Maloka');
$arreglo_nacionalidades_agencias = array("N" => "Nacional", "I" => "Internacional");
$arreglo_tipos_agencias = array("Mayorista" => "Mayorista", "Minorista" => "Minorista");
$arreglo_tipos_incrementos = array("1" => "%", "2" => "U.S.");
$arreglo_tipos_alimentacion = array('DESAYUNO' => 'DESAYUNO', 'MEDIA PENSI&Oacute;N' => 'MEDIA PENSI&Oacute;N', 'PENSI&Oacute;N COMPLETA' => 'PENSI&Oacute;N COMPLETA', 'FULL' => 'FULL', 'TODO INCLUIDO' => 'TODO INCLUIDO');
$arreglo_tipos_alimentacion_en = array('DESAYUNO' => 'BREAKFAST', 'MEDIA PENSI&Oacute;N' => 'HALF BOARD', 'PENSI&Oacute;N COMPLETA' => 'FULL BOARD', 'FULL' => 'FULL BOARD PLUS DRINKS', 'TODO INCLUIDO' => 'ALL INCLUSIVE');
$arreglo_unds_tiempo = array('H' => 'Hrs', 'M' => 'Mins');
$arreglo_impuestos_hoteles = array(1 => 'Seguro hotelero', 2 => 'Contribuci&oacute;n al turismo');
$arreglo_tipos_monedas = array('2' => 'USD', '1' => 'COP');
$arreglo_tipos_monedas_2 = array('COP' => 'COP', 'USD' => 'USD',);
$arreglo_tipos_transfers = array('1' => 'In', '2' => 'Out', '3' => 'Otro');
/* ////////////////// */


/* DATOS DE BRAZALETES */
$estados_brazaletes = array(
    'A' => 'Activo',
    'O' => 'Entregado',
    'D' => 'Devuelto',
    'I' => 'Inactivo',
);

$nombre_bd_hoteles = array('4' => '_andes', '2' => '_cartagena', '3' => '', '5' => '_sanfelipe', '6' => '_isla'); //3: dorado

function retornar_nombre_bd_hoteles()
{
    global $nombre_bd_hoteles;
    return $nombre_bd_hoteles;
}

function retornar_options_cantidades($max = 10)
{
    $array_cantidades = array();
    //$array_anticipacion[0] = "0 meses";
    for ($i = 1; $i <= $max; $i++)
        $array_cantidades[$i] = $i;

    return $array_cantidades;
}

function timeago($date)
{
    $timestamp = strtotime($date);

    $strTime = array("Segundo", "Minuto", "Hora", "Dia", "Mese", "Año");
    $length = array("60", "60", "24", "30", "12", "10");

    $currentTime = time();
    if ($currentTime >= $timestamp) {
        $diff     = time() - $timestamp;
        for ($i = 0; $diff >= $length[$i] && $i < count($length) - 1; $i++) {
            $diff = $diff / $length[$i];
        }

        $diff = round($diff);
        return "Hace " . $diff . " " . $strTime[$i] . "(s) Atras";
    }
}


function calcularValorImpuesto($precio_con_iva, $porc)
{
    $precio_sin_iva = calcularPrecioSinPorcentaje($precio_con_iva, $porc);
    return $precio_con_iva - $precio_sin_iva;
}

function calcularPrecioPorcentaje($sin_iva, $porc = 19)
{
    $con_iva = $sin_iva + ($porc * ($sin_iva / 100));
    return $con_iva;
    // 	return round($con_iva, 2);
}

function calcularPrecioSinPorcentaje($precio, $porc = 19)
{
    $valor = $precio / (1 + ($porc / 100));
    return $valor;
}

/*///////////////////////////////////////////////////////////////
// Funcion: formato_moneda()
// Fecha: 2010/04/09
// Descripcion:
// Observaciones:
 ////////////////////////////////////////////////////////////////*/
function formato_moneda($valor, $decimales = 0)
{
    return number_format($valor, $decimales);
}
/*///////////////////////////////////////////////////////////////
    // Funcion: retornar_consecutivo()
    // Fecha: 2014/02/18
    ////////////////////////////////////////////////////////////////*/
function retornar_consecutivo($valor)
{
    if ($valor < 9)
        $consecutivo = '0000' . $valor;
    else if ($valor < 99)
        $consecutivo = '000' . $valor;
    else if ($valor < 999)
        $consecutivo = '00' . $valor;
    else if ($valor < 9999)
        $consecutivo = '0' . $valor;
    else
        $consecutivo = $valor;
    return $consecutivo;
}
/*///////////////////////////////////////////////////////////////
// Funcion: retornar_acomodaciones()
// Fecha: 2010/04/09
////////////////////////////////////////////////////////////////*/
function retornar_acomodaciones()
{
    global $arreglo_acomodaciones;
    return $arreglo_acomodaciones;
}
/*///////////////////////////////////////////////////////////////
// Funcion: retornar_forma_pago()
// Fecha: 2010/04/09
////////////////////////////////////////////////////////////////*/

function retornar_arreglo_condicional()
{
    global $arreglo_condicional;
    return $arreglo_condicional;
}

function retornar_forma_pago()
{
    global $arreglo_forma_pago;
    return $arreglo_forma_pago;
}
/*///////////////////////////////////////////////////////////////
// Funcion: retornar_tipos_incrementos()
// Fecha: 2010/04/09
// Descripcion:
// Observaciones:
////////////////////////////////////////////////////////////////*/
function retornar_tipos_monedas()
{
    global $arreglo_tipos_monedas;
    return $arreglo_tipos_monedas;
}

function retornar_tipos_monedas_code()
{
    global $arreglo_tipos_monedas_2;
    return $arreglo_tipos_monedas_2;
}
/*///////////////////////////////////////////////////////////////
// Funcion: retornar_arreglo_cantidades ()
// Fecha: 2009/09/07
// Autor: Manuel Cogua
////////////////////////////////////////////////////////////////*/
function retornar_arreglo_cantidades($ini, $fin)
{
    $salida = array();
    for ($i = $ini; $i <= $fin; $i++) {
        $salida[$i] = $i;
    }
    return $salida;
}
/*///////////////////////////////////////////////////////////////
// Funcion: retornar_tipo_alimentacion ()
// Fecha: 2009/09/07
// Autor: Manuel Cogua
////////////////////////////////////////////////////////////////*/
function retornar_tipo_alimentacion($la = '')
{
    global $arreglo_tipos_alimentacion, $arreglo_tipos_alimentacion_en;
    if ($la == 'en')
        return $arreglo_tipos_alimentacion_en;
    return $arreglo_tipos_alimentacion;
}
/*///////////////////////////////////////////////////////////////
// Funcion: retornar_nacionalidades_agencias()
// Fecha: 2010/04/09
// Descripcion:
// Observaciones:
 ////////////////////////////////////////////////////////////////*/

function retornar_nacionalidades_agencias()
{
    global $arreglo_nacionalidades_agencias;
    return $arreglo_nacionalidades_agencias;
}
/*///////////////////////////////////////////////////////////////
 // Funcion: retornar_unds_tiempo()
 // Fecha: 2010/04/09
 // Descripcion:
 // Observaciones:
 ////////////////////////////////////////////////////////////////*/
function retornar_unds_tiempo()
{
    global $arreglo_unds_tiempo;
    return $arreglo_unds_tiempo;
}
/*///////////////////////////////////////////////////////////////
 // Funcion: retornar_tipos_hoteles()
 // Fecha: 2010/04/09
 // Descripcion:
 // Observaciones:
 ////////////////////////////////////////////////////////////////*/
function retornar_estados_basicos()
{
    global $arreglo_estados_basicos;
    return $arreglo_estados_basicos;
}
/*///////////////////////////////////////////////////////////////
 // Funcion: retornar_tipos_hoteles()
 // Fecha: 2010/04/09
 // Descripcion:
 // Observaciones:
 ////////////////////////////////////////////////////////////////*/
function retornar_estados_reservas()
{
    global $arreglo_estados_reservas;
    return $arreglo_estados_reservas;
}
/*///////////////////////////////////////////////////////////////
 // Funcion: retornar_tipos_hoteles()
 // Fecha: 2010/04/09
 // Descripcion:
 // Observaciones:
 ////////////////////////////////////////////////////////////////*/
function retornar_tipos_especificaciones()
{
    global $arreglo_tipos_especif;
    return $arreglo_tipos_especif;
}
/*///////////////////////////////////////////////////////////////
 // Funcion: retornar_tipos_hoteles()
 // Fecha: 2010/04/09
 // Descripcion:
 // Observaciones:
 ////////////////////////////////////////////////////////////////*/
function retornar_estados_tarifarios()
{
    global $arreglo_estados_tarifarios;
    return $arreglo_estados_tarifarios;
}
/*///////////////////////////////////////////////////////////////
 // Funcion: retornar_tipos_hoteles()
 // Fecha: 2010/04/09
 // Descripcion:
 // Observaciones:
 ////////////////////////////////////////////////////////////////*/
function retornar_tipos_hoteles()
{
    global $arr_tipoh;
    return $arr_tipoh;
}
/*///////////////////////////////////////////////////////////////
 // Funcion: retornar_si_no()
 // Fecha: 2010/04/09
 // Descripcion:
 // Observaciones:
 ////////////////////////////////////////////////////////////////*/
function retornar_si_no()
{
    global $arreglo_si_no;
    return $arreglo_si_no;
}
/*///////////////////////////////////////////////////////////////
 // Funcion: retornar_tipos_incrementos()
 // Fecha: 2010/04/09
 // Descripcion:
 // Observaciones:
 ////////////////////////////////////////////////////////////////*/
function retornar_tipos_incrementos_tarifas()
{
    global $arreglo_tipos_incrementos_tarifas;
    return $arreglo_tipos_incrementos_tarifas;
}
/*///////////////////////////////////////////////////////////////
 // Funcion: retornar_tipos_incrementos()
 // Fecha: 2010/04/09
 // Descripcion:
 // Observaciones:
 ////////////////////////////////////////////////////////////////*/
function retornar_tipos_incrementos()
{
    global $arreglo_tipos_incrementos;
    return $arreglo_tipos_incrementos;
}
/*///////////////////////////////////////////////////////////////
 // Funcion: get_array_pags()()
 // Fecha: 2009/04/01
 // Descripcion:
 // Retorna: Arreglo
 ////////////////////////////////////////////////////////////////*/
function retornar_tipos_agencias()
{
    global $arreglo_tipos_agencias;
    return $arreglo_tipos_agencias;
}
/*///////////////////////////////////////////////////////////////
 // Funcion: retornar_si_no()()
 // Fecha: 2009/04/01
 // Descripcion:
 // Retorna: Arreglo
 ////////////////////////////////////////////////////////////////*/
function retornar_tipos_contenidos()
{
    global $arreglo_tipos_contenidos;
    return $arreglo_tipos_contenidos;
}
/*///////////////////////////////////////////////////////////////
 // Funcion: retornar_horas()()
 // Fecha: 2009/04/01
 // Descripcion:
 // Retorna: Arreglo
 ////////////////////////////////////////////////////////////////*/
function retornar_horas()
{
    global $arreglo_horas;
    return $arreglo_horas;
}
/*///////////////////////////////////////////////////////////////
 // Funcion: retornar_abecedeario()()
 // Fecha: 2009/04/01
 // Descripcion:
 // Retorna: Arreglo
 ////////////////////////////////////////////////////////////////*/
function retornar_abecedario()
{
    global $arreglo_abecedario;
    return $arreglo_abecedario;
}
/*///////////////////////////////////////////////////////////////
 // Funcion: retornar_dias_semana()
 // Fecha: 2005/05/23
 // Descripcion: Retorna todos los meses en un arreglo (numero_mes=>nombre_mes)
 // Observaciones:
 ////////////////////////////////////////////////////////////////*/
function retornar_dias_semana($la = "es")
{
    $arreglo_meses = "dias_$la";
    global $$arreglo_meses;
    $arreglo_meses = $$arreglo_meses;
    return $arreglo_meses;
}
/*///////////////////////////////////////////////////////////////
 // Funcion: retornar_tipos_identificacion()
 // Fecha: 2004/06/01
 // Autor: Arnulfo Arias
 // Descripcion: Retorna todas las tipos de identificacion
 // Parametros:
 // Retorna: Arreglo que contiene los tipos
 // Observaciones:
 ////////////////////////////////////////////////////////////////*/
function retornar_tipos_identificacion()
{
    global $tipos_identificacion;
    return $tipos_identificacion;
}
/*///////////////////////////////////////////////////////////////
 // Funcion: retornar_expresiones_regulares()
 // Fecha: 2007/04/12
 // Descripcion:
 // Retorna:
 // Observaciones:
 ////////////////////////////////////////////////////////////////*/
function retornar_expresiones_regulares()
{
    global $arreglo_exp_regulares;
    return $arreglo_exp_regulares;
}

function retornar_tipos_archivos()
{
    global $arreglo_tipos_files;
    return $arreglo_tipos_files;
}

/*///////////////////////////////////////////////////////////////
 // Funcion: retornar_meses_resumido()
 // Fecha: 2005/05/23
 // Descripcion: Retorna todos los meses en un arreglo (numero_mes=>nombre_mes)
 // Observaciones:
 ////////////////////////////////////////////////////////////////*/
function retornar_meses($la = "es")
{


    $arreglo_meses = "arreglo_meses_$la";
    global $$arreglo_meses;
    $arreglo_meses = $$arreglo_meses;
    // 	$arreglo_meses=($resumidos)? $meses_resumidos: $meses;
    return $arreglo_meses;
}
/*///////////////////////////////////////////////////////////////
 // Funcion: $arreglo_tipo_documentos()
 // Fecha: 2006/02/10
 // Descripcion:
 // Parametros:
 // Retorna:
 // Observaciones:
 ////////////////////////////////////////////////////////////////*/
function retornar_tipo_documentos()
{
    global $arreglo_tipo_documentos;
    return $arreglo_tipo_documentos;
}
/*///////////////////////////////////////////////////////////////
 // Funcion: retornar_tipo_imagenes()
 // Fecha: 2006/02/10
 // Descripcion:
 // Parametros:
 // Retorna:
 // Observaciones:
 ////////////////////////////////////////////////////////////////*/
function retornar_tipo_imagenes()
{
    global $arreglo_tipo_imagen;
    return $arreglo_tipo_imagen;
}

/*///////////////////////////////////////////////////////////////
 // Funcin: fecha_actual()
 // Fecha: 2008/05/29
 // Autor: Efrain Herrera
 // Descripcion: Devuelve la Fecha Actual en Formato Dia de Mes de Anno
 // Parametros:
 // Retorna: Devuelve una cadena con la Fecha Actual
 // Observaciones:
 ////////////////////////////////////////////////////////////////*/
function fecha_actual($la = "es")
{
    $a_fecha = obtener_fecha();
    $mes = $a_fecha['mon'];
    $dia = $a_fecha['mday'];
    $anno = $a_fecha['year'];
    $ndia = $a_fecha['wday'];
    if ($la == "en") {
        $dias = array(0 => "Sunday", 1 => "Monday", 2 => "Tuesday", 3 => "Wednesday", 4 => "Thursday", 5 => "Friday", 6 => "Saturday");
        $arreglo_meses = array(1 => "January", 2 => "February", 3 => "March", 4 => "April", 5 => "May", 6 => "June", 7 => "July", 8 => "August", 9 => "September", 10 => "October", 11 => "November", 12 => "December");
        $de = "";
    } else {
        $dias = array(0 => "Domingo", 1 => "Lunes", 2 => "Martes", 3 => "Mi&eacute;rcoles", 4 => "Jueves", 5 => "Viernes", 6 => "S&aacute;bado");
        $arreglo_meses = array(1 => "Enero", 2 => "Febrero", 3 => "Marzo", 4 => "Abril", 5 => "Mayo", 6 => "Junio", 7 => "Julio", 8 => "Agosto", 9 => "Septiembre", 10 => "Octubre", 11 => "Noviembre", 12 => "Diciembre");
        $de = "de";
    }
    $mes_t = $arreglo_meses[$mes];
    $ndia = $dias[$ndia];
    $fecha = "$dia $de $mes_t $anno"; //$ndia,

    return $fecha;
}

/*///////////////////////////////////////////////////////////////
 // Funcin: fecha_formato_texto()
 // Fecha: 2009/04/24
 // Autor: Manuel Cogua
 // Descripcion: Devuelve una fecha en Formato Dia de Mes de Anno
 // Parametros:
 // Retorna: Devuelve una cadena con la Fecha recibida
 // Observaciones:
 ////////////////////////////////////////////////////////////////*/
function fecha_formato_texto($fecha, $la = '', $display_day = TRUE)
{
    $arreglo_fecha = retornar_diamesanno($fecha);
    $dia = $arreglo_fecha[0];
    $mes = $arreglo_fecha[1];
    $anno = $arreglo_fecha[2];
    $fecha_d = fecha_sistema("w.n.d.Y", mktime(0, 0, 0, $mes, $dia, $anno));
    $a_fecha = explode(".", $fecha_d);
    $mes = $a_fecha[1];
    $dia = $a_fecha[2];
    $anno = $a_fecha[3];
    $ndia = $a_fecha[0];
    if ($la == "en") {
        $dias = array(0 => "Sunday", 1 => "Monday", 2 => "Tuesday", 3 => "Wednesday", 4 => "Thursday", 5 => "Friday", 6 => "Saturday");
        $arreglo_meses = array(1 => "January", 2 => "February", 3 => "March", 4 => "April", 5 => "May", 6 => "June", 7 => "July", 8 => "August", 9 => "September", 10 => "October", 11 => "November", 12 => "December");
        $de = "";
    } else {
        $dias = array(0 => "Domingo", 1 => "Lunes", 2 => "Martes", 3 => "Mi&eacute;rcoles", 4 => "Jueves", 5 => "Viernes", 6 => "S&aacute;bado");
        $arreglo_meses = array(1 => "Enero", 2 => "Febrero", 3 => "Marzo", 4 => "Abril", 5 => "Mayo", 6 => "Junio", 7 => "Julio", 8 => "Agosto", 9 => "Septiembre", 10 => "Octubre", 11 => "Noviembre", 12 => "Diciembre");
        $de = "de";
    }
    $mes_t = $arreglo_meses[$mes];
    if ($display_day) {
        $ndia = $dias[$ndia];
        $fecha = "$ndia, $dia $de $mes_t $anno";
    } else
        $fecha = "$dia $de $mes_t $anno";

    return $fecha;
}

function fecha_hora_format_texto($fecha, $seg = FALSE)
{
    $fecha_aux = substr($fecha, 0, 10);
    $tam_time = 5;
    if ($seg)
        $tam_time = 8;
    $time = substr($fecha, 11, $tam_time);

    $arreglo_fecha = retornar_diamesanno($fecha_aux);
    $dia = $arreglo_fecha[0];
    $mes = $arreglo_fecha[1];
    $anno = $arreglo_fecha[2];
    $fecha_d = fecha_sistema("w.n.d.Y", mktime(0, 0, 0, $mes, $dia, $anno));
    $a_fecha = explode(".", $fecha_d);
    $mes = $a_fecha[1];
    $dia = $a_fecha[2];
    $anno = $a_fecha[3];
    $ndia = $a_fecha[0];
    /*if($la=="en"){
		 $dias=array(0=>"Sunday",1=>"Monday",2=>"Tuesday",3=>"Wednesday",4=>"Thursday",5=>"Friday",6=>"Saturday");
		 $arreglo_meses=array(1=>"January",2=>"February",3=>"March",4=>"April",5=>"May",6=>"June",7=>"July",8=>"August",9=>"September",10=>"October",11=>"November",12=>"December");
		 $de="";
		 }else{
		 $dias=array(0=>"Domingo",1=>"Lunes",2=>"Martes",3=>"Mi&eacute;rcoles",4=>"Jueves",5=>"Viernes",6=>"S&aacute;bado");
		 $arreglo_meses=array(1=>"Enero",2=>"Febrero",3=>"Marzo",4=>"Abril",5=>"Mayo",6=>"Junio",7=>"Julio",8=>"Agosto",9=>"Septiembre",10=>"Octubre",11=>"Noviembre",12=>"Diciembre");
		 $de="de";
		 }*/
    $arreglo_meses = retornar_meses_resumido($la);
    $mes_t = $arreglo_meses[$mes];
    return "$dia/$mes_t/$anno $time";
}

function fecha_formato1()
{
    $a_fecha = obtener_fecha();
    $m = $a_fecha['mon'];
    $d = $a_fecha['mday'];
    $a = $a_fecha['year'];

    $fecha = "$d / $m / $a";
    return $fecha;
}

function vinculo($url, $texto, $class)
{
    $link = "<a href=\"$url\" class=\"$class\">$texto</a>";
    return $link;
}

function tag_form($url, $nombre = "formulario", $method = "post")
{
    $form = "<form name=\"$nombre\" method=\"$method\" action=\"$url\">";
    return $form;
}
/*///////////////////////////////////////////////////////////////
 // Funcion: crearselector($nombre, $default, $opciones, $tipo)
 // Fecha:2006/01/23
 // Revision: 2006/01/23
 // Autor: SmartInfo LTDA. (servicio@smartinfobusiness.com)
 // Descripcion: Inicializa un Select
 // Parametros: $nombre : nombre del Selector en la pagina
 //             $default : Elemento Selected
 //             $opciones : Las opciones del Select
 //            $tipo : Si es asociativo o indexado por numero
 // Retorna: Un string
 // Observaciones:
 ////////////////////////////////////////////////////////////////*/
function crearselector($nombre, $default, $opciones, $tipo, $opc_def = FALSE, $attr = "", $id = '', $disabled = "")
{
    $ismultiple = false;
    if ($attr == "multiple='multiple'" && is_array($default)) {
        $ismultiple = true;
    }
    $id = (empty($id)) ? $nombre : $id;
    $select = "<select id='$id' name='$nombre' $attr $disabled>\n";
    if ($opc_def)
        if ($nombre == "orden_precio") {
            $select .= "<option value='$opc_def' selected>$opc_def</option>\n";
        } else {
            $select .= "<option value='' selected>$opc_def</option>\n";
        }
    if ($opciones != FALSE && is_array($opciones)) {
        $sw = FALSE;
        while (list($key, $val) = each($opciones)) {
            if ($tipo == TRUE) { //Caso en que sea asociativo

                $valor = $key;
                if ($key == $default && $sw == FALSE) {
                    $seleccionado = "selected";
                    $sw = TRUE;
                } else {
                    $seleccionado = "";
                }

                if ($ismultiple) {
                    foreach ($default as $value) {
                        if ($key == $value && $sw == FALSE) {
                            $seleccionado = "selected";
                        }
                    }
                }
            } else {

                $valor = $val;
                if ($val == $default && $sw == FALSE) {
                    $seleccionado = "selected";
                    $sw = TRUE;
                } else {
                    $seleccionado = "";
                }

                if ($ismultiple) {

                    foreach ($default as $value) {
                        if ($val == $value && $sw == FALSE) {
                            $seleccionado = "selected";
                        }
                    }
                }
            }


            $select .= <<<SELECT
<option value='$valor' $seleccionado>$val</option>\n
SELECT;
        }
    }
    $select .= "</select>\n";
    return $select;
}


/*///////////////////////////////////////////////////////////////
 // Funcion: crearCheckBoxArray($nombre, $default, $opciones, $tipo)
 // Fecha:2006/01/23
 // Revision: 2006/01/23
 // Autor: SmartInfo LTDA. (servicio@smartinfobusiness.com)
 // Descripcion: Inicializa un Select
 // Parametros: $nombre : nombre del Selector en la pagina
 //             $default : Elemento Selected
 //             $opciones : Las opciones del Select
 //            $tipo : Si es asociativo o indexado por numero
 // Retorna: Un string
 // Observaciones:
 ////////////////////////////////////////////////////////////////*/
function crearCheckboxes($nombre, $default, $opciones, $opc_def = FALSE, $attr = "", $id = '')
{
    $id = (empty($id)) ? $nombre : $id;
    $checkboxes = '';

    if ($opciones != FALSE && is_array($opciones)) {
        foreach ($opciones as $key => $val) {
            $checked = '';
            if (is_array($default) && in_array($key, $default)) {
                $checked = 'checked';
            } elseif ($default == $key) {
                $checked = 'checked';
            }

            $checkboxes .= <<<CHECKBOX
				<input class="custom-control custom-switch" type="checkbox" id="$id" name="$nombre" value="$key" $checked $attr> $val<br>
				CHECKBOX;
        }
    }

    $html = <<<HTML
				<div class="checkbox-group">$checkboxes</div>
				HTML;

    return $html;
}


/*///////////////////////////////////////////////////////////////
 // Funcion: crearselectorevento($nombre, $default, $opciones, $tipo, $evento)
 // Fecha: 2006/01/23
 // Autor: SmartInfo LTDA. (servicio@smartinfobusiness.com)
 // Descripcion: Inicializa un Select
 // Parametros: $nombre : nombre del Selector en la pagina
 //             $default : Elemento Selected
 //             $opciones : Las opciones del Select
 //            $tipo : Si es asociativo o indexado por numero
 //            $evento : Evento JavaScript asociado
 // Retorna: Un string
 // Observaciones:
 ////////////////////////////////////////////////////////////////*/
function crearselectorevento($nombre, $default, $opciones, $tipo, $evento, $opc_def = FALSE, $attr = '')
{

    $select = "<select id='$nombre' name='$nombre' $attr $evento>\n";
    if ($opc_def)
        $select .= "<option value='' selected>$opc_def</option>\n";
    if ($opciones != FALSE && is_array($opciones)) {
        while (list($key, $val) = each($opciones)) {
            if ($tipo == TRUE) { //Caso en que sea asociativo
                $valor = $key;
                if ($key == $default) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
            } else {
                $valor = $val;
                if ($val == $default) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
            }
            $select .= <<<SELECT
			<option value='$valor' $seleccionado>$val</option>\n
SELECT;
        }
    }
    $select .= "</select>\n";
    return $select;
}

/*///////////////////////////////////////////////////////////////
 // Funcion: verificar_sesion()
 // Fecha: 2009/09/05
 // Autor: Adolfredo Coneo
 // Descripcion: Verifica que exista un usuario logeado
 ////////////////////////////////////////////////////////////////*/
function verificar_sesion()
{
    session_start();
    if (isset($_SESSION["id_usuario_actual"]) && strlen($_SESSION["id_usuario_actual"]) > 0)
        return TRUE;
    else
        return FALSE;
}
/*///////////////////////////////////////////////////////////////
 // Funcion: convertir_caracteres_filtros($cadena)
 // Fecha: 2004/09/14
 // Autor: Victor Castillo
 // Descripcion: Retorna la cadena para poder realizar las consultas, ingreso y actualizaci� de datos.
 ////////////////////////////////////////////////////////////////*/
function convertir_caracteres_filtros($cadena)
{
    $servidor = $_SERVER['SERVER_NAME'];
    if (stripos($servidor, 'smartinfo.com.co') !== FALSE)
        $cadena_html = htmlentities($cadena);
    else
        $cadena_html = htmlentities($cadena, ENT_QUOTES, 'UTF-8');
    //$search=array("'\r\n'i");//add
    //$replace=array("<br>");//add
    //$cadena_texto=preg_replace($search, $replace, $cadena_html);
    $cadena_html = str_replace("�", "", $cadena_html);
    $cadena_html = str_replace("�", "", $cadena_html);
    $cadena_html = str_replace('�', '-', $cadena_html);
    $cadena_html = str_replace('�', '-', $cadena_html);
    $cadena_convertida = addslashes($cadena_html);
    return $cadena_convertida;
}

/*///////////////////////////////////////////////////////////////
 // Funcion: desconvertir_caracteres_filtros($cadena)
 // Fecha: 2004/09/14
 // Autor: Victor Castillo
 // Descripcion: Retorna la cadena sin los caracteres especiales de consultas de DB y Html.
 ////////////////////////////////////////////////////////////////*/
function desconvertir_caracteres_filtros($cadena)
{
    $cadena_convertida = stripslashes($cadena);
    $cadena_convertida = unhtmlentities($cadena_convertida);
    return $cadena_convertida;
}
/*///////////////////////////////////////////////////////////////
 // Funcion: unhtmlentities ($string)
 // Fecha: 2004/09/11
 // Autor: Arnulfo Arias
 // Descripcion: Retorna todas una cadena html legible
 // Retorna:
 ////////////////////////////////////////////////////////////////*/
function unhtmlentities($string)
{
    $trans_tbl = get_html_translation_table(HTML_ENTITIES);
    $trans_tbl = array_flip($trans_tbl);
    return strtr($string, $trans_tbl);
}
/*///////////////////////////////////////////////////////////////
 // Funcion: retornar_diamesanno ($fecha)
 // Fecha: 2005/05/23
 // Autor: Efrain Herrera
 // Descripcion: Recibe una fecha y retorna un arreglo  anno,mes,dia
 // Retorna:
 ////////////////////////////////////////////////////////////////*/
function retornar_diamesanno($fecha)
{
    $ano = substr($fecha, 0, 4);
    $mes = substr($fecha, 5, 2);
    $dia = substr($fecha, 8, 2);
    return array($dia, $mes, $ano);
}
/*///////////////////////////////////////////////////////////////
 // Funcion: retornar_diamesannotime ($fecha)
 // Fecha: 2005/05/23
 // Autor: Efrain Herrera
 // Descripcion: Recibe una fecha y retorna un arreglo  anno,mes,dia
 // Retorna:
 ////////////////////////////////////////////////////////////////*/
function retornar_diamesannotime($fecha_hora)
{
    $ano = substr($fecha_hora, 0, 4);
    $mes = substr($fecha_hora, 5, 2);
    $dia = substr($fecha_hora, 8, 2);
    $hora = substr($fecha_hora, 11, 2);
    $min = substr($fecha_hora, 14, 2);
    $seg = substr($fecha_hora, 17, 2);
    return array($ano, $mes, $dia, $hora, $min, $seg);
}
/*///////////////////////////////////////////////////////////////
 // Funcion: retornar_fecha_texto ($fecha,$resumidos)
 // Fecha: 2005/05/23
 // Autor: Efrain Herrera
 // Descripcion: Recibe una fecha y retorna un arreglo  anno,mes,dia
 // Retorna:
 ////////////////////////////////////////////////////////////////*/
function retornar_fecha_texto($fecha, $resumidos = false)
{
    $fecha_texto = "";
    if ($fecha) {
        $array_fecha = retornar_diamesanno($fecha);
        $array_meses = retornar_meses_resumido($resumidos);
        if (is_array($array_meses) && $array_fecha[0] && $array_fecha[1] && $array_fecha[2]) {
            $fecha_texto = (int)$array_fecha[0] . " " . $array_meses[(int)$array_fecha[1]] . " " . $array_fecha[2];
        }
    }
    return $fecha_texto;
}

/*///////////////////////////////////////////////////////////////
 // Funcion: retornar_meses_resumido()
 // Fecha: 2005/05/23
 // Descripcion: Retorna todos los meses en un arreglo (numero_mes=>nombre_mes)
 // Observaciones:
 ////////////////////////////////////////////////////////////////*/
function retornar_meses_resumido($la = "es")
{
    global $meses, $meses_resumidos, $meses_resumidos_en;
    if ($la == "en")
        $arreglo_meses = $meses_resumidos_en;
    else
        $arreglo_meses = $meses_resumidos;
    // 	$arreglo_meses=($resumidos)? $meses_resumidos: $meses;
    return $arreglo_meses;
}
/*///////////////////////////////////////////////////////////////
 // Funcion: retornar_meses_resumido()
 // Fecha: 2005/05/23
 // Descripcion: Retorna todos los meses en un arreglo (numero_mes=>nombre_mes)
 // Observaciones:
 ////////////////////////////////////////////////////////////////*/
function retornar_fecha_resumida($fecha, $la = "es")
{
    $arreglo_fecha = retornar_diamesanno($fecha);
    $arreglo_meses = retornar_meses_resumido($la);
    $dia = $arreglo_fecha[0];
    $mes = $arreglo_meses[$arreglo_fecha[1] + 0];
    $anno = $arreglo_fecha[2];
    return array($dia, $mes, $anno);
}
/*///////////////////////////////////////////////////////////////
 // Funcion: retornar_fecha_formateada($fecha, $opcion)
 // Fecha: 2005/05/23
 // Descripcion: Retorna todos los meses en un arreglo (numero_mes=>nombre_mes)
 // Observaciones:
 ////////////////////////////////////////////////////////////////*/
function retornar_fecha_formateada($fecha, $opcion = '1')
{
    $arreglo_fecha = retornar_fecha_resumida($fecha);
    if ($opcion == 1)
        $txt_fecha = "$arreglo_fecha[0]/$arreglo_fecha[1]/$arreglo_fecha[2]";

    return $txt_fecha;
}

/*///////////////////////////////////////////////////////////////
 // Funcion: retornar_meses_resumido()
 // Fecha: 2005/05/23
 // Descripcion: Retorna todos los meses en un arreglo (numero_mes=>nombre_mes)
 // Observaciones:
 ////////////////////////////////////////////////////////////////*/
function retornar_fecha($fecha, $la = "es")
{

    $arreglo_fecha = retornar_diamesanno($fecha);
    $arreglo_meses = retornar_meses($la);

    $dia = $arreglo_fecha[0];
    $mes = $arreglo_meses[$arreglo_fecha[1] + 0];
    $anno = $arreglo_fecha[2];

    return array($dia, $mes, $anno);
}
/*///////////////////////////////////////////////////////////////
 // Funcion: retornar_fecha_hora_actual()
 // Fecha: 2005/05/23
 // Descripcion:
 // Observaciones:
 ////////////////////////////////////////////////////////////////*/
function retornar_fecha_hora_actual()
{
    return fecha_sistema('Y-m-d H:i:s');
}
/*///////////////////////////////////////////////////////////////
 // Funcion: fecha_actual()
 ////////////////////////////////////////////////////////////////*/
function retornar_fecha_actual()
{
    return fecha_sistema('Y-m-d');
}
/*///////////////////////////////////////////////////////////////
 // Funcion: fecha_actual()
 ////////////////////////////////////////////////////////////////*/
function retornar_ip_actual()
{
    return getenv('REMOTE_ADDR');;
}
/*///////////////////////////////////////////////////////////////
 // Funcion retornarhora($hora, $minutos, $jornada)
 // hora: 2005/06/18
 // Autor: SmartInfo LTDA. (servicio@smartinfobusiness.com)
 // Descripcion: Contruye una hora en formato HH:MM:SS en SIGEP
 ///////////////////////////////////////////////////////////////*/
function retornarhora($hora, $minutos, $jornada)
{
    if ($jornada == 2 || $jornada == 3) {
        switch ($hora) {
            case "1":
                $hora = "13";
                break;
            case "2":
                $hora = "14";
                break;
            case "3":
                $hora = "15";
                break;
            case "4":
                $hora = "16";
                break;
            case "5":
                $hora = "17";
                break;
            case "6":
                $hora = "18";
                break;
            case "7":
                $hora = "19";
                break;
            case "8":
                $hora = "20";
                break;
            case "9":
                $hora = "21";
                break;
            case "10":
                $hora = "22";
                break;
            case "11":
                $hora = "23";
                break;
            default:
                $hora = "24";
        }
    } else {
        if ($hora < 10) {
            $hora = "0" . $hora;
        }
    }

    $hora_minutos_segundos = $hora . ":" . $minutos . ":" . "00";
    return $hora_minutos_segundos;
}

/*///////////////////////////////////////////////////////////////
 // Funcin reconstruirhora($hora)
 // hora: 2005/06/18
 // Autor: SmartInfo LTDA. (servicio@smartinfobusiness.com)
 // Descripcion: Contruye una hora en formato HH:MM:SS en SIGEP
 ///////////////////////////////////////////////////////////////*/
function reconstruirhora($hora)
{
    switch ($hora) {
        case "13":
            $hora = "1";
            break;
        case "14":
            $hora = "2";
            break;
        case "15":
            $hora = "3";
            break;
        case "16":
            $hora = "4";
            break;
        case "17":
            $hora = "5";
            break;
        case "18":
            $hora = "6";
            break;
        case "19":
            $hora = "7";
            break;
        case "20":
            $hora = "8";
            break;
        case "21":
            $hora = "9";
            break;
        case "22":
            $hora = "10";
            break;
        case "23":
            $hora = "11";
            break;
        default:
            $hora = "12";
    }

    return $hora;
}
/*///////////////////////////////////////////////////////////////
 // Funcion: retornar_hora_texto ($hora,$mostrar_segundos=false)
 // Fecha: 2005/09/14
 // Autor: Efrain Herrera
 // Descripcion: Recibe una hora y retorna con am o pm
 // Retorna:
 ////////////////////////////////////////////////////////////////*/
function retornar_hora_texto($hora, $mostrar_segundos = false)
{
    if (!$hora) return "";
    $h = (int)substr($hora, 0, 2);
    $m = substr($hora, 3, 2);
    $s = substr($hora, 6, 2);
    if ($h > 12) {
        $h = $h - 12;
        $hora_texto = "$h:$m" . (($mostrar_segundos) ? ":$s" : "") . "pm";
    } else {
        if ($h == 0) $h = 12;
        $hora_texto = "$h:$m" . (($mostrar_segundos) ? ":$s" : "") . "am";
    }
    return $hora_texto;
}

/*///////////////////////////////////////////////////////////////
 // Funcion: retornar_mayuscula_inicial()
 // Fecha: 2004/07/09
 // Autor: Efrain Herrera
 // Descripcion: Retorna un cadena con todas las letras iniciales en mayusculas
 // Parametros:
 ////////////////////////////////////////////////////////////////*/
function retornar_mayuscula_inicial($cadena)
{
    if ($cadena) {
        $cadena_array = split("[ ]+", $cadena);  //Separa por espacios
        $palabra = array();
        foreach ($cadena_array as $cad) {
            $palabra[] = ucfirst(strtolower($cad));
        }
        $cadena = join(" ", $palabra);
    }
    return $cadena;
}
/*///////////////////////////////////////////////////////////////
 // Funcion: verificar_fecha ($fecha)
 // Fecha: 2005/07/22
 // Autor: Efrain Herrera
 // Descripcion: Recibe una fecha (anno-mes-dia) y retorna si es correcta
 ////////////////////////////////////////////////////////////////*/
function verificar_fecha($fecha)
{
    $ano = substr($fecha, 0, 4);
    $mes = substr($fecha, 5, 2);
    $dia = substr($fecha, 8, 2);
    if (!preg_match("/^[0-9]{4}$/", $ano)) $ano = "0000";
    if (!preg_match("/^[0-9]{2}$/", $mes)) $mes = "00";
    if (!preg_match("/^[0-9]{2}$/", $dia)) $dia = "00";

    return checkdate($mes, $dia, $ano);
}

/*///////////////////////////////////////////////////////////////
 // Funcion: calcular_dias ($fecha1,$fecha2)
 // Fecha: 2014/03/08
 // Autor: Manuel Cogua
 // Descripcion: Recibe dos fecha y retorna el numero de dias
 ////////////////////////////////////////////////////////////////*/
function calcular_dias($fecha1, $fecha2)
{
    if (!verificar_fecha($fecha1) || !verificar_fecha($fecha2))
        return 0;
    /*$segundos=($seg_fecha1>$seg_fecha2)? $seg_fecha1-$seg_fecha2: $seg_fecha2-$seg_fecha1;
		 //$dias=ceil($segundos/(24*3600));
		 $dias=floor(abs($segundos/(24*3600)));
		 return $dias;*/
    if ($fecha1 > $fecha2) {
        $array_fecha = retornar_diamesanno($fecha2);
        $array_fechaF = retornar_diamesanno($fecha1);
    } else {
        $array_fecha = retornar_diamesanno($fecha1);
        $array_fechaF = retornar_diamesanno($fecha2);
    }
    $segundos_fechaF = mktime(0, 0, 0, (int)$array_fechaF[1], (int)$array_fechaF[0], (int)$array_fechaF[2]);
    for ($i = 0; mktime(0, 0, 0, (int)$array_fecha[1], (int)$array_fecha[0] + $i, (int)$array_fecha[2]) < $segundos_fechaF; $i++);
    return $i;
}

/*///////////////////////////////////////////////////////////////
 // Funcion agregar_dias($fecha, $dias)
 // Fecha: 2009/07/02
 // Autor: Manuel Cogua (servicio@smartinfobusiness.com)
 // Descripcion: Suma dias a una fecha
 ///////////////////////////////////////////////////////////////*/
function agregar_dias($fecha, $dias)
{
    $arreglo_fecha = retornar_diamesanno($fecha);
    $fecha_n = date("Y-m-d", mktime(0, 0, 0, $arreglo_fecha[1], $arreglo_fecha[0] + ($dias), $arreglo_fecha[2]));
    return $fecha_n;
}
/*///////////////////////////////////////////////////////////////
 // Funcin: recortar_texto($texto)
 // Fecha: 2005/11/18
 // Parametros: Texto, numero de caracteres a mostrar
 // Autor: Efrain Herrera
 // Retorna: Devuelve una cadena
 // Observaciones:
 ////////////////////////////////////////////////////////////////*/
function recortar_texto($texto, $cant)
{
    $texto = str_replace("<br>", "\n", $texto);
    $texto = unhtmlentities($texto);
    $texto = substr($texto, 0, $cant);
    $posicion = strrpos($texto, " ");
    if (!is_bool($posicion) && $posicion)
        $texto = substr($texto, 0, $posicion);
    $texto = convertir_caracteres_filtros($texto);
    return $texto;
}
/*///////////////////////////////////////////////////////////////
 // Funcion: resumen_texto($cadena, $num_caracteres)
 // Fecha: 2006/02/06
 // Autor: Arnulfo Arias
 // Descripcion:
 // Parametros:
 // Retorna:
 ////////////////////////////////////////////////////////////////*/
function resumen_texto($cadena, $num_caracteres)
{
    if (strlen($cadena) <= $num_caracteres)
        return $cadena;
    $resumen = '';
    $i = 0;
    while ($i < strlen($cadena) && (strlen($resumen) < $num_caracteres ||
        ($i >= $num_caracteres && $cadena[$i] != ' ')))
        $resumen .= $cadena[$i++];
    $resumen = str_replace("'", "&#39;", $resumen);
    return $resumen;
}

/*///////////////////////////////////////////////////////////////
 // Funcion: resumen_letras($cadena, $num_caracteres)
 // Fecha: 2006/02/06
 // Autor: Arnulfo Arias
 // Descripcion:
 // Parametros:
 // Retorna:
 ////////////////////////////////////////////////////////////////*/
function resumen_letras($cadena, $num_caracteres)
{
    $longitud = strlen($cadena);
    if ($longitud <= $num_caracteres)
        return $cadena;

    $resumen = substr($cadena, 0, $num_caracteres);

    return $resumen;
}
function fullUpper($str)
{
    // convert to entities
    //$subject = htmlentities($str,ENT_QUOTES);
    $pattern = '/&([a-z])(uml|acute|circ';
    $pattern .= '|tilde|ring|elig|grave|slash|horn|cedil|th);/e';
    $replace = "'&'.strtoupper('\\1').'\\2'.';'";
    $result = preg_replace($pattern, $replace, $str); //$result = preg_replace($pattern, $replace, $result);
    // convert from entities back to characters
    $htmltable = get_html_translation_table(HTML_ENTITIES);
    foreach ($htmltable as $key => $value) {
        $result = ereg_replace(addslashes($value), $key, $result);
    }
    return (strtoupper($result));
}
/*///////////////////////////////////////////////////////////////
 // Funcion: retornar_arreglo_rango_fechas ($fecha1,$fecha2)
 // Autor: Manuel Cogua
 // Descripcion: Recibe dos  rangos de fechas
 ////////////////////////////////////////////////////////////////*/
function retornar_arreglo_rango_fechas($fecha_i, $fecha_f)
{
    $dif_dias = calcular_dias($fecha_i, $fecha_f);
    $arreglo_fecha = retornar_diamesanno($fecha_i);
    $salida = array();
    for ($i = 0; $i <= $dif_dias; $i++) {
        $fecha = date('Y-m-d', mktime(0, 0, 0, $arreglo_fecha[1], $arreglo_fecha[0] + ($i), $arreglo_fecha[2]));
        $salida[] = $fecha;
    }
    return $salida;
}
/**
 * Trae el Timestamp del Sistema con diferencia de horario
 * @return int con el timestamp
 */
function traer_timestamp()
{
    $fecha = getdate();
    $diferencia_horario = true;
    if ($diferencia_horario) {
        $y = 0;
        $m = 0;
        $d = 0;
        $h = 0;
        $i = 0;
        $s = 0;
    } else {
        $y = 0;
        $m = 0;
        $d = 0;
        $h = 0;
        $i = 0;
        $s = 0;
    }
    $timestamp = mktime($fecha["hours"] + $h, $fecha["minutes"] + $i, $fecha["seconds"] + $s, $fecha["mon"] + $m, $fecha["mday"] + $d, $fecha["year"] + $y);
    return $timestamp;
}

/**
 * Retorna la fecha formateada
 * @param string $cadena formato de salida de la fecha
 * @param int $timestamp Unix timestamp para formatear
 * @return string la fecha con formato $cadena
 */
function fecha_sistema($cadena, $timestamp = 0)
{
    if ($timestamp < 1)
        $timestamp = traer_timestamp();

    return date($cadena, $timestamp);
}

/**
 * Retorna la fecha del Sistema
 * @param int $timestamp Unix timestamp
 * @return array la fecha en un arreglo definido por la funcion getdate
 */
function obtener_fecha($timestamp = 0)
{
    if ($timestamp < 1)
        $timestamp = traer_timestamp();

    return getdate($timestamp);
}

function agregar_fila_multilinea_pdf($pdf, $contenido, $border = 0, $background = 0)
{
    $longitud_maxima = 0;
    $sw = TRUE;
    $x_ini = $pdf->GetX();
    $y_ini = $pdf->GetY();
    if ($border == 1)
        $border_aux = 'TLR';
    else
        $border_aux = 0;
    reset($contenido);
    while (is_array($contenido) && (list($k1, $v1) = each($contenido))) {
        $valor = $v1['contenido'];
        $ancho = $v1['ancho'];
        $x_multi = $pdf->GetX();
        $pagina_ant = $pdf->PageNo();
        $pdf->is_multicell = TRUE;
        //$pdf->linea=$y_ini;
        $pdf->MultiCell($pdf->ancho_reporte * $ancho / 100, 15, $valor, $border_aux, $v1['align'], $background);
        $pdf->is_multicell = FALSE;
        $pdf->Cell($pdf->ancho_reporte * $ancho / 100, 0, '', 0, 0, 'L');
        $pagina_act = $pdf->PageNo();
        $y_fin = $pdf->GetY();
        if ($pagina_ant != $pagina_act) {
            $y_ini_pagant = $y_ini;
            $y_ini = $pdf->y_origen;
            //$pdf->linea=0;
            $sw = FALSE;
        } else {
            $alto = ($y_fin - $y_ini);
        }
        $pdf->SetXY($x_multi + $pdf->ancho_reporte * $ancho / 100, $y_ini);
        if ($alto > $longitud_maxima)
            $longitud_maxima = $alto;
    }
    //$sw=TRUE;
    $pdf->SetXY($x_ini, $y_ini);
    reset($contenido);
    while ($sw == TRUE && is_array($contenido) && (list($k1, $v1) = each($contenido))) {
        $valor = $v1['contenido'];
        $ancho = $v1['ancho'];
        $x_act = $pdf->GetX();
        $pdf->Cell($pdf->ancho_reporte * $ancho / 100, $longitud_maxima, '', $border, 0, $v1['align'], 0);
        $x_act = $pdf->GetX();
    }
    $pdf->Ln();
}

function redondear_mult_5($num)
{
    $res = (int) $num;
    $decimal = round(($num - intval($num)) * 10); //($num%10)/10;
    if ($decimal > 0) {
        if ($decimal == 5)
            $res += (5 / 10);
        else if ($decimal > 5)
            $res++;
        else
            $res += 0.5;
    }
    return $res;
}
function redondear_pesos_50($num)
{
    return $num;
    /*
	 $res = round($num, -2);
	 
	 $decimal = substr($num, -2);
	 
	 if ($decimal > 0) {
	 if($decimal<=25 )
	 $res;
	 elseif ($decimal<=75)
	 $res += 50;
	 else{
	 $res+=100;
	 }
	 }
	 
	 
	 return $res;*/

    $res = (int) $num;
    $decimal = round((($num - intval($num)) * 100), 2); //($num%10)/10;

    if ($decimal > 0) {
        /*if($decimal<=25 )
	 	 $res;
	 	 elseif ($decimal<=51)
	 	 $res += 0.5;
	 	 else{
	 	 $res++;
	 	 }*/
        $res++;
    }


    return $res;
}



function retornar_tipos_identificacion_()
{
    global $tipos_identificacion, $la, $tipos_identificacion_en;
    /*
	 $la = strtolower($la);
	 
	 if($la == "en")
	 return $tipos_identificacion_en;
	 
	 return $tipos_identificacion; */


    if ($la != "" && $la != "es") {
        $txt = "_en";
    }

    $transaccion = <<<HHH
            SELECT "tipo_id_valor","tipo_id_texto$txt" as text FROM "public"."web_allotment_tipo_id"
HHH;


    if ($recurso)
        $arreglo = ejecutar_query($recurso, $transaccion);
    else
        $arreglo = consultar($transaccion);


    if (is_array($arreglo) && count($arreglo) > 0) {

        foreach ($arreglo as $key => $value) {
            $salida[$value[tipo_id_valor]] = $value[text];
        }
    }

    return $salida;
    //global $tipos_identificacion;
    //return $tipos_identificacion;
}


function en_demos()
{
    $dir_ip = $_SERVER['SERVER_ADDR'];
    if (substr($dir_ip, 0, 7) == '192.168')
        return TRUE;
    else
        return FALSE;
}


function retornar_generos_persona()
{
    return array(
        "NA" => "No aplica",
        "F" => "Femenino",
        "M" => "Masculino"
    );
}

function retornar_status_general()
{
    return array(
        "0" => "Inactivo",
        "1" => "Activo"
    );
}


function retornar_status_general2()
{
    return array(
        "I" => "Inactivo",
        "A" => "Activo"
    );
}
function retornar_status_general3()
{
    return array(
        "S" => "Servicio",
        "P" => "Producto"
    );
}

function retornar_status_general4()
{
    return array(
        "I" => "Individual",
        "C" => "Combinado"
    );
}


function retornar_status_boton()
{
    return array(
        "edit" => "ACTUALIZAR",
        "view" => "VER",
        "ingresar" => "REGISTRAR"
    );
}


function retornar_validar_campos($arreglo_validar)
{

    $arreglo_exp = retornar_expresiones_regulares();

    $strcadena = $arreglo_exp["strcadena"];
    $strnumero = $arreglo_exp["strnumero"];
    $strmail = $arreglo_exp["strmail"];
    $strfecha = $arreglo_exp["strfecha"];
    $strfloat = $arreglo_exp["strfloat"];
    $strtelefono = $arreglo_exp["strtelefono"];
    foreach ($arreglo_validar as $k => $reg) {
        $tipo = $reg["tipo"];
        $nombre = $reg["nombre"];
        $requerido = $reg["requerido"];
        $campo_id = $reg['campo_id'];
        // echo $tipo . " " . $nombre . " " . $requerido . " " . $campo_id . "<br>";

        if ($requerido == 'S' && strlen($nombre) == 0) {
            $respuesta = false;
            $res[] = array('campo' => "$campo_id", 'msj' => "Campo Requerido");
        } else {
            if (strlen($nombre) > 0) {

                if ($tipo == 'S' && $nombre == 0) {
                    $respuesta = false;
                    //$res[]="Campo Requerido";
                    $res[] = array('campo' => "$campo_id", 'msj' => "Campo Requerido");
                }
                if ($tipo == 'C' && preg_match($strcadena, $nombre) == false) {
                    $respuesta = false;
                    //$res[]="Cadena Incorrecta";
                    $res[] = array('campo' => "$campo_id", 'msj' => "Cadena Incorrecta");
                }
                if ($tipo == 'N' && preg_match($strnumero, $nombre) == false) {
                    $respuesta = false;
                    //$res[]="Numero Incorrecto";

                    $res[] = array('campo' => "$campo_id", 'msj' => "Numero Incorrecto");
                }
                if ($tipo == 'F' && preg_match($strfecha, $nombre) == false) {
                    $respuesta = false;
                    //$res[]="Fecha Incorrecta";
                    $res[] = array('campo' => "$campo_id", 'msj' => "Fecha Incorrecta");
                }
                if ($tipo == 'M' && preg_match($strmail, $nombre) == false) {
                    $respuesta = false;
                    //$res[]="Correo Incorrecto";
                    $res[] = array('campo' => "$campo_id", 'msj' => "Correo Incorrecto");
                }
                if ($tipo == 'R' && preg_match($strfloat, $nombre) == false) {
                    $respuesta = false;
                    //$res[]="Real Incorrecta";
                    $res[] = array('campo' => "$campo_id", 'msj' => "Real Incorrecto");
                }
                if ($tipo == 'T' && preg_match($strtelefono, $nombre) == false && strlen($strtelefono) > 0 && strlen($strtelefono) <= 15) {
                    $respuesta = false;
                    //$res[]="Tel&eacute;fono Incorrecta";
                    $res[] = array('campo' => "$campo_id", 'msj' => "Tel&eacute;fono Incorrecto");
                }
            }
            // print_r($res);die;
        }
    }

    return @$res;
}

function uniqid_generate($cantidad = 4)
{ // cantidad de bits
    $val = true;
    $pre = bin2hex(openssl_random_pseudo_bytes($cantidad, $val));
    $unico = uniqid("$pre");
    return $unico;
}

function getRangeDate($date_ini, $date_end, $format = "Y-m-d")
{

    $dt_ini = DateTime::createFromFormat($format, $date_ini);
    $dt_end = DateTime::createFromFormat($format, $date_end);
    $period = new DatePeriod($dt_ini, new DateInterval('P1D'), $dt_end);
    $range = [];
    foreach ($period as $date) {
        $range[] = $date->format($format);
    }
    $range[] = $date_end;
    return $range;
}


function validar_fecha($fecha)
{
    $valores = explode('-', $fecha); //YYYY-MM-dd
    if (count($valores) == 3 && checkdate($valores[1], $valores[2], $valores[0])) {
        return true;
    }
    return false;
}
$arreglo_dias_semana_largo = array("1" => "Lunes", "2" => "Martes", "3" => "Mi&eacute;rcoles", "4" => "Jueves", "5" => "Viernes", "6" => "S&aacute;bado", "7" => "Domingo");
$arreglo_dias_semana = array("1" => "L", "2" => "M", "3" => "X", "4" => "J", "5" => "V", "6" => "S", "7" => "D");
$arreglo_dias_semana_inv = array("L" => "1", "M" => "2", "X" => "3", "J" => "4", "V" => "5", "S" => "6", "D" => "7");
$arreglo_meses_new_es = array("01" => "Enero", "02" => "Febrero", "03" => "Marzo", "04" => "Abril", "05" => "Mayo", "06" => "Junio", "07" => "Julio", "08" => "Agosto", "09" => "Septiembre", "10" => "Octubre", "11" => "Noviembre", "12" => "Diciembre");

function retornar_dias_semana_corto()
{
    global $arreglo_dias_semana;
    return $arreglo_dias_semana;
}

function retornar_dias_semana_largo()
{
    global $arreglo_dias_semana_largo;
    return $arreglo_dias_semana_largo;
}

function retornar_dias_semana_inv()
{
    global $arreglo_dias_semana_inv;
    return $arreglo_dias_semana_inv;
}

function formato_numerico($valor, $decimales = 0)
{
    return number_format($valor, $decimales, ',', '.');
}

function retornar_meses_new_es()
{
    global $arreglo_meses_new_es;
    return $arreglo_meses_new_es;
}


function formatearFecha($fechaOriginal)
{
    // Crear un objeto DateTime
    $fecha = new DateTime($fechaOriginal);

    // Establecer la configuración regional para obtener los meses en español
    setlocale(LC_TIME, 'es_ES.UTF-8');

    // Determinar si la fecha contiene información de hora
    $tieneHora = (date('H:i:s', strtotime($fechaOriginal)) != '00:00:00');

    // Formatear la fecha según si tiene o no tiene hora
    if ($tieneHora) {
        // Usar date para el formato de hora AM/PM
        $horaFormato = $fecha->format('h:i:s A'); // Formato de 12 horas con AM/PM
        $fechaFormateada = strftime("%d de %B de %Y", $fecha->getTimestamp()) . " a las " . $horaFormato;
    } else {
        $fechaFormateada = strftime("%d de %B de %Y", $fecha->getTimestamp());
    }

    return $fechaFormateada;
}
