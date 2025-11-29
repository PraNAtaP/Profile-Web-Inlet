<?php

class Home extends Controller
{
    public function index()
    {
        // Data untuk view
        $data['judul'] = 'Home';
        
        // Memuat model berita dan mengambil semua data berita
        $data['berita'] = $this->model('Berita_model')->getAllBerita();

        // Memuat model anggota dan mengambil semua data anggota
        $data['anggota'] = $this->model('Anggota_model')->getAllAnggota();

        // Memuat view dengan data judul dan berita
        $this->view('home/index', $data);
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Berita';
        $data['berita'] = $this->model('Berita_model')->getBeritaById($id);

        // Nanti kita buat viewnya
        $this->view('home/detail', $data);
    }
}
