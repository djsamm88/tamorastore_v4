

    <!-- Main content -->
    <section class="content container-fluid" >

      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title" id="">Form Return</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
              

    <form id="form_return_by_grup_penjualan">
      
      <div class="row">    
      <div class="col-sm-8">
        <input type="text" class="form-control" id="grup_penjualan" name="grup_penjualan" required placeholder="Kode TRX">
      </div>
      <div class="col-sm-4">
        <button class="btn btn-primary" type="submit">Cari Kode TRX</button>
      </div>
      </div>
    </form>
    <br>
    <div id="info_cari"></div>

    </div>
    
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->












    <!-- Main content -->
    <section class="content container-fluid" >

      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title" id="">Form Return</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
              
              
              <form id="form_return">
                
                <div class="col-sm-4">
                  Nama Barang
                </div>                
                <div class="col-sm-8" id="t4_nama_barang">
                  <input type="text"   class="form-control barang" placeholder="Barang" name="nama_barang" required id="nama_barang" readonly>
                  <input type="hidden"   class="form-control" name="id_barang" id="id_barang">
                </div>
                <div style="clear: both;"></div><br>
                <div class="col-sm-4">
                  Jumlah
                </div>                
                <div class="col-sm-2" >
                  <input type="number" name="jumlah" value="1" id="jumlah_barang" class="form-control" placeholder="jumlah barang" autocomplete="off">
                </div>
                <div style="clear: both;"></div><br>

                <div class="col-sm-4">
                  Kondisi
                </div>                
                <div class="col-sm-8" >
                  <select name="kondisi" class="form-control" required="">
                      <option value="">--- Pilih Kondisi ---</option>
                      <option value="rusak">Rusak</option>
                      <option value="baik">Baik</option>
                  </select>
                </div>
                <div style="clear: both;"></div><br>


                <div class="col-sm-4">
                  Gudang
                </div>                
                <div class="col-sm-8" >
                  <select name="id_gudang" class="form-control" required="">
                      <option value="">--- Pilih Gudang ---</option>
                      <?php 
                        foreach ($this->m_gudang->m_data($this->session->userdata('id_cabang')) as $gud) {
                          echo "<option value='$gud->id_gudang'>$gud->kode_cabang - $gud->nama_cabang - $gud->nama_gudang</option>";
                        }
                      ?>
                  </select>
                </div>
                <div style="clear: both;"></div><br>

                

                <div class="col-sm-4">
                  Total Uang Kembali
                </div>
                <div class="col-sm-8" >
                  <input type="hidden" id="uang_kembali_hide">
                  <input type="text" name="uang_kembali" id="uang_kembali" class="form-control nomor" placeholder="Uang kembali" readonly>
                </div>
                <div style="clear: both;"></div><br>


                <div class="col-sm-4">
                  Nama Pelanggan
                </div>                
                <div class="col-sm-8" >
                  <input  class="form-control id_pelanggan" id="nama_pembeli" required>
                  <input type="hidden"   class="form-control" name="id_pelanggan" id="id_pelanggan" readonly>
                  
                </div>
                <div style="clear: both;"></div><br>

                <div class="col-sm-4">
                  Nama Kasir
                </div>                
                <div class="col-sm-8" >
                  <input  class="form-control nama_admin" id="nama_admin" name="nama_admin_lama" readonly>
                  <input type="hidden"   class="form-control" name="id_admin_lama" id="id_admin_lama" readonly>
                  <input type="hidden"   class="form-control" name="group_trx_lama" id="group_trx_lama" readonly>
                  
                </div>
                <div style="clear: both;"></div><br>

                <div class="col-sm-4">
                  Tgl Transaksi
                </div>                
                <div class="col-sm-8" >
                  <input  class="form-control tgl_transaksi" id="tgl_transaksi" name="" readonly>
                  
                </div>
                <div style="clear: both;"></div><br>

                <div class="col-sm-4">
                  Batas Return
                </div>                
                <div class="col-sm-8" >
                  <input  class="form-control lama_return" id="lama_return" name="" readonly>
                  <input  type="hidden" class="form-control batas_return" id="batas_return" name="" >
                  
                </div>
                <div style="clear: both;"></div><br>

                


                <div class="col-sm-4">
                  Keterangan                
                </div>
                <div class="col-sm-8" >
                  <textarea name="ket" class="form-control" required="" placeholder="Keterangan pengembalian"></textarea>
                </div>
                <div style="clear: both;"></div><br>
                
             <button type="submit" class="btn btn-warning">Return</button>

            </form>
     

    </div>
    
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->




    <!-- Main content -->
    <section class="content container-fluid" >

      <!--------------------------
        | Your Page Content Here |
        -------------------------->    
<!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title" id="judul2">History Return</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
              






<br>

