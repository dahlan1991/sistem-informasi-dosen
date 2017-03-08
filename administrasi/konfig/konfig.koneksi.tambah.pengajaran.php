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
			$sql = "insert into  tb_pengajaran (urut,no_pengajaran,nip,tahun_akademik,semester,mata_kuliah,sk_mengajar) values ('','$no','$nip','$tahun','$semester','$mata_kuliah','$sk_mengajar')";
			mysql_query($sql);
			
			//memunculkan pesan
			echo "<script>alert('Data pengajaran berhasil disimpan');history.go(-1);</script>";
		}
	else
		{
			echo "<script>alert('Data pengajaran gagal disimpan');history.go(-1);</script>";

		}
?>