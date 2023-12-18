<?php
class Buku_diajukan extends Controller{
    public function index()
    {
        $data['judul'] = 'Buku_diajukan';
        $data['buku'] = $this->model('Buku_diajukan_model')->getBukuDiajukan();
        $this->view('templates/header',$data);
        $this->view('buku_diajukan/index',$data);
        $this->view('templates/footer');
    }

    public function read($id)
    {
        $data['judul'] = 'Buku_diajukan';
        $data['buku'] = $this->model('Buku_diajukan_model')->read($id);
        $this->view('templates/header', $data);
        $this->view('buku_diajukan/read/index', $data);
        $this->view('templates/footer');
    }
}

