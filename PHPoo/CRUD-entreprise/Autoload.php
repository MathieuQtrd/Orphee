<?php 

class Autoload 
{
    public static function register()
    {
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    public static function autoload($className)
    {
        require_once __DIR__ . '/' . str_replace('\\', '/', $className . '.php');
    }
}