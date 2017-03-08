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
	<!--modal header-->
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
                    <li><a href="index.php"><span class="glyphicon glyphicon-menu-left"></span> Kembali</a></li>
                </ul>
            </div><!--penutup navbar atas collapse-->
        </div> <!--cpenutup container-->
    </nav> <!--penutup navbar-->
    <!--modal body-->
    <div class=" container-fluid">
        <div class="col-lg-12">
        	<div class="row">
            	<div class="col-lg-3">
                <?php
				$n=abs((int)$_GET['n']); $p=abs((int)$_GET['p']);
				
				$a="select * from tb_dosen where nip=$n and nidn_nidk=$p";
				$a1=mysql_query($a) or die ("".mysql_error());
				if ($a4=mysql_num_rows($a1) >0) {
				$a2=mysql_fetch_array($a1) or die ("".mysql_error());
				
				?>
                	<table class="table table-condensed">
                    <tr>
            			<td><label>N.I.P</label></td>
                    	<td><?php echo $a2['nip']; ?></td>
            		</tr>
            		<tr>
                        <td><label>N.I.D.N / N.I.D.K</label></td>
                        <td><?php echo $a2['nidn_nidk']; ?></td>
            		</tr>
            		<tr>
                        <td><label>Nama</label></td>
                        <td><?php echo $a2['nama']; ?></td>
            		</tr>
            		<tr>
                        <td><label>Jenis Kelamin</label></td>
                        <td><?php echo $a2['jenis_kelamin']; ?></td>
            		</tr>
            		<tr>
                        <td><label>Alamat</label></td>
                        <td><?php echo $a2['alamat']; ?></td>
            		</tr>
            		<tr>
                        <td><label>Agama</label></td>
                        <td><?php echo $a2['agama']; ?></td>
            		</tr>
            		<tr>
                        <td><label>Pendidikan Terakhir</label></td>
                        <td><?php echo $a2['pendidikan_terakhir']; ?></td>
            		</tr>
            		<tr>
                        <td><label>Jabatan</label></td>
                        <td><?php echo $a2['jabatan']; ?></td>
            		</tr>
            		<tr>
            			<td><label>Telepon</label></td>
                		<td><?php echo $a2['telepon']; ?></td>
            		</tr>
            		<tr>
            			<td><label>Email</label></td>
                		<td><?php echo $a2['email']; ?></td>
            		</tr>
        			</table>
                    <?php } ?>
                </div>
                <div class="col-lg-2">
                    <?php echo "<img src='administrasi/foto/".$a2['foto']."' width='195px' height='195px'>"; ?>
                </div>
                <div class="col-lg-7">
                	
                    <!--<div class="panel panel-primary panel-heading">ddd</div>-->
                    <ul class="nav nav-tabs">
                    	<li class="active"><a data-toggle="tab" href="#spendidikan">Pendidikan</a></li>
                        <li><a data-toggle="tab" href="#buku">Buku</a></li>
                        <li><a data-toggle="tab" href="#bimbingan">Bimbingan</a></li>
                        <li><a data-toggle="tab" href="#akademik">Jab. Akademik</a></li>
                        <li><a data-toggle="tab" href="#fungsional">Jab. Fungsional</a></li>
                        <li><a data-toggle="tab" href="#penelitian">Penelitian</a></li>
                        <li><a data-toggle="tab" href="#pengajaran">Pengajaran</a></li>
                        <li><a data-toggle="tab" href="#penghargaan">Penghargaan</a></li>
                        <li><a data-toggle="tab" href="#pkm">PKM</a></li>
                        <li><a data-toggle="tab" href="#seminar">Seminar</a></li>
                    </ul>
                    <div class="tab-content">
                    	<div id="spendidikan" class="tab-pane fade in active">
                        	<div class="form-group">
                            	<table id="pend" class="table table-condensed"><br>
                            		<thead>
                                		<tr>
                                			<th>No.</th>
                                    		<th>Tahun Lulus</th>
                                    		<th>Jenjang</th>
                                    		<th>Gelar</th>
                                    		<th>Nama Universitas</th>
                                    		<th>Bidang Ilmu</th>
                                    		<th>No. Ijazah</th>
                                		</tr>
                                	</thead>
                                	<tbody>
                                	<?php
										$b="select * from tb_pendidikan where nip=$n";
										$b1=mysql_query($b) or die ("".mysql_error());
										$hal_pen=1;
										//if ($b2=mysql_num_rows($b1) > 0) { 
										while ($b3=mysql_fetch_array($b1)) {
											//$b4=$b3['id'];
									?>                                   
                                	<tr>
                                		<td><?php echo $hal_pen; ?></td>
                                    	<td><?php echo $b3['tahun_lulus']; ?></td>
                                    	<td><?php echo $b3['jenjang']; ?></td>
                                    	<td><?php echo $b3['gelar']; ?></td>
                                    	<td><?php echo $b3['nama_universitas']; ?></td>
                                    	<td><?php echo $b3['bidang_ilmu'];  ?></td>
                                    	<td><?php echo $b3['no_ijasah'];  ?></td>
                                	</tr>
                                	<?php $hal_pen++; }  ?>
                                	</tbody>
                            	</table>
                            </div>
                        </div>
                        <div id="buku" class="tab-pane fade">
                        	<table id="buk" class="table table-condensed"><br>
                            	<thead>
                                	<tr>
                                		<th>No.</th>
                                    	<th>Penulis</th>
                                    	<th>Judul Buku</th>
                                    	<th>Tahun Terbit</th>
                                    	<th>Penerbit Buku</th>
                                	</tr>
                                </thead>
                                <tbody>
                                	<?php
									$c="select * from tb_buku where nip=$n";
									$c1=mysql_query($c) or die ("".mysql_error());
									$hal_buku=1; 
									while ($c3=mysql_fetch_array($c1)) {
										//$c4=$c3['id'];
								?>
                                <tr>
                                	<td><?php echo $hal_buku; ?></td>
                                    <td><?php echo $c3['penulis']; ?></td>
                                    <td><?php echo $c3['judul_buku']; ?></td>
                                    <td><?php echo $c3['tahun_terbit']; ?></td>
                                    <td><?php echo $c3['penerbit_buku']; ?></td>
                                </tr>
                                <?php $hal_buku++; }  ?>
                            </table>
                        </div>
                        <div id="bimbingan" class="tab-pane fade">
                        	<table id="bim" class="table table-condensed"><br>
                            	<thead>
                               		<tr>
                                		<th>No. Bimbingan</th>
                                    	<th>Tahun Bimbingan</th>
                                    	<th>Nama Mahasiswa</th>
                                    	<th>Judul</th>
                                	</tr>
                                </thead>
                                <body>
                                <?php
									$d="select * from tb_bimbingan where nip=$n";
									$d1=mysql_query($d) or die ("".mysql_error());
									$hal_bim=1;
									while ($d3=mysql_fetch_array($d1)){
										//$d4=$d3['id'];
								?>
                                	<tr>
                                		<td><?php echo $hal_bim; ?></td>
                                    	<td><?php echo $d3['tahun_bimbingan']; ?></td>
                                    	<td><?php echo $d3['nama_mahasiswa']; ?></td>
                                    	<td><?php echo $d3['judul']; ?></td>
                                	</tr>
                                <?php $hal_bim++; } ?>
                                </body>
                            </table>
                        </div>
                        <div id="akademik" class="tab-pane fade">
                        	<table id="akadem" class="table table-condensed"><br>
                            	<thead>
                                	<tr>
                                		<th>No.</th>
                                    	<th>Tahun Diangkat</th>
                                    	<th>Posisi</th>
                                    	<th>No. SK</th>
                                	</tr>
                                </thead>
                                <tbody>
                                <?php
									$e="select * from tb_jabatan_ak where nip=$n";
									$e1=mysql_query($e) or die ("".mysql_error());
									$hal_aka=1; 
									while ($e3=mysql_fetch_array($e1)) {
										//$e4=$e3['id'];
								?>
                                <tr>
                                	<td><?php echo $hal_aka; ?></td>
                                    <td><?php echo $e3['tahun_diangkat']; ?></td>
                                    <td><?php echo $e3['posisi']; ?></td>
                                    <td><?php echo $e3['no_sk']; ?></td>
                                </tr>
                                <?php $hal_aka++; }?>
                                </tbody>
                            </table>
                        </div>
                        <div id="fungsional" class="tab-pane fade">
                        	<table id="fungsi" class="table table-condensed"><br>
                            	<thead>
                                	<tr>
                                		<th>No.</th>
                                    	<th>Tahun Jabatan Fungsional</th>
                                    	<th>Jabatan Fungsional</th>
                                    	<th>SK Jabatan Fungsional</th>
                                    	<th>SK Sertifikasi</th>
                                	</tr>
                                </thead>
                                <tbody>
                                <?php
									$f="select * from tb_jafung where nip=$n";
									$f1=mysql_query($f) or die ("".mysql_error());
									$hal_fung=1; 
									while ($f3=mysql_fetch_array($f1)) {
										//$f4=$f3['id'];
								?>
                                <tr>
                                	<td><?php echo $hal_fung; ?></td>
                                    <td><?php echo $f3['tahun_jafung']; ?></td>
                                    <td><?php echo $f3['jafung']; ?></td>
                                    <td><?php echo $f3['sk_jafung']; ?></td>
                                    <td><?php echo $f3['sk_sertifikasi']; ?></td>
                                </tr>
                                <?php $hal_fung++; }?>
                                </tbody>
                            </table>
                        </div>
                        <div id="penelitian" class="tab-pane fade">
                        	<table id="penel" class="table table-condensed"><br>
                            	<thead>
                                	<tr>
                                		<th>No.</th>
                                    	<th>Tahun Penelitian</th>
                                    	<th>Judul Penelitian</th>
                                    	<th>Tempat Publikasi</th>
                                	</tr>
                                </thead>
                                <tbody>
                                <?php
									$g="select * from tb_penelitian where nip=$n";
									$g1=mysql_query($g) or die ("".mysql_error());
									$hal_pene=1;
									while ($g3=mysql_fetch_array($g1)) {
										//$g4=$g3['id'];
								?>
                                	<tr>
                                		<td><?php echo $hal_pene; ?></td>
                                    	<td><?php echo $g3['tahun_penelitian']; ?></td>
                                    	<td><?php echo $g3['judul_penelitian']; ?></td>
                                    	<td><?php echo $g3['tempat_publikasi']; ?></td>
                                	</tr>
                                <?php $hal_pene++; }?>
                                </tbody>
                            </table>
                        </div>
                        <div id="pengajaran" class="tab-pane fade">
                        	<table id="penga" class="table table-condensed"><br>
                            	<thead>
                                	<tr>
                                		<th>No.</th>
                                    	<th>Tahun Akademik</th>
                                    	<th>Semester</th>
                                    	<th>Mata Kuliah</th>
                                    	<th>SK Mengajar</th>
                                	</tr>
                                </thead>
                                <tbody>
								<?php
									$h="select * from tb_pengajaran where nip=$n";
									$h1=mysql_query($h) or die ("".mysql_error());
									$hal_penga=1; 
									while ($h3=mysql_fetch_array($h1)) {
										//$h4=$h3['id'];
								?>
                                <tr>
                                	<td><?php echo $hal_penga; ?></td>
                                    <td><?php echo $h3['tahun_akademik']; ?></td>
                                    <td><?php echo $h3['semester']; ?></td>
                                    <td><?php echo $h3['mata_kuliah']; ?></td>
                                    <td><?php echo $h3['sk_mengajar']; ?></td>
                                </tr>
                                <?php $hal_penga++; }?>
                                </tbody>
                            </table>
                        </div>
                        <div id="penghargaan" class="tab-pane fade">
                        	<table id="penghar" class="table table-condensed"><br>
                            	<thead>
                                	<tr>
                                		<th>No.</th>
                                    	<th>Tanggal Penghargaan</th>
                                    	<th>Jenis Penghargaan</th>
                                    	<th>Pemberi</th>
                               		</tr>
                                </thead>
                                <tbody>
								<?php
									$i="select * from tb_penghargaan where nip=$n";
									$i1=mysql_query($i) or die ("".mysql_error());
									$hal_penghar=1;
									while ($i3=mysql_fetch_array($i1)) {
										//$i4=$i3['id'];
								?>
                                	<tr>
                                		<td><?php echo $hal_penghar; ?></td>
                                    	<td><?php echo $i3['tanggal_penghargaan']; ?></td>
                                    	<td><?php echo $i3['jenis_penghargaan']; ?></td>
                                    	<td><?php echo $i3['pemberi']; ?></td>
                                	</tr>
                                <?php $hal_penghar++; }?>
                                </tbody>
                            </table>
                        </div>
                        <div id="pkm" class="tab-pane fade">
                        	<table id="pk" class="table table-condensed"><br>
                            	<thead>
                            		<tr>
                                		<th>No.</th>
                                    	<th>Tahun PKM</th>
                                    	<th>Tempat PKM</th>
                                    	<th>Judul PKM</th>
                                    	<th>Publikasi PKM</th>
                                	</tr>
                             	</thead>
                             	<tbody>
                                <?php
									$j=mysql_query("select * from tb_pkm where nip=$n");
									$hal_pkm = 1;
									while ($j3=mysql_fetch_array($j)){
									//$j3=$j2['urut'];
								?>
                                	<tr>
                                		<td><?php echo $hal_pkm ; ?></td>
                                    	<td><?php echo $j3['tahun_pkm']; ?></td>
                                    	<td><?php echo $j3['tempat_pkm']; ?></td>
                                    	<td><?php echo $j3['judul_pkm']; ?></td>
                                    	<td><?php echo $j3['publikasi_pkm']; ?></td>
                                	</tr>
                                	<?php $hal_pkm++; }?>
                                </tbody>
                            </table>
                        </div>
                        <div id="seminar" class="tab-pane fade">
                            <table id="semi" class="table-striped"><br>
                            	<thead>
                                <tr>
                                	<th>No.</th>
                                    <th>Tanggal Seminar</th>
                                    <th>Judul Seminar</th>
                                    <th>Sebagai</th>
                                    <th>Jenis<br>Seminar</th>
                                    <th>Kota</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
									$k=mysql_query("select * from tb_seminar where nip=$n");
									$hal_seminar = 1;
									while ($k2 = mysql_fetch_array($k)) {
										//$k3 = $k2['id'];
								?>
                                <tr>
                                	<td><?php echo $hal_seminar; ?></td>
                                    <td><?php echo $k2['tanggal_seminar']; ?></td>
                                    <td><?php echo $k2['judul_seminar']; ?></td>
                                    <td><?php echo $k2['sebagai']; ?></td>
                                    <td><?php echo $k2['jenis_seminar']; ?></td>
                                    <td><?php echo $k2['kota']; ?></td>
                                </tr>    
                                <?php	$hal_seminar++;	}?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
          
    
    <!--memanggil javascript-->
	<!--jQuery (penting untuk Bootstrap javascript plugin-->
	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.js"></script>
    <script src="js/dataTables.bootstrap.js"></script>
    <script>
		$ (document) .ready(function() {
			$('#pend').dataTable();
			$('#buk').dataTable();
			$('#bim').dataTable();
			$('#akadem').dataTable();
			$('#fungsi').dataTable();
			$('#penel').dataTable();
			$('#penga').dataTable();
			$('#penghar').dataTable();
			$('#pk').dataTable();
			$('#semi').dataTable();
		});
	</script>
</body>
	
    
</html>
