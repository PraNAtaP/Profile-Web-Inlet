<?php

class App
{
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        // 1. Cek Controller dengan ABSOLUTE PATH (__DIR__)
        // __DIR__ mengacu pada folder 'app/core', jadi kita naik satu level ke 'controllers'
        if (isset($url[0])) {
            $targetFile = __DIR__ . '/../controllers/' . ucfirst($url[0]) . '.php';
            
            if (file_exists($targetFile)) {
                $this->controller = ucfirst($url[0]);
                unset($url[0]);
            }
        }

        // Require Controller juga pakai Absolute Path biar aman
        require_once __DIR__ . '/../controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // 2. Cek Method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // 3. Cek Params
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // Jalankan
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        $url = $_SERVER['REQUEST_URI'];
        
        // Bersihkan query string
        if ($pos = strpos($url, '?')) {
            $url = substr($url, 0, $pos);
        }

        $url = trim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);

        if($url != "") {
             return explode('/', $url);
        }
        
        return [];
    }
}