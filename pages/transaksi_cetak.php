<?php
include "../koneksi.php";
?>

    <link rel="stylesheet" type="text/css" href="style.css">

        <h3>Data Transaksi</h3>
        <div id="content">
            <table border="1" id="table-tampil">
                <thead>
                    <tr>
                        <th id="label-tampil-no">No</th>
                        <th>ID Peminjaman</th>
                        <th>ID Anggota</th>
                        <th>ID Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
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
                    ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $r_tampil_transaksi['idpeminjaman']; ?></td>
                            <td><?php echo $r_tampil_transaksi['idanggota'] ?></td>
                            <td><?php echo $r_tampil_transaksi['idbuku'] ?></td>
                            <td><?php echo $r_tampil_transaksi['tanggalpinjam']; ?></td>
                            <td><?php echo $r_tampil_transaksi['tanggalkembali']; ?></td>
                            <td><?php echo $r_tampil_transaksi['status']; ?></td>
                        </tr>
                        <?php
                                $nomor++;
                            }
                        }
                        ?>
                </tbody>
            </table>
        </div>
    <script>
        window.print();
    </script>