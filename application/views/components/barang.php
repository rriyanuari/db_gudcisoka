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
                <table class="table tabel-barang table-bordered table-hover">
                  <div class="d-flex flex-row-reverse">
                    <a href="<?php echo base_url() ?>barang/print"><button class="btn btn-small btn-warning m-2 mb-3"><i class="fas fa-print"></i></button></a>
                    <a href="<?php echo base_url() ?>barang/download"><button class="btn btn-small btn-warning m-2 mb-3"><i class="fas fa-download"></i></button></a>
                  </div>
                  <thead>
                    <tr>
                      <th class="text-center">No</th>
                      <th class="text-center">Nama Material</th>
                      <th class="text-center">Satuan</th>
                      <th class="text-center">Qty</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no_jenisBarang = 0;
                    $total_qty_3  = 0;
                    $total_qty_2 = 0;
                    foreach ($jenisBarang as $jenisBarangSatuan):
                      $no_jenisBarang++;
                      $total_qty_3  += $total_qty_2;
                    ?>
                    <tr>
                      <td width="5%" class="text-center align-middle"><?= $no_jenisBarang ?></td>
                      <td width="75%" class="align-middle">
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
                                <th class="text-center <?= ($user['status'] == '2') ? 'd-none' : ''; ?>">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                              $no = 0;
                              $total_qty_2 = 0;
                              $this->load->model('model_barang');
                              $barang = $this->model_barang->get_barang_id_jenisBarang($jenisBarangSatuan['id_jenisBarang']);
                              foreach ($barang as $barangSatuan):
                                $total_qty_2 += $barangSatuan['qty_barang'];
                                $no++;
                                $split_kadaluarsa = explode('-', $barangSatuan['tgl_kadaluarsaBarang']);
                                $split_masuk   	  = explode('-', $barangSatuan['tgl_historyBarang']);
                                $tgl_kadaluarsa = $split_kadaluarsa[2] . ' - ' . $split_kadaluarsa[1] . ' - ' . $split_kadaluarsa[0];
                                $tgl_masuk = $split_masuk[2] . ' - ' . $split_masuk[1] . ' - ' . $split_masuk[0];
                              ?>
                              <tr>
                                <td width="3%"  class="text-center"><?= $no ?></td>
                                <td width="35%" class="text-center"><?= $tgl_masuk ?></td>
                                <td width="35%" class="text-center"><?= $tgl_kadaluarsa  ?></td>
                                <td width="7%"  class="text-center"><?= $barangSatuan['qty_barang'] ?></td>
                                <td width="20%" class="text-center project-actions <?= ($user['status'] == '2') ? 'd-none' : ''; ?>">
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
                      <td width="10%" class="text-center align-middle"><?= $jenisBarangSatuan['satuan_jenisBarang'] ?></td>
                      <td width="10%" class="text-center align-middle"><?= $total_qty_2 ?></td>
                    </tr>
                  <?php endforeach ?>
                  </tbody>
                </table>
                <span><?=$total_qty_3?></span>
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