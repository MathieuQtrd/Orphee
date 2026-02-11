<?php 
require_once 'Autoload.php';

Autoload::register();

$controller = new Controller\Controller;

$controller->handleRequest();