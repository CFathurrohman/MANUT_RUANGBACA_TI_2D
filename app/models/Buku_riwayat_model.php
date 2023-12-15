<?php

class Buku_riwayat_model
{
    private $db;
    private $user;


    public function __construct()
    {
        $this->db = new Database();
        $this->user = isset($_SESSION['username']) ? $_SESSION['username'] : '';
    }

    public function getBukuRiwayat()
    {
        $this->db->query("SELECT DISTINCT p.tgl_batas_kembali, p.tgl_pengajuan, p.id_peminjaman, a.nama, a.no_telp, a.id_anggota, b.nama_buku, p.tgl_pinjam, p.tgl_kembali, p.status
        FROM peminjaman_buku p, anggota a, buku b, detail_peminjaman d
        WHERE (p.status = 'dikembalikan' OR p.status = 'ditolak') AND d.id_buku = b.id_buku AND d.id_peminjaman = p.id_peminjaman AND p.id_anggota=a.id_anggota AND p.id_anggota = :id_anggota
        GROUP BY p.id_peminjaman DESC");
        $this->db->bind('id_anggota', $this->user);
        return $this->db->resultSet();
    }

    public function read($id)
    {        
        $this->db->query("SELECT b.nama_buku, b.penulis, b.tahun_terbit, b.deskripsi, b.gambar_buku, k.nama_kategori
                        FROM buku b 
                        JOIN detail_peminjaman d ON b.id_buku = d.id_buku 
                        JOIN kategori k ON b.id_kategori = k.id_ktgr
                        WHERE d.id_peminjaman IN ($id)
                        GROUP BY b.id_buku");
        return $this->db->resultSet();
    }
}
