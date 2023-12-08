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

    public function pengembalian($idPeminjaman){
        // Assuming the ID is passed in the URL
        $data = ['id_peminjaman' => $idPeminjaman];
    
        if ($this->model('Riwayat_model')->terimaPengembalian($data)) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
        }
    
        header('Location: ' . BASEURL . '/riwayat');
        exit;
    }

    public function cari()
    {
        $data['judul'] = 'Riwayat buku';
        $data['riwayat'] = $this->model('Riwayat_model')->cariDataAnggota();
        $this->view('templates/header', $data);
        $this->view('riwayat/index', $data);
        $this->view('templates/footer');
    }
}