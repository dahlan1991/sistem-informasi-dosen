<?php

//melakukan koneksi ke server
include "../../konfig.koneksi.php";

//membuat variable
$no_jabatan = $_POST['no_jabatan'];
$nip = $_POST['nip'];
$tahun_diangkat = $_POST['tahun_diangkat'];
$posisi = $_POST['posisi'];
$no_sk = $_POST['no_sk'];

	if(isset($_POST['save']))
		{
			//menyimpan kedalam database
			$sql = "insert into tb_jabatan_ak (urut,no_jabatan,nip,tahun_diangkat,posisi,no_sk) values ('','$no_jabatan','$nip','$tahun_diangkat','$posisi','$no_sk')";
			mysql_query($sql) or die ("Gagal query ".mysql_error());
			
			//memunculkan pesan
			echo "<script>alert('Data Jabatan Akademis Berhasil disimpan');history.go(-1);</script>";
		}
	else
		{
			echo "<script>alert('Data Jabatan Akademis gagal disimpan');history.go(-1);</script>";
		}
?>