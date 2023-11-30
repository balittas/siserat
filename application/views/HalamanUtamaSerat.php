<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Database Pui Tanaman Serat</title>
      <meta charset="utf-8">
      <meta name="description" content="A Tuts+ course">
      <meta name="author" content="DenleiDR">
      <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
      <link rel="stylesheet" href="bootstrap/css/balittas.css">
      <link rel="stylesheet" href="bootstrap/font-awesome-4.7.0/css/font-awesome.min.css">
      <link href="<?php echo site_url() ?>item_img/Logo-Kementerian-Pertanian.png" rel="shortcut icon">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   </head>
   <body>
      <div class="thetop"></div>
      <header>
         <nav class="navbar navbar-inverse navbar-fixed-top navbarHover">
            <div class="container-fluid">
               <div class="navbar-header" style="margin-top: 5px; margin-bottom: 3px;">		
                  <a href="<?php echo base_url('') ?>"><img src="item_img/header_baru.png" style="width:380px;margin-top: -5px;margin-bottom: -6px;margin-left: 5px;"></a>
                  <button type="botton" class="navbar-toggle" data-toggle="collapse" data-target="#main" style="margin-top: 10px;">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  </button>
               </div>
               <div class="collapse navbar-collapse no-touch">
                  <ul class="nav navbar-nav navbar-right" style="margin-top: 10px;margin-right: 75px;">
                     <a href="<?php echo base_url('') ?>" class="halaman" style="text-decoration-line: none;font-size: 14px;"><i style="font-size:14px; color:white;" class="glyphicon glyphicon-home "></i></a>
                     <div class="dropdownHeader">
                        <div class="dropbtnHeader" style="font-family: Minion Pro"><a href="#tanamanserat" class="halaman no-touch" style="color:white; text-decoration: none;">Tanaman Serat</a> <span class="caret"></div>
                        <div class="dropdownHeader-content" style="margin: 0px 0px 0px 9px;">
                           <div class="container-fluid">
                              <div class="row">
                                 <div class="col-sm-6 col-lg-6">
                                    <a href="<?php echo site_url('varietas/detail/kapas') ?>" class="halaman" style="margin-top: 10px;">Kapas</a>
                                    <hr style="margin: 4px 0px 5px 0px; border-color: rgba(28,69,26,1);">
                                    <a href="<?php echo site_url('varietas/detail/kapuk') ?>" class="halaman">Kapuk</a>
                                    <hr style="margin: 4px 0px 5px 0px; border-color: rgba(28,69,26,1);">
                                    <a href="<?php echo site_url('varietas/detail/kenaf') ?>" class="halaman">Kenaf</a>
                                    <hr style="margin: 4px 0px 5px 0px; border-color: rgba(28,69,26,1);">
                                    <a href="<?php echo site_url('varietas/detail/abaka') ?>" class="halaman" style="margin-bottom: 10px;">Abaka</a>
                                 </div>
                                 <div class="col-sm-6 col-lg-6">
                                    <a href="<?php echo site_url('varietas/detail/rami') ?>" class="halaman" style="margin-top:10px;">Rami</a>	
                                    <hr style="margin: 4px 0px 5px 0px; border-color: rgba(28,69,26,1);">
                                    <a href="<?php echo site_url('varietas/detail/rosela') ?>" class="halaman">Rosela</a>	
                                    <hr style="margin: 4px 0px 5px 0px; border-color: rgba(28,69,26,1);">
                                    <a href="<?php echo site_url('varietas/detail/agave') ?>" class="halaman">Agave</a>	
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="dropdownHeader">
                        <div class="dropbtnHeader" style="font-family: Minion Pro"><a href="#budidaya" class="halaman no-touch" style="color:white; text-decoration: none;">Budidaya Tanaman Serat</a> <span class="caret"></div>
                        <div class="dropdownHeader-content" style="margin: 0px 0px 0px -133px;">
                           <div class="container-fluid">
                              <div class="row">
                                 <div class="col-sm-6 col-lg-6">
                                    <a href="<?php echo site_url('budidaya/budidayatanamanserat/kapas') ?>" class="halaman" style="margin-top: 10px;">Budidaya Kapas</a>
                                    <hr style="margin: 4px 0px 5px 0px; border-color: rgba(28,69,26,1);">
                                    <a href="<?php echo site_url('budidaya/budidayatanamanserat/kapuk') ?>" class="halaman">Budidaya Kapuk</a>
                                    <hr style="margin: 4px 0px 5px 0px; border-color: rgba(28,69,26,1);">
                                    <a href="<?php echo site_url('budidaya/budidayatanamanserat/kenaf') ?>" class="halaman" style="margin-bottom: 10px;">Budidaya Kenaf</a>
                                 </div>
                                 <div class="col-sm-6 col-lg-6">
                                    <a href="<?php echo site_url('budidaya/budidayatanamanserat/rami') ?>" class="halaman" style="margin-top:10px;">Budidaya Rami</a>	
                                    <hr style="margin: 4px 0px 5px 0px; border-color: rgba(28,69,26,1);">
                                    <a href="<?php echo site_url('budidaya/budidayatanamanserat/rosela') ?>" class="halaman">Budidaya Rosela</a>	
                                    <hr style="margin: 4px 0px 5px 0px; border-color: rgba(28,69,26,1);">
                                    <a href="<?php echo site_url('budidaya/budidayatanamanserat/agave') ?>" class="halaman">Budidaya Agave</a>	
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="dropdownHeader">
                        <div class="dropbtnHeader" style="font-family: Minion Pro"><a href="#produk" class="halaman no-touch" style="color:white; text-decoration: none;">Produk</a> <span class="caret"></div>
                        <div class="dropdownHeader-content" style="margin: 0px 0px 0px -348px;">
                           <div class="container-fluid">
                              <div class="row">
                                 <div class="col-sm-12 col-lg-12">
                                    <!-- <a href="#produk" class="halaman" style="margin-top: 10px;">Benih</a>	 -->
                                    <a href="<?php echo site_url('produk/varietas')?>" style="margin-top: 10px;">Varietas</a>	
                                    <hr style="margin: 4px 0px 5px 0px; border-color: rgba(28,69,26,1);">
				    <a href="http://balittas.litbang.pertanian.go.id/aplikasi/upbs-stok/">Benih Sumber</a>	
                                    <hr style="margin: 4px 0px 5px 0px; border-color: rgba(28,69,26,1);">
                                    <a href="<?php echo site_url('produk/alsin') ?>">Alat dan Mesin</a>
                                    <hr style="margin: 4px 0px 5px 0px; border-color: rgba(28,69,26,1);">
                                    <a href="<?php echo site_url('produk/olahan') ?>" >Produk Olahan</a>
                                    <hr style="margin: 4px 0px 5px 0px; border-color: rgba(28,69,26,1);">
  				    <a href="<?php echo site_url('#') ?>" style="margin-bottom: 10px;">Formula (Coming Soon)</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </ul>
               </div>
               <!-- For Mobile -->
               <div class="collapse navbar-collapse no-touch" id="main">
                  <ul class="nav navbar-nav navbar-right hidden-md hidden-lg" style="margin-top: 8px;margin-right: 75px;">
                     <a href="#home" class="halaman" style="text-decoration-line: none;font-size: 14px; margin-left: 15px;"><i style="font-size:14px; color:white;" class="glyphicon glyphicon-home "></i></a>
                     <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Tanaman Serat <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                           <li><a href="<?php echo site_url() ?>varietas/detail/kapas">Kapas</a></li>
                           <li><a href="<?php echo site_url() ?>varietas/detail/kapuk">Kapuk</a></li>
                           <li><a href="<?php echo site_url() ?>varietas/detail/kenaf">Kenaf</a></li>
                           <li><a href="<?php echo site_url() ?>varietas/detail/rami">Rami</a></li>
                           <li><a href="<?php echo site_url() ?>varietas/detail/rosela">Rosela</a></li>
                           <li><a href="<?php echo site_url() ?>varietas/detail/agave">agave</a></li>
                        </ul>
                     </li>
                     <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Budidaya Tanaman Serat<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                           <li><a href="<?php echo site_url('budidaya/budidayatanamanserat/kapas') ?>">Budidaya Kapas</a></li>
                           <li><a href="<?php echo site_url('budidaya/budidayatanamanserat/kapuk') ?>">Budidaya Kapuk</a></li>
                           <li><a href="<?php echo site_url('budidaya/budidayatanamanserat/kenaf') ?>">Budidaya Kenaf</a></li>
                           <li><a href="<?php echo site_url('budidaya/budidayatanamanserat/rami') ?>">Budidaya Rami</a></li>
                           <li><a href="<?php echo site_url('budidaya/budidayatanamanserat/rosela') ?>">Budidaya Rosela</a></li>
                           <li><a href="<?php echo site_url('budidaya/budidayatanamanserat/agave') ?>">Budidaya Agave</a></li>
                           <li><a href="<?php echo site_url('budidaya/budidayatanamanserat/abaka') ?>">Budidaya Abaka</a></li>
                        </ul>
                     </li>
                     <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Produk<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                           <li><a href="<?php echo site_url('produk/varietas') ?>">Varietas</a></li>
						   <li><a href="<?php echo site_url('produk/benih') ?>">Benih Sumber</a></li>
                           <li><a href="<?php echo site_url('produk/alsin') ?>">Alat dan Mesin</a></li>
                           <li><a href="<?php echo site_url('produk/olahan') ?>">Produk Olahan</a></li>
						   <li><a href="<?php echo site_url() ?>">Formula (Coming Soon)</a></li>
                        </ul>
                     </li>
                  </ul>
               </div>
            </div>
         </nav>
	
         <!-- gambar tengah -->			
         <div class="containerImg text-center" id="home">
            <video autoplay muted loop style="width: 100%">
               <source src="item_img/SeratRoselaFixNew.mp4" type="video/mp4">
            </video>
         </div>
      </header>
      <!-- content -->
      <section class="tanamanserat" id="tanamanserat" style="background-color: #eee; margin-top: -3px;">
         <div class="container">
            <div class="row">
               <div class="col-sm-9 col-lg-9">
                  <ul class="breadcrumb" style="margin: 10px 0px -10px -15px;">
                     <li class="active">Beranda</li>
                  </ul>
                  <h3 class="text-left" style="color:black; font-family: Minion Pro">Tanaman Serat</h3>
                  <hr style="border-color: grey; margin-top: -8px;">
                  <div class="row">
                     <?php 
                        $no = 1;
                        foreach ($serat as $row) {
                        	$deskripsi = "";
                        ?>
                     <div class="col-xs-12 col-sm-4 col-lg-4" >
                        <div class="thumbnail thumbku" style="box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.2);" id="<?php echo $no++ ?>">
                           <a href="<?php echo site_url('varietas/detail/').urlencode(strtolower($row->nama_serat));?>" style="text-decoration-line: none;">
                              <img src="<?php echo base_url() ?>item_img/serat/<?php echo $row->gambar; ?>" alt="" style="width: 100%;">
                              <h4 style="color:#fece00;">Komoditas Serat <b><?php echo $row->nama_serat; ?></b></h4>
                           </a>
                         <!--   <?php 
                              if (!empty($row->deskripsi_serat)) {
                              	$deskripsi = substr($row->deskripsi_serat, 0, 50)." [..]";
                              	echo "<p>$deskripsi</p>";
                              } else {
                              	$deskripsi = "(Belum ada deskripsi)";
                              	echo "<p style=\"font-style: italic;\">$deskripsi</p><br>";
                              }
                              ?> -->
                           <br>							
                           <div style="text-align: right; margin-bottom: 10px;margin-right: 10px;">
                              <a href="<?php echo site_url('varietas/detail/').urlencode(strtolower($row->nama_serat));?>" style="text-decoration-line: none;" class="hoverThumbnail"><i>Selengkapnya</i></a>
                           </div>
                        </div>
                     </div>
                     <?php
                        }
                        ?>
                  </div>
                  <br>
               </div>
               <div class="col-sm-3 col-lg-3">
                  <br>
                  <h3 class="text-left" style="color:black;font-family: Minion Pro;margin-top: 36px; ">Pencarian</h3>
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
                     <h3 class="text-left" style="color:black;font-family: Minion Pro">Leaflet</h3>
                  </a>
                  <hr style="border-color: grey;margin-top: -8px;">
                  <?php 
                     $ganjil = true;
                     foreach ($subLeaflet as $leafletSide) {
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
         <br>
      </section>
      <!-- akhir div container atas -->
      <!-- Budidaya Tanaman Serat -->
      <section class="budidaya" id="budidaya" style="padding-top: 30px;">
         <div class="container">
            <div class="row">
               <div class="col-sm-3 col-lg-3">
                  <h3 class="text-center" style="color:black;margin-top: 0px;font-family: Minion Pro;">Budidaya Tanaman Serat</h3>
                  <p style="text-align:justify; ">Tanaman serat yaitu tumbuhan yang dibudidayakan dan diambil seratnya untuk keperluan manusia. Biasanya serat tumbuhan berasal dari buah, kulit, kayu, akar, pelepah atau daunnya. Serat tumbuhan/serat pangan; biasanya tersusun atas selulosa, hemiselulosa, dan kadang-kadang mengandung pula lignin.</p>
               </div>
               <div class="col-sm-9 col-lg-9">
                  <div class="row">
                     <?php foreach($budidaya as $name) {?>
                     <div class="col-xs-12 col-sm-3 col-lg-3">
                        <a href="<?php echo site_url('budidaya/budidayatanamanserat/').urlencode(strtolower($name->nama_serat)); ?>" style="text-decoration-line: none;" class="teknologiBudidaya">
                           <h4 style="font-family: Minion Pro; margin-left: 10px;">Budidaya <?php echo $name->nama_serat; ?> </h4>
                           <hr style="margin:-6px 0px 5px 5px; border-color: orange;">
                           <div class="overlayhr"></div>
                           <div class="thumbnail" style="background-color: white; border-style: none;">
                              <div class="itemZoom" style="box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.2);"  >
                                 <img src="item_img/serat/<?php echo $name->gambar; ?>" class="imageZoom">
                                 <div class="itemZoom-overlay top"></div>
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
         </div>
      </section>
      <!-- Produk -->
      <section class="produk" id="produk" style="background-color: #eee;">
         <div class="container-fluid" >
            <div class="container">
               <!-- Produk -->
               <h3 class="text-center" style="color:black;font-family: Minion Pro;">Produk</h3>
               <p class="text-center" style="color: black;">Inovasi teknologi yang paling strategis untuk mendukung pengembangan komoditas adalah varietas unggul. Penggunaan varietas unggul suatu komoditas mempunyai dampak yang sangat luas, antara lain dapat berpengaruh terhadap efisiensi biaya dalam budi daya, peningkatan produksi dan mutu, serta pemanfaatan lahan-lahan marginal, sehingga dapat berdampak sosial dan ekonomi yang cukup nyata bagi petani. Selain itu, penggunaan varietas unggul merupakan teknologi yang relatif mudah diterima dan diterapkan oleh petani.</p>
               <br><br>
               <div class="row text-center">
                  <div class="col-xs-12 col-sm-3 col-lg-3 no-touch mroduk">
                     <a href="http://balittas.litbang.pertanian.go.id/aplikasi/upbs-stok/" style="text-decoration-line: none;" onmouseover="hvr(this, 'in')" onmouseleave="hvr(this, 'out')">
                        <div class="thumbnail text-center produk" style="background-color: rgba(28,69,26,0); border-style: none;" >
                           <img src="item_img/hazelnut.png" style="width: 40%;" col="g">
                           <img src="item_img/hazelnutY.png" style="width: 40%; display:none;" col="b">
                           <br>
                           <h4>Benih</h4>
                           <br><br>
                        </div>
                     </a>
                  </div>
                  <div class="col-xs-12 col-sm-3 col-lg-3 no-touch mroduk">
                     <a href="<?php echo site_url() ?>produk/alsin" style="text-decoration-line: none;" onmouseover="hvr(this, 'in')" onmouseleave="hvr(this, 'out')">
                        <div class="thumbnail text-center produk" style="background-color: rgba(28,69,26,0); border-style: none">
                           <img src="item_img/tools.png" style="width: 40%" col="g">
                           <img src="item_img/toolsY.png" style="width: 40%; display:none;" col="b">
                           <br>
                           <h4>Alat & Mesin</h4>
                           <br><br>
                        </div>
                     </a>
                  </div>
                  <div class="col-xs-12 col-sm-3 col-lg-3 no-touch mroduk">
                     <a href="<?php echo base_url() ?>#" style="text-decoration-line: none;" onmouseover="hvr(this, 'in')" onmouseleave="hvr(this, 'out')">
                        <div class="thumbnail text-center produk" style="background-color: rgba(28,69,26,0); border-style: none">
                           <img src="item_img/flask.png" style="width: 40%" col="g">
                           <img src="item_img/flaskY.png" style="width: 40%; display:none;" col="b">
                           <br>
                           <h4>Formula</h4>
                           <br><br>
                        </div>
                     </a>
                  </div>
                  <div class="col-xs-12 col-sm-3 col-lg-3 no-touch mroduk">
                     <a href="<?php echo base_url() ?>#" style="text-decoration-line: none;" onmouseover="hvr(this, 'in')" onmouseleave="hvr(this, 'out')">
                        <div class="thumbnail text-center produk" style="background-color: rgba(28,69,26,0); border-style: none">
                           <img src="item_img/pipe.png" style="width: 40%" col="g">
                           <img src="item_img/pipeY.png" style="width: 40%; display:none;" col="b">
                           <br>
                           <h4>Produk Hilir</h4>
                           <br><br>
                        </div>
                     </a>
                  </div>
               </div>
               <br>
            </div>
         </div>
      </section>
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
   <!-- <br><br><br> -->
   <script src="<?php echo base_url() ?>bootstrap/js/bootstrap.min.js"></script>
   <script src="<?php echo base_url() ?>bootstrap/js/jquery-3.3.1.min.js"></script> 
   <script src="<?php echo base_url() ?>bootstrap/js/jquery.easing.1.3.js"></script> 
   <script src="<?php echo base_url() ?>bootstrap/js/script.js"></script>
</html>
