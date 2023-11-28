<?php
require_once 'anti_injection';
class UserAuthentication {
    private $koneksi;

    public function __construct($connection) {
        $this->koneksi = $connection;
    }

    public function loginUser($username, $password) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        include '../config/connection.php';
        include '../models/anti_injection.php';

        $username = anti_injection($this->koneksi, $username);
        $password = anti_injection($this->koneksi, $password);

        $query = "SELECT username, level, salt, password as hashed_password FROM user WHERE username = '$username'";
        $result = mysqli_query($this->koneksi, $query);
        $row = mysqli_fetch_assoc($result);
        mysqli_close($this->koneksi);

        if ($row) {
            $salt = $row['salt'];
            $hashed_password = $row['hashed_password'];

            if ($salt !== null && $hashed_password !== null) {
                $combined_password = $salt . $password;

                if (password_verify($combined_password, $hashed_password)) {
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['level'] = $row['level'];
                    header("Location: index.php");
                    exit(); // Always exit after a header redirect
                } else {
                    pesan('danger', "Login gagal. Password Anda Salah.");
                    header("Location: login.php");
                    exit(); // Always exit after a header redirect
                }
            } else {
                flash('warning', "Username tidak ditemukan.");
                header("Location: login.php");
                exit(); // Always exit after a header redirect
            }
        } else {
            flash('warning', "Username tidak ditemukan.");
            header("Location: login.php");
            exit(); // Always exit after a header redirect
        }
    }
}

// Usage example:
$userAuth = new UserAuthentication($koneksi); // Pass your database connection to the class
$userAuth->loginUser($_POST['username'], $_POST['password']);
?>
