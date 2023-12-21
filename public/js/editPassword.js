$(document).ready(function() {
    $('#changePasswordForm').submit(function(e) {
        if ($('#newPassword').val() !== $('#confirmPassword').val()) {
            e.preventDefault();
            $('#passwordMismatch').show();
        } else {
            $('#passwordMismatch').hide();

            Swal.fire({
                title: "Sukses!",
                text: "Password berhasil diubah!",
                icon: "success",
                confirmButtonText: "OK"
            }).then(function(result) {
                if (result.isConfirmed) {
                    window.location.href = "<?= BASEURL ?>/Home";
                }
            });
        }
    });
});