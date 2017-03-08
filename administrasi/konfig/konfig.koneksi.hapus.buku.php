<?php
//melakukan koneksi ke server
include "../../konfig.koneksi.php";

//membuat variable
$x=abs((int)$_GET['x']);
$n=abs((int)$_GET['n']);

	$hapus = mysql_query("DELETE FROM tb_buku WHERE no_buku='$x' and nip='$n'");
if ($hapus)
	{
		echo "<script>alert('Data buku berhasil dihapus!'); window.location = '../index.php'</script>";	
	}
else
	{
		echo "<script>alert('Data buku gagal dihapus!'); window.location = '../index.php'</script>";
	}
?>
