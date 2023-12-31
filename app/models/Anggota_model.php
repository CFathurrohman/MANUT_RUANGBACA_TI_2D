<?php

class Anggota_model
{
    private $table = 'anggota';
    private $db;


    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllAnggota($limit, $offset)
    {
        $this->db->query('SELECT * FROM anggota ORDER BY nama LIMIT :limit OFFSET :offset');
        $this->db->bind(':limit', $limit);
        $this->db->bind(':offset', $offset);
        return $this->db->resultSet();
    }
    
    public function getTotalRows()
    {
        $this->db->query('SELECT COUNT(*) AS total FROM anggota');
        $result = $this->db->single();
        return $result['total'];
    }

    public function getTotalRowsCari()
    {
        $keyword = $_POST['keyword'];
        $this->db->query('SELECT COUNT(*) AS total FROM anggota WHERE nama LIKE :keyword');
        $this->db->bind(':keyword', '%' . $keyword . '%');
        $result = $this->db->single();
        return $result['total'];
    }

    public function getAnggotaById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_anggota = :id_anggota');
        $this->db->bind(':id_anggota', $id);
        return $this->db->single();
    }

    public function tambahDataAnggota($data)
    {
        if ($data['status'] == 'mahasiswa' || $data['status'] == 'dosen' || $data['status'] == 'pegawai') {
            $level = 'anggota';
        } else {
            $level = 'admin';
        }

        $password = $data['id_anggota'];
        $salt = bin2hex(random_bytes(16));
        $combined_password = $salt . $password;
        $hashed_password = password_hash($combined_password, PASSWORD_BCRYPT);

        $userInsertQuery = "INSERT INTO user (id_user, username, password, salt, level) VALUES ('', :username, :password, :salt, :level)";
        $this->db->query($userInsertQuery);
        $this->db->bind(':username', $data['id_anggota']);
        $this->db->bind(':password', $hashed_password);
        $this->db->bind(':salt', $salt);
        $this->db->bind(':level', $level);
        $this->db->execute();

        $id_user = $this->db->lastInsertId();

        $anggotaInsertQuery = "INSERT INTO anggota (id_anggota, nama, no_telp, status, id_user) VALUES (:username, :nama, :no_telp, :status, :id_user)";
        $this->db->query($anggotaInsertQuery);
        $this->db->bind(':username', $data['id_anggota']);
        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':no_telp', $data['no_telp']);
        $this->db->bind(':status', $data['status']);
        $this->db->bind(':id_user', $id_user);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataAnggota($id)
    {
        $anggotaQuery = "DELETE FROM anggota WHERE id_anggota = :id_anggota";
        $this->db->query($anggotaQuery);
        $this->db->bind(':id_anggota', $id);
        $this->db->execute();

        $userQuery = "DELETE FROM user WHERE username = :id_anggota";
        $this->db->query($userQuery);
        $this->db->bind(':id_anggota', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataAnggota($data)
    {
        // Update user table
        $userQuery = "UPDATE user SET username = :username WHERE id_user = :id_user";
        $this->db->query($userQuery);
        $this->db->bind(':username', $data['id_anggota']);
        $this->db->bind(':id_user', $data['id_user']);
        $this->db->execute();
    
        // Update anggota details
        $anggotaQuery = "UPDATE anggota SET nama = :nama, no_telp = :no_telp, status = :status WHERE id_anggota = :id_anggota";
        $this->db->query($anggotaQuery);
        $this->db->bind(':id_anggota', $data['id_anggota']);
        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':no_telp', $data['no_telp']);
        $this->db->bind(':status', $data['status']);
        $this->db->execute();
    
        return $this->db->rowCount();
    }
    
    public function cariDataAnggota($limit, $offset)
    {
        $query = "SELECT * FROM anggota WHERE nama LIKE :keyword LIMIT :limit OFFSET :offset";
        $keyword = $_POST['keyword'];
        $this->db->query($query);
        $this->db->bind(':keyword', "%$keyword%");
        $this->db->bind(':limit', $limit, PDO::PARAM_INT);
        $this->db->bind(':offset', $offset, PDO::PARAM_INT);
        
        return $this->db->resultSet();
    }
}
