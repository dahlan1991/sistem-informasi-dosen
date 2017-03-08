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
			$sql = "update tb_penelitian set tahun_penelitian='$tahun',judul_penelitian='$judul',tempat_publikasi='$tempat' where no_penelitian='$no' and nip='$nip'";
			mysql_query($sql) or die ("".mysql_error());
			
			//memunculkan pesan
			echo "<script>alert('Data publikasi berhasil diupdate');history.go(-1);</script>";
		}
	else
		{
			echo "<script>alert('Data publikasi gagal diupdate');history.go(-1);</script>";
		}
?>