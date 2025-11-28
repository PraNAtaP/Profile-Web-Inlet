<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (file_exists(__DIR__ . $uri)) {
    return false;
}

$cleanUrl = str_replace('/public', '', $uri);
$cleanUrl = ltrim($cleanUrl, '/');

$_GET['url'] = $cleanUrl;

chdir('public');
require 'index.php';
