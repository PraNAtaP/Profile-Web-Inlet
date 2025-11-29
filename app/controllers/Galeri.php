<?php

class Galeri extends Controller {

    public function __construct() {
        // Pastikan direktori upload ada
        if (!file_exists('img/galeri')) {
            mkdir('img/galeri', 0777, true);
        }
    }

    public function index() {
        $data['judul'] = 'Kelola Galeri';
        $data['galeri'] = $this->model('Galeri_model')->getAllGaleri();
        $this->view('templates/header_admin', $data);
        $this->view('admin/galeri/index', $data);
        $this->view('templates/footer_admin');
    }

    public function tambah() {
        $data['judul'] = 'Tambah Foto Galeri';
        $this->view('templates/header_admin', $data);
        $this->view('admin/galeri/form', $data);
        $this->view('templates/footer_admin');
    }

    public function simpan() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            if (!isset($_FILES['foto']) || $_FILES['foto']['error'] !== UPLOAD_ERR_OK) {
                // Bisa ditambahkan system flash message
                header('Location: ' . BASEURL . '/galeri/tambah');
                exit;
            }

            $namaFoto = $this->_uploadFoto();
            if ($namaFoto === false) {
                header('Location: ' . BASEURL . '/galeri/tambah');
                exit;
            }

            $data = [
                'judul' => $_POST['judul'],
                'deskripsi' => $_POST['deskripsi'],
                'foto' => $namaFoto,
                'tanggal_publikasi' => date('Y-m-d H:i:s'),
                'video_embed' => $_POST['video_embed'] ?? ''
            ];

            if ($this->model('Galeri_model')->tambahGaleri($data) > 0) {
                header('Location: ' . BASEURL . '/galeri');
                exit;
            } else {
                if (file_exists('img/galeri/' . $namaFoto)) {
                    unlink('img/galeri/' . $namaFoto);
                }
                header('Location: ' . BASEURL . '/galeri/tambah');
                exit;
            }
        }
    }

    public function ubah($id) {
        $data['judul'] = 'Ubah Data Galeri';
        $data['galeri'] = $this->model('Galeri_model')->getGaleriById($id);
        $this->view('templates/header_admin', $data);
        $this->view('admin/galeri/form', $data);
        $this->view('templates/footer_admin');
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id_galeri'];
            $galeriLama = $this->model('Galeri_model')->getGaleriById($id);
            $namaFoto = $galeriLama['foto'];

            if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
                $fotoBaru = $this->_uploadFoto();
                if ($fotoBaru) {
                    if ($namaFoto && file_exists('img/galeri/' . $namaFoto)) {
                        unlink('img/galeri/' . $namaFoto);
                    }
                    $namaFoto = $fotoBaru;
                }
            }

            $data = [
                'id_galeri' => $id,
                'judul' => $_POST['judul'],
                'deskripsi' => $_POST['deskripsi'],
                'foto' => $namaFoto,
                'video_embed' => $_POST['video_embed'] ?? ''
            ];

            if ($this->model('Galeri_model')->updateGaleri($data) >= 0) {
                header('Location: ' . BASEURL . '/galeri');
                exit;
            } else {
                header('Location: ' . BASEURL . '/galeri/ubah/' . $id);
                exit;
            }
        }
    }

    public function hapus($id) {
        $galeri = $this->model('Galeri_model')->getGaleriById($id);
        if (!$galeri) {
            header('Location: ' . BASEURL . '/galeri');
            exit;
        }

        if ($this->model('Galeri_model')->hapusGaleri($id) > 0) {
            if ($galeri['foto'] && file_exists('img/galeri/' . $galeri['foto'])) {
                unlink('img/galeri/' . $galeri['foto']);
            }
            header('Location: ' . BASEURL . '/galeri');
            exit;
        } else {
            header('Location: ' . BASEURL . '/galeri');
            exit;
        }
    }

    private function _uploadFoto() {
        $namaFile = $_FILES['foto']['name'];
        $tmpName = $_FILES['foto']['tmp_name'];
        $error = $_FILES['foto']['error'];

        if ($error !== UPLOAD_ERR_OK) {
            return false;
        }

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            return false;
        }

        $namaFileBaru = 'galeri_' . uniqid() . '.' . $ekstensiGambar;

        if (move_uploaded_file($tmpName, 'img/galeri/' . $namaFileBaru)) {
            return $namaFileBaru;
        } else {
            return false;
        }
    }
}
