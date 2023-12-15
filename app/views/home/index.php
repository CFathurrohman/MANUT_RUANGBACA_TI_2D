<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/homeStyle.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

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
    <div class="carousel">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <!-- <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol> -->
            <div class="carousel-inner">
                <div class="carousel-item active fade-in">
                <img class="d-block w-100" src="<?= BASEURL; ?>/img/Carousel Slide 1.png" alt="First slide">
                </div>
                <div class="carousel-item fade-in">
                <img class="d-block w-100" src="<?= BASEURL; ?>/img/Carousel Slide 2.png" alt="Second slide">
                </div>
                <div class="carousel-item fade-in">
                <img class="d-block w-100" src="<?= BASEURL; ?>/img/Carousel Slide 3.png" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>

            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>

            </a>
        </div>
    </div>


<br><hr style="height: 1px;color: black;background-color: black;">
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
                <img style="box-sizing: border-box" src="<?= BASEURL; ?>/img/<?= $buku['gambar_buku']; ?>" class="card-img-top" alt="Book Cover">
                <div class="card-body">
                    <h5 style="font-size: medium" class="card-title"><?= $buku['nama_buku']; ?></h5>
<!--                    <li class="list-group-item"><small class="text-muted">--><?php //= $buku['penulis']; ?><!--</small></li><br>-->
<!--                    <li class="list-group-item"><small class="text-muted">--><?php //= $buku['tahun_terbit']; ?><!--</small></li>-->

                    <?php if ($buku['jumlah_tersedia'] == 0) : ?>
                        <li class="list-group-item"><small class="text-danger"><strong>Tidak Tersedia</strong></small></li>
                    <?php else : ?>
                        <li class="list-group-item"><small class="text-success"><strong>Tersedia</strong></small></li>
                    <?php endif; ?>
                </div>
                <div class="card-footer text-center">
                    <a href="<?= BASEURL; ?>/buku/read/<?= $buku['id_buku']; ?>" class="btn btn-sm btn-outline-info d-block">Lihat</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>


<!--    <div class="row row-cols-1 row-cols-md-6">-->
<!--        --><?php //foreach ($data['buku'] as $buku) : ?>
<!---->
<!--            <div class="col">-->
<!--                <div class="card">-->
<!--                    <img src="--><?php //= BASEURL; ?><!--/img/--><?php //= $buku['gambar_buku']; ?><!--" class="card-img-top" alt="" style="width: 195px; height: 300px">-->
<!---->
<!--                    <div class="card-body">-->
<!--                        <h5 class="card-title">--><?php //= $buku['nama_buku']; ?><!--</h5>-->
<!--                        <li class="list-group-item"><small class="text-muted">--><?php //= $buku['penulis']; ?><!--</small></li><br>-->
<!--                        <li class="list-group-item"><small class="text-muted">--><?php //= $buku['tahun_terbit']; ?><!--</small></li>-->
<!---->
<!--                        --><?php //if ($buku['jumlah_tersedia'] == 0) : ?>
<!--                            <li class="list-group-item"><small class="text-danger"><strong>Tidak Tersedia</strong></small></li>-->
<!--                        --><?php //else : ?>
<!--                            <li class="list-group-item"><small class="text-success"><strong>Tersedia</strong></small></li>-->
<!--                        --><?php //endif; ?>
<!--                        <div class="card-body text-end">-->
<!--                            <a href="--><?php //= BASEURL; ?><!--/buku/read/--><?php //= $buku['id_buku']; ?><!--" class="btn btn-outline-info">Lihat</a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        --><?php //endforeach; ?>
<!--    </div>-->
</div>