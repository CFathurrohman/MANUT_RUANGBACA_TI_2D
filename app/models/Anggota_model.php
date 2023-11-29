<?php
//    class Anggota_model
//    {
//        private $table = 'anggota';
//        private $dbh;
//        private $stmt;
//
//
//        public function __construct()
//        {
//            // data source name
//            $dsn = 'mysql:host=localhost;dbname=sistem_ruang_baca';
//
//            try {
//                $this->dbh = new PDO($dsn, 'root', '');
//            } catch (PDOException $e) {
//                die($e->getMessage());
//            }
//        }
//
//        public function getAllAnggota()
//        {
//            $this->stmt = $this->dbh->prepare('SELECT * FROM ' . $this->table);
//            $this->stmt->execute();
//            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
//        }
//
//        public function getAnggotaById($id)
//        {
//            $this->stmt = $this->dbh->prepare('SELECT * FROM ' . $this->table . ' WHERE id=:id');
//            $this->stmt->bindParam(':id', $id);
//            $this->stmt->execute();
//            return $this->stmt->fetch(PDO::FETCH_ASSOC);
//        }
//
//        public function tambahDataAnggota($data)
//        {
//            if ($data['status'] == 'mahasiswa' || $data['status'] == 'dosen' || $data['status'] == 'pegawai') {
//                $level = 'anggota';
//            } else {
//                $level = 'admin';
//            }
//
//            $password = $data['id'];
//            $salt = bin2hex(random_bytes(16));
//            $combined_password = $salt . $password;
//            $hashed_password = password_hash($combined_password, PASSWORD_BCRYPT);
//
//            $query = "INSERT INTO user (id, username, password, salt, level) VALUES (NULL, :username, :password, :salt, :level)";
//            $this->stmt = $this->dbh->prepare($query);
//            $this->stmt->bindParam(':username', $data['id']);
//            $this->stmt->bindParam(':password', $hashed_password);
//            $this->stmt->bindParam(':salt', $salt);
//            $this->stmt->bindParam(':level', $level);
//
//            $this->stmt->execute();
//
//            $id_user = $this->dbh->lastInsertId();
//
//            $query = "INSERT INTO anggota (id, nama, no_telp, status, id_user) VALUES (:username, :nama, :no_telp, :status, :id_user)";
//            $this->stmt = $this->dbh->prepare($query);
//            $this->stmt->bindParam(':username', $data['id']);
//            $this->stmt->bindParam(':nama', $data['nama']);
//            $this->stmt->bindParam(':no_telp', $data['no_telp']);
//            $this->stmt->bindParam(':status', $data['status']);
//            $this->stmt->bindParam(':id_user', $id_user);
//
//            $this->stmt->execute();
//
//            return $this->stmt->rowCount();
//        }
//
//        public function hapusDataAnggota($id)
//        {
//            $query = "DELETE FROM anggota WHERE id = :id";
//            $this->stmt = $this->dbh->prepare($query);
//            $this->stmt->bindParam(':id', $id);
//            $this->stmt->execute();
//
//            $query = "DELETE FROM user WHERE username = :id";
//            $this->stmt = $this->dbh->prepare($query);
//            $this->stmt->bindParam(':id', $id);
//            $this->stmt->execute();
//
//            return $this->stmt->rowCount();
//        }
//
//        public function ubahDataAnggota($data)
//        {
//            $query = "UPDATE anggota SET
//                            nama = :nama,
//                            no_telp = :no_telp,
//                            status = :status
//                        WHERE id = :id";
//
//            $this->stmt = $this->dbh->prepare($query);
//            $this->stmt->bindParam(':nama', $data['nama']);
//            $this->stmt->bindParam(':no_telp', $data['no_telp']);
//            $this->stmt->bindParam(':status', $data['status']);
//            $this->stmt->bindParam(':id', $data['id']);
//
//            $this->stmt->execute();
//
//            return $this->stmt->rowCount();
//        }
//    }


class Anggota_model
{
    private $table = 'anggota';
    private $db;


    public function __construct()
    {
        // data source name
        $this->db = new Database();
    }

    public function getAllAnggota()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
}