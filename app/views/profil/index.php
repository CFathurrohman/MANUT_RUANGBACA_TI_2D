<!--<div class="transition-group">-->
<!--    <div></div>-->
<!--    <div></div>-->
<!--    <div></div>-->
<!--    <div></div>-->
<!--    <div></div>-->
<!--</div>-->
<!---->
<!---->
<!--<link rel="stylesheet" type="text/css" href="--><?php //= BASEURL; ?><!--/css/profileStyle.css">-->
<!---->
<!--<div class="profile-container">-->
<!--    <div class="profile">-->
<!--        <img alt="" src="--><?php //= BASEURL; ?><!--/img/imgProfil/--><?php //= $data['user']['foto_profil']; ?><!--" class="rounded-circle profile-widget-picture" style="width: 150px; height: 150px">-->
<!--        <div class="profile-details">-->
<!--            <div class="profile-name">--><?php //= $data['user']['nama']; ?><!--</div>-->
<!--            <div class="profile-info">Status : --><?php //= $data['user']['status']; ?><!-- </div>-->
<!--            <div class="profile-info"> ID : --><?php //= $data['user']['id_anggota']; ?><!-- </div>-->
<!--            <div class="profile-info">No Telepon : --><?php //= $data['user']['no_telp']; ?><!-- </div>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--</div>-->
<!---->
<!--<button type="button" class="btn btn-primary tombolBukuTambahData" data-bs-toggle="modal" data-bs-target="#tambahBukuModal">-->
<!--    Edit Foto Profil-->
<!--</button>-->
<!---->
<!--<div class="modal fade" id="tambahBukuModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">-->
<!--    <div class="modal-dialog">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <h4 class="modal-title" id="formBukuModalLabel">Edit Foto Profile</h4>-->
<!--                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!--                <form id="upload-form" action="--><?php //= BASEURL; ?><!--/profil/ubahFotoProfil" method="post" enctype="multipart/form-data">-->
<!--                    <input type="hidden" name="id_anggota" id="id_anggota">-->
<!--                    <div class="mb-3">-->
<!--                        <label for="foto_profil" class="form-label">Foto Profil</label>-->
<!--                        <input type="file" name="foto_profil" class="form-control" id="foto_profil"><br>-->
<!--                        <img id="preview" src="#" alt="Upload Gambar" width="200px">-->
<!--                    </div>-->
<!--            </div>-->
<!--            <div class="modal-footer">-->
<!--                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>-->
<!--                <button type="submit" class="btn btn-primary" id="button-buku">Perbarui</button>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/profileStyle.css">

<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-30 col-md-30">
                <br><br><br>
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25">
                                    <img alt="image" src="<?= BASEURL; ?>/img/imgProfil/<?= $data['user']['foto_profil']; ?>"
                                         class="rounded-circle profile-widget-picture"
                                         style="width: 150px; height: 150px">
                                </div>
                                <h6 class="f-w-600"><?= $data['user']['nama']; ?></h6>
                                <p><?= $data['user']['id_anggota']; ?></p>

                                <button type="button" class="btn btn-warning tombolBukuTambahData" data-bs-toggle="modal" data-bs-target="#tambahBukuModal">
                                   Ganti Foto Profil
                                </button>
                                <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Informasi</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Status</p>
                                        <h6 class="text-muted f-w-400"><?= $data['user']['status']; ?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Nomor Handphone</p>
                                        <h6 class="text-muted f-w-400"><?= $data['user']['no_telp']; ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

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
                        <img id="preview" src="#" alt="Upload Gambar" width="200px" style="display: none">
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
        preview.style.display = 'block'; // Tampilkan gambar setelah diinput
    });
</script>
