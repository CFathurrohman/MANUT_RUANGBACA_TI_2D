<?php
class Flasher
{
    // Jangan diubah walau merah
    public static function setFlash($pesan, $aksi, $tipe, $data)
    {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi'  => $aksi,
            'tipe'  => $tipe,
            'data' => $data
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
                    Data' .  $_SESSION['flash']['data'] . ' <strong>' . $_SESSION['flash']['pesan'] . '</strong> ' . $_SESSION['flash']['aksi'] . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            unset($_SESSION['flash']);
        }
    }

    // public static function setFlash($message, $action, $type)
    // {
    //     $_SESSION['flash'] = [
    //         'message' => $message,
    //         'action' => $action,
    //         'type' => $type
    //     ];
    // }

    // public static function flashAnggota()
    // {
    //     if (isset($_SESSION['flash'])) {
    //         echo '<div class="alert alert-' . $_SESSION['flash']['type'] . ' alert-dismissible fade show" role="alert">
    //                     Data Anggota <strong>' . $_SESSION['flash']['message'] . '</strong> ' . $_SESSION['flash']['action'] . '
    //                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //                 </div>';
    //         unset($_SESSION['flash']);
    //     }
    // }

    // public static function flashBuku()
    // {
    //     if (isset($_SESSION['flash'])) {
    //         echo '<div class="alert alert-' . $_SESSION['flash']['type'] . ' alert-dismissible fade show" role="alert">
    //                     Data Buku <strong>' . $_SESSION['flash']['message'] . '</strong> ' . $_SESSION['flash']['action'] . '
    //                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //                 </div>';
    //         unset($_SESSION['flash']);
    //     }
    // }

    // public static function flashLogin()
    // {
    //     if (isset($_SESSION['flash'])) {
    //         echo '<div class="alert alert-' . $_SESSION['flash']['type'] . ' alert-dismissible fade show" role="alert">
    //                     <strong>' . $_SESSION['flash']['message'] . '</strong> ' . $_SESSION['flash']['action'] . '
    //                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //                 </div>';
    //         unset($_SESSION['flash']);
    //     }
    // }
}
