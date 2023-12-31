<?php
class Anggota extends Controller
{
    public function index()
    {
        $results_per_page = 10;
        $page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
        $offset = ($page - 1) * $results_per_page;
        $data['anggota'] = $this->model('Anggota_model')->getAllAnggota($results_per_page, $offset);
        $total_rows = $this->model('Anggota_model')->getTotalRows();
        $data['total_pages'] = ceil($total_rows / $results_per_page);
        $data['page'] = $page;
        $data['judul'] = 'Daftar Anggota';
        $this->view('templates/header', $data);
        $this->view('anggota/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('Anggota_model')->tambahDataAnggota($_POST) > 0) {
            header('Location: ' . BASEURL . '/anggota');
            exit;
        } else {
            header('Location: ' . BASEURL . '/anggota');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('Anggota_model')->hapusDataAnggota($id)) {
            header('Location: ' . BASEURL . '/anggota');
            exit;
        } else {
            header('Location: ' . BASEURL . '/anggota');
            exit;
        }
    }

    public function ubah()
    {
        if ($this->model('Anggota_model')->ubahDataAnggota($_POST) > 0) {
            header('Location: ' . BASEURL . '/anggota');
            exit;
        } else {
            header('Location: ' . BASEURL . '/anggota');
            exit;
        }
    }

    public function getUbah()
    {
        echo json_encode($this->model('Anggota_model')->getAnggotaById($_POST['id_anggota']));
    }

    public function cari()
    {
        $results_per_page = 10;
        $page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
        $offset = ($page - 1) * $results_per_page;
        $data['anggota'] = $this->model('Anggota_model')->cariDataAnggota($results_per_page, $offset);
        $total_rows = $this->model('Anggota_model')->getTotalRowsCari();
        $data['total_pages'] = ceil($total_rows / $results_per_page);
        $data['page'] = $page;
        $data['judul'] = 'Daftar Anggota';
        $this->view('templates/header', $data);
        $this->view('anggota/index', $data);
        $this->view('templates/footer');
    }
}
