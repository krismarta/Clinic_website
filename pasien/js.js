var ajaxku=buatajax();
function buatajax(){
  if (window.XMLHttpRequest){
    return new XMLHttpRequest();
  }
  if (window.ActiveXObject){
    return new ActiveXObject("Microsoft.XMLHTTP");
  }
  return null;
}
function ajaxJadwal(id){
  var url="cek.php?q=querycari&id="+id;
  ajaxku.onreadystatechange=stateChanged;
  ajaxku.open("GET",url,true);
  ajaxku.send(null);
}

function stateChanged(){
  var data;
  if (ajaxku.readyState==4){
    data=ajaxku.responseText;
    if(data.length>=0){
      document.getElementById("jadwalDokter").innerHTML = data
    }else{
      document.getElementById("jadwalDokter").value = "<option selected>Pilih Kota/Kab</option>";
    }
  }
}

$(document).on("click",".delR",function(e){
        var id = $(this).attr("data-id");
        deltemp(id);
        e.preventDefault();
    });

function deltemp(id){
    swal({
      title: "Janji Akan Dibatalkan?",
      text: "Yakin Janji Akan dibatalkan ?  ...",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
            url: "hapus.php?op=hapusjanji",
            type: "GET",
            data: "id_booking="+ id,
            dataType: "json"
        })
        .done(function(response){
            swal("Berhasil", "Anda Berhasil Membatalkan Janji.","success");
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
