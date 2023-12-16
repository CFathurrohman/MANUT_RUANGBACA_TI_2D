<div class="objtransition">
    <div class="container mt-5">
        <br>
        <a href="javascript:history.go(-1)" class="btn btn-primary">Kembali</a>
        <br><br>
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                <td><img src="<?= BASEURL; ?>/img/<?= $data['buku']['gambar_buku']; ?>" class="card-img-top" alt="" style="width: 195px; height: 300px"></td>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h2 class="card-title"><?= $data['buku']['nama_buku']; ?></h2>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><small class="text-muted">Kategori
                            : <?= $data['buku']['nama_kategori']; ?></small></li>
                        <li class="list-group-item"><small class="text-muted">Penulis
                            : <?= $data['buku']['penulis']; ?></small></li>
                        <li class="list-group-item"><small class="text-muted">Tahun Terbit
                            : <?= $data['buku']['tahun_terbit']; ?></small></li>
                        <li class="list-group-item"><small class="text-muted">Deskripsi
                            : <?= $data['buku']['deskripsi']; ?></small></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>