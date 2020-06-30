<!DOCTYPE html>
<html>
<head>
  <title>DB-Gudcisoka | QR Code</title>
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/dist/css/adminlte.min.css">

  <style>
    .container{
      width: 85%;
      padding: 20px;
      margin: 50px auto;
      border: 2px solid;
    }
    .col{
      border: 1px solid;
    }
  </style>
</head>
<body>
  <div class="container row">
    <?php
      for($x = 1; $x <= $barangSatuan['qty_barang']; $x++): ?>
        <div class="col m-1 p-1 text-center">
          <div class="output"></div>
        </div>
    <?php endfor ?>
  </div class="row">

<script src="<?php echo base_url() ?>/assets/plugins/jquery/jquery-3.1.0.min.js"></script>
<script src="<?php echo base_url() ?>/assets/plugins/jquery/jquery.qrcode.min.js"></script>
<script>
    jQuery(function () {
        jQuery('.output').qrcode({
            render: "canvas", 
            text: '<?= $id ?>', 
            width: 70, 
            height: 70,
            background: "#ffffff", 
            foreground: "#000000", 
            src: '<?= base_url() ?>assets/dist/img/logo-fyfe.jpg',
            imgWidth: 36,
            imgHeight: 18
        });
    })
</script>
</body>
</html>