<?php
//melalukan koneksi ke server
include "../../konfig.koneksi.php";

//membuat variable
$no=$_POST['no_penghargaan'];
$nip=$_POST['nip'];
$tanggal=$_POST['tanggal_penghargaan'];
$jenis=$_POST['jenis_penghargaan'];
$pemberi=$_POST['pemberi'];

	if(isset($_POST['save']))
		{
			//memaasukan kedalam database
			$sql="insert into tb_penghargaan (urut,no_penghargaan,nip,tanggal_penghargaan,jenis_penghargaan,pemberi) values ('','$no','$nip','$tanggal','$jenis','$pemberi')";
			mysql_query($sql) or die ("".mysql_error());
			
			//memunculkan pesan
			echo "<script>alert('Data penghargaan berhasil disimpan');history.go(-1);</script>";
		}
	else
		{
			echo "<script>alert('Data penghargaan gagal disimpan');history.go(-1);</script>";

		}
?>