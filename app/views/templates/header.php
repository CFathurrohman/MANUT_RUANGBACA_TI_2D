<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman <?= $data['judul']; ?></title>
    <link rel="stylesheet" type="text/css" href="../../../public/css/headerStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
<header>
    <a href="#"><img class="logo" src="../../../public/img/Logo Bibliophile.png" alt="logo" width="198" height="48"></a>
    <nav>
        <ul class="nav__links">
            <li class="active"><a href="#"><i class="fa fa-home"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-book"></i> Buku</a></li>
            <li><a href="#"><i class="fa fa-users"></i> Anggota</a></li>
            <li class="dropdown">
                <a href="#"><i class="fa fa-key"></i> Akses &#x25BE;</a>
                <ul class="dropdown-content">
                    <li><a href="#">Peminjaman</a></li>
                    <li><a href="#">Riwayat</a></li>
                </ul>
            </li>
            <li class="search-box">
                <input type="text" placeholder="Search">
            </li>
                <li id="dark-mode-toggle"><a href="#"><i class="fa fa-sun"></i></a></li>
                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                <li><a href="#"><i class="fa fa-user"></i></a></li>
            </ul>
        </nav>
    </header>
    
    <script>
        const darkModeToggle = document.getElementById('dark-mode-toggle');
        const body = document.body;

        darkModeToggle.addEventListener('click', () => {
            body.classList.toggle('dark-mode');
        });
    </script>
</body>
</html>