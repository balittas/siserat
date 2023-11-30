<table class="table table-striped table-hover">
              <thead>
                <tr>                                
                  <th>No</th>
                  <th>Nama Benih</th>                                
                  <th>Tanggal Distribusi</th>                              
                  <th>Tahun Panen</th>                              
                  <th>Kelas</th>
                  <th>Jumlah (kg)</th>  
                  <th>Keterangan</th>                                
                  <th>Aksi</th>                              
                </tr>
              </thead>
              <tbody>
                <?php 
                  $no = 1;                                          
                  foreach ($dataDistribusiFiltered as $row) {    
                ?>
                <tr>
                  <td><?php echo $no; ?></td>                                
                  <td><?php echo "$row[nama_benih]"; ?></td>                              
                  <td><?php echo "$row[tanggal]"; ?></td>                         
                  <td><?php echo "$row[tahun_panen]"; ?></td>
                  <td><?php echo "$row[kelas_benih]"; ?></td>
                  <td><?php echo "$row[jumlah_kg]"; ?></td>
                  <td><?php echo "$row[keterangan]"; ?></td>
                  <td>
                    <a href="#editdistribusibenih" class="edit" onclick="confirm_modal_editdistribusibenih(
                      '<?php echo $row['id_benih']; ?>',
                    '<?php echo $row['id_distribusi'];?>',
                    '<?php echo $row['nama_benih']; ?>',
                    '<?php echo $row['id_serat']; ?>',
                    '<?php echo $row['tanggal']; ?>',
                    '<?php echo $row['tahun_panen']; ?>',
                    '<?php echo $row['kelas_benih']; ?>',
                    '<?php echo $row['jumlah_kg']; ?>',
                    '<?php echo $row['keterangan']; ?>')"><i class="fa fa-pencil-square-o" data-toggle="tooltip" title="Edit" aria-hidden="true"></i></a>
                    <a href="" class="delete" data-toggle="modal" onclick="confirm_modal_distribusibenih('<?php echo $row['id_distribusi']; ?>');"><i class="fa fa-trash-o" data-toggle="tooltip" title="Delete" aria-hidden="true"></i></a>  
                  </td>
                </tr>
                <?php                                 
                    $no++;
                  }
                ?>
              </tbody>
            </table>
            