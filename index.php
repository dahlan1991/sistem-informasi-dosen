<?php
	
	session_start();
	//mencantumkan file.php yang melakukan koneksi ke server
	include "konfig.koneksi.php";
?>
<!DOCTYPE html >
<html>
<head>
<meta charset="utf-8" />
<title>Sistem Informasi Dosen</title>
	<!--memanggil Bootstrap-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css" />
    <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.css" />
    
    <!--Memanggil custom CSS-->
    <link rel="stylesheet" type="text/css" href="css/style-sidebar.css" />
    <!-- HTML5 shim dan respond.js IE8 support  HTML5 -->
    <!--Warning: Respond.js tidak bekerja didalam file -->
    <!-- [if lt IE 9]>
    	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>
<body>
	<!--navigasi atas-->
    <nav class="navbar navbar-default" role="navigation">
    	<div class="container">
        	<div class="navbar-header">
            	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                	<span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button> 
                <a class="navbar-brand" href="index.php">Sistem Informasi Dosen</a>
            </div> <!--penutup navbar header-->
            <div class="navbar-collapse collapse">
            	<ul class="nav navbar-nav navbar-right">
                	<li class="active"><a href="index.php">Home</a></li>
                    <li class="dropdown">
                    	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Login<b class="caret"></b></a>
                    		<ul class="dropdown-menu">
                    			<li class="dropdown-header">
                                	<form action="konfig.login.php" method="post">
                                    	<div class="form-group">
                                        	<label for="username"><i class="glyphicon glyphicon-user"> Username</i></label>
                                            <input type="text" id="username" name="username" class="form-control" placeholder="Username" required="required" />
                                        </div>
                                        <div class="form-group">
                                        	<label for="password"><i class="glyphicon glyphicon-lock"> Password</i></label>
                                            <input type="password" id="password" name="password" class="form-control"  placeholder="Password" required="required" />
                                        </div>
                                        <div class="form-group">
                                        	<button type="submit" class="btn btn-primary btn-block">Login</button>
                                        </div>
                                    </form>
                                </li><!--penutup dropdown header-->
                    		</ul><!--penutup dropdown menu-->
                    </li><!--penutup dropdown-->
                </ul>
            </div><!--penutup navbar atas collapse-->
		</div> <!--cpenutup container-->
    </nav> <!--penutup navbar-->
    
    <!--halaman utama / body page-->
    <div class="container">
        <div class="row">
            <div class=" col-sm-2 col-md-2">
            	<!--pembuatan navbar sidebar-->  	 
              	<nav class="navbar navbar-default sidebar" role="navigation">
                	<div class="container-fluid">
                    	<div class="navbar-header">
                        	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
                            	<span class="sr-only">Toogle Navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div><!--penutup navbar header-->
                        <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
                        	<ul class="nav navbar-nav">
                            	<li class="active"><a href="index.php"> Home <span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
                                <li class="dropdown">
                                	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Website <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-list"></span></a>
                                    <ul class="dropdown-menu forAnimate" role="menu">
                                    	<li><a href="http://akuntansi-ummi.ac.id">Home</a></li>
                                        <li class="divider"></li>
                                        <li><a href="http://akuntansi-ummi.ac.id/home">Home Page</a></li>
                                        <li class="divider"></li>
                                        <li><a href="http://e-complaint.akuntansi-ummi.ac.id/">E-Complaint</a></li>
                                        <li class="divider"></li>
                                        <li><a href="http://e-learning.akuntansi-ummi.ac.id/">E-Learning</a></li>
                                        <li class="divider"></li>
                                        <li><a href="http://ummi.ac.id/">Universitas</a></li>
                                        <li class="divider"></li>
                                        <li><a href="http://pmb.ummi.ac.id/">PMB</a></li>
                                        <li class="divider"></li>
                                        <li><a href="http://siak.ummi.ac.id/">SIAK</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div><!--penutup collapse navbar-->
                    </div><!--penutup container sidebar-->
                </nav><!--penutup navbar sidebar-->
            </div><!--penutup col-md-2-->
            <div class="col-md-8">
            	<ol class="breadcrumb">
                	You're here :
                    <li class="active">Home</li>               
                </ol>
                <div id="dosen" class="col-md-12">
                        <table id="data" class="table table-striped table-bordered">
                        	<thead>
                            <tr>
                            	<th>No.</th>
                                <th>Nama Dosen</th>
                                <th>N.I.P</th>
                                <th>N.I.D.N</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $sql=mysql_query("select * from tb_dosen order by nama ") or die ("Query gagal".mysql_error());
                                $hal_dosen=1;
    							while ($row=mysql_fetch_array($sql))
    							{
                            ?>
                            <tr>
                            	<td><?php echo $hal_dosen; ?></td>
                                <td><a href="status.php?n=<?php echo $row['nip']; ?>&p=<?php echo $row['nidn_nidk']; ?>"><?php echo $row['nama']; ?></a></td>
                                <td><?php echo $row['nip']; ?></td>
                                <td><?php echo $row['nidn_nidk']; ?></td>
                            </tr>
                            <?php $hal_dosen++ ; } ?>
                            </tbody>
                        </table>
                </div><!--penutup col-md-8-->
        </div><!--penutup row halaman utama-->
    </div> 

    <!--memanggil javascript-->
    <!--jQuery (penting untuk Bootstrap javascript plugin-->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.dataTables.js"></script>
    <script src="js/dataTables.bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript" >
        $(document).ready(function() {
            $('#data').dataTable();
        });
    </script>   
</body>
    	
    
</html>
