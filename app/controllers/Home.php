<?php

class Home extends Controller
{
    public function index()
    {
        // Data untuk view jika diperlukan
        $data['judul'] = 'Home';

        // Memuat view
        $this->view('home/index', $data);
    }
}
