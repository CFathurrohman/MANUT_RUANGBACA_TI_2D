<br><br><br>
<div class="container text-center shadow" style="background-color: rgb(255,255,255); width: 100vw; height:10vh; ">
    <div class="row justify-content-center">
        <?php
        if ($_SESSION['level'] == 'admin') {
            echo "<div class='col-md-4'><a href='http://localhost/manut_ruangbaca_ti_2d/public/Peminjaman' style='text-decoration: none; color: ;'><h4>Peminjaman</h4></a></div>";
            echo "<div class='col-md-4'><a href='http://localhost/manut_ruangbaca_ti_2d/public/Pengembalian' style='text-decoration: none; color: ;'><h4>Pengembalian</h4></a></div>";
            echo "<div class='col-md-4'><a href='http://localhost/manut_ruangbaca_ti_2d/public/Riwayat' style='text-decoration: none; color: ;'><h4>Riwayat</h4></a></div>";
        } elseif ($_SESSION['level'] == 'anggota') {
            echo "<div class='col-md-4'><a href='http://localhost/manut_ruangbaca_ti_2d/public/buku_diajukan' style='text-decoration: none; color: ;'><h4>Buku Diajukan</h4></a></div>";
            echo "<div class='col-md-4'><a href='http://localhost/manut_ruangbaca_ti_2d/public/buku_dipinjam' style='text-decoration: none; color: ;'><h4>Buku Dipinjam</h4></a></div>";
            echo "<div class='col-md-4'><a href='http://localhost/manut_ruangbaca_ti_2d/public/buku_riwayat' style='text-decoration: none; color: ;'><h4>Riwayat</h4></a></div>";
        }
        ?>
    </div>
</div>