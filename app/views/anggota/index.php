<body>
<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/transition.css">
<div class="transition">
<div class="container mt-5">
    <h3>Daftar Anggota</h3><br>

    <div class="row">
        <div class="col-md-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>
    <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#tambahModal">
        Tambah
    </button>
    <br><br>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-white">
            <tr>
                <th>No.</th>
                <th>Photo Profil</th>
                <th>Nama</th>
                <th>No. Telepon</th>
                <th>NIM/NIP</th>
                <th>Status</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php $number = 1 ?>
            <?php foreach ($data['anggota'] as $anggota) : ?>
                <tr>
                    <td><?php echo $number;
                        $number++ ?></td>
                    <td><?php echo 'Photo Profil' ?></td>
                    <td><?php echo $anggota['nama']; ?></td>
                    <td><?php echo $anggota['no_telp']; ?></td>
                    <td><?php echo $anggota['id']; ?></td>
                    <td><?php echo $anggota['status']; ?></td>
                    <td>
                        <a href="<?= BASEURL; ?>/anggota/ubah/<?= $anggota['id']; ?>"
                           class="badge btn btn-success float-right tampilModalUbah" data-bs-toggle="modal"
                           data-bs-target="#tambahModal" data-id="<?= $anggota['id'] ?>">Edit</a>
                        <a href="<?= BASEURL; ?>/anggota/hapus/<?= $anggota['id']; ?>"
                           class="badge btn btn-danger float-right" onclick="return confirm('Konfirmasi');">hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal  -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambahkan Anggota</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Your modal content here  -->
                <form action="<?= BASEURL; ?>/anggota/tambah" method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_telp" class="form-label">No. Telepon</label>
                        <input type="text" name="no_telp" class="form-control" id="no_telp" required>
                    </div>
                    <div class="mb-3">
                        <label id="label_id" for="id" class="form-label">NIM/NIP</label>
                        <input type="text" name="id" class="form-control" id="id" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="mahasiswa">Mahasiswa</option>
                            <option value="dosen">Dosen</option>
                            <option value="pegawai">Pegawai</option>
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