<?php

define("MYPOS" , __DIR__);
define("SLASH" ,"\\");

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

spl_autoload_register(function ($class_name) {   
    $class_name = str_replace('\\','/',$class_name);
    $class_name = strtolower($class_name);
    include_once MYPOS."/".$class_name . '.php';    
});

new \Mod\Router\Router;
?>