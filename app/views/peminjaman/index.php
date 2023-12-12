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
            <h3>Daftar Pengajuan Peminjaman</h3><br>
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
            <form action="<?= BASEURL; ?>/peminjaman/cari" method="post" class="d-flex">
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
                    <th>Nama</th>
                    <th>No. Telepon</th>
                    <th>NIM/NIP</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $number = 1 ?>
                <?php foreach ($data['peminjaman_buku'] as $peminjaman) : ?>
                    <tr>
                        <td><?php echo $number;
                            $number++ ?></td>
                        <td><?php echo $peminjaman['nama']; ?></td>
                        <td><?php echo $peminjaman['no_telp']; ?></td>
                        <td><?php echo $peminjaman['id_anggota']; ?></td>
                        <td><?php echo $peminjaman['tgl_pengajuan']; ?></td>
                        <td><?php echo $peminjaman['status']; ?></td>
                        <td>
                            <a href="<?= BASEURL; ?>/peminjaman/read/<?= $peminjaman['id_peminjaman']; ?>" class="badge btn btn-primary float-right" data-id="<?= $peminjaman['id_peminjaman'] ?>">Detail</a>
                            <a href="<?= BASEURL; ?>/peminjaman/terima/<?= $peminjaman['id_peminjaman']; ?>" class="badge btn btn-success float-right" data-id="<?= $peminjaman['id_peminjaman'] ?>">Terima</a>
                            <a href="<?= BASEURL; ?>/peminjaman/tolak/<?= $peminjaman['id_peminjaman']; ?>" class="badge btn btn-danger float-right" data-id="<?= $peminjaman['id_peminjaman'] ?>">Tolak</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>