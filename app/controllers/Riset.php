<?php

class Riset extends Controller {
    public function __construct() {
        // Pastikan direktori upload ada
        if (!file_exists('img/riset')) {
            mkdir('img/riset', 0777, true);
        }
    }

    public function index() {
        $data['judul'] = 'Riset Activities';
        $data['riset'] = $this->model('Riset_model')->getAllRiset();
        $this->view('templates/header_admin', $data);
        $this->view('admin/riset/index', $data);
        $this->view('templates/footer_admin');
    }

    public function simpan() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // DEBUGGING BLOCK
            echo '<pre>';
            echo "CEK DATA POST:\n";
            var_dump($_POST);
            echo "\nCEK DATA FILE:\n";
            var_dump($_FILES);
            echo '</pre>';
            // die(); // Hapus komentar die() ini jika ingin melihat hasil dump di browser
            
            // 1. Proses upload gambar (dari input 'file_dokumen')
            $thumbnail = $this->_uploadThumbnail();
            if ($thumbnail === false) {
                // Jika upload gagal, hentikan proses
                // Anda bisa menambahkan pesan error untuk user di sini
                header('Location: ' . BASEURL . '/riset/tambah');
                exit;
            }

            // 2. Siapkan data untuk dikirim ke model
            $data = [
                'judul_riset' => $_POST['judul_riset'],
                'peneliti' => $_POST['peneliti'],
                'deskripsi' => $_POST['deskripsi'],
                'tanggal_publikasi' => date('Y-m-d H:i:s'),
                
                // PENTING: Mapping sesuai logika baru
                'video_embed' => $_POST['video_embed'],   // Kolom ini diisi Link YouTube
                'file_dokumen' => $thumbnail              // Kolom ini diisi NAMA FILE GAMBAR hasil upload
            ];

            // 3. Panggil model untuk menyimpan data
            if ($this->model('Riset_model')->tambahRiset($data) > 0) {
                // Jika berhasil, redirect
                header('Location: ' . BASEURL . '/riset');
                exit;
            } else {
                // Jika gagal, kembali ke form (idealnya dengan pesan error)
                // Hapus gambar yang sudah terlanjur di-upload jika proses insert gagal
                if ($thumbnail !== 'default.jpg' && file_exists('img/riset/' . $thumbnail)) {
                    unlink('img/riset/' . $thumbnail);
                }
                header('Location: ' . BASEURL . '/riset/tambah');
                exit;
            }
        }
    }

    public function tambah() {
        // Tampilkan form jika bukan POST request
        $data['judul'] = 'Tambah Riset';
        $this->view('templates/header_admin', $data);
        $this->view('admin/riset/form', $data);
        $this->view('templates/footer_admin');
    }

    public function ubah($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            // Ambil data riset yang ada dari database
            $risetLama = $this->model('Riset_model')->getRisetById($id);
            $namaThumbnail = $risetLama['file_dokumen']; // Default ke nama file lama

            // Cek apakah ada file thumbnail BARU yang diupload
            if (isset($_FILES['file_dokumen']) && $_FILES['file_dokumen']['error'] === 0) {
                // Ada file baru, proses upload
                $thumbnailBaru = $this->_uploadThumbnail();
                
                if ($thumbnailBaru) {
                    // Jika upload berhasil, hapus file lama (jika ada dan bukan default)
                    if ($namaThumbnail && $namaThumbnail !== 'default.jpg' && file_exists('img/riset/' . $namaThumbnail)) {
                        unlink('img/riset/' . $namaThumbnail);
                    }
                    // Gunakan nama thumbnail yang baru
                    $namaThumbnail = $thumbnailBaru;
                }
                // Jika upload gagal, kita tetap pakai nama file yang lama.
            }

            // Siapkan data untuk dikirim ke model
            $data = [
                'id_riset' => $id,
                'judul_riset' => $_POST['judul_riset'],
                'peneliti' => $_POST['peneliti'],
                'deskripsi' => $_POST['deskripsi'],
                'tanggal_publikasi' => date('Y-m-d H:i:s'),
                
                // PENTING: Mapping sesuai logika baru
                'video_embed' => $_POST['video_embed'], // Kolom ini diisi Link YouTube
                'file_dokumen' => $namaThumbnail        // Kolom ini diisi NAMA FILE GAMBAR
            ];

            // Panggil model untuk mengupdate data
            if ($this->model('Riset_model')->updateRiset($data) >= 0) {
                // Redirect bahkan jika tidak ada baris yang berubah (row_count = 0)
                header('Location: ' . BASEURL . '/riset');
                exit;
            } else {
                // Jika update gagal karena error, kembali ke form
                header('Location: ' . BASEURL . '/riset/ubah/' . $id);
                exit;
            }

        } else {
            // Tampilkan form jika bukan POST request
            $data['judul'] = 'Ubah Riset';
            $data['riset'] = $this->model('Riset_model')->getRisetById($id);
            $this->view('templates/header_admin', $data);
            $this->view('admin/riset/form', $data);
            $this->view('templates/footer_admin');
        }
    }


    public function hapus($id) {
        // Ambil data dulu untuk dapat nama file thumbnail
        $riset = $this->model('Riset_model')->getRisetById($id);

        if ($this->model('Riset_model')->hapusRiset($id) > 0) {
             // Hapus file thumbnail jika ada dan bukan default
            if ($riset && $riset['file_dokumen'] && file_exists('img/riset/' . $riset['file_dokumen']) && $riset['file_dokumen'] !== 'default.jpg') {
                unlink('img/riset/' . $riset['file_dokumen']);
            }
            header('Location: ' . BASEURL . '/riset');
            exit;
        }
    }

    private function _uploadThumbnail() {
        $namaFile = $_FILES['file_dokumen']['name'];
        $ukuranFile = $_FILES['file_dokumen']['size'];
        $error = $_FILES['file_dokumen']['error'];
        $tmpName = $_FILES['file_dokumen']['tmp_name'];

        // Jika tidak ada gambar yang diupload (saat tambah data), gunakan default
        if ($error === 4) { 
            return 'default.jpg'; // pastikan Anda punya file default.jpg di img/riset/
        }

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            // Di sini bisa ditambahkan Flasher untuk pesan error
            return false;
        }

        // Generate nama file baru yang unik
        $namaFileBaru = uniqid('riset_');
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        if (move_uploaded_file($tmpName, 'img/riset/' . $namaFileBaru)) {
            return $namaFileBaru;
        } else {
            return false;
        }
    }
}
