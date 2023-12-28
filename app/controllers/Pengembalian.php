<?php

class Pengembalian extends Controller
{
    public function index()
    {
        $results_per_page = 10;
        $page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
        $offset = ($page - 1) * $results_per_page;
        $data['buku'] = $this->model('Pengembalian_model')->getAllPengembalian($results_per_page, $offset);
        $total_rows = $this->model('Pengembalian_model')->getTotalRows();
        $data['total_pages'] = ceil($total_rows / $results_per_page);
        $data['page'] = $page;
        $data['judul'] = 'Pengembalian buku';
        $this->view('templates/header', $data);
        $this->view('templates/subHeader');
        $this->view('Pengembalian/index', $data);
        $this->view('templates/footer');
    }

    public function cari()
    {
        $results_per_page = 10;
        $page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
        $offset = ($page - 1) * $results_per_page;
        $data['buku'] = $this->model('Pengembalian_model')->cariDataPengembalian($results_per_page, $offset);
        $total_rows = $this->model('Pengembalian_model')->getTotalRowsCari();
        $data['total_pages'] = ceil($total_rows / $results_per_page);
        $data['page'] = $page;
        $data['judul'] = 'Pengembalian buku';
        $this->view('templates/header', $data);
        $this->view('Pengembalian/index', $data);
        $this->view('templates/footer');
    }

    public function kembali()
    {
        $data = [
            'id_peminjaman' => $_POST['id_peminjaman'],
            'keterangan' => $_POST['keterangan'],
            'denda' => $_POST['denda'],
            'kondisi' => $_POST['kondisi']
        ];

        if ($this->model('Pengembalian_model')->terimaPengembalian($data)) {
            // $this->showAlert('success', 'Berhasil', 'Data Buku berhasil dikembalikan.');
        } else {
            // $this->showAlert('error', 'Gagal', 'Data Buku gagal dikembalikan.');
        }

        header('Location: ' . BASEURL . '/pengembalian');
        exit;
    }

    public function read($id)
    {
        $data['judul'] = 'Pengembalian Buku';
        $data['buku'] = $this->model('Pengembalian_model')->readMulti($id);
        $this->view('templates/header', $data);
        $this->view('Pengembalian/read/index', $data);
        $this->view('templates/footer');
    }
}
