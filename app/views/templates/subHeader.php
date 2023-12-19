
<br><br>
<?php
if ($_SESSION['level'] == 'admin') {
    echo "<h3>Peminjaman</h3>";
    echo "<h3>Pengembalian</h3>";
    echo "<h3>Riwayat</h3>";
} elseif ($_SESSION['level'] == 'anggota') {
    echo "<h3>Buku Diajukan</h3>";
    echo "<h3>Buku Dipinjam</h3>";
    echo "<h3>Riwayat</h3>";
}
?>