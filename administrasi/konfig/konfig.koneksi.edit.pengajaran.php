<?php
//melakukan koneksi ke server
include "../../konfig.koneksi.php";

//membuat variable
$no=$_POST['no_pengajaran'];
$nip=$_POST['nip'];
$tahun=$_POST['tahun_akademik'];
$semester=$_POST['semester'];
$mata_kuliah=$_POST['mata_kuliah'];
$sk_mengajar=$_POST['sk_mengajar'];

	if(isset($_POST['save']))
		{
			//memasukan ke dalam database
			$sql = "update tb_pengajaran set tahun_akademik='$tahun',semester='$semester',mata_kuliah='$mata_kuliah',sk_mengajar='$sk_mengajar' where nno_pengajaran='$no' and nip='$nip'";
			mysql_query($sql);
			
			//memunculkan pesan
			echo "<script>alert('Data pengajaran berhasil diupdate');history.go(-1);</script>";
		}
	else
		{
			echo "<script>alert('Data pengajaran gagal diupdate');history.go(-1);</script>";

		}
?>