<?php
class Keranjang_model
{
    private $db;
    private $user;

    public function __construct()
    {
        $this->db = new Database();
        $this->user = isset($_SESSION['username']) ? $_SESSION['username'] : '';
    }

    public function tambah($data)
    {
        $this->db->query("SELECT * FROM keranjang WHERE id_buku = :id_buku AND username = :username");
        $this->db->bind(':id_buku', $data['id_buku']);
        $this->db->bind(':username', $this->user);
        $this->db->execute();

        if ($this->db->rowCount() === 0) {
            $this->db->query("INSERT INTO keranjang (id_keranjang, id_buku, username) VALUES ('', :id_buku, :username)");
            $this->db->bind(':id_buku', $data['id_buku']);
            $this->db->bind(':username', $this->user);
            $this->db->execute();
        } else {
            echo "This book is already in your cart.";
        }
    }

    public function getAllKeranjang()
    {
        $this->db->query("SELECT b.id_buku, b.nama_buku, b.gambar, ker.id_keranjang
                          FROM buku b 
                          JOIN keranjang ker ON ker.id_buku = b.id_buku 
                          WHERE ker.username = :username");
        $this->db->bind(':username', $this->user);
        return $this->db->resultSet();
    }

    public function hapus($data)
    {
        $this->db->query("DELETE FROM keranjang WHERE id_keranjang = :id_keranjang");
        $this->db->bind(':id_keranjang', $data);
        $this->db->execute();
    }

    public function multiPinjam($selectedBooks)
    {
        $success = true;
        $this->db->query("INSERT INTO peminjaman_buku (id_peminjaman, status, tgl_pengajuan, id_anggota) VALUES (NULL, 'diajukan', CURDATE(), :id_anggota)");
        $this->db->bind(':id_anggota', $this->user);
        $this->db->execute();

        $id_peminjaman = $this->db->lastInsertId();

        foreach ($selectedBooks as $bookId) {
            $this->db->query("SELECT id_buku FROM keranjang WHERE id_keranjang = :id_keranjang AND username = :username");
            $this->db->bind(':id_keranjang', $bookId);
            $this->db->bind(':username', $this->user);
            $result = $this->db->single();

            if ($result) {
                $id_buku = $result['id_buku'];
                $this->db->query("INSERT INTO detail_peminjaman (id_detail, id_buku, id_peminjaman) VALUES (NULL, :id_buku, :id_peminjaman)");
                $this->db->bind(':id_buku', $id_buku);
                $this->db->bind(':id_peminjaman', $id_peminjaman);
                $this->db->execute();
                $this->db->query("DELETE FROM keranjang WHERE id_keranjang = :id_keranjang");
                $this->db->bind(':id_keranjang', $bookId);
                $this->db->execute();
            } else {
                $success = false;
            }
        }
        return $success;
    }

    public function getReadBukuById($id)
    {
        $this->db->query('
        SELECT b.*, k.nama_kategori
        FROM buku b
        INNER JOIN kategori k ON b.id_kategori = k.id_ktgr
        WHERE b.id_buku=:id_buku AND is_deleted IS NULL
    ');
        $this->db->bind(':id_buku', $id);
        return $this->db->single();
    }
    
    public function hitung(){
        $this->db->query("SELECT COUNT(*) AS total_books
                        FROM detail_peminjaman dp
                        JOIN peminjaman_buku pb ON dp.id_peminjaman = pb.id_peminjaman
                        WHERE (pb.status = 'diajukan' OR pb.status = 'dipinjam') 
                        AND pb.id_anggota = :id_anggota");
        $this->db->bind(':id_anggota', $this->user);
        $result = $this->db->single();
        return $result['total_books'];
    }
}
