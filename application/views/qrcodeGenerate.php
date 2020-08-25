<!DOCTYPE html>
<html>
<head>
  <title>DB-Gudcisoka | QR Code</title>
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/dist/css/adminlte.min.css">
  <script src="<?php echo base_url() ?>/assets/plugins/jquery/jquery-3.1.0.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/plugins/jquery/jquery.qrcode.min.js"></script>
  <script>
    function generate(x){
      $(`#output${x}`).qrcode({
        render: "canvas", 
        text: `${x}-<?= $id ?>`, 
        width: 100, 
        height: 100,
        background: "#ffffff", 
        foreground: "#000000", 
        src: '<?= base_url() ?>assets/dist/img/logo-fyfe.jpg',
        imgWidth: 36,
        imgHeight: 18
      });  
    };
  </script>

  <style>
    .container{
      width: 95%;
      padding: 15px;
      margin: 50px auto;
      border: 2px solid;
    }
    .qr{
      border: 1px solid;
    }
  </style>
</head>
<body>
  <div class="container row justify-content-left">
    <?php
      $kadaluarsaBarang = explode("-", $barangSatuan['tgl_kadaluarsaBarang']);
      $kadaluarsaBarang = $kadaluarsaBarang[1] . "/" . $kadaluarsaBarang[2];
      for($x = 1; $x <= $barangSatuan['qty_barang']; $x++): ?>
        <div class="qr col-md-2-sm-2 m-1 p-1 text-center">
          <span style="font-size:12px"><?= $x . ' | ' . $kadaluarsaBarang ?></span>
          <div id="output<?=$x?>"></div> 
        </div>
        <script>generate(<?=$x?>)</script>
    <?php endfor ?>
  </div class="row">
</body>
</html>
<script>
  window.print();
</script>
