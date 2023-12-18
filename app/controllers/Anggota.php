<?php
class Anggota extends Controller
{
    public function index()
    {
        $data['judul'] = 'List Anggota';
        $data['anggota'] = $this->model('Anggota_model')->getAllAnggota();
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
        $data['judul'] = 'List Anggota';
        $data['anggota'] = $this->model('Anggota_model')->cariDataAnggota();
        $this->view('templates/header', $data);
        $this->view('anggota/index', $data);
        $this->view('templates/footer');
    }
}
