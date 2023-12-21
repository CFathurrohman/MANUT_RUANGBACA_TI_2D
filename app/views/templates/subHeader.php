<div class="card text-center" style="margin-top: 4vh;">
    <div class="card-header" style="background-color: white;">
        <ul class="nav nav-tabs card-header-tabs justify-content-around" style="background-color: #e3e3e3; display: flex; padding: 0;">
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
            $count = count($urls);
            $width = 100 / $count; 
            foreach ($urls as $url => $name) {
                $active = ($currentUrl == $url) ? 'active' : '';
                $color = ($currentUrl == $url) ? 'blue' : 'black';
                echo "<li class='nav-item' style='width: $width%;'><a class='nav-link $active' href='$url' style='color: $color;'>$name</a></li>";
            }
            ?>
        </ul>
    </div>
</div>