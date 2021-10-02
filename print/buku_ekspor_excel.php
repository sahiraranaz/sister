<?php
require("../vendor/autoload.php");
require("../koneksi.php");

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet = new Spreadsheet();
$spreadsheet -> setActiveSheetIndex(0)
->setCellValue('A1', 'Daftar Buku')
->setCellValue('A3', 'No')
->setCellValue('B3', 'ID Buku')
->setCellValue('C3', 'Judul')
->setCellValue('D3', 'Foto')
->setCellValue('E3', 'Pengarang')
->setCellValue('F3', 'Penerbit')
->setCellValue('G3', 'Status');

$sheet = $spreadsheet->getActiveSheet();
$nomor = 5;
$query = "SELECT * FROM tbbuku ORDER BY idbuku ASC";
$q_tampil_buku = mysqli_query($db, $query);

if(mysqli_num_rows($q_tampil_buku) > 0){
    while($r_tampil_buku=mysqli_fetch_array($q_tampil_buku)){
        if(empty($r_tampil_buku['foto']) or ($r_tampil_buku['foto'] == '-')){
            $foto = "../images/buku_kosong.png";
        }else{
            $foto = $r_tampil_buku['foto'];
        }
        foreach($q_tampil_buku as $idx => $val){
            $idx++;
            $sheet->setCellValue('A'.$nomor, $idx);
            $sheet->setCellValue('B'.$nomor, $val['idbuku']);
            $sheet->setCellValue('C'.$nomor, $val['judul']);
            $sheet->setCellValue('D'.$nomor, $val['foto']);
            $sheet->setCellValue('E'.$nomor, $val['pengarang']);
            $sheet->setCellValue('F'.$nomor, $val['penerbit']);
            $sheet->setCellValue('G'.$nomor, $val['status']);
        $nomor++;
        }
    }
}

$sheet->setTitle('Daftar Buku');
$spreadsheet->setActiveSheetIndex(0);

$filename = 'DaftarBuku.xlsx';

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