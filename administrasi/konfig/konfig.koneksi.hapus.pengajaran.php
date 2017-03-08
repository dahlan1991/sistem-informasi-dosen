<?php
//melakukan koneksi ke server
include "../../konfig.koneksi.php";

//membuat variable
$x=abs((int)$_GET['x']);
$n=abs((int)$_GET['n']);

	$hapus = mysql_query("DELETE FROM tb_pengajaran WHERE no_pengajaran='$x' and nip='$n'");
if ($hapus)
	{
		echo "<script>alert('Data pengajaran berhasil dihapus!'); window.location = '../index.php'</script>";	
	}
else
	{
		echo "<script>alert('Data pengajaran gagal dihapus!'); window.location = '../index.php'</script>";
	}
?>
