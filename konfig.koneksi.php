<?php

	//melakukan koneksi kedalam server 
	mysql_connect("localhost","root","") or die ("Gagal melakukan koneksi ke server".mysql_error());
	
	//melakukan pilihan ke database
	mysql_select_db("dosen_124") or die ("database gagal".mysql_error());
?>