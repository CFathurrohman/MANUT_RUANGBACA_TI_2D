$(document).ready(function() {
    $('#changePasswordForm').submit(function(e) {
        e.preventDefault();

        if ($('#newPassword').val() !== $('#confirmPassword').val()) {
            $('#passwordMismatch').show();
        } else {
            $('#passwordMismatch').hide();

            setTimeout(function() {
                Swal.fire({
                    title: "Sukses!",
                    text: "Password berhasil diubah!",
                    icon: "success",
                    confirmButtonText: "OK"
                }).then(function(result) {
                    if (result.isConfirmed) {
                        // Konfirmasi pengembalian formulir setelah pengguna mengklik OK
                        $('#changePasswordForm').unbind('submit').submit();
                    }
                });
            }, 2000);
        }
    });
});
