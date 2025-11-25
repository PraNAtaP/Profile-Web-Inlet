<?php

// public/index.php

// Muat semua file controller
foreach (glob(__DIR__ . '/../app/controllers/*.php') as $filename) {
    require_once $filename;
}

// Ambil URI yang diminta
$requestUri = $_SERVER['REQUEST_URI'];

// Hapus query string dari URI
$requestUri = strtok($requestUri, '?');

// Muat definisi rute
$allRoutes = require_once __DIR__ . '/../routes/routes.php';

// Tentukan metode request (GET, POST, dll.)
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Cari rute yang cocok
$matched = false;
if (isset($allRoutes[$requestMethod])) {
    foreach ($allRoutes[$requestMethod] as $route => $handler) {
        // Ubah rute menjadi pola regex
        $pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '([a-zA-Z0-9_]+)', $route);
        $pattern = '#^' . $pattern . '$#';

        if (preg_match($pattern, $requestUri, $matches)) {
            // Hapus URI lengkap dari matches
            array_shift($matches);

            // Ambil nama controller dan method
            $controllerName = $handler[0];
            $methodName = $handler[1];

            // Buat instance controller
            $controller = new $controllerName();

            // Panggil method dengan parameter dari URI
            call_user_func_array([$controller, $methodName], $matches);

            $matched = true;
            break;
        }
    }
}

// Jika tidak ada rute yang cocok, tampilkan halaman 404
if (!$matched) {
    http_response_code(404);
    echo "404 Not Found";
}
