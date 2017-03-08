<?php

//melakukan koneksi ke server
include "../../konfig.koneksi.php";

//memasukan variable dari form sebelum nya
$no =$_POST['no'];
$nip =$_POST['nip'];
$tahun_lulus = $_POST['tahun_lulus'];
$jenjang =$_POST['jenjang'];
$gelar =$_POST['gelar'];
$nama_universitas =$_POST['nama_universitas'];
$bidang_ilmu =$_POST['bidang_ilmu'];
$no_ijasah =$_POST['no_ijasah'];

	if (isset($_POST['save']))
		{
			//memasukan ke dalam database
			$sql = "insert into tb_pendidikan (urut,no_pendidikan,nip,tahun_lulus,jenjang,gelar,nama_universitas,bidang_ilmu,no_ijasah) values ('','$no','$nip','$tahun_lulus','$jenjang','$gelar','$nama_universitas','$bidang_ilmu','$no_ijasah')";
			mysql_query($sql) or die ("".mysql_error());
			
			//menampilkan pesan
			echo "<script>alert('Data pendidikan berhasil disimpan');history.go(-1);</script>";
		}
		else
		{
			echo "<script>alert('Data pendidikan gagal disimpan');history.go(-1);</script>";
		}


?>