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
    public function kirimPesan($data)
    {
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $this->db->query("SELECT id_visitor FROM " . $this->table_visitor . " WHERE ip_address = :ip_address");
        $this->db->bind('ip_address', $ip_address);
        $visitor = $this->db->single();
        $id_visitor = null;
        if ($visitor) {
            $id_visitor = $visitor['id_visitor'];
        } else {
            $this->db->query("INSERT INTO " . $this->table_visitor . " (ip_address) VALUES (:ip_address) RETURNING id_visitor");
            $this->db->bind('ip_address', $ip_address);
            $result = $this->db->single();
            if ($result) {
                $id_visitor = $result['id_visitor'];
            }
        }
        if (!$id_visitor) {
            return 0;
        }
        $query = "INSERT INTO " . $this->table_form . " (id_visitor, nama, email, institution, pesan, waktu_kirim) 
              VALUES (:id_visitor, :nama, :email, :institution, :pesan, CURRENT_TIMESTAMP)";
        $this->db->query($query);
        $this->db->bind('id_visitor', $id_visitor);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('institution', $data['institution']);
        $this->db->bind('pesan', $data['pesan']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function getAllPesan()
    {
        $this->db->query("SELECT form.*, visitor.ip_address, visitor.waktu_akses FROM form JOIN visitor ON form.id_visitor = visitor.id_visitor ORDER BY form.id_form DESC");
        return $this->db->resultSet();
    }
    public function hapusPesan($id)
    {
        $this->db->query('DELETE FROM ' . $this->table_form . ' WHERE id_form = :id');
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function getPesanById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table_form . ' WHERE id_form = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
}
