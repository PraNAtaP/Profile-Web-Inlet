<?php

class Riset extends Controller {
    public function __construct() {
        if (!isset($_SESSION['admin_id'])) {
            header('Location: ' . BASEURL . '/admin/login');
            exit;
        }
    }

    public function index() {
        $data['judul'] = 'Riset Activities';
        $data['riset'] = $this->model('Riset_model')->getAllRiset();
        $this->view('templates/header_admin', $data);
        $this->view('admin/riset/index', $data);
        $this->view('templates/footer_admin');
    }

    public function tambah() {
        $data['judul'] = 'Tambah Riset';
        $this->view('templates/header_admin', $data);
        $this->view('admin/riset/form', $data);
        $this->view('templates/footer_admin');
    }

    public function simpan() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASEURL . '/riset');
            exit;
        }

        $namaFileThumbnail = null;
        if (isset($_FILES['file_dokumen']) && $_FILES['file_dokumen']['error'] === UPLOAD_ERR_OK) {
            $tmpName = $_FILES['file_dokumen']['tmp_name'];
            $namaFile = $_FILES['file_dokumen']['name'];
            $ekstensi = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
            $namaFileBaru = uniqid('riset_') . '.' . $ekstensi;

            $targetDir = __DIR__ . '/../../public/img/riset/';
            $targetFile = $targetDir . $namaFileBaru;

            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            if (move_uploaded_file($tmpName, $targetFile)) {
                $namaFileThumbnail = $namaFileBaru;
            } else {
                header('Location: ' . BASEURL . '/riset');
                exit;
            }
        }
        
        $_POST['file_dokumen'] = $namaFileThumbnail;
        $_POST['tanggal_publikasi'] = date('Y-m-d H:i:s');

        if ($this->model('Riset_model')->tambahRiset($_POST) > 0) {
            $this->model('Log_model')->catat('TAMBAH', "Menambah Riset: " . $_POST['judul_riset']);
        }
        header('Location: ' . BASEURL . '/riset');
        exit;
    }

    public function edit($id) {
        $data['judul'] = 'Ubah Riset';
        $data['riset'] = $this->model('Riset_model')->getRisetById($id);
        $this->view('templates/header_admin', $data);
        $this->view('admin/riset/form', $data);
        $this->view('templates/footer_admin');
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASEURL . '/riset');
            exit;
        }

        $namaFileThumbnail = $_POST['file_dokumen_lama'];

        if (isset($_FILES['file_dokumen']) && $_FILES['file_dokumen']['error'] === UPLOAD_ERR_OK) {
            $tmpName = $_FILES['file_dokumen']['tmp_name'];
            $namaFile = $_FILES['file_dokumen']['name'];
            $ekstensi = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
            $namaFileBaru = uniqid('riset_') . '.' . $ekstensi;

            $targetDir = __DIR__ . '/../../public/img/riset/';
            $targetFile = $targetDir . $namaFileBaru;

            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            if (move_uploaded_file($tmpName, $targetFile)) {
                $namaFileThumbnail = $namaFileBaru;
                $old_image_path = $targetDir . $_POST['file_dokumen_lama'];
                if (!empty($_POST['file_dokumen_lama']) && file_exists($old_image_path)) {
                    unlink($old_image_path);
                }
            } else {
                header('Location: ' . BASEURL . '/riset');
                exit;
            }
        }
        
        $_POST['file_dokumen'] = $namaFileThumbnail;
        $_POST['tanggal_publikasi'] = date('Y-m-d H:i:s');

        if ($this->model('Riset_model')->updateRiset($_POST) > 0) {
            $this->model('Log_model')->catat('UPDATE', "Mengupdate Riset: " . $_POST['judul_riset']);
        }
        header('Location: ' . BASEURL . '/riset');
        exit;
    }

    public function hapus($id) {
        $riset = $this->model('Riset_model')->getRisetById($id);
        if ($riset) {
            if ($this->model('Riset_model')->hapusRiset($id) > 0) {
                $this->model('Log_model')->catat('HAPUS', "Menghapus Riset ID: " . $id);
                $image_path = __DIR__ . '/../../public/img/riset/' . $riset['file_dokumen'];
                if (!empty($riset['file_dokumen']) && file_exists($image_path)) {
                    unlink($image_path);
                }
            }
        }
        header('Location: ' . BASEURL . '/riset');
        exit;
    }
}