<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <title><?= $data['judul'] ?></title>
    <style>
        .error-message {
            color: red;
        }
    </style>
</head>
<style>
    .container {
        margin-top: 25vh;
    }
</style>

<body>
    <div class="container">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Ganti Kata Sandi</h4>
                        </div>
                        <div class="card-body">
                            <form id="changePasswordForm" action="<?= BASEURL ?>/Edit_password/simpanPassword" method="post">
                                <div class="form-group">
                                    <label for="pastPassword">Kata Sandi Saat Ini</label>
                                    <input type="password" name="pastPassword" id="pastPassword" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="newPassword">Kata Sandi Baru</label>
                                    <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                                </div>
                                <div class="form-group">
                                    <label for="confirmPassword">Konfirmasi Kata Sandi Baru</label>
                                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                                    <small class="error-message" id="passwordMismatch" style="display: none;">Konfirmasi password baru tidak sesuai!</small>
                                    <?php
                                    if (isset($data['passwordMismatch'])) {
                                        echo '<small class="error-message">' . $data['passwordMismatch'] . '</small>';
                                    }
                                    ?>
                                </div>
                                <a href="<?= BASEURL; ?>" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>
<script>
    $(document).ready(function() {
        $('#changePasswordForm').submit(function(e) {
            if ($('#newPassword').val() !== $('#confirmPassword').val()) {
                e.preventDefault();
                $('#passwordMismatch').show();
            } else {
                $('#passwordMismatch').hide();

                Swal.fire({
                    title: "Sukses!",
                    text: "Password berhasil diubah!",
                    icon: "success",
                    confirmButtonText: "OK"
                }).then(function(result) {
                    if (result.isConfirmed) {
                        window.location.href = "<?= BASEURL ?>/Home";
                    }
                });
            }
        });
    });
</script>

</html>