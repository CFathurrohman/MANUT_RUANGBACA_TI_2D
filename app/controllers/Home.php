<?php
class Home extends Controller
{
    public function index()
    {   
        $results_per_page = 24;
        $page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
        $offset = ($page - 1) * $results_per_page;
        $data['buku'] = $this->model('Home_model')->getAllBuku($results_per_page, $offset);
        $data['jumlah_diajukan'] = $this->model('Home_model')->getTotalDiajukan();
        $data['jumlah_dipinjam'] = $this->model('Home_model')->getTotalDipinjam();
        $total_rows = $this->model('Home_model')->getTotalRows();
        $data['total_pages'] = ceil($total_rows / $results_per_page);
        $data['page'] = $page;
        $data['judul'] = 'Home';
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }

    public function cari()
    {
        $results_per_page = 24;
        $page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
        $offset = ($page - 1) * $results_per_page;
        $data['buku'] = $this->model('Home_model')->cariDataBuku($results_per_page, $offset);
        $total_rows = $this->model('Home_model')->getTotalRowsCari();
        $data['total_pages'] = ceil($total_rows / $results_per_page);
        $data['page'] = $page;
        $data['judul'] = 'List Buku';
        $this->view('templates/header', $data);
        $this->view('Home/index', $data);
        $this->view('templates/footer');
    }

}
