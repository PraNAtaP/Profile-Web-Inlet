<?php

class Admin_model
{
    private $table = 'admin';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * Menghitung jumlah data pada tabel tertentu dengan aman.
     * Menggunakan whitelist untuk mencegah SQL injection dan error pg_escape_identifier.
     * @param string $table Nama tabel yang akan dihitung.
     * @return int Jumlah baris.
     */
    public function countData($table)
    {
        // 1. Whitelist Tabel (Pengganti pg_escape_identifier)
        $allowed_tables = ['berita', 'galeri', 'riset', 'anggota_lab', 'produk_lab', 'media_partner', 'admin', 'visitor'];

        // 2. Cek apakah tabel ada di daftar ijin
        if (!in_array($table, $allowed_tables)) {
            return 0; // Jika tidak diizinkan, kembalikan 0
        }

        // 3. Jalankan Query via PDO
        $this->db->query("SELECT COUNT(*) FROM " . $table);
        $result = $this->db->single();

        // 4. Ambil Angka (Handling return PDO di Postgres)
        if (is_array($result) && !empty($result)) {
            // Ambil value pertama tanpa peduli nama key-nya ('count', 'total', dll)
            return (int) array_values($result)[0];
        }

        return 0;
    }

    public function getAdminByUsername($username)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE username = :username');
        $this->db->bind('username', $username);
        return $this->db->single();
    }

    public function getAllAdmin()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY nama ASC');
        return $this->db->resultSet();
    }

    public function getAdminById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_admin = :id');
        $this->db->bind('id', (int)$id, PDO::PARAM_INT);
        return $this->db->single();
    }

    public function tambahAdmin($data)
    {
        $password_hash = password_hash($data['password'], PASSWORD_DEFAULT);

        $query = "INSERT INTO " . $this->table . " (nama, username, email, password_hash)
                  VALUES (:nama, :username, :email, :password_hash)";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('password_hash', $password_hash);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateAdmin($data)
    {
        if (!empty($data['password'])) {
            $password_hash = password_hash($data['password'], PASSWORD_DEFAULT);
            $query = "UPDATE " . $this->table . " SET 
                        nama = :nama, 
                        username = :username, 
                        email = :email, 
                        password_hash = :password_hash 
                      WHERE id_admin = :id_admin";
            $this->db->bind('password_hash', $password_hash);
        } else {
            $query = "UPDATE " . $this->table . " SET 
                        nama = :nama, 
                        username = :username, 
                        email = :email 
                      WHERE id_admin = :id_admin";
        }

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('id_admin', (int)$data['id_admin'], PDO::PARAM_INT);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusAdmin($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id_admin = :id";
        $this->db->query($query);
        $this->db->bind('id', (int)$id, PDO::PARAM_INT);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
