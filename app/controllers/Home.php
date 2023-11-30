<?php
//    class Home extends Controller{
//        public function index()
//        {
//            $data['judul'] = 'Home';
//            $this->view('templates/header', $data);
//            $this->view('home/index');
//            $this->view('templates/footer');
//        }
//    }

class Home extends Controller
{
    public function index()
    {
        $data['judul'] = 'Home';
        $data['buku'] = $this->model('Home_model')->getAllBuku();
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
     $this->view('templates/footer');
    }

//    public function read($id)
//    {
//        $data['judul'] = 'Detail Buku';
//        $data['buku'] = $this->model('Buku_model')->getReadBukuById($id);
//        $this->view('templates/header', $data);
//        $this->view('buku/read', $data);
//        $this->view('templates/footer');
//
//    }
}