<?php

class Peminjaman extends Controller
{
    public function index()
    {   
        $results_per_page = 10;
        $page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
        $offset = ($page - 1) * $results_per_page;
        $data['buku'] = $this->model('Peminjaman_model')->getAllPeminjaman($results_per_page, $offset);
        $total_rows = $this->model('Peminjaman_model')->getTotalRows();
        $data['total_pages'] = ceil($total_rows / $results_per_page);
        $data['page'] = $page;
        $data['judul'] = 'Peminjaman Buku';
        $this->view('templates/header', $data);
        $this->view('peminjaman/index', $data);
        $this->view('templates/footer');
    }

    public function terima($idPeminjaman)
    {
        $data = ['id_peminjaman' => $idPeminjaman];
    
        try {
            if ($this->model('Peminjaman_model')->terimaPeminjaman($data)) {
                Flasher::setFlash('berhasil', 'diubah', 'success');
            } else {
                Flasher::setFlash('gagal', 'diubah', 'danger');
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
            Flasher::setFlash('berhasil', 'diubah', 'success');
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
        }

        header('Location: ' . BASEURL . '/peminjaman');
        exit;
    }

    public function cari()
    {   
        $results_per_page = 10;
        $page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
        $offset = ($page - 1) * $results_per_page;
        $data['buku'] = $this->model('Peminjaman_model')->cariDataPeminjaman($results_per_page, $offset);
        $total_rows = $this->model('Peminjaman_model')->getTotalRowsCari();
        $data['total_pages'] = ceil($total_rows / $results_per_page);
        $data['page'] = $page;
        $data['judul'] = 'Peminjaman Buku';
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
