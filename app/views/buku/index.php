
<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/transition.css"><div class="transition">
<div class="container mt-5">
    <div class="row">
        <div class="col-6">
            <h3>Daftar Buku</h3>
            <hr style="height: 1px;color: black;background-color: black;">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
            </div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah
            </button>
            <br><br>
            <table class="table table-hover mt-3">
                <thead>
                <tr style="text-align: center;">
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tahun Terbit</th>
                    <th>Deskripsi</th>
                    <th>Kategori</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data['buku'] as $buku) : ?>
                <tr style="text-align: left;">
                    <td><?= $buku['nama_buku']; ?></td>
                    <td><?= $buku['penulis']; ?></td>
                    <td style="text-align: center;"><?= $buku['tahun_terbit']; ?></td>
                    <td style="text-align: left"><?php if (substr($buku['deskripsi'], 0, 42)) {
                            echo substr($buku['deskripsi'], 0, 42) . '...';
                        } else {
                            echo $buku['deskripsi'];
                        } ?></td>
                    <td style="text-align: center;"><?= $buku['nama_kategori']; ?></td>
                    <td style="text-align: right;">
                        <a href="<?= BASEURL; ?>/buku/read/<?= $buku['id']; ?>" class="btn btn-outline-info">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Buka</a>
                        <a href="#" class="btn btn-outline-warning">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>
                        <a href="#" onclick="javascript:return confirm('Hapus Data Jabatan ?');"
                           class="btn btn-outline-danger">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>Hapus</a>
                    </td>
                    <?php endforeach; ?>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="tambahBukuLabel">Tambahkan Buku</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Your modal content here  -->
                <form action="<?= BASEURL; ?>/buku/tambah" method="post">
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
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>