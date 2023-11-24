<?php
if (session_status() === PHP_SESSION_NONE)
    session_start();

if (!empty($_SESSION['level'])) {
    require 'config/connection.php';
    require 'fungsi/pesan_kilat.php';

    include 'admin/template/header.php';
    if (!empty($_GET['page'])) {
        include 'admin/module/' . $_GET['page'] . '/index.php';
    } else {
        include 'admin/template/home.php';
    }
    include 'admin/template/footer.php';
} else {
    header("Location: login.php");
}
