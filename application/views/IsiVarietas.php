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
      <link href="<?php echo base_url() ?>item img/Logo-Kementerian-Pertanian.png" rel="shortcut icon">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   </head>
   <body>
      <!-- CONTENT -->
      <div class="container">
         <div class="row">
            <div class="col-sm-9 col-lg-9">
               <ul class="breadcrumb" style="margin-bottom: 0px;margin-top: 13px;">
                  <li><a href="<?php echo site_url() ?>">Beranda</a></li>
                  <li><a href="<?php echo site_url() ?>#serat">Tanaman Serat</a></li>
                  <li class="active">Detail Varietas</li>
               </ul>
               <hr style="border-color: black;">
               <?php foreach($varietas as $name) {
                  ?>
               <div class="row" style="margin-bottom: 20px;">
                  <div class="col-xs-12 col-sm-12 col-lg-12">
                     <div class="thumbnail" style=" border-radius: 5px; background-color: rgba(36,112,101,0.1);">
                        <?php 
                           if (empty($name->file_gambar)) { ?>
                        <img src="<?php echo base_url() ?>item_img/gambar/Edited/noImg.jpg ?>" alt="" style="width: 100%;">
                        <?php } else { ?>
                        <img src="<?php echo base_url() ?>item_img/gambar/Edited/<?php echo $name->file_gambar; ?>" alt="" style="width: 100%;">
                        <?php
                           } 
                           ?>
                        <br>
                        <div class="container-fluid">
                           <span class="label label-success">
                              <p class="glyphicon glyphicon-calendar"> <?php echo $name->tanggal_upload; ?> </p>
                           </span>
                           <span style="margin-left: 5px;" class="label label-warning">
                              <p class="glyphicon glyphicon-time"> <?php echo $name->waktu_upload; ?> </p>
                           </span>
                           <h4 style="color:rgb(242,97,5);font-size: 24px;"><?php echo $name->nama_varietas; ?></h4>
                           <?php if(empty($name->deskripsi_varietas)){?>
                           <p style="text-indent: 0.5in; text-align: justify; font-style: italic;">(Belum ada deskripsi)</p>
                           <?php }else{?>
                            <p style="text-indent: 0.5in; text-align: justify;"><?php echo $name->deskripsi_varietas; ?></p>
                           <?php } ?>
                           <br>
                           <p><b>Spesifikasi Varietas :</b></p>
                           <table class="table table-hover">
                              <thead style="background-color: rgba(28,69,26,0.9);border-bottom: 3px solid white; color:#fece00;">
                                 <th class="text-center">No</th>
                                 <th class="text-center">Atribut</th>
                                 <th class="text-center">Keterangan</th>
                              </thead >
                              <tbody>
                                 <?php 
                                    $count=1;
                                    foreach($spesifikasi as $value) {
                                    ?>
                                 <tr>
                                    <?php 
                                       if(empty($value->detail_value)){
                                       	$count-=1;
                                       	echo '<td></td>';
                                       	echo '<td style="font-weight: bold; font-style: italic;">'.$value->nama_atribut.'</td>';
                                       	echo '<td style="text-align:justify">'.$value->detail_value.'</td>';
                                       }else{
                                       	echo '<td style="text-align:">'.$count.'</td>';
                                       	echo '<td style="font-weight: bold; font-style: italic; text-align:justify">'.$value->nama_atribut.'</td>';
                                       	echo '<td style="text-align:justify">'.$value->detail_value.'</td>';
                                       }
                                       ?>
                                 </tr>
                                 <?php 
                                    $count++;
                                    } ?>
                              </tbody>
                           </table>
                           <p><b>Catatan:</b></p>
                           

                           <?php 
                              if (empty($name->file_SK) && empty($name->URLV)) { ?>
                                 
                                 <p>Surat Keputusan Pelepasan <b><?php echo $name->nama_varietas; ?></b> belum tersedia.</p>

                           <?php } else if (empty($name->URLV)) { ?>

                                 <p>Surat Keputusan Pelepasan <b><?php echo $name->nama_varietas; ?></b> dapat diunduh <a href="<?php echo base_url() ?>file/SK/<?php echo $name->file_SK; ?>" style="text-decoration-line: none"><b>di sini</b></a>.</p>

                           <?php } else if (empty($name->file_SK)) { ?>
                                 <p>Referensi <b><?php echo $name->nama_varietas; ?></b> dapat dilihat <a href="http://<?php echo $name->URLV; ?>" target="blank" style="text-decoration-line: none"><b>di sini</b></a>.</p>
                           
                           <?php } else { ?>

                                 <p>Surat Keputusan Pelepasan <b><?php echo $name->nama_varietas; ?></b> dapat diunduh <a href="<?php echo base_url() ?>file/SK/<?php echo $name->file_SK; ?>" style="text-decoration-line: none"><b>di sini</b></a>.</p>

                                 <p>Referensi <b><?php echo $name->nama_varietas; ?></b> dapat dilihat <a href="http://<?php echo $name->URLV; ?>" target="blank" style="text-decoration-line: none"><b>di sini</b></a>.</p>

                           <?php
                              } 
                           ?>

                        </div>
                        <br>
                        <br>
                        <div style="text-align: right; margin-bottom: 10px;margin-right: 10px;">
                           <span style="font-size: 12px;">Bagikan &nbsp</span>
                           <!-- Share link FB -->
                           <a id="button" onclick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $name->nama_varietas; ?>&amp;p[summary]=<?php echo substr($name->deskripsi_varietas, 0, 25);?>&amp;p[url]=<?php echo base_url(); ?>&amp;&p[images][0]=<?php echo base_url() ?>item img/gambar/Edited/<?php echo $name->file_gambar; ?>', 'sharer', 'toolbar=0,status=0,width=550,height=400');" target="_parent" href="javascript: void(0)">
                           <span><img src="<?php echo base_url() ?>item_img/fb.png" /></span>
                           </a>
                           <!-- Share link Twitter -->
                           <a class="twitter popup" href="http://twitter.com/share?source=sharethiscom&text=<?php echo "Varietas Tanaman Serat : ".$name->nama_varietas;?>&url=<?php echo base_url(); ?>&via=berbagiyuks" target="blank">
                           <span><img src="<?php echo base_url() ?>item_img/twitter.png" /></span>
                           </a>
                           <!-- Share link Google -->
                           <a href="javascript:void(0);" onclick="popUp=window.open('https://plus.google.com/share?url=<?php echo base_url('varietas/spesifikasiVarietas/').$name->nama_varietas; ?> ','popupwindow','scrollbars=yes,width=800,height=400');popUp.focus();return false">
                           <span><img src="<?php echo base_url() ?>item_img/gplus.png" /></span>
                           </a>
                        </div>
                     </div>
                     <?php 
                        }
                        ?>
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
