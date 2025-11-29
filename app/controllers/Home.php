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

        // Memuat model riset dan mengambil semua data riset
        $data['riset'] = $this->model('Riset_model')->getAllRiset();

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

    public function detail_riset($id)
    {
        $data['judul'] = 'Detail Riset';
        $data['riset'] = $this->model('Riset_model')->getRisetById($id);
        $this->view('home/detail_riset', $data);
    }
}
