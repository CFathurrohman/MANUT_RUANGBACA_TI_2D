<div class="transition-group">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-12"><br>
            <h3>Riwayat</h3><br>
            <hr style="height: 1px;color: black;background-color: black;">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php //Flasher::flashPeminjaman(); 
            ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-12 d-flex justify-content-end">
            <form action="<?= BASEURL; ?>/riwayat/cari" method="post" class="d-flex">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Nama Anggota" name="keyword" id="keyword" autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" id="tombolCari">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-white">
                <tr>
                    <th>No.</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Batas Pengembalian</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $number = 1 ?>
                <?php foreach ($data['buku'] as $buku) : ?>
                    <tr>
                        <td><?php echo $number;
                            $number++ ?></td>
                        <td><?php echo $buku['tgl_pengajuan']; ?></td>
                        <td><?php echo $buku['tgl_pinjam']; ?></td>
                        <td><?php echo $buku['tgl_batas_kembali']; ?></td>
                        <td><?php echo $buku['tgl_kembali']; ?></td>
                        <td><?php echo $buku['status']; ?></td>
                        <td>
                            <a href="<?= BASEURL; ?>/buku_riwayat/read/<?= $buku['id_peminjaman']; ?>" class="badge btn btn-primary float-right" data-id="<?= $buku['id_peminjaman'] ?>">Detail</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>