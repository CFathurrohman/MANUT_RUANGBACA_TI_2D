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

    public function log_Login($username, $id_user)
    {
        $this->db->query('INSERT INTO log_login (username, login_time, login_ip, id_user) VALUES (:username, :login_time, :login_ip, :id_user)');
        $this->db->bind(':username', $username);
        $this->db->bind(':login_time', date('Y-m-d H:i:s'));
        $this->db->bind(':login_ip', $this->get_ip_address());
        $this->db->bind(':id_user', $id_user);

        $this->db->execute();
        return $this->db->rowCount();
    }


    function get_ip_address()
    {
        // Check for shared internet/ISP IP
        if (!empty($_SERVER['HTTP_CLIENT_IP']) && $this->validate_ip($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        }

        // Check for IPs passing through proxies
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            // Check if multiple IP addresses are set and use the first one
            $iplist = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            foreach ($iplist as $ip) {
                if ($this->validate_ip($ip)) {
                    return $ip;
                }
            }
        }

        if (!empty($_SERVER['HTTP_X_FORWARDED']) && $this->validate_ip($_SERVER['HTTP_X_FORWARDED'])) {
            return $_SERVER['HTTP_X_FORWARDED'];
        }

        if (!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && $this->validate_ip($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])) {
            return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
        }

        if (!empty($_SERVER['HTTP_FORWARDED_FOR']) && $this->validate_ip($_SERVER['HTTP_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_FORWARDED_FOR'];
        }

        if (!empty($_SERVER['HTTP_FORWARDED']) && $this->validate_ip($_SERVER['HTTP_FORWARDED'])) {
            return $_SERVER['HTTP_FORWARDED'];
        }

        // Check for IPs from remote address
        if (!empty($_SERVER['REMOTE_ADDR']) && $this->validate_ip($_SERVER['REMOTE_ADDR'])) {
            return $_SERVER['REMOTE_ADDR'];
        }

        return false;
    }

    function validate_ip($ip)
    {
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
            return false;
        }
        return true;
    }

//$ip_address = get_ip_address();


}