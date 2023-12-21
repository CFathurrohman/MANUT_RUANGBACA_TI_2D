<?php
class Profil extends Controller{
    public function index()
    {
        $data['judul'] = 'Profil';
        $data['user'] = $this->model('Profil_model')->getUserData();
        $this->view('templates/header',$data);
        $this->view('profil/index',$data);
        $this->view('templates/footer');
    }

    public function uploadProfil()
    {
        $namaFoto = $_FILES['foto_profil']['name'];
        $ukuranFoto = $_FILES['foto_profil']['size'];

        $tmpProfil = $_FILES['foto_profil']['tmp_name'];

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFoto);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            return false;
        }

        if ($ukuranFoto > 10000000) {
            return false;
        }

        $namaFotoBaru = uniqid();
        $namaFotoBaru .= '.';
        $namaFotoBaru .= $ekstensiGambar;
        $dirUpload = $_SERVER['DOCUMENT_ROOT'] . '/MANUT_RUANGBACA_TI_2D/public/img/imgProfil/' . $namaFotoBaru;
        //gambar siap diupload
        exec("find /opt/lampp/htdocs/MANUT_RUANGBACA_TI_2D/public/img/imgProfil/ -type d -exec chmod 0755 {} +");
        move_uploaded_file($tmpProfil, $dirUpload);
        return $namaFotoBaru;
    }

    public function ubahFotoProfil()
    {
        $profil = $this->model('Profil_model')->getUserData();

        if ($_FILES['foto_profil']['error'] === 4) {
            $fotoProfil = $profil['foto_profil'];
        } else {
            $fotoProfil = $this->uploadProfil();
        }

        if ($this->model('Profil_model')->editFotoProfil($fotoProfil) > 0) {
            $this->showAlert('success', 'Berhasil', 'Foto Profil berhasil diubah.');
            header('Location: ' . BASEURL . '/profil/index');
            exit;
        } else {
            $this->showAlert('error', 'Gagal', 'Foto Profil gagal diubah.');
            header('Location: ' . BASEURL . '/profil/index');
            exit;
        }
    }

    public function getUbah()
    {
        echo json_encode($this->model('Profil_model')->getUserData());
    }
}