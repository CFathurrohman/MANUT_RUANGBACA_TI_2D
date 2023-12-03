<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman <?= $data['judul']; ?></title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/headerStyle.css">
</head>

<body>
    <header class="menu__wrapper">
        <div class="menu__bar">
            <a href="http://localhost/manut_ruangbaca_ti_2d/public/Home" title="Home" aria-label="home" class="logo">
                <img src="<?= BASEURL; ?>/img/Logo Bibliophile.png" alt="" style=" width:100px">
            </a>
            <nav>
                <ul class="navigation hide">
                    <li>
                        <a href="http://localhost/manut_ruangbaca_ti_2d/public/Home" title="Customers">Katalog</a>
                    </li>
                    <li>
                        <a href="http://localhost/manut_ruangbaca_ti_2d/public/Buku" title="Docs">Buku</a>
                    </li>
                    <li>
                        <a href="http://localhost/manut_ruangbaca_ti_2d/public/Anggota" title="Templates">Anggota</a>
                    </li>
                    <li>
                        <button>Akses<i class="material-icons">expand_more</i>
                        </button>
                        <div class="dropdown__wrapper">
                            <div class="dropdown">
                                <ul class="list-items-with-description">
                                    <li>
                                        <div class="item-title">
                                            <h3>Peminjaman</h3>
                                            <p>Akses Peminjaman</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="item-title">
                                            <h3>Riwayat</h3>
                                            <p>Akses Riwayat</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="action-buttons hide">
            <a href="http://localhost/manut_ruangbaca_ti_2d/public/Login" title="Log in" class="login">Masuk</a>
        </div>
    </header>
</body>
<br>
</html>