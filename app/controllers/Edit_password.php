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
    
    public function simpanPassword()
    {
        // Proses penyimpanan password baru ke basis data
        $username = $_SESSION['username'];
        $past_password = $_POST['pastPassword'];
        $new_password = $_POST['newPassword'];
        $confirm_password = $_POST['confirmPassword'];

        $loginModel = $this->model('Login_model');
        $user = $loginModel->getUserByUsername($username);

        $db = new Database();

        if ($user) {
            $salt = $user['salt'];
            $stored_password = $user['password'];

            if (password_verify($salt . $past_password, $stored_password)) {
                // Password lama sesuai, lakukan perubahan password
                $hashed_password = password_hash($salt . $new_password, PASSWORD_DEFAULT);

                // Ganti $this->db menjadi $db
                $db->query('UPDATE user SET password = :password WHERE username = :username');
                $db->bind(':password', $hashed_password);
                $db->bind(':username', $username);
                $db->execute();

                $_SESSION['flash'] = 'Password berhasil diubah!';
                
                // Setelah password diubah, arahkan kembali ke halaman home
                header('Location: ' . BASEURL . '/Home');
                exit;
            } else  {
                echo "Password lama tidak sesuai!";
            }
        } else {
            $data['error_message'] = "User tidak ditemukan!";
        }
    }
}
