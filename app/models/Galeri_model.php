<?php

class Galeri_model {
    private $table = 'galeri';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllGaleri() {
        $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY tanggal_publikasi DESC');
        return $this->db->resultSet();
    }

    public function getGaleriById($id) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_galeri=:id_galeri');
        $this->db->bind('id_galeri', $id);
        return $this->db->single();
    }

    public function tambahGaleri($data) {
        $query = "INSERT INTO galeri (id_admin, judul, deskripsi, foto, tanggal_publikasi, video_embed)
                  VALUES (:id_admin, :judul, :deskripsi, :foto, :tanggal_publikasi, :video_embed)";

        $this->db->query($query);

        // id_admin diasumsikan ada di session
        $this->db->bind('id_admin', $_SESSION['id_admin']); 
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('foto', $data['foto']);
        $this->db->bind('tanggal_publikasi', $data['tanggal_publikasi']);
        $this->db->bind('video_embed', $data['video_embed']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateGaleri($data) {
        $query = "UPDATE galeri SET
                    judul = :judul,
                    deskripsi = :deskripsi,
                    foto = :foto,
                    video_embed = :video_embed
                  WHERE id_galeri = :id_galeri";

        $this->db->query($query);
        $this->db->bind('id_galeri', $data['id_galeri']);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('foto', $data['foto']);
        $this->db->bind('video_embed', $data['video_embed']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusGaleri($id) {
        $query = "DELETE FROM galeri WHERE id_galeri = :id_galeri";
        $this->db->query($query);
        $this->db->bind('id_galeri', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
