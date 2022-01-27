                    <?php 
                    foreach($barang as $bar)
                    {
                      if($bar->id==$id_barang)
                      {
                        echo "
                                $bar->id - $bar->nama_barang 
                              ";
                      }

                      
                    }
                  ?>            
                  <?php 
                    $data_cabang = $this->m_cabang->m_data_cabang();
                    foreach($data_cabang as $cabang)
                    {
                      if($cabang->id_cabang==$id_cabang)
                      {
                        echo "
                        $cabang->kode_cabang - $cabang->nama_cabang
                      ";
                      }
                    }
                  ?>   
                  

<table id="tbl_datanya_barang" class="table  table-striped table-bordered"  border=1 cellspacing="0" width="100%">
      <thead>
        <tr>
              
              <th>No</th>                    
              <th>Kasir</th>                     
              <th>Tanggal</th>                                               
              <th>Kode Trx.</th>                     
              <th>Kepada</th>                     
              <th>Sub Total</th>                     
              <th>Diskon</th>                     
              <th>Ekspedisi</th>                     
              <th>Transport Ke Ekspedisi</th>                     
              <th>Saldo</th>                     
              <th>Total</th>                     
              <th>Struk</th>                     
              
              
        </tr>
      </thead>
      <tbody>
        <?php
        $total_all=0;         
        $no = 0;
        foreach($all as $x)
        {
          $total = $x->total-$x->saldo-$x->diskon+($x->harga_ekspedisi+$x->transport_ke_ekspedisi);
          $total_all+=$total;
          $no++;
            
            echo (" 
              
              <tr>
                <td>$no</td>                
                <td>".($x->nama_admin)." <br>".($x->email_admin)."</td>
                <td>".($x->tgl_transaksi)."</td>
                <td>$x->grup_penjualan</td>                
                <td>$x->nama_pembeli -[ $x->id_pelanggan ]</td>                
                <td align=right>".rupiah($x->total)."</td>                
                <td align=right>".rupiah($x->diskon)."</td>                
                <td align=right>".rupiah($x->harga_ekspedisi)."</td>                
                <td align=right>".rupiah($x->transport_ke_ekspedisi)."</td>                
                <td align=right>".rupiah($x->saldo)."</td>                
                <td align=right>".rupiah($total)."</td>                
                <td><a href='".base_url()."index.php/barang/struk_penjualan/".$x->grup_penjualan."' target='blank'>Print</a></td>                                
              </tr>
          ");
          
        }
        
        
        ?>
      </tbody>
       <tfoot>
             <tr>
                <th colspan='10' style='text-align:right'><b>Total</b></th>
                <th style='text-align:right'><b>Rp.<?php echo rupiah($total_all)?></b></th>
             </tr>
           </tfoot>
  </table>

