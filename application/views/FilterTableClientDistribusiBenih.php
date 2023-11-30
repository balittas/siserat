<!-- <table class="table table-striped table-hover">
              <thead>
                <tr>                                
                  <th>No</th>
                  <th>Varietas</th>                                
                  <th>Tanggal</th>                              
                  <th>Tahun Panen</th>                              
                  <th>Kelas</th>
                  <th>Jumlah Kg</th>  
                  <th>Keterangan</th>                                
                  <th>Aksi</th>                              
                </tr>
              </thead>
              <tbody>
                <?php 
                  $no = 1;                                          
                  foreach ($dataDistribusiFiltered as $row) {    
                ?>
                <tr >
                  <td><?php echo $no; ?></td>                                
                  <td><?php echo "$row[nama_benih]"; ?></td>                              
                  <td><?php echo "$row[tanggal]"; ?></td>                         
                  <td><?php echo "$row[tahun_panen]"; ?></td>
                  <td><?php echo "$row[kelas_benih]"; ?></td>
                  <td><?php echo "$row[jumlah_kg]"; ?></td>
                  <td><?php echo "$row[keterangan]"; ?></td>
                  <td>
                    <a href="#editdistribusibenih" class="edit" onclick=""><i class="fa fa-pencil-square-o" data-toggle="tooltip" title="Edit" aria-hidden="true"></i></a>
                    <a href="" class="delete" data-toggle="modal" onclick="confirm_modal_distribusibenih('<?php echo $row['id_distribusi']; ?>');"><i class="fa fa-trash-o" data-toggle="tooltip" title="Delete" aria-hidden="true"></i></a>  
                  </td>
                </tr>
                <?php                                 
                    $no++;
                  }
                ?>
              </tbody>
            </table> -->

               <div class="table-responsive" style="text-align: center;">
                  
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
                  foreach ($dataDistribusiFiltered as $row) {   
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