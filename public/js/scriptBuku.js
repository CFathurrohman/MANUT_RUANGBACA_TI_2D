$(function () {
  $(".tombolBukuTambahData").on("click", function () {
    $("#formBukuModalLabel").html("Tambah Data Buku");
    $(".modal-footer button[type=submit]").html("Tambah Data");

    $("#penulis").val("");
    $("#nama_buku").val("");
    $("#tahun_terbit").val("");
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
          $("#id_kategori").val(data.id_kategori);
          $("#deskripsi").val(data.deskripsi);
      }
    });
  });
});
