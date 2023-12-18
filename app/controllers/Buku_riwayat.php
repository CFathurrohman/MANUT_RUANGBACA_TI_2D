<?php
class Buku_riwayat extends Controller{
    public function index()
    {
        $results_per_page = 10;
        $page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
        $offset = ($page - 1) * $results_per_page;
        $data['buku'] = $this->model('Buku_riwayat_model')->getUserRiwayat($results_per_page, $offset);
        $total_rows = $this->model('Buku_riwayat_model')->getTotalRowsCari();
        $data['total_pages'] = ceil($total_rows / $results_per_page);
        $data['page'] = $page;
        $data['judul'] = 'Riwayat Buku';
        $this->view('templates/header', $data);
        $this->view('buku_riwayat/index', $data);
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

