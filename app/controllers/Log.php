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
    
                    if ($_SESSION['level'] === 'admin' || $_SESSION['level'] === 'anggota') {
                        $message = 'Anda berhasil Login!';
                        $type = 'success';
                        Flasher::setFlash($message, 'success', $type);
                        exit(header('Location: ' . BASEURL . '/Home'));
                    } else {
                        $message = 'Anda Gagal Login!';
                        $type = 'error';
                        Flasher::setFlash($message, 'danger', $type);
                        exit(header('Location: ' . BASEURL . '/Log'));
                    }
                    exit();
                } else {
                    $message = 'Gagal Login! Username dan Password salah.';
                    $type = 'error';
                    Flasher::setFlash($message, 'danger', $type);
                    header('Location: ' . BASEURL . '/Log');
                    exit();
                }
            } else {
                $message = 'Gagal Login! Username dan Password salah.';
                $type = 'error';
                Flasher::setFlash($message, 'danger', $type);
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