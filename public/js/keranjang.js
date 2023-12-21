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