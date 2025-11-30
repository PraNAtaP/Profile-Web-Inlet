<?php 

if( !session_id() ) session_start();

// FIX: Gunakan __DIR__ untuk menunjuk folder parent (app) dengan pasti
require_once __DIR__ . '/../app/init.php';

$app = new App;