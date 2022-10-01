<b>

    <?php 
      $data_cabang = $this->m_cabang->m_data_cabang();
      foreach($data_cabang as $cabang)
      {
        if($cabang->id_cabang==$id_cabang)
        {
         echo "
              $cabang->kode_cabang - $cabang->nama_cabang
            ";
        }
      }
    ?>                  
  
    <?php 
      $data_admin = $this->m_admin->m_data_admin();
      foreach($data_admin as $adm)
      {
        if($adm->id_admin==$id_admin)
        {
          echo " - 
            $adm->nama_admin - $adm->id_admin
          ";
        }
      }


      echo " - ". $mulai." sd ".$selesai;
    ?>                  
</b>

  <table id="tbl_newsnya" class="table  table-striped table-bordered"  cellspacing="0" width="100%" border="1">
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