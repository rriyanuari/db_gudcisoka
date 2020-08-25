<?php 
  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=Jenis Barang-gudang.xls");
?>
<style>
  th, td{
    text-align: center!important;
    vertical-align: middle!important;
  }
</style>

<h3 class="card-title">Database Barang Gudang Cisoka - Jenis Barang</h3>
  <table id="cetak-tabel-pud" class="table table-striped table-no-bordered table-hover" cellspacing="0" border="1">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Barang/Material</th>
        <th>Satuan</th>
        <th>Nominal</th>
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
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>