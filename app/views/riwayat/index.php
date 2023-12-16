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
            <a href="javascript:history.go(-1)" class="btn btn-primary">Kembali</a>
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
                    <th>Nama</th>
                    <th>No. Telepon</th>
                    <th>NIM/NIP</th>
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
                <?php foreach ($data['riwayat'] as $riwayat) : ?>
                    <tr>
                        <td><?php echo $number;
                            $number++ ?></td>
                        <td><?php echo $riwayat['nama']; ?></td>
                        <td><?php echo $riwayat['no_telp']; ?></td>
                        <td><?php echo $riwayat['id_anggota']; ?></td>
                        <td><?php echo $riwayat['tgl_pengajuan']; ?></td>
                        <td><?php echo $riwayat['tgl_pinjam']; ?></td>
                        <td><?php echo $riwayat['tgl_batas_kembali']; ?></td>
                        <td><?php echo $riwayat['tgl_kembali']; ?></td>
                        <td><?php echo $riwayat['status']; ?></td>
                        <td>
                            <a href="<?= BASEURL; ?>/riwayat/read/<?= $riwayat['id_peminjaman']; ?>" class="badge btn btn-primary float-right" data-id="<?= $riwayat['id_peminjaman'] ?>">Detail</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>