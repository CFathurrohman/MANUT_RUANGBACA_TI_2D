<?php
class Edit_password extends Controller
{
    public function index()
    {
        $data['judul'] = 'Ganti Kata Sandi';
        $this->view('templates/header', $data);
        $this->view('edit_password/index', $data);
        $this->view('templates/footer');
    }
}
