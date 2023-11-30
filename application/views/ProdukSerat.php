<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Balittas</title>
      <meta charset="utf-8">
      <meta name="description" content="A Tuts+ course">
      <meta name="author" content="DenleiDR">
      <link rel="stylesheet" href="<?php echo base_url()?>bootstrap/css/bootstrap.css">
      <link rel="stylesheet" href="<?php echo base_url()?>bootstrap/css/balittas.css">
      <link rel="stylesheet" href="<?php echo base_url()?>bootstrap/css/serat.css">
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
                  <li><a href="<?php echo site_url() ?>">Beranda</a></li>
                  <li class="active">Produk Benih</li>
               </ul>
               <a href="" style="text-decoration-line:none;">
                  <h3 class="text-left" style="color:black; font-family: Minion Pro">Ketersediaan Benih</h3>
               </a>
               <hr style="border-color: grey;margin-top: -8px;">
               <!-- <div class="row">
                 <div class="col-xs-4 col-sm-4 col-lg-2">
                    <h5 style="margin-left: 0px;">Filter by &nbsp :</h5>
                 </div>
                 <div class="col-sm-2" style="padding-top: 0px;">
                  <select class="form-control komoditasbenih" id="jenisKomoditasstokfilter" name="komoditasstokfilter" style="margin-left: -100px; width: 170px; height: 35px;" onchange="filterStokBenih();">
                         <option value="Semua Komoditas" selected>Semua Komoditas</option>
                    <?php
                      $komoditasbenih = array("Semua Komoditas","Kapas","Kapuk","Kenaf","Rami","Rosela","Sisal","Abaka");
                      for($i = 1;$i < count($komoditasbenih);$i++){
                        echo"<option value=$komoditasbenih[$i]> $komoditasbenih[$i] </option>";
                      }
                    ?>
                  </select>
                 </div>
               </div> -->
               
              <!-- Label Filter -->
               <div class="row">
                  <div class="col-xs-2 col-sm-2 col-lg-2">
                     <h5 style="margin-left: 0px;"><b>Filter by &nbsp :</b></h5>
                  </div>
                  <div class="col-xs-2 col-sm-4 col-lg-4">
                     <select class="form-control komoditas" id="komoditasku" name="komoditasku" style="margin-left: -70px; width: 170px; height: 35px;" onchange="filterB();">
                        <option value="Semua Komoditas" selected>Semua Komoditas</option>
                        <?php
                           $komoditas = array("Semua Komoditas","Kapas","Kapuk","Kenaf","Rami","Rosela","Sisal","Abaka");
                           for($i = 1;$i < count($komoditas);$i++){
                              echo"<option value=$komoditas[$i]> $komoditas[$i] </option>";
                           }
                        ?>
                     </select>
                  </div>
               </div>
               <br>
               <div id="tablebenih2">
               <div class="table-responsive">
                  <table class="table table-hover" style="text-align: center;">
                     <thead style="text-align:center; background-color: rgba(28,69,26,0.9);border-bottom: 3px solid white; color:#fece00;">
                        <th style="text-align:center;">No</th>
                        <th style="text-align:center;">Varietas</th>
                        <th style="text-align:center;">Asal</th>
                        <th style="text-align:center;">Tahun Panen</th>
                        <th style="text-align:center;">Kelas</th>
                        <th style="text-align:center;">Stok Bulan Terakhir</th>
                        <th style="text-align:center;">Stok Sampai</th>
                     </thead >
                     <tbody>
                        <?php
                           $count=0;
                           $jumlah=0;
                            foreach ($stokbenih as $ben) 
                           {
                           	$count++;
                              $jumlah+=$ben->stok_bulan_terakhir;
                           	?>
                        <tr>
                           <td><?php echo $count; ?></td>
                           <td><?php echo $ben->nama_benih; ?></td>
                           <td><?php echo $ben->asal; ?></td>
                           <td><?php echo $ben->tahun_panen; ?></td>
                           <td><?php echo $ben->kelas; ?></td>
                           <td><?php echo $ben->stok_bulan_terakhir; ?></td>
                           <td><?php echo $ben->stok_sampai; ?></td>
                        </tr>
                        <?php 
                           } 
                           ?>
                           <tr style="background-color: rgba(28,69,26, 0.3);">
                           <td></td>
                           <td></td>
                           <td></td>
                           <td style="font-weight: bold;">JUMLAH</td>
                           <td></td>
                           <td class="text-center" style="font-weight: bold;"><?php echo number_format($jumlah, 2); ?></td>
                           <td></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               </div>

               <script>
                        //ajax filter benih
                        // function filterB(){
                        //    var komoditas = $("#komoditasku").val();
                        //    // alert(komoditas);
                        //    // alert komoditas
                        //    $.ajax({
                        //       type:"POST",
                        //       url: "../produk/filterBenih",
                        //       data: "benihhhhhhhh=" + komoditas,
                        //       dataType : "html",
                        //       succes:function(msg){
                        //          $("#tablebenih2").html(msg);
                        //       },
                        //       error:function(){
                        //          alert("Search Failed");
                        //       }
                        //    });
                        // }

                        function filterB(){
                          var komoditas = $("#komoditasku").val();
                                // alert(komoditasstok);

                          $.ajax({
                              type:"POST",
                              url: "../produk/filterStokBenih",
                              data: "benih=" + komoditas,
                              dataType : "html",
                              success:function(msg){
                                  $("#tablebenih2").html(msg);                
                              },
                              error:function(){
                                alert("Search failed");
                              }
                          });
                        }
               </script>

               <h3>Distribusi Benih</h3>
               <hr style="border-color: grey;margin-top: -8px;">
               <!-- Label Filter -->
               <div class="row" >
                                   
                  
                  <!-- <div class="col-xs-4 col-sm-2 col-lg-2">
                      <h5 style="margin-left: 0px;">Filter by &nbsp :</h5>
                  </div> -->
                  <div class="col-xs-4 col-sm-4 col-lg-2">
                      <h5 style="margin-left: 0px;"><b>Filter by &nbsp :</b></h5>
                  </div>
                  <div class="col-xs-4 col-sm-4 col-lg-2 text-right" >
                      <select class="form-control komoditasdist" id="jenisKomoditasdist" name="komoditasdist" style="margin-left: -70px; width: 170px; height: 35px;" onchange="filterDistribusi();">
                             <option value="Semua Komoditas" selected>Semua Komoditas</option>
                        <?php
                          $komoditasdist = array("Semua Komoditas","Kapas","Kapuk","Kenaf","Rami","Rosela","Sisal","Abaka");
                          for($i = 1;$i < count($komoditasdist);$i++){
                            echo"<option value=$komoditasdist[$i]> $komoditasdist[$i] </option>";
                          }
                        ?>
                      </select>
                    </div>


                  <div class="col-xs-4 col-sm-4 col-lg-2 text-right">
                     <select class="form-control tahundist" id="jenisTahundist" name="tahundist" style="margin-left: -40px; width: 170px; height: 35px;" onchange="filterDistribusi();">
                       <option value="Semua Tahun" selected>Semua Tahun</option>
                  <?php
                    for($i = 2000;$i <= 2050;$i++){
                      echo"<option value=$i> $i </option>";
                    }
                  ?>
                  ?>
                </select>
                  </div>

                  <div class="col-xs-4 col-sm-4 col-lg-2 text-right">
                     <select class="form-control bulandist" id="jenisBulandist" name="bulandist" style="margin-left: -10px; width: 170px; height: 35px;" onchange="filterDistribusi();">
                       <option value="Semua Bulan" selected>Semua Bulan</option>
                  <?php
                    $bulandist = array("Semua Bulan","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                    for($i = 1;$i < count($bulandist);$i++){
                      echo"<option value=$bulandist[$i]> $bulandist[$i] </option>";
                    }
                  ?>
                </select>
                  </div>
               </div>
               <br>
               <div id="table-data">
                   <div class="table-responsive" style="text-align: center;">
                  <!-- <table class="table table-hover">
                     <thead style="background-color: rgba(28,69,26,0.9);border-bottom: 3px solid white; color:#fece00;">
                        <th style="text-align:center;">No</th>
                        <th style="text-align:center;">Varietas</th>
                        <th style="text-align:center;">Tanggal</th>
                        <th style="text-align:center;">Tahun Panen</th>
                        <th style="text-align:center;">Kelas Benih</th>
                        <th style="text-align:center;">Jumlah Kg</th>
                        <th style="text-align:center;">Keterangan</th>
                     </thead>
                     <tbody>
                        <?php 
                           $count=0;
                           $jumlah=0;
                           foreach($distribusi as $ben)
                           {
                           $count++; 
                           $jumlah += $ben->jumlah_kg;
                           $keterangan = "";
                           if(!empty($ben->keterangan)){
                              $keterangan = substr($ben->keterangan, 0,20). " ...";
                           }else{
                              $keterangan = $ben->keterangan;
                           }
                               ?>
                        <tr>
                           <td><?php echo $count; ?></td>
                           <td><?php echo $ben->nama_benih; ?></td>
                           <td><?php echo $ben->tanggal; ?></td>
                           <td><?php echo $ben->tahun_panen; ?></td>
                           <td><?php echo $ben->kelas_benih; ?></td>
                           <td><?php echo $ben->jumlah_kg; ?></td>
                           <td><?php echo $ben->keterangan; ?></td>
                        </tr>
                          <?php 
                        }
                        ?> 
                        <tr style="background-color: rgba(28,69,26, 0.3);">
                           <td></td>
                           <td></td>
                           <td></td>
                           <td style="font-weight: bold;">JUMLAH</td>
                           <td></td>
                           <td class="text-center" style="font-weight: bold;"><?php echo number_format($jumlah, 2); ?></td>
                           <td></td>
                        </tr>
                     </tbody>
                   
                  </table> -->
                  <table class="table table-hover">
                     <thead style="background-color: rgba(28,69,26,0.9);border-bottom: 3px solid white; color:#fece00;">
                        <th style="text-align:center;">No</th>
                        <th style="text-align:center;">Varietas</th>
                        <th style="text-align:center;">Tanggal</th>
                        <th style="text-align:center;">Tahun Panen</th>
                        <th style="text-align:center;">Kelas Benih</th>
                        <th style="text-align:center;">Jumlah Kg</th>
                        <th style="text-align:center;">Keterangan</th>
                     </thead>
              <tbody>
                <?php 
                  // $no = 1; 
                   $count=0;
                   $jumlah=0;                                         
                  foreach ($distribusi as $row) {   
                     $count++; 
                           $jumlah += "$row[jumlah_kg]";
                           $keterangan = "";
                           if(!empty($row->keterangan)){
                              $keterangan = substr($row->keterangan, 0,20). " ...";
                           }else{
                              $keterangan = "$row[keterangan]";
                           }

                ?>
                <tr >
                  <td><?php echo $count; ?></td>                                
                  <td><?php echo "$row[nama_benih]"; ?></td>                              
                  <td><?php echo "$row[tanggal]"; ?></td>                         
                  <td><?php echo "$row[tahun_panen]"; ?></td>
                  <td><?php echo "$row[kelas_benih]"; ?></td>
                  <td><?php echo "$row[jumlah_kg]"; ?></td>
                  <td><?php echo "$row[keterangan]"; ?></td>
                  
                </tr>
                <?php                                 
                    // $no++;
                  }
                ?>
                <tr style="background-color: rgba(28,69,26, 0.3);">
                           <td></td>
                           <td></td>
                           <td></td>
                           <td style="font-weight: bold;">JUMLAH</td>
                           <td></td>
                           <td class="text-center" style="font-weight: bold;"><?php echo number_format($jumlah, 2); ?></td>
                           <td></td>
                        </tr>
              </tbody>
            </table>
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
                  <h3 class="text-left" style="color:black;font-family: Minion Pro">Leaflet</h3>
               </a>
               <hr style="border-color: grey;margin-top: -8px;">
               <?php 
                  $ganjil=true;
                  foreach($leaflet as $subleaflet)
                  	{
                  		if($ganjil){
                   ?>
               <h5 style="color:black;"><?php echo $subleaflet->nama_leaflet; ?></h5>
               <div class="row">
                  <div class="col-xs-6 col-sm-6 col-lg-6">													 
                     <img class="leafletImg" src="<?php echo base_url()?>item_img/leafletgabungan/<?php echo $subleaflet->file; ?>" class="image" style="width: 110%;border-radius: 3px;">						
                  </div>
                  <?php $ganjil=false; }else{ ?>				
                  <div class="col-xs-6 col-sm-6 col-lg-6">
                     <img class="leafletImg" src="<?php echo base_url()?>item_img/leafletgabungan/<?php echo $subleaflet->file; ?>" class="image" style="width: 110%;border-radius: 3px;margin-left: -10px;">
                  </div>
               </div>
               <?php 
                  $ganjil=true;} }
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

         

         // ajax
         // function filter(){
         // var acuan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember","--Semua--"];
         // var bulan = $("#bulan").val();
         // for (var i = 0; i < acuan.length; i++) {
         //    if (bulan == acuan[i]) {
         //       if (i < 9) {
         //          bulan = "0" + (i+1);
         //       } else {
         //          if (i == 12) {
         //             bulan = "_%_%";
         //          } else {
         //             bulan = (i+1);
         //          }
         //       }
         //    }
         // }
         // var tahun = $("#tahun").val();
         // // alert(bulan);
         //  $.ajax({
         //      type:"POST",
         //      url: "../produk/filterDistribusi",
         //      data: "tahun_bulan=" + tahun + "-" + bulan,
         //      dataType : "html",
         //      success:function(msg){
         //          $("#table-data").html(msg);                
         //      },
         //      error:function(){
         //       alert("Search failed");
         //    }
         // });

      function filterDistribusi(){
        var acuan = ["Semua Bulan","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
        var bulan = $("#jenisBulandist").val();
        for (var i = 0; i < acuan.length; i++) {
          if (bulan == acuan[i]) {
            if (i < 10) {
              if (i == 0) {
                bulan = "00"; // bulan = "_%_%";
              } 
              else {
                bulan = "0" + (i);
              }
            } else {
                bulan = (i);
            }
          }
        }
        var tahun = $("#jenisTahundist").val();
        if (tahun == "Semua Tahun") {
          tahun = "0000"; // tahun = "_%_%_%_%";
        } 
        var komoditasdist = $("#jenisKomoditasdist").val();
          // alert("serattt=" + tahun + "-" + bulan + "-" + komoditasdist);
        $.ajax({
              type:"POST",
              url: "../produk/filterDistribusi",
              data: "serattt=" + tahun + "-" + bulan + "-" + komoditasdist,
              dataType : "html",
              success:function(msg){
                 $("#table-data").html(msg);               
              },
              error:function(){
                alert("Search failed");
              }
        });
      
      }
      </script>
      <!-- END OF MODALS -->

   </body>
   <br><br><br>
</html>
