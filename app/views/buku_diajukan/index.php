<div class="transition-group">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
</div>
<div class="col mb-3 mx-3">
    
    <br>
    <div class="row row-cols-md-6 row-cols-2 gx-4 p-5">
    <?php if(empty($data['buku'])): ?>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="50vw" height="50vh" fill="#e3e3e3" class="bi bi-x" viewBox="0 0 16 16">
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                </svg>
            </div>
        <?php else: ?>
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
        <?php endif; ?>
    </div>
</div>