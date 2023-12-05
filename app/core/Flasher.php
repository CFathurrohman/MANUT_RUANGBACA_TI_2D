<?php
class Flasher 
{   
    // Jangan diubah walau merah
    public static function setFlash($message, $action, $type)
    {
        $_SESSION['flash'] = [
            'message' => $message,
            'action' => $action,
            'type' => $type
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['type'] . ' alert-dismissible fade show" role="alert">
                        Data Mahasiswa <strong>' . $_SESSION['flash']['message'] . '</strong> ' . $_SESSION['flash']['action'] . '
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            unset($_SESSION['flash']);
        }
    }

    public function tambah(){
        if ($this->model('Anggota_model')->tambahDataAnggota($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/anggota');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/anggota');
            exit;
        }
    }

    public function hapus($id){
        if ($this->model('Anggota_model')->hapusDataAnggota($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/anggota');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/anggota');
            exit;
        }
    }
}
