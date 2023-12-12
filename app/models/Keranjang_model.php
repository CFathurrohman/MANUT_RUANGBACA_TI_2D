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
        $this->db->query("INSERT INTO peminjaman_buku (id_peminjaman, status, id_anggota) VALUES ('', 'disimpan', :id_anggota)");
        $this->db->bind(':id_anggota', $this->user);
        $this->db->execute();

        $lastInsertedId = $this->db->lastInsertId();

        $this->db->query('INSERT INTO detail_peminjaman (id_detail, id_buku, id_peminjaman) VALUES (NULL, :id_buku, :id_peminjaman)');
        $this->db->bind(':id_buku', $data['id_buku']);
        $this->db->bind(':id_peminjaman', $lastInsertedId);
        $this->db->execute();

        return true;
    }

    public function getAllKeranjang()
    {
        $this->db->query("SELECT b.id_buku, b.nama_buku, b.gambar_buku, d.id_detail
                          FROM buku b 
                          JOIN detail_peminjaman d ON b.id_buku = d.id_buku 
                          JOIN peminjaman_buku p ON d.id_peminjaman = p.id_peminjaman 
                          WHERE p.id_anggota = :id_anggota AND p.status = 'disimpan'");
        $this->db->bind(':id_anggota', $this->user);
        return $this->db->resultSet();
    }

    public function hapus($id)
    {
        $this->db->query("SELECT id_peminjaman FROM detail_peminjaman WHERE id_detail = :id_detail");
        $this->db->bind(':id_detail', $id);
        $result = $this->db->single();

        if ($result) {
            $id_peminjaman = $result['id_peminjaman'];

            $this->db->query("DELETE FROM detail_peminjaman WHERE id_detail = :id_detail");
            $this->db->bind(':id_detail', $id);
            $this->db->execute();

            $this->db->query("SELECT id_detail FROM detail_peminjaman WHERE id_peminjaman = :id_peminjaman");
            $this->db->bind(':id_peminjaman', $id_peminjaman);
            $remainingEntries = $this->db->resultSet();

            if (empty($remainingEntries)) {
                $this->db->query("DELETE FROM peminjaman_buku WHERE id_peminjaman = :id_peminjaman");
                $this->db->bind(':id_peminjaman', $id_peminjaman);
                $this->db->execute();
            }
            return true;
        }
        return false;
    }

    public function pinjam($id)
    {
        $this->db->query("SELECT id_peminjaman FROM detail_peminjaman WHERE id_detail = :id_detail");
        $this->db->bind(':id_detail', $id);
        $result = $this->db->single();

        if ($result) {
            $id_peminjaman = $result['id_peminjaman'];

            $this->db->query("UPDATE peminjaman_buku SET status = 'diajukan', tgl_pengajuan = CURDATE() WHERE id_peminjaman = :id_peminjaman");
            $this->db->bind(':id_peminjaman', $id_peminjaman);
            $this->db->execute();
        }
    }

    public function multiPinjam($detailIds)
    {
        $success = true;
    
        $this->db->query("SELECT id_peminjaman FROM detail_peminjaman WHERE id_detail = :id_detail");
        $this->db->bind(':id_detail', $detailIds[0]);
        $result = $this->db->single();
    
        if ($result) {
            $id_peminjaman = $result['id_peminjaman'];
    
            foreach ($detailIds as $detailId) {
                // Update the id_peminjaman for each detail_peminjaman
                $this->db->query("UPDATE detail_peminjaman SET id_peminjaman = :id_peminjaman WHERE id_detail = :id_detail");
                $this->db->bind(':id_peminjaman', $id_peminjaman);
                $this->db->bind(':id_detail', $detailId);
    
                if (!$this->db->execute()) {
                    $success = false;
                }
            }
    
            $this->db->query("UPDATE peminjaman_buku SET status = 'diajukan', tgl_pengajuan = CURDATE(), id_peminjaman = :id_peminjaman WHERE id_peminjaman = :id_peminjaman");
            $this->db->bind(':id_peminjaman', $id_peminjaman);
            if (!$this->db->execute()) {
                $success = false;
            }
        } else {
            $success = false;
        }
        return $success;
    }
    
    public function read($id)
    {
        $this->db->query("SELECT b.nama_buku, b.gambar_buku, b.penulis, b.tahun_terbit, b.deskripsi, k.nama_kategori
                          FROM buku b 
                          JOIN peminjaman_buku p ON b.id_buku = p.id_buku
                          JOIN kategori k ON b.id_kategori = k.id_ktgr
                          WHERE b.id_buku = :id_buku AND p.id_anggota = :id_anggota AND p.status = 'disimpan'");
        $this->db->bind(':id_buku', $id);
        $this->db->bind(':id_anggota', $this->user);
        return $this->db->single();
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
}