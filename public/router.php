<?php
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if (file_exists(__DIR__ . $uri)) {
    return false;
}
$_GET['url'] = ltrim($uri, '/');
require_once 'index.php';
