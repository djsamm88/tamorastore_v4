
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 id="judul">
        
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
          <h3 class="box-title">Data</h3>

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
              <div class="col-sm-3">
                <select name="id_admin" id="id_admin" class="form-control">
                  <option value=""> --- pilih Admin --- </option>
                  <?php 
                    $data_admin = $this->m_admin->m_data_admin();
                    foreach($data_admin as $adm)
                    {
                      if($adm->id_admin==$id_admin)
                      {
                        $sela="selected";
                      }else{
                        $sela="";
                      }
                      echo "
                        <option value='$adm->id_admin' $sela>$adm->nama_admin - $adm->id_admin</option>
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
    <button class='btn btn-primary ' onclick='tambah_data();return false;'>Tambah Data</button>   
  <table id="tbl_newsnya" class="table  table-striped table-bordered"  cellspacing="0" width="100%">
      <thead>
        <tr>
              
              <th>No</th>
               <th width="100px">id</th>
                <th>Jenis</th>
                <th>Deskripsi</th>
                <th>Tanggal</th>
                <th>Nama Admin</th>
                <th>Url Bukti</th>
                
              <th>Jumlah</th>
              <th>Debet</th>
              <th>Kredit</th>
              <th>Saldo</th>
              
        </tr>
      </thead>
      <tbody>
        <?php         
        $no = 0;
        $saldo=0;
        foreach($all as $x)
        {
          
          
          $no++;

          if($x->jenis=='masuk')
          {
            $debet=$x->jumlah;
          }else{
            $debet=0;
          }

          if($x->jenis=='keluar')
          {
            $kredit=$x->jumlah;
          }else{
            $kredit=0;
          }

          $saldo+=$debet;
          $saldo-=$kredit;

         
            echo (" 
              
              <tr>
                <td>$no</td>
                <td>$x->id</td>
                <td>$x->jenis</td>
                <td>$x->deskripsi</td>                
                <td>$x->tanggal</td>
                <td>$x->nama_admin</td>
                <td><a href='".base_url()."uploads/$x->url_bukti' target='blank'>$x->url_bukti</a></td>
                <td>".rupiah($x->jumlah)." 
                <td>".rupiah($debet)." 
                <td>".rupiah($kredit)." 
                <td>".rupiah($saldo)." 
                </td>
                
              </tr>
          ");
          
        }
        
        
        ?>
      </tbody>
  </table>
<input type="button" onclick="download();return false;" class="btn btn-primary btn" value="Download">

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
        <h4 class="modal-title">Form <span id="judul_modal"></span></h4>
      </div>
      <div class="modal-body">
          <form id="form_trx">
            
            <div class="col-sm-4 judul">Jenis TRX</div>
            <div class="col-sm-8">
              <select class="form-control" name="jenis" id="jenis" required>
                <option>-- Pilih Jenis --</option>
                <option value="masuk">Pemasukan</option>
                <option value="keluar">Pengeluaran</option>
              </select>
            </div>
            <div style="clear:both"></div>
            <br>


            <div class="col-sm-4 judul">Jumlah</div>
            <div class="col-sm-8">
              <input class="form-control nomor" name="jumlah" id="jumlah" type="text">
            </div>
            <div style="clear:both"></div>
            <br>



            <div class="col-sm-4 judul">Keterangan</div>
            <div class="col-sm-8">
              <textarea class="form-control" name="deskripsi" id="deskripsi" required></textarea>
            </div>
            <div style="clear:both"></div>
            <br>


            <div class="col-sm-4 judul">Gambar bukti</div>
            <div class="col-sm-8">
              <input class="form-control" name="url_bukti" id="url_bukti" type="file" accept="image/jpeg,image/gif,image/png,application/pdf,image/x-eps">
            </div>
            <div style="clear:both"></div>
            <br>





            <div id="t4_info_form"></div>
            <button type="submit" id="btn_simpan" class="btn btn-primary"> Simpan </button>
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
$('.datepicker').datepicker({
  autoclose: true,
  format: 'yyyy-mm-dd' 
})
hanya_nomor(".nomor");
/***** menghapus garis bawah ******/
$('.judul,th').text(function(i, text) {    
    return text.replace(/_/g, ' ');
});
/***** menghapus garis bawah ******/

/***** membesarkan ******/
$('.judul,th').text(function(i, text) {
    return text.toUpperCase();    
});
/***** membesarkan ******/



$(document).ready(function(){

  //$('#tbl_newsnya').dataTable();
 
});


function download()
{
  var ser= $("#go_trx_jurnal").serialize();
  var url="<?php echo base_url()?>index.php/admin/keuangan_harian_pdf/?"+ser;
  window.open(url);

  return false;
}


function tambah_data()
{
  
  $("#myModal").modal('show');
  $("#judul_modal").html("<b>Piutang</b>");
}

$("#form_trx").on("submit",function(){
  $("#t4_info_form").html("");
  $.ajax({
            url: "<?php echo base_url()?>index.php/admin/simpan_trx_keuangan",
            type: "POST",
            contentType: false,
            processData:false,
            data:  new FormData(this),
            beforeSend: function(){
                //alert("sedang uploading...");
            },
            success: function(e){
                console.log(e);
                
                $("#t4_info_form").html("<div class='alert alert-success'>Sukses! "+e+"</div>");
                $("#btn_simpan").hide();
            },
            error: function(er){
                $("#info").html("<div class='alert alert-warning'>Ada masalah! "+er+"</div>");
            }           
       });
  return false;
})


$("#go_trx_jurnal").on("submit",function(){
  var ser = $(this).serialize();
  eksekusi_controller('<?php echo base_url()?>index.php/admin/keuangan_harian/?'+ser,'Data Keuangan ');
})


$("#myModal").on("hidden.bs.modal", function () {
  eksekusi_controller('<?php echo base_url()?>index.php/admin/keuangan_harian/?mulai=<?php echo date( 'Y-m-d')?>&selesai=<?php echo date('Y-m-d',strtotime('+1 days'));?>','Data Keuangan ');
});
</script>
