
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 id="judul">
        Selamat datang di POS
        <small></small>
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
          <h3 class="box-title" id="judul2"></h3>

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
          <form id="go_trx_jurnal">
              <div class="col-sm-2">
                  <input type="text" class="form-control datepicker" name="mulai" id="mulai"  value="<?php echo $mulai ?>" autocomplete="off">
              </div>
              <div class="col-sm-2">
                <input type="text" class="form-control datepicker" name="selesai" id="selesai"  value="<?php echo $selesai ?>" autocomplete="off">
              </div>

              <div class="col-sm-3">
                <select name="id_barang" id="id_barang" class="form-control select2">
                  <option value=""> --- pilih Barang --- </option>
                  <?php 
                    
                    foreach($barang as $bar)
                    {
                      if($bar->id==$id_barang)
                      {
                        $sel="selected";
                      }else{
                        $sel="";
                      }
                      echo "
                        <option value='$bar->id' $sel>$bar->id - $bar->nama_barang</option>
                      ";
                    }
                  ?>                  
              </select>
              </div>

              <div class="col-sm-3">
                <select name="id_cabang" id="id_cabang" class="form-control">
                  <option value=""> --- pilih Cabang --- </option>
                  <?php 
                    $data_cabang = $this->m_cabang->m_data_cabang();
                    foreach($data_cabang as $cabang)
                    {
                      if($cabang->id_cabang==$id_cabang)
                      {
                        $sel="selected";
                      }else{
                        $sel="";
                      }
                      echo "
                        <option value='$cabang->id_cabang' $sel>$cabang->kode_cabang - $cabang->nama_cabang</option>
                      ";
                    }
                  ?>                  
              </select>
              </div>


              <div class="col-sm-2">
                <input type="submit" class="btn btn-primary btn-block" value="Go">
              </div>
          </form>          
          <div style="clear: both"></div>
          </div>

<div class="table-responsive">              
<table id="tbl_datanya_barang" class="table  table-striped table-bordered"  cellspacing="0" width="100%">
      <thead>
        <tr>
              
              <th>No</th>                    
              <th>Kasir</th>                     
              <th>Tanggal</th>                                               
              <th>Kode Trx.</th>                     
              <th>Kepada</th>                     
              <th>Sub Total</th>                     
              <th>Diskon</th>                     
                          
              <th>Saldo</th>                     
              <th>Total</th>                     
              
              <th>Qty</th>                     
              <th>Jenis TRX</th>                     
              <th>Struk</th>                     
              
              
        </tr>
      </thead>
      <tbody>
        <?php
        $total_all=0;         
        $no = 0;
        $tot_qty=0;
        foreach($all as $x)
        {
          $total = $x->total-$x->saldo-$x->diskon;
          $total_all+=$total;
          $tot_qty+=$x->jumlah;
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
                <td align=right>".rupiah($x->saldo)."</td>                
                <td align=right>".rupiah($total)."</td>                
                
                <td align=right>".rupiah($x->jumlah)."</td>                
                <td align=right>$x->cara_bayar</td>                
                <td><a href='".base_url()."index.php/barang/struk_penjualan/".$x->grup_penjualan."' target='blank'>Print</a></td>                                
              </tr>
          ");
          
        }
        
        
        ?>
      </tbody>
       <tfoot>
             <tr>
                <th colspan='8' style='text-align:right'><b>Total</b></th>
                <th style='text-align:right'><b>Rp.<?php echo rupiah($total_all)?></b></th>
                <th style='text-align:right'><b><?php echo rupiah($tot_qty)?></b></th>
             </tr>
           </tfoot>
  </table>
</div>


        </div>

 <?php
    if ($this->session->userdata('level') == '1') {

    ?>
        <input type="button" class="btn btn-primary" value="Download" id="download_pdf">
        <?php } ?>
      </div>
      <!-- /.box -->

</section>
    <!-- /.content -->




<script>
console.log("<?php echo $this->router->fetch_class();?>");
var classnya = "<?php echo $this->router->fetch_class();?>";

$('.datepicker').datepicker({
  autoclose: true,
  format: 'yyyy-mm-dd' 
})


$("#go_trx_jurnal").on("submit",function(){
    var mulai   = $("#mulai").val();
    var selesai  = $("#selesai").val();
    var id_cabang  = $("#id_cabang").val();
    var id_barang  = $("#id_barang").val();
    if( (new Date(mulai).getTime() > new Date(selesai).getTime()))
    {
      alert("Perhatikan pengisian tanggal. Ada yang salah.");
      return false;
    }

    eksekusi_controller('<?php echo base_url()?>index.php/barang/lap_penjualan_per_barang/?id_barang='+id_barang+'&mulai='+mulai+'&selesai='+selesai+'&id_cabang='+id_cabang,'Laporan Penjualan');
  return false;
})



$("#download_pdf").on("click",function(){
   var mulai   = $("#mulai").val();
    var selesai  = $("#selesai").val();
    var id_cabang  = $("#id_cabang").val();
    var id_barang  = $("#id_barang").val();
  var url='<?php echo base_url()?>index.php/barang/lap_penjualan_per_barang_xl/?id_barang='+id_barang+'&mulai='+mulai+'&selesai='+selesai+'&id_cabang='+id_cabang;
  window.open(url);

  return false;
})

$(document).ready(function(){

  //$('#tbl_datanya_barang').dataTable();

});
$("#judul2").html("DataTable "+document.title);

$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

})
</script>
