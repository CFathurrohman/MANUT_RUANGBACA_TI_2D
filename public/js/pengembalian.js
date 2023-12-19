$(document).ready(function() {
    $("#upload-form").submit(function(e) {
        e.preventDefault();

        Swal.fire({
            title: 'Berhasil',
            text: 'Konfirmasi Pengembalian telah berhasil.',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                $("#upload-form").unbind('submit').submit();
            }
        });
    });
});