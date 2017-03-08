<?php
//melakukan koneksi ke server
include "../../konfig.koneksi.php";

//membuat variable
$no =$_POST['no'];
$nip =$_POST['nip'];
$penulis =$_POST['penulis'];
$judul_buku =$_POST['judul_buku'];
$tahun_terbit =$_POST['tahun_terbit'];
$penerbit_buku =$_POST['penerbit_buku'];

	if (isset($_POST['save']))
		{
			//memasukan ke dalam database
			$sql="insert into tb_buku (urut,no_buku,nip,penulis,judul_buku,penerbit_buku,tahun_terbit) values ('','$no','$nip','$penulis','$judul_buku','$penerbit_buku','$tahun_terbit')";
			mysql_query($sql);
			
			//memunculkan pesan
			echo "<script>alert('Data buku berhasil disimpan');history.go(-1);</script>";
		}
	else
		{
			echo "<script>alert('Data buku gagal disimpan');history.go(-1);</script>";
		}
?>