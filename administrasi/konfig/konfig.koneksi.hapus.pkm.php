<?php
//melakukan koneksi ke server
include "../../konfig.koneksi.php";

//membuat variable
$x=abs((int)$_GET['x']);
$n=abs((int)$_GET['n']);

	$hapus = mysql_query("DELETE FROM tb_pkm WHERE no_pkm='$x' and nip='$n'");
if ($hapus)
	{
		echo "<script>alert('Data PKM berhasil dihapus!'); window.location = '../index.php'</script>";	
	}
else
	{
		echo "<script>alert('Data PKM gagal dihapus!'); window.location = '../index.php'</script>";
	}
?>
