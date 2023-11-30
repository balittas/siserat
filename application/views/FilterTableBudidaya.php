<table class="table table-striped table-hover">
              <thead>
                <tr>                                
                  <th>No</th>
                  <th>Judul</th>                                
                  <th>Deskripsi Singkat</th>                              
                  <th>Penulis</th>                              
                  <th>File</th>
                  <th>URL</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $no = 1;                                          
                  foreach ($dataBudidayaFiltered as $row) { 
                    $url_c = ""; 
                    if (strlen($row['URL']) != 0) {
                      $url_c = substr($row['URL'], 0, 5).' ...';
                    }  
                ?>
                <tr >
                  <td><?php echo $no; ?></td>                                
                  <td><?php echo "$row[judul]"; ?></td>                              
                  <td><?php echo "$row[cuplikan_monograf]"; ?></td>                         
                  <td><?php echo "$row[penulis]"; ?></td>
                  <td><?php echo "$row[file]"; ?></td>
                  <td><?php echo $url_c; ?></td>
                  <td>
                    <a href="#tomboleditbudidaya" class="edit" onclick="modal_edit_budidaya(
                    '<?php echo $row['id_serat']; ?>',
                    '<?php echo $row['nama_serat']; ?>',
                    '<?php echo $row['id_detail_monograf']; ?>',
                    '<?php echo $row['judul']; ?>',
                    '<?php echo $row['cuplikan_monograf']; ?>',
                    '<?php echo $row['penulis']; ?>',
                    '<?php echo $row['file']; ?>',
                    '<?php echo $row['URL']; ?>'
                    );"><i class="fa fa-pencil-square-o" data-toggle="tooltip" title="Edit" aria-hidden="true"></i></a>
                    <a href="" class="delete" data-toggle="modal" onclick="confirm_modal_budidaya('<?php echo $row['id_detail_monograf']; ?>');"><i class="fa fa-trash-o" data-toggle="tooltip" title="Delete" aria-hidden="true"></i></a>      
                  </td>
                </tr>
                <?php                                 
                    $no++;
                  }
                ?>
              </tbody>
            </table>