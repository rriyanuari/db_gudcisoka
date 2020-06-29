<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DB-Gudcisoka | Form Transaksi</title>
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
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/plugins/daterangepicker/daterangepicker.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
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
            <h1>Data Barang Masuk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Data Barang Masuk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <!-- Forms Barang Masuk -->
          <div class="row">
            <div class="col-md-12">
              <div class="card card-primary collapsed-card">
                <!-- card header -->
                <div class="card-header border-transparent">
                  <h3 class="card-title">Form Barang Masuk</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-plus"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <!-- card body -->
                <div class="card-body">
                  <?= validation_errors() ?>
                  <?= form_open('jenis-barang'); ?>
                  <form role="form" id="quickForm" style="width:100%;">
                    <div class="row">
                      <div class="form-group col-md-12">
                        <label>Nama Barang</label>
                          <select name="namaBarang" class="form-control select2bs4" style="width:100%;">
                            <option selcted="selected" value="">Nama Barang...</option>
                            <?php foreach ($jenisBarang as $jenisBarangSatuan): ?>
                              <option value="<?= $jenisBarangSatuan['nama_jenisBarang'] ?>"><?= $jenisBarangSatuan['nama_jenisBarang'] ?></option>
                            <?php endforeach ?>
                          </select>
                      </div>

                      <div class="form-group col-md-6">
                        <label for="qty_barang">Quantity Barang</label>
                        <input type="number" name="qty_barang" class="form-control" id="qty_barang" placeholder="Isi Quantity Barang...">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Date:</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                          <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                  <?= form_close(); ?>
                </div>
                <!-- /.card-body -->
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.Forms Barang Masuk -->

          <!-- Forms Barang Keluar -->
          <div class="row">
            <div class="col-md-12">
              <div class="card card-danger collapsed-card">
                <!-- card header -->
                <div class="card-header border-transparent">
                  <h3 class="card-title">Form Barang Keluar</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-plus"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <!-- card body -->
                <div class="card-body">
                  <?= validation_errors() ?>
                  <?= form_open('jenis-barang'); ?>
                  <form role="form" id="quickForm" style="width:100%;">
                    <div class="row">
                      <div class="form-group col-md-12">
                        <label>Nama Barang</label>
                          <select name="namaBarang" class="form-control select2bs4" style="width:100%;">
                            <option selcted="selected" value="">Nama Barang...</option>
                            <?php foreach ($jenisBarang as $jenisBarangSatuan): ?>
                              <option value="<?= $jenisBarangSatuan['nama_jenisBarang'] ?>"><?= $jenisBarangSatuan['nama_jenisBarang'] ?></option>
                            <?php endforeach ?>
                          </select>
                      </div>

                      <div class="form-group col-md-6">
                        <label for="qty_barang">Quantity Barang</label>
                        <input type="number" name="qty_barang" class="form-control" id="qty_barang" placeholder="Isi Quantity Barang...">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Date:</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                          <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-danger">Submit</button>
                  </form>
                  <?= form_close(); ?>
                </div>
                <!-- /.card-body -->
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.Forms Barang Keluar -->

          <!-- Forms Barang Return -->
          <div class="row">
            <div class="col-md-12">
              <div class="card card-success collapsed-card">
                <!-- card header -->
                <div class="card-header border-transparent">
                  <h3 class="card-title">Form Barang Return</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-plus"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <!-- card body -->
                <div class="card-body">
                  <?= validation_errors() ?>
                  <?= form_open('jenis-barang'); ?>
                  <form role="form" id="quickForm" style="width:100%;">
                    <div class="row">
                      <div class="form-group col-md-12">
                        <label>Nama Barang</label>
                          <select name="namaBarang" class="form-control select2bs4" style="width:100%;">
                            <option selcted="selected" value="">Nama Barang...</option>
                            <?php foreach ($jenisBarang as $jenisBarangSatuan): ?>
                              <option value="<?= $jenisBarangSatuan['nama_jenisBarang'] ?>"><?= $jenisBarangSatuan['nama_jenisBarang'] ?></option>
                            <?php endforeach ?>
                          </select>
                      </div>

                      <div class="form-group col-md-6">
                        <label for="qty_barang">Quantity Barang</label>
                        <input type="number" name="qty_barang" class="form-control" id="qty_barang" placeholder="Isi Quantity Barang...">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Date:</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                          <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                  </form>
                  <?= form_close(); ?>
                </div>
                <!-- /.card-body -->
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.Forms Barang Return -->
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
<!-- InputMask -->
<script src="<?php echo base_url() ?>/assets/plugins/moment/moment.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url() ?>/assets/plugins/select2/js/select2.full.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url() ?>/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
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
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4',
    });
    //Date range picker
    $('#reservationdate').datetimepicker({
      format: 'L'
    });
  });
</script>
</body>
</html>
