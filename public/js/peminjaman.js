$(document).ready(function() {
    $(".actionLink").on("click", function(e) {
        e.preventDefault();

        const id = $(this).data("id");
        const action = $(this).data("action");

        Swal.fire({
            title: 'Konfirmasi',
            text: 'Apakah anda yakin ' + (action === 'terima' ? 'menerima' : 'menolak') + ' pengajuan peminjaman?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Iya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?= BASEURL; ?>/peminjaman/" + action + "/" + id;
            }
        });
    });
});