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
			$sql="update tb_buku set penulis='$penulis',judul_buku='$judul_buku',penerbit_buku='$penerbit_buku',tahun_terbit='$tahun_terbit' where no_buku=$no and nip=$nip";
			mysql_query($sql);
			
			//memunculkan pesan
			echo "<script>alert('Data buku berhasil diupdate');history.go(-1);</script>";
		}
	else
		{
			echo "<script>alert('Data buku gagal diupdate');history.go(-1);</script>";
		}
?>