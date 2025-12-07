<?php
class Produk_model
{
    private $table = 'produk_lab';
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllProduk()
    {
        $this->db->query("SELECT * FROM {$this->table} ORDER BY created_at DESC");
        return $this->db->resultSet();
    }
    public function getProdukById($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id_produk = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    public function tambahProduk($data)
    {
        $query = "INSERT INTO {$this->table} (id_admin, judul, link, deskripsi, gambar) 
                  VALUES (:id_admin, :judul, :link, :deskripsi, :gambar)";
        $this->db->query($query);
        $this->db->bind('id_admin', $data['id_admin']);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('link', $data['link']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('gambar', $data['gambar']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function updateProduk($data)
    {
        $query = "UPDATE {$this->table} SET 
                    judul = :judul, 
                    link = :link, 
                    deskripsi = :deskripsi
                    -- placeholder untuk gambar jika ada
                  WHERE id_produk = :id_produk";
        if (!empty($data['gambar'])) {
            $query = str_replace(
                '-- placeholder untuk gambar jika ada',
                ', gambar = :gambar',
                $query
            );
        }
        $this->db->query($query);
        $this->db->bind('id_produk', $data['id_produk']);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('link', $data['link']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        if (!empty($data['gambar'])) {
            $this->db->bind('gambar', $data['gambar']);
        }
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function hapusProduk($id)
    {
        $produk = $this->getProdukById($id);
        if ($produk) {
            $gambarPath = 'img/produk/' . $produk['gambar'];
            if (file_exists($gambarPath) && !empty($produk['gambar'])) {
                unlink($gambarPath); 
            }
        }
        $query = "DELETE FROM {$this->table} WHERE id_produk = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}