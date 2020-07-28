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
    <!-- Forms Barang Masuk -->
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <!-- card header -->
          <div class="card-header border-transparent">
            <h3 class="card-title">Form Barang Masuk</h3>
            <!-- <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-plus"></i>
              </button>
            </div> -->
          </div>
          <!-- /.card-header -->
          <!-- card body -->
          <div class="card-body">
            <?= validation_errors() ?>
            <?= form_open('transaksi-masuk/proses'); ?>
            <form role="form" id="quickForm" style="width:100%;">
              <div class="row">
                <div class="form-group col-md-12">
                  <label>Nama Barang</label>
                    <select name="namaBarang" class="form-control select2bs4" style="width:100%;">
                      <option selcted="selected" value="">Nama Barang...</option>
                      <?php foreach ($jenisBarang as $jenisBarangSatuan): ?>
                        <option value="<?= $jenisBarangSatuan['id_jenisBarang'] ?>"><?= $jenisBarangSatuan['nama_jenisBarang'] ?></option>
                      <?php endforeach ?>
                    </select>
                </div>

                <div class="form-group col-md-6">
                  <label for="qty_barang">Quantity Barang</label>
                  <input type="number" name="qty_barang" class="form-control" id="qty_barang" placeholder="Isi Quantity Barang...">
                </div>
                <div class="form-group col-md-6">
                  <label>Tanggal kadaluarsa:</label>
                  <div class="input-group date date_formTransaksi" id="reservationdate1" data-target-input="nearest">
                    <input type="text" name="tgl_kadaluarsa" class="form-control datetimepicker-input" data-target="#reservationdate1"/>
                    <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
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
  </div>
</section>