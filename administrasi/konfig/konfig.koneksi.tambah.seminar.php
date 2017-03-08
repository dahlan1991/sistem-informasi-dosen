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
			$sql = "insert into tb_seminar (urut,no_seminar,nip,judul_seminar,sebagai,jenis_seminar,kota,tanggal_seminar) values ('','$no','$nip','$judul_seminar','$sebagai','$jenis_seminar','$kota','$tanggal_seminar')";
			mysql_query($sql) or die ("".mysql_error());
			
			//memunculkan pesan
			echo "<script>alert('Data seminar berhasil disimpan');history.go(-1);</script>";
		}
	else
		{
			echo "<script>alert('Data seminar gagal disimpan');history.go(-1);</script>";
		}
?>