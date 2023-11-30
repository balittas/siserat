<table class="table table-striped table-hover">
              <thead>
                <tr>                                
                  <th>No</th>
                  <th>Nama Benih</th>                                
                  <th>Asal</th>                              
                  <th>Tahun Panen</th>                              
                  <th>Kelas</th>
                  <th>Stok Bulan Terakhir (kg)</th>  
                  <th>Stok Sampai</th>                                
                  <th>Aksi</th>                              
                </tr>
              </thead>
              <tbody>
                <?php 
                  $no = 1;                                          
                  foreach ($dataStokBenihFiltered as $row) {    
                ?>
                <tr >
                  <td><?php echo $no; ?></td>                                
                  <td><?php echo "$row[nama_benih]"; ?></td>                              
                  <td><?php echo "$row[asal]"; ?></td>                         
                  <td><?php echo "$row[tahun_panen]"; ?></td>
                  <td><?php echo "$row[kelas]"; ?></td>
                  <td><?php echo "$row[stok_bulan_terakhir]"; ?></td>
                  <td><?php echo "$row[stok_sampai]"; ?></td>
                  <td>


                    <a href="#editstokbenih" class="edit"  onclick="confirm_modal_editstokbenih(
                   '<?php echo $row['id_benih']; ?>',
                   '<?php echo $row['id_stok_benih']; ?>',
                   '<?php echo $row['nama_benih']; ?>',
                   '<?php echo $row['id_serat']; ?>',
                   '<?php echo $row['asal']; ?>',
                   '<?php echo $row['tahun_panen']; ?>',
                   '<?php echo $row['kelas']; ?>',
                   '<?php echo $row['stok_bulan_terakhir']; ?>',
                   '<?php echo $row['stok_sampai']; ?>')"><i class="fa fa-pencil-square-o" data-toggle="tooltip" title="Edit" aria-hidden="true"></i></a>

                    <a href="" class="delete" data-toggle="modal" onclick="confirm_modal_stokbenih('<?php echo $row['id_stok_benih']; ?>');"><i class="fa fa-trash-o" data-toggle="tooltip" title="Delete" aria-hidden="true"></i></a>     

                  </td>
                </tr>
                <?php                                 
                    $no++;
                  }
                ?>
              </tbody>
            </table>