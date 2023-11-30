<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Balittas</title>
		<meta charset="utf-8">		
		<meta name="description" content="Balittas - Sistem Informasi Tanaman Serat">
		<meta name="author" content="Gusna Ikhsan">		
		<link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/css/balittas.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/css/serat.css">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>-->
	</head>
	<body>
		<br>
		<!-- content -->
		<div class="container">			
				<ul class="breadcrumb" style="margin: -6px 0px -10px -15px;">
					  	<li><a href="<?php echo site_url('') ?>">Beranda</a></li>
					  	<li class="active">Pencarian</li> 
				</ul>			
				<br><br>										
					<!-- <h3 class="text-left" style="color:black;font-family: Minion Pro">Pencarian</h3>
					<hr style="border-color: grey;margin-top: -8px;"> -->
				<div class="container-fluid" style="background-color:rgba(28,69,26,0.9);border-radius: 5px; width: 60%;">
					<form method="get" action="<?php echo site_url('pencarian')?>" style="margin-top: 15px; margin-bottom: 15px;">
						<div class="input-group" style="z-index: 0;">
							<input type="text" name="keyword" class="form-control" placeholder="Cari" id="fieldCari" value="<?php echo $keyword; ?>" required>
							<div class="input-group-btn" >
							    <button class="btn btn-success" type="submit">
							    	<i class="glyphicon glyphicon-search"></i>
							    </button>
							</div>
						</div>
					</form>						
				</div>
				<br>
				<h3 style=" font-style: italic;">Hasil pencarian <span class="matche-cnt"><span id="jumlahTerkait"></span> terkait</span></h3>
				<hr style="margin-top: -6px;">
				<input hidden id="keyword" value="<?php echo $keyword; ?>">		
					<!-- Pencarian Tabel Serat -->
					<?php 
					$tempSerat="";
					$jumlahPencarian = 0;
					foreach($pencarianKomoditas as $cari) {
						if($tempSerat!=$cari->nama_serat) {
						?>
							<div class="pencarian">
								<a style="text-decoration-line:none; color:red;" href="<?php echo site_url('varietas/detail/').urlencode(strtolower($cari->nama_serat));?>"><h3><?php echo $cari->nama_serat; ?></h3></a>
								<?php 
									$deskripsi="";
									if(!empty($cari->deskripsi_serat)){
										$deskripsi=substr($cari->deskripsi_serat, 0,670)." [...]";
										echo '<p style="text-indent:0.5in; text-align:justify;">'.$deskripsi.'</p>';
									}else{
										$deskripsi="(Belum Ada Deskripsi)";
										echo '<p style="text-align:justify; font-style:italic;">'.$deskripsi.'</p>';
									}
								 ?>
								 <div>
								 <a href="<?php echo site_url('pencarian')?>?keyword=%23serat" style="text-decoration-line: none;"><span style="color: #fece00; font-style: italic;"><p class="glyphicon glyphicon-tags small"></p>&nbsp;&nbsp;Serat</span></a>	
								<hr style="margin-top: -2px;">
								</div>
							</div>
					<?php 
					$jumlahPencarian++;
							} 
							$tempSerat=$cari->nama_serat;
						}
							?>	

					<!-- Pencarian tabel varietas -->
					<?php 
					$tempVarietas="";
						foreach($pencarianVarietas as $cari) {
							if($tempVarietas!=$cari->nama_varietas){
							?>
								<div class="pencarian">
									<a style="text-decoration-line:none; color:red;" href="<?php echo site_url('varietas/spesifikasiVarietas/').urlencode(strtolower($cari->nama_varietas));?>"><h3><?php echo $cari->nama_varietas; ?></h3></a>
									<?php 
										$deskripsi="";
										if(!empty($cari->deskripsi_varietas)){
											$deskripsi=substr($cari->deskripsi_varietas, 0,670)." [...]";
											echo '<p style="text-indent:0.5in; text-align:justify;">'.$deskripsi.'</p>';
										}else{
											$deskripsi="(Belum Ada Deskripsi)";
											echo '<p style="text-align:justify; font-style:italic;">'.$deskripsi.'</p>';
										}
									 ?>
									 <div>
								 <a href="<?php echo site_url('pencarian')?>?keyword=%23varietas" style="text-decoration-line: none;"><span style="color: #fece00; font-style: italic;"><p class="glyphicon glyphicon-tags small"></p>&nbsp;&nbsp;varietas</span></a>	
								<hr style="margin-top: -2px;">
								</div>
								</div>
						<?php 
						$jumlahPencarian++;
								} 
								$tempVarietas=$cari->nama_varietas;
							} 
								?>
					<!-- Pencarian Leaflet ver 1 -->
					<!-- Pencarian Leaflet -->
					<?php 
					$tempLeaflet=""; $indeks=0;
						foreach($pencarianLeaflet as $cari) {
							if($tempLeaflet!=$cari->nama_leaflet){
							?>
							<div class="pencarian">	
								<div style="clear:both;">
									<a href="#" style="text-decoration-line: none;" class="indeksGambar">
										<h3 style="text-decoration-line:none; color:red;"><?php echo $cari->nama_leaflet; ?></h3>
									</a>
								</div>
								
								<div>
								 <a href="<?php echo site_url('leaflet')?>" style="text-decoration-line: none;"><span style="color: #fece00; font-style: italic;"><p class="glyphicon glyphicon-tags small"></p>&nbsp;&nbsp;leaflet</span></a>	
								<hr style="margin-top: -2px;">
								</div>
							</div>
						 <?php 
						if ($indeks == 0) {
								echo "<script>
							            document.getElementsByClassName('indeksGambar')[$indeks].onclick = function() {
							            	gambarLeaflet(\"".$pencarianLeaflet[$indeks]->file."\",\"".$pencarianLeaflet[$indeks+1]->file."\",\"".$pencarianLeaflet[$indeks]->nama_leaflet."\",\"".$pencarianLeaflet[$indeks+1]->nama_leaflet."\")
							            };
							          </script>";
							} else {
								echo "<script>
							            document.getElementsByClassName('indeksGambar')[$indeks].onclick = function() {
							            	gambarLeaflet(\"".$pencarianLeaflet[$indeks*2]->file."\",\"".$pencarianLeaflet[($indeks*2)+1]->file."\",\"".$pencarianLeaflet[$indeks*2]->nama_leaflet."\",\"".$pencarianLeaflet[($indeks*2)+1]->nama_leaflet."\")
							            };
							          </script>";
							}

						$jumlahPencarian++;
						$indeks++;
								} 
								$tempLeaflet=$cari->nama_leaflet;
							}
								?>

					<!-- Pencarian Budidaya Tanaman -->
					<?php 
					$tempBudidaya="";
					foreach($pencarianBudidaya as $cari) {
						if($tempBudidaya!=$cari->judul) {
						?>
							<div class="pencarian">
								<a style="text-decoration-line:none; color:red;" href="<?php echo site_url('budidaya/budidayatanamanserat/').urlencode(strtolower($cari->nama_serat)); ?>"><h3><?php echo $cari->judul; ?></h3></a>
								<?php 
									$cuplikan="";
									if(!empty($cari->cuplikan_monograf)){
										$cuplikan=substr($cari->cuplikan_monograf, 0,670)." [...]";
										echo '<p style="text-indent:0.5in; text-align:justify;">'.$cuplikan.'</p>';
									}else{
										$deskripsi="(Belum Ada Deskripsi)";
										echo '<p style="text-align:justify; font-style:italic;">'.$cuplikan.'</p>';
									}
								 ?>
								 <div>
								 <a href="<?php echo site_url('pencarian')?>?keyword=%23budidaya" style="text-decoration-line: none;"><span style="color: #fece00; font-style: italic;"><p class="glyphicon glyphicon-tags small"></p>&nbsp;&nbsp;Budidaya</span></a>	
								<hr style="margin-top: -2px;">
								</div>
							</div>
					<?php 
					$jumlahPencarian++;
							} 
							$tempBudidaya=$cari->judul;
						}

								
								if($jumlahPencarian == 0){
									echo "<script>$(\"#jumlahTerkait\").text(\"$jumlahPencarian\");</script>";
									echo "<h3 class=\"text-center\" style=\"font-family: futura md bt;\">Hasil untuk <b style=\"color: rgb(242,97,5);\">$keyword</b> tidak ditemukan!</h3>"; 	
								}else{
									echo "<script>
									$(\"#jumlahTerkait\").text(\"$jumlahPencarian\");
									</script>";
								}
							?>	
			</div>	

			
	<!-- MODALS -->
		<!-- <div id="myModal" class="modalLeaflet">
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
		</script> -->
		<!-- END OF MODALS -->

		<!-- BAGIAN MODAL UNTUK PENCARIAN LEAFLET -->
		<div id="modalKu" class="modalSlider">
			<span class="closeSlider cursor" onclick="closeModal()">&times;</span>
			<div class="modalSlider-content">
				<div class="mySlidesSlider">
					<div class="numbertextSlider">1 / 2</div>
					<img src="" style="width:100%" class="imgLeaflet">
				</div>
				<div class="mySlidesSlider">
					<div class="numbertextSlider">2 / 2</div>
					<img src="" style="width:100%" class="imgLeaflet">
				</div>
				<a class="prevSlider" onclick="plusSlides(-1)" style="text-decoration-line: none;z-index: 1000">&#10094;</a>
				<a class="nextSlider" onclick="plusSlides(1)" style="text-decoration-line: none;z-index: 1000">&#10095;</a>
				<div class="caption-container" style="background-color: rgba(0,0,0,0.9);">
			     	<strong><p id="caption" class="text-center" style="color: white; padding-top: 15px;"></p></strong>
			    </div>
			</div>
		</div>
		<!-- PENUTUP BAGIAN MODAL -->

		<script>
			var searchCnt = 0;

			var option = {
				color: "rgb(28,69,26)",
				background: "rgba(92,184,92,0.5)",
				bold: false,
				class: "high",
				ignoreCase: true,
				wholeWord: false
			}
			$(function(){
				searchCnt = $(".pencarian").highlight($('#keyword').val(), option);
			});

			function gambarLeaflet(value1, value2, nama1, nama2) {
				document.getElementsByClassName('imgLeaflet')[0].src = "http://balittas.or.id/siserat/item_img/leafletgabungan/" + value1;
				document.getElementsByClassName('imgLeaflet')[1].src = "http://balittas.or.id/siserat/item_img/leafletgabungan/" + value2;
				document.getElementsByClassName('imgLeaflet')[0].alt = nama1;
				document.getElementsByClassName('imgLeaflet')[1].alt = nama2;

				document.getElementById('modalKu').style.display='block';
				showSlides(slideIndex);
			}

			//SCRIPT UNTUK MODAL PENCARIAN
			var slideIndex = 1;

			function openModal() {
			  document.getElementById('modalKu').style.display = "block";
			}

			function closeModal() {
			  document.getElementById('modalKu').style.display = "none";
			}

			function plusSlides(n) {
			  showSlides(slideIndex += n);
			}

			function currentSlide(n) {
			  showSlides(slideIndex = n);
			}

			function showSlides(n) {
			  var i;
			  var slides = document.getElementsByClassName("mySlidesSlider");
			  var dots = document.getElementsByClassName("imgLeaflet");
			  var captionText = document.getElementById("caption");
			  if (n > slides.length) {slideIndex = 1}
			  if (n < 1) {slideIndex = slides.length}
			  for (i = 0; i < slides.length; i++) {
			      slides[i].style.display = "none";
			  }
			  
			  slides[slideIndex-1].style.display = "block";
			  captionText.innerHTML = dots[slideIndex-1].alt;
			}

		</script>
	</body>	
	<br><br><br>
	
</html>
