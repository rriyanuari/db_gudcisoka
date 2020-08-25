<html>
  <head>
    <title>Instascan &ndash; Demo</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/scanner/style.css">
    <script type="text/javascript" src="<?php echo base_url() ?>assets/scanner/js/adapter.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/scanner/js/vue.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/scanner/js/instascan.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/scanner/js/jquery-2.0.3.min.js"></script>
  </head>
  <body>
    <div id="app">
      <div class="sidebar">
        <section class="cameras">
          <h2>Cameras</h2>
          <ul>
            <li v-if="cameras.length === 0" class="empty">No cameras found</li>
            <li v-for="camera in cameras">
              <span v-if="camera.id == activeCameraId" :title="formatName(camera.name)" class="active">{{ formatName(camera.name) }}</span>
              <span v-if="camera.id != activeCameraId" :title="formatName(camera.name)">
                <a @click.stop="selectCamera(camera)">{{ formatName(camera.name) }}</a>
              </span>
            </li>
          </ul>
        </section>
        <section class="scans">
          <h2>Scans</h2>
          <ul v-if="scans.length === 0">
            <li class="empty">No scans yet</li>
          </ul>
          <transition-group name="scans" tag="ul">
            <li v-for="scan in scans" :key="scan.date" :value="scan.content"><input type="text" :value="scan.content" id="hasilscan" hidden />{{ scan.content }}</li>
          </transition-group>
        </section>
        <div id="autoSave"></div>

        <section class>
          <h2>Daftar Barang <?=$id_transaksi?></h2>
          <ul id="show_data"></ul>
        </section>
      </div>
      <div class="preview-container">
        <video id="preview" style="height: 90%;"></video>
      </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/scanner/app.js"></script>
    <!--<script src="js/save.js"></script>-->
    <script type="text/javascript">
      $(document).ready(function(){
            function autoSave()  
            {
              var scan_pic = $('#hasilscan').val();  
              var id_transaksi = <?= $id_transaksi ?>;  
              $.ajax({  
                method:"GET",  
                url:"<?=base_url()?>transaksi-keluar/scan",
                dataType:"text",  
                data:{
                  scan: scan_pic,
                  id_transaksi : id_transaksi, 
                },  
                success: function(msg) {  
                  if (msg == 'sukses'){
                    $('#autoSave').text("SUKSES");  
                    setInterval(function(){  
                      $('#autoSave').text('');  
                    }, 500);
                  } else if(msg = 'gagal'){
                    $('#autoSave').text("");
                  }
                }  
              });         
            }
            function autoGetBarang()  
            {
              var id_transaksi = <?= $id_transaksi ?>;  
              $.ajax({  
                type  : 'ajax',
                method: 'GET',
                url   : '<?php echo site_url('transaksi-keluar/scan-get-barang')?>',
                async : true,
                dataType : 'json',
                data:{
                  id_transaksi : id_transaksi, 
                },  
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<li>'+data[i].nama_jenisBarang+'('+data[i].tgl_kadaluarsaBarang+')</li>';
                    }
                    if(i > 0){
                      var link = `<?=base_url()?>transaksi-keluar/proses/${id_transaksi}`
                      html += `<div><a href="${link}"><button> Submit </button></a></div>`;
                    }
                    $('#show_data').html(html);
                }
              });         
            }  
  
        setInterval(function(){   
          autoSave(); 
          autoGetBarang();
          }, 500);
        });
    </script>
  </body>
</html>
