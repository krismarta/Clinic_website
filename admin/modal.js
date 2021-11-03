$(document).on("click",".btnCheck",function(e){
        var id = $(this).attr("data-id");
        checkPasien(id);
        e.preventDefault();
    });

function checkPasien(id){
    swal({
      title: "Apakah Pasien Sudah Datang ?",
      text: "Klik OK!, Dan Pasien Silahkan Memasuki Ruangan.",
      icon: "info",
      buttons: true,
     
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
            url: "modal.php?op=CekPasien",
            type: "GET",
            data: "id="+ id,
            dataType: "json"
        })
        .done(function(response){
            swal("Berhasil", "Pasien Diperbolehkan Masuk.","success");
            function timeRefresh(timeoutPeriod) {
              setTimeout("location.reload(true);", timeoutPeriod);
            }
            timeRefresh(2000);
        })
        .fail(function(){
            swal("Oops...", "Sepertinya Ada yang salah", "error");
        });
      } else {
        swal("Ada Apa ?","","info");
      }
    });
}

$(document).on("click",".btnCancel",function(e){
        var id = $(this).attr("data-id");
        batalkanPasien(id);
        e.preventDefault();
    });

function batalkanPasien(id){
    swal({
      title: "Apakah ingin Membatalkan Bookingan Pasien ?",
      text: "Klik OK! Jika Anda Yakin.",
      icon: "info",
      buttons: true,
     
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
            url: "modal.php?op=BookingCancel",
            type: "GET",
            data: "id="+ id,
            dataType: "json"
        })
        .done(function(response){
            swal("Berhasil", "Bookingan Pasien Dibatalkan.","success");
            location.reload();
        })
        .fail(function(){
            swal("Oops...", "Sepertinya Ada yang salah", "error");
        });
      } else {
        swal("Ada Apa ?","","info");
      }
    });
}

$(document).ready(function(){
    $('#lihatData').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type : 'post',
            url : 'modal.php?op=lihatData',
            data :  'id='+ rowid,
            success : function(data){
            $('.fetch').html(data);//menampilkan data ke dalam modal
            }
        });
     });
});
