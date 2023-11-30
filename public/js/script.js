$(function () {

    //Tambah Data 
  $(".tombolTambahData").on("click", function () {

    $("#formModalLabel").html("Tambah Data Anggota");
    $(".modal-footer button[type=submit]").html("Tambah Data");
    $("#id").show();
    $("#label_id").show();

  });
  
  //Ubah Data
  $(".tampilModalUbah").on("click", function () {

    $("#formModalLabel").html("Ubah Data Anggota");
    $(".modal-footer button[type=submit]").html("Ubah Data");
    $(".modal-body form").attr("action", "http://localhost/manut_ruangbaca_ti_2d/public/anggota/ubah");
    $("#id").hide();
    $("#label_id").hide();
    const id = $(this).data('id');

    $.ajax({
        url: 'http://localhost/manut_ruangbaca_ti_2d/public/anggota/getubah',
        data: {id : id},
        method: 'post',
        dataType: 'json',    
        success: function (data) {
            $("#nama").val(data.nama);
            $("#id").val(data.id);
            $("#no_telp").val(data.no_telp);
            $("#status").val(data.status);
            $("#id_user").val(data.id_user);
            console.log(data);
        }
    });

  });

});
