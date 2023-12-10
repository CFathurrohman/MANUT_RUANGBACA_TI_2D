<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman <?= $data['judul']; ?></title>
    <!--    <link rel="stylesheet" href="style.css">-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/headerStyle.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/transition.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script defer src="../../../public/js/activePage.js"></script>
</head>

<body>
<header class="menu__wrapper">
    <?php
    echo '<div class="menu__bar">';
    echo '<a href="http://localhost/manut_ruangbaca_ti_2d/public/Home" title="Home" aria-label="home" class="logo">
            <img src="http://localhost/manut_ruangbaca_ti_2d/public/img/Logo Bibliophile.png" alt="" style=" width:100px">
        </a>';
    echo '<nav>';
    echo '<ul class="navigation hide">';

    if (isset($_SESSION['username']) && isset($_SESSION['level'])) {

        if ($_SESSION['level'] == 'admin') {
            echo '    <li>';
            echo '        <a href="http://localhost/manut_ruangbaca_ti_2d/public/Home" title="Menuju Ke Katalog"><i class="fa fa-home"></i>&nbsp;Katalog</a>';
            echo '    </li>';
            echo '    <li>';
            echo '        <a href="http://localhost/manut_ruangbaca_ti_2d/public/Buku" title="Menuju Ke Daftar Buku"><i class="fa fa-book"></i>&nbsp;Buku</a>';
            echo '    </li>';
            echo '    <li>';
            echo '        <a href="http://localhost/manut_ruangbaca_ti_2d/public/Anggota" title="Menuju Ke Daftar Anggota"><i class="fa fa-user"></i>&nbsp;Anggota</a>';
            echo '    </li>';
            echo '    <li>';
            echo '        <button>Akses<i class="material-icons">expand_more</i>';
            echo '        </button>';
            echo '        <div class="dropdown__wrapper">';
            echo '            <div class="dropdown">';
            echo '                <ul class="list-items-with-description">';
            echo '                    <li>';
            echo '                        <div class="item-title">';
            echo '                                <a href="http://localhost/manut_ruangbaca_ti_2d/public/Peminjaman"><h3>Peminjaman</h3></a>';
            echo '                                <a href="http://localhost/manut_ruangbaca_ti_2d/public/Peminjaman"><p>Akses Peminjaman</p></a>';
            echo '                        </div>';
            echo '                    </li>';
            echo '                    <li>';
            echo '                        <div class="item-title">';
            echo '                            <a href="http://localhost/manut_ruangbaca_ti_2d/public/Riwayat"><h3>Riwayat</h3></a>';
            echo '                            <a href="http://localhost/manut_ruangbaca_ti_2d/public/Riwayat"><p>Akses Riwayat</p>';
            echo '                        </div>';
            echo '                    </li>';
            echo '                </ul>';
            echo '            </div>';
            echo '        </div>';
            echo '    </li>';
            echo '</ul>';
            echo '</nav>';
            echo '</div>';
            echo '<div class="action-buttons hide">';
            echo '<a href="http://localhost/manut_ruangbaca_ti_2d/public/log/logout" title="Log out" class="login">Nama Anggota</a>';
            echo '</div>';

        } elseif ($_SESSION['level'] == 'anggota') {
            echo '    <li>';
            echo '        <a href="http://localhost/manut_ruangbaca_ti_2d/public/Home" title="Menuju Ke Katalog"><i class="fa fa-home"></i>&nbsp;Katalog</a>';
            echo '    </li>';
            echo '</ul>';
            echo '</nav>';
            echo '</div>';
            echo '<div class="action-buttons hide">';
            echo '<a href="#" title="Keranjang Buku" class="keranjang"><svg xmlns="http://www.w3.org/2000/svg" height="18" width="30" viewBox="0 0 576 512">
                    <path fill="#fafafa"
                        d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/>
                    </svg>Keranjang</a>';
            echo '<a href="http://localhost/manut_ruangbaca_ti_2d/public/log/logout" title="Log out" class="login">Nama Anggota</a>';
            echo '</div>';
        }
    } else {
        echo '    <li>';
        echo '        <a href="http://localhost/manut_ruangbaca_ti_2d/public/Home" title="Menuju Ke Katalog"><i class="fa fa-home"></i>&nbsp;Katalog</a>';
        echo '    </li>';
        echo '</ul>';
        echo '</nav>';
        echo '</div>';
        echo '    <li>';
        echo '        <a href="http://localhost/manut_ruangbaca_ti_2d/public/Home" title="Menuju Ke Katalog"><i class="fa fa-home"></i>&nbsp;Katalog</a>';
        echo '    </li>';
        echo '</ul>';
        echo '</nav>';
        echo '</div>';
        echo '<div class="action-buttons hide">';
        echo '<a href="http://localhost/manut_ruangbaca_ti_2d/public/Log" title="Log in" class="login">Masuk</a>';
        echo '</div>';
    }
    ?>
</header>
<br>