<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman <?= $data['judul']; ?></title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/headerStyle.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/transition.css">
<!--    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="<?= BASEURL; ?>/img/logoTab.ico" />
</head>

<body>
<header class="menu__wrapper">
    <?php
    echo '<div class="menu__bar">';

    echo '<a href="http://localhost/manut_ruangbaca_ti_2d/public/Home" title="Home" aria-label="home" class="logo">
            <img src="http://localhost/manut_ruangbaca_ti_2d/public/img/Logo Bibliophile.png" alt="" style=" width:140px">
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
            echo '    <button>Akses<i class="material-icons">expand_more</i>';
            echo '    </button>';
            echo '        <div class="dropdown__wrapper">';
            echo '            <div class="dropdown">';
            echo '                <ul class="list-items-with-description">';
            echo '                    <li>
                                        <a href="http://localhost/manut_ruangbaca_ti_2d/public/Peminjaman">';
            echo '                        <div class="item-title">';
            echo '                                <h3>Peminjaman</h3>';
            echo '                                <p>Akses Peminjaman</p>';
            echo '                        </div>';
            echo '                    </a></li>';
            echo '                    <li>
                                        <a href="http://localhost/manut_ruangbaca_ti_2d/public/Pengembalian">';
            echo '                        <div class="item-title">';
            echo '                                <h3>Pengembalian</h3>';
            echo '                                <p>Akses Pengenmbalian</p>';
            echo '                        </div>';
            echo '                    </a></li>';
            echo '                    <li>
                                        <a href="http://localhost/manut_ruangbaca_ti_2d/public/Riwayat">';
            echo '                        <div class="item-title">';
            echo '                            <h3>Riwayat</h3>';
            echo '                            <p>Akses Riwayat</p>';
            echo '                        </div>';
            echo '                    </a></li>';
            echo '                </ul>';
            echo '            </div>';
            echo '        </div>';
            echo '    </li>';
            echo '</ul>';
            echo '</nav>';
            echo '</div>';
            echo '<div class="action-buttons hide">';
            echo '<nav>';
            echo '<ul class="navigation hide">';
            echo '  <div class="form-check form-switch mx-4" xmlns="http://www.w3.org/1999/html">
                        <input 
                            class="form-check-input p-2"
                            type="checkbox"
                            role="switch"
                            id="flexSwitchCheckChecked"
                            onclick="toggleTheme()">
                            <label class="form-check-label" for="flexSwitchCheckChecked">
                                <span style="color: #fafafa" id="themeIcon" class="theme-icon icon-path" data-feather="sun"></span>
                                <span class="visually-hidden" id="themeLabel"></span>
                            </label></input>
                    </div> 
                    
                       <li><button>
                          <a class="" style="color: #fafafa"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
                                <path class="icon-path" fill="#fafafa" 
                                    d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>';
            echo '       ' . $_SESSION['username'] . ' </a></button>';
            echo '        <div class="dropdown__wrapper__akun">';
            echo '            <div class="dropdown">';
            echo '                <ul class="list-items-with-description">';
            echo '                    <li>';
            echo '                        <div class="item-title">';
            echo '                            <a href="http://localhost/manut_ruangbaca_ti_2d/public/log/logout"><h3>Keluar</h3></a>';
            echo '                        </div>';
            echo '                    </li>';
            echo '                </ul>';
            echo '            </div>';
            echo '        </div>';
            echo '    </li>';
            echo '</ul>';
            echo '</nav>';
            echo '</div>';
        } elseif ($_SESSION['level'] == 'anggota') {
            echo '    <li>';
            echo '        <a href="http://localhost/manut_ruangbaca_ti_2d/public/Home" title="Menuju Ke Katalog"><i class="fa fa-home"></i>&nbsp;Katalog</a>';
            echo '    </li>';
            echo '    <li>';
            echo '        <button>Akses<i class="material-icons">expand_more</i></button>';
            echo '        <div class="dropdown__wrapper">';
            echo '            <div class="dropdown">';
            echo '                <ul class="list-items-with-description">';
            echo '                    <li>';
            echo '                        <div class="item-title">';
            echo '                            <a href="http://localhost/manut_ruangbaca_ti_2d/public/buku_diajukan"><h3>Buku Diajukan</h3></a>';
            echo '                            <a href="http://localhost/manut_ruangbaca_ti_2d/public/buku_diajukan"><p>Buku Yang Diajukan</p></a>';
            echo '                        </div>';
            echo '                    </li>';

            echo '                    <li>';
            echo '                        <div class="item-title">';
            echo '                            <a href="http://localhost/manut_ruangbaca_ti_2d/public/buku_dipinjam"><h3>Buku Dipinjam</h3></a>';
            echo '                            <a href="http://localhost/manut_ruangbaca_ti_2d/public/buku_dipinjam"><p>Buku Yang Sedang Dipinjam</p></a>';
            echo '                        </div>';
            echo '                    </li>';
            echo '                    <li>';
            echo '                        <div class="item-title">';
            echo '                            <a href="http://localhost/manut_ruangbaca_ti_2d/public/buku_riwayat"><h3>Riwayat</h3></a>';
            echo '                            <a href="http://localhost/manut_ruangbaca_ti_2d/public/buku_riwayat"><p>Riwayat Peminjaman</p></a>';
            echo '                        </div>';
            echo '                    </li>
                    </li>';
            echo '</ul>';
            echo '</nav>';
            echo '</div>';
            
            echo '<div class="action-buttons hide">';
            echo '<nav>';
            echo '<ul class="navigation hide">';
            echo '  <div class="form-check form-switch mx-4" xmlns="http://www.w3.org/1999/html">
                        <input 
                            class="form-check-input p-2"
                            type="checkbox"
                            role="switch"
                            id="flexSwitchCheckChecked"
                            onclick="toggleTheme()">
                            <label class="form-check-label" for="flexSwitchCheckChecked">
                                <span style="color: #fafafa" id="themeIcon" class="theme-icon icon-path" data-feather="sun"></span>
                                <span class="visually-hidden" id="themeLabel"></span>
                            </label></input>
                    </div>';
            echo '    <li>';
            echo '
                <button class="keranjang">
                
                    <a href="http://localhost/manut_ruangbaca_ti_2d/public/buku_simpan">
                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="12" viewBox="0 0 384 512">
                        <path class="icon-path" fill="#fafafa" 
                            d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z"/>
                    </svg>
                    </a>
                
                </button>
                </li>';
            echo '    <li>';
            echo '
                <button class="keranjang">
                
                    <a href="http://localhost/manut_ruangbaca_ti_2d/public/Keranjang">
                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" height="18" width="30" viewBox="0 0 576 512">
                            <path class="icon-path" fill="#fafafa"
                                d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/>
                        </svg>
                    </a>
                
                </button>
                </li>';
            echo '    <li>';
            echo ' 
                <button class="keranjang">
                    <a>
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
                            <path class="icon-path" fill="#fafafa" 
                                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/>
                            </svg>';
            echo '       ' . $_SESSION['username'] . '
                    </a>
                </button>';
            echo '        <div class="dropdown__wrapper__akun">';
            echo '            <div class="dropdown">';
            echo '                <ul class="list-items-with-description">';
            echo '                    <li>';
            echo '                        <div class="item-title">';
            echo '                                <a href="http://localhost/manut_ruangbaca_ti_2d/public/Profil"><h3>Profil</h3></a>';
            echo '                        </div>';
            echo '                    </li>';
            echo '                    <li>';
            echo '                        <div class="item-title">';
            echo '                                <a href="http://localhost/manut_ruangbaca_ti_2d/public/edit_password"><h3>Ganti Kata Sandi</h3></a>';
            echo '                        </div>';
            echo '                    </li>';
            echo '                    <li>';
            echo '                        <div class="item-title">';
            echo '                            <a href="http://localhost/manut_ruangbaca_ti_2d/public/log/logout"><h3>Keluar</h3></a>';
            echo '                        </div>';
            echo '                    </li>';
            echo '                </ul>';
            echo '            </div>';
            echo '        </div>';
            echo '    </li>';
            echo '</ul>';
            echo '</nav>';
            echo '</div>';
        }
    } else {
        echo '    <li>';
        echo '        <a href="http://localhost/manut_ruangbaca_ti_2d/public/Home" title="Menuju Ke Katalog"><i class="fa fa-home"></i>&nbsp;Katalog</a>';
        echo '    </li>';
        echo '</ul>';
        echo '</nav>';
        echo '</div>';
        echo '<div class="action-buttons hide">';
        echo '  <div class="form-check form-switch mx-4" xmlns="http://www.w3.org/1999/html">
                        <input 
                            class="form-check-input p-2"
                            type="checkbox"
                            role="switch"
                            id="flexSwitchCheckChecked"
                            onclick="toggleTheme()">
                            <label class="form-check-label" for="flexSwitchCheckChecked">
                                <span style="color: #fafafa" id="themeIcon" class="theme-icon icon-path" data-feather="sun"></span>
                                <span class="visually-hidden" id="themeLabel"></span>
                            </label></input>
                    </div>';
        echo '<a href="http://localhost/manut_ruangbaca_ti_2d/public/Log" title="Log in" class="login">Masuk</a>';
        echo '</div>';
    }
    ?>
