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
        if ($keranjangModel->tambah($data)) {
            $data['keranjang'] = $keranjangModel->getAllKeranjang();
            $data['buku'] = $this->model('Buku_model')->getReadBukuById($id_buku);
            $this->view('templates/header', $data);
            $this->view('buku/read', $data);
            $this->view('templates/footer');
        } else {
            echo "Failed to add item to cart.";
        }
    }


    public function hapus($id)
    {
        if ($this->model('Keranjang_model')->hapus($id)) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/keranjang');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/keranjang');
            exit;
        }
    }

    public function pinjam($id)
    {
        if ($this->model('Keranjang_model')->pinjam($id)) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/keranjang');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/keranjang');
            exit;
        }
    }

    public function multiPinjam()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selected_books'])) {
            $selectedBooks = $_POST['selected_books'];
            $keranjangModel = $this->model('Keranjang_model');

            if ($keranjangModel->multiPinjam($selectedBooks)) {
                Flasher::setFlash('berhasil', 'dipinjam', 'success');
                header('Location: ' . BASEURL . '/keranjang');
                exit;
            } else {
                Flasher::setFlash('gagal', 'dipinjam', 'danger');
                header('Location: ' . BASEURL . '/keranjang');
                exit;
            }
        } else {
            // Handle if no books are selected
            Flasher::setFlash('gagal', 'Tidak ada buku dipilih', 'warning');
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
