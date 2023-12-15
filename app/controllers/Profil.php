<?php
class Profil extends Controller{
    public function index()
    {
        $data['judul'] = 'Profil';
        $data['user'] = $this->model('Profil_model')->getUserData();
        $data['buku_pinjam'] = $this->model('Profil_model')->getBukuPinjam();
        $data['buku_kembali'] = $this->model('Profil_model')->getBukuKembali();
        $this->view('templates/header',$data);
        $this->view('profil/index',$data);
        $this->view('templates/footer');
    }

    public function read($id)
    {
        $data['judul'] = 'Profil';
        $data['buku'] = $this->model('Profil_model')->read($id);
        $this->view('templates/header', $data);
        $this->view('profil/read/index', $data);
        $this->view('templates/footer');
    }
}