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
                    <th class="aksi">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $number = ((($data['page'] - 1) * 10) + 1) ?>
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
                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0,0,256,256">
                                                <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                                    <g transform="scale(8.53333,8.53333)">
                                                        <path d="M25.98047,2.99023c-0.03726,0.00118 -0.07443,0.00444 -0.11133,0.00977h-5.86914c-0.36064,-0.0051 -0.69608,0.18438 -0.87789,0.49587c-0.18181,0.3115 -0.18181,0.69676 0,1.00825c0.18181,0.3115 0.51725,0.50097 0.87789,0.49587h3.58594l-10.29297,10.29297c-0.26124,0.25082 -0.36648,0.62327 -0.27512,0.97371c0.09136,0.35044 0.36503,0.62411 0.71547,0.71547c0.35044,0.09136 0.72289,-0.01388 0.97371,-0.27512l10.29297,-10.29297v3.58594c-0.0051,0.36064 0.18438,0.69608 0.49587,0.87789c0.3115,0.18181 0.69676,0.18181 1.00825,0c0.3115,-0.18181 0.50097,-0.51725 0.49587,-0.87789v-5.87305c0.04031,-0.29141 -0.04973,-0.58579 -0.24615,-0.80479c-0.19643,-0.219 -0.47931,-0.34042 -0.77338,-0.33192zM6,7c-1.09306,0 -2,0.90694 -2,2v15c0,1.09306 0.90694,2 2,2h15c1.09306,0 2,-0.90694 2,-2v-10v-2.57812l-2,2v2.57813v8h-15v-15h8h2h0.57813l2,-2h-2.57812h-2z"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                        </a>
                                        <a href="<?= BASEURL; ?>/buku/ubah/<?= $buku['id_buku']; ?>" class="badge btn btn-success float-right tampilBukuModalUbah" data-bs-toggle="modal" data-bs-target="#tambahBukuModal" data-id="<?= $buku['id_buku'] ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                            </svg>
                                        </a>
                                        <a href="<?= BASEURL; ?>/buku/hapus/<?= $buku['id_buku']; ?>" class="badge btn btn-danger deleteBuku">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            <?php endforeach; ?>
                            </tr>
                    </tbody>
                </table>
                <style>
                    .aksi {
                        width: 10% !important;
                    }
                </style>
            </div>
        </div>
    </div>
</div>

<nav aria-label="Page navigation">
    <form action="<?= BASEURL; ?>/buku" method="post">
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
            <li class="page-item <?= ($currentPage == $totalPages || $currentPage <= 0 || empty($data['buku'])) ? 'disabled' : '' ?>">
                <button type="submit" name="page" value="<?= min($totalPages, $currentPage + 1) ?>" class="page-link"> &raquo;</button>
            </li>
            <?php
            ?>
        </ul>
    </form>
</nav>

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
                        <label for="gambar" class="form-label">Gambar Buku</label>
                        <input type="file" name="gambar" class="form-control" id="gambar"><br>
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
                <button type="submit" class="btn btn-primary" id="button-buku">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script src="<?= BASEURL; ?>/js/scriptBuku.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.getElementById('gambar').addEventListener('change', function(e) {
        var preview = document.getElementById('preview');
        preview.src = URL.createObjectURL(e.target.files[0]);
    });
</script>