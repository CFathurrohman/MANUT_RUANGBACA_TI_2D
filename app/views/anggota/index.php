<!DOCTYPE html>
<html lang="en">

<head>
    <title>Anggota List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h3>Daftar Anggota</h3><br>

        <div class="row">
            <div class="col-md-6">
                <?php Flasher::flash(); ?>
            </div>
        </div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">
            Tambah
        </button><br><br>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-white">
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>No. Telepon</th>
                        <th>ID</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $number = 1 ?>
                    <?php foreach ($data['anggotaList'] as $anggota) : ?>
                        <tr>
                            <td><?php echo "$number";
                                $number++ ?></td>
                            <td><?php echo $anggota['nama']; ?></td>
                            <td><?php echo $anggota['no_telp']; ?></td>
                            <td><?php echo $anggota['id']; ?></td>
                            <td><?php echo $anggota['status']; ?></td>
                            <td>
                                <a href="<?= BASEURL; ?>/anggota/hapus/<?= $anggota['id']; ?>" class="badge btn btn-danger float-right" onclick="return confirm('Konfirmasi');">hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>


            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahAnggotaLabel">Tambahkan Anggota</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Your modal content here -->
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
                            <label for="id" class="form-label">ID</label>
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

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>