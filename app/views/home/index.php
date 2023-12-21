<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/homeStyle.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?= BASEURL; ?>/js/home.js"></script>

<style>
    .card {
        transition: background-color 0.3s ease;
    }

    .card:hover {
        background-color: #f0f0f0;
        cursor: pointer;
    }

    [data-bs-theme = "light"] #card_ajukan {
        background-color: #D8EB79;
    }

    [data-bs-theme = "light"] #card_pinjam {
        background-color: #D8EB79;
    }

    [data-bs-theme = "light"] #card_ajukan:hover {
        background-color: papayawhip;
        cursor: pointer;
    }

    [data-bs-theme = "light"] #card_pinjam:hover {
        background-color: papayawhip;
        cursor: pointer;
    }

    [data-bs-theme = "dark"] #card_ajukan {
        background-color: #586669;
    }

    [data-bs-theme = "dark"] #card_pinjam {
        background-color: #586669;
    }

    [data-bs-theme = "dark"] #card_ajukan:hover {
        background-color: #243447;
        cursor: pointer;
    }

    [data-bs-theme = "dark"] #card_pinjam:hover {
        background-color: #243447;
        cursor: pointer;
    }

    [data-bs-theme = "dark"] .card:hover {
        background-color: #243447;
    }
</style>

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
            <h3>Katalog buku</h3><br>
        </div>
    </div>
    <?php
    if (isset($_SESSION['username']) && isset($_SESSION['level'])) {
        if ($_SESSION['level'] == 'admin') {
            echo '<div class="row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <div id="card_ajukan" class="card" onclick="redirectToAnotherPage(\'' . BASEURL . '/peminjaman\')">
                          <div class="card-body text-start">
                            <h5 class="card-title">Jumlah Pengajuan</h5>
                            <p class="card-text">' . $data["jumlah_diajukan"]["jumlah"] . ' Pengajuan</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div id="card_pinjam" class="card" onclick="redirectToAnotherPage(\'' . BASEURL . '/pengembalian\')">
                          <div class="card-body text-start">
                            <h5 class="card-title">Jumlah Peminjaman</h5>
                            <p class="card-text">' . $data["jumlah_dipinjam"]["jumlah"] . ' Peminjaman</p>
                          </div>
                        </div>
                      </div>
                    </div>';
        } else {
            echo '      <div class="carousel">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active fade-in">
                                        <img class="d-block w-100" src="' .BASEURL . ' /img/Carousel Slide 1.png" alt="First slide">
                                    </div>
                                    <div class="carousel-item fade-in">
                                        <img class="d-block w-100" src="' .BASEURL . '/img/Carousel Slide 2.png" alt="Second slide">
                                    </div>
                                    <div class="carousel-item fade-in">
                                        <img class="d-block w-100" src="' .BASEURL . '/img/Carousel Slide 3.png" alt="Third slide">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                </a>
                            </div>
                        </div>';
        }
    } else {
        echo '      <div class="carousel">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active fade-in">
                                        <img class="d-block w-100" src="' .BASEURL . ' /img/Carousel Slide 1.png" alt="First slide">
                                    </div>
                                    <div class="carousel-item fade-in">
                                        <img class="d-block w-100" src="' .BASEURL . '/img/Carousel Slide 2.png" alt="Second slide">
                                    </div>
                                    <div class="carousel-item fade-in">
                                        <img class="d-block w-100" src="' .BASEURL . '/img/Carousel Slide 3.png" alt="Third slide">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                </a>
                            </div>
                        </div>';
    }

    ?>

    <hr style="height: 1px;color: black;background-color: black;">
    <div class="row mb-3">
        <div class="col-lg-12 d-flex justify-content-end">
            <form action="<?= BASEURL; ?>/home/cari" method="post" class="d-flex">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Nama Buku" name="keyword" id="keyword" autocomplete="off">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-secondary" type="submit" id="tombolCari">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row row-cols-md-6 row-cols-2 gx-4 p-5">
        <?php foreach ($data['buku'] as $buku) : ?>
            <div class="col mb-3">
                <div style="box-shadow: 0 0.5px 0.5px 0 rgba(0, 0, 0, 0.25);" class="card h-100">
                       <img style="box-sizing: border-box" src="<?= BASEURL; ?>/img/<?= $buku['gambar']; ?>" class="card-img-top" alt="Book Cover">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 style="font-size: medium" class="card-title"><?= $buku['nama_buku']; ?></h5>
                        <div>
                            <?php if ($buku['jumlah_tersedia'] == 0) : ?>
                                <li class="list-group-item"><small class="text-danger"><strong>Tidak Tersedia</strong></small></li>
                            <?php else : ?>
                                <li class="list-group-item"><small class="text-success"><strong>Tersedia</strong></small></li>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="card-footer text-center">
                        <a href="<?= BASEURL; ?>/buku/read/<?= $buku['id_buku']; ?>" class="btn btn-sm btn-outline-warning d-block">Lihat</a>
                    </div>
                    <?php if (isset($_SESSION['level']) && $_SESSION['level'] == 'anggota') : ?>
                        <div class="card-footer text-center">
                            <a href="<?= BASEURL; ?>/buku_simpan/tambah/<?= $buku['id_buku']; ?>" class="btn btn-sm btn-outline-info d-block simpanWishlish">Simpan</a>
                        </div>
                        <div class="card-footer text-center">
                            <a href="<?= BASEURL; ?>/keranjang/tambah/<?= $buku['id_buku']; ?>" class="btn btn-sm btn-outline-success d-block simpanWishlish">Keranjang</a>
                        </div>
                    <?php elseif (!isset($_SESSION['level'])) : ?>
                        <div class="card-footer text-center">
                            <a href="http://localhost/manut_ruangbaca_ti_2d/public/Log" class="btn btn-sm btn-outline-info d-block">Simpan</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<nav aria-label="Page navigation">
    <form action="<?= BASEURL; ?>/home" method="post">
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
            <li class="page-item <?= ($currentPage == $totalPages) ? 'disabled' : '' ?>">
                <button type="submit" name="page" value="<?= min($totalPages, $currentPage + 1) ?>" class="page-link"> &raquo;</button>
            </li>
            <?php
            ?>
        </ul>
    </form>
</nav>

<script>
    <?php if (isset($_SESSION['sweetalert'])) : ?>
        Swal.fire({
            icon: '<?php echo $_SESSION['sweetalert']['icon']; ?>',
            title: '<?php echo $_SESSION['sweetalert']['title']; ?>',
            text: '<?php echo $_SESSION['sweetalert']['text']; ?>',
        });
        <?php unset($_SESSION['sweetalert']); ?>
    <?php endif; ?>
</script>

<script>
    $(document).ready(function() {
        $('.simpanWishlish').click(function(event) {
            event.preventDefault();

            $.ajax({
                url: $(this).attr('href'),
                method: 'GET',
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil Menyimpan Wishlist',
                        text: 'Buku telah ditambahkan ke wishlist.',
                        showConfirmButton: false,
                        timer: 1500
                    });
                },
                error: function(error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal Menyimpan Wishlist',
                        text: 'Terjadi kesalahan saat menyimpan wishlist. Silakan coba lagi.',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        });
    });
</script>

<script>
    function redirectToAnotherPage(url1, url2) {
        // url1 = 'http://localhost/manut_ruangbaca_ti_2d/public/pemi';
        // url2 = 'http://localhost/manut_ruangbaca_ti_2d/public/buku_dipinjam';
        let condition = true;
        let check = condition ? url1 : url2;
        window.location.href = check;
    }
</script>