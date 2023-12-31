<div class="objtransition">
    <div class="container mt-5">
        <br>
        <a href="javascript:history.go(-1)" class="btn btn-primary">Kembali</a>
        <br><br>
        <div class="card mb-3">
            
            <?php foreach ( $data['buku'] as $book): ?>
                <div class="row g-0">
                    <div class="col-md-4 text-center mt-3 mb-3">
                    <td><img src="<?= BASEURL; ?>/img/imgBuku/<?= $book['gambar']; ?>" class="card-img-top" alt="" style="width: 195px; height: 300px"></td>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h2 class="card-title"><?= $book['nama_buku']; ?></h2>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><small class="text-muted"><strong>Kategori</strong>
                                :&emsp;&emsp;&ensp;&nbsp; <?= $book['nama_kategori']; ?></small></li>
                            <li class="list-group-item"><small class="text-muted"><strong>Penulis</strong>
                                :&emsp;&emsp;&emsp;&ensp; <?= $book['penulis']; ?></small></li>
                            <li class="list-group-item"><small class="text-muted"><strong>Tahun Terbit</strong>
                                :&emsp; <?= $book['tahun_terbit']; ?></small></li>
                            <li class="list-group-item"><small class="text-muted"><strong>Deskripsi</strong><br>
                                 <?= $book['deskripsi']; ?></small></li>
                        </ul>
                    </div>
                </div>
                <br><br>
            <?php endforeach; ?>
        </div>
        
    </div>
</div>
