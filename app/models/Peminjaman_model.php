<?php
class Peminjaman_model
{
    private $table = 'peminjaman_buku';
    private $db;


    public function __construct()
    {
        // data source name
        $this->db = new Database();
    }

    public function getAllPeminjaman()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
}