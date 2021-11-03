      <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
         <!-- /.container-fluid -->
          </div>
            <footer class="footer text-center"> <?=date('Y')?> &copy; <?=$nama_web?> ALL RIGHTS RESERVED. </footer>
        </div>
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="<?=base_url('base/')?>plugins/bower_components/jquery/dist/jquery.min.js"></script>
    
    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url('base/dashboard/')?>bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="<?=base_url('base/')?>plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="<?=base_url('base/dashboard/')?>js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?=base_url('base/dashboard/')?>js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url('base/dashboard/')?>js/custom.min.js"></script>
    <script src="<?=base_url('admin/modal.js')?>"></script>
    <!-- wysuhtml5 Plugin JavaScript -->
    <script src="<?=base_url('base/')?>plugins/bower_components/html5-editor/wysihtml5-0.3.0.js"></script>
    <script src="<?=base_url('base/')?>plugins/bower_components/html5-editor/bootstrap-wysihtml5.js"></script>
    <script src="<?=base_url('base/')?>plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
   <script>
     $(document).ready(function() {
        $('#tbindex').DataTable({
            "ordering" :false,
            "language" : {
                "url" : "http://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json",
                "sEmptyTable" : "Belum Ada Data",
            },

        });
        $('#example23').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "ordering" : false,
            "language" : {
                "url" : "http://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json",
                "sEmptyTable" : "Belum Ada Data",
            },

        });

    });
    </script>

    <!--Style Switcher -->
    <script src="<?=base_url('base/')?>plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
    
    <?php 
if (isset($_SESSION['pesan_error'])) { ?>
  <script type="text/javascript">swal("Opps !","<?=$_SESSION['pesan_error'];?>","error");</script>
  <?php
  unset($_SESSION['pesan_error']);
}elseif (isset($_SESSION['pesan_info'])) {?>
  <script type="text/javascript">swal("Info","<?=$_SESSION['pesan_info'];?>","info");</script>
  <?php
  unset($_SESSION['pesan_info']);
}elseif (isset($_SESSION['pesan_success'])) {?>
  <script type="text/javascript">swal("Yeayyy","<?=$_SESSION['pesan_success'];?>","success");</script>
  <?php
  unset($_SESSION['pesan_success']);
}?>
 <script>
    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))
 
        return false;
      return true;
    }
  </script>
      <script>
    $(document).ready(function() {
        $('.tentang_content').wysihtml5();
        $('.tentang_misi').wysihtml5();
        $('.tentang_visi').wysihtml5();
    });

    </script>

</body>

</html>
