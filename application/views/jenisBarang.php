<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DB-Gudcisoka | Jenis Barang</title>
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
            <h1>Jenis Barang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Jenis Barang</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Form Jenis Barang -->
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary collapsed-card">
              <!-- card header -->
              <div class="card-header border-transparent">
                <h3 class="card-title">Form Tambah Data Jenis Barang</h3>
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
                      <label for="nama_jenisBarang">Nama Barang</label>
                      <input type="text" name="nama_jenisBarang" class="form-control" id="nama_jenisBarang" placeholder="Isi Nama Barang">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Jenis</label>
                      <select name="tag_jenisBarang" class="form-control select2bs4" style="width:100%;">
                        <option value="" selected="selected">-</option>
                        <option value="tyfo">Tyfo</option>
                        <option value="epoxy">Epoxy</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Satuan</label>
                      <select name="satuan_jenisBarang" class="form-control select2bs4" style="width:100%;">
                        <option value="">-</option>
                        <option value="roll">Roll</option>
                        <option value="pail">Pail</option>
                        <option value="pcs">Pcs</option>
                        <option value="bag">Bag</option>
                      </select>
                    </div>
                    <div class="form-group col-md-12">
                      <label for="nominal_jenisBarang">Nominal Barang</label>
                      <input type="number" name="nominal_jenisBarang" class="form-control" id="nominal_jenisBarang" placeholder="Isi Nominal Barang">
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
        <!-- /.Forms Jenis Barang -->

        <!-- Data Table -->
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tabel Data Jenis Barang</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Barang/Material</th>
                      <th>Jenis</th>
                      <th>Satuan</th>
                      <th>Nominal</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 0;
                    $satuanNominal = "";
                    foreach ($jenisBarang as $jenisBarangSatuan):
                      if($jenisBarangSatuan['satuan_jenisBarang'] == "roll"){
                        $satuanNominal = "Meter";
                    }elseif($jenisBarangSatuan['satuan_jenisBarang'] == "pail" || "Bag"){
                        $satuanNominal = "Kg";
                      }
                    $no++;
                    ?>
                    <tr>
                      <td width="5%"><?= $no ?></td>
                      <td width="40%"><?= $jenisBarangSatuan['nama_jenisBarang'] ?></td>
                      <td width="15%"><?= $jenisBarangSatuan['tag_jenisBarang'] ?></td>
                      <td width="15%"><?= $jenisBarangSatuan['satuan_jenisBarang'] ?></td>
                      <td width="15%"><?= $jenisBarangSatuan['nominal_jenisBarang']." ".$satuanNominal ?></td>
                      <td width="10%" class="project-actions text-right">
                          <a class="btn btn-info btn-sm" href="#">
                              <i class="fas fa-pencil-alt">
                              </i>
                          </a>
                          <a class="btn btn-danger btn-sm" href="<?= site_url('jenis-barang/delete/'.$jenisBarangSatuan['id_jenisBarang']) ?>">
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
