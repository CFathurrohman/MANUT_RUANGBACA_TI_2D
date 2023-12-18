<?php

class Controller
{
    public function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }

    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }

    public function showAlert($icon, $title, $text)
    {
        // Sesuaikan dengan session atau cara penyimpanan pesan flash di proyek Anda        
        $_SESSION['sweetalert'] = [
            'icon' => $icon,
            'title' => $title,
            'text' => $text,
        ];
    }
}
