<?php
class Riwayat_model
{
    private $table = 'peminjaman_buku';
    private $db;


    public function __construct()
    {
        // data source name
        $this->db = new Database();
    }

    public function getRiwayatAll()
    {
        $this->db->query("SELECT p.tgl_batas_kembali, p.tgl_pengajuan, p.id_peminjaman, a.nama, a.no_telp, a.id_anggota, b.nama_buku, p.tgl_pinjam, p.tgl_kembali, d.jumlah, p.status
        FROM peminjaman_buku p, anggota a, buku b, detail_peminjaman d
        WHERE (p.status = 'dipinjam' OR p.status = 'dikembalikan' OR p.status = 'ditolak') AND d.id_buku = b.id_buku AND d.id_peminjaman = p.id_peminjaman AND p.id_anggota=a.id_anggota");
        return $this->db->resultSet();
    }

    public function terimaPengembalian($data){
        $this->db->query("UPDATE peminjaman_buku SET status='dikembalikan', tgl_kembali=CURDATE() WHERE id_peminjaman = :id_peminjaman");
        $this->db->bind(':id_peminjaman', $data['id_peminjaman']);
        return $this->db->execute(); 
    }

    public function cariDataAnggota()
    {
        $keyword = $_POST['keyword'];
        $this->db->query("SELECT p.tgl_batas_kembali, p.tgl_pengajuan, p.id_peminjaman, a.nama, a.no_telp, a.id_anggota, b.nama_buku, p.tgl_pinjam, p.tgl_kembali, d.jumlah, p.status
        FROM peminjaman_buku p, anggota a, buku b, detail_peminjaman d
        WHERE (p.status = 'dipinjam' OR p.status = 'dikembalikan' OR p.status = 'ditolak') AND d.id_buku = b.id_buku AND d.id_peminjaman = p.id_peminjaman AND p.id_anggota=a.id_anggota AND a.nama LIKE :keyword");
        $this->db->bind(':keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}