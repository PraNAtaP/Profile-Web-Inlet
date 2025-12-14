<?php
class Home extends Controller
{
    public function index()
    {
        $data['judul'] = 'Home';
        $data['berita'] = $this->model('Berita_model')->getAllBerita();
        $data['anggota'] = $this->model('Anggota_model')->getAllAnggota();
        $data['riset'] = $this->model('Riset_model')->getAllRiset();
        $data['galeri'] = $this->model('Galeri_model')->getAllGaleri();
        $data['produk'] = $this->model('Produk_model')->getAllProduk();
        $data['partner'] = $this->model('Partner_model')->getAllPartner();
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
        $this->view('home/detail_riset', $data); 
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
    public function detail_anggota($id)
    {
        $data['judul'] = 'Detail Anggota';
        $data['anggota'] = $this->model('Anggota_model')->getAnggotaById($id);
        $this->view('templates/header_public', $data);
        $this->view('home/detail_anggota', $data);
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
                header('Location: ' . BASEURL . '/#contacts');
                exit;
            } else {
                header('Location: ' . BASEURL . '/#contacts');
                exit;
            }
        } else {
            header('Location: ' . BASEURL);
            exit;
        }
    }
}