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

        // Memuat model galeri dan mengambil semua data galeri
        $data['galeri'] = $this->model('Galeri_model')->getAllGaleri();

        // Memuat model produk dan mengambil semua data produk
        $data['produk'] = $this->model('Produk_model')->getAllProduk();

        // Memuat model partner dan mengambil semua data partner (FIXED)
        $data['partner'] = $this->model('Partner_model')->getAllPartner();

        // Memuat view dengan data
        $this->view('templates/header_public', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer_public', $data);
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Berita';
        $data['berita'] = $this->model('Berita_model')->getBeritaById($id);

        $this->view('templates/header_public', $data);
        $this->view('home/detail', $data);
        $this->view('templates/footer_public', $data);
    }

    public function detail_riset($id)
    {
        $data['judul'] = 'Detail Riset';
        $data['riset'] = $this->model('Riset_model')->getRisetById($id);
        
        $this->view('templates/header_public', $data);
        $this->view('home/detail_riset', $data); // Corrected typo
        $this->view('templates/footer_public', $data);
    }

    public function detail_galeri()
    {
        $data['judul'] = 'Detail Galeri';
        $data['galeri'] = $this->model('Galeri_model')->getAllGaleri();

        $this->view('templates/header_public', $data);
        $this->view('home/detail_galeri', $data);
        $this->view('templates/footer_public', $data);
    }

    public function galeri()
    {
        $data['judul'] = 'Galeri Kegiatan';
        $data['galeri'] = $this->model('Galeri_model')->getAllGaleri();

        $this->view('templates/header_public', $data);
        $this->view('home/galeri', $data);
        $this->view('templates/footer_public', $data);
    }

    public function kirim_kontak()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model('Contact_model')->kirimPesan($_POST) > 0) {
                // Flasher::setFlash('Pesan', 'berhasil', 'dikirim', 'success');
                header('Location: ' . BASEURL . '/#contacts');
                exit;
            } else {
                // Flasher::setFlash('Pesan', 'gagal', 'dikirim', 'danger');
                header('Location: ' . BASEURL . '/#contacts');
                exit;
            }
        } else {
            header('Location: ' . BASEURL);
            exit;
        }
    }
}