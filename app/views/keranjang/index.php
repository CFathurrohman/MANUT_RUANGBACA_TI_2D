<!DOCTYPE html>
<html lang="en">

<div class="transition-group">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
</div>

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
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-white">
                    <tr>
                        <th>No.</th>
                        <th>Gambar Buku</th>
                        <th>Nama</th>
                        <th>Tandai</th>
                        <th>Aksi</th>
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
                                <a href="<?= BASEURL; ?>/keranjang/read/<?= $keranjang['id_buku']; ?>" class="badge btn btn-primary float-right" data-id="<?= $keranjang['id_buku'] ?>">Detail</a>
                                <a href="<?= BASEURL; ?>/keranjang/hapus/<?= $keranjang['id_keranjang']; ?>" class="badge btn btn-danger float-right" data-id="<?= $keranjang['id_keranjang'] ?>">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="row">
            <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary">Pinjam</button>
                <button type="button" class="btn btn-secondary back-button" onclick="window.history.back();">Kembali</button>
            </div>
        </div>
    </div>
</form>
<script>
    $(document).ready(function () {
        $('form').submit(function (event) {
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