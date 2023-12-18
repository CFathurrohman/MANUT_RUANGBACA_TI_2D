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
                    $_SESSION['id_user'] = $user['id_user'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['level'] = $user['level'];

                    $this->model('Login_model')->log_login($username, $user['id_user']);

                    if ($_SESSION['level'] === 'admin' || $_SESSION['level'] === 'anggota') {
                        $message = 'Anda berhasil Login!';
                        $type = 'success';
                        Flasher::setFlash($message, 'success', $type);
                        header('Location: ' . BASEURL . '/Home');
                        exit();
                    } else {
                        $message = 'Anda Gagal Login!';
                        $type = 'error';
                        Flasher::setFlash($message, 'danger', $type);
                        header('Location: ' . BASEURL . '/Log');
                        exit();
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