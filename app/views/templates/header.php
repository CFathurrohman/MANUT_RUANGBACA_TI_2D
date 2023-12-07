<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman <?= $data['judul']; ?></title>
    <!--    <link rel="stylesheet" href="style.css">-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/headerStyle.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/transition.css">
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
    $pages = [];
    $currentPage = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if (isset($_SESSION['username']) && isset($_SESSION['level'])) {
        if ($_SESSION['level'] == 'admin') {
            $pages = [
                ['url' => 'http://localhost/manut_ruangbaca_ti_2d/public/Home', 'icon' => 'fa fa-home', 'text' => 'Katalog'],
                ['url' => 'http://localhost/manut_ruangbaca_ti_2d/public/Buku', 'icon' => 'fa fa-book', 'text' => 'Buku'],
                ['url' => 'http://localhost/manut_ruangbaca_ti_2d/public/Anggota', 'icon' => 'fa fa-user', 'text' => 'Anggota']
            ];

        } elseif ($_SESSION['level'] == 'anggota') {
            $pages = [
                ['url' => 'http://localhost/manut_ruangbaca_ti_2d/public/Home', 'icon' => 'fa fa-home', 'text' => 'Katalog']
            ];
        } else {
            $pages = [
                ['url' => 'http://localhost/manut_ruangbaca_ti_2d/public/Home', 'icon' => 'fa fa-home', 'text' => 'Katalog']
            ];
        }
    }

    foreach ($pages as $page) {
        echo '<li>';
        echo '<a class="nav-link" href="' . $page['url'] . '" ' . ($currentPage == $page['url'] ? 'aria-current="page"' : '') . ' title="Menuju Ke ' . $page['text'] . '"><i class="' . $page['icon'] . '"></i>&nbsp;' . $page['text'] . '</a>';
        echo '</li>';
    }
    echo '    <li>';
    echo '        <button>Akses<i class="material-icons">expand_more</i>';
    echo '        </button>';
    echo '        <div class="dropdown__wrapper">';
    echo '            <div class="dropdown">';
    echo '                <ul class="list-items-with-description">';
    echo '                    <li>';
    echo '                        <div class="item-title">';
    echo '                                <h3>Peminjaman</h3>';
    echo '                                <p>Akses Peminjaman</p>';
    echo '                        </div>';
    echo '                    </li>';
    echo '                    <li>';
    echo '                        <div class="item-title">';
    echo '                            <h3>Riwayat</h3>';
    echo '                            <p>Akses Riwayat</p>';
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
    echo '<a href="http://localhost/manut_ruangbaca_ti_2d/public/Log" title="Log in" class="login">Masuk</a>';
    echo '</div>';
    ?>
</header>
<br>