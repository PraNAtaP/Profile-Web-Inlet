<?php

class Produk_model
{
    private $table = 'produk_lab';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * Mengambil semua data produk, diurutkan berdasarkan tanggal pembuatan.
     */
    public function getAllProduk()
    {
        $this->db->query("SELECT * FROM {$this->table} ORDER BY created_at DESC");
        return $this->db->resultSet();
    }

    /**
     * Mengambil satu data produk berdasarkan ID.
     */
    public function getProdukById($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id_produk = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    /**
     * Menambahkan data produk baru ke database.
     * Asumsi: $data['gambar'] berisi nama file gambar yang sudah di-upload.
     * Asumsi: $data['id_admin'] berisi ID admin dari session.
     */
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

    /**
     * Memperbarui data produk yang ada.
     * Jika gambar baru di-upload ($data['gambar'] tidak kosong), maka akan di-update.
     * Jika tidak, gambar lama akan dipertahankan.
     */
    public function updateProduk($data)
    {
        $query = "UPDATE {$this->table} SET 
                    judul = :judul, 
                    link = :link, 
                    deskripsi = :deskripsi
                    -- placeholder untuk gambar jika ada
                  WHERE id_produk = :id_produk";

        // Jika ada gambar baru, tambahkan ke query
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

        // Bind gambar hanya jika ada
        if (!empty($data['gambar'])) {
            $this->db->bind('gambar', $data['gambar']);
        }

        $this->db->execute();
        return $this->db->rowCount();
    }

    /**
     * Menghapus data produk berdasarkan ID.
     * Ini juga akan menghapus file gambar terkait dari server.
     */
    public function hapusProduk($id)
    {
        // Ambil nama file untuk dihapus
        $produk = $this->getProdukById($id);

        if ($produk) {
            $gambarPath = 'img/produk/' . $produk['gambar'];
            if (file_exists($gambarPath) && !empty($produk['gambar'])) {
                unlink($gambarPath); // Hapus file gambar
            }
        }

        $query = "DELETE FROM {$this->table} WHERE id_produk = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }
}