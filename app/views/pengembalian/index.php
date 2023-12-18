<div class="transition-group">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="container mt-5">
    <div class="row">
        <div class="col-12"><br>
            <h3>Pengembalian Buku</h3><br>
            <hr style="height: 1px;color: black;background-color: black;">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php //Flasher::flashPeminjaman(); 
            ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-12 d-flex justify-content-end">
            <form action="<?= BASEURL; ?>/riwayat/cari" method="post" class="d-flex">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Nama Anggota" name="keyword" id="keyword" autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" id="tombolCari">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-white">
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>No. Telepon</th>
                    <th>NIM/NIP</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Batas Pengembalian</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $number = 1 ?>
                <?php foreach ($data['buku'] as $pengembalian) : ?>
                    <tr>
                        <td><?php echo $number;
                            $number++ ?></td>
                        <td><?php echo $pengembalian['nama']; ?></td>
                        <td><?php echo $pengembalian['no_telp']; ?></td>
                        <td><?php echo $pengembalian['id_anggota']; ?></td>
                        <td><?php echo $pengembalian['tgl_pengajuan']; ?></td>
                        <td><?php echo $pengembalian['tgl_pinjam']; ?></td>
                        <td><?php echo $pengembalian['tgl_batas_kembali']; ?></td>
                        <td><?php echo $pengembalian['status']; ?></td>
                        <td>
                            <a href="<?= BASEURL; ?>/pengembalian/read/<?= $pengembalian['id_peminjaman']; ?>" class="badge btn btn-primary float-right" data-id="<?= $pengembalian['id_peminjaman'] ?>">Detail</a>
                            <a href="<?= BASEURL; ?>/pengembalian/kembali/<?= $pengembalian['id_peminjaman']; ?>" class="badge btn btn-success float-right actionLink" data-id="<?= $pengembalian['id_peminjaman'] ?>">Terima</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".actionLink").on("click", function(e) {
            e.preventDefault();

            const id = $(this).data("id");

            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah anda yakin menerima pengembalian peminjaman?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "<?= BASEURL; ?>/pengembalian/kembali/" + id;
                }
            });
        });
    });
</script>