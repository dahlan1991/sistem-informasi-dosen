<?php  
session_start();  
ob_start();  
include_once("../konfig.koneksi.php"); //buat koneksi ke database  
$kode   = abs((int)$_GET['nip']); //kode berita yang akan dikonvert  
$query  = mysql_query("SELECT * FROM tb_dosen WHERE nip='$kode'") or die ("".mysql_error());  
$data   = mysql_fetch_array($query) or die ("".mysql_error());
?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />  
<title><?php echo $data['nip']; ?></title> 
</head>
<body>
<h1 align="center">Curriculum Vitae</h1>
<br>
<br>  
<table align="center">
	<tr>
    	<td><?php echo "<img src='foto/".$data['foto']."' width='195' height='220'>"; ?></td>
    </tr>
</table>
<br>
<table width="26%" align="center">
	<tr>
    	<td width="53%">N.I.P</td>
        <td width="4%">:</td>
        <td width="43%"><?php echo $data['nip'];?></td>
    </tr>
    <tr>
    	<td width="53%">N.I.D.N / N.I.D.K</td>
        <td width="4%">:</td>
        <td width="43%"><?php echo $data['nidn_nidk'];?></td>
    </tr>
</table>
<br>
<table width="60%">
    <tr>
      <td colspan="3"><h1>Biodata</h1></td>
    </tr>
    <tr>
      <td>Nama</td>
      <td>:</td>
      <td><?php echo $data['nama'];?></td>
    </tr>
    <tr>
      <td>Jenis Kelamin</td>
      <td>:</td>
      <td><?php echo $data['jenis_kelamin'];?></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td>:</td>
      <td><?php echo $data['alamat'];?></td>
    </tr>
    <tr>
      <td>Agama</td>
      <td>:</td>
      <td><?php echo $data['agama'];?></td>
    </tr>
    <tr>
      <td>Pendidikan Terakhir</td>
      <td>:</td>
      <td><?php echo $data['pendidikan_terakhir'];?></td>
    </tr>
    <tr>
      <td>Jabatan</td>
      <td>:</td>
      <td><?php echo $data['jabatan'];?></td>
    </tr>
    <tr>
      <td>Telepon</td>
      <td>:</td>
      <td><?php echo $data['telepon'];?></td>
    </tr>
    <tr>
      <td>E-mail</td>
      <td>:</td>
      <td><?php echo $data['email'];?></td>
    </tr>
</table>
<br>
<h1>Pendidikan</h1>
<table width="100%">
    <tr>
    	<td width="4%"><strong>No.</strong></td>
        <td width="9%"><strong>Tahun Lulus</strong></td>
        <td width="28%"><strong>Jenjang</strong></td>
        <td width="6%"><strong>Gelar</strong></td>
        <td width="20%"><strong>Universitas</strong></td>
        <td width="16%"><strong>Bidang Ilmu</strong></td>
        <td width="17%"><strong>No. Ijazah</strong></td>
    </tr>
    <?php 
	$a=mysql_query("select * from tb_pendidikan where nip='$kode' order by no_pendidikan") or die ("".mysql_error());
	while($b=mysql_fetch_array($a)){?>
    <tr>
    	<td><?php echo $b['no_pendidikan'];?></td>
        <td><?php echo $b['tahun_lulus'];?></td>
        <td><?php echo $b['jenjang'];?></td>
        <td><?php echo $b['gelar'];?></td>
        <td><?php echo $b['nama_universitas'];?></td>
        <td><?php echo $b['bidang_ilmu'];?></td>
        <td><?php echo $b['no_ijasah'];?></td>
    </tr>
    <?php } ?>
</table>
<br>
<h1>Jabatan Akademik</h1>
<table width="100%">
    <tr>
    	<td width="4%"><strong>No.</strong></td>
        <td width="21%"><strong>Tahun Diangkat</strong></td>
        <td width="48%"><strong>Posisi</strong></td>
        <td width="27%"><strong>No. SK</strong></td>
    </tr>
    <?php 
	$c=mysql_query("select * from tb_jabatan_ak where nip='$kode' order by no_jabatan") or die ("".mysql_error());
	while($d=mysql_fetch_array($c)){	?>
    <tr>
    	<td><?php echo $d['no_jabatan'];?></td>
        <td><?php echo $d['tahun_diangkat'];?></td>
        <td><?php echo $d['posisi'];?></td>
        <td><?php echo $d['no_sk'];?></td>
    </tr>
    <?php } ?>
