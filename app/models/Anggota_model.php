    <?php
        class Anggota_model {
            private $table = 'anggota';
            private $dbh;
            private $stmt;
            

            public function __construct()
            {   
                // data source name
                $dsn = 'mysql:host=localhost;dbname=sistem_ruang_baca';

                try {
                    $this->dbh = new PDO($dsn, 'root', '');
                } catch(PDOException $e) {
                    die($e->getMessage());
                }
             }

            public function getAllAnggota()
            {
                $this->stmt = $this->dbh->prepare('SELECT * FROM ' . $this->table);
                $this->stmt->execute();
                return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
            }

            public function getAnggotaById($id)
            {
                $this->stmt = $this->dbh->prepare('SELECT * FROM ' . $this->table . ' WHERE id=:id');
                $this->stmt->bindParam(':id', $id);
                $this->stmt->execute();
                return $this->stmt->fetch(PDO::FETCH_ASSOC);
            }

            public function tambahDataAnggota($data)
            {
                $query = "INSERT INTO anggota
                            VALUES
                            ('', :nama, :no_telp, :status)";
                
                $this->stmt = $this->dbh->prepare($query);
                $this->stmt->bindParam(':nama', $data['nama']);
                $this->stmt->bindParam(':no_telp', $data['no_telp']);
                $this->stmt->bindParam(':status', $data['status']);

                $this->stmt->execute();

                return $this->stmt->rowCount();
            }

            public function hapusDataAnggota($id)
            {
                $query = "DELETE FROM anggota WHERE id = :id";
                $this->stmt = $this->dbh->prepare($query);
                $this->stmt->bindParam(':id', $id);
                $this->stmt->execute();

                return $this->stmt->rowCount();
            }

            public function ubahDataAnggota($data)
            {
                $query = "UPDATE anggota SET
                            nama = :nama,
                            no_telp = :no_telp,
                            status = :status
                        WHERE id = :id";
                
                $this->stmt = $this->dbh->prepare($query);
                $this->stmt->bindParam(':nama', $data['nama']);
                $this->stmt->bindParam(':no_telp', $data['no_telp']);
                $this->stmt->bindParam(':status', $data['status']);
                $this->stmt->bindParam(':id', $data['id']);

                $this->stmt->execute();

                return $this->stmt->rowCount();
            }


        }