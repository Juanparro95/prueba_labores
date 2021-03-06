
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo PLUGINS?>jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo PLUGINS?>bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo PLUGINS?>datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo PLUGINS?>datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo PLUGINS?>datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo PLUGINS?>datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo PLUGINS?>datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo PLUGINS?>datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo PLUGINS?>jszip/jszip.min.js"></script>
<script src="<?php echo PLUGINS?>pdfmake/pdfmake.min.js"></script>
<script src="<?php echo PLUGINS?>pdfmake/vfs_fonts.js"></script>
<script src="<?php echo PLUGINS?>datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo PLUGINS?>datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo PLUGINS?>datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo DIST?>js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo DIST?>js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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
</body>
</html>