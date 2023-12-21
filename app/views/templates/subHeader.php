<br><br><br>
    <div class="card text-center">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <?php
                $currentUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                if ($_SESSION['level'] == 'admin') {
                    $urls = [
                        'http://localhost/manut_ruangbaca_ti_2d/public/Peminjaman' => 'Peminjaman',
                        'http://localhost/manut_ruangbaca_ti_2d/public/Pengembalian' => 'Pengembalian',
                        'http://localhost/manut_ruangbaca_ti_2d/public/Riwayat' => 'Riwayat'
                    ];
                } elseif ($_SESSION['level'] == 'anggota') {
                    $urls = [
                        'http://localhost/manut_ruangbaca_ti_2d/public/buku_diajukan' => 'Buku Diajukan',
                        'http://localhost/manut_ruangbaca_ti_2d/public/buku_dipinjam' => 'Buku Dipinjam',
                        'http://localhost/manut_ruangbaca_ti_2d/public/buku_riwayat' => 'Riwayat'
                    ];
                }
                foreach ($urls as $url => $name) {
                    $active = ($currentUrl == $url) ? 'active' : '';
                    echo "<li class='nav-item'><a class='nav-link $active' href='$url'>$name</a></li>";
                }
                ?>
            </ul>