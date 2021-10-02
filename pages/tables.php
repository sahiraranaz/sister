<?php
include ('../koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Anggota</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Anggota Tables</h6>
                        </div><br>
                        <p id="tombol-tambah-cotainer" style="padding-right:20px;" align="right">
                            <a href="index.php?p=anggota-input" class="tombol">Tambah Anggota<br><br></a>
                            <a target="_blank" href="cetak.php"><img src="../print.png" height="50px" height="50px"></a>
                            <a target="_blank" href="ekspor_pdf.php"><img src="../pdf.png" height="50px" height="50px"></a>
                            <a target="_blank" href="ekspor_excel.php"><img src="../excel.png" height="50px" height="50px"></a>
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
                                    <th>ID Anggota</th>
                                    <th>Nama</th>
                                    <th>Foto</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
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
                                        $sql = "SELECT * FROM tbanggota WHERE nama LIKE '%$pencarian%'
                                        OR idanggota LIKE '%$pencarian%'
                                        OR jeniskelamin LIKE '%$pencarian%'
                                        OR alamat LIKE '%$pencarian%'";
                                        $query = $sql;
                                        $queryJml = $sql;
                                    } else{
                                        $query= "SELECT * FROM tbanggota LIMIT $posisi, $batas";
                                        $queryJml = "SELECT * FROM tbanggota";
                                        $no = $posisi * 1;
                                    }
                                }
                                else{
                                    $query = "SELECT *FROM tbanggota LIMIT $posisi, $batas";
                                    $queryJml = "SELECT *FROM tbanggota";
                                    $no = $posisi*1;
                                }
                                $q_tampil_anggota = mysqli_query($db, $query);
                                if(mysqli_num_rows($q_tampil_anggota)>0){
                                    while($r_tampil_anggota=mysqli_fetch_array($q_tampil_anggota)){
                                        if(empty($r_tampil_anggota['foto']) or ($r_tampil_anggota['foto']=='-')){
                                            $foto = "admin-no-photo.jpg";
                                        }
                                        else{
                                            $foto = $r_tampil_anggota['foto'];
                                        }
                                    ?>
                                    <tr>
                                        <td><?php echo $nomor;?></td>
                                        <td><?php echo $r_tampil_anggota['idanggota'];?></td>
                                        <td><?php echo $r_tampil_anggota['nama'];?></td>
                                        <td><img src="../images/<?php echo $foto;?>" width=70px height=70px></td>
                                        <td><?php echo $r_tampil_anggota['jeniskelamin'];?></td>
                                        <td><?php echo $r_tampil_anggota['alamat'];?></td>
                                        <td>
                                            <div class="btn btn-info"><a target="_blank" href="cetak_kartu.php?id=<?php echo $r_tampil_anggota['idanggota'];?>" class="tombol"><font color="white">Cetak kartu</font></a></div>
                                            <div class="btn btn-warning"><a href="index.php?p=anggota-edit&id=<?php echo $r_tampil_anggota['idanggota'];?>" class="tombol"><font color="white">Edit</font></a></div>
                                            <div class="btn btn-danger"><a href="proses/anggota-hapus.php?id=<?php echo $r_tampil_anggota['idanggota'];?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="tombol"><font color="white">Hapus</font></a></div>
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
                                <br><br><br>
                                <div>
                                    <?php
                                    $jml_hal = ceil($jml / $batas);
                                    echo "Pages : ";
                                    for($i=1; $i<=$jml_hal; $i++){
                                        if($i !=$hal){
                                            echo "<a href=\"?p=anggota&hal=$i\">$i </a>";
                                        }
                                        else{
                                            echo "<a class=\"active\">$i </a>";
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
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>