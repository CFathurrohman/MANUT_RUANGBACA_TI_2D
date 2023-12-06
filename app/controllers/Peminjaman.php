<?php

class Peminjaman extends Controller
{
    public function index()
    {
        $data['judul'] = 'peminjaman buku';
        $data['peminjaman_buku'] = $this->model('Peminjaman_model')->getAllPeminjaman();
        $this->view('peminjaman/index', $data);
        $this->view('templates/header', $data);
        $this->view('templates/footer');
    }
}