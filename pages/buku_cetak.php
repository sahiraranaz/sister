<?php
include "../koneksi.php";
?>

    <link rel="stylesheet" type="text/css" href="style.css">

        <h3>Data Buku</h3>
        <div id="content">
            <table border="1" id="table-tampil">
                <thead>
                    <tr>
                        <th id="label-tampil-no">No</th>
                        <th>ID Buku</th>
                        <th>Judul Buku</th>
                        <th>Sampul</th>   
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $nomor = 1;
                        $query = "SELECT * FROM tbbuku ORDER BY idbuku ASC";
                        $q_tampil_buku = mysqli_query($db, $query);

                        if(mysqli_num_rows($q_tampil_buku) > 0){
                            while($r_tampil_buku=mysqli_fetch_array($q_tampil_buku)){
                                if(empty($r_tampil_buku['foto']) or ($r_tampil_buku['foto'] == '-')){
                                    $foto = "../images/admin-no-photo.jpg";
                                }else{
                                    $foto = $r_tampil_buku['foto'];
                                }
                    ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $r_tampil_buku['idanggota']; ?></td>
                            <td><?php echo $r_tampil_buku['nama'] ?></td>
                            <td><img src="../images/<?php echo $foto; ?>" width="70px" height="70px"></td>
                            <td><?php echo $r_tampil_buku['jeniskelamin']; ?></td>
                            <td><?php echo $r_tampil_buku['alamat']; ?></td>
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