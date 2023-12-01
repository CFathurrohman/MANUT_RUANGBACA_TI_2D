<!DOCTYPE html>
<html lang="en">
<head>
    <title>login</title>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href= "<?= BASEURL ?>/css/loginStyle.css"    >
</head>
<body>
<main class="main">
    <div class="container a-container" id="a-container" >
        <form class="form" id="b-form" method="post" action="index.html">
            <h2 class="form_title title">Ruang Baca JTI</h2>
            <span class="form__span">Masukkan nama pengguna dan kata sandi</span>
            <input class="form__input" type="text" placeholder="Username" name="Username">
            <input class="form__input" type="password" placeholder="Password" name="password">
            <button class="form__button button switch-btn" name="signin">SIGN IN</button>
        </form>
    </div>
    <div class="side">
        <div class="side__circle"></div>
        <div class="side__circle side__circle--t"></div>
        <div class="side__container">
            <img class="side__logo logo" src="<?= BASEURL ?>/img/Logo Ruang Baca.png" alt="">
            <h2 class="side__title title">Selamat Datang!</h2>
            <p class="side__description description">Mahasiswa menggunakan akun siakad
                <br> Dosen/Pegawai menggunakan akun Polinema</p>

        </div>
    </div>
</main>
<form class="form" id="b-form" method="post" action="<?= BASEURL ?>/home/index.php">
</body>
</html>
