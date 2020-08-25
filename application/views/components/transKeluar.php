<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Form Transaksi</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Form Transaksi</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Forms Barang Keluar -->
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <!-- card header -->
          <div class="card-header border-transparent">
            <h3 class="card-title">Form Barang Keluar</h3>
          </div>
          <!-- /.card-header -->
          <!-- card body -->
          <div class="card-body">
            <!-- Data Table -->
              <div class="row">
                <div class="col-12">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Tabel Data Barang Keluar</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="#barang_keluar" class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Barang/Material</th>
                            <th class="text-center">Tgl Masuk</th>
                            <th class="text-center">Tgl Kadaluarsa</th>
                            <th class="text-center">Quantity</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                          $no = 0;
                          foreach ($barang as $barangSatuan):
                            $no++;
                          ?>
                          <tr>
                            <td width="5%" class="text-center"><?= $no ?></td>
                            <td width="40%"><?= $barangSatuan['nama_jenisBarang'] ?></td>
                            <td width="15%" class="text-right"><?= $barangSatuan['tgl_historyBarang'] ?></td>
                            <td width="15%" class="text-center"><?= $barangSatuan['tgl_kadaluarsaBarang'] ?></td>
                            <td width="15%" class="text-center"><?= $barangSatuan['qty'] ?></td>
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

              <form role="form" id="quickForm" style="width:100%;">
                <div class="row" id="quickForm">
                  <div class="form-group col-md-12">
                    <label>Keterangan</label>
                    <input type="text" name="keterangan" class="form-control disable" id="keterangan" placeholder="Dikirimkan ke projek mana ?">
                  </div>
                </div>
                <button id="tmb-keluar" class="btn btn-primary">Submit</button>
              </form>
              <!-- </form> -->
          </div>
          <!-- /.card-body -->
          <!-- /.card-footer -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.Forms Barang Keluar -->
  </div>
</section>

