<?php

class Riwayat extends Controller
{
    public function index()
    {
        $results_per_page = 10;
        $page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
        $offset = ($page - 1) * $results_per_page;
        $data['buku'] = $this->model('Riwayat_model')->getAllRiwayat($results_per_page, $offset);
        $total_rows = $this->model('Riwayat_model')->getTotalRows();
        $data['total_pages'] = ceil($total_rows / $results_per_page);
        $data['page'] = $page;
        $data['judul'] = 'Riwayat Buku';
        $this->view('templates/header', $data);
        $this->view('templates/subHeader');
        $this->view('riwayat/index', $data);
        $this->view('templates/footer');
    }

    public function cari()
    {   
        $results_per_page = 10;
        $page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
        $offset = ($page - 1) * $results_per_page;
        $data['buku'] = $this->model('Riwayat_model')->cariDataRiwayat($results_per_page, $offset);
        $total_rows = $this->model('Riwayat_model')->getTotalRowsCari();
        $data['total_pages'] = ceil($total_rows / $results_per_page);
        $data['page'] = $page;
        $data['judul'] = 'Riwayat Buku';
        $this->view('templates/header', $data);
        $this->view('Riwayat/index', $data);
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