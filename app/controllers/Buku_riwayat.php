<?php
class Buku_riwayat extends Controller{
    public function index()
    {
        $data['judul'] = 'Buku_riwayat_model';
        $data['buku'] = $this->model('Buku_riwayat_model')->getBukuRiwayat();
        $this->view('templates/header',$data);
        $this->view('Buku_riwayat/index',$data);
        $this->view('templates/footer');
    }

    public function read($id)
    {
        $data['judul'] = 'Buku_riwayat_model';
        $data['buku'] = $this->model('Buku_riwayat_model')->read($id);
        $this->view('templates/header', $data);
        $this->view('Buku_riwayat/read/index', $data);
        $this->view('templates/footer');
    }
}