</header>
<br>

<script src="https://unpkg.com/feather-icons"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Inisialisasi Feather icons
        feather.replace();

        // Set tema dari localStorage saat halaman dimuat
        setInitialTheme();
    });

    function setInitialTheme() {
        let HTMLelement = document.documentElement;
        let savedTheme = localStorage.getItem("theme");

        // Jika tema tersimpan, atur tema sesuai dengan nilai yang disimpan
        if (savedTheme) {
            HTMLelement.dataset.bsTheme = savedTheme;
        } else {
            // Jika tidak ada tema tersimpan, atur tema default (light)
            HTMLelement.dataset.bsTheme = "light";
        }

        // Perbarui status checkbox sesuai dengan tema saat ini
        updateCheckboxAndIcon();
    }

    function toggleTheme() {
        let HTMLelement = document.documentElement;
        HTMLelement.dataset.bsTheme = HTMLelement.dataset.bsTheme === "light" ? "dark" : "light";

        // Simpan tema ke localStorage
        localStorage.setItem("theme", HTMLelement.dataset.bsTheme);

        // Perbarui status checkbox sesuai dengan tema yang baru diubah
        updateCheckboxAndIcon();
    }

    function updateCheckboxAndIcon() {
        let checkbox = document.getElementById("flexSwitchCheckChecked");
        let themeIcon = document.getElementById("themeIcon");
        let themeLabel = document.getElementById("themeLabel");
        let currentTheme = document.documentElement.dataset.bsTheme;

        // Perbarui status checkbox sesuai dengan tema saat ini
        checkbox.checked = currentTheme === "dark";

        // Perbarui ikon dan label sesuai dengan tema saat ini
        themeIcon.setAttribute("data-feather", currentTheme === "dark" ? "moon" : "sun");
        feather.replace(); // Perbarui ikon menggunakan Feather
        themeLabel.textContent = currentTheme === "dark" ? "Dark Mode" : "Light Mode";
    }
</script>