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
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo PLUGINS?>jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo PLUGINS?>bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo PLUGINS?>chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo PLUGINS?>sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo PLUGINS?>jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo PLUGINS?>jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo PLUGINS?>jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo PLUGINS?>moment/moment.min.js"></script>
<script src="<?php echo PLUGINS?>daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo PLUGINS?>tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo PLUGINS?>summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo PLUGINS?>overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo DIST?>js/adminlte.js"></script>
<!-- WaitMe -->
<script src="<?php echo PLUGINS?>waitMe/waitMe.min.js"></script>
<!-- toastr js -->
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo DIST?>js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo DIST?>js/pages/dashboard.js"></script>
<!-- JS -->
<script>
var url = "<?php echo URL; ?>"
</script>

<script src="<?php echo JS."GlobalFunctions.js"; ?>"></script>
<script src="<?php echo JS.$d->js?>"></script>
</body>

</html>