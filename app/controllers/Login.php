<?php
    class Login extends Controller{
        public function index()
        {
            $this->view('login/index');
            $this->model('cek_login');
        }
    }