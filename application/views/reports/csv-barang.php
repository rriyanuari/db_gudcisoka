<?php 
  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=barang-gudang.xls");
?>
<style>
  th, td{
    text-align: center!important;
    vertical-align: middle!important;
  }
</style>

<h3 class="card-title">Database Barang Gudang Cisoka</h3>
  <table id="cetak-tabel-pud" class="table table-striped table-no-bordered table-hover" cellspacing="0" border="1">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Material</th>
        <th>Detail /tanggal </th>
        <th>Satuan</th>
        <th>Qty</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $no_jenisBarang = 0;
        foreach ($jenisBarang as $jenisBarangSatuan):
        $no_jenisBarang++;
      ?>
      <tr>
        <td><?php echo $no_jenisBarang; ?></td>
        <td><?php echo $jenisBarangSatuan['nama_jenisBarang']; ?></td>
        <td>
          <?php
            $no = 0;
            $total_qty = 0;
            $this->load->model('model_barang');
            $barang = $this->model_barang->get_barang_id_jenisBarang($jenisBarangSatuan['id_jenisBarang']);
            foreach ($barang as $barangSatuan):
              $total_qty += $barangSatuan['qty_barang'];
              $no++;
              $split_kadaluarsa = explode('-', $barangSatuan['tgl_kadaluarsaBarang']);
              $split_masuk   	  = explode('-', $barangSatuan['tgl_historyBarang']);
              $tgl_kadaluarsa = $split_kadaluarsa[2] . ' - ' . $split_kadaluarsa[1] . ' - ' . $split_kadaluarsa[0];
              $tgl_masuk = $split_masuk[2] . ' - ' . $split_masuk[1] . ' - ' . $split_masuk[0];
          ?>
          <p>
            <?= $no ?>. masuk= <?= $tgl_masuk; ?>, kadaluarsa=<?= $tgl_kadaluarsa; ?>, qty=<?= $barangSatuan['qty_barang']; ?>
          </p>
          <?php endforeach; ?>
        </td>
        <td><?php echo $jenisBarangSatuan['satuan_jenisBarang']; ?></td>
        <td><?php echo $total_qty; ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>