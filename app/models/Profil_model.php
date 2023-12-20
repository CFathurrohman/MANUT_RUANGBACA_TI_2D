<?php
class Profil_model
{
    private $db;
    private $user;


    public function __construct()
    {
        $this->db = new Database();
        $this->user = isset($_SESSION['username']) ? $_SESSION['username'] : '';
    }

    public function getUserData(){
        $this->db->query("SELECT * FROM anggota WHERE id_anggota = :id_anggota");
        $this->db->bind(':id_anggota', $this->user);
        return $this->db->single();
    }

    public function editFotoProfil($fotoProfil)
    {
        $updateQuery = "UPDATE anggota SET foto_profil = :foto_profil
                            WHERE id_anggota = :id_anggota";

        $this->db->query($updateQuery);
        $this->db->bind(':id_anggota', $this->user);
        $this->db->bind(':foto_profil', $fotoProfil);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
