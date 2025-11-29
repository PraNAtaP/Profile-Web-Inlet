<?php

class Anggota_model
{
    private $table = 'anggota_lab';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllAnggota()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY nama ASC');
        return $this->db->resultSet();
    }

    public function getAnggotaById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_anggota = :id_anggota');
        $this->db->bind('id_anggota', $id);
        return $this->db->single();
    }

    public function tambahAnggota($data)
    {
        $query = "INSERT INTO anggota_lab (id_admin, nama, jabatan, foto, kontak, email) 
                  VALUES (:id_admin, :nama, :jabatan, :foto, :kontak, :email)";
        
        $this->db->query($query);
        
        $this->db->bind('id_admin', $data['id_admin']); 
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('jabatan', $data['jabatan']);
        $this->db->bind('foto', $data['foto']);
        $this->db->bind('kontak', $data['kontak']);
        $this->db->bind('email', $data['email']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateAnggota($data)
    {
        $query = "UPDATE anggota_lab SET
                    nama = :nama,
                    jabatan = :jabatan,
                    foto = :foto,
                    kontak = :kontak,
                    email = :email
                  WHERE id_anggota = :id_anggota";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('jabatan', $data['jabatan']);
        $this->db->bind('foto', $data['foto']);
        $this->db->bind('kontak', $data['kontak']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('id_anggota', $data['id_anggota']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusAnggota($id)
    {
        // First, get the photo filename to delete the file
        $anggota = $this->getAnggotaById($id);
        if ($anggota && !empty($anggota['foto'])) {
            $pathGambar = 'img/anggota/' . $anggota['foto'];
            if (file_exists($pathGambar)) {
                unlink($pathGambar);
            }
        }

        $query = "DELETE FROM anggota_lab WHERE id_anggota = :id_anggota";
        $this->db->query($query);
        $this->db->bind('id_anggota', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function countAllAnggota()
    {
        $this->db->query('SELECT COUNT(*) as total FROM ' . $this->table);
        $result = $this->db->single();
        return $result['total'];
    }
}
