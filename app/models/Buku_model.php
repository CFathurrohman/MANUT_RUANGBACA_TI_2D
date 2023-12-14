<?php

#[AllowDynamicProperties] class Buku_model
{
    private $table = 'buku';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllBuku()
    {
        $this->db->query('SELECT a.*, k.nama_kategori FROM ' . $this->table . ' a INNER JOIN kategori k ON a.id_kategori=k.id_ktgr');
        return $this->db->resultSet();
    }

    public function getReadBukuById($id)
    {
        $this->db->query('
        SELECT b.*, k.nama_kategori
        FROM buku b
        INNER JOIN kategori k ON b.id_kategori = k.id_ktgr
        WHERE b.id_buku=:id_buku        
    ');
        $this->db->bind(':id_buku', $id);
        return $this->db->single();
    }

    public function getBukuById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_buku=:id_buku');
        $this->db->bind(':id_buku', $id);
        return $this->db->single();
    }    

    public function tambahDataBuku($data, $gambar)
    {
        $bukuInsertQuery = "INSERT INTO buku (gambar_buku, nama_buku, penulis, tahun_terbit, jumlah_total, jumlah_tersedia, deskripsi, id_kategori) 
                        VALUES (:gambar_buku, :nama_buku, :penulis, :tahun_terbit, :jumlah_total, :jumlah_tersedia, :deskripsi, :id_kategori)";
        $this->db->query($bukuInsertQuery);
        $this->db->bind(':nama_buku', $data['nama_buku']);
        $this->db->bind(':penulis', $data['penulis']);
        $this->db->bind(':tahun_terbit', $data['tahun_terbit']);
        $this->db->bind(':jumlah_total', $data['jumlah_total']);
        $this->db->bind(':jumlah_tersedia', $data['jumlah_tersedia']);
        $this->db->bind(':deskripsi', $data['deskripsi']);
        $this->db->bind(':id_kategori', $data['id_kategori']);
        $this->db->bind(':gambar_buku', $gambar);
    
        $this->db->execute();
        return $this->db->rowCount();
    } 

    public function cariDataBuku()
    {
        $keyword = $_POST['keyword'];

        $query = "SELECT b.*, k.nama_kategori 
              FROM buku b 
              INNER JOIN kategori k ON b.id_kategori = k.id_ktgr 
              WHERE b.nama_buku LIKE :keyword";

        $this->db->query($query);
        $this->db->bind(':keyword', "%$keyword%");

        return $this->db->resultSet();
    }

    public function hapusDataBuku($id)
    {
        $deleteQuery = " DELETE FROM buku
                        WHERE id_buku = :id_buku";

        $this->db->query($deleteQuery);
        $this->db->bind(":id_buku", $id);
        $this->db->execute();

        return $this->db->resultSet();  
    }

    public function ubahDataBuku($data, $gambar)
    {
        $updateQuery = "
        UPDATE buku
        SET nama_buku = :nama_buku,
            tahun_terbit = :tahun_terbit,
            deskripsi = :deskripsi,
            penulis = :penulis,
            jumlah_total = :jumlah_total,
            jumlah_tersedia = :jumlah_tersedia,
            id_kategori = :id_kategori,
            gambar_buku = :gambar_buku
        WHERE id_buku = :id_buku
    ";

        $this->db->query($updateQuery);
        $this->db->bind(':id_buku', $data['id_buku']);
        $this->db->bind(':nama_buku', $data['nama_buku']);
        $this->db->bind(':penulis', $data['penulis']);
        $this->db->bind(':tahun_terbit', $data['tahun_terbit']);
        $this->db->bind(':jumlah_total', $data['jumlah_total']);
        $this->db->bind(':jumlah_tersedia', $data['jumlah_tersedia']);
        $this->db->bind(':deskripsi', $data['deskripsi']);
        $this->db->bind(':id_kategori', $data['id_kategori']);
        $this->db->bind(':gambar_buku', $gambar);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
