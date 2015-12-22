<?php

$query_kelas = "SELECT * FROM ms_kelas WHERE is_active = '1'";
$query_nis = mysql_query("SELECT nis FROM ms_siswa ORDER BY id_siswa DESC");
$row_nis = mysql_fetch_object($query_nis);
$total = mysql_num_rows($query_nis);

?>
<Center>
<form action="index.php?page=actionsiswa&actions=save" method="post">
<div id="style">
    <fieldset>
    <legend>&nbsp;Tambah Siswa&nbsp;</legend>
    <table border="0" align="Center">
        <tr>
            <td><label for="nama_lengkap">Nama Lengkap</label></td>
            <td>:</td>
            <td><input type="text" name="nama_lengkap" id="nama_lengkap" required></td>
            <td>&nbsp;</td>
            <td><label for="jenis_kelamin">Jenis Kelamin</label></td>
            <td>:</td>
            <td>
                <select name="jenis_kelamin" id="jenis_kelamin" required>
                    <option value="" selected>- Pilih Jenis Kelamin -</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="tempat_tgl_lahir">Tempat Lahir</label></td>
            <td>:</td>
            <td><input type="text" name="tempat_lahir" id="tempat_tgl_lahir" required></td>
            <td>&nbsp;</td>
            <td><label> Tanggal Lahir</label></td>
            <td>:</td>
            <td><input type="date" name="tgl_lahir" id="tempat_tgl_lahir" placeholder="yyyy-mm-dd" required></td>
        </tr>
        <tr>
            <td><label for="agama">Agama</label></td>
            <td>:</td>
            <td>
                <select name="agama" id="agama" required>
                    <option value="" selected>- Pilih Agama -</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katholik">Katholik</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Hindu">Hindu</option>
                </select>
            </td>
            <td>&nbsp;</td>
            <td><label for="alamat">Alamat</label></td>
            <td>:</td>
            <td><textarea name="alamat" rows="3" id="alamat" required></textarea></td>
        </tr>
        <tr>
            <td><label for="no_telp">No. Telp.</label></td>
            <td>:</td>
            <td><input type="number" name="no_telp" min="0" id="no_telp" required></td>
            <td>&nbsp;</td>
            <td><label for="email">Email</label></td>
            <td>:</td>
            <td><input type="email" name="email" id="email"></td>
        </tr>
        <tr>
            <td><label for="sekolah_asal">Sekolah Asal</label></td>
            <td>:</td>
            <td><input type="text" name="sekolah_asal" id="sekolah_asal" required></td>
            <td>&nbsp;</td>
            <td><label for="id_kelas">Kelas</label></td>
            <td>:</td>
            <td>
                <select name="id_kelas" id="id_kelas" required>
                <?php

                $result_kelas = mysql_query($query_kelas);
                $total_kelas = mysql_num_rows($result_kelas);

                if($total_kelas == "0" || $total_kelas == null) {
                    echo "<option value='' selected>Tidak ada Data, Kelas kosong.</option>";
                } else {
                    echo "<option value='' selected>- Pilih Kelas -</option>";
                    while($row_kelas = mysql_fetch_array($result_kelas)) {
                        echo "<option value = '$row_kelas[id_kelas]'>$row_kelas[nama_kelas]</option>";
                    }
                }

                ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="nisn">NISN</label></td>
            <td>:</td>
            <td><input type="text" name="nisn" id="nisn" required></td>
            <td>&nbsp;</td>
            <td><label for="nis">NIS</label></td>
            <td>:</td>
            <?php if($total == null) { ?>
            <td><input type="text" name="nis" id="nis" value="141500001" readonly></td>
            <?php } else { ?>
            <td><input type="text" name="nis" id="nis" value="<?php echo ($row_nis->nis+1); ?>" readonly></td>
            <?php } ?>
        </tr>
        <tr>
            <td><label for="nama_ayah">Nama Ayah</label></td>
            <td>:</td>
            <td><input type="text" name="nama_ayah" id="nama_ayah" required></td>
            <td>&nbsp;</td>
            <td><label for="nama_ibu">Nama Ibu</label></td>
            <td>:</td>
            <td><input type="text" name="nama_ibu" id="nama_ibu" required></td>
        </tr>
        <tr>
            <td><label for="no_telp_ayah">No. Telp. Ayah</label></td>
            <td>:</td>
            <td><input type="number" name="no_telp_ayah" min="0" id="no_telp_ayah" required></td>
            <td>&nbsp;</td>
            <td><label for="no_telp_ibu">No. Telp. Ibu</label></td>
            <td>:</td>
            <td><input type="number" name="no_telp_ibu" min="0" id="no_telp_ibu" required></td>
        </tr>
        <tr>
            <td><label for="is_active">Status</label></td>
            <td>:</td>
            <td>
                <div class="radio">
                <label><input type="radio" name="is_active" id="is_active" value="1" checked>Aktif</label>
                <label><input type="radio" name="is_active" id="is_active" value="0">Tidak Aktif</label>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="7"><hr></td>
        </tr>
        <tr>
            <td><label for="username">Username</label></td>
            <td>:</td>
            <td><input type="text" name="username" id="username" required></td>
            <td>&nbsp;</td>
            <td><label for="password">Password</label></td>
            <td>:</td>
            <td><input type="password" name="password" id="password" required></td>
        </tr>
        <tr>
            <td colspan="7"><hr></td>
        </tr>
        <tr>
            <td align="Right" colspan="7"><input type="submit" name="button" value="Save"> &nbsp; <input type="reset" name="reset" value="Reset"></td>
        </tr>
    </table>
    </fieldset>
</div>
</form>
</Center>