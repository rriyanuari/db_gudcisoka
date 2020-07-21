<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DB-Gudciska | History Transaksi</title>
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
            <h1>History Transaksi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">History Transaksi</li>
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
                <h3 class="card-title">Tabel History</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Material</th>
                      <th>Qty</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no_jenisBarang = 0;
                    foreach ($history as $historySatuan):
                    $no_jenisBarang++;
                    ?>
                    <tr>
                      <td width="5%" class="text-center align-middle"><?= $no_jenisBarang ?></td>
                      <td width="40%" class="text-center align-middles">
                      <div class="card card-secondary collapsed-card">
                            <!-- card header -->
                            <div class="card-header border-transparent">
                              <h3 class="card-title"><?= $jenisBarangSatuan['nama_jenisBarang']; ?></h3>
                              <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                  <i class="fas fa-plus"></i>
                                </button>
                              </div>
                            </div>
                            <!-- /.card-header -->
                            <!-- card body -->
                            <div class="card-body">
                              <table class="table tabel-barang table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Tgl Masuk</th>
                                    <th class="text-center">Tgl Kadaluarsa</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-center">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                  $no = 0;
                                  $total_qty = 0;
                                  $this->load->model('model_barang');
                                  $barang = $this->model_barang->get_barang_id_jenisBarang($jenisBarangSatuan['id_jenisBarang']);
                                  foreach ($barang as $barangSatuan):
                                    $total_qty += $barangSatuan['qty_barang'];
                                    $no++;
                                    $split_kadaluarsa = explode('-', $barangSatuan['tgl_kadaluarsaBarang']);
                                    $split_masuk   	  = explode('-', $barangSatuan['tgl_masukBarang']);
                                    $tgl_kadaluarsa = $split_kadaluarsa[2] . ' - ' . $split_kadaluarsa[1] . ' - ' . $split_kadaluarsa[0];
                                    $tgl_masuk = $split_masuk[2] . ' - ' . $split_masuk[1] . ' - ' . $split_masuk[0];
                                  ?>
                                  <tr>
                                    <td width="3%"  class="text-center"><?= $no ?></td>
                                    <td width="35%" class="text-center"><?= $tgl_masuk ?></td>
                                    <td width="35%" class="text-center"><?= $tgl_kadaluarsa  ?></td>
                                    <td width="7%"  class="text-center"><?= $barangSatuan['qty_barang'] ?></td>
                                    <td width="20%" class="text-center project-actions">
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
                            <!-- /.card-footer -->
                          </div>
                      </td>
                      <td width="10%"><?= $historySatuan['qty_barang'] ?></td>
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
