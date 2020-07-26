<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DB-Gudcisoka | Jenis Barang</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- PLUGIN -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/plugins/daterangepicker/daterangepicker.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- /.PLUGIN -->
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
      <?php $this->load->view('components/navbar.php'); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
      <?php $this->load->view('components/sidebar.php'); ?>
    <!-- /.Main Sidebar Container -->

    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <?php $this->load->view('components/'.$file.'.php'); ?>
      </div>
    <!-- /.content-wrapper -->

    <!-- Footer -->
      <?php $this->load->view('components/footer.php'); ?>
    <!-- /.Footer -->

    <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
    <!-- /.control-sidebar -->
  </div>
<!-- ./wrapper -->

<!-- SCRIPT -->
  <!-- jQuery -->
  <script src="<?php echo base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url() ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url() ?>/assets/dist/js/adminlte.min.js"></script>
  <!-- DataTables -->
  <script src="<?php echo base_url() ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <!-- Select2 -->
  <script src="<?php echo base_url() ?>/assets/plugins/select2/js/select2.full.min.js"></script>
  <!-- InputMask -->
  <script src="<?php echo base_url() ?>/assets/plugins/moment/moment.min.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?php echo base_url() ?>/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- jquery-validation -->
  <script src="<?php echo base_url() ?>/assets/plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/plugins/jquery-validation/additional-methods.min.js"></script>
  <!-- page script -->
  <script>
    $(function () {
      $(".table").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('.select2bs4').select2({
        theme: 'bootstrap4',
      });
      $('.date_formTransaksi').datetimepicker({
        format: 'YYYY-MM-DD',
      });
    });
  </script>
<!-- /.SCRIPT -->

</body>
</html>
