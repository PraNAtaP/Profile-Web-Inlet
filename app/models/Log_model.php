<?php
class Log_model {
    private $table = 'activity_logs';
    private $db;
    public function __construct() {
        $this->db = new Database;
    }
    public function catat($aksi, $deskripsi) {
        $id_admin = $_SESSION['admin_id'] ?? null;
        if ($id_admin) {
            $query = "INSERT INTO " . $this->table . " (id_admin, aksi, deskripsi, waktu) 
                      VALUES (:id_admin, :aksi, :deskripsi, CURRENT_TIMESTAMP)";
            $this->db->query($query);
            $this->db->bind('id_admin', $id_admin);
            $this->db->bind('aksi', $aksi);
            $this->db->bind('deskripsi', $deskripsi);
            $this->db->execute();
            return $this->db->rowCount();
        }
        return 0;
    }
    public function getAllLogs() {
        $query = "SELECT al.*, a.nama AS admin_nama 
                  FROM " . $this->table . " al
                  JOIN admin a ON al.id_admin = a.id_admin
                  ORDER BY al.waktu DESC";
        $this->db->query($query);
        return $this->db->resultSet();
    }
}
