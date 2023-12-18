<div class="transition-group">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
</div>

<<<<<<< HEAD
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<form action="<?= BASEURL; ?>/keranjang/multiPinjam" method="post">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <br>
                <h3>Keranjang </h3>
                <br>
                <hr style="height: 1px;color: black;background-color: black;">
=======
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <form action="<?= BASEURL; ?>/keranjang/multiPinjam" method="post">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <br>
                    <h3>Keranjang </h3>
                    <br>
                    <hr style="height: 1px;color: black;background-color: black;">
                </div>
>>>>>>> d52d0a625917de2b0993269927134d44b0a8624e
            </div>

            <div class="table-responsive shadow">
                <table class="table table-bordered">
                    <thead class="thead-white">
                        <tr>
<<<<<<< HEAD
                            <td><?php echo $number;
                                $number++ ?></td>
                            <td><img src="<?= BASEURL; ?>/img/<?= $keranjang['gambar_buku']; ?>" class="card-img-top" alt="" style="width: 195px; height: 300px"></td>
                            <td><?php echo $keranjang['nama_buku']; ?></td>
                            <td>
                                <input type="checkbox" name="selected_books[]" value="<?= $keranjang['id_keranjang']; ?>">
                            </td>
                            <td>
                                <a href="<?= BASEURL; ?>/keranjang/read/<?= $keranjang['id_buku']; ?>" class="badge btn btn-primary float-right" data-id="<?= $keranjang['id_buku'] ?>">Detail</a>
                                <a href="<?= BASEURL; ?>/keranjang/hapus/<?= $keranjang['id_keranjang']; ?>" class="badge btn btn-danger float-right deleteKeranjang" data-id="<?= $keranjang['id_keranjang'] ?>">Hapus</a>
                            </td>
=======
                            <th>No.</th>
                            <th>Gambar Buku</th>
                            <th>Nama</th>
                            <th>Tandai</th>
                            <th>Aksi</th>
>>>>>>> d52d0a625917de2b0993269927134d44b0a8624e
                        </tr>
                    </thead>
                    <tbody>
                        <?php $number = 1 ?>
                        <?php foreach ($data['keranjang'] as $keranjang) : ?>
                            <tr>
                                <td><?php echo $number;
                                    $number++ ?></td>
                                <td><img src="<?= BASEURL; ?>/img/<?= $keranjang['gambar_buku']; ?>" class="card-img-top" alt="" style="width: 98px; height: 150px"></td>
                                <td><?php echo $keranjang['nama_buku']; ?></td>
                                <td>
                                    <input type="checkbox" name="selected_books[]" value="<?= $keranjang['id_keranjang']; ?>">
                                </td>
                                <td>
                                    <a href="<?= BASEURL; ?>/keranjang/read/<?= $keranjang['id_buku']; ?>" class="badge btn btn-primary float-right" data-id="<?= $keranjang['id_buku'] ?>">

<<<<<<< HEAD
        <div class="row">
            <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary">Pinjam</button>
                <button type="button" class="btn btn-secondary back-button" onclick="<?php BASEURL ?>">Kembali</button>
            </div>
        </div>
    </div>
</form>
<script>
    $(document).ready(function() {
        $('form').submit(function(event) {
            if ($('input[name="selected_books[]"]:checked').length === 0) {
                event.preventDefault();

                Swal.fire({
                    icon: 'error',
                    title: 'Gagal Pinjam',
                    text: 'Tandai buku yang mau dipinjam!',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                });
            } else {
                event.preventDefault();

                Swal.fire({
                    icon: 'success',
                    title: 'Pinjam Terpilih',
                    text: 'Peminjaman Success!',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    $('form').get(0).submit();
                });
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.deleteKeranjang').click(function(event) {
            event.preventDefault();

            var deleteUrl = $(this).attr('href');

            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: 'Anda akan menghapus buku dari keranjang.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: deleteUrl,
                        method: 'GET',
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Buku telah dihapus!',
                                text: 'Berhasil Menghapus Buku dari Keranjang',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function(error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal Menghapus Buku!',
                                text: 'Terjadi kesalahan saat menghapus buku dari keranjang.',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    });
                }
            });
        });
    });
</script>
=======
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0,0,256,256">
                                            <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                                <g transform="scale(8.53333,8.53333)">
                                                    <path d="M25.98047,2.99023c-0.03726,0.00118 -0.07443,0.00444 -0.11133,0.00977h-5.86914c-0.36064,-0.0051 -0.69608,0.18438 -0.87789,0.49587c-0.18181,0.3115 -0.18181,0.69676 0,1.00825c0.18181,0.3115 0.51725,0.50097 0.87789,0.49587h3.58594l-10.29297,10.29297c-0.26124,0.25082 -0.36648,0.62327 -0.27512,0.97371c0.09136,0.35044 0.36503,0.62411 0.71547,0.71547c0.35044,0.09136 0.72289,-0.01388 0.97371,-0.27512l10.29297,-10.29297v3.58594c-0.0051,0.36064 0.18438,0.69608 0.49587,0.87789c0.3115,0.18181 0.69676,0.18181 1.00825,0c0.3115,-0.18181 0.50097,-0.51725 0.49587,-0.87789v-5.87305c0.04031,-0.29141 -0.04973,-0.58579 -0.24615,-0.80479c-0.19643,-0.219 -0.47931,-0.34042 -0.77338,-0.33192zM6,7c-1.09306,0 -2,0.90694 -2,2v15c0,1.09306 0.90694,2 2,2h15c1.09306,0 2,-0.90694 2,-2v-10v-2.57812l-2,2v2.57813v8h-15v-15h8h2h0.57813l2,-2h-2.57812h-2z"></path>
                                                </g>
                                            </g>
                                        </svg>
                                    </a>
                                    <a href="<?= BASEURL; ?>/keranjang/hapus/<?= $keranjang['id_keranjang']; ?>" class="badge btn btn-danger float-right" data-id="<?= $keranjang['id_keranjang'] ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-ban" viewBox="0 0 16 16">
                                            <path d="M15 8a6.973 6.973 0 0 0-1.71-4.584l-9.874 9.875A7 7 0 0 0 15 8M2.71 12.584l9.874-9.875a7 7 0 0 0-9.874 9.874ZM16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <br><br>
            <div class="row">
                <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-primary">Pinjam</button>
                    <button type="button" class="btn btn-secondary back-button" onclick="window.history.back();">Kembali</button>
                </div>
            </div>
        </div>
    </form>
    <script>
        $(document).ready(function() {
            $('form').submit(function(event) {
                if ($('input[name="selected_books[]"]:checked').length > 0) {
                    event.preventDefault();

                    Swal.fire({
                        icon: 'success',
                        title: 'Pinjam Terpilih',
                        text: 'Peminjaman Success!',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        $('form').get(0).submit();
                    });
                }
            });
        });
    </script>
</body>

</html>
>>>>>>> d52d0a625917de2b0993269927134d44b0a8624e
