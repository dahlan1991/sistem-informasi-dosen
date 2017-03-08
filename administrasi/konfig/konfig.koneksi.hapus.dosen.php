<?php
//melakukan koneksi ke server
include "../../konfig.koneksi.php";

//membuat variable
$n=abs((int)$_GET['n']);

	$hapus = mysql_query("DELETE FROM tb_dosen WHERE no='$n'");
if ($hapus)
	{
		echo "<script>alert('Data dosen berhasil dihapus!'); window.location = '../index.php'</script>";	
	}
else
	{
		echo "<script>alert('Data dosen gagal dihapus!'); window.location = '../index.php'</script>";
	}
?>
