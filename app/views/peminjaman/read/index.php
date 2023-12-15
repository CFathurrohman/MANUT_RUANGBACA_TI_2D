<div class="objtransition">
    <div class="container mt-5">
        <br>
        <div class="card mb-3">
            <?php foreach ( $data['buku'] as $book): ?>
                <div class="row g-0">
                    <div class="col-md-4">
                    <td><img src="<?= BASEURL; ?>/img/<?= $book['gambar_buku']; ?>" class="card-img-top" alt="" style="width: 195px; height: 300px"></td>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h2 class="card-title"><?= $book['nama_buku']; ?></h2>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><small class="text-muted">Kategori
                                : <?= $book['nama_kategori']; ?></small></li>
                            <li class="list-group-item"><small class="text-muted">Penulis
                                : <?= $book['penulis']; ?></small></li>
                            <li class="list-group-item"><small class="text-muted">Tahun Terbit
                                : <?= $book['tahun_terbit']; ?></small></li>
                            <li class="list-group-item"><small class="text-muted">Deskripsi
                                : <?= $book['deskripsi']; ?></small></li>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <a href="javascript:history.go(-1)" class="btn btn-primary">Kembali</a>
    </div>
</div>
