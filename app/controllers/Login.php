<?php
    class Login extends Controller{
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
    
                if ($user =! null) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
    
                    $userLevel = $user['level'];
    
                    if ($userLevel === 'admin') {
                        header('Location: ' . BASEURL . '/Home');
                    } elseif ($userLevel === 'anggota') {
                        header('Location: ' . BASEURL . '/Home');
                    } else {
                        header('Location: ' . BASEURL . '/Home');
                    }
                    exit();
                } else {
                    Flasher::setFlash('Login failed. Invalid username or password.', 'danger', 'danger');
                    header('Location: ' . BASEURL . '/Login');
                    exit();
                }
            } else {
                header('Location: ' . BASEURL . '/Login');
                exit();
            }
        }
    }
?>