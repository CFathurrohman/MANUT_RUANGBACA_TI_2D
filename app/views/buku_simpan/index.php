<!DOCTYPE html>
<html lang="en">

<div class="transition-group">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<form action="<?= BASEURL; ?>/buku_simpan/multiPinjam" method="post">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <br>
                <h3>Daftar Buku Disimpan </h3>
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
                    <?php foreach ($data['buku'] as $buku) : ?>
                        <tr>
                            <td><?php echo $number;
                                $number++ ?></td>
                            <td><img src="<?= BASEURL; ?>/img/<?= $buku['gambar_buku']; ?>" class="card-img-top" alt="" style="width: 98px; height: 150px"></td>
                            <td><?php echo $buku['nama_buku']; ?></td>
                            <td>
                                <input type="checkbox" name="selected_books[]" value="<?= $buku['id_simpan']; ?>">
                            </td>
                            <td>
                                <a href="<?= BASEURL; ?>/buku_simpan/read/<?= $buku['id_buku']; ?>" class="badge btn btn-primary float-right" data-id="<?= $buku['id_buku'] ?>">Detail</a>
                                <a href="<?= BASEURL; ?>/buku_simpan/hapus/<?= $buku['id_simpan']; ?>" class="badge btn btn-danger float-right" data-id="<?= $buku['id_simpan'] ?>">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="row">
            <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary">Tambahkan Ke Keranjang</button>
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