<div class="transition-group">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
</div>


    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/profileStyle.css">

    <div class="profile-container">
        <div class="profile">
            <img alt="" src="<?= BASEURL; ?>/img/imgProfil/<?=$data['user']['foto_profil'];?>" class="rounded-circle profile-widget-picture" style="width: 150px; height: 150px">
            <div class="profile-details">
                <div class="profile-name"><?= $data['user']['nama']; ?></div>
                <div class="profile-info">Status : <?= $data['user']['status']; ?> </div>
                <div class="profile-info"> ID : <?= $data['user']['id_anggota']; ?> </div>
                <div class="profile-info">No Telepon : <?= $data['user']['no_telp']; ?> </div>
            </div>
        </div>

    </div>

    <button type="button" class="btn btn-primary tombolBukuTambahData" data-bs-toggle="modal" data-bs-target="#tambahBukuModal">
        Edit Foto Profil
    </button>

<div class="modal fade" id="tambahBukuModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="formBukuModalLabel">Edit Foto Profile</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="upload-form" action="<?= BASEURL; ?>/profil/ubahFotoProfil" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_anggota" id="id_anggota">
                    <div class="mb-3">
                        <label for="foto_profil" class="form-label">Foto Profil</label>
                        <input type="file" name="foto_profil" class="form-control" id="foto_profil"><br>
                        <img id="preview" src="#" alt="Upload Gambar" width="200px">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" id="button-buku">Perbarui</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('foto_profil').addEventListener('change', function(e) {
        var preview = document.getElementById('preview');
        preview.src = URL.createObjectURL(e.target.files[0]);
    });
</script>

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