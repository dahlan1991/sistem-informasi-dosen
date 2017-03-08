<?php
	//include "../../konfig.koneksi.php";
	session_start();
if (empty($_SESSION['username']))
	{
	header('location:../../index.php');
	}
else
	{
		include "../konfig.koneksi.php";
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sistem Informasi Dosen - Administrasi</title>
	<!--memanggil boostrap-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css" />
    <link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.css" />
    <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.css" />
    
    <!--memanggil custom CSS-->
    <link rel="stylesheet" type="text/css" href="css/style-sidebar.css">
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
                                    <div class="modal-footer"><a href="../konfig.logout.php" class="btn btn-primary btn-block">Logout</a></div>
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
            <!---menu menu-->
            <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
            	<ul class="nav navbar-nav">
                	<li class="active"><a href="index.php"> Home <span style="font-size:16px" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
                    <li><a href="konfig/konfig.tambah.dosen.php">Tambah Dosen <span style="font-size:16px" class="pull-right hidden-xs showopacity glyphicon glyphicon-pencil"></span></a></li>
                    <li><a href="konfig/konfig.tambah.pendidikan.php">Tambah Pendidikan<span style="font-size:16px" class="pull-right hidden-xs showopacity glyphicon glyphicon-pencil"></span></a></li>
                    <li><a href="konfig/konfig.tambah.jafung.php">Tambah Jabatan Fungsional<span style="font-size:16px" class="pull-right hidden-xs showopacity glyphicon glyphicon-pencil"></span></a></li>
                    <li><a href="konfig/konfig.tambah.jabatan.ak.php">Tambah Jabatan Akademik<span style="font-size:16px" class="pull-right hidden-xs showopacity glyphicon glyphicon-pencil"></span></a></li>
                    <li><a href="konfig/konfig.tambah.penelitian.php">Tambah Penelitian<span style="font-size:16px" class="pull-right hidden-xs showopacity glyphicon glyphicon-pencil"></span></a></li>
                    <li><a href="konfig/konfig.tambah.seminar.php">Tambah Seminar<span style="font-size:16px" class="pull-right hidden-xs showopacity glyphicon glyphicon-pencil"></span></a></li>
                    <li><a href="konfig/konfig.tambah.penghargaan.php">Tambah Penghargaan<span style="font-size:16px" class="pull-right hidden-xs showopacity glyphicon glyphicon-pencil"></span></a></li>
                    <li><a href="konfig/konfig.tambah.pengajaran.php">Tambah Pengajaran<span style="font-size:16px" class="pull-right hidden-xs showopacity glyphicon glyphicon-pencil"></span></a></li>
                    <li><a href="konfig/konfig.tambah.bimbingan.php">Tambah Bimbingan<br> Skripsi<span style="font-size:16px" class="pull-right hidden-xs showopacity glyphicon glyphicon-pencil"></span></a></li>
                    <li><a href="konfig/konfig.tambah.buku.php">Tambah Hasil Buku<span style="font-size:16px" class="pull-right hidden-xs showopacity glyphicon glyphicon-pencil"></span></a></li>
                    <li><a href="konfig/konfig.tambah.pkm.php">Tambah Pengabdian Kepada Masyarakat<span style="font-size:16px" class="pull-right hidden-xs showopacity glyphicon glyphicon-pencil"></span></a></li>
                </ul>
            </div>
        </div><!--penutup sidebar container-->
    </nav><!--penutup sidebar-->
    
    <!---halaman -->
    <div class="row">
    	<div class="col-md-10">
        	<div class="panel panel-default">
            	<ul class="nav nav-pills nav-justified">
                	<li role="presentation"><a data-toggle="modal" href="konfig/konfig.lis.dosen.php" data-target="#MyDosen">Dosen</a>
                    	<div class="modal fade" id="MyDosen" tabindex="-1" role="dialog" aria-labbelledby="MyDosenlabel" aria-hidden="true"><!--modal-->
                        	<div class="modal-dialog">
                            </div>
                            <div class="modal-content">
                            </div>
                        </div>
                    </li>
                    <li role="presentation"><a data-toggle="modal" href="konfig/konfig.lis.pendidikan.php" data-target="#Mypendidikan">Pendidikan</a>
                    	<div class="modal fade" id="Mypendidikan" tabindex="-1" role="dialog" aria-labbelledby="Mypendidikanlabel" aria-hidden="true"><!--modal-->
                        	<div class="modal-dialog">
                            </div>
                            <div class="modal-content">
                            </div>
                        </div>
                    </li>
                    <li role="presentation"><a data-toggle="modal" href="konfig/konfig.lis.jafung.php" data-target="#Myjafung">Jab.Fungsional</a>
                    	<div class="modal fade" id="Myjafung" tabindex="-1" role="dialog" aria-labbelledby="Myjafunglabel" aria-hidden="true"><!--modal-->
                        	<div class="modal-dialog">
                            </div>
                            <div class="modal-content">
                            </div>
                        </div>
                    </li>
                    <li role="presentation"><a data-toggle="modal" href="konfig/konfig.lis.jabatan.ak.php" data-target="#Myakademik">Jab.Akademik</a>
                    	<div class="modal fade" id="Myakademik" tabindex="-1" role="dialog" aria-labbelledby="Myakademiklabel" aria-hidden="true"><!--modal-->
                        	<div class="modal-dialog">
                            </div>
                            <div class="modal-content">
                            </div>
                        </div>
                    </li>
                    <li role="presentation"><a data-toggle="modal" href="konfig/konfig.lis.penelitian.php" data-target="#Mypenelitian">Penelitian</a>
                    	<div class="modal fade" id="Mypenelitian" tabindex="-1" role="dialog" aria-labbelledby="Mypenelitianlabel" aria-hidden="true"><!--modal-->
                        	<div class="modal-dialog">
                            </div>
                            <div class="modal-content">
                            </div>
                        </div>
                    </li>
                    <li role="presentation"><a data-toggle="modal" href="konfig/konfig.lis.seminar.php" data-target="#Myseminar">Seminar</a>
                    	<div class="modal fade" id="Myseminar" tabindex="-1" role="dialog" aria-labbelledby="Myseminarlabel" aria-hidden="true"><!--modal-->
                        	<div class="modal-dialog">
                            </div>
                            <div class="modal-content">
                            </div>
                        </div>
                    </li>
                    <li role="presentation"><a data-toggle="modal" href="konfig/konfig.lis.penghargaan.php" data-target="#Mypenghargaan">Penghargaan</a>
                    	<div class="modal fade" id="Mypenghargaan" tabindex="-1" role="dialog" aria-labbelledby="Mypenghargaanlabel" aria-hidden="true"><!--modal-->
                        	<div class="modal-dialog">
                            </div>
                            <div class="modal-content">
                            </div>
                        </div>
                    </li>
                    <li role="presentation"><a data-toggle="modal" href="konfig/konfig.lis.pengajaran.php" data-target="#Mypengajaran">Pengajaran</a>
                    	<div class="modal fade" id="Mypengajaran" tabindex="-1" role="dialog" aria-labbelledby="Mypengajaranlabel" aria-hidden="true"><!--modal-->
                        	<div class="modal-dialog">
                            </div>
                            <div class="modal-content">
                            </div>
                        </div>
                    </li>
                    <li role="presentation"><a data-toggle="modal" href="konfig/konfig.lis.bimbingan.php" data-target="#Mybimbingan">Bimbingan</a>
                    	<div class="modal fade" id="Mybimbingan" tabindex="-1" role="dialog" aria-labbelledby="Mybimbingan" aria-hidden="true"><!--modal-->
                        	<div class="modal-dialog">
                            </div>
                            <div class="modal-content">
                            </div>
                        </div>
                    </li>
                    <li role="presentation"><a data-toggle="modal" href="konfig/konfig.lis.buku.php" data-target="#Mybuku">Buku</a>
                    	<div class="modal fade" id="Mybuku" tabindex="-1" role="dialog" aria-labbelledby="Mybukulabel" aria-hidden="true"><!--modal-->
                        	<div class="modal-dialog">
                            </div>
                            <div class="modal-content">
                            </div>
                        </div>
                    </li>
                    <li role="presentation"><a data-toggle="modal" href="konfig/konfig.lis.pkm.php" data-target="#Mypkm">PKM</a>
                    	<div class="modal fade" id="Mypkm" tabindex="-1" role="dialog" aria-labbelledby="Mypkmlabel" aria-hidden="true"><!--modal-->
                        	<div class="modal-dialog">
                            </div>
                            <div class="modal-content">
                            </div>
                        </div>
                    </li>
                    <li role="presentation"><a data-toggle="modal" href="konfig/konfig.lis.admin.php" data-target="#Myadm"><span class="glyphicon glyphicon-plus-sign"></span></a>
                    	<div class="modal fade" id="Myadm" tabindex="-1" role="dialog" aria-labbelledby="Myadmlabel" aria-hidden="true"><!--modal-->
                        	<div class="modal-dialog">
                            	<div class="modal-content">
                                </div>
                            </div>
                        </div>
                    </li>
                <ul>
            </div>
        </div>
        <div class="col-md-4">
        	<div class="panel panel-default">
            	<div class="panel-heading">Informasi Dosen</div>
                <div class="panel-body">
                <?php 
					$sql_dosen = "select * from tb_dosen limit 5";
					$que =mysql_query($sql_dosen) or die ("Query gagal".mysql_error());
				?>
                	<table class="table table-responsive">
                    	<tr>
                            <th>N.I.P</th>
                            <th>Nama</th>
                        </tr>
                        <?php
							while($row=mysql_fetch_array($que))
								{
									$nip = $row['nip'];
									$nama = $row['nama'];
						?>
                        <tr>
                            <td><?php echo $nip ?></td>
                            <td><?php echo $nama ?></td>
                        </tr>
                        <?php } ?>                    
                    </table>
                </div>
            </div>
        </div>
    	<div class="col-md-3">
        	<div class="panel panel-default">
            	<div class="panel-heading">Pendidikan</div>
                <div class="panel-body">
                	<?php 
					$sql_pend = "select * from tb_pendidikan limit 5";
					$que_pend =mysql_query($sql_pend) or die ("Query gagal".mysql_error());
				?>
                	<table class="table table-responsive">
                    	<tr>
                            <th>N.I.P</th>
                            <th>Gelar</th>
                            <th>Universitas</th>
                        </tr>
                        <?php
							while($row_pend=mysql_fetch_array($que_pend))
								{
									$nip = $row_pend['nip'];
									$gelar = $row_pend['gelar'];
									$nama_univ = $row_pend['nama_universitas'];
						?>
                        <tr>
                            <td><?php echo $nip ?></td>
                            <td><?php echo $gelar ?></td>
                            <td><?php echo $nama_univ ?></td>
                        </tr>
                        <?php } ?>                    
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <table id="buku" class="table table-responsive table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Penulis</th>
                        <th>Nama Buku</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql_buku = "select * from tb_buku limit 3";
                        $que_buku =mysql_query($sql_buku) or die ("Query gagal".mysql_error());
                        $hal_buku=1;
						while($row_buku=mysql_fetch_array($que_buku))
							{
								$penulis = $row_buku['penulis'];
								$nama_buku = $row_buku['judul_buku'];
					?>
                    <tr>
                        <td><?php echo $hal_buku; ?></td>
                        <td><?php echo $penulis; ?></td>
                        <td><?php echo $nama_buku; ?></td>
                    </tr>
                    <?php $hal_buku++ ; } ?>
                </tbody>                    
            </table>
        </div>
	</div>
	
    
	<!--memanggil javascript-->
    <!--jQuery (penting untuk bootstrap javascript plugin-->
    <script src="js/jquery.min.js"></script>
    <script src="..js/jquery.dataTables.js"></script>
    <script src="..js/dataTables.bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript" >
        $(document).ready(function() {
            $('#buku').dataTable();
        });
    </script>   
</body>
</html>