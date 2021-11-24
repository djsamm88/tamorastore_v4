<script type="text/javascript">window.print();</script>
<?php 
  foreach ($all as $key => $value) {
    //echo ($value['jumlah_barcode']);

    $barang = $this->m_barang->nama_barang($value['id']);

    //echo $barang->nama_barang;

    for ($i=0; $i < $value['jumlah_barcode'] ; $i++) { 
      echo "<img src='".base_url()."assets/barcode/barcode.php?codetype=Code128&size=20&text=$barang->nama_barang&print=true' width='200px'> &nbsp;&nbsp;&nbsp;&nbsp;";
    }
    
    echo"<br><br>";

  }
?>