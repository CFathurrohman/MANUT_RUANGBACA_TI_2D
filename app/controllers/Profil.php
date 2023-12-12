<?php
class Profil extends Controller{
    public function index()
    {
        $this->view('templates/header');
        $this->view('profil/index');
        $this->view('templates/footer');
    }
}