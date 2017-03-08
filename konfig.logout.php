<?php
	
	//melakukan session start
	session_start();
	//perintah keluar
	session_destroy();
	//kembali kehalaman index utama
	header("location:index.php");
?>