</table>
<br>
<h1>Jabatan Fungsional</h1>
<table width="100%">
    <tr>
    	<td width="4%"><strong>No.</strong></td>
        <td width="6%"><strong>Tahun</strong></td>
        <td width="22%"><strong>Jab. Fungsional</strong></td>
        <td width="29%"><strong>SK Jab. Fungsional</strong></td>
        <td width="39%"><strong>SK Sertifikasi</strong></td>
    </tr>
    <?php 
	$e=mysql_query("select * from tb_jafung where nip='$kode' order by no_jafung") or die ("".mysql_error());
	while($f=mysql_fetch_array($e)){?>
    <tr>
    	<td><?php echo $f['no_jafung'];?></td>
        <td><?php echo $f['tahun_jafung'];?></td>
        <td><?php echo $f['jafung'];?></td>
        <td><?php echo $f['sk_jafung'];?></td>
        <td><?php echo $f['sk_sertifikasi'];?></td>
    </tr>
    <?php } ?>
</table>
<br>
<h1>Pengajaran</h1>
<table width="100%">
    <tr>
    	<td width="4%"><strong>No.</strong></td>
        <td width="19%"><strong>Tahun</strong></td>
        <td width="21%"><strong>Semester</strong></td>
        <td width="27%"><strong>Mata Kuliah</strong></td>
        <td width="29%"><strong>SK Mengajar</strong></td>
    </tr>
    <?php 
	$g=mysql_query("select * from tb_pengajaran where nip='$kode' order by no_pengajaran") or die ("".mysql_error());
	while($h=mysql_fetch_array($g)){?>
    <tr>
    	<td><?php echo $h['no_pengajaran'];?></td>
        <td><?php echo $h['tahun_akademik'];?></td>
        <td><?php echo $h['semester'];?></td>
        <td><?php echo $h['mata_kuliah'];?></td>
        <td><?php echo $h['sk_mengajar'];?></td>
    </tr>
    <?php } ?>
</table>
<br>
<h1>Bimbingan</h1>
<table width="100%">
	<tr>
    	<td width="4%"><strong>No.</strong></td>
        <td width="7%"><strong>Tahun</strong></td>
        <td width="23%"><strong>Nama Mahasiswa</strong></td>
        <td width="66%"><strong>Judul</strong></td>
    </tr>
    <?php 
	$i=mysql_query("select * from tb_bimbingan where nip='$kode' order by no_bimbingan") or die ("".mysql_error());
	while($j=mysql_fetch_array($i)){?>
    <tr>
    	<td><?php echo $j['no_bimbingan'];?></td>
        <td><?php echo $j['tahun_bimbingan'];?></td>
        <td><?php echo $j['nama_mahasiswa'];?></td>
        <td><?php echo $j['judul'];?></td>
    </tr>
    <?php } ?>
</table>
<br>
<h1>Hasil Buku</h1>
<table width="100%">
    <tr>
    	<td width="4%"><strong>No.</strong></td>
        <td width="20%"><strong>Penulis</strong></td>
        <td width="6%"><strong>Tahun Terbit</strong></td>
        <td width="39%"><strong>Judul Buku</strong></td>
        <td width="31%"><strong>Penerbit Buku</strong></td>
    </tr>
    <?php 
	$k=mysql_query("select * from tb_buku where nip='$kode' order by no_buku") or die ("".mysql_error());
	while($l=mysql_fetch_array($k)){?>
    <tr>
    	<td><?php echo $l['no_buku'];?></td>
        <td><?php echo $l['penulis'];?></td>
        <td><?php echo $l['tahun_terbit'];?></td>
        <td><?php echo $l['judul_buku'];?></td>
        <td><?php echo $l['penerbit_buku'];?></td>
    </tr>
    <?php } ?>
