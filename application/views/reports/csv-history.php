<?php 
  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=history-gudang.xls");
?>
<style>
  th, td{
    text-align: center!important;
    vertical-align: middle!important;
  }
</style>

<h3 class="card-title">Database Barang Gudang Cisoka - History</h3>
  <table id="cetak-tabel-pud" class="table table-striped table-no-bordered table-hover" cellspacing="0" border="1">
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