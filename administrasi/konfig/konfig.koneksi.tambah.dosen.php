<?php
//melakukan koneksi ke server
include "../../konfig.koneksi.php";
//$no = $_POST['no'];
$nip =$_POST['nip'];
$nidn_nidk =$_POST['nidn_nidk'];
$nama =$_POST['nama'];
$jenis_kelamin =$_POST['jenis_kelamin'];
$alamat =$_POST['alamat'];
$telepon =$_POST['telepon'];
$agama =$_POST['agama'];
$pendidikan =$_POST['pendidikan_terakhir'];
$jabatan =$_POST['jabatan'];
$email =$_POST['email'];
$tanggal=$_POST['tanggal'];

	if(isset($_POST['save']))
		{
			$fileName = $_FILES['foto']['name'];
			
			//melakukan penyimpanan ke dalam database
			$sql = "insert into tb_dosen (no,nip,nidn_nidk,nama,tanggal,jenis_kelamin,alamat,telepon,agama,pendidikan_terakhir,jabatan,email,foto) values ('', '$nip', '$nidn_nidk', '$nama', '$tanggal', '$jenis_kelamin', '$alamat', '$telepon', '$agama', '$pendidikan', '$jabatan', '$email', '$fileName')";
			mysql_query($sql) or die ("gagal query ".mysql_error());
			
			//menyimpan foto upload-an
			move_uploaded_file($_FILES['foto']['tmp_name'], "../foto/".$_FILES['foto']['name']);
			
			//memunculkan pesan berhasil
			echo"<script>alert('Data Dosen berhasil disimpan');history.go(-1);</script>";
		}
	else
		{
			echo"<script>alert('Data Dosen gagal disimpan');history.go(-1);</script>.mysql_error()";
		}

?>