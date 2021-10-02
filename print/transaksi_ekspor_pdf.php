<?php
require("../vendor/autoload.php");
require("../koneksi.php");

use Dompdf\Dompdf;

$html = '<h1>Daftar Transaksi</h1>';
$html .= '<table width = "100%" border="1" cellspacing="0" cellpadding="2">
<thead>
    <tr>
    <th>No</th>
    <th>ID Transaksi</th>
    <th>ID Anggota</th>
    <th>ID Buku</th>
    <th>Tanggal Pinjam</th>
    <th>Tanggal Kembali</th>
    <th>Status</th>
    </tr>
</thead>
<tbody>';
$nomor = 1;
$query = "SELECT * FROM tbtransaksi ORDER BY idpeminjaman ASC";
$q_tampil_transaksi = mysqli_query($db, $query);

if(mysqli_num_rows($q_tampil_transaksi) > 0){
    while($r_tampil_transaksi=mysqli_fetch_array($q_tampil_transaksi)){
        if(empty($r_tampil_transaksi['foto']) or ($r_tampil_transaksi['foto'] == '-')){
            $foto = "../images/buku_kosong.png";
        }else{
            $foto = $r_tampil_transaksi['foto'];
        }
        $html .=
        '<tr>
            <td>'.$nomor.'</td>
            <td>'.$r_tampil_transaksi['idpeminjaman'].'</td>
            <td>'.$r_tampil_transaksi['idanggota'].'</td>
            <td>'.$r_tampil_transaksi['idbuku'].'</td>
            <td>'.$r_tampil_transaksi['tanggalpinjam'].'</td>
            <td>'.$r_tampil_transaksi['tanggalkembali'].'</td>
            <td>'.$r_tampil_transaksi['status'].'</td>
        </tr>';
        $nomor++;
        }
    
} else {
    $html .= '<tr><td colspan="4> align="center">Tidak Ada Data</td></tr>';
}
$html .= '</tbody></html>';
$dompdf = new Dompdf();
$dompdf->set_option('isRemoteEnabled', TRUE);
$dompdf->load_html($html);
$dompdf->setPaper('a4', 'landscape');
$dompdf->render();
$dompdf->stream();

// echo $html

?>