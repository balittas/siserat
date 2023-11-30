<table class="table table-striped table-hover">
              <thead>
                <tr>                                
                  <th>No</th>
                  <th>Nama Varietas</th>                                
                  <th>Spesifikasi</th>                              
                  <th>Tanggal Pelepasan</th>                              
                  <th>File Gambar</th>
                  <th>File SK</th>    
                  <th>URL</th>                            
                  <th>Tanggal Upload</th>                                
                  <th>Waktu Upload</th>
                  <th>Deskripsi</th>  
                  <th>Aksi</th>                              
                </tr>
              </thead>
              <tbody>
                <?php 
                  $no = 1;                                          
                  foreach ($dataVarietasFiltered  as $row) {  
                    $deskripsivar_cut = ""; 
                    if (strlen($row['deskripsi_varietas']) != 0) {
                      $deskripsivar_cut = substr($row['deskripsi_varietas'], 0, 50).' ...';
                    }   
                    $url_cut = ""; 
                    if (strlen($row['URLV']) != 0) {
                      $url_cut = substr($row['URLV'], 0, 5).' ...';
                    }     
                ?>
                <tr >
                  <?php 
                    $atr = array();
                    $ket = array();
                    $count1 = 0;   
                    $count2 = 0;                                                                    
                    foreach ($datadetail_varietasFilter as $value) {  
                      if ($row['id_varietas']==$value['id_varietas']) {
                        $atr[$count1] = $value['nama_atribut'];
                        $ket[$count2] = $value['detail_value'];                             
                        $count1++;   
                        $count2++;                                      
                      }
                    }
                    $idv = $row['id_varietas'];                                     
                  ?>

                  <td><?php echo $no; ?></td>                                
                  <td><?php echo "$row[nama_varietas]"; ?></td>                              
                  <td>

                  <script>                                   
                    window['atr' + <?php echo $no; ?>] = [
                      <?php
                        for ($i=0; $i < $count1-1; $i++) {                                              
                          echo '"'.$atr[$i].'",';
                        }
                        echo '"'.$atr[$count1-1].'"'; 
                      ?>                                    
                    ];                                    
                    window['val' + <?php echo $no; ?>] = [
                      <?php
                        for ($i=0; $i < $count2-1; $i++) {                                              
                          echo '"'.$ket[$i].'",';
                        }
                        echo '"'.$ket[$count2-1].'"'; 
                      ?> 
                    ];
                  </script>
                    <a href="#spesifikasi" style="font-weight: unset;" onclick="modal_detail(
                      '<?php echo "$idv"; ?>',
                      window['atr' + <?php echo $no; ?>],
                      window['val' + <?php echo $no; ?>]
                      )">                                    
                      <button class="btn btn-warning">Spesifikasi</button>
                    </a>
                  </td>
                  <?php
                      $namasrt = $row['nama_serat'];
                      $idvar = $row['id_varietas'];
                      $namavar = $row['nama_varietas'];
                      $tgl = $row['tanggal_pelepasan'];
                      $file1 = $row['file_SK'];
                      $urlvarietas = $row['URLV'];
                      $file2 = $row['file_gambar'];
                      $desk = $row['deskripsi_varietas'];
                   ?>       
                  <td><?php echo $row['tanggal_pelepasan']; ?></td>                         
                  <td><?php echo $row['file_gambar']; ?></td>
                  <td><?php echo $row['file_SK']; ?></td>
                  <td><?php echo $url_cut; ?></td>
                  <td><?php echo $row['tanggal_upload']; ?></td>
                  <td><?php echo $row['waktu_upload']; ?></td>
                  <td><?php echo $deskripsivar_cut; ?></td>
                  <td>
                    <a href="#tomboleditvar" class="edit" onclick="modal_edit_var('<?php echo "$namasrt"; ?>','<?php echo "$idvar"; ?>','<?php echo "$namavar"; ?>','<?php echo "$tgl"; ?>','<?php echo "$file1"; ?>','<?php echo "$urlvarietas"; ?>','<?php echo "$file2"; ?>','<?php echo "$desk"; ?>');">
                        <i class="fa fa-pencil-square-o" data-toggle="tooltip" title="Edit" aria-hidden="true"></i>
                    </a>
                    <a href="" class="delete" data-toggle="modal" onclick="confirm_modal_varietas('<?php echo $row['id_varietas']; ?>');"><i class="fa fa-trash-o" data-toggle="tooltip" title="Delete" aria-hidden="true"></i></a> 
                  </td>
                </tr>
                <?php                                 
                    $no++;
                  }
                ?>
              </tbody>
            </table>