<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title><?= $data['judul'] ?></title>
</head>

<body>
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
                            </div>
                                <a href="<?= BASEURL; ?>" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>