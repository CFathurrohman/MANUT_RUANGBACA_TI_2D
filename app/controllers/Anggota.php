<?php
class Anggota extends Controller {
    private $anggotaModel;

    public function __construct() {
        require_once __DIR__ . '/../models/Anggota_model.php';
        $this->anggotaModel = new Anggota_model();
    }

    public function index() {
        $data['anggotaList'] = $this->anggotaModel->getAllAnggota();
        $this->view('anggota/index', $data);
    }
}


