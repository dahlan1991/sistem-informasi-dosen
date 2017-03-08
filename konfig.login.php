<?php

//memulai seesion
session_start();

//menghubungkan dengan konfig.koneksi.php
include "konfig.koneksi.php";

//melakukan data variable terhadap page sebelum nya
$username=mysql_real_escape_string($_POST['username']);
$password=md5($_POST['password']);

$query=mysql_query("select * from tb_admin where username='$username' and password='$password'");
$data=mysql_num_rows($query);

if($data==TRUE)
	{
		$_SESSION['username']=$username;
		//melakukan pengalihan terhadap admin index.php
		header("location: administrasi/index.php");
	}
else
	{
		echo"Silahkan Ulangi lagi login";
	}
	
?>