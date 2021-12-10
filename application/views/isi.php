
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 id="judul">
        Selamat datang di Sistem Penjualan
        
      </h1>      
    </section>

    <!-- Main content -->
    <section class="content container-fluid" id="t4_isi">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->    
<pre>
<?php
$ses_cab = $this->m_cabang->m_data_cabang_by_id($this->session->userdata('id_cabang'));
echo $this->session->userdata('nama_admin'); 
echo " - ";
echo($ses_cab[0]->nama_cabang); 
echo " - ";
echo($ses_cab[0]->kode_cabang);
?>
</pre>
    
        <?php 
        
        if($this->session->userdata('level')=='1' || $this->session->userdata('level')=='3')
        {
            ?>
            <div class="row">
              <div id="t4_chat_kontak_all"></div>
              <div id="t4_chat_kasir"></div>
              
            </div>
            <?php 

        }        


        if($this->session->userdata('level')=='1')
        {
        ?>
    <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Sistem Informasi Manajemen Penjualan </h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>


        

        <div class="box-body">
              

            <?php 
              $debet = 0;
              $kredit = 0;
              $saldo = 0;
              foreach ($kas as $key) {
                if($key->jenis=='masuk')
                {
                  $debet+=$key->jumlah;
                }

                if($key->jenis=='keluar')
                {
                  $kredit+=$key->jumlah;
                }

                
              }

              $saldo=$debet-$kredit;

              ?>

              <div class="row">
              <div class="col-sm-6">
                <!-- small box -->
                <div class="small-box bg-blue">
                  <div class="inner text-center">
                    <h3><?php echo rupiah($debet)?></h3>

                    <p>Total Debet</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-dollar"></i>
                  </div>                  
                </div>
              </div>
              <!-- ./col -->
              <div class="col-sm-6">
                <!-- small box -->
                <div class="small-box bg-green">
                  <div class="inner text-center">
                    <h3><?php echo rupiah($kredit)?></h3>

                    <p>Total Kredit</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-dollar"></i>
                  </div>                  
                </div>
              </div>
              

              <!-- ./col -->
              <div class="col-sm-12">
                <!-- small box -->
                <div class="small-box bg-red">
                  <div class="inner text-center">
                  
                    <h3><?php echo rupiah($saldo)?></h3>

                    <p>Saldo</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-dollar"></i>
                  </div>
                  
                </div>
              </div>
              <!-- ./col -->
            </div>


            




        </div>
        
      </div>
      <!-- /.box -->


          <?php } ?>
            

          <?php if($this->session->userdata('level') !=5 && $this->session->userdata('level') !=7 ) {?> 
      <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Chart Debet Kredit</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                
                
                <canvas id="lineChart" style="height:250px"></canvas>
                <span style="background: rgba(60,141,188,0.9)">Debet</span>
                <span style="background: rgba(210, 214, 222, 1)">Kredit</span>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        <?php 
            }

            if($this->session->userdata('level')==5){

                include "isi_pelanggan.php";
              } 


            if($this->session->userdata('level')==7){

                include "isi_sales.php";
              } 
            ?> 




              

</section>
    <!-- /.content -->
