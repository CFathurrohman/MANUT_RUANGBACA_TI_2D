<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman <?= $data['judul']; ?></title>
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/headerStyle.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">
</head>

<header>
    <nav>
        <div class="container">
            <a href="http://localhost/manut_ruangbaca_ti_2d/public/Home"><img class="logo" src="<?= BASEURL; ?>/img/Logo Bibliophile.png" alt="logo" width="198" height="48"></a>
            <ul class="nav__links">
                <li class="active"><a href="http://localhost/manut_ruangbaca_ti_2d/public/Home"><i class="fa fa-home"></i> Dashboard</a></li>
                <li><a href="http://localhost/manut_ruangbaca_ti_2d/public/Buku"><i class="fa fa-book"></i> Buku</a></li>
                <li><a href="http://localhost/manut_ruangbaca_ti_2d/public/Anggota"><i class="fa fa-users"></i> Anggota</a></li>
                <li class="dropdown">
                    <a href="#"><i class="fa fa-key"></i> Akses &#x25BE;</a>
                    <ul class="dropdown-content">
                        <li><a href="http://localhost:3000/app/views/peminjaman/index.php">Peminjaman</a></li>
                        <li><a href="http://localhost:3000/app/views/riwayat/index.php">Riwayat</a></li>
                    </ul>
                </li>
                <li class="search-box">
                    <input type="text" placeholder="Search">
                </li>

                <li id="dark-mode-toggle"><a href="#"><i class="fa fa-sun"></i></a></li>
                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                <li><a href="#"><i class="fa fa-user"></i></a></li>

            </ul>
        </div>
    </nav>
</header>

<script>
    const darkModeToggle = document.getElementById('dark-mode-toggle');
    const body = document.body;

    darkModeToggle.addEventListener('click', () => {
        body.classList.toggle('dark-mode');

    });
</script>

<body>