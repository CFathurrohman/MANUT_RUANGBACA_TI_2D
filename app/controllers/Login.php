<?php
    class Login extends Controller{
        public function index()
        {
            $data['judul'] = 'Login';
            $this->view('login/index', $data);
        }

        public function login()
        {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $loginModel = $this->model('Login_model');
            $user = $loginModel->validateUser($username, $password);

            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];

                $userLevel = $loginModel->getUserLevel($user['id']);

                if ($userLevel === 'admin') {
                    header('Location: ' . BASEURL . '/Admin');
                } elseif ($userLevel === 'anggota') {
                    header('Location: ' . BASEURL . '/Anggota');
                } else {
                    header('Location: ' . BASEURL . '/Home');
                }
                exit();
            } else {
                Flasher::setFlash('Login failed. Invalid username or password.', 'danger', 'danger');
                header('Location: ' . BASEURL . '/Login');
                exit();
            }
        }
    }
?>