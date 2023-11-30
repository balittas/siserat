<div class="table-responsive">
    <table class="table table-hover" style="text-align: center;">
                    <thead style="background-color: rgba(28,69,26,0.9);border-bottom: 0px solid white; color:#fece00;">
                      <tr>                                
                        <th style="text-align:center;">No</th>
                        <th style="text-align:center;">Nama Benih</th>                                
                        <th style="text-align:center;">Asal</th>                              
                        <th style="text-align:center;">Tahun Panen</th>                              
                        <th style="text-align:center;">Kelas</th>
                        <th style="text-align:center;">Stok Bulan Terakhir</th>  
                        <th style="text-align:center;">Stok Sampai</th>                                
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $no = 1;     
                        $jumlah=0;                                     
                        foreach ($dataStokBenihFiltered as $row) {   
                        $jumlah+=$row["stok_bulan_terakhir"];  
                      ?>
                      <tr >
                        <td style="text-align:center;"><?php echo $no; ?></td>                                
                        <td style="text-align:center;"><?php echo "$row[nama_benih]"; ?></td>                              
                        <td style="text-align:center;"><?php echo "$row[asal]"; ?></td>                         
                        <td style="text-align:center;"><?php echo "$row[tahun_panen]"; ?></td>
                        <td style="text-align:center;"><?php echo "$row[kelas]"; ?></td>
                        <td style="text-align:center;"><?php echo "$row[stok_bulan_terakhir]"; ?></td>
                        <td style="text-align:center;"><?php echo "$row[stok_sampai]"; ?></td>
                        
                      </tr>
                      <?php                                 
                          $no++;
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