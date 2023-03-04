
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
                <select name="id_pelanggan" id="id_pelanggan" class="form-control select2" >
                  <option value=""> --- pilih Pelanggan --- </option>
                  <?php 
                    
                    foreach($pelanggan as $pel)
                    {
                      if($pel->id_pelanggan==$id_pelanggan)
                      {
                        $sel="selected";
                      }else{
                        $sel="";
                      }
                      echo "
                        <option value='$pel->id_pelanggan' $sel>$pel->id_pelanggan - $pel->nama_pembeli</option>
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
              <th>Satuan</th>                                   
              <th>Pilih</th>                     
              
              
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
                <td>$x->grup_penjualan  <br><a href='".base_url()."index.php/barang/struk_penjualan/".$x->grup_penjualan."' target='blank'>detail</a></td>                
                <td>$x->nama_pembeli -[ $x->id_pelanggan ]</td>    
                <td>$x->group_satuan</td>                               
                            
                <td><input type='checkbox' name='array_gruup[]' value='$x->grup_penjualan'></td>

              </tr>
          ");
          
        }
        
        
        ?>
      </tbody>

  </table>
  <div class="alert" style="text-align:right">
    <button class="btn btn-primary" id="go_packing">Go Packing</button>
  </div>
</div>


        </div>


      </div>
      <!-- /.box -->

</section>
    <!-- /.content -->







<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Form Packing</h4>
      </div>
      <div class="modal-body">
          <form id="form_tambah_packing">
            <input type="hidden" name="id_pelanggan_form" id="id_pelanggan_form" class="form-control" readonly="readonly">            

            <div class="col-sm-4">Nama Pelanggan</div>
            <div class="col-sm-8"><input type="text" name="" id="nama_form" required="required" class="form-control" placeholder="nama_form"></div>
            <div style="clear: both;"></div><br>
        
            <table class="table table-bordered" >
              <thead>
              <tr>
                  <th width="10px">No.</th><th>Kode TRX</th>
              </tr>
            </thead>
              <tbody id="t4_kode">

              </tbody>
            </table>
          <input type="hidden" name="comma_kode_trx" id="comma_kode_trx"  class="form-control" placeholder="nama_form">

            <div class="col-sm-4">Status packing</div>
            <div class="col-sm-8">
              <select name="status_packing" id="status_packing" required="required" class="form-control" placeholder="status_packing">
                <option value="">--- Pilih --- </option>
                <option value="belum">belum</option>
                <option value="sudah">sudah</option>
              </select>
            </div>
            <div style="clear: both;"></div><br>

           <div class="col-sm-4">Keterangan</div>
            <div class="col-sm-8"><textarea type="text" name="keterangan" id="keterangan" required="required" class="form-control" placeholder="keterangan"></textarea></div>
            <div style="clear: both;"></div><br>

            <div id="t4_info_form"></div>
            <button type="submit" class="btn btn-primary"> Simpan </button>
          </form>

          <div style="clear: both;"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



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
    var id_pelanggan  = $("#id_pelanggan").val();
    if( (new Date(mulai).getTime() > new Date(selesai).getTime()))
    {
      alert("Perhatikan pengisian tanggal. Ada yang salah.");
      return false;
    }

    eksekusi_controller('<?php echo base_url()?>index.php/barang/packing/?id_pelanggan='+id_pelanggan+'&mulai='+mulai+'&selesai='+selesai+'&id_cabang='+id_cabang,'Laporan Penjualan');
  return false;
})




$("#go_packing").on("click",function(e){
  e.preventDefault();
    var searchIDs = $("#tbl_datanya_barang input:checkbox:checked").map(function(){
      return $(this).val();
    }).get(); // <----
    

    var id_pelanggan = $("#id_pelanggan").val();
    var nama = $( "#id_pelanggan option:selected" ).text();


    $("#id_pelanggan_form").val(id_pelanggan);
    $("#nama_form").val(nama);

    $("#t4_kode").empty();
    $("#comma_kode_trx").val("");
    var comma_kode_trx_val = "";
    var i=0;
    $.each(searchIDs,function(a,b){
      i++;
      //console.log(b);
      $("#t4_kode").append("<tr><td>"+i+"</td><td>"+b+"</tr>");
      comma_kode_trx_val+=b+",";      

    })

    $("#comma_kode_trx").val(comma_kode_trx_val);

    $("#myModal").modal('show');

    /*
    $.post("<?php echo base_url()?>index.php/barang/go_packing",{grup_penjualan_array:searchIDs},function(x){
        console.log(x);
    })
    */
})




$("#form_tambah_packing").on("submit",function(){
  
  var ser = $(this).serialize();
  
  $.post("<?php echo base_url()?>index.php/barang/go_packing",ser,function(x){
        console.log(x);

        $("#t4_info_form").html("<div class='alert alert-success'>Berhasil.</div>").fadeIn().delay(3000).fadeOut();
                  setTimeout(function(){
                    $("#myModal").modal('hide');
                  },3000);
    })

  return false
})




$("#myModal").on("hidden.bs.modal", function () {

  var mulai   = $("#mulai").val();
    var selesai  = $("#selesai").val();
    var id_cabang  = $("#id_cabang").val();
    var id_pelanggan  = $("#id_pelanggan").val();
  eksekusi_controller('<?php echo base_url()?>index.php/barang/data_packing/?id_pelanggan='+id_pelanggan+'&mulai='+mulai+'&selesai='+selesai+'&id_cabang='+id_cabang,'History Packing');


});





$("#download_pdf").on("click",function(){
  var ser = $("#go_trx_jurnal").serialize();
  var url="<?php echo base_url()?>index.php/barang/lap_penjualan_excel/?"+ser;
  window.open(url);

  return false;
})

$(document).ready(function(){

  $('#tbl_datanya_barang').dataTable();

});

$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

})

$("#judul2").html("DataTable "+document.title);
</script>
