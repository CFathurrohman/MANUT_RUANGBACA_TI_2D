<?php

class Peminjaman extends Controller
{
    public function index()
    {
        $data['judul'] = 'peminjaman buku';
        $data['buku'] = $this->model('Peminjaman_model')->getPeminjamanDiajukan();
        $this->view('templates/header', $data);
        $this->view('peminjaman/index', $data);
        $this->view('templates/footer');
    }

    public function terima($idPeminjaman)
    {
        $data = ['id_peminjaman' => $idPeminjaman];

        try {
            if ($this->model('Peminjaman_model')->terimaPeminjaman($data)) {
                Flasher::setFlash('Berhasil', 'diterima', 'success', 'peminjaman');
                header('Location: ' . BASEURL . '/peminjaman');
                exit;
            } else {
                Flasher::setFlash('Gagal', 'diterima', 'danger', 'peminjaman');
                header('Location: ' . BASEURL . '/peminjaman');
                exit;
            }

            header('Location: ' . BASEURL . '/peminjaman');
            exit;
        } catch (PDOException $e) {
            if ($e->getCode() == '45000') {
                echo '<script>';
                echo 'alert("Buku tidak tersedia");';
                echo 'window.location.href = "' . BASEURL . '/peminjaman";';
                echo '</script>';
                exit;
            } else {
            }
        }
    }

    public function tolak($idPeminjaman)
    {
        $data = ['id_peminjaman' => $idPeminjaman];

        if ($this->model('Peminjaman_model')->tolakPeminjaman($data)) {
            Flasher::setFlash('Berhasil', 'ditolak', 'success', 'Peminjaman Behasil ditolak!');
            header('Location: ' . BASEURL . '/peminjaman');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'ditolak', 'danger', 'Peminjaman ditolak!');
        }

        header('Location: ' . BASEURL . '/peminjaman');
        exit;
    }

    public function cari()
    {
        $data['judul'] = 'peminjaman buku';
        $data['buku'] = $this->model('Peminjaman_model')->getPeminjamanDiajukan();
        $this->view('templates/header', $data);
        $this->view('peminjaman/index', $data);
        $this->view('templates/footer');
    }

    public function read($id)
    {
        $data['judul'] = 'Peminjaman Buku';
        $data['buku'] = $this->model('Peminjaman_model')->readMulti($id);
        $this->view('templates/header', $data);
        $this->view('peminjaman/read/index', $data);
        $this->view('templates/footer');
    }
}
