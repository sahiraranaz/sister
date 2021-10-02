<?php 
    $id_buku = $_GET['id'];
    $q_tampil_buku = mysqli_query($db, "SELECT * FROM tbbuku WHERE idbuku = '$id_buku'");
    $r_tampil_buku = mysqli_fetch_array($q_tampil_buku);

    if (empty($r_tampil_buku['foto']) or ($r_tampil_buku['foto'] == '-')) {
        $foto = "buku_kosong.png";
    } else {
        $foto = $r_tampil_buku['foto'];
    }
?>

<div id="content" class="p-4 p-md-5 pt-5">
    <div id="label-page"><h3><b>Buku Edit</h3></div>
    <div id="content">
    <div id="content" style="padding-left:20px;padding-bottom:20px;">
	<form action="proses/buku-edit-proses.php" method="post" enctype="multipart/form-data">
	<table id="tabel-input">
		<tr>
			<td class="label-formulir">Foto</td>
                <td class="isian-formulir">
                    <img src="images/<?php echo $foto; ?>" width="70px" height="75px">
                    <input type="file" name="foto" class="isian-formulir isian-formulir-border">
                    <input type="hidden" name="foto_awal" value="<?php echo $r_tampil_buku['foto'];?>">
                </td>                    
        </tr>
		<tr>
			<td class="label-formulir">ID Buku</td>
			<td class="isian-formulir"><input type="text" name="id_buku" size="50" value="<?php echo $r_tampil_buku['idbuku']; ?>" readonly="readonly" class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
		</tr>
		<tr>
			<td class="label-formulir">Judul Buku</td>
			<td class="isian-formulir"><input type="text" name="judul" size="50" value="<?php echo $r_tampil_buku['judul']; ?>" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">Status</td>
			<td class="isian-formulir"><input type="text" name="status" size="50" value="<?php echo $r_tampil_buku['status']; ?>" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">Pengarang</td>
			<td class="isian-formulir"><input type="text" name="pengarang" size="50" value="<?php echo $r_tampil_buku['pengarang']; ?>" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">Penerbit</td>
			<td class="isian-formulir"><input type="text" name="penerbit" size="50" value="<?php echo $r_tampil_buku['penerbit']; ?>" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir"></td>
			<td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" class="btn btn-info"></td>
		</tr>
	</table>
	</form>
</div></div></div>