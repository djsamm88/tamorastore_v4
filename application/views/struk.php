<title><?php echo config_item('app_name')?></title>
<style>
html,body{
	margin:0px;
	padding:0px;
}
body,table{
	    text-transform: uppercase;
		font-size:8px;
		font-family:verdana;
}

font-size:10px;
</style>

<body onload='window.print();'>
<center>
	<?php //echo config_item('app_name')?>
	<?php echo config_item('app_client1')?>
	<br>
	<?php echo config_item('app_client2')?>
	<br>
	<?php echo config_item('app_client3')?>
	
</center>

<hr style="border-top: dotted 1px;" />

<table>
<tr>
	<td>Tanggal</td>
	<td>: <?php echo $data[0]->tgl_transaksi?></td>	
</tr>
<tr>
	<td>Kepada</td>
	<td>: <?php echo $data[0]->nama_pembeli?></td>	
</tr>

<tr>
	<td>HP</td>
	<td>: <?php echo $data[0]->hp_pembeli?></td>	
</tr>
<tr>	
	<td>No.TRX</td>
	<td>: <?php echo $data[0]->grup_penjualan?></td>	
</tr>
<tr>
	<td>Kasir</td>
	<td>: <?php echo $data[0]->nama_admin?></td>	
</tr>

<tr>
	<td>Alamat</td>
	<td>: <?php echo $data[0]->alamat?></td>	
</tr>

</table>
<hr style="border-top: dotted 1px;" />
<center>Daftar Belanja</center>
<table class="table" width="100%">
<tr>
	<td>ID</td>
	<td>Barang </td>
	<td>Satuan </td>
	<td align=right>Harga </td>
	<td align=right>Qty </td>
	<td align=right>Sub Total </td>
</tr>
<?php 
	$tot = 0;

	foreach ($data as $key ) 
	{
		$tot+=$key->sub_total_jual;
		echo "
				<tr>
					<td>$key->id_transaksi</td>
					<td>$key->nama_barang</td>
					<td>$key->satuan_jual</td>
					<td align=right> ".rupiah($key->harga_jual)."</td>
					<td align=right>$key->qty_jual</td>
					<td align=right> ".rupiah($key->sub_total_jual)."</td>
					
				</tr>
		";

	}
	
	$total_diskon = $tot-$data[0]->diskon;
	$total = $total_diskon+$data[0]->harga_ekspedisi+$data[0]->transport_ke_ekspedisi-$data[0]->saldo;
	echo "
		<tr>
			<td colspan=5 align=right>Total</td>
			<td align=right><b>".rupiah($tot)."</b></td>
		</tr>
		<tr>
			<td colspan=5 align=right>Saldo</td>
			<td align=right><b>".rupiah($data[0]->saldo)."</b></td>
		</tr>
		<tr>
			<td colspan=5 align=right>Diskon</td>
			<td align=right><b>".rupiah($data[0]->diskon)."</b></td>
		</tr>
		<tr>
			<td colspan=5 align=right>Ekspedisi [".$data[0]->nama_ekspedisi."] - [".strtoupper($data[0]->courier)."]</td>
			<td align=right><b>".rupiah($data[0]->harga_ekspedisi)."</b></td>
		</tr>
		<tr>
			<td colspan=5 align=right>Transport ke ekspedisi</td>
			<td align=right><b>".rupiah($data[0]->transport_ke_ekspedisi)."</b></td>
		</tr>
		<tr>
			<td colspan=5 align=right>Total</td>
			<td align=right><b>".rupiah($total)."</b></td>
		</tr>
		<tr>
			<td colspan=5 align=right>Bayar</td>
			<td align=right><b>" . rupiah($data[0]->bayar) . "</b></td>
		</tr>
		
		<tr>
			<td colspan=5 align=right>Kembali</td>
			<td align=right><b>" . rupiah($data[0]->bayar - $total) . "</b></td>
		</tr>
	";
?>
</table>

<hr style="border-top: dotted 1px;" />
<?php echo $data[0]->keterangan?>
<hr style="border-top: dotted 1px;" />
<center>
	Selamat Belanja!
</center>
</body>

<script type="text/javascript">
	setTimeout(function(){window.close();},100);
</script>