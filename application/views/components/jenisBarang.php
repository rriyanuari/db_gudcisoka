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
      <div class="row <?= ($user['status'] == '2') ? 'd-none' : ''; ?>">
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
                <div class="row">
                  <div class="form-group col-md-12">
                    <label for="nama_jenisBarang">Nama Barang</label>
                    <input type="text" name="nama_jenisBarang" class="form-control" id="nama_jenisBarang" placeholder="Isi Nama Barang">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Satuan</label>
                    <select name="satuan_jenisBarang" id="satuan_jenisBarang" class="form-control select2bs4" style="width:100%;">
                      <option value="">-</option>
                      <option value="roll">Roll</option>
                      <option value="pail">Pail</option>
                      <option value="pcs">Pcs</option>
                      <option value="bag">Bag</option>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="nominal_jenisBarang">Nominal Barang</label>
                    <input type="text" name="nominal_jenisBarang" class="form-control" id="nominal_jenisBarang" placeholder="Isi Nominal Barang">
                  </div>
                </div>
                <button type="submit" id="tmb-add-jenisBarang" class="btn btn-primary">Submit</button>
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