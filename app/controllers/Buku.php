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
//        var_dump($_POST);

        $gambar = $this->upload();
        //        $validasi = $_POST['tersedia'] <= $_POST['jumlah'];

        if ($this->model('Buku_model')->tambahDataBuku($_POST, $gambar) > 0) {
            $this->showAlert('success', 'Berhasil', 'Data Buku berhasil ditambahkan.');
            header('Location: ' . BASEURL . '/buku');
            exit;
        } else {
            $this->showAlert('error', 'Gagal', 'Data Buku gagal ditambahkan.');
            header('Location: ' . BASEURL . '/buku');
            exit;
        }
    }

    function upload()
    {

        $namaFile = $_FILES['gambar']['nama'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_nama'];
        //cek apakah tidak ada gambar yang diupload
        if ($error === 4) {
//            echo "<script> alert('pilih gambar terlebih dahulu!')</script>";
            return false;
        }

        //cek apakah yang diupload adalah gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
//            echo "<script> alert('yang anda upload bukan gambar')</script>";
            return false;
        }

        //cek jika ukurannya terlalu besar
        if ($ukuranFile > 10000000) {
//            echo "<script> alert('Ukuran gambar terlalu besar!')</script>";
            return false;
        }
        //generate nama gambar baru
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;
        $dirUpload = $_SERVER['DOCUMENT_ROOT'] . '/manut_ruangbaca_ti_2d/public/img/imgBuku' . $namaFileBaru;
        //gambar siap diupload
        exec("find /opt/lampp/htdocs/manut_ruangbaca_ti_2d/public/img/Buku -type d -exec chmod 0755 {} +");
        move_uploaded_file($tmpName, $dirUpload);
        return $namaFileBaru;
    }

    public function hapus($id)
    {
        if ($this->model('Buku_model')->hapusDataBuku($id) > 0) {
            $this->showAlert('success', 'Berhasil', 'Data Buku berhasil dihapus.');
            header('Location: ' . BASEURL . '/buku');
            exit;
        } else {
            $this->showAlert('error', 'Gagal', 'Data Buku gagal dihapus.');
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
            $this->showAlert('success', 'Berhasil', 'Data Buku berhasil diubah.');
            header('Location: ' . BASEURL . '/buku');
            exit;
        } else {
            $this->showAlert('error', 'Gagal', 'Data Buku gagal diubah.');
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
