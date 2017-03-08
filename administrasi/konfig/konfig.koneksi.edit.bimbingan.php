<?php
//melakukan koneksi ke server
include "../../konfig.koneksi.php";

//membuat variable
//$id=$_POST['id'];
$no =$_POST['no'];
$nip = $_POST['nip'];
$tahun_bimbingan =$_POST['tahun_bimbingan'];
$nama_mahasiswa =$_POST['nama_mahasiswa'];
$judul=$_POST['judul'];


	if(isset($_POST['save']))
		{
			//memasukan ke dalam database
			$sql = "update tb_bimbingan set tahun_bimbingan='$tahun_bimbingan',nama_mahasiswa='$nama_mahasiswa',judul='$judul' where no_bimbingan=$no and nip='$nip'";
			mysql_query($sql) or die ("gagal query ".mysql_error());
			
			//memunculkan pesan
			echo "<script>alert('Data bimbingan berhasil diupdate');history.go(-1);</script>";
		}
	else
		{
			echo "<script>alert('Data bimbingan gagal diupdate');history.go(-1);</script>";

		}

?>