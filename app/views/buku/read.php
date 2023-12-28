<div class="objtransition">
    <div class="container mt-5">
        <br>
        <div class="card-body text-start">
            <a href="http://localhost/manut_ruangbaca_ti_2d/public/Home" class="btn btn-primary col-1 bi bi-arrow-left">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                </svg>
                Kembali</a>
        </div><br>
        <style>
            .pinjamButton {
                margin-top: 2%;
                margin-left: 60vw;
            }
        </style>
        <div class="card mb-3 shadow">
            <div class="row g-0" style="height: 70vh;">
                <div class="col-md-3 text-center mt-4 mb-4 ps-5 pe-3">
                    <img src="<?= BASEURL; ?>/img/imgBuku/<?= $data['buku']['gambar']; ?>" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h2 class="card-title"><?= $data['buku']['nama_buku']; ?></h2>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><small class="text-muted"><strong>Kategori</strong>
                                &emsp;&emsp;&ensp;&nbsp; :<?= $data['buku']['nama_kategori']; ?></small></li>
                        <li class="list-group-item"><small class="text-muted"><strong>Penulis</strong>
                                &emsp;&emsp;&emsp;&ensp; :<?= $data['buku']['penulis']; ?></small></li>
                        <li class="list-group-item"><small class="text-muted"><strong>Tahun Terbit</strong>
                                &emsp; :<?= $data['buku']['tahun_terbit']; ?></small></li>
                        <li class="list-group-item"><small class="text-muted"><strong>Stock Tersedia</strong>
                                &nbsp; :<?= $data['buku']['jumlah_tersedia']; ?></small></li>
                        <li class="list-group-item"><small class="text-muted"><strong>Deskripsi</strong><br><?= $data['buku']['deskripsi']; ?></small></li>
                    </ul>
                    <?php if (isset($_SESSION['level']) && $_SESSION['level'] == 'admin') : ?>
                        <!-- <div class="card-body text-end">
          <a href="#" class="btn btn-warning col-1">Edit</a>
         </div> -->
                    <?php elseif (isset($_SESSION['level']) && $_SESSION['level'] == 'anggota') : ?>
                        <div class="pinjamButton">
                            <div class="card-body d-flex justify-content-end">
                                <form id="pinjamForm" action="<?= BASEURL; ?>/keranjang/tambah/<?= $data['buku']['id_buku']; ?>" method="post">
                                    <button type="submit" class="btn btn-warning" id="pinjamBtn" style="margin-top: 20px;">Pinjam</button>
                                </form>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="pinjamButton">
                            <div class="card-body d-flex justify-content-end">
                                <a href="http://localhost/manut_ruangbaca_ti_2d/public/Log" class="btn btn-warning" style="margin-top: 20px;">Pinjam</a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.getElementById('pinjamBtn').addEventListener('click', function(event) {
        event.preventDefault();
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'Buku berhasil dimasukkan ke keranjang.',
            showConfirmButton: false,
            timer: 1500
        }).then(() => {
            document.getElementById('pinjamForm').submit();
        });
    });
</script>