<div class="alert alert-info">
          <form id="go_trx_jurnal">
              <div class="col-sm-3">
                  <input type="text" class="form-control datepicker" name="mulai" id="mulai"  value="<?php echo $mulai ?>" autocomplete="off">
              </div>
              <div class="col-sm-3">
                <input type="text" class="form-control datepicker" name="selesai" id="selesai"  value="<?php echo $selesai ?>" autocomplete="off">
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
                        if($cabang->id_cabang=='1')
                        {
                          $sel="selected";
                        }else{
                          $sel="";  
                        }
                        
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
<table id="tbl_datanya" class="table  table-striped table-bordered"  cellspacing="0" width="100%">
      <thead>
        <tr>
              
              <th>No</th>
              <th width="10px">Id Barang</th>           
              <th>Barang</th>                                           
              <th>Jumlah</th>                     
              <th>Total Uang kembali</th>                     
              <th>Dari</th>                     
                               
              <th>Kondisi</th>                     
              <th>Gudang</th>                     
              <th>Kasir</th>                     
              <th>Kode TRX</th>                     
              <th>Keterangan</th>                     
              <th>Tgl</th>
              <th>Action</th>                     
                                  
              
              
        </tr>
      </thead>
      <tbody>
        <?php         
        $no = 0;
        foreach($all as $x)
        {
          $no++;
            $btn = $x->kondisi=='rusak'?"<button class='btn  btn-block btn-xs btn-warning' onclick='kembalikan($x->id_ret)'>Kembalikan ke Suplier</button>":"";

            $btn .= "<button class='btn btn-xs btn-primary btn-block' onclick='cetak($x->id_ret)'>Cetak</button>";
            echo (" 
              
              <tr>
                <td>$no</td>
                <td>$x->id</td>
                <td>$x->nama_barang</td>                
                <td>$x->jumlah</td>                
                <td>".rupiah($x->uang_kembali)."</td>                
                <td>$x->nama_pembeli</td>                
                      
                <td>$x->kondisi</td>                
                <td>$x->nama_gudang</td>                
                <td>$x->nama_admin_lama</td>                
                <td>$x->group_trx_lama</td>                
                <td>$x->ket</td>                
                <td>$x->tgl_trx</td>                
                <td>$btn</td>                
                
              </tr>
          ");
          
        }
        
        
        ?>
      </tbody>
  </table>
</div>

<div class="text-left col-sm-6">
<a href="<?php echo base_url()?>index.php/barang/print_return_barang/?mulai=<?php echo $mulai?>&selesai=<?php echo $selesai?>" class="btn btn-primary" target="blank">Print Semua</a>
<a href="<?php echo base_url()?>index.php/barang/print_return_barang/rusak?mulai=<?php echo $mulai?>&selesai=<?php echo $selesai?>" class="btn btn-danger" target="blank">Print Rusak</a>
<a href="<?php echo base_url()?>index.php/barang/print_return_barang/baik?mulai=<?php echo $mulai?>&selesai=<?php echo $selesai?>" class="btn btn-success" target="blank">Print Baik</a>
</div>



<div class="text-right col-sm-6">
<a href="<?php echo base_url()?>index.php/barang/return_barang_xl/" class="btn btn-primary" target="blank">Semua Excel</a>
<a href="<?php echo base_url()?>index.php/barang/return_barang_xl/rusak" class="btn btn-danger" target="blank">Rusak Excel</a>
<a href="<?php echo base_url()?>index.php/barang/return_barang_xl/baik" class="btn btn-success" target="blank">Baik Excel</a>
</div>



</div>
</div>
<!-- /.box -->
</section>
    <!-- /.content -->



<script>
console.log("<?php echo $this->router->fetch_class();?>");
var classnya = "<?php echo $this->router->fetch_class();?>";


 $("html, body").animate({ scrollTop: 0 }, "slow"); 

$("#form_return_by_grup_penjualan").on("submit",function(){
    var grup_penjualan = $("#grup_penjualan").val();
    $.get("<?php echo base_url()?>index.php/barang/cari_by_grup",{grup_penjualan:grup_penjualan},function(e){
        console.log(e);
        if(e.length<=0)
        {
          $("#info_cari").html("Transaksi <b>"+ grup_penjualan+"</b> tidak ditemukan.");
        }else{


          var tabel_data = "<select id='pilih_barang' class='form-control'>";
              tabel_data +="<option value=''>--- Pilih Barang ---</option>";
          $.each(e,function(a,b){
              console.log(b.nama_barang);
                tabel_data +="<option value='"+b.id_barang+"'>"+b.nama_barang+" | "+b.harga_jual+"</option>";

                $("#nama_pembeli").val(b.nama_pembeli);
                $("#id_pelanggan").val(b.id_pelanggan);
                $("#id_admin_lama").val(b.id_admin);
                $("#nama_admin").val(b.nama_admin);
                $("#group_trx_lama").val(grup_penjualan);
                $("#tgl_transaksi").val(b.tgl_transaksi);
                

                
                $("#lama_return").val(b.lama_return+" hari - Sampai dengan "+b.batas_return);
                $("#batas_return").val(b.batas_return);

                
          })
              tabel_data += "</select>";

          $("#info_cari").html(tabel_data);
        }

    })

    return false;
})

function addDays(date, days) {
  var result = new Date(date);
  result.setDate(result.getDate() + days);
  return result;
}

/*
$("#jumlah_barang").on("keydown keyup mousedown mouseup select contextmenu drop",function(){
      var harga = $("#uang_kembali").val();
      var jum = $("#jumlah_barang").val();

      $("#uang_kembali").val(harga*jum);
})
*/


$("#info_cari").on("change"," #pilih_barang",function(){
  var id_barang = $(this).val();
  var nama_barang = $('#info_cari option:selected').text();
  console.log(id_barang);

  var uang_kembali = nama_barang.split("|")[1];
  
  $("#id_barang").val(id_barang);
  $("#nama_barang").val(nama_barang.split("|")[0]);
  $("#uang_kembali").val(uang_kembali.trim());
  $("#uang_kembali_hide").val(uang_kembali.trim());

})



<?php
$o=''; 
foreach($all_barang as $barang)
{
 $o.='{
        value:"'.$barang->id.'",
        label:"'.htmlentities($barang->nama_barang).'",
        stok:"'.htmlentities($barang->qty).'",
        harga_retail:"'.htmlentities($barang->harga_retail).'",
        harga_lusin:"'.htmlentities($barang->harga_lusin).'",
        harga_koli:"'.htmlentities($barang->harga_koli).'",
        jum_per_koli:"'.htmlentities($barang->jum_per_koli).'"
      },';
} 
?>


