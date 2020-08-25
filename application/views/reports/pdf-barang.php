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
                    <h3 class="card-title">Tabel Data Jenis Barang</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                      <div class="d-flex flex-row-reverse">
                        <a href="<?php echo base_url() ?>jenis-barang/print"><button class="btn btn-small btn-warning m-2 mb-3"><i class="fas fa-print"></i></button></a>
                        <a href="<?php echo base_url() ?>jenis-barang/download"><button class="btn btn-small btn-warning m-2 mb-3"><i class="fas fa-download"></i></button></a>
                      </div>

                      <thead>
                        <tr>
                          <th class="text-center">No</th>
                          <th class="text-center">Nama Barang/Material</th>
                          <th class="text-center">Satuan</th>
                          <th class="text-center">Nominal</th>
                          <th class="text-center <?= ($user['status'] == '2') ? 'd-none' : ''; ?>">Action</th>
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
                          <td width="5%" class="text-center"><?= $no ?></td>
                          <td width="40%"><?= $jenisBarangSatuan['nama_jenisBarang'] ?></td>
                          <td width="15%" class="text-center"><?= $jenisBarangSatuan['satuan_jenisBarang'] ?></td>
                          <td width="15%" class="text-right"><?= $jenisBarangSatuan['nominal_jenisBarang']." ".$satuanNominal ?></td>
                          <td width="10%" class="project-actions text-center <?= ($user['status'] == '2') ? 'd-none' : ''; ?>">
                              <!-- <a class="btn btn-info btn-sm" href="#">
                                  <i class="fas fa-pencil-alt">
                                  </i>
                              </a> -->
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
</div>
<!-- ./wrapper -->

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
<!-- page script -->
<script>
  window.print();
</script>

</body>
</html>
