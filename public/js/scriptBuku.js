$(document).ready(function() {

  $("#gambar_buku").change(function() {
      const file = this.files[0];
      if (file) {
          const reader = new FileReader();
          reader.onload = function(e) {
              $("#preview").attr("src", e.target.result);
          };
          reader.readAsDataURL(file);
      }
  });
  $(".tombolBukuTambahData").on("click", function () {
    $("#formBukuModalLabel").html("Tambah Data Buku");
    $(".modal-footer button[type=submit]").html("Tambah Data");

    $("#id_buku").val("");
    $("#penulis").val("");
    $("#nama_buku").val("");
    $("#gambar").val("");
    $("#tahun_terbit").val("");
    $("#jumlah_total").val("");
    $("#jumlah_tersedia").val("");
    $("#id_kategori").val("");
    $("#deskripsi").val("");
  });
  
  $(".tampilBukuModalUbah").on("click", function () {
    $("#formBukuModalLabel").html("Ubah Data Buku");
    $(".modal-footer button[type=submit]").html("Ubah Data");
    $(".modal-body form").attr(
      "action",
      "http://localhost/manut_ruangbaca_ti_2d/public/buku/ubah"
    );
    const id = $(this).data("id");

    $.ajax({
      url: "http://localhost/manut_ruangbaca_ti_2d/public/buku/getUbah",
      data: { id_buku: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#id_buku").val(data.id_buku);
        $("#penulis").val(data.penulis);
        $("#nama_buku").val(data.nama_buku);
        $("#tahun_terbit").val(data.tahun_terbit);
        $("#jumlah_total").val(data.jumlah_total);
        $("#jumlah_tersedia").val(data.jumlah_tersedia);
        $("#id_kategori").val(data.id_kategori);
        $("#deskripsi").val(data.deskripsi);
        $("#gambar").attr("src", data.gambar);
        console.log(data)
      }
    });
  });

  $("#upload-form").submit(function(e) {
    const url = $("#upload-form").prop('action');
    console.log(url);
    e.preventDefault();
    Swal.fire({
        title: 'Konfirmasi',
        text: 'Apakah Anda yakin ingin menyimpan data Buku?',
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, simpan!',
    }).then((result) => {
        if (result.isConfirmed) {
            var formData = new FormData(this);
            $.ajax({
                url: url,
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    $("#tambahBukuModal").modal("hide");
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Data Buku berhasil disimpan.',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        location.reload();
                    });
                },
                error: function(error) {
                    console.error(error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Gagal menyimpan Data Buku. Silakan coba lagi.',
                    });
                }
            });
        }
    });
  });

  // Hapus Data
  $(".deleteBuku").on("click", function(e) {
    e.preventDefault();
    const deleteUrl = $(this).attr("href");

    Swal.fire({
        title: 'Konfirmasi',
        text: 'Apakah Anda yakin ingin menghapus Data Buku?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus!',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: deleteUrl,
                method: 'GET',
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Data Buku berhasil dihapus.',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        location.reload();
                    });
                },
                error: function(error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Gagal menghapus Data Buku. Silakan coba lagi.',
                    });
                }
            });
        }
    });
  });
});