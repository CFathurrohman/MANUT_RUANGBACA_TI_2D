<?php
class Buku_simpan_model
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
        $this->db->query("SELECT * FROM simpan_buku WHERE id_buku = :id_buku AND username = :username");
        $this->db->bind(':id_buku', $data['id_buku']);
        $this->db->bind(':username', $this->user);
        $this->db->execute();

        if ($this->db->rowCount() === 0) {
            $this->db->query("INSERT INTO simpan_buku (id_simpan, id_buku, username) VALUES ('', :id_buku, :username)");
            $this->db->bind(':id_buku', $data['id_buku']);
            $this->db->bind(':username', $this->user);
            $this->db->execute();
        } else {
            echo "This book is already in your cart.";
        }
    }

    public function getAllSimpan()
    {
        $this->db->query("SELECT b.id_buku, b.nama_buku, b.gambar, sb.id_simpan
                    FROM buku b
                    JOIN simpan_buku sb ON sb.id_buku = b.id_buku 
                    WHERE sb.username = :username
        ");
        $this->db->bind(':username', $this->user);
        return $this->db->resultSet();
    }

    public function hapus($data)
    {
        $this->db->query("DELETE FROM simpan_buku WHERE id_simpan = :id_simpan");
        $this->db->bind(':id_simpan', $data);
        $this->db->execute();
    }

    public function multiPinjam($selectedBooks)
    {
        foreach ($selectedBooks as $bookId) {
            $this->db->query("SELECT id_buku FROM simpan_buku WHERE id_simpan = :id_simpan AND username = :username");
            $this->db->bind(':id_simpan', $bookId);
            $this->db->bind(':username', $this->user);
            $result = $this->db->single();
    
            if ($result) {
                $id_buku = $result['id_buku'];
                
                // Check if the id_buku already exists in keranjang table
                $this->db->query("SELECT id_buku FROM keranjang WHERE id_buku = :id_buku AND username = :username");
                $this->db->bind(':id_buku', $id_buku);
                $this->db->bind(':username', $this->user);
                $existing = $this->db->single();
    
                if (!$existing) {
                    // If id_buku doesn't exist in keranjang, then insert it
                    $this->db->query("INSERT INTO keranjang (id_buku, username) VALUES (:id_buku, :username)");
                    $this->db->bind(':id_buku', $id_buku);
                    $this->db->bind(':username', $this->user);
                    $this->db->execute();
                }
    
                // After checking and possibly inserting, delete from simpan_buku
                $this->db->query("DELETE FROM simpan_buku WHERE id_simpan = :id_simpan");
                $this->db->bind(':id_simpan', $bookId);
                $this->db->execute();
            }
        }
        return true; // Return success assuming no errors occurred
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
