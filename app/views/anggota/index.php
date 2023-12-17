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
            <h3>Daftar Anggota</h3><br>
            <hr style="height: 1px;color: black;background-color: black;">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php Flasher::flashAnggota(); ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#tambahModal">
                Tambah
            </button>
        </div>
        <div class="col-lg-6 d-flex justify-content-end">
            <form action="<?= BASEURL; ?>/anggota/cari" method="post" class="d-flex">
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
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $number = 1 ?>
                <?php foreach ($data['anggota'] as $anggota) : ?>
                    <tr>
                        <td><?php echo $number;
                            $number++ ?></td>
                        <td><?php echo $anggota['nama']; ?></td>
                        <td><?php echo $anggota['no_telp']; ?></td>
                        <td><?php echo $anggota['id_anggota']; ?></td>
                        <td><?php echo $anggota['status']; ?></td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <a href="<?= BASEURL; ?>/anggota/ubah/<?= $anggota['id_anggota']; ?>" class="badge btn btn-success tampilModalUbah" data-bs-toggle="modal" data-bs-target="#tambahModal" data-id="<?= $anggota['id_anggota'] ?>">Ubah</a>
                                <a href="<?= BASEURL; ?>/anggota/hapus/<?= $anggota['id_anggota']; ?>" class="badge btn btn-danger" onclick="return confirm('Konfirmasi');">hapus</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <nav aria-label="Page navigation example">
        <form action="<?= BASEURL; ?>/anggota" method="post">
            <ul class="pagination justify-content-center">
                <?php
                $totalPages = $data['total_pages'];
                $currentPage = $data['page'];

                // Previous Button
                ?>
                <li class="page-item <?= ($currentPage == 1) ? 'disabled' : '' ?>">
                    <button type="submit" name="page" value="<?= max(1, $currentPage - 1) ?>" class="page-link">&laquo; </button>
                </li>
                <?php

                // First Button
                ?>
                <li class="page-item <?= ($currentPage == 1) ? 'active' : '' ?>">
                    <button type="submit" name="page" value="1" class="page-link">1</button>
                </li>
                <?php

                // Ellipsis Before First
                if ($currentPage > 3) {
                ?>
                    <li class="page-item disabled">
                        <button type="button" class="page-link">...</button>
                    </li>
                <?php
                }

                // Numbered Buttons
                $startPage = max(2, $currentPage - 1);
                $endPage = min($startPage + 2, $totalPages);

                for ($i = $startPage; $i <= $endPage; $i++) {
                ?>
                    <li class="page-item <?= ($i == $currentPage) ? 'active' : '' ?>">
                        <button type="submit" name="page" value="<?= $i ?>" class="page-link"><?= $i ?></button>
                    </li>
                <?php
                }

                // Ellipsis Before Last
                if ($totalPages - $currentPage > 2 && $totalPages > 5) {
                ?>
                    <li class="page-item disabled">
                        <button type="button" class="page-link">...</button>
                    </li>
                <?php
                }

                // Last Button
                if ($currentPage < $totalPages && $currentPage != $totalPages - 1 &&  $totalPages > 4) {
                ?>
                    <li class="page-item">
                        <button type="submit" name="page" value="<?= $totalPages ?>" class="page-link"><?= $totalPages ?></button>
                    </li>
                <?php
                }

                // Next Button
                ?>
                <li class="page-item <?= ($currentPage == $totalPages) ? 'disabled' : '' ?>">
                    <button type="submit" name="page" value="<?= min($totalPages, $currentPage + 1) ?>" class="page-link"> &raquo;</button>
                </li>
                <?php
                ?>
            </ul>
        </form>
    </nav>


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
                        <input type="text" name="id_anggota" class="form-control" id="id_anggota" required>
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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
<script src="<?= BASEURL; ?>/js/scriptAnggota.js"></script>