<div class="transition-group">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
</div>
<div class="objtransition">
<div class="container mt-5">

    <div class="row">
        <div class="col-12"><br>
            <h3>Katalog buku</h3><br>
            <hr style="height: 1px;color: black;background-color: black;">
        </div>
    </div>

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
                    <img src="<?= $buku['gambar_buku']; ?>" class="card-img-top" alt="" style="width: 195px; height: 300px">
                    <div class="card-body">
                        <h5 class="card-title"><?= $buku['nama_buku']; ?></h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><small class="text-muted"><?= $buku['nama_kategori']; ?></small></li>
                            <li class="list-group-item"><small class="text-muted"><?= $buku['penulis']; ?></small></li>
                            <li class="list-group-item"><small class="text-muted"><?= $buku['tahun_terbit']; ?></small></li>
                        </ul>
                        <div class="card-body text-end">
                            <a href="<?= BASEURL; ?>/buku/read/<?= $buku['id_buku']; ?>" class="btn btn-outline-info">Lihat</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>