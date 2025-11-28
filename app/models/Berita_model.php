<?php

class Berita_model
{
    private $table = 'berita';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllBerita()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY tanggal_publikasi DESC');
        return $this->db->resultSet();
    }

    public function getBeritaById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_berita = :id_berita');
        $this->db->bind('id_berita', $id);
        return $this->db->single();
    }

    public function tambahBerita($data)
    {
        // Query PostgreSQL
        // id_berita gak perlu diisi karena SERIAL (Auto Increment)
        // tanggal_publikasi pakai CURRENT_TIMESTAMP
        $query = "INSERT INTO berita (id_admin, judul, isi, tanggal_publikasi, video_embed) 
                  VALUES (:id_admin, :judul, :isi, CURRENT_TIMESTAMP, :video_embed)";
        
        $this->db->query($query);
        
        // Binding Data
        // Pastikan key array ($data['...']) sesuai dengan 'name' di form input kamu
        $this->db->bind('id_admin', $data['id_admin']); 
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('isi', $data['isi']);
        // video_embed diisi nama file gambar
        $this->db->bind('video_embed', $data['video_embed']); 

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateBerita($data)
    {
        $query = "UPDATE berita SET
                    judul = :judul,
                    isi = :isi,
                    video_embed = :video_embed
                  WHERE id_berita = :id_berita";

        $this->db->query($query);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('isi', $data['isi']);
        $this->db->bind('video_embed', $data['video_embed']);
        $this->db->bind('id_berita', $data['id_berita']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusBerita($id)
    {
        $query = "DELETE FROM berita WHERE id_berita = :id_berita";
        $this->db->query($query);
        $this->db->bind('id_berita', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
