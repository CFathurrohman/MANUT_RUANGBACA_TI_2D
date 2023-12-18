<?php
class Keranjang extends Controller
{
    public function index()
    {
        $data['judul'] = 'Keranjang';
        $keranjangModel = $this->model('Keranjang_model');
        $data['keranjang'] = $keranjangModel->getAllKeranjang();
        $this->view('templates/header', $data);
        $this->view('keranjang/index', $data);
        $this->view('templates/footer');
    }

    public function tambah($id_buku)
    {
        $data = [
            'id_buku' => $id_buku,
            'judul' => 'Keranjang'
        ];

        $keranjangModel = $this->model('Keranjang_model');
        $keranjangModel->tambah($data);
        $data['keranjang'] = $keranjangModel->getAllKeranjang();
        $data['buku'] = $this->model('Buku_model')->getReadBukuById($id_buku);
        $this->view('templates/header', $data);
        $this->view('buku/read', $data);
        $this->view('templates/footer');
    }

    public function hapus($id)
    {
        if ($this->model('Keranjang_model')->hapus($id)) {
            header('Location: ' . BASEURL . '/keranjang');
            exit;
        } else {
            header('Location: ' . BASEURL . '/keranjang');
            exit;
        }
    }

    public function multiPinjam()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selected_books'])) {
            $selectedBooks = $_POST['selected_books'];
            $keranjangModel = $this->model('Keranjang_model');
    
            $countBooks = $this->model('Keranjang_model')->hitung();
    
            $totalCountBooks = $countBooks + count($selectedBooks);
    
            if ($totalCountBooks > 3) {
                echo "<script>alert('Maaf, batas peminjaman buku telah tercapai.')</script>";
                echo "<script>window.location.href='" . BASEURL . "/keranjang';</script>";
                exit;
            }
    
            if ($keranjangModel->multiPinjam($selectedBooks)) {
                header('Location: ' . BASEURL . '/keranjang');
                exit;
            } else {
                header('Location: ' . BASEURL . '/keranjang');
                exit;
            }
        } else {
            header('Location: ' . BASEURL . '/keranjang');
            exit;
        }
    }    

        public function read($id)
    {
        $data['judul'] = 'Detail Buku';
        $data['buku'] = $this->model('Keranjang_model')->getReadBukuById($id);
        $this->view('templates/header', $data);
        $this->view('Keranjang/read/index', $data);
        $this->view('templates/footer');
    }
}
