<?php
class Admin_model
{
    private $table = 'admin';
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function countData($table)
    {
        $allowed_tables = ['berita', 'galeri', 'riset', 'anggota_lab', 'produk_lab', 'media_partner', 'admin', 'visitor'];
        if (!in_array($table, $allowed_tables)) {
            return 0; 
        }
        $this->db->query("SELECT COUNT(*) FROM " . $table);
        $result = $this->db->single();
        if (is_array($result) && !empty($result)) {
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

    public function cariUserGanda($username, $email)
    {
        $this->db->query('SELECT * FROM admin WHERE username = :username OR email = :email');
        $this->db->bind('username', $username);
        $this->db->bind('email', $email);

        return $this->db->single();
    }
}
