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
                <img class="d-block w-100" src="https://source.unsplash.com/78A265wPiO4" alt="First slide">
            </div>
            <div class="carousel-item fade-in">
                <img class="d-block w-100" src="https://source.unsplash.com/eOpewngf68w" alt="Second slide">
            </div>
            <div class="carousel-item fade-in">
                <img class="d-block w-100" src="https://source.unsplash.com/ndN00KmbJ1c" alt="Third slide">
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

   
    <div class="row row-cols-1 row-cols-md-6 g-4">
        <?php foreach ($data['buku'] as $buku) : ?>
            
            <div class="col">
                <div class="card">
                    <img src="<?= BASEURL; ?>/img/<?= $buku['gambar_buku']; ?>" class="card-img-top" alt="" style="width: 195px; height: 300px">

                    <div class="card-body">
                        <h5 class="card-title"><?= $buku['nama_buku']; ?></h5>
<!--                        <ul class="list-group list-group-flush">-->
<!--                            <li class="list-group-item"><small class="text-muted">--><?php //= $buku['nama_kategori']; ?><!--</small></li>-->
                            <li class="list-group-item"><small class="text-muted"><?= $buku['penulis']; ?></small></li><br>
                            <li class="list-group-item"><small class="text-muted"><?= $buku['tahun_terbit']; ?></small></li>
<!--                        </ul>-->
                        <div class="card-body text-end">
                            <a href="<?= BASEURL; ?>/buku/read/<?= $buku['id_buku']; ?>" class="btn btn-outline-info">Lihat</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>