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
        $this->db->query('SELECT * FROM ' . $this->table . ' a, kategori k WHERE a.id_kategori=k.id_ktgr');
        return $this->db->resultSet();
    }
}