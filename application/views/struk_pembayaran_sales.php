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


<hr style="border-top: dotted 1px;" />
<center>Daftar Pembayaran Sales</center>
<table class="table" width="100%">
<tr>
	<td>ID</td>
	<td>Grup TRX </td>	
	<td align=right>Jumlah </td>
</tr>
<?php 
	$tot = 0;

	for($i=0;$i<count($all['bayar_sales']);$i++)
	{
		$tot+=$all['hasil_sales'][$i];
		echo "
				<tr>
					<td>".$all['bayar_sales'][$i]."</td>
					<td>".$all['grup_penjualan'][$i]."</td>
					<td align=right> ".rupiah($all['hasil_sales'][$i])."</td>
					
				</tr>
		";

	}
	
	

	echo "
		<tr>
			<td colspan=2 align=right>Total</td>
			<td align=right><b>".rupiah($tot)."</b></td>
		</tr>
	";
?>
</table>

<center>
	Selamat Belanja!
</center>
</body>

<script type="text/javascript">
	setTimeout(function(){window.close();},100);
</script>