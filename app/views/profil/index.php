<div class="transition-group">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
</div>

<body>
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/profileStyle.css">

    <div class="profile-container">
        <div class="profile">
            <img class="profile-image" src="">
            <div class="profile-details">
                <div class="profile-name"><?= $data['user']['nama']; ?></div>
                <div class="profile-info">Status : <?= $data['user']['status']; ?> </div>
                <div class="profile-info"> ID : <?= $data['user']['id_anggota']; ?> </div>
                <div class="profile-info">No Telepon : <?= $data['user']['no_telp']; ?> </div>
            </div>
        </div>
    </div>

    
    <!-- <div class="container">
        <div class="row">
        <div class="col-md-6">
            <div class="content">
                <div class="content-title">
                    <h3>Buku yang sedang dipinjam</h3>
                </div>

                <div class="row row-cols-1 row-cols-md-6 g-4">
                    <?php foreach ($data['buku_pinjam'] as $buku) : ?>
                        <div class="col">
                            <div class="card">
                                <img src="<?= BASEURL; ?>/img/<?= $buku['gambar_buku']; ?>" class="card-img-top" alt="" style="width: 195px; height: 300px">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $buku['nama_buku']; ?></h5>
                                    <li class="list-group-item"><small class="text-muted"><?= $buku['penulis']; ?></small></li><br>
                                    <li class="list-group-item"><small class="text-muted"><?= $buku['tahun_terbit']; ?></small></li>
                                    <div class="card-body text-end">
                                        <a href="<?= BASEURL; ?>/profil/read/<?= $buku['id_buku']; ?>" class="btn btn-outline-info">Lihat</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="content">
                <div class="content-title">
                    <h3>Riwayat Peminjaman Selesai</h3>
                </div>

                <div class="row row-cols-1 row-cols-md-6 g-4">
                    <?php foreach ($data['buku_kembali'] as $buku) : ?>
                        <div class="col">
                            <div class="card">
                                <img src="<?= BASEURL; ?>/img/<?= $buku['gambar_buku']; ?>" class="card-img-top" alt="" style="width: 195px; height: 300px">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $buku['nama_buku']; ?></h5>
                                    <li class="list-group-item"><small class="text-muted"><?= $buku['penulis']; ?></small></li><br>
                                    <li class="list-group-item"><small class="text-muted"><?= $buku['tahun_terbit']; ?></small></li>
                                    <div class="card-body text-end">
                                        <a href="<?= BASEURL; ?>/profil/read/<?= $buku['id_buku']; ?>" class="btn btn-outline-info">Lihat</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                     
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div> -->
</div>
</div>