<?php
// /routes/routes.php

// Rute untuk user biasa
$routes = [
    'GET' => [
        '/'             => ['HomeController', 'index'],     // Akses: / (Halaman Utama)
        '/about'        => ['HomeController', 'about'],     // Akses: /about
    ],
    'POST' => [
        // Rute POST untuk user biasa (misalnya kirim feedback)
    ]
];

// Rute untuk Admin (Diawali dengan /admin)
$adminRoutes = [
    'GET' => [
        '/admin/login'  => ['AdminController', 'showLogin'], // Akses: /admin/login (Menampilkan Form)
        '/admin/dashboard' => ['AdminController', 'dashboard'], // Akses: /admin/dashboard
        '/admin/crud/gallery' => ['GalleryController', 'index'],
        '/admin/crud/gallery/create' => ['GalleryController', 'create'],
        '/admin/crud/gallery/edit/{id}' => ['GalleryController', 'edit'],
        '/admin/crud/gallery/delete/{id}' => ['GalleryController', 'delete'],
        '/admin/crud/news' => ['NewsController', 'index'],
        '/admin/crud/news/create' => ['NewsController', 'create'],
        '/admin/crud/news/edit/{id}' => ['NewsController', 'edit'],
        '/admin/crud/news/delete/{id}' => ['NewsController', 'delete'],
        '/admin/crud/lab_members' => ['LabMemberController', 'index'],
        '/admin/crud/lab_members/create' => ['LabMemberController', 'create'],
        '/admin/crud/lab_members/edit/{id}' => ['LabMemberController', 'edit'],
        '/admin/crud/lab_members/delete/{id}' => ['LabMemberController', 'delete'],
        '/admin/crud/research' => ['ResearchController', 'index'],
        '/admin/crud/research/create' => ['ResearchController', 'create'],
        '/admin/crud/research/edit/{id}' => ['ResearchController', 'edit'],
        '/admin/crud/research/delete/{id}' => ['ResearchController', 'delete'],
        '/admin/forms' => ['FormController', 'index'],
        '/admin/crud/admins' => ['AdminCrudController', 'index'],
        '/admin/crud/admins/create' => ['AdminCrudController', 'create'],
        '/admin/crud/admins/edit/{id}' => ['AdminCrudController', 'edit'],
        '/admin/crud/admins/delete/{id}' => ['AdminCrudController', 'delete'],
    ],
    'POST' => [
        '/admin/login'  => ['AdminController', 'authenticate'], // Akses: /admin/login (Proses Submit Form)
        '/admin/crud/gallery/store' => ['GalleryController', 'store'],
        '/admin/crud/gallery/update/{id}' => ['GalleryController', 'update'],
        '/admin/crud/news/store' => ['NewsController', 'store'],
        '/admin/crud/news/update/{id}' => ['NewsController', 'update'],
        '/admin/crud/lab_members/store' => ['LabMemberController', 'store'],
        '/admin/crud/lab_members/update/{id}' => ['LabMemberController', 'update'],
        '/admin/crud/research/store' => ['ResearchController', 'store'],
        '/admin/crud/research/update/{id}' => ['ResearchController', 'update'],
        '/admin/crud/admins/store' => ['AdminCrudController', 'store'],
        '/admin/crud/admins/update/{id}' => ['AdminCrudController', 'update'],
    ]
];

// Gabungkan semua rute
$allRoutes = [
    'GET' => array_merge($routes['GET'], $adminRoutes['GET']),
    'POST' => array_merge($routes['POST'], $adminRoutes['POST']),
];

return $allRoutes;
?>