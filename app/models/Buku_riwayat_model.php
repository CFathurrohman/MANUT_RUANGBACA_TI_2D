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

    public function getUserRiwayat($limit, $offset)
    {
        $this->db->query("SELECT p.id_peminjaman, p.tgl_batas_kembali, p.tgl_pengajuan, a.nama, a.no_telp, a.id_anggota, b.nama_buku, p.tgl_pinjam, p.tgl_kembali, p.status, p.kondisi, p.denda, p.keterangan
        FROM peminjaman_buku p
        JOIN anggota a ON p.id_anggota = a.id_anggota
        JOIN detail_peminjaman d ON d.id_peminjaman = p.id_peminjaman
        JOIN buku b ON d.id_buku = b.id_buku
        WHERE ( p.status = 'dikembalikan' OR p.status = 'ditolak') AND a.id_anggota = :id_anggota
        GROUP BY p.id_peminjaman
        LIMIT :limit OFFSET :offset;");
        $this->db->bind(':limit', $limit);
        $this->db->bind(':offset', $offset);
        $this->db->bind(':id_anggota', $this->user);
        return $this->db->resultSet();
    }

    public function getTotalRowsCari()
    {
        $this->db->query("SELECT COUNT(*) AS total FROM peminjaman_buku pb
        INNER JOIN anggota a ON pb.id_anggota = a.id_anggota
        WHERE ( pb.status = 'dikembalikan' OR pb.status = 'ditolak') AND a.id_anggota = :id_anggota");
        $this->db->bind(':id_anggota', $this->user);
        $result = $this->db->single();
        return $result['total'];
    }

    public function read($id)
    {        
        $this->db->query("SELECT b.nama_buku, b.penulis, b.tahun_terbit, b.deskripsi, b.gambar, k.nama_kategori
                        FROM buku b 
                        JOIN detail_peminjaman d ON b.id_buku = d.id_buku 
                        JOIN kategori k ON b.id_kategori = k.id_ktgr
                        WHERE d.id_peminjaman IN ($id)
                        GROUP BY b.id_buku");
        return $this->db->resultSet();
    }
}
