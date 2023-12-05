<h1>Anggota List</h1>
<table>
    <thead>
    <tr>
        <th>status</th>
        <th>Telepon</th>
        <th>status</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data['anggota'] as $anggota) : ?>
        <tr>
            <td><?= $anggota['id']; ?></td>
            <td><?= $anggota['nama']; ?></td>
            <td><?= $anggota['no_telp']; ?></td>
            <td><?= $anggota['status']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>