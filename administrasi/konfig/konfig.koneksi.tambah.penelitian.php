<?php
//melakukan koneksi ke server
include "../../konfig.koneksi.php";

//membuat variable
$no =$_POST['no'];
$nip =$_POST['nip'];
$tahun =$_POST['tahun_penelitian'];
$judul =$_POST['judul_penelitian'];
$tempat =$_POST['tempat_publikasi'];

	if(isset($_POST['save']))
		{
			//memasukan ke dalam database
			$sql = "insert into tb_penelitian (urut,no_penelitian,nip,tahun_penelitian,judul_penelitian,tempat_publikasi) values ('','$no','$nip','$tahun','$judul','$tempat')";
			mysql_query($sql) or die ("".mysql_error());
			
			//memunculkan pesan
			echo "<script>alert('Data publikasi berhasil disimpan');history.go(-1);</script>";
		}
	else
		{
			echo "<script>alert('Data publikasi gagal disimpan');history.go(-1);</script>";
		}
?>