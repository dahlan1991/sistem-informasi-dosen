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
			$sql="update tb_pkm set tahun_pkm='$tahun_pkm',judul_pkm='$judul_pkm',tempat_pkm='$tempat_pkm', publikasi_pkm='$publikasi_pkm' where no_pkm='$no' and nip='$nip'";
			mysql_query($sql);
			
			//memunculkan pesan
			echo "<script>alert('Data PKM berhasil diupdate');history.go(-1);</script>";
		}
	else
		{
			echo "<script>alert('Data PKM gagal diupdate');history.go(-1);</script>";
		}
?>