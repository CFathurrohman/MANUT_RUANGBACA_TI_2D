<?php


require_once 'anti_injection.php';

class UserAuthentication {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function loginUser($username, $password) {
        $antiInjection = new anti_injection($this->connection);
        $username = $antiInjection->anti_injection($this->connection, $username);
        $password = $antiInjection->anti_injection($this->connection, $password);

        $query = "SELECT username, level, salt, password as hashed_password FROM user WHERE username = '$username'";
        $result = mysqli_query($this->connection, $query);
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            $salt = $row['salt'];
            $hashed_password = $row['hashed_password'];

            if ($salt !== null && $hashed_password !== null) {
                $combined_password = $salt . $password;

                if (password_verify($combined_password, $hashed_password)) {
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['level'] = $row['level'];
                    header("Location: index.php");
                    exit(); 
                } else {
                    header("Location: login.php?error=password");
                    exit();
                }
            } else {
                header("Location: login.php?error=credentials");
                exit();
            }
        } else {
            header("Location: login.php?error=user_not_found");
            exit();
        }
    }
}
?>
