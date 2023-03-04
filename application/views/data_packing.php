
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
          

<div class="table-responsive">              
<table id="tbl_datanya_barangya" class="table  table-striped table-bordered"  cellspacing="0" width="100%">
      <thead>
        <tr>
              
              <th width="10px">No</th>                                           
              <th width="130px">Tanggal</th>                                               
              <th width="160px">Kode Packing.</th>                     
              <th>Kode TRX.</th>                     
              <th>Kepada</th>                     
              <th>Ket.</th>                     
              <th>Status.</th>                     
                                 
              
              
        </tr>
      </thead>
      <tbody>
        <?php
        $total_all=0;         
        $no = 0;
        foreach($all as $x)
        {
          
          $no++;


          $xxx = explode(",",$x->grup_penjualan_coma);

          $det = "";
          for($o=0; $o<count($xxx);$o++)
          {
            $det.= $xxx[$o]."<br><a href='".base_url()."index.php/barang/struk_penjualan/".$xxx[$o]."' target='blank'>detail</a><hr><br>";
          }
            


                if($x->status_packing=='belum')
                {
                  $btn = "<button class='btn btn-primary btn-xs' onclick='setujui($x->id)'>Selesaikan</button>";
                  
                }else{
                  $btn = "&radic; ";
                }

            echo (" 
              
              <tr>
                <td>$no</td>                
                <td>".($x->tgl_update)."</td>
                <td>".($x->grup_packing)."</td>
                <td>$det </td>                
                <td>$x->nama_pembeli -[ $x->id_pelanggan ] <br> $x->hp_pembeli</td>    
                <td>$x->keterangan</td>    
                <td>$x->status_packing <br>$btn</td>    
                

              </tr>
          ");
          
        }
        
        
        ?>
      </tbody>

  </table>
  
</div>


        </div>


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

function setujui(id)
{
  //alert(id);
  if(confirm("Anda yakin sudah memeriksa?"))
  {
    $.get("<?php echo base_url()?>index.php/barang/go_update_status/"+id);
    eksekusi_controller("<?php echo base_url()?>index.php/barang/data_packing","History Packing");
  }
}

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
  eksekusi_controller('<?php echo base_url()?>index.php/barang/packing/?id_pelanggan='+id_pelanggan+'&mulai='+mulai+'&selesai='+selesai+'&id_cabang='+id_cabang,'Laporan Penjualan');
});





$("#download_pdf").on("click",function(){
  var ser = $("#go_trx_jurnal").serialize();
  var url="<?php echo base_url()?>index.php/barang/lap_penjualan_excel/?"+ser;
  window.open(url);

  return false;
})

$(document).ready(function(){

  $('#tbl_datanya_barangya').dataTable();

});

$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

})

$("#judul2").html("DataTable "+document.title);
</script>
