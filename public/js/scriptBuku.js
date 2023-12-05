$(function () {
  $(".tombolBukuTambahData").on("click", function () {
    $("#formBukuModalLabel").html("Tambah Data Buku");
    $(".modal-footer button[type=submit]").html("Tambah Data");
    
    $("#penulis").val('');
    $("#nama_buku").val('');
    $("#tahun_terbit").val('');
    $("#gambar_buku").val('');
    $("#id_kategori").val('');
    $("#deskripsi").val('');
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
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#penulis").val(data.penulis);
        $("#nama_buku").val(data.nama_buku);
        $("#tahun_terbit").val(data.tahun_terbit);
        $("#gambar_buku").val(data.gambar_buku);
        $("#id_kategori").val(data.id_kategori);
        $("#deskripsi").val(data.deskripsi);
        console.log(data);
      },
    });
  });
});
