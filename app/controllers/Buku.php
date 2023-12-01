<?php

class Buku extends Controller
{
    public function index()
    {
        $data['judul'] = 'List Buku';
        $data['buku'] = $this->model('Buku_model')->getAllBuku();
        $this->view('templates/header', $data);
        $this->view('buku/index', $data);
        $this->view('templates/footer');

    }

    public function read($id)
    {
        $data['judul'] = 'Detail Buku';
        $data['buku'] = $this->model('Buku_model')->getReadBukuById($id);
        $this->view('templates/header', $data);
        $this->view('buku/read', $data);
        $this->view('templates/footer');

    }

    public function tambah()
    {
//        if ($this->model('Buku_model')->tambahDataBuku($_POST) > 0) {
//            header('Location: ' . BASEURL . '/buku');
//            exit;
//        }

        if ($this->model('Buku_model')->tambahDataBuku($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/buku');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/buku');
            exit;
        }
    }
}