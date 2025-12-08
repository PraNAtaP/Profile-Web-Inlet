<?php
class Riset_model {
    private $table = 'riset';
    private $db;
    public function __construct() {
        $this->db = new Database;
    }
    public function getAllRiset() {
        $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY tanggal_publikasi DESC');
        return $this->db->resultSet();
    }
    public function getRisetById($id) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_riset=:id_riset');
        $this->db->bind('id_riset', $id);
        return $this->db->single();
    }
    public function tambahRiset($data) {
        $query = "INSERT INTO riset (id_admin, judul_riset, deskripsi, peneliti, tanggal_publikasi, video_embed, file_dokumen)
                    VALUES (:id_admin, :judul_riset, :deskripsi, :peneliti, :tanggal_publikasi, :video_embed, :file_dokumen)";
        $this->db->query($query);
        $this->db->bind('id_admin', $_SESSION['id_admin']);
        $this->db->bind('judul_riset', $data['judul_riset']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('peneliti', $data['peneliti']);
        $this->db->bind('tanggal_publikasi', $data['tanggal_publikasi']);
        $this->db->bind('video_embed', $data['video_embed']);   
        $this->db->bind('file_dokumen', $data['file_dokumen']); 
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function updateRiset($data) {
        $query = "UPDATE riset SET
                    judul_riset = :judul_riset,
                    deskripsi = :deskripsi,
                    peneliti = :peneliti,
                    tanggal_publikasi = :tanggal_publikasi,
                    video_embed = :video_embed,
                    file_dokumen = :file_dokumen
                  WHERE id_riset = :id_riset";
        $this->db->query($query);
        $this->db->bind('id_riset', $data['id_riset']);
        $this->db->bind('judul_riset', $data['judul_riset']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('peneliti', $data['peneliti']);
        $this->db->bind('tanggal_publikasi', $data['tanggal_publikasi']);
        $this->db->bind('video_embed', $data['video_embed']);   
        $this->db->bind('file_dokumen', $data['file_dokumen']); 
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function hapusRiset($id) {
        $riset = $this->getRisetById($id);
        if (!$riset) {
            return 0;
        }
        if (file_exists('img/riset/' . $riset['video_embed'])) {
            unlink('img/riset/' . $riset['video_embed']);
        }
        if (file_exists('docs/riset/' . $riset['file_dokumen'])) {
            unlink('docs/riset/' . $riset['file_dokumen']);
        }
        $query = "DELETE FROM riset WHERE id_riset = :id_riset";
        $this->db->query($query);
        $this->db->bind('id_riset', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
