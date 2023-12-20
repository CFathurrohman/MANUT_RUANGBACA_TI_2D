$(document).ready(function() {
    $('form').submit(function(event) {
        if ($('input[name="selected_books[]"]:checked').length === 0) {
            event.preventDefault();

            Swal.fire({
                icon: 'error',
                title: 'Gagal Memasukkan Keranjang',
                text: 'Tandai buku terlebih dahulu!',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            });
        } else {
            event.preventDefault();

            Swal.fire({
                icon: 'success',
                title: 'Keranjang Success!',
                text: 'Berhasil Memasukkan Keranjang',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            }).then(() => {
                $('form').get(0).submit();
            });
        }
    });

    $('.deleteWishlist').click(function(event) {
        event.preventDefault();

        var deleteUrl = $(this).attr('href');

        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: 'Anda akan menghapus wishlist ini.',
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
                            title: 'Berhasil Menghapus Wishlist',
                            text: 'Wishlist telah dihapus.',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            location.reload();
                        });
                    },
                    error: function(error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal Menghapus Wishlist',
                            text: 'Terjadi kesalahan saat menghapus wishlist. Silakan coba lagi.',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
            }
        });
    });
});