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
                  <li class="active">Produk Olahan</li>
               </ul>
               <h3 class="text-left" style="color:black; font-family: Minion Pro">Produk Olahan</h3>
               <hr style="border-color: grey;margin-top: -8px;">
               <div class="col-xs-12 col-sm-6 col-lg-6">
                  <div class="thumbnail text-center" style="box-shadow: 5px 5px 7px 0px rgba(0,0,0,0.2);">
                     <img class="leafletImg img-responsive" src="<?php echo base_url() ?>item_img/leafletgabungan/Roselindo-Tea.png" alt="" style="width:100%;border-radius: 3px;">
                     <h4 style="color:rgb(242,97,5);">Roselindo Tea</h4>
                  </div>
               </div>
               
               <ul class="paginationKu pagerCustom" >
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

