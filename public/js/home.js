$(document).ready(function() {
    $('.simpanWishlish').click(function(event) {
        event.preventDefault();

        $.ajax({
            url: $(this).attr('href'),
            method: 'GET',
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil Menyimpan Wishlist',
                    text: 'Buku telah ditambahkan ke wishlist.',
                    showConfirmButton: false,
                    timer: 1500
                });
            },
            error: function(error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal Menyimpan Wishlist',
                    text: 'Terjadi kesalahan saat menyimpan wishlist. Silakan coba lagi.',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
    });
});