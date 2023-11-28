    <?php
        class Anggota_model {
            private $table = 'anggota';
            private $db;

            public function __construct()
            {
                $this->db = new Database;
            }

            public function getAllAnggota()
            {
                $this->db->query('SELECT * FROM ' . $this->table);
                return $this->db->resultSet();
            }

            public function getAnggotaById($id)
            {
                $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
                $this->db->bind('id', $id);
                return $this->db->single();
            }

            public function tambahDataAnggota($data)
            {
                $query = "INSERT INTO anggota VALUES
                        ('', :nama, :email, :jurusan)";

                $this->db->query($query);
                $this->db->bind('nama', $data['nama']);
                $this->db->bind('email', $data['email']);
                $this->db->bind('jurusan', $data['jurusan']);

                $this->db->execute();

                return $this->db->rowCount();
            }

            public function hapusDataAnggota($id)
            {
                $query = "DELETE FROM anggota WHERE id = :id";
                $this->db->query($query);
                $this->db->bind('id', $id);

                $this->db->execute();

                return $this->db->rowCount();
            }

            public function ubahDataAnggota($data)
            {
                $query = "UPDATE anggota SET
                            nama = :nama,
                            nrp = :nrp,
                            email = :email,
                            jurusan = :jurusan
                        WHERE id = :id";

                $this->db->query($query);
                $this->db->bind('nama', $data['nama']);
                $this->db->bind('nrp', $data['nrp']);
                $this->db->bind('email', $data['email']);
                $this->db->bind('jurusan', $data['jurusan']);
                $this->db->bind('id', $data['id']);

                $this->db->execute();

                return $this->db->rowCount();
            }

            public function cariDataAnggota()
            {
                $keyword = $_POST['keyword'];
                $query = "SELECT * FROM anggota WHERE nama LIKE :keyword";
                $this->db->query($query);
                $this->db->bind('keyword', "%$keyword%");
                return $this->db->resultSet();
            }
        }