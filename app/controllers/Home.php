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
      //   $data['nama'] = $this->model('Home_model')->getName();
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}