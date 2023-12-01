<?php
    class Login extends Controller{
        public function index()
        {
            // $this->view('login/index');
            // $this->model('cek_login');
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $this->processLogin();
            } else {
                $this->view('login/index');
            }
        }

        public function logout()
        {
            session_destroy();
            header("Location: " . BASEURL . '/login'); // Redirect to the login page
            return ['response' => 'positive', 'alert' => 'Logout Berhasil'];
        }

        private function processLogin()
        {
            $username = $_POST['Username'];
            $password = $_POST['password'];
            // memanggil method login dari class Flasher
            $loginResult = $this->model('Flasher')->login($username, $password);

            if ($loginResult['response'] === 'positive') {
                header("Location: " . BASEURL . "/home/index");
                exit();
                // if ($loginResult['level'] == 'admin') {
                //     header("Location: " . BASEURL . '/admin/dashboard');
                // } else {
                //     header("Location: " . BASEURL . '/user/dashboard');
                // }
                // exit();
            } else {
                Flasher::setFlash($loginResult['alert'], 'gagal', 'danger');
                header('Location: ' . BASEURL . '/login');
                exit;
            }
        }
    }