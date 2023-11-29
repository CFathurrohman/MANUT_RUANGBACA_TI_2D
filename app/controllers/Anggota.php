<?php
class Anggota extends Controller {
    private $anggotaModel;

    public function __construct() {
        require_once __DIR__ . '/../models/Anggota_model.php';
        require_once __DIR__ . '/../config/connection.php';
        require_once __DIR__ . '/../models/anti_injection.php';
        $this->anggotaModel = new Anggota_model();
    }

    public function index() {
        $data['anggotaList'] = $this->anggotaModel->getAllAnggota();
        $this->view('anggota/index', $data);
    }

    public function tambah(){
        if ($this->anggotaModel->tambahDataAnggota($_POST) > 0) {
            Flasher::setFlash('berhasil','ditambahkan','success');
            header('Location: ' . BASEURL . '/anggota');
            exit;
        } else {
            Flasher::setFlash('gagal','ditambahkan','danger');
            header('Location: ' . BASEURL . '/anggota');
            exit;
        }
    }

    public function hapus($id){
        if ($this->anggotaModel->hapusDataAnggota($id) > 0) {
            Flasher::setFlash('berhasil','dihapus','success');
            header('Location: ' . BASEURL . '/anggota');
            exit;
        } else {
            Flasher::setFlash('gagal','dihapus','danger');
            header('Location: ' . BASEURL . '/anggota');
            exit;
        }
    }
}