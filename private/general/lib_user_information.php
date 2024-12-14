<?php
function validate_session_data($data)
{
    global $url_servidor;
    $information = $data; //base64_decode(json_decode($data));
    $user_login = $information['user_login'];
    $password_login = $information['password_login'];
    $result = search_user_authentication($user_login, $password_login);

    if ($result != false) {
        session_start();
        $code = '200';
        $msj = 'Usuario y contraseña correctos, ingresando...';
        $result = $result[0];
        //$destination_url='./private';
        $destination_url = $url_servidor . '/btca';
        $_SESSION['USER_ID'] = $result['id'];
        $_SESSION['USER_NAME'] = $result['nombre'];
        $_SESSION['USER_LAST_NAME'] = $result['last_name'];
        $_SESSION['USER_PROFILE'] = $result['perfil'];
        $_SESSION['USER_IMG_PERFIL'] = $result['img_perfil'];
        $_SESSION['USER_CART_ID'] = '';
        $_SESSION['USER_CART_TOKEN'] = '';



        //include_once __DIR__ . '/model.php';
        //$result = ModelAlojamiento::createCart($result['id']); //CREAMOS CARRITO PARA CADA PERSONA
    } else {
        $code = '401';
        $msj = 'Este usuario no existe, por favor verifique su informacion.';
    }

    $retorno = json_encode(
        array(
            "code" => $code,
            "message" => $msj,
            "destination_url" => $destination_url
        )
    );

    return $retorno;
}

function check_session_status()
{
    $retorno = false;

    if (isset($_SESSION['USER_ID']) && strlen(trim($_SESSION['USER_ID'])) > 0) {
        if (isset($_SESSION['USER_PROFILE'])) {
            if ($_SESSION['USER_PROFILE'] == 4) {
                if (isset($_SESSION['USER_AGENCY_CODE']) && strlen(trim($_SESSION['USER_AGENCY_CODE'])) > 0) {
                    $retorno = array(
                        "user_id" => $_SESSION['USER_ID'],
                        "user_name" => $_SESSION['USER_NAME'],
                        "user_last_name" => $_SESSION['USER_LAST_NAME'],
                        "user_imagen" => $_SESSION['USER_IMG_PERFIL']
                    );
                } else {
                    return false;
                }
            } else {
                $retorno = array(
                    "user_id" => $_SESSION['USER_ID'],
                    "user_name" => $_SESSION['USER_NAME'],
                    "user_last_name" => $_SESSION['USER_LAST_NAME'],
                    "user_imagen" => $_SESSION['USER_IMG_PERFIL']
                );
            }
        }
    }
    return $retorno;
}

function search_user_authentication($user, $password)
{
    $retorno = false;
    $user = trim($user);
    $password = md5(trim($password));
    $query = "
    SELECT id, usuario, nombre, perfil, img_perfil, estado FROM usuarios WHERE usuario = '$user' AND clave = '$password' AND estado='1' LIMIT 1
";
    $result = consultar($query);

    return $result;
}

function cerrar_sesion_actual()
{

    global $url_servidor;

    $code = '200';
    $msj = 'Usted ha salido correctamente del sistema';
    $destination_url = $url_servidor;
    $_SESSION = array();

    $retorno = json_encode(
        array(
            "code" => $code,
            "message" => $msj,
            "destination_url" => $destination_url
        )
    );

    return $retorno;
}
