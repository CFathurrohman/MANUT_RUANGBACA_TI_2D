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
        $this->db->query('SELECT * FROM ' . $this->table . ' a, kategori k WHERE a.id_kategori=k.id_ktgr');
        return $this->db->resultSet();
    }

    public function getReadBukuById($id)
    {
        //        $this->db->query('SELECT * FROM ' . $this->table . ' kategori WHERE id=:id');
        $this->db->query('
        SELECT b.*, k.nama_kategori
        FROM ' . $this->table . ' b
        INNER JOIN kategori k ON b.id_kategori = k.id_ktgr
        WHERE b.id=:id_b        
    ');
        $this->db->bind(':id_b', $id);
        return $this->db->single();
    }

    public function getBukuById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' kategori WHERE id=:id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function tambahDataBuku($data)
    {
        //        if ($data['nama_kategori'] == 'fiksi' || $data['nama_kategori'] == 'ilmiah') {
        //            $level = 'anggota';
        //        } else {
        //            $level = 'admin';
        //        }

        $kategoriInsertQuery = "INSERT INTO kategori (id_ktgr, nama_kategori) 
                    VALUES ('', :nama_kategori)";
        $this->db->query($kategoriInsertQuery);
        $this->db->bind(':nama_kategori', $data['nama_kategori']);

        $this->db->execute();

        $id_kategori = $this->db->lastInsertId();

        $bukuInsertQuery = "INSERT INTO buku (id, nama_buku, penulis, tahun_terbit, deskripsi, id_kategori) 
                    VALUES ('', :nama_buku, :penulis, :tahun_terbit, :deskripsi, :id_kategori)";
        $this->db->query($bukuInsertQuery);
        $this->db->bind(':nama_buku', $data['nama_buku']);
        $this->db->bind(':penulis', $data['penulis']);
        $this->db->bind(':tahun_terbit', $data['tahun_terbit']);
        $this->db->bind(':deskripsi', $data['deskripsi']);
        $this->db->bind(':id_kategori', $id_kategori);

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
        $deleteQuery = "DELETE buku, kategori FROM buku
                        INNER JOIN kategori ON buku.id_kategori = kategori.id_ktgr
                        WHERE buku.id = :id_buku";

        $this->db->query($deleteQuery);
        $this->db->bind(":id_buku", $id);
        $this->db->execute();

        return $this->db->resultSet();
    }

    public function ubahDataBuku($data)
    {
        $updateQuery = "
        UPDATE buku b
        JOIN kategori k ON k.id_ktgr = b.id_kategori
        SET k.nama_kategori = :nama_kategori,
            b.nama_buku = :nama_buku,
            b.tahun_terbit = :tahun_terbit,
            b.deskripsi = :deskripsi,
            b.penulis = :penulis
        WHERE k.id_ktgr = :id_kategori
    ";

        $this->db->query($updateQuery);
        $this->db->bind(':nama_kategori', $data['nama_kategori']);
        $this->db->bind(':nama_buku', $data['nama_buku']);
        $this->db->bind(':penulis', $data['penulis']);
        $this->db->bind(':tahun_terbit', $data['tahun_terbit']);
        $this->db->bind(':deskripsi', $data['deskripsi']);
        $this->db->bind(':id_kategori', $data['id_kategori']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
