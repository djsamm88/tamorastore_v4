
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 id="judul">
        Selamat datang di Sistem Informasi 
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
          <h3 class="box-title" id="judul2">Transaksi</h3>

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
          <form id="go_trx_kas">
              <input type="hidden" name="id_group" id="id_group_input" class="form-control">
              <div class="col-sm-3">
                  <input type="text" class="form-control datepicker" name="mulai" id="mulai"  value="<?php echo $mulai?>" >
              </div>
              <div class="col-sm-4">
                <input type="text" class="form-control datepicker" name="selesai" id="selesai"  value="<?php echo $selesai?>">
              </div>

              <div class="col-sm-3">

                <select class="form-control " name="jenis_trx" id="jenis_trx"  value="<?php echo $jenis_trx?>">

                    <option>-- pilih Jenis </option>
                    <option value="cash">Cash</option>
                    <option value="MANDIRI">MANDIRI</option>
                    <option value="BCA">BCA</option>
                    <option value="BRI">BRI</option>
                </select>
                <?php echo $jenis_trx?>
              </div>
              <div class="col-sm-2">
                <input type="submit" class="btn btn-primary btn-block" value="Go">
              </div>
          </form>
          <div style="clear: both"></div>
        </div>

        <div class="table-responsive">
         <table class="table table-bordered" id="tbl_jurnal">
           <thead>
             <tr>
                <th>No.</th>
                <th>Id.Trx</th>
                <th>Tanggal</th>
                <th>Group Trx</th>
                <th>Keterangan</th>
                <th>Debet</th>
                <th>Kredit</th>
                <th>Saldo</th>
                <th>BANK</th>
                <th>Kasir</th>
                <th>Status Cek</th>
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

                if($key->cek_bank=='belum')
                {
                  $btn = "<button class='btn btn-primary btn-xs' onclick='setujui($key->id)'>Setujui</button>";
                  if($this->session->userdata('level')==6 || $this->session->userdata('level')==1)
                  {
                    $btn = "<button class='btn btn-primary btn-xs' onclick='setujui($key->id)'>Setujui</button>";
                  }else{
                    $btn = "-"; 
                  }

                }else{
                  $btn = "&radic; ";
                }


                

                echo "
                  <tr>
                    <td>$no</td>
                    <td>$key->id</td>                    
                    <td>".tglindo($key->tanggal)."</td>
                    <td>$key->group_trx</td>
                    <td>$key->keterangan <a href='".base_url()."uploads/".$key->url_bukti."' target='blank'>".$key->url_bukti."</a></td>
                    <td style='text-align:right'>".rupiah($key->debet)."</td>
                    <td style='text-align:right'>".rupiah($key->kredit)."</td>
                    <td style='text-align:right'>".rupiah($key->saldo)."</td>
                    <td>$key->jenis_trx</td>
                    <td>$key->nama_admin</td>

                    <td>$key->cek_bank
                          $btn
                    </td>

                  </tr>
                ";
              }
             ?>
             
           </tbody>
           <tfoot>
             <tr>
                <th colspan='5' style='text-align:right'><b>Total</b></th>
                <th style='text-align:right'><b>Rp.<?php echo rupiah($tot_debet)?></b></th>
                <th style='text-align:right'><b>Rp.<?php echo rupiah($tot_kredit)?></b></th>
                <th style='text-align:right'><b>Rp.<?php echo rupiah($total)?></b></th>
             </tr>
           </tfoot>
         </table>
       </div>


      </div>
      <!-- /.box -->
    </div>


</section>


<script type="text/javascript">
  $('.datepicker').datepicker({
  autoclose: true,
  format: 'yyyy-mm-dd' 
})

function setujui(id)
{
  //alert(id);
  if(confirm("Anda yakin sudah memeriksa?"))
  {
    $.get("<?php echo base_url()?>index.php/laporan_keuangan/bank_cek_setujui/"+id);
    eksekusi_controller("<?php echo base_url()?>index.php/laporan_keuangan/bank_cek?"+$("#go_trx_kas").serialize(),"Bank");
  }
}

$("#go_trx_kas").on("submit",function(){
  eksekusi_controller("<?php echo base_url()?>index.php/laporan_keuangan/bank_cek?"+$(this).serialize(),"Bank");
  return false;
})
</script>