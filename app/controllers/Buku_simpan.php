<?php
class Buku_simpan extends Controller
{
    //Done
    public function index()
    {
        $data['judul'] = 'Buku_simpan';
        $BukuSimpan = $this->model('Buku_simpan_model');
        $data['buku'] = $BukuSimpan->getAllSimpan();
        $this->view('templates/header', $data);
        $this->view('buku_simpan/index', $data);
        $this->view('templates/footer');
    }

    //Done
    public function tambah($id_buku)
    {
        $data = [
            'id_buku' => $id_buku,
            'judul' => 'Buku_simpan'
        ];

        $this->model('Buku_simpan_model')->tambah($data);
        $data['buku'] = $this->model('Home_model')->getAllBuku();
        $this->view('templates/header');
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }

    public function hapus($id)
    {
        if ($this->model('buku_simpan_model')->hapus($id)) {
            header('Location: ' . BASEURL . '/buku_simpan');
            exit;
        } else {
            header('Location: ' . BASEURL . '/buku_simpan');
            exit;
        }
    }

    public function multiPinjam()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selected_books'])) {
            $selectedBooks = $_POST['selected_books'];
            $bukusimpan = $this->model('buku_simpan_model');
    
            if ($bukusimpan->multiPinjam($selectedBooks)) {
                header('Location: ' . BASEURL . '/buku_simpan');
                exit;
            } else {
                header('Location: ' . BASEURL . '/buku_simpan');
                exit;
            }
        } else {
            header('Location: ' . BASEURL . '/buku_simpan');
            exit;
        }
    }    

    //Done
    public function read($id)
    {
        $data['judul'] = 'Simpan_buku';
        $data['buku'] = $this->model('Buku_simpan_model')->getReadBukuById($id);
        $this->view('templates/header', $data);
        $this->view('Buku_simpan/read/index', $data);
        $this->view('templates/footer');
    }
}
