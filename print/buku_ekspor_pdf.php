<?php
require("../vendor/autoload.php");
require("../koneksi.php");

use Dompdf\Dompdf;

$html = '<h1>Daftar Buku</h1>';
$html .= '<table width = "100%" border="1" cellspacing="0" cellpadding="2">
<thead>
    <tr>
    <th>No</th>
    <th>ID Buku</th>
    <th>Judul</th>
    <th>Foto</th>
    <th>Pengarang</th>
    <th>Penerbit</th>
    <th>Status</th>
    </tr>
</thead>
<tbody>';
$nomor = 1;
$query = "SELECT * FROM tbbuku ORDER BY idbuku ASC";
$q_tampil_buku = mysqli_query($db, $query);

if(mysqli_num_rows($q_tampil_buku) > 0){
    while($r_tampil_buku=mysqli_fetch_array($q_tampil_buku)){
        if(empty($r_tampil_buku['foto']) or ($r_tampil_buku['foto'] == '-')){
            $foto = "../images/buku_kosong.png";
        }else{
            $foto = $r_tampil_buku['foto'];
        }
        $html .=
        '<tr>
            <td>'.$nomor.'</td>
            <td>'.$r_tampil_buku['idbuku'].'</td>
            <td>'.$r_tampil_buku['judul'].'</td>
            <td><img src="http://localhost/pertemuan11/images/'.$foto.'" width=70px height=70px></td>
            <td>'.$r_tampil_buku['pengarang'].'</td>
            <td>'.$r_tampil_buku['penerbit'].'</td>
            <td>'.$r_tampil_buku['status'].'</td>
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