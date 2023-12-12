<?php

class Riwayat extends Controller
{
    public function index()
    {
        $data['judul'] = 'Riwayat buku';
        $data['riwayat'] = $this->model('Riwayat_model')->getRiwayatAll();
        $this->view('templates/header', $data);
        $this->view('riwayat/index', $data);
        $this->view('templates/footer');
    }

    public function cari()
    {
        $data['judul'] = 'Riwayat buku';
        $data['riwayat'] = $this->model('Riwayat_model')->cariDataAnggota();
        $this->view('templates/header', $data);
        $this->view('riwayat/index', $data);
        $this->view('templates/footer');
    }

    public function read($id)
    {
        $data['judul'] = 'Riwayat Peminjaman';
        $data['buku'] = $this->model('Riwayat_model')->readMulti($id);
        $this->view('templates/header', $data);
        $this->view('riwayat/read/index', $data);
        $this->view('templates/footer');
    }
}