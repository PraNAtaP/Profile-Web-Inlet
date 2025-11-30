<?php

class Admin_model
{
    private $table = 'admin';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAdminByUsername($username)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE username = :username');
        $this->db->bind('username', $username);
        return $this->db->single();
    }

    public function countAllAdmins()
    {
        $this->db->query('SELECT COUNT(*) as total FROM ' . $this->table);
        $result = $this->db->single();
        return $result['total'];
    }

    public function countData($table)
    {
        // Whitelist tabel yang boleh dihitung untuk keamanan
        $allowedTables = ['berita', 'galeri', 'riset', 'anggota_lab', 'produk_lab', 'media_partner', 'admin'];

        if (!in_array($table, $allowedTables)) {
            // Jika tabel tidak diizinkan, kembalikan 0 untuk mencegah error/injection
            return 0;
        }

        // Query aman karena nama tabel sudah divalidasi
        $this->db->query("SELECT COUNT(*) as total FROM " . $table);
        $result = $this->db->single();
        
        // Pastikan result ada sebelum mengakses index 'total'
        return $result ? $result['total'] : 0;
    }
}
