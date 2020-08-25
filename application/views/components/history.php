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
                <div class="d-flex flex-row-reverse">
                  <a href="<?php echo base_url() ?>history/print"><button class="btn btn-small btn-warning m-2 mb-3"><i class="fas fa-print"></i></button></a>
                  <a href="<?php echo base_url() ?>history/download"><button class="btn btn-small btn-warning m-2 mb-3"><i class="fas fa-download"></i></button></a>
                </div>
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Material</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Qty</th>
                    <th class="text-center">Keterangan</th>
                    <th class="text-center">Tgl Transaksi</th>
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
                      <td width="25%" class="align-middle"><?= $historySatuan['nama_jenisBarang'] ?></td>
                      <td width="10%" class="text-center align-middle"><?= $historySatuan['status'] ?></td>
                      <td width="5%" class="text-center align-middle"><?= $historySatuan['qty_history'] ?></td>
                      <td width="30%" class="align-middle"><?= $historySatuan['keterangan'] ?></td>
                      <td width="15%" class="text-center align-middle"><?= $historySatuan['tgl_historyBarang'] ?></td>
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

