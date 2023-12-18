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

    public function showSweet($icon, $title, $text)
    {
        $_SESSION['sweetalert'] = [
            'icon' => $icon,
            'title' => $title,
            'text' => $text,
        ];
    }
}
