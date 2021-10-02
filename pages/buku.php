<div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Buku Tables</h6>
                        </div><br>
                        <p id="tombol-tambah-cotainer" style="padding-right:20px;" align="right">
                            <a href="index.php?p=buku-input" class="tombol">Tambah Buku<br><br></a>
                            <a target="_blank" href="buku_cetak.php"><img src="print.png" height="50px" height="50px"></a>
                            <a target="_blank" href="print/buku_ekspor_pdf.php"><img src="pdf.png" height="50px" height="50px"></a>
                            <a target="_blank" href="print/buku_ekspor_excel.php"><img src="excel.png" height="50px" height="50px"></a>
                        </p>
                        <div class="form-inline" style="padding-left:20px;">
                            <div align="left">
                                <form method=post>
                                    <input type="text" name="pencarian">
                                    <input type="submit" name="search" value="search" class="btn btn-primary">
                                </form>
                        </div>
                        <div class="card-body">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th id="label-tampil-no">No</td>
                                    <th>ID Buku</th>
                                    <th>Judul Buku</th>
                                    <th>Sampul</th>
                                    <th>Pengarang</th>
                                    <th>Penerbit</th>
                                    <th id="label-opsi">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $batas = 5;
                                extract ($_GET);
                                if(empty($hal)){
                                    $posisi = 0;
                                    $hal = 1;
                                    $nomor = 1;
                                }else{
                                    $posisi = ($hal-1)*$batas;
                                    $nomor = $posisi+1;
                                }
                                if($_SERVER['REQUEST_METHOD']=="POST"){
                                    $pencarian = trim(mysqli_real_escape_string($db, $_POST['pencarian']));
                                    if($pencarian != ""){
                                        $sql = "SELECT * FROM tbbuku WHERE judul LIKE '%$pencarian%'
                                        OR idbuku LIKE '%$pencarian%'
                                        OR pengarang LIKE '%$pencarian%'
                                        OR penerbit LIKE '%$pencarian%'";
                                        $query = $sql;
                                        $queryJml = $sql;
                                    } else{
                                        $query= "SELECT * FROM tbbuku LIMIT $posisi, $batas";
                                        $queryJml = "SELECT * FROM tbbuku";
                                        $no = $posisi * 1;
                                    }
                                }
                                else{
                                    $query = "SELECT *FROM tbbuku LIMIT $posisi, $batas";
                                    $queryJml = "SELECT *FROM tbbuku";
                                    $no = $posisi*1;
                                }
                                $q_tampil_buku = mysqli_query($db, $query);
                                if(mysqli_num_rows($q_tampil_buku)>0){
                                    while($r_tampil_buku=mysqli_fetch_array($q_tampil_buku)){
                                        if(empty($r_tampil_buku['foto']) or ($r_tampil_buku['foto']=='-')){
                                            $foto = "buku_kosong.png";
                                        }
                                        else{
                                            $foto = $r_tampil_buku['foto'];
                                        }
                                ?>
                                    <tr>
                                    <td><?php echo $nomor;?></td>
                                        <td><?php echo $r_tampil_buku['idbuku'];?></td>
                                        <td><?php echo $r_tampil_buku['judul'];?></td>
                                        <td><img src="images/<?php echo $foto; ?>" width="70px" height="70px"></td>
                                        <td><?php echo $r_tampil_buku['pengarang'];?></td>
                                        <td><?php echo $r_tampil_buku['penerbit'];?></td>
                                        <td><?php echo $r_tampil_buku['status'];?></td>
                                        <td>
                                            <div class="btn btn-warning"><a href="index.php?p=buku-edit&id=<?php echo $r_tampil_buku['idbuku'];?>" class="tombol"><font color="white">Edit</font></a></div>
                                            <div class="btn btn-danger"><a href="proses/buku-hapus.php?id=<?php echo $r_tampil_buku['idbuku'];?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="tombol"><font color="white">Hapus</font></a></div>
                                        </td>
                                    </tr>
                                    <?php
                                    $nomor++;
                                    }
                                }
                                else{
                                    echo "<tr><td colspan=6>Data tidak ditemukan</td></tr>";
                                }
                                ?>
                                </tbody>
                            </table>
                            <?php
                            if(isset($_POST['pencarian'])){
                                if($_POST['pencarian']!=''){
                                    echo "<div style=\"float:left;\">";
                                    $jml = mysqli_num_rows(mysqli_query($db, $queryJml));
                                    echo "Data hasil pencarian: <b>$jml</b>";
                                    echo "</div>";
                                }
                            } else{
                                ?>
                                <div style="float: left;">
                                <?php
                                $jml= mysqli_num_rows(mysqli_query($db, $queryJml));
                                echo "Jumlah data : <b>$jml</b>";
                                ?>
                                </div>
                                <div class="pagination">
                                    <?php
                                    $jml_hal = ceil($jml / $batas);
                                    for($i=1; $i<=$jml_hal; $i++){
                                        if($i !=$hal){
                                            echo "<button><a href=\"?p=buku&hal=$i\">$i</a></button>";
                                        }
                                        else{
                                            echo "<button><a class=\"active\">$i</a></button>";
                                        }
                                    }
                                    ?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>

                </div>