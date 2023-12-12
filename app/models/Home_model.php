<?php

class Home_model
{
    private $table = 'buku';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllBuku()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' a, kategori k WHERE a.id_kategori=k.id_ktgr AND is_deleted IS NULL');
        return $this->db->resultSet();
    }

    public function cariDataBuku()
    {
        $keyword = $_POST['keyword'];

        $query = "SELECT b.*, k.nama_kategori 
              FROM buku b 
              INNER JOIN kategori k ON b.id_kategori = k.id_ktgr 
              WHERE b.nama_buku LIKE :keyword AND is_deleted IS NULL    ";

        $this->db->query($query);
        $this->db->bind(':keyword', "%$keyword%");

        return $this->db->resultSet();
    }
}