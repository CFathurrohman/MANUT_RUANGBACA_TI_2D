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
    $("#gambar_buku").val("");
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
        $("#gambar_buku_preview").attr("src", data.gambar_buku);
        console.log(data)
      }
    });
  });
});
