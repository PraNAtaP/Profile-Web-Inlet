<?php

class Controller
{
    public function view($view, $data = [])
    {
        // Ekstrak data untuk digunakan sebagai variabel di view
        extract($data);
        
        require_once '../app/views/' . $view . '.php';
    }

    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }
}
