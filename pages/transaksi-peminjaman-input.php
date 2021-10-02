<?php
include 'proses/list-buku.php';
include 'proses/list-anggota.php';
?>

<div id="content" class="p-4 p-md-5 pt-5">
    <div id="label-page"><h3><b>Input Transaksi Peminjaman</h3></div>
    <div id="content">
        <form action="proses/transaksi-peminjaman-input-proses.php" method="post" enctype="multipart/form-data">
            <table class="table table-borderless">
				<tr>
                    <td class="label-formulir">ID Transaksi</td>
                    <td class="isian-formulir"><input type="text" name="idpeminjaman" class="isian-formulir isian-formulir-border"></td>
                </tr>
                <tr>
                    <td class="label-formulir">Anggota</td>
                    <td class="isian-formulir">
                        <select name="id_anggota">
                            <?php foreach ($data_anggota as $anggota): ?>
                                <option value="<?php echo $anggota['idanggota'] ?>"><?php echo $anggota['nama'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="label-formulir">Buku</td>
                    <td class="isian-formulir">
                        <select name="id_buku">
                            <?php foreach ($data_buku as $buku): ?>
                                <option value="<?php echo $buku['idbuku'] ?>"><?php echo $buku['judul'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="label-formulir">Tanggal Pinjam</td>
                    <td class="isian-formulir"><input type="date" name="tanggalpinjam" class="isian-formulir isian-formulir-border"></td>
                </tr>
                <tr>
                    <td class="label-formulir">Tanggal Kembali</td>
                    <td class="isian-formulir"><input type="date" name="tanggalkembali" class="isian-formulir isian-formulir-border"></td>
                </tr>
				<tr>
                    <td class="label-formulir">Status</td>
                    <td class="isian-formulir"><input type="text" name="status" class="isian-formulir isian-formulir-border"></td>
                </tr>
                <tr>
                    <td class="label-formulir"></td>
                    <td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" class="btn btn-info"></td>
                </tr>
            </table>
        </form>
    </div>
</div>