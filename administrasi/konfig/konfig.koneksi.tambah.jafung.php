<?php

//melakukan koneksi ke server
include "../../konfig.koneksi.php";

//memasukan variable
$no =$_POST['no'];
$nip =$_POST['nip'];
$tahun =$_POST['tahun_jafung'];
$jafung =$_POST['jafung'];
$sk_jafung =$_POST['sk_jafung'];
$sk_sertifikasi =$_POST['sk_sertifikasi'];

	if (isset($_POST['save']))
		{
			//memasukan kedalam database
			$sql = "insert into tb_jafung (urut, no_jafung, nip, tahun_jafung, jafung, sk_jafung, sk_sertifikasi) values ('','$no','$nip','$tahun','$jafung','$sk_jafung','$sk_sertifikasi')";
			mysql_query($sql) or die ("gagal query ".mysql_error());
			
			//memuculkan pesan
			echo "<script>alert ('Data Jabatan Fungsional berhasil disimpan');history.go(-1);</script>";
		}
	else
		{
			echo "<script>alert ('Data Jabatan Fungsional gagal disimpan');history.go(-1);</script>";

		}
?>