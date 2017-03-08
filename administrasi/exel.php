<?php 
	
	include_once "../konfig.koneksi.php";
	$a=abs((int)$_GET['nip']);
	$query=mysql_query("select * from tb_dosen where nip='$a'") or die ("Gagal mengambil Query Data".mysql_error());
	$data=mysql_fetch_array($query) or die ("".mysql_error());
	
	
	//fungsi header dengan mengirim raw data ke excel
	header("Content-type: application/vnd-ms-excel");
	
	//mendefinisikan nama file export "nip-nama.xls"
	header("Content-Disposition: attachment; filename=nip.xls");
	
	//data
	include "../status";
?>