 <style>

table.table td a.edit {
    color: #FFC107;
}
table.table td a.delete {
    color: #E34724;
}
table.table td a.add {
    color: #61E866;
}


</style>

<!-- jQuery -->
<script src="layoutadmin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="layoutadmin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="layoutadmin/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="layoutadmin/plugins/chart.js/Chart.min.js"></script>
<script src="layoutadmin/dist/js/demo.js"></script>
<script src="layoutadmin/dist/js/pages/dashboard3.js"></script>

<!-- DataTables -->
<script src="layoutadmin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="layoutadmin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="layoutadmin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="layoutadmin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- page script -->


<!-- jQuery UI 1.11.4 -->
<script src="layoutadmin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>


<!-- Sparkline -->
<script src="layoutadmin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="layoutadmin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="layoutadmin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="layoutadmin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="layoutadmin/plugins/moment/moment.min.js"></script>
<script src="layoutadmin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="layoutadmin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="layoutadmin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="layoutadmin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- Datepicker -->
<script src="layoutadmin/plugins/datetimepicker/jquery.datetimepicker.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="layoutadmin/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="layoutadmin/dist/js/demo.js"></script>

<!-- <script src="datepicker/js/bootstrap.min.js"></script> -->
 <script src="datepicker/js/bootstrap-datepicker.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
$("#delete").click(function(){
    if(confirm("Bạn có chắc muốn xóa?")){
        $("#delete").attr("href", "admin/tuyenxe/danhsach");
    }
    else{
        return false;
    }
});

</script>


<script>
  $("#btn-luu").click(function(){
    if(confirm("Xác nhận lưu thông tin")){
        $("#btn-luu").attr("href", "admin/tuyenxe/danhsach");
    }
    else{
        return false;
    }
});
   
</script>
<!-- <script>
  $("#btn-xoa").click(function(){
    if(confirm("Bạn chắc chắn xóa?")){
        $("#btn-xoa").attr("href", "admin/tuyenxe/danhsach");
    }
    else{
        return false;
    }
});
</script> -->

