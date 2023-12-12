<?php
    class Log extends Controller{
        public function index()
        {
            $data['judul'] = 'Login';
            $this->view('login/index', $data);
        }

        public function cek_login()
        {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $username = $_POST['username'];
                $password = $_POST['password'];
    
                $loginModel = $this->model('Login_model');
                $user = $loginModel->validateUser($username, $password);
    
                if ($user) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];

                    $_SESSION['level'] = $user['level'];
    
                    if ($_SESSION['level'] === 'admin') {
                        header('Location: ' . BASEURL . '/Home');
                    } elseif ($_SESSION['level'] === 'anggota') {
                        header('Location: ' . BASEURL . '/Home');
                    } else {
                        header('Location: ' . BASEURL . '/Home');
                    }
                    exit();
                } else {
                    Flasher::setFlash('Login failed. Invalid username or password.', 'danger', 'danger');
                    header('Location: ' . BASEURL . '/Log');
                    exit();
                }
            } else {
                header('Location: ' . BASEURL . '/Log');
                exit();
            }
        }

        public function logout()
        {
            // Hapus semua data sesi
            session_unset();
            session_destroy();

            // Redirect ke halaman login setelah logout
            header('Location: ' . BASEURL . '/Log');
            exit;
        }
    }
?>