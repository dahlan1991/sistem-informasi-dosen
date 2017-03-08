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
			$sql = "update tb_jabatan_ak set tahun_diangkat='$tahun_diangkat',posisi='$posisi',no_sk='$no_sk' where no_jabatan='$no_jabatan' and nip=$nip";
			mysql_query($sql) or die ("Gagal query ".mysql_error());
			
			//memunculkan pesan
			echo "<script>alert('Data Jabatan Akademis Berhasil diupdate');history.go(-1);</script>";
		}
	else
		{
			echo "<script>alert('Data Jabatan Akademis gagal diupdate');history.go(-1);</script>";
		}
?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>