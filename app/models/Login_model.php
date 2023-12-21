<?php
class Login_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function validateUser($username, $pwd)
    {
        $result = $this->getUserByUsername($username);

        if ($result != null) {
            $salt = $result['salt'];
            $password = $result['password'];

            if ($salt != null && $password != null) {
                $combined_password = $salt . $pwd;
                if (password_verify($combined_password, $password)) {
                    return $result;
                } else {
                    return null;
                }
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    public function getUserByUsername($username)
    {
        $this->db->query('SELECT * FROM user WHERE username = :username');
        $this->db->bind(':username', $username);

        return $this->db->single();
    }

    public function getAlertUsername($id_user)
    {
        $this->db->query('SELECT nama FROM anggota WHERE id_user = :id_user');
        $this->db->bind(':id_user', $id_user);
        return $this->db->single();
    }

    public function log_Login($username, $id_user)
    {
        $this->db->query('INSERT INTO log_login (username, login_time, id_user) VALUES (:username, :login_time, :id_user)');
        $this->db->bind(':username', $username);
        $this->db->bind(':login_time', date('Y-m-d H:i:s'));
        $this->db->bind(':id_user', $id_user);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
