<?php

class Home_model
{
    private $table = 'buku';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllBuku($limit, $offset)
    {
        $this->db->query('SELECT b.*, k.nama_kategori FROM buku b INNER JOIN kategori k ON b.id_kategori=k.id_ktgr WHERE is_deleted IS NULL LIMIT :limit OFFSET :offset');
        $this->db->bind(':limit', $limit);
        $this->db->bind(':offset', $offset);
        return $this->db->resultSet();
    }

    public function getTotalRows()
    {
        $this->db->query('SELECT COUNT(*) AS total FROM buku WHERE is_deleted IS NULL');
        $result = $this->db->single();
        return $result['total'];
    }

    public function getTotalRowsCari()
    {   
        $keyword = $_POST['keyword'];
        $this->db->query('SELECT COUNT(*) AS total FROM buku WHERE is_deleted IS NULL AND nama_buku LIKE :keyword');
        $this->db->bind(':keyword', "%$keyword%");
        $result = $this->db->single();  
        return $result['total'];
    }

    public function cariDataBuku($limit, $offset)
    {
        $keyword = $_POST['keyword'];

        $query = "SELECT b.*, k.nama_kategori 
              FROM buku b 
              INNER JOIN kategori k ON b.id_kategori = k.id_ktgr 
              WHERE b.nama_buku LIKE :keyword AND is_deleted IS NULL LIMIT :limit OFFSET :offset";

        $this->db->query($query);
        $this->db->bind(':limit', $limit);
        $this->db->bind(':offset', $offset);
        $this->db->bind(':keyword', "%$keyword%");

        return $this->db->resultSet();
    }
}