<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Balittas</title>
      <meta charset="utf-8">
      <meta name="description" content="A Tuts+ course">
      <meta name="author" content="DenleiDR">
      <link rel="stylesheet" href="<?php echo base_url()?>bootstrap/css/bootstrap.css">
      <link rel="stylesheet" href="<?php echo base_url()?>bootstrap/css/serat.css">
      <link rel="stylesheet" href="<?php echo base_url()?>bootstrap/css/balittas.css">
      <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/font-awesome-4.7.0/css/font-awesome.min.css">
      <link href="<?php echo base_url() ?>item img/Logo-Kementerian-Pertanian.png" rel="shortcut icon">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   </head>
   <body>
      <br>
      <!-- content -->
      <div class="container">
         <div class="row">
            <div class="col-sm-9 col-lg-9">
               <ul class="breadcrumb" style="margin: -6px 0px -10px -15px;">
                  <li><a href="#">beranda</a></li>
                  <li class="active">Alat dan Mesin</li>
               </ul>
               <h3 class="text-left" style="color:black; font-family: Minion Pro">Alat dan Mesin</h3>
               <hr style="border-color: grey;margin-top: -8px;">
               <div class="col-xs-12 col-sm-6 col-lg-6">
                  <div class="thumbnail text-center" style="box-shadow: 5px 5px 7px 0px rgba(0,0,0,0.2);">
                     <img class="leafletImg img-responsive" src="<?php echo base_url() ?>item_img/leafletgabungan/Riboner-kenaf.jpg" alt="" style="width:100%;border-radius: 3px;">
                     <img class="leafletImg img-responsive" src="<?php echo base_url() ?>item_img/leafletgabungan/Riboner-kenaf2.jpg" alt="" style="width: 100%;border-radius: 3px; margin-top: 5px;">
                     <h4 style="color:rgb(242,97,5);">Riboner dan Penyerpih Batang Kenaf</h4>
                  </div>
               </div>
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
               <h3 class="text-left" style="color:black;font-family: Monion pro">Varietas Terbaru</h3>
               <hr style="border-color: grey;margin-top: -5px;">
               <?php foreach($varietas as $varside)
                  {
                  	$deskripsi="";
                  ?>
               <div style="margin-top: -5px;">
                  <a href="<?php echo site_url('varietas/spesifikasiVarietas/').urlencode(strtolower($varside->nama_varietas));?>" style="color:black;text-decoration-line: none;">
                     <p style="color:rgb(242,97,5);font-size: 15px;margin-bottom: 5px;"><?php echo $varside->nama_varietas; ?></p>
                     <div class="row">
                        <div class="col-xs-5 col-sm-5 col-lg-5">
                           <?php 
                              if(empty($varside->file_gambar)){
                              ?>
                           <img src="<?php echo base_url() ?>item_img/gambar/Edited/noImg.jpg ?>" alt="" style="width: 115px;">
                           <?php
                              } else{?>
                           <img src="<?php echo base_url() ?>item_img/gambar/Edited/<?php echo $varside->file_gambar; ?>" alt="" style="width: 115px;">
                           <?php } ?>
                        </div>
                        <div class="col-xs-7 col-sm-7 col-lg-7">
                           <?php 
                              if(!empty($varside->deskripsi_varietas)){
                              	$deskripsi=substr($varside->deskripsi_varietas, 0,80)." [..]";
                              	echo "<p style=\"margin-top: -5px;\">$deskripsi</p>";
                              }else{
                              	$deskripsi="(Belum memiliki deksripsi mengenai masing - masing varietas tersebut)";
                              	echo "<p style=\"margin-top: -5px;\">$deskripsi</p>";
                              }
                              ?>
                        </div>
                     </div>
                  </a>
               </div>
               <?php 
                  }
                  ?>
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
   </body>
   <br><br><br>
</html>
