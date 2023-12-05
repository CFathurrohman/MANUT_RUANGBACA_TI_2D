<?php
class Login_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function validateUser($username, $password)
    {
        $this->db->query('SELECT * FROM user WHERE username = :username AND password = :password');
        $this->db->bind(':username', $username);
        $this->db->bind(':password', md5($password));

        $user = $this->db->single();

        return $user;
    }

    public function getUserLevel($userId)
    {
        $this->db->query('SELECT level FROM user WHERE id = :id');
        $this->db->bind(':id', $userId);

        $level = $this->db->single();

        return $level['level'];
    }
}