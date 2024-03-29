<?php
define('DIR_ROOT_NAME','tripdeal');
define('ROOT_PATH', 'E:\xampp\htdocs/');
define('PROJECT_PATH',ROOT_PATH.DIR_ROOT_NAME);
// HTTP
define('HTTP_SERVER', 'http://localhost/'. DIR_ROOT_NAME . '/doi-tac/');
define('HTTP_CATALOG', 'http://localhost/'. DIR_ROOT_NAME . '/');

// HTTPS
define('HTTPS_SERVER', 'http://localhost/'. DIR_ROOT_NAME . '/doi-tac/');
define('HTTPS_CATALOG', 'http://localhost/'. DIR_ROOT_NAME . '/');

// DIR
define('DIR_APPLICATION', PROJECT_PATH.'/doi-tac/');
define('DIR_SYSTEM', PROJECT_PATH.'/system/');
define('DIR_DATABASE', PROJECT_PATH.'/system/database/');

define('DIR_LANGUAGE', PROJECT_PATH.'/doi-tac/language/');
define('DIR_TEMPLATE', PROJECT_PATH.'/doi-tac/view/template/');

define('DIR_CONFIG', PROJECT_PATH.'/system/config/');
define('DIR_IMAGE', PROJECT_PATH.'/image/');
define('DIR_CACHE', PROJECT_PATH.'/system/cache/');
define('DIR_DOWNLOAD', PROJECT_PATH.'/download/');
define('DIR_LOGS', PROJECT_PATH.'/system/logs/');
define('DIR_CATALOG', PROJECT_PATH.'/catalog/');

// DB
define('DB_DRIVER', 'mysqli');
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'tripdeal');
define('DB_PREFIX', '');
?>
