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
			$sql="update tb_penghargaan set tanggal_penghargaan='$tanggal',jenis_penghargaan='$jenis',pemberi='$pemberi' where no_penghargaan='$no' and nip='$nip'";
			mysql_query($sql) or die ("".mysql_error());
			
			//memunculkan pesan
			echo "<script>alert('Data penghargaan berhasil diupdate');history.go(-1);</script>";
		}
	else
		{
			echo "<script>alert('Data penghargaan gagal diupdate');history.go(-1);</script>";

		}
?>