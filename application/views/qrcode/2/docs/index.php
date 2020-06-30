<html>
  <head>
    <title>Instascan &ndash; Demo</title>
    <link rel="icon" type="image/png" href="favicon.png">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="js/adapter.min.js"></script>
    <script type="text/javascript" src="js/vue.min.js"></script>
    <script type="text/javascript" src="js/instascan.min.js"></script>
    <script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
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
      </div>
      <div class="preview-container">
        <video id="preview" style="height: 90%;"></video>
      </div>
    </div>
    <script type="text/javascript" src="app.js"></script>
    <!--<script src="js/save.js"></script>-->
    <script type="text/javascript">
      $(document).ready(function(){
            function autoSave()  
            {
            var scan_pic = $('#hasilscan').val();  
              $.ajax({  
                   url:"save_scan.php",  
                   method:"GET",  
                   data:{scan:scan_pic},  
                   dataType:"text",  
                   success:function(msg) {  
                    if (msg == 'sukses'){
                      $('#autoSave').text("SUKSES");  
                      setInterval(function(){  
                        $('#autoSave').text('');  
                      }, 500);
                    } else {
                      $('#autoSave').text("_");
                    }
                   }  
              });         
            }  
        setInterval(function(){   
         autoSave();   
         }, 500);
        });
    </script>
  </body>
</html>
