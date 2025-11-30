<?php

class Partner_model {
    private $table = 'media_partner';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    /**
     * Mengambil semua data media partner.
     */
    public function getAllPartner() {
        // Menggunakan kolom `id_media_partner` yang benar
        $this->db->query("SELECT * FROM {$this->table} ORDER BY id_media_partner DESC");
        return $this->db->resultSet();
    }

    /**
     * Mengambil satu data partner berdasarkan ID.
     */
    public function getPartnerById($id) {
        $this->db->query("SELECT * FROM {$this->table} WHERE id_media_partner = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    /**
     * Menambahkan data partner baru.
     */
    public function tambahPartner($data) {
        $query = "INSERT INTO {$this->table} (nama, link, logo) VALUES (:nama, :link, :logo)";
        
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('link', $data['link']);
        $this->db->bind('logo', $data['logo']); // Asumsi nama file logo ada di $data

        $this->db->execute();
        return $this->db->rowCount();
    }

    /**
     * Memperbarui data partner.
     */
    public function updatePartner($data) {
        $query = "UPDATE {$this->table} SET nama = :nama, link = :link WHERE id_media_partner = :id_media_partner";

        // Jika ada logo baru, tambahkan ke query
        if (!empty($data['logo'])) {
            $query = "UPDATE {$this->table} SET nama = :nama, link = :link, logo = :logo WHERE id_media_partner = :id_media_partner";
        }

        $this->db->query($query);
        $this->db->bind('id_media_partner', $data['id_media_partner']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('link', $data['link']);

        if (!empty($data['logo'])) {
            $this->db->bind('logo', $data['logo']);
        }
        
        $this->db->execute();
        return $this->db->rowCount();
    }

    /**
     * Menghapus data partner.
     */
    public function hapusPartner($id) {
        // Ambil data untuk menghapus file logo
        $partner = $this->getPartnerById($id);
        if ($partner && !empty($partner['logo'])) {
            $logoPath = 'img/partner/' . $partner['logo'];
            if (file_exists($logoPath)) {
                unlink($logoPath);
            }
        }

        $query = "DELETE FROM {$this->table} WHERE id_media_partner = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }
}