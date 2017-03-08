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
<title>Informasi Dosen</title>
	<!--memanggil Bootstrap-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.css" />
    <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.css" />
    
    <!--Memanggil custom CSS-->
    <link rel="stylesheet" type="text/css" href="../css/style-sidebar.css" />
    <!-- HTML5 shim dan respond.js IE8 support  HTML5 -->
    <!--Warning: Respond.js tidak bekerja didalam file -->
    <!-- [if lt IE 9]>
    	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->     
</head>
<body>
	<!--modal header-->
    <div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
        <h4 class="modal-title">Informasi Dosen</h4>
    </div>
    <!--modal body-->
    <div class="modal-body row">
    	<div class="col-lg-12">
            <table id="lis" class="table table-striped table-hover table-bordered">
            	<thead>
                	<tr>
                    	<th>NO.</th>
                        <th>N.I.P</th>
                        <th>N.I.D.N /<br>N.I.D.K</th>
                        <th>Nama</th>
                        <th>Tanggal<br>Lahir</th>
                        <th>Jenis<br>Kelamin</th>
                        <th>Telepon</th>
                        <th>E-mail</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                	<?php
                    $a="select * from tb_dosen";
                    $b=mysql_query($a) or die ("".mysql_error());
                    $no_lis=1;
					while ($d=mysql_fetch_array($b))
						{
					?>
                	<tr>
                    	<td><?php echo $no_lis ?></td>
                        <td><?php echo $d['nip']; ?></td>
                        <td><?php echo $d['nidn_nidk']; ?></td>
                        <td><?php echo $d['nama']; ?></td>
                        <td><?php echo $d['tanggal']; ?></td>
                        <td><?php echo $d['jenis_kelamin']; ?></td>
                        <td><?php echo $d['telepon']; ?></td>
                        <td><?php echo $d['email']; ?></td>
                        <td>
                            <a href="konfig/konfig.edit.dosen.php?id=<?php echo $d['no'];?>" class="btn btn-xs btn-warning" value="Edit">Edit</a>&nbsp;
                            <a href="konfig/konfig.koneksi.hapus.dosen.php?n=<?php echo $d['no'];?>" class="btn btn-xs btn-danger">Hapus</a>&nbsp;
                            <a href="report.php?nip=<?php echo $d['nip'];?>" class="btn btn-xs btn-success">PDF</a>
                        </td>
                    </tr>
                    <?php $no_lis++; } ?>
                </tbody>
            </table>
       </div>
    </div>

    <!--JS-->
    <script src="js/jquery.min.js"></script>
    <script src="../js/jquery.dataTables.js"></script>
    <script src="../js/dataTables.bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript" >
        $(document).ready(function() {
            $('#lis').dataTable();
        });
    </script>   
</body>
</html>