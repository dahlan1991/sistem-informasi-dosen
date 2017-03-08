<?php
	//include "../../konfig.koneksi.php";
	session_start();
if (empty($_SESSION['username']))
	{
	header('location:../../index.php');
	}
else
	{
		include "../../konfig.koneksi.php";
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sistem Informasi Dosen - Administrasi</title>
	<!--memanggil boostrap-->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-datetimepicker.min.css">
    
    <!--memanggil custom CSS-->
    <link rel="stylesheet" type="text/css" href="../css/style-sidebar.css">
    <!--HTML5 shim dan respond.js IE8 support HTML5-->
    <!--Warning: Respond.js tidak berkerja didalam file -->
    <!-- [if lt IE9]>
    	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
        
</head>
<body>
	<!--Navigasi atas -->
	<nav class="navbar navbar-default">
    	<div class="container">
        	<div class="navbar-header">
            	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                	<span class="sr-only">Toogle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Sistem Informasi Dosen</a>
            </div><!--penutup navbar header-->
            <!--menu menu navigasi-->
            <div class="navbar-collapse collapse">
            	<ul class="nav navbar-nav navbar-right">
                    <li><a href="#" data-toggle="modal" data-target=".bs-example-modal-sm">Logout <i class="glyphicon glyphicon-log-out"></i></a></li>
                    	<div class="modal fade bs-example-modal-sm" tabindex="-1" aria-labelledby="mySmallModalLabel">
                        	<div class="modal-dialog modal-sm">
                            	<div class="modal-content">
                                	<div class="modal-header"><h4>Logout <i class="glyphicon glyphicon-lock"></i></h4></div>
                                    <div class="modal-body"><i class="glyphicon glyphicon-question-sign"></i> Apakah ingin keluar?</div>
                                    <div class="modal-footer"><?php $_SESSION['username'];?><a href="../../konfig.logout.php" class="btn btn-primary btn-block">Logout</a></div>
                                </div>
                            </div>
                        </div>
                </ul>
            </div><!--penutup collapse-->
        </div><!--penutup container-->
    </nav><!--penutup navigasi atas-->
    <!--menu sidebar menu menu tambah dosen , pendidikan-->
    <nav class="navbar navbar-default sidebar" role="navigation">
    	<div class="container-fluid">
        	<div class="navbar-header">
            	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
                	<span class="sr-only">Toglle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div><!--penutup sidebar navbar header-->
            <!---menu menu--->
            <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
            	<ul class="nav navbar-nav">
                	<li><a href="../index.php"> Home <span style="font-size:16px" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
                    <li><a href="konfig.tambah.dosen.php">Tambah Dosen <span style="font-size:16px" class="pull-right hidden-xs showopacity glyphicon glyphicon-pencil"></span></a></li>
                    <li><a href="konfig.tambah.pendidikan.php">Tambah Pendidikan<span style="font-size:16px" class="pull-right hidden-xs showopacity glyphicon glyphicon-pencil"></span></a></li>
                    <li><a href="konfig.tambah.jafung.php">Tambah Jabatan Fungsional<span style="font-size:16px" class="pull-right hidden-xs showopacity glyphicon glyphicon-pencil"></span></a></li>
                    <li><a href="konfig.tambah.jabatan.ak.php">Tambah Jabatan Akademik<span style="font-size:16px" class="pull-right hidden-xs showopacity glyphicon glyphicon-pencil"></span></a></li>
                    <li><a href="konfig.tambah.penelitian.php">Tambah Penelitian<span style="font-size:16px" class="pull-right hidden-xs showopacity glyphicon glyphicon-pencil"></span></a></li>
                    <li><a href="konfig.tambah.seminar.php">Tambah Seminar<span style="font-size:16px" class="pull-right hidden-xs showopacity glyphicon glyphicon-pencil"></span></a></li>
                    <li><a href="konfig.tambah.penghargaan.php">Tambah Penghargaan<span style="font-size:16px" class="pull-right hidden-xs showopacity glyphicon glyphicon-pencil"></span></a></li>
                    <li><a href="konfig.tambah.pengajaran.php">Tambah Pengajaran<span style="font-size:16px" class="pull-right hidden-xs showopacity glyphicon glyphicon-pencil"></span></a></li>
                    <li><a href="konfig.tambah.bimbingan.php">Tambah Bimbingan<br> Skripsi<span style="font-size:16px" class="pull-right hidden-xs showopacity glyphicon glyphicon-pencil"></span></a></li>
                    <li class="active"><a href="konfig.tambah.buku.php">Tambah Hasil Buku<span style="font-size:16px" class="pull-right hidden-xs showopacity glyphicon glyphicon-pencil"></span></a></li>
                    <li><a href="konfig.tambah.pkm.php">Tambah Pengabdian Kepada Masyarakat<span style="font-size:16px" class="pull-right hidden-xs showopacity glyphicon glyphicon-pencil"></span></a></li>
                </ul>
            </div>
        </div><!--penutup sidebar container-->
    </nav><!--penutup sidebar-->
    
    <!---halaman -->
    <form action="konfig.koneksi.tambah.admin.php" method="post" name="uploader" enctype="multipart/form-data">
    	<div class="col-lg-7"><!--input tambah dosen-->
    		<div class="panel panel-primary">
        		<div class="panel-heading">Tambah Admin</div>
           		<div class="panel-body">
                	<table class="table table-condensed">
                    	<tr>
                        	<td><label for="username">Username</label></td>
                            <td><input type="text" id="username" name="username" class="form-control" required ></td>
                        </tr>
                        <tr>
                        	<td><label for="password">password</label></td>
                            <td><input type="text" id="pass" name="pass" class="form-control"></td>             
                        </tr>
                    </table>
            	</div><!--penutup panel body-->
        	</div><!--penutup primary panel-->
            <input type="submit" name="save" value="Simpan Data" class="btn btn-sm btn-primary">&nbsp;<a href="../index.php" class="btn btn-sm btn-primary">Kembali</a> 
    	</div><!--penutup input tambah dosen-->
    </form>

    
	<!--memanggil javascript-->
    <!--jQuery (penting untuk bootstrap javascript plugin-->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap-datetimepicker.min.js"></script>
    
    <!--javascript/text-->
    <script type="text/javascript">
		$(function () {
			$('#datetimepicker1').datetimepicker({
				format: "yyyy",
				pickTime: false,
				startView: "decade",
				minView: "decade",
				autoclose: true,
				pickerPosition: "bottom-right"				
			});
		});
	</script>
    
</body>
</html><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>