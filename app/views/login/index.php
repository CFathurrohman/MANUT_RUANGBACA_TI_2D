<!DOCTYPE html>
<html lang="en">
<head>
    <title>login</title>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../../../public/css/loginStyle.css">
</head>
<body>
<main>
    <div class="container a-container" id="a-container">
        <form method="post" action="../../core/cek_login.php">
            <h2 class="form_title title">Ruang Baca JTI</h2>
            <span class="form__span">Input your username and password</span>
            <div>
                <input class="form__input" type="text" name="username" placeholder="Username" required>
            </div>
            <div>
                <input class="form__input" type="password" name="password" placeholder="Password" required>
            </div>
            <button class="form__button button switch-btn" name="signin" type="submit">SIGN IN</button>
        </form>
    </div>
    <div class="side">
        <div class="side__circle"></div>
        <div class="side__circle side__circle--t"></div>
        <div class="side__container">
            <img class="side__logo logo" src="../../../public/img/bulat%20putih.png" alt="">
            <h2 class="side__title title">Welcome Back !</h2>
            <p class="side__description description">*Mahasiswa menggunakan akun siakad
                <br> *Dosen/Pegawai menggunakan akun Polinema</p>

        </div>
    </div>
</main>
</body>
</html>