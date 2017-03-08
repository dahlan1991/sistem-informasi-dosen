<?php
/*******************************************
    Export Excel dengan PHPExcel
 
    Dibuat oleh : Danni Moring
    pemrograman : PHP
******************************************/

include "konfig.koneksi.php";
include "/PHPExcel/Classes/PHPExcel.php";

date_default_timezone_set("Asia/Jakarta");

$excelku = new PHPExcel();

// Set properties
$excelku->getProperties()->setCreator("Danni Moring")
                         ->setLastModifiedBy("Danni Moring");

// Set lebar kolom
$excelku->getActiveSheet()->getColumnDimension('A')->setWidth(5);
$excelku->getActiveSheet()->getColumnDimension('B')->setWidth(20);
$excelku->getActiveSheet()->getColumnDimension('C')->setWidth(70);
$excelku->getActiveSheet()->getColumnDimension('D')->setWidth(10);
$excelku->getActiveSheet()->getColumnDimension('E')->setWidth(20);
$excelku->getActiveSheet()->getColumnDimension('F')->setWidth(10);

// Mergecell, menyatukan beberapa kolom
$excelku->getActiveSheet()->mergeCells('A1:F1');
$excelku->getActiveSheet()->mergeCells('A2:F2');

// Buat Kolom judul tabel
$SI = $excelku->setActiveSheetIndex(0);
$SI->setCellValue('A1', 'Data-data siswa'); //Judul laporan
$SI->setCellValue('A3', 'No'); //Kolom No
$SI->setCellValue('B3', 'Tanggal'); //Kolom Nama
$SI->setCellValue('C3', 'Judul'); //Kolom Alamat
$SI->setCellValue('D3', 'Sebagia'); //Kolom Telp
$SI->setCellValue('E3', 'Jenis Seminar'); //Kolom Telp
$SI->setCellValue('F3', 'Kota'); //Kolom Telp

//Mengeset Syle nya
$headerStylenya = new PHPExcel_Style();
$bodyStylenya   = new PHPExcel_Style();

$headerStylenya->applyFromArray(
    array('fill'    => array(
          'type'    => PHPExcel_Style_Fill::FILL_SOLID,
          'color'   => array('argb' => 'FFEEEEEE')),
          'borders' => array('bottom'=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
                        'right'     => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
                        'left'      => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                        'top'       => array('style' => PHPExcel_Style_Border::BORDER_THIN)
          )
    ));
    
$bodyStylenya->applyFromArray(
    array('fill'    => array(
          'type'    => PHPExcel_Style_Fill::FILL_SOLID,
          'color'   => array('argb' => 'FFFFFFFF')),
          'borders' => array(
                        'bottom'    => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                        'right'     => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
                        'left'      => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                        'top'       => array('style' => PHPExcel_Style_Border::BORDER_THIN)
          )
    ));

//Menggunakan HeaderStylenya
$excelku->getActiveSheet()->setSharedStyle($headerStylenya, "A3:F3");

// Mengambil data dari tabel
$nip = $_GET['nip'];
$strsql = mysql_query("SELECT * from tb_seminar where nip=$nip order by urut") or die ("query gagal".mysql_error());
//$res    = mysql_query($strsql) or die ("".mysql_error());
$baris  = 4; //Ini untuk dimulai baris datanya, karena di baris 3 itu digunakan untuk header tabel
$no     = 1;

while ($row = mysql_fetch_array($strsql)) {
  $SI->setCellValue("A".$baris,$no++); //mengisi data untuk nomor urut
  $SI->setCellValue("B".$baris,$row['tanggal_seminar']); //mengisi data untuk nama
  $SI->setCellValue("C".$baris,$row['judul_seminar']); //mengisi data untuk alamat
  $SI->setCellValue("D".$baris,$row['sebagai']); //mengisi data untuk TELP
  $SI->setCellValue("E".$baris,$row['jenis_seminar']); //mengisi data untuk TELP
  $SI->setCellValue("F".$baris,$row['kota']); //mengisi data untuk TELP

  $baris++; //looping untuk barisnya
}
//Membuat garis di body tabel (isi data)
$excelku->getActiveSheet()->setSharedStyle($bodyStylenya, "A4:F$baris");

//Memberi nama sheet
$excelku->getActiveSheet()->setTitle('Datasiswa');

$excelku->setActiveSheetIndex(0);

// untuk excel 2007 atau yang berekstensi .xlsx
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename=datasiswa.xlsx');
header('Cache-Control: max-age=0');
 
$objWriter = PHPExcel_IOFactory::createWriter($excelku, 'Excel2007');
$objWriter->save('php://output');
exit;

?>