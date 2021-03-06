<?php
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
<title>Informasi Seminar</title>
	<!--memanggil Bootstrap-->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css" />
    
    <!--Memanggil custom CSS-->
    <link rel="stylesheet" type="text/css" href="../css/style-sidebar.css" />
    <!-- HTML5 shim dan respond.js IE8 support  HTML5 -->
    <!--Warning: Respond.js tidak bekerja didalam file -->
    <!-- [if lt IE 9]>
    	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!--memanggil javascript-->
	<!--jQuery (penting untuk Bootstrap javascript plugin-->
	<script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.tablesorter.js"></script>
    
    
</head>
	<!--modal header-->
    <div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
        <h4 class="modal-title">Informasi Seminar</h4>
    </div>
    <!--modal body-->
    <div class="modal-body row">
    	<div class="col-lg-12">
        <?php
			$a="select * from tb_seminar order by urut";
			$b=mysql_query($a) or die ("".mysql_error());
		?>
        	<div class="table-responsive">
            <table id="myTable" class="table table-striped table-hover tablesorter">
            	<thead>
                	<tr>
                    	<th>ID</th>
                        <th>NO.</th>
                        <th>N.I.P</th>
                        <th>Tanggal</th>
                        <th>Judul Seminar</th>
                        <th>Sebagai</th>
                        <th>Jenis Seminar</th>
                        <th>Kota</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                	<?php
					if ($c=mysql_num_rows($b))
						{
							while ($d=mysql_fetch_array($b))
								{
					?>
                	<tr>
                    	<td><?php echo $d['urut']; ?></td>
                    	<td><?php echo $d['no_seminar']; ?></td>
                        <td><?php echo $d['nip']; ?></td>
                        <td><?php echo $d['tanggal_seminar']; ?></td>
                        <td><?php echo $d['judul_seminar']; ?></td>
                        <td><?php echo $d['sebagai']; ?></td>
                        <td><?php echo $d['jenis_seminar'];?></td>
                        <td><?php echo $d['kota'];?></td>
                        <td><a href="konfig/konfig.edit.seminar.php?ur=<?php echo $d['no_seminar'];?>&n=<?php echo $d['nip'];?>" class="btn btn-xs btn-warning" value="Edit">Edit</a>&nbsp;<a href="konfig/konfig.koneksi.hapus.seminar.php?x=<?php echo $d['no_seminar']?>&n=<?php echo $d['nip'];?>" class="btn btn-xs btn-danger">Hapus</a></td>
                    </tr>
                    <?php } } ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
    
<body>
</body>
</html>