<?php

class Buku extends Controller
{
    public function index()
    {
        $results_per_page = 10;
        $page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
        $offset = ($page - 1) * $results_per_page;
        $data['buku'] = $this->model('Buku_model')->getAllBuku($results_per_page, $offset);
        $total_rows = $this->model('Buku_model')->getTotalRows();
        $data['total_pages'] = ceil($total_rows / $results_per_page);
        $data['page'] = $page;
        $data['judul'] = 'List Buku';
        $this->view('templates/header', $data);
        $this->view('buku/index', $data);
        $this->view('templates/footer');
    }

    public function read($id)
    {
        $data['judul'] = 'Detail Buku';
        $data['buku'] = $this->model('Buku_model')->getReadBukuById($id);
        $this->view('templates/header', $data);
        $this->view('buku/read', $data);
        $this->view('templates/footer');

    }

    public function tambah()
    {
        $gambar_buku = $this->upload();
//        $validasi = $_POST['tersedia'] <= $_POST['jumlah'];

        if ($this->model('Buku_model')->tambahDataBuku($_POST, $gambar_buku) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/buku');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/buku');
            exit;
        }
    }

    public function upload()
    {
        $namaFile = $_FILES['gambar_buku']['name'];
        $ukuranFile = $_FILES['gambar_buku']['size'];
//        $error = $_FILES['gambar_buku']['error'];
        $tmpName = $_FILES['gambar_buku']['tmp_name'];

//        if ($error === 4) {
//            echo "<script> alert('pilih gambar terlebih dahulu!')</script>";
//            return false;
//        }

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
//            echo "<script> alert('yang anda upload bukan gambar')</script>";
            return false;
        }

        if ($ukuranFile > 10000000) {
//            echo "<script> alert('Ukuran gambar terlalu besar!')</script>";
            return false;
        }

        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;
        $dirUpload = $_SERVER['DOCUMENT_ROOT'] . '/MANUT_RUANGBACA_TI_2D/public/img/' . $namaFileBaru;
        //gambar siap diupload
        exec("find /opt/lampp/htdocs/MANUT_RUANGBACA_TI_2D/public/img -type d -exec chmod 0755 {} +");
        move_uploaded_file($tmpName, $dirUpload);
        return $namaFileBaru;
    }

    public function hapus($id)
    {
        if ($this->model('Buku_model')->hapusDataBuku($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/buku');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/buku');
            exit;
        }
    }

    public function ubah()
    {
        $buku = $this->model('Buku_model')->getBukuById($_POST['id_buku']);

        if ($_FILES['gambar_buku']['error'] === 4) {
            $gambar_buku = $buku['gambar_buku'];
        } else {
            $gambar_buku = $this->upload();
        }

        if ($this->model('Buku_model')->ubahDataBuku($_POST, $gambar_buku) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/buku');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/buku');
            exit;
        }
    }

    public function cari()
    {
        $results_per_page = 10;
        $page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
        $offset = ($page - 1) * $results_per_page;
        $data['buku'] = $this->model('Buku_model')->cariDataBuku($results_per_page, $offset);
        $total_rows = $this->model('Buku_model')->getTotalRowsCari();
        $data['total_pages'] = ceil($total_rows / $results_per_page);
        $data['page'] = $page;
        $data['judul'] = 'List Buku';
        $this->view('templates/header', $data);
        $this->view('buku/index', $data);
        $this->view('templates/footer');
    }

    public function getUbah()
    {
        echo json_encode($this->model('Buku_model')->getBukuById($_POST['id_buku']));
    }
}