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
                    <th class="aksi">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $number = ((($data['page'] - 1) * 10) + 1) ?>
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
                                <a href="<?= BASEURL; ?>/anggota/ubah/<?= $anggota['id_anggota']; ?>" class="badge btn btn-success tampilModalUbah" data-bs-toggle="modal" data-bs-target="#tambahModal" data-id="<?= $anggota['id_anggota'] ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                    </svg>
                                </a>
                                <a href="<?= BASEURL; ?>/anggota/hapus/<?= $anggota['id_anggota']; ?>" class="badge btn btn-danger deleteAnggota"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                    </svg> </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <style>
            .aksi {
                width: 7% !important;
            }
        </style>
    </div>

    <nav aria-label="Page navigation">
        <form action="<?= BASEURL; ?>/anggota" method="post">
            <ul class="pagination justify-content-center">
                <?php
                $totalPages = $data['total_pages'];
                $currentPage = $data['page'];

                // Previous Button
                ?>
                <li class="page-item <?= ($currentPage == 1) ? 'disabled' : '' ?>">
                    <button type="submit" name="page" value="<?= max(1, $currentPage - 1) ?>" class="page-link">&laquo;</button>
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
                if ($currentPage < $totalPages && $totalPages > 1 && ($totalPages > 4)) {
                ?>
                    <li class="page-item">
                        <button type="submit" name="page" value="<?= $totalPages ?>" class="page-link"><?= $totalPages ?></button>
                    </li>
                <?php
                }

                // Next Button
                ?>
                <li class="page-item <?= ($currentPage == $totalPages || $currentPage <= 0 || empty($data['anggota'])) ? 'disabled' : '' ?>">
                    <button type="submit" name="page" value="<?= min($totalPages, $currentPage + 1) ?>" class="page-link"> &raquo;</button>
                </li>
                <?php
                ?>
            </ul>
        </form>
    </nav>

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
</div>
<script src="<?= BASEURL; ?>/js/scriptAnggota.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>