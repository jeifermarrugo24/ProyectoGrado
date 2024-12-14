<?php

////////////////////////////////////////////////////////////////////////////////
// Modulo: lib_db.inc
// Objetivo: Contine funciones de acceso a la base de datos en Postgres
// Fecha: 2024/12/09
////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////
// Funcion: consultar($transaccion)
// Objetivo: Establece una conexi� a la base de datos y retorna resultados en arreglo
// Retorna: Arreglo si la expresion es ejecutada con exito o FALSE
////////////////////////////////////////////////////////////////////////////////

function consultar($transaccion)
{
    global $usuario_db, $bd, $puerto_usuario_db_web, $clave_usuario_db_web, $host_usuario_db_web;

    $recurso = @mysqli_connect($host_usuario_db_web, $usuario_db, $clave_usuario_db_web, $bd);

    if ($recurso == FALSE) {
        return "Error al conectar a la base de datos: " . mysqli_connect_error();
    }

    $resultado = @mysqli_query($recurso, $transaccion);

    if ($resultado == FALSE) {
        $error = mysqli_error($recurso);
        echo "Error en la consulta SQL: " . $error;
        @mysqli_close($recurso);
        return FALSE;
    }

    $vec_resul = array();
    while ($fila = @mysqli_fetch_assoc($resultado)) {
        $vec_resul[] = $fila;
    }

    @mysqli_close($recurso);

    return $vec_resul;
}



////////////////////////////////////////////////////////////////////////////////
// Funcion: consultar_geolocation($transaccion)
// Objetivo: Establece una conexi� a la base de datos y retorna resultados en arreglo
// Retorna: Arreglo si la expresion es ejecutada con exito o FALSE
////////////////////////////////////////////////////////////////////////////////

function consultar_geolocation($transaccion)
{
    global $usuario_db, $bd_geolocation, $puerto_usuario_db_web, $clave_usuario_db_web, $host_usuario_db_web;

    $recurso = @mysqli_connect($host_usuario_db_web, $usuario_db, $clave_usuario_db_web, $bd_geolocation, $puerto_usuario_db_web);

    if ($recurso == FALSE) {
        return FALSE;
    }

    $resultado = @mysqli_query($recurso, $transaccion);

    if ($resultado == FALSE) {
        @mysqli_close($recurso);
        return FALSE;
    } else {
        $vec_resul = array();
        while ($fila = @mysqli_fetch_assoc($resultado)) {
            $vec_resul[] = $fila;
        }
    }

    @mysqli_close($recurso);

    return $vec_resul;
}


////////////////////////////////////////////////////////////////////////////////
// Funcion: consultar($transaccion)
// Objetivo: Establece una conexi� a la base de datos y retorna resultados en arreglo
// Retorna: Arreglo si la expresion es ejecutada con exito o FALSE
////////////////////////////////////////////////////////////////////////////////

function consultar_portal($transaccion)
{
    global $usuario_db, $bd_portal, $puerto_usuario_db_web, $clave_usuario_db_web, $host_usuario_db_web;

    $recurso = @pg_connect("$host_usuario_db_web $puerto_usuario_db_web $bd_portal $usuario_db $clave_usuario_db_web");
    if ($recurso == FALSE)
        return FALSE; //No existe conexi� a la BD.
    $resultado = @pg_query($recurso, $transaccion);
    if ($resultado == FALSE) {
        @pg_close($recurso);
        return FALSE;
    } else {
        $vec_resul = array();
        $registros = @pg_num_rows($resultado);
        for ($reg = 0; $reg < $registros; $reg++) {
            $vec_resul[] = @pg_fetch_array($resultado, $reg, PGSQL_ASSOC);
        }
    }
    @pg_close($recurso);
    return $vec_resul; // Retorna Arreglo Asociativo con los resultados
}

////////////////////////////////////////////////////////////////////////////////
// Funcion: insertar($transaccion)
// Objetivo: Establece una conexi� a la base de datos e inserta datos
// Retorna: Arreglo si la expresion es ejecutada con exito o FALSE
////////////////////////////////////////////////////////////////////////////////

function insertar($transaccion)
{
    global $usuario_db, $bd, $puerto_usuario_db_web, $clave_usuario_db_web, $host_usuario_db_web;

    $recurso = @mysqli_connect($host_usuario_db_web, $usuario_db, $clave_usuario_db_web, $bd, $puerto_usuario_db_web);

    if ($recurso != FALSE) {
        $result = @mysqli_query($recurso, $transaccion);

        $str = mysqli_error($recurso);

        // if (!empty($str)) echo $str . " .... " . $transaccion;

        @mysqli_close($recurso);

        if ($result != FALSE) {
            return $result;
        } else {
            return FALSE;
        }
    }

    return FALSE;
}


