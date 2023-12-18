$(document).ready(function () {
  // Tambah Data
  $(".tombolTambahData").on("click", function () {
    $("#formModalLabel").html("Tambah Data Anggota");
    $(".modal-footer button[type=submit]").html("Tambah Data");
    $("#id_anggota").show();
    $("#label_id").show();

    $("#nama").val('');
    $("#id_anggota").val('');
    $("#no_telp").val('');
    $("#status").val('');
    $("#id_user").val('');
  });

  // Ubah Data
  $(".tampilModalUbah").on("click", function () {
    $("#formModalLabel").html("Ubah Data Anggota");
    $(".modal-footer button[type=submit]").html("Ubah Data");
    $(".modal-body form").attr(
      "action",
      "http://localhost/manut_ruangbaca_ti_2d/public/anggota/ubah"
    );
    $("#id_anggota").hide();
    $("#label_id").hide();
    const id = $(this).data("id");
  
    $.ajax({
      url: "http://localhost/manut_ruangbaca_ti_2d/public/anggota/getubah",
      data: { id_anggota: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#nama").val(data.nama);
        $("#no_telp").val(data.no_telp);
        $("#id_anggota").val(data.id_anggota);
        $("#status").val(data.status);
        $("#id_user").val(data.id_user);
        console.log(data);
      },
    });
  }); 

  // Simpan Data Tambah dan Ubah
  $(".modal-footer button[type=submit]").on("click", function (e) {
    e.preventDefault(); 
    const form = $(".modal-body form");
    const simpanUrl = form.attr("action");

    if (form[0].checkValidity()) {
      $.ajax({
        url: simpanUrl,
        method: form.attr("method"),
        data: form.serialize(),
        success: function (data) {
          Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Data Anggota berhasil disimpan.',
            showConfirmButton: false,
            timer: 2000,
          }).then(function() {
            location.reload();
          });
        },
        error: function (error) {
          Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: 'Gagal menyimpan data Anggota.',
            showConfirmButton: true,
          });
        }
      });
    } else {
      Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: 'Isikan data terlebih dahulu!',
        showConfirmButton: true,
      });
    }
  });

  // Hapus Data
  $(".deleteAnggota").on("click", function(e) {
    e.preventDefault();
    const deleteUrl = $(this).attr("href");

    Swal.fire({
        title: 'Konfirmasi',
        text: 'Apakah Anda yakin ingin menghapus Anggota?',
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
                        text: 'Anggota berhasil dihapus.',
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
                        text: 'Gagal menghapus Anggota. Silakan coba lagi.',
                    });
                }
            });
        }
    });
  });
});