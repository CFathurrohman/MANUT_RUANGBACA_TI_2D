<?php
if (session_status() === PHP_SESSION_NONE)
    session_start();

if (!empty($_SESSION['level'])) {
    require '../models/config/connection.php';
    require '../models/function/pesan_kilat.php';

    include 'admin/template/header.php';
    if (!empty($_GET['page'])) {
        include 'admin/module/' . $_GET['page'] . '/index.php';
    } else {
        include '../admin/template/home.php';
    }
    include 'admin/template/footer.php';
} else {
    header("Location: app/view/home/login.php");
}
