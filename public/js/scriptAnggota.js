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
})  