////////////////////////////////////////////////////////////////////////////////
// Funcion: insertar_traer_id($transaccion, $secuencia)
// Objetivo: Establece una conexion a la base de datos e inserta datos
// Retorna: Arreglo si la expresion es ejecutada con exito o FALSE
////////////////////////////////////////////////////////////////////////////////

function insertar_traer_id($transaccion)
{
    global $usuario_db, $bd, $puerto_usuario_db_web, $clave_usuario_db_web, $host_usuario_db_web;

    $database = @mysqli_connect($host_usuario_db_web, $usuario_db, $clave_usuario_db_web, $bd, $puerto_usuario_db_web);

    if ($database != FALSE) {
        $result = @mysqli_query($database, $transaccion);

        if ($result != FALSE) {
            $id = @mysqli_insert_id($database);
            @mysqli_close($database);
            return $id;
        } else {
            @mysqli_close($database);
            return FALSE;
        }
    }
    return FALSE;
}


////////////////////////////////////////////////////////////////////////////////
// Funcion: actualizar($transaccion)
// Objetivo: Establece una conexion a la base de datos y actualiza datos
// Retorna: Arreglo si la expresion es ejecutada con exito o FALSE
////////////////////////////////////////////////////////////////////////////////

function actualizar($transaccion)
{
    global $usuario_db, $bd, $puerto_usuario_db_web, $clave_usuario_db_web, $host_usuario_db_web;

    $database = @mysqli_connect($host_usuario_db_web, $usuario_db, $clave_usuario_db_web, $bd, $puerto_usuario_db_web);

    if ($database != FALSE) {
        $result = @mysqli_query($database, $transaccion);

        $resError = @mysqli_error($database);

        @mysqli_close($database);

        return $result;
    }

    return FALSE; // La conexión falló
}


function inicializar_query()
{
    global $usuario_db, $bd, $puerto_usuario_db_web, $clave_usuario_db_web, $host_usuario_db_web;

    $recurso = @mysqli_connect($host_usuario_db_web, $usuario_db, $clave_usuario_db_web, $bd, $puerto_usuario_db_web);

    if ($recurso == FALSE) {
        return FALSE;
    }

    $res = @mysqli_query($recurso, "START TRANSACTION");

    if ($res == FALSE) {
        @mysqli_close($recurso);
        return FALSE;
    }

    return $recurso;
}


////////////////////////////////////////////////////////////////////////////////
// Funcion: confirmar_query()
// Objetivo: Establece una conexion a la base de datos y retorna resultados en arreglo
// Retorna:
////////////////////////////////////////////////////////////////////////////////

function confirmar_query($recurso)
{
    if ($recurso == FALSE) {
        return FALSE; // No se recibió un recurso válido
    }
    $res = @mysqli_query($recurso, "COMMIT");
    @mysqli_close($recurso);

    return $res;
}


////////////////////////////////////////////////////////////////////////////////
// Funcion: cancelar_query()
// Objetivo: Establece una conexion a la base de datos y retorna resultados en arreglo
// Retorna:
////////////////////////////////////////////////////////////////////////////////

function cancelar_query($recurso)
{
    if ($recurso == FALSE) {
        return FALSE;
    }

    $res = @mysqli_query($recurso, "ROLLBACK");

    @mysqli_close($recurso);

    return $res;
}

////////////////////////////////////////////////////////////////////////////////
// Funcion: ejecutar_query($transaccion)
// Objetivo: Establece una conexion a la base de datos y retorna resultados en arreglo
// Retorna: Arreglo si la expresion es ejecutada con exito o FALSE
////////////////////////////////////////////////////////////////////////////////

function ejecutar_query($recurso, $transaccion, $secuencia = FALSE)
{
    if ($recurso == FALSE) {
        return FALSE;
    }

    $resultado = @mysqli_query($recurso, $transaccion);

    if ($resultado == FALSE) {
        @mysqli_close($recurso);
        return FALSE;
    } else {
        $tipo1 = '';
        $tipo2 = '';
        $tokens = preg_split('/\s+/', trim($transaccion), 3);

        $tipo1 = strtoupper($tokens[0] ?? '');
        $tipo2 = strtoupper($tokens[1] ?? '');

        if ($tipo1 == 'SELECT' && $tipo2 != 'INTO') {
            $resul = [];
            while ($fila = @mysqli_fetch_assoc($resultado)) {
                $resul[] = $fila;
            }
        } elseif ($tipo1 == 'INSERT' && $secuencia) {
            $res = @mysqli_query($recurso, "SELECT LAST_INSERT_ID() as id");
            $vec_resul = @mysqli_fetch_assoc($res);
            $resul = $vec_resul['id'] ?? FALSE;
        } else {
            $resul = TRUE;
        }
    }
    return $resul;
}
