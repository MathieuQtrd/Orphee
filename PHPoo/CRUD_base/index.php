<?php  
define('ROOT_PATH', __DIR__);
// à modifier !!!
define('ROOT_URL', 'http://localhost/PHP_orphee_18/PHPoo/CRUD_base/');

require_once 'Core/Autoload.php';

$router = new Core\Router;

$router->route();