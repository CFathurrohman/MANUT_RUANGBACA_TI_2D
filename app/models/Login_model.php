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
}