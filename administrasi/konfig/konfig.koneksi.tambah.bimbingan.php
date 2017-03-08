<?php
//melakukan koneksi ke server
include "../../konfig.koneksi.php";

//membuat variable
$no =$_POST['no'];
$nip = $_POST['nip'];
$tahun_bimbingan =$_POST['tahun_bimbingan'];
$nama_mahasiswa =$_POST['nama_mahasiswa'];
$judul=$_POST['judul'];


	if(isset($_POST['save']))
		{
			//memasukan ke dalam database
			$sql = "insert into tb_bimbingan (urut,no_bimbingan,nip,tahun_bimbingan,nama_mahasiswa,judul)values ('','$no','$nip','$tahun_bimbingan','$nama_mahasiswa','$judul')";
			mysql_query($sql) or die ("gagal query ".mysql_error());
			
			//memunculkan pesan
			echo "<script>alert('Data bimbingan berhasil dismpan');history.go(-1);</script>";
		}
	else
		{
			echo "<script>alert('Data bimbingan gagal dismpan');history.go(-1);</script>";

		}

?>