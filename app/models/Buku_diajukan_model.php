<?php

class Buku_diajukan_model
{
    private $db;
    private $user;


    public function __construct()
    {
        $this->db = new Database();
        $this->user = isset($_SESSION['username']) ? $_SESSION['username'] : '';
    }

    public function getBukuDiajukan()
    {
        $query = "SELECT buku.*, tgl_pengajuan FROM buku
                  INNER JOIN detail_peminjaman dp ON buku.id_buku = dp.id_buku
                  INNER JOIN peminjaman_buku pb ON dp.id_peminjaman = pb.id_peminjaman
                  WHERE pb.id_anggota = :id_anggota AND pb.status = 'diajukan'";

        $this->db->query($query);
        $this->db->bind(':id_anggota', $this->user);

        return $this->db->resultSet();
    }

    public function read($id)
    {
        $this->db->query("SELECT b.nama_buku, b.penulis, b.tahun_terbit, b.deskripsi, b.gambar_buku, k.nama_kategori
                        FROM buku b 
                        JOIN kategori k ON b.id_kategori = k.id_ktgr
                        WHERE b.id_buku = :id_buku
                        GROUP BY b.id_buku");
        $this->db->bind(':id_buku', $id);
        return $this->db->resultSet();
    }
}
