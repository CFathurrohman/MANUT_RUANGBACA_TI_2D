<div class="transition-group">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
</div>

<div class="container mt-5">


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
                    <th>Kondisi</th>
                    <th>Denda</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
                    if (empty($data['buku'])) : ?>
                        <tr>
                            <td colspan="13" style="text-align:center;">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="50vw" height="50vh" fill="#e3e3e3" class="bi bi-x" viewBox="0 0 16 16">
                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                    </svg>
                                </div>
                            </td>
                        </tr>
                    <?php else :
               $number = ((($data['page'] - 1) * 10) + 1) ?>
                <?php foreach ($data['buku'] as $riwayat) : ?>
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
                        <td><?php echo $riwayat['kondisi']; ?></td>
                        <td><?php echo $riwayat['denda']; ?></td>
                        <td><?php echo $riwayat['keterangan']; ?></td>
                        <td>
                            <a href="<?= BASEURL; ?>/riwayat/read/<?= $riwayat['id_peminjaman']; ?>" class="badge btn btn-primary float-right" data-id="<?= $riwayat['id_peminjaman'] ?>"> <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0,0,256,256">
                                    <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                        <g transform="scale(8.53333,8.53333)">
                                            <path d="M25.98047,2.99023c-0.03726,0.00118 -0.07443,0.00444 -0.11133,0.00977h-5.86914c-0.36064,-0.0051 -0.69608,0.18438 -0.87789,0.49587c-0.18181,0.3115 -0.18181,0.69676 0,1.00825c0.18181,0.3115 0.51725,0.50097 0.87789,0.49587h3.58594l-10.29297,10.29297c-0.26124,0.25082 -0.36648,0.62327 -0.27512,0.97371c0.09136,0.35044 0.36503,0.62411 0.71547,0.71547c0.35044,0.09136 0.72289,-0.01388 0.97371,-0.27512l10.29297,-10.29297v3.58594c-0.0051,0.36064 0.18438,0.69608 0.49587,0.87789c0.3115,0.18181 0.69676,0.18181 1.00825,0c0.3115,-0.18181 0.50097,-0.51725 0.49587,-0.87789v-5.87305c0.04031,-0.29141 -0.04973,-0.58579 -0.24615,-0.80479c-0.19643,-0.219 -0.47931,-0.34042 -0.77338,-0.33192zM6,7c-1.09306,0 -2,0.90694 -2,2v15c0,1.09306 0.90694,2 2,2h15c1.09306,0 2,-0.90694 2,-2v-10v-2.57812l-2,2v2.57813v8h-15v-15h8h2h0.57813l2,-2h-2.57812h-2z"></path>
                                        </g>
                                    </g>
                                </svg></a>
                        </td>
                    </tr>
                <?php endforeach; endif ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation">
            <form action="<?= BASEURL; ?>/riwayat" method="post">
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
    </div>
</div>