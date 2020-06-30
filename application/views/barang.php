<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DB-Gudciska | Barang</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

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
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
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
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Barang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Barang</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <!-- Data Table -->
          <div class="row">
            <div class="col-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Tabel Data Barang</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Barang/Material</th>
                        <th>Satuan</th>
                        <th>Qty</th>
                        <th>Tgl Kadaluarsa</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $no = 0;
                      $satuanNominal = "";
                      foreach ($barang as $barangSatuan):
                        $no++;
                      ?>
                      <tr>
                        <td width="5%"><?= $no ?></td>
                        <td width="40%"><?= $barangSatuan['nama_jenisBarang'] ?></td>
                        <td width="15%"><?= $barangSatuan['satuan_jenisBarang'] ?></td>
                        <td width="15%"><?= $barangSatuan['qty_barang'] ?></td>
                        <td width="10%"><?= $barangSatuan['tgl_kadaluarsaBarang'] ?></td>
                        <td width="15%" class="project-actions text-right">
                            <a class="btn btn-info btn-sm" href="<?= site_url('barang/qr/'.$barangSatuan['id_barang']) ?>">
                                <i class="fas fa-folder">
                                </i>
                            </a>
                            <a class="btn btn-danger btn-sm" href="<?= site_url('barang/delete/'.$barangSatuan['id_barang']) ?>">
                                <i class="fas fa-trash">
                                </i>
                            </a>
                        </td>
                      </tr>
                    <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.Data Table -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->  
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

<!-- jQuery -->
<script src="<?php echo base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>/assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>/assets/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url() ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url() ?>/assets/plugins/select2/js/select2.full.min.js"></script>
<!-- jquery-validation -->
<script src="<?php echo base_url() ?>/assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url() ?>/assets/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('.select2bs4').select2({
      theme: 'bootstrap4',
    })
  });
</script>

</body>
</html>
