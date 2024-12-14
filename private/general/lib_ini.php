<?php


if ($_SERVER['SERVER_NAME'] == 'localhost') {
    define('DB_HOST_WEB', 'localhost');
    define('DB_NAME_WEB', 'proyecto_grado_biblioteca');
    define('DB_USER_WEB', 'root');
    define('DB_PASS_WEB', '');
    define('DB_PORT_WEB', '');
} /*else if ($_SERVER['SERVER_NAME'] == 'demos.smartinfo.co') {
    define('DB_HOST_WEB', '127.0.0.1');
    define('DB_NAME_WEB', 'smartinfo_doradoplaza_extranet');
    define('DB_USER_WEB', 'smartinfo_web');
    define('DB_PASS_WEB', 'smartinfo.04');
    define('DB_PORT_WEB', '5432');
} else {
    define('DB_HOST_WEB', '127.0.0.1');
    define('DB_NAME_WEB', 'doradoplaza_extranet2023');
    define('DB_USER_WEB', 'doradoplaza');
    define('DB_PASS_WEB', 'X_I@2]=my9$I');
    define('DB_PORT_WEB', '5432');
}*/
define('DB_NAME_GEOLOCATION', 'proyecto_grado_biblioteca');

define('IS_DEMOS', TRUE);
define('ID_HOTEL', 3);
