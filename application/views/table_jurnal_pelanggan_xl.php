
<table border="0">
  <td colspan="10">
                  <?php echo $pelanggan->nama_pembeli?> - <?php echo $pelanggan->hp_pembeli?> - <?php echo rupiah($pelanggan->saldo)?> - <?php echo @$tgl_awal ?> sd   <?php echo @$tgl_akhir ?>
  </td>


</table>



              <div class="alert alert-info">
              <form id="go_trx_jurnal_pel">
                  <div class="col-sm-5">
                      <input type="text" class="form-control datepicker" name="tgl_awal" id="tgl_awal"  value="<?php echo @$tgl_awal ?>" autocomplete="off">
                  </div>
                  <div class="col-sm-5">
                    <input type="text" class="form-control datepicker" name="tgl_akhir" id="tgl_akhir"  value="<?php echo @$tgl_akhir ?>" autocomplete="off">
                  </div>
                  <div class="col-sm-2">
                    <input type="submit" class="btn btn-primary btn-block" value="Go">
                  </div>
              </form>
              <div style="clear: both"></div>
            </div>


         <table class="table table-bordered" id="tbl_jurnal" border="1">
           <thead>
             <tr>
                <th>No.</th>
                <th>Id.Trx</th>
                <th>Tanggal</th>
                <th>Group Trx</th>
                <th>Keterangan</th>
                <th>Bukti</th>
                <th>Debet</th>
                <th>Kredit</th>
                <th>Saldo</th>
             </tr>
           </thead>
           <tbody>
             <?php 
             $no=0;         
             $total=0;    
             $tot_debet=0;
             $tot_kredit=0;
              foreach ($all as $key) {
                $no++;
                $total+=$key->saldo;
                $tot_debet+=$key->debet;
                $tot_kredit+=$key->kredit;

                echo "
                  <tr>
                    <td>$no</td>
                    <td>$key->id</td>
                    <td>".($key->tanggal)."</td>
                    <td>$key->group_trx</td>
                    <td>$key->keterangan</td>
                    <td><a href='".base_url()."/uploads/$key->url_bukti' target='blank' >$key->url_bukti</a></td>

                    <td style='text-align:right'>".rupiah($key->debet)."</td>
                    <td style='text-align:right'>".rupiah($key->kredit)."</td>
                    <td style='text-align:right'>".rupiah($key->saldo)."</td>
                  </tr>
                ";
              }
             ?>
             
           </tbody>
          
           <tfoot>
             <tr>
                <th colspan='8' style='text-align:right'><b>Total</b></th>
                
                <th style='text-align:right'><b>Rp.<?php echo rupiah($pelanggan->saldo)?></b></th>
             </tr>
           </tfoot>
         
         </table>


