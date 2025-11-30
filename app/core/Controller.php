<?php 

class Controller {
    public function view($view, $data = [])
    {
        // Gunakan __DIR__ agar path selalu presisi dari folder 'app/core'
        // Naik satu level ke 'views'
        require_once __DIR__ . '/../views/' . $view . '.php';
    }

    public function model($model)
    {
        // Gunakan __DIR__ agar path selalu presisi dari folder 'app/core'
        // Naik satu level ke 'models'
        require_once __DIR__ . '/../models/' . $model . '.php';
        return new $model;
    }
}