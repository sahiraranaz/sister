<?php
require("../vendor/autoload.php");
require("../koneksi.php");

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet = new Spreadsheet();
$spreadsheet -> setActiveSheetIndex(0)
->setCellValue('A1', 'Daftar Anggota')
->setCellValue('A3', 'No')
->setCellValue('B3', 'ID Anggota')
->setCellValue('C3', 'Nama')
->setCellValue('D3', 'Foto')
->setCellValue('E3', 'Jenis Kelamin')
->setCellValue('F3', 'Alamat')
->setCellValue('G3', 'Status');

$sheet = $spreadsheet->getActiveSheet();
$nomor = 5;
$query = "SELECT * FROM tbanggota";
$q_tampil_anggota = mysqli_query($db, $query);
if(mysqli_num_rows($q_tampil_anggota)>0){
    while($r_tampil_anggota=mysqli_fetch_array($q_tampil_anggota)){
        if(empty($r_tampil_anggota['foto']) or ($r_tampil_anggota['foto']=='-')){
            $foto = "admin-no-photo.jpg";
        }
        else{
            $foto = $r_tampil_anggota['foto'];
        }
        foreach($q_tampil_anggota as $idx => $val){
            $idx++;
            $sheet->setCellValue('A'.$nomor, $idx);
            $sheet->setCellValue('B'.$nomor, $val['idanggota']);
            $sheet->setCellValue('C'.$nomor, $val['nama']);
            $sheet->setCellValue('D'.$nomor, $val['foto']);
            $sheet->setCellValue('E'.$nomor, $val['jeniskelamin']);
            $sheet->setCellValue('F'.$nomor, $val['alamat']);
            $sheet->setCellValue('G'.$nomor, $val['status']);
        $nomor++;
        }
    }
}

$sheet->setTitle('Daftar Anggota');
$spreadsheet->setActiveSheetIndex(0);

$filename = 'DaftarAnggota.xlsx';

ob_end_clean();

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="'.$filename.'"');
header('Cache-Control: max-age=0');
header('Cache-Control: max-age=1');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' .gmdate('D, d M Y H:i:s').' GMT');
header('Cache-Control: cache, must-revalidate');
header('Pragma: public');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer-> save('php://output');
exit();

?>