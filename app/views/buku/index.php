<div class="container mt-5">
    <div class="row">
        <div class="col-12"><br>
            <h3>Daftar Buku</h3><br>
            <hr style="height: 1px;color: black;background-color: black;">
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6  d-flex justify-content-start">
            <button type="button" class="btn btn-primary tombolBukuTambahData" data-bs-toggle="modal" data-bs-target="#tambahBukuModal">
                Tambah
            </button>
        </div>
        <div class="col-lg-6 d-flex justify-content-end">
            <form action="<?= BASEURL; ?>/buku/cari" method="post" class="d-flex">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Nama buku" name="keyword" id="keyword" autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" id="tombolCari">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <th>No.</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tahun Terbit</th>
                    <th>Deskripsi</th>
                    <th>Kategori</th>
                    <th colspan="3">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $number = 1 ?>
                        <?php foreach ($data['buku'] as $buku) : ?>
                            <tr style="text-align: left;">
                                <td><?php echo $number;
                                    $number++ ?></td>
                                <td style="max-width: 240px; overflow: hidden; text-overflow: ellipsis;"><?= $buku['nama_buku']; ?></td>
                                <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis;"><?= $buku['penulis']; ?></td>
                                <td style="text-align: center;"><?= $buku['tahun_terbit']; ?></td>
                                <td style="text-align: left"><?php if (substr($buku['deskripsi'], 0, 42)) {
                                                                    echo substr($buku['deskripsi'], 0, 42) . '...';
                                                                } else {
                                                                    echo $buku['deskripsi'];
                                                                } ?></td>
                                <td style="text-align: center;"><?= $buku['nama_kategori']; ?></td>
                                <td style="text-align: center;">
                                    <div class="d-flex justify-content-between">
                                        <a href="<?= BASEURL; ?>/buku/read/<?= $buku['id']; ?>" class="badge btn btn-primary">
                                            <i class="fa " aria-hidden="true"></i>Buka</a>
                                            <a href="<?= BASEURL; ?>/buku/ubah/<?= $buku['id']; ?>" class="badge btn btn-success float-right tampilBukuModalUbah" data-bs-toggle="modal" data-bs-target="#tambahBukuModal" data-id="<?= $buku['id'] ?>">
                                            <i class="fa " aria-hidden="true"></i>Ubah</a>
                                        <a href="<?= BASEURL; ?>/buku/hapus/<?= $buku['id']; ?>" onclick="javascript:return confirm('Hapus Data Buku ?');" class="badge btn btn-danger">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>Hapus</a>
                                    </div>
                                </td>
                            <?php endforeach; ?>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    <div class="modal fade" id="tambahBukuModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="formBukuModalLabel">Tambahkan Buku</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Your modal content here  -->
                    <form action="<?= BASEURL; ?>/buku/tambah" method="post">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="id_kategori" id="id_kategori">
                        <div class="mb-3">
                            <label for="nama_buku" class="form-label">Nama Buku</label>
                            <input type="text" name="nama_buku" class="form-control" id="nama_buku" required>
                        </div>
                        <div class="mb-3">
                            <label for="penulis" class="form-label">Penulis</label>
                            <input type="text" name="penulis" class="form-control" id="penulis" required>
                        </div>
                        <div class="mb-3">
                            <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                            <input type="text" name="tahun_terbit" class="form-control" id="tahun_terbit" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" id="deskripsi" required>
                        </div>
                        <div class="form-group col-xl-3">
                            <label for="nama_kategori" class="form-label">Kategori</label>
                            <select class="form-control" id="nama_kategori" name="nama_kategori">
                                <option value="fiksi">Fiksi</option>
                                <option value="ilmiah">Ilmiah</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= BASEURL; ?>/js/scriptBuku.js"></script>
