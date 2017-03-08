<?php
//melakukan koneksi ke server
include "../../konfig.koneksi.php";

//membuat variable
$x=abs((int)$_GET['x']);
$n=abs((int)$_GET['n']);

	$hapus = mysql_query("DELETE FROM tb_penghargaan WHERE no_penghargaan='$x' and nip='$n'");
if ($hapus)
	{
		echo "<script>alert('Data penghargaan berhasil dihapus!'); window.location = '../index.php'</script>";	
	}
else
	{
		echo "<script>alert('Data penghargaan gagal dihapus!'); window.location = '../index.php'</script>";
	}
?>
