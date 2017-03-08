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
			$sql = "update tb_jafung set tahun_jafung='$tahun',jafung='$jafung',sk_jafung='$sk_jafung',sk_sertifikasi='$sk_sertifikasi' where no_jafung=$no and nip=$nip";
			mysql_query($sql) or die ("gagal query ".mysql_error());
			
			//memuculkan pesan
			echo "<script>alert ('Data Jabatan Fungsional berhasil diupdate');history.go(-1);</script>";
		}
	else
		{
			echo "<script>alert ('Data Jabatan Fungsional gagal diupdate');history.go(-1);</script>";

		}
?>