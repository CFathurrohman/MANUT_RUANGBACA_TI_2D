<div class="container mt-5">
    <div class="row row-cols-1 row-cols-md-6 g-4" style="min-width: 80rem">
        <?php foreach ($data['buku'] as $buku) : ?>
            <div class="col">
                <div class="card">
                    <img src="<?= BASEURL; ?>/img/c++.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $buku['nama_buku']; ?></h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><small class="text-muted"><?= $buku['nama_buku']; ?></small>
                            </li>
                            <li class="list-group-item"><small class="text-muted"><?= $buku['penulis']; ?></small>
                            </li><li class="list-group-item"><small class="text-muted"><?= $buku['tahun_terbit']; ?></small>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
