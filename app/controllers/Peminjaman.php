<?php

class Peminjaman extends Controller
{
    public function index()
    {
        $data['judul'] = 'peminjaman buku';
        $data['peminjaman_buku'] = $this->model('Peminjaman_model')->getPeminjamanDiajukan();
        $this->view('templates/header', $data);
        $this->view('peminjaman/index', $data);
        $this->view('templates/footer');
    }

    public function terima($idPeminjaman){
        // Assuming the ID is passed in the URL
        $data = ['id_peminjaman' => $idPeminjaman];

        if ($this->model('Peminjaman_model')->terimaPeminjaman($data)) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
        }

        header('Location: ' . BASEURL . '/peminjaman');
        exit;
    }

    public function tolak($idPeminjaman){
        $data = ['id_peminjaman' => $idPeminjaman];

        if ($this->model('Peminjaman_model')->tolakPeminjaman($data)) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
        }

        header('Location: ' . BASEURL . '/peminjaman');
        exit;
    }

    public function cari()
    {
        $data['judul'] = 'peminjaman buku';
        $data['peminjaman_buku'] = $this->model('Peminjaman_model')->getPeminjamanDiajukan();
        $this->view('templates/header', $data);
        $this->view('peminjaman/index', $data);
        $this->view('templates/footer');
    }
}