<?php
class Profil extends Controller{
    public function index()
    {
        $data['judul'] = 'Profil';
        $data['user'] = $this->model('Profil_model')->getUserData();
        $this->view('templates/header',$data);
        $this->view('profil/index',$data);
        $this->view('templates/footer');
    }
}