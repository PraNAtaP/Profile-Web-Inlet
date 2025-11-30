<?php

class Contact_model
{
    private $db;
    private $table_form = 'form';
    private $table_visitor = 'visitor';

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * Menyimpan pesan kontak baru dan mencatat pengunjung.
     * Menggunakan PostgreSQL untuk menangani IP dan foreign key.
     */
    public function kirimPesan($data)
    {
        // 1. Dapatkan IP Address Pengguna
        $ip_address = $_SERVER['REMOTE_ADDR'];

        // 2. Cek apakah IP sudah ada di tabel visitor
        $this->db->query("SELECT id_visitor FROM " . $this->table_visitor . " WHERE ip_address = :ip_address");
        $this->db->bind('ip_address', $ip_address);
        $visitor = $this->db->single();

        $id_visitor = null;
        if ($visitor) {
            $id_visitor = $visitor['id_visitor'];
        } else {
            // Jika IP belum ada, insert ke tabel visitor dan dapatkan ID nya
            // Menggunakan RETURNING id_visitor yang spesifik untuk PostgreSQL
            $this->db->query("INSERT INTO " . $this->table_visitor . " (ip_address) VALUES (:ip_address) RETURNING id_visitor");
            $this->db->bind('ip_address', $ip_address);
            $result = $this->db->single();
            if ($result) {
                $id_visitor = $result['id_visitor'];
            }
        }

        // Jika gagal mendapatkan atau membuat visitor, hentikan proses
        if (!$id_visitor) {
            return 0;
        }

        // 3. Insert pesan ke tabel form menggunakan id_visitor
        $query = "INSERT INTO " . $this->table_form . " (id_visitor, nama, email, pesan, waktu_kirim) 
                  VALUES (:id_visitor, :nama, :email, :pesan, CURRENT_TIMESTAMP)";

        $this->db->query($query);
        $this->db->bind('id_visitor', $id_visitor);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('pesan', $data['pesan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    /**
     * Mengambil semua pesan dari tabel form dengan informasi visitor.
     */
    public function getAllPesan()
    {
        // Query disesuaikan dengan permintaan baru untuk JOIN dan ORDER
        $this->db->query("SELECT form.*, visitor.ip_address, visitor.waktu_akses FROM form JOIN visitor ON form.id_visitor = visitor.id_visitor ORDER BY form.id_form DESC");
        return $this->db->resultSet();
    }

    /**
     * Menghapus pesan berdasarkan ID.
     */
    public function hapusPesan($id)
    {
        $this->db->query('DELETE FROM ' . $this->table_form . ' WHERE id_form = :id');
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}