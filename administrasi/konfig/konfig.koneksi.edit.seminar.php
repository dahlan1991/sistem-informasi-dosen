<?php
//melakukan koneksi ke server
include "../../konfig.koneksi.php";

//membuat variable
$no =$_POST['no'];
$nip =$_POST['nip'];
$judul_seminar =$_POST['judul_seminar'];
$sebagai =$_POST['sebagai'];
$jenis_seminar =$_POST['jenis_seminar'];
$kota =$_POST['kota'];
$tanggal_seminar =$_POST['tanggal_seminar'];

	if(isset($_POST['save']))
		{
			//memasukan ke dalam database
			$sql = "update tb_seminar set judul_seminar='$judul_seminar',sebagai='$sebagai',jenis_seminar='$jenis_seminar',kota='$kota',tanggal_seminar='$tanggal_seminar' where no_seminar='$no' and nip='$nip'";
			mysql_query($sql) or die ("".mysql_error());
			
			//memunculkan pesan
			echo "<script>alert('Data seminar berhasil diupdate');history.go(-1);</script>";
		}
	else
		{
			echo "<script>alert('Data seminar gagal diupdate');history.go(-1);</script>";
		}
?>