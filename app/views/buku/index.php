<div class="transition-group">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
</div>
<?php Flasher::flash() ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-12"><br>
            <h3>Daftar Buku</h3><br>
            <hr style="height: 1px;color: black;background-color: black;">
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
                    <input type="text" class="form-control" placeholder="Nama Buku" name="keyword" id="keyword" autocomplete="off">
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
                    <th>Jumlah Total</th>
                    <th>Jumlah Tersedia</th>
                    <th>Deskripsi</th>
                    <th>Kategori</th>
                    <th colspan="3">Aksi</th>
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
                                <td style="text-align: center;"><?= $buku['jumlah_total']; ?></td>
                                <td style="text-align: center;"><?= $buku['jumlah_tersedia']; ?></td>
                                <td style="text-align: left"><?php if (substr($buku['deskripsi'], 0, 42)) {
                                                                    echo substr($buku['deskripsi'], 0, 42) . '...';
                                                                } else {
                                                                    echo $buku['deskripsi'];
                                                                } ?></td>
                                <td style="text-align: center;"><?= $buku['nama_kategori']; ?></td>
                                <td style="text-align: center;">
                                    <div class="d-flex justify-content-between">
                                        <a href="<?= BASEURL; ?>/buku/read/<?= $buku['id_buku']; ?>" class="badge btn btn-primary">
                                            <i class="fa " aria-hidden="true"></i>Buka</a>
                                        <a href="<?= BASEURL; ?>/buku/ubah/<?= $buku['id_buku']; ?>" class="badge btn btn-success float-right tampilBukuModalUbah" data-bs-toggle="modal" data-bs-target="#tambahBukuModal" data-id="<?= $buku['id_buku'] ?>">
                                            <i class="fa " aria-hidden="true"></i>Ubah</a>
                                        <a href="<?= BASEURL; ?>/buku/hapus/<?= $buku['id_buku']; ?>" class="badge btn btn-danger deleteBuku" data-id="<?= $buku['id_buku']; ?>">
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
                <form id="upload-form" action="<?= BASEURL; ?>/buku/tambah" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_buku" id="id_buku">
                    <div class="mb-3">
                        <label for="nama_buku" class="form-label">Nama Buku</label>
                        <input type="text" name="nama_buku" class="form-control" id="nama_buku" required>
                    </div>
                    <div class="mb-3">
                        <label for="gambar_buku" class="form-label">Gambar Buku</label>
                        <input type="file" name="gambar_buku" class="form-control" id="gambar_buku"><br>
                        <img id="preview" src="#" alt="Upload Gambar" width="200px">
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
                        <label for="jumlah_total" class="form-label">Jumlah total</label>
                        <input type="text" name="jumlah_total" class="form-control" id="jumlah_total" required>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_tersedia" class="form-label">Jumlah tersedia</label>
                        <input type="text" name="jumlah_tersedia" class="form-control" id="jumlah_tersedia" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" id="deskripsi" required>
                    </div>
                    <div class="form-group col-xl-3">
                        <label for="id_kategori" class="form-label">Kategori</label>
                        <select class="form-control" id="id_kategori" name="id_kategori" required>
                            <option value="1">Fiksi</option>
                            <option value="2">Ilmiah</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" id="simpanBuku">Simpan</button>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?= BASEURL; ?>/js/scriptBuku.js"></script>

<script>
    document.getElementById('gambar_buku').addEventListener('change', function(e) {
        var preview = document.getElementById('preview');
        preview.src = URL.createObjectURL(e.target.files[0]);
    });
</script>
<script>
    function loadFile(event) {
        var reader = new FileReader();
        reader.onload = function(e) {
            var img = new Image();
            img.src = e.target.result;
            img.onload = function() {
                var canvas = document.createElement('canvas');
                var ctx = canvas.getContext('2d');
                var maxWidth = 200;
                var scale = Math.min(maxWidth / img.width, 1);

                canvas.width = img.width * scale;
                canvas.height = img.height * scale;
                ctx.drawImage(img, 0, 0, canvas.width, canvas.height);

                var resizedImg = new Image();
                resizedImg.src = canvas.toDataURL('image/jpeg');
                document.getElementById('preview').innerHTML = '';
                document.getElementById('preview').appendChild(resizedImg);
            };
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

<script>
    // Simpan untuk Tambah dan Ubah
    $("#tombolSimpan").on("click", function() {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Data berhasil disimpan.',
            showConfirmButton: false,
            timer: 3000
        });
    });
</script>