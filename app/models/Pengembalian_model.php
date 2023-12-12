<?php
class Pengembalian_model
{
    private $table = 'peminjaman_buku';
    private $db;


    public function __construct()
    {
        // data source name
        $this->db = new Database();
    }

    public function getAllPengembalian()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getPengembalian()
    {
        $this->db->query("SELECT p.id_peminjaman, p.tgl_batas_kembali, p.tgl_pengajuan, a.nama, a.no_telp, a.id_anggota, b.nama_buku, p.tgl_pinjam, p.tgl_kembali, p.status
        FROM peminjaman_buku p, anggota a, buku b, detail_peminjaman d
        WHERE p.status = 'dipinjam' AND d.id_buku = b.id_buku AND d.id_peminjaman = p.id_peminjaman AND p.id_anggota=a.id_anggota
        GROUP BY p.id_peminjaman");
        return $this->db->resultSet();
    }

    public function terimaPengembalian($data){
        $this->db->query("UPDATE peminjaman_buku SET status='dikembalikan', tgl_kembali=CURDATE() WHERE id_peminjaman = :id_peminjaman");
        $this->db->bind(':id_peminjaman', $data['id_peminjaman']);
        return $this->db->execute(); 
    }

    public function readMulti($id)
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
