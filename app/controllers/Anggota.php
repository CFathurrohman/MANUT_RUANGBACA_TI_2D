<?php
    class Anggota extends Controller {
        public function index()
        {
            $this->model('model_anggota');
            $this->view('anggota/index');
        }
    }