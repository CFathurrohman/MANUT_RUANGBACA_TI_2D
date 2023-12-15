<?php
class Buku_dipinjam extends Controller{
    public function index()
    {
        $data['judul'] = 'Buku_dipinjam';
        $data['buku'] = $this->model('Buku_dipinjam_model')->getBukuDipinjam();
        $this->view('templates/header',$data);
        $this->view('Buku_dipinjam/index',$data);
        $this->view('templates/footer');
    }

    public function read($id)
    {
        $data['judul'] = 'Buku_dipinjam';
        $data['buku'] = $this->model('Buku_dipinjam_model')->read($id);
        $this->view('templates/header', $data);
        $this->view('Buku_dipinjam/read/index', $data);
        $this->view('templates/footer');
    }
}

