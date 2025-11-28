<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Load Config
require_once 'config/config.php';

// Load Core Libraries
spl_autoload_register(function ($className) {
    require_once 'core/' . $className . '.php';
});
