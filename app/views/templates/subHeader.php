<br><br><br>
<div class="container text-center">
    <div class="row justify-content-center">
        <?php
        if ($_SESSION['level'] == 'admin') {
            echo "<div class='col-md-4'><h3>Peminjaman</h3></div>";
            echo "<div class='col-md-4'><h3>Pengembalian</h3></div>";
            echo "<div class='col-md-4'><h3>Riwayat</h3></div>";
        } elseif ($_SESSION['level'] == 'anggota') {
            echo "<div class='col-md-4'><h3>Buku Diajukan</h3></div>";
            echo "<div class='col-md-4'><h3>Buku Dipinjam</h3></div>";
            echo "<div class='col-md-4'><h3>Riwayat</h3></div>";
        }
        ?>
    </div>
</div>