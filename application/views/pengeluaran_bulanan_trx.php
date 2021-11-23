
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 id="judul">
        Selamat datang di Sistem Informasi 
        <small>UMROH</small>
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
              
<table id="tbl_datanyax" class="table  table-striped table-bordered"  cellspacing="0" width="100%">
      <thead>
        <tr>
              
              <th>No</th>                    
              <th>Tanggal</th>                     
              <th>Pengeluaran</th>                                                 
              <th>Keterangan</th>                                                 
              <th>Bukti</th>                                                 
              <th>Jumlah</th>                     
              
              
        </tr>
      </thead>
      <tbody>
        <?php         
        $no = 0;
        foreach($all as $x)
        {
          $no++;
            
            echo (" 
              
              <tr>
                <td>$no</td>                
                <td>".tglindo($x->tgl_update)."</td>
                <td>$x->nama_pengeluaran</td>                                
                <td>$x->keterangan</td>                                
                <td><a target='blank' href='".base_url()."uploads/$x->url_bukti'>$x->url_bukti</a></td>                          
                <td style='text-align:right'>".rupiah($x->jumlah)."</td>                                
              </tr>
          ");
          
        }
        
        
        ?>
      </tbody>
  </table>


        </div>
        
      </div>
      <!-- /.box -->

</section>
    <!-- /.content -->




<script>
console.log("<?php echo $this->router->fetch_class();?>");
var classnya = "<?php echo $this->router->fetch_class();?>";



$(document).ready(function(){

  $('#tbl_datanyax').dataTable();

});
$("#judul2").html("DataTable "+document.title);
</script>
