<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $data['judul'] ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>/css/loginStyle.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>/js/loginJs.js">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
    <?php Flasher::flashLogin(); ?>
    <main class="main">
        <div class="container mt-5">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6 text-center">
                    <img class="logo" src="<?= BASEURL ?>/img/Logo Ruang Baca.png" alt="Logo">
                    <h2 class="mt-3 mb-4">Selamat Datang!</h2>
                    <form class="form" id="login-form" method="post" action="<?= BASEURL ?>/Log/cek_login">
                        <input class="form__input" type="text" placeholder="Nama Pengguna" name="username" required>
                        <input class="form__input" type="password" placeholder="Kata Sandi" name="password" required>
                        <button type="submit" class="btn btn-primary">Masuk</button>
                        <a href="<?= BASEURL ?> /Home">
                            <button type="button" class="btn btn-secondary back-button" >Ke Katalog</button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>