<div class="transition-group">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
</div>
<br><br>
<div class="col mb-3 mx-3 shadow">
    <div class="content-title text-center">
        <h3>Daftar Buku Diajukan</h3>
    </div>
    <br>
    <div class="row row-cols-md-6 row-cols-2 gx-4 p-5">
        <?php foreach ($data['buku'] as $buku) : ?>
            <div class="col mb-3">
                <div style="box-shadow: 0 0.5px 0.5px 0 rgba(0, 0, 0, 0.25);" class="card h-100">
                    <img style="box-sizing: border-box" src="<?= BASEURL; ?>/img/<?= $buku['gambar_buku']; ?>" class="card-img-top" alt="Book Cover">
                    <div class="card-body">
                        <h5 style="font-size: medium" class="card-title"><?= $buku['nama_buku']; ?></h5>
                    </div>
                    <div class="card-body">
                        <h6>Tanggal Pengajuan : </h6>
                        <h5 style="font-size: medium" class="card-title"><?= $buku['tgl_pengajuan']; ?></h5>
                    </div>
                    <div class="card-footer text-center">
                        <a href="<?= BASEURL; ?>/buku_diajukan/read/<?= $buku['id_buku']; ?>" class="btn btn-sm btn-outline-info d-block">Lihat</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>