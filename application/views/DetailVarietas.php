<!DOCTYPE html>
<html>
   <head>
      <title>Balittas</title>
      <meta charset="utf-8">
      <meta name="description" content="A Tuts+ course">
      <meta name="author" content="DenleiDR">
      <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/css/bootstrap.css">
      <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/css/balittas.css">
      <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/font-awesome-4.7.0/css/font-awesome.min.css">
      <link href="<?php echo base_url() ?>item_img/Logo-Kementerian-Pertanian.png" rel="shortcut icon">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   </head>
   <body>
      <!-- CONTENT -->
      <div class="container">
         <div class="row">
            <div class="col-sm-9 col-lg-9">
               <ul class="breadcrumb" style="margin-bottom: 0px;margin-top: 13px;">
                  <li><a href="<?php echo base_url('index.php') ?>">Beranda</a></li>
                  <!-- <li><a href="<?php echo base_url('index.php') ?>#tanamanserat">Tanaman Serat</a></li> -->
                  <li class="active">Varietas</li>
               </ul>
               <hr style="border-color: black">
               <div class="row" style="margin-bottom: 20px;">
                  <?php 
                  $deskripsi="";
                  foreach($serat as $value) {
                     ?>	
                  <!-- Deskripsi masing - masing serat -->
                  <div class="col-xs-12 col-sm-12 col-lg-12">
                     <div class="thumbnail" style=" border-radius: 5px; background-color: #eee;">
                        <div class="container-fluid">

                           <h4 style="color:rgb(242,97,5);font-size: 24px;"><?php echo $value->nama_serat; ?></h4>
                          <?php 
                           if(!empty($value->deskripsi_serat)){
                                 $deskripsi='<p style="text-indent: 0.5in; text-align: justify;">'.$value->deskripsi_serat.'</p>';
                                 echo "$deskripsi";
                           }else{
                                 $deskripsi='<p style="text-indent: 0.5in; font-style:italic;">'."Klik selanjutnya untuk deskripsi varietas".'</p>';
                                 echo "$deskripsi";
                           }
                           ?>
                           <!-- <p style="text-indent: 0.5in; text-align: justify;"><?php// echo $value->deskripsi_serat; ?></p>
                           <p style="text-indent: 0.5in; text-align: justify;">Tidak Ada</p> -->
                        </div>
                        <br>
                        <br>
                        <div style="text-align: right; margin-bottom: 10px;margin-right: 10px;">
                           <span style="font-size: 12px;">Bagikan &nbsp</span>
                           <!-- Share link FB -->
                           <a id="button" onclick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $value->nama_serat; ?>&amp;p[summary]=<?php echo substr($value->deskripsi_serat, 0, 25);?>&amp;p[url]=<?php echo base_url('index.php'); ?>&amp;&p[images][0]=<?php echo base_url() ?>item_img/serat/<?php echo $value->gambar; ?>', 'sharer', 'toolbar=0,status=0,width=550,height=400');" target="_parent" href="javascript: void(0)">
                           <span><img src="<?php echo base_url() ?>item_img/fb.png" /></span>
                           </a>
                           <!-- Share link Twitter -->
                           <a class="twitter popup" href="http://twitter.com/share?source=sharethiscom&text=<?php echo "Tanaman Serat : ".$value->nama_serat;?>&url=<?php echo base_url('index.php'); ?>&via=berbagiyuks" target="blank">
                           <span><img src="<?php echo base_url() ?>item_img/twitter.png" /></span>
                           </a>
                           <!-- Share link Google -->
                           <a href="javascript:void(0);" onclick="popUp=window.open('https://plus.google.com/share?url=<?php echo base_url('index.php/varietas/detail/').$value->nama_serat; ?> ','popupwindow','scrollbars=yes,width=800,height=400');popUp.focus();return false">
                           <span><img src="<?php echo base_url() ?>item_img/gplus.png" /></span>
                           </a>
                        </div>
                     </div>
                  </div>
                  <!-- Content masing - masing varietas -->
                  <div class="container-fluid" style="background-color: #eee;">
                     <h4 style="color:rgb(242,97,5);font-size: 24px; margin-left: 20px;">Varietas <?php echo $value->nama_serat; ?></h4>
                     <hr style="border-color: rgb(242,97,5);margin-top: -10px;">
                     <?php 
                     $deskripsi="";
                     if(!empty($varietas)){
                     foreach($varietas as $row)
                        {
                         ?>
                     <div class="col-xs-12 col-sm-4 col-lg-4">
                        <div class="thumbnail thumbku" style="box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.2);">
                           <a href="<?php echo base_url('index.php/varietas/spesifikasiVarietas/').urlencode(strtolower($row->nama_varietas));?>" style="text-decoration-line: none;">
                              <?php 
                                 if (empty($row->file_gambar)) { ?>
                              <img src="<?php echo base_url() ?>item_img/gambar/Edited/noImg.jpg ?>" alt="" style="width: 100%;">
                              <?php } else { ?>
                              <img src="<?php echo base_url() ?>item_img/gambar/Edited/<?php echo $row->file_gambar; ?>" alt="" style="width: 100%;">
                              <?php
                                 } 
                                 ?>
                              <span class="label label-success">
                                 <p class="glyphicon glyphicon-calendar"> <?php echo $row->tanggal_upload; ?> </p>
                              </span>
                              <span style="margin-left: 5px;" class="label label-warning">
                                 <p class="glyphicon glyphicon-time"> <?php echo $row->waktu_upload; ?> </p>
                              </span>
                              <h4 style="color:#fece00;"><?php echo $row->nama_varietas; ?></h4>
                           </a>
                           <?php 
                              if(!empty($row->deskripsi_varietas)){
                              	$deskripsi=substr($row->deskripsi_varietas, 0,50)." [..]";
                              	echo "<p>$deskripsi</p>";
                              }
                              else{
                              	echo"<p style=\"font-style: italic;\">Klik selanjutnya untuk deskripsi varietas</p>";
                              }
                              ?>
                           <br>							
                           <div style="text-align: right; margin-bottom: 10px;margin-right: 10px;">
                              <a href="<?php echo base_url('index.php/varietas/spesifikasiVarietas/').urlencode(strtolower($row->nama_varietas));?>" style="text-decoration-line: none;" class="hoverThumbnail"><i>Selengkapnya</i></a>
                           </div>
                        </div>
                     </div>
                     <?php
                        } }else{
                           foreach($serat as $name){
                        ?>	
                      <!-- Jika Content Varietas Belum Ada -->
                   <div class="col-xs-12 col-sm-12 col-lg-12">
                        <div class="standar2 thumbnail" style="box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.2);">
                           <div class="container-fluid">
                               <h2  style="padding-top : 220px; padding-left:40px; color:red;"><b>Mohon maaf untuk saat ini Varietas Dari Tanaman Serat <?php echo $name->nama_serat; ?> yang anda cari Belum Tersedia :))</b></h2>
                           </div>
                        </div>
                     </div>

                     <?php } 

                  }?>

                  </div>
                  <?php 
                     }
                     ?>		
               </div>
               <ul class="paginationKu pagerCustom" >
                  <?php foreach($link as $pagination) {
                     echo '<li>'. $pagination.'</li>';
                     }?>
               </ul>
            </div>
            <div class="col-sm-3 col-lg-3">
               <br>
               <h3 class="text-left" style="color:black;font-family: Minion Pro">Pencarian</h3>
               <hr style="border-color: grey;margin-top: -8px;">
               <div class="container-fluid" style="background-color:rgba(28,69,26,0.9);border-radius: 5px;">
                  <form method="get" action="<?php echo site_url('pencarian')?>" style="margin-top: 15px; margin-bottom: 15px;">
                     <div class="input-group" style="z-index: 0;">
                        <input type="text" name="keyword" class="form-control" placeholder="Cari" required>
                        <div class="input-group-btn">
                           <button class="btn btn-success" type="submit">
                           <i class="glyphicon glyphicon-search"></i>
                           </button>
                        </div>
                     </div>
                  </form>
               </div>
               <a href="<?php echo site_url('leaflet') ?>" style="text-decoration-line:none;">
                  <h3 class="text-left" style="color:black;">Leaflet</h3>
               </a>
               <hr style="border-color: black">
               <?php 
                  $ganjil = true;
                  foreach ($subleaflet as $leafletSide) {
                  	if ($ganjil) {
                  ?>		
               <h5 style="color:black;"><?php echo $leafletSide->nama_leaflet; ?></h5>
               <div class="row">
                  <div class="col-xs-6 col-sm-6 col-lg-6">												
                     <img class="leafletImg" src="<?php echo base_url() ?>item_img/leafletgabungan/<?php echo $leafletSide->file; ?>" class="image" style="width: 110%;border-radius: 3px;">		
                  </div>
                  <?php $ganjil = false; } else { ?> 
                  <div class="col-xs-6 col-sm-6 col-lg-6">
                     <img class="leafletImg" src="<?php echo base_url() ?>item_img/leafletgabungan/<?php echo $leafletSide->file; ?>" class="image" style="width: 110%;border-radius: 3px; margin-left: -10px;">
                  </div>
               </div>
               <?php $ganjil = true; } } ?>	
            </div>
         </div>
      </div>
      <!-- MODALS -->
      <div id="myModal" class="modalLeaflet">
         <span class="closeModal" style="margin-top: 50px; margin-left: 15px;">&times;</span>
         <img class="modalLeaflet-content" id="imgModal">
      </div>
      <script>
         // Get the modal
         var modal = document.getElementById('myModal');
         
         // Get the image and insert it inside the modal - use its "alt" text as a caption
         var max = document.getElementsByClassName("leafletImg");
         for (var i = 0; i < max.length; i++) {
         	var img = document.getElementsByClassName("leafletImg")[i];
         	var modalImg = document.getElementById("imgModal");
         	img.onclick = function(){
         	    modal.style.display = "block";
         	    modalImg.src = this.src;
         	}
         }
         // Get the <span> element that closes the modal
         var span = document.getElementsByClassName("closeModal")[0];
         
         // When the user clicks on <span> (x), close the modal
         span.onclick = function() { 
             modal.style.display = "none";
         }
      </script>
      <!-- END OF MODALS -->
      <div class='scrolltop'>
         <div class='scroll icon' style="width: 50px; height: 40px;">
            <i class="glyphicon glyphicon-chevron-up"></i>
         </div>
      </div>
   </body>
   <br><br>
</html>
