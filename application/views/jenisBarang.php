<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
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
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <!-- Forms -->
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- jquery validation -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Form Tambah Data Jenis Barang</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <?= form_open('jenis-barang'); ?>
                  <form role="form" id="quickForm">
                    <div class="card-body row">
                      <div class="form-group col-md-12">
                        <label for="nama_jenisBarang">Nama Barang</label>
                        <input type="text" name="nama_jenisBarang" class="form-control" id="nama_jenisBarang" placeholder="Isi Nama Barang">
                      </div>
                      <div class="form-group col-md-4">
                        <label>Jenis</label>
                        <select class="form-control">
                          <option>-</option>
                          <option>Tyfo</option>
                          <option>Epoxy</option>
                        </select>
                      </div>
                      <div class="form-group col-md-4">
                        <label>Satuan</label>
                        <select class="form-control">
                          <option>-</option>
                          <option>Roll</option>
                          <option>Pail</option>
                          <option>Pcs</option>
                          <option>Bag</option>
                        </select>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="nominal_jenisBarang">Nominal Barang</label>
                        <input type="number" name="nominal_jenisBarang" class="form-control" id="nominal_jenisBarang" placeholder="Isi Nominal Barang">
                      </div>
                      <div class="form-group col-md-12 mb-0">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                          <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                <?= form_close(); ?>
              </div>
              <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
            </div>
            <!--/.col (right) -->
          </div>
          <!-- /.Forms -->

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
                        if($jenisBarangSatuan['satuan_jenisBarang'] = "roll"){
                          $satuanNominal = "Meter";
                        }elseif($jenisBarangSatuan['satuan_jenisBarang'] = "pail"){
                          $satuanNominal = "Kg";
                        }
                      $no++;
                      ?>
                      <tr>
                        <td width="5%"><?= $no ?></td>
                        <td width="35%"><?= $jenisBarangSatuan['nama_jenisBarang'] ?></td>
                        <td width="15%"><?= $jenisBarangSatuan['tag_jenisBarang'] ?></td>
                        <td width="15%"><?= $jenisBarangSatuan['satuan_jenisBarang'] ?></td>
                        <td width="15%"><?= $jenisBarangSatuan['nominal_jenisBarang']." ".$satuanNominal ?></td>
                        <td width="15%" class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="#">
                                <i class="fas fa-folder">
                                </i>
                            </a>
                            <a class="btn btn-info btn-sm" href="#">
                                <i class="fas fa-pencil-alt">
                                </i>
                            </a>
                            <a class="btn btn-danger btn-sm" href="#">
                                <i class="fas fa-trash">
                                </i>
                            </a>
                        </td>
                      </tr>
                    <?php endforeach ?>
                    </tbody>
                    <!-- <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Nama Barang/Material</th>
                        <th>Jenis</th>
                        <th>Satuan</th>
                        <th>Nominal</th>
                        <th>Action</th>
                      </tr>
                    </tfoot> -->
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
  });
</script>
<script type="text/javascript">
$(document).ready(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      nama_jenisBarang: {
        required: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      nama_jenisBarang: {
        required: "Please enter a email address",
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>


</body>
</html>