<?php
$p=''; 
foreach($this->m_pelanggan->m_data() as $pelanggan)
{
 $p.='{
        value:"'.$pelanggan->id_pelanggan.'",
        label:"'.htmlentities($pelanggan->nama_pembeli).'"
      },';
} 
?>



$( function() {
    var semuaBarang = [
      <?php echo $o?>
    ];
    $( ".barang" ).autocomplete({
      source: semuaBarang,
                      minLength: 1,
                select: function(event, ui) {
                  console.log(ui);
                 

                $(this).val(ui.item.label);
                $("#id_barang").val(ui.item.value);
                $("#uang_kembali").val(ui.item.harga_retail);
                $("#uang_kembali_hide").val(ui.item.harga_retail);
                return false;
                }



    });


});



$( function() {
    var semuaPelanggan = [
      <?php echo $p?>
    ];
    $( ".id_pelanggan" ).autocomplete({
      source: semuaPelanggan,
                      minLength: 1,
                select: function(event, ui) {
                  console.log(ui);
                 

                $(this).val(ui.item.label);
                $("#id_pelanggan").val(ui.item.value);                
                return false;
                }



    });


});

function kembalikan(id)
{
  if(confirm("Anda yakin mengembalikan ke Suplier?"))
  {
    $.get("<?php echo base_url()?>index.php/barang/return_barang_ke_suplier/"+id,function(e){
        eksekusi_controller('<?php echo base_url()?>index.php/barang/return_barang','Return Barang');
        console.log(e);

    })
  }
  return false;
}
function buang_titik(mystring)
{
  return (mystring.replace(/\./g,''));
}


$("#jumlah_barang").on("keydown keyup mousedown mouseup select contextmenu drop",function(){
    var jum   = parseInt(buang_titik($(this).val()));
    var uang  = parseInt(buang_titik($("#uang_kembali_hide").val()));

    console.log(jum);
    console.log(uang);
    var hasil_kali = jum*uang;

    console.log(hasil_kali);
    if(isNaN(hasil_kali))
    {
      hasil_kali=0;
    }
    $("#uang_kembali").val(hasil_kali);
})

$("#form_return").on("submit",function(){
  console.log($(this).serialize());

  if(new Date($("#batas_return").val())<new Date("<?php echo date('Y-m-d H:i:s')?>"))
  {
    alert("return barang tidak bisa lagi.");
    return false
  }else{
    if(confirm("Anda yakin?"))
    {
      $.post("<?php echo base_url()?>index.php/barang/go_return_barang",$(this).serialize(),function(e){
        cetak(e);
        eksekusi_controller('<?php echo base_url()?>index.php/barang/return_barang','Return Barang');
      })
    }  
  }

  
  return false;
})

function cetak(id_ret)
{
  window.open("<?php echo base_url()?>index.php/barang/cetak_return_by_id/"+id_ret); 
}

$(document).ready(function(){

  $('#tbl_datanya').dataTable();

});

hanya_nomor(".nomor");




$('.datepicker').datepicker({
  autoclose: true,
  format: 'yyyy-mm-dd' 
})





$("#go_trx_jurnal").on("submit",function(){
    var mulai   = $("#mulai").val();
    var selesai  = $("#selesai").val();
    var id_cabang  = $("#id_cabang").val();
    
    if( (new Date(mulai).getTime() > new Date(selesai).getTime()))
    {
      alert("Perhatikan pengisian tanggal. Ada yang salah.");
      return false;
    }

    eksekusi_controller('<?php echo base_url()?>index.php/barang/return_barang/?mulai='+mulai+'&selesai='+selesai+'&id_cabang='+id_cabang,'Laporan Penjualan');
  return false;
})



</script>
