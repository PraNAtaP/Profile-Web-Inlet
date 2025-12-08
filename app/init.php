<?php
if( !session_id() ) session_start();
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/core/App.php';
require_once __DIR__ . '/core/Controller.php';
require_once __DIR__ . '/core/Database.php';
require_once __DIR__ . '/core/Flasher.php'; 
spl_autoload_register(function ($class) {
    $path = __DIR__ . '/core/' . $class . '.php';
    if (file_exists($path)) require_once $path;
});