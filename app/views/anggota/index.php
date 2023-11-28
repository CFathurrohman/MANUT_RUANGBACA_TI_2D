<?php
$anggotaModel = new Anggota_model();
$anggotaList = $anggotaModel->getAllAnggota();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Anggota List</title>
</head>
<body>
    <h1>Anggota List</h1>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>notelp</th>
                <th>ID</th>
                <th>status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($anggotaList as $anggota) : ?>
                <tr>
                    <td><?php echo $anggota['nama']; ?></td>
                    <td><?php echo $anggota['No_Telp']; ?></td>
                    <td><?php echo $anggota['id']; ?></td>
                    <td><?php echo $anggota['status']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>