<?php

class Visitor_model {
    private $table = 'visitor';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * Melacak pengunjung berdasarkan alamat IP.
     * Menggunakan ON CONFLICT untuk menangani UPSERT di PostgreSQL.
     * Jika IP sudah ada, update waktu akses; jika tidak, insert baris baru.
     */
    public function trackVisitor()
    {
        $ip_address = $_SERVER['REMOTE_ADDR'];

        $query = "INSERT INTO " . $this->table . " (ip_address, waktu_akses) 
                  VALUES (:ip_address, NOW())
                  ON CONFLICT (ip_address) 
                  DO UPDATE SET waktu_akses = NOW();";

        $this->db->query($query);
        $this->db->bind('ip_address', $ip_address);
        
        $this->db->execute();
    }

    /**
     * Menghitung pengguna yang online dalam 10 menit terakhir.
     * @return int Jumlah pengguna online.
     */
    public function countOnlineUsers()
    {
        // Query untuk menghitung visitor dengan waktu akses dalam 10 menit terakhir
        $this->db->query("SELECT COUNT(*) FROM " . $this->table . " WHERE waktu_akses > (NOW() - INTERVAL '10 minutes')");

        $result = $this->db->single();

        if (is_array($result) && !empty($result)) {
            // Mengambil nilai pertama dari array, apa pun key-nya.
            return (int) array_values($result)[0];
        }

        return 0;
    }
}
