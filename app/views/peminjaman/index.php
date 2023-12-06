<div class="objtransition">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12"><br><br>
                <h3>Daftar Peminjaman</h3><br>
                <hr style="height: 1px;color: black;background-color: black;">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?php Flasher::flash(); ?>
            </div>
        </div>
        <table>
            <thead>
            <tr>
                <th>status</th>
                <th>Telepon</th>
                <th>status</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data['peminjaman_buku'] as $peminjaman) : ?>
                <tr>
                    <td><?= $peminjaman['id']; ?></td>
                    <td><?= $peminjaman['status']; ?></td>
                    <td><?= $peminjaman['tgl_pinjam']; ?></td>
                    <td><?= $peminjaman['tgl_kembali']; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
