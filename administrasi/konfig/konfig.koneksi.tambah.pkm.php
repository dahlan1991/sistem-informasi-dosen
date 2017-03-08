<?php
//melakukan koneksi ke server
include "../../konfig.koneksi.php";

//membuat variable
$no =$_POST['no'];
$nip =$_POST['nip'];
$tahun_pkm =$_POST['tahun_pkm'];
$judul_pkm =$_POST['pkm'];
$tempat_pkm =$_POST['tempat_pkm'];
$publikasi_pkm =$_POST['publikasi_pkm'];


	if(isset($_POST['save']))
		{
			//memasukan kedalam database
			$sql="insert into tb_pkm (urut,no_pkm,nip,tahun_pkm,judul_pkm,tempat_pkm,publikasi_pkm) values ('','$no','$nip','$tahun_pkm','$judul_pkm', '$tempat_pkm', '$publikasi_pkm')";
			mysql_query($sql);
			
			//memunculkan pesan
			echo "<script>alert('Data PKM berhasil disimpan');history.go(-1);</script>";
		}
	else
		{
			echo "<script>alert('Data PKM gagal disimpan');history.go(-1);</script>";
		}
?>