</table>
<br>
<h1>Penelitian</h1>
<table width="100%">
    <tr>
    	<td width="4%"><strong>No.</strong></td>
        <td width="6%"><strong>Tahun</strong></td>
        <td width="50%"><strong>Judul Penelitian</strong></td>
        <td width="40%"><strong>Tempat Publikasi</strong></td>
    </tr>
    <?php 
	$m=mysql_query("select * from tb_penelitian where nip='$kode' order by no_penelitian") or die ("".mysql_error());
	while($n=mysql_fetch_array($m)){	?>
    <tr>
    	<td><?php echo $n['no_penelitian'];?></td>
        <td><?php echo $n['tahun_penelitian'];?></td>
        <td><?php echo $n['judul_penelitian'];?></td>
        <td><?php echo $n['tempat_publikasi'];?></td>
    </tr>
    <?php } ?>
</table>
<br>
<h1>Penghargaan</h1>
<table width="100%">
    <tr>
    	<td width="4%"><strong>No.</strong></td>
        <td width="15%"><strong>Tanggal</strong></td>
        <td width="48%"><strong>Jenis Penghargaan</strong></td>
        <td width="33%"><strong>Pemberi</strong></td>
    </tr>
    <?php 
	$o=mysql_query("select * from tb_penghargaan where nip='$kode' order by no_penghargaan") or die ("".mysql_error());
	while($p=mysql_fetch_array($o)){?>
    <tr>
    	<td><?php echo $p['no_penghargaan'];?></td>
        <td><?php echo $p['tanggal_penghargaan'];?></td>
        <td><?php echo $p['jenis_penghargaan'];?></td>
        <td><?php echo $p['pemberi'];?></td>
    </tr>
    <?php } ?>
</table>
<br>
<h1>Seminar</h1>
<table width="100%">
    <tr>
    	<td width="4%"><strong>No.</strong></td>
        <td width="11%"><strong>Tanggal</strong></td>
        <td width="50%"><strong>Judul Seminar</strong></td>
        <td width="9%"><strong>Sebagai</strong></td>
        <td width="11%"><strong>Jenis Seminar</strong></td>
        <td width="15%"><strong>Kota</strong></td>
    </tr>
    <?php 
	$q=mysql_query("select * from tb_seminar where nip='$kode' order by no_seminar") or die ("".mysql_error());
	while($r=mysql_fetch_array($q)){?>
    <tr>
    	<td><?php echo $r['no_seminar'];?></td>
        <td><?php echo $r['tanggal_seminar'];?></td>
        <td><?php echo $r['judul_seminar'];?></td>
        <td><?php echo $r['sebagai'];?></td>
        <td><?php echo $r['jenis_seminar'];?></td>
        <td><?php echo $r['kota'];?></td>
    </tr>
    <?php } ?>
</table>
<br>
<h1>Pengabdian Kepada Masyarakat</h1>
<table width="100%">
    <tr>
    	<td width="4%"><strong>No.</strong></td>
        <td width="7%"><strong>Tahun</strong></td>
        <td width="43%"><strong>Judul</strong></td>
        <td width="20%"><strong>Tempat</strong></td>
        <td width="26%"><strong>Publikasi</strong></td>
    </tr>
    <?php 
	$s=mysql_query("select * from tb_pkm where nip='$kode' order by no_pkm") or die ("".mysql_error());
	while($t=mysql_fetch_array($s)){?>
    <tr>
    	<td><?php echo $t['no_pkm'];?></td>
        <td><?php echo $t['tahun_pkm'];?></td>
        <td><?php echo $t['judul_pkm'];?></td>
        <td><?php echo $t['tempat_pkm'];?></td>
        <td><?php echo $t['publikasi_pkm'];?></td>
    </tr>
    <?php } ?>
</table>
</body>  
</html><!-- Akhir halaman HTML yang akan di konvert -->  
<?php
$filename="dosen-".$kode.".pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya  
//==========================================================================================================  
$content = ob_get_clean();  
$content = '<page style="font-family: freeserif">'.$content.'</page>';
require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');  
try  
	{  
      $html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(10, 0, 20, 0));  
      $html2pdf->setDefaultFont('Arial');  
      $html2pdf->writeHTML($content, isset($_GET['vuehtml']));  
      $html2pdf->Output($filename);  
    }
catch(HTML2PDF_exception $e) { echo $e; }
?>