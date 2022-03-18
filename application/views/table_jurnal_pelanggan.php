
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 id="judul">
        Selamat datang di Sistem Informasi 
        
      </h1>      
    </section>

    <!-- Main content -->
    <section class="content container-fluid" >

      <!--------------------------
        | Your Page Content Here |
        -------------------------->    
<!-- Default box -->
      

<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title" id="judul2">Transaksi Pengguna</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="alert alert-info">
          
              <div class="col-sm-4">
                  <?php echo $pelanggan->nama_pembeli?>
              </div>
              <div class="col-sm-4">
                <?php echo $pelanggan->hp_pembeli?>
              </div>
              <div class="col-sm-4">
                <?php echo rupiah($pelanggan->saldo)?>
              </div>
          
          <div style="clear: both"></div>
        </div>



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


         <table class="table table-bordered" id="tbl_jurnal">
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



      </div>
      
      <input type="button" class="btn btn-primary" value="Download" id="download_pdf">
      
      <!-- /.box -->
    </div>
</section>
    <!-- /.content -->

<script type="text/javascript">
  $('.datepicker').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd' 
  })
$("#download_pdf").on("click",function(){
    var tgl_awal = $("#tgl_awal").val();
    var tgl_akhir = $("#tgl_akhir").val();
    var id_pelanggan = "<?php echo $id_pelanggan?>";
  var url='<?php echo base_url()?>index.php/laporan_keuangan/laporan_jurnal_pelanggan_xl/?id_pelanggan='+id_pelanggan+'&tgl_awal='+tgl_awal+'&tgl_akhir='+tgl_akhir;
  window.open(url);

  return false;
})





$("#go_trx_jurnal_pel").on("submit",function(){
    var tgl_awal = $("#tgl_awal").val();
    var tgl_akhir = $("#tgl_akhir").val();
    var id_pelanggan = "<?php echo $id_pelanggan?>";
    eksekusi_controller('<?php echo base_url()?>index.php/laporan_keuangan/laporan_jurnal_pelanggan/?id_pelanggan='+id_pelanggan+'&tgl_awal='+tgl_awal+'&tgl_akhir='+tgl_akhir,'Transaksi Pelanggan');

    return false;
})
</script>