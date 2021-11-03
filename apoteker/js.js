$(document).on("click",".btnDelO",function(e){
        var id = $(this).attr("data-id");
        deltemp(id);
        e.preventDefault();
    });

function deltemp(id){
    swal({
      title: "Obat Akan Dihapus?",
      text: "Yakin Obat Akan dihapus Permanent ?  ...",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
            url: "modal.php?op=hapusObat",
            type: "POST",
            data: "id="+ id,
            dataType: "json"
        })
        .done(function(response){
            swal("Berhasil", "Anda Berhasil Menghapus Obat","success");
            location.reload();
        })
        .fail(function(){
            swal("Oops...", "Sepertinya Ada yang salah", "error");
        });
      } else {
        swal("Dibatalkan","","info");
      }
    });
}

$(document).on("click",".btnSelesai",function(e){
        var id = $(this).attr("data-id");
        selesaikan(id);
        e.preventDefault();
    });

function selesaikan(id){
    swal({
      title: "Sudah Diberikan Obat ? ",
      text: "Ucapkan Terimakasih Kepada Pasien :D",
      icon: "info",
      buttons: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
            url: "modal.php?op=selesaikanPasien",
            type: "POST",
            data: "id="+ id,
            dataType: "json"
        })
        .done(function(response){
            swal("Berhasil", "Terimakasih.","success");
            function timeRefresh(timeoutPeriod) {
              setTimeout("location.reload(true);", timeoutPeriod);
            }
            timeRefresh(2000);
        })
        .fail(function(){
            swal("Oops...", "Sepertinya Ada yang salah", "error");
        });
      } else {
        swal("Ada Apa?","","info");
      }
    });
}

$(document).ready(function(){
    $('#editObat').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type : 'POST',
            url : 'modal.php?op=editObat',
            data :  'id='+ rowid,
            success : function(data){
            $('.fetch').html(data);//menampilkan data ke dalam modal
            }
        });
     });
});

$(document).ready(function(){
    $('#spekObat').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type : 'post',
            url : 'modal.php?op=lihatData',
            data :  'id='+ rowid,
            success : function(data){
            $('.fetchs').html(data);//menampilkan data ke dalam modal
            }
        });
     });
});
