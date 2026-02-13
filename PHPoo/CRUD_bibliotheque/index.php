<?php  
define('ROOT_PATH', __DIR__);
// à changer !!!
define('ROOT_URL', 'http://localhost/PHP_orphee_18/PHPoo/CRUD_bibliotheque/');

require_once 'Core/Autoload.php';

$router = new Core\Router;

$router->route();