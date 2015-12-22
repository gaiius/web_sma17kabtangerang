<?php

$query = mysql_query("SELECT a.id_kelas, a.nama, b.deskripsi AS jurusan_id, a.is_active, a.created_by, a.created_at, a.updated_by, a.updated_at FROM ms_kelas AS a INNER JOIN ms_jurusan AS b ON b.id_jurusan=a.jurusan_id ORDER BY a.id");
$query_jurusan = "SELECT * FROM ms_jurusan WHERE is_active = '1'";

$query_wali_kelas = "SELECT * FROM ms_guru WHERE is_active = '1'";
$result_wali_kelas = mysql_query($query_wali_kelas);
$total_wali_kelas = mysql_num_rows($result_wali_kelas);

?>
<Center>
<form action="index.php?page=actionkelas&actions=save" method="post">
<div id="style">
    <fieldset>
    <legend>&nbsp;Tambah Kelas&nbsp;</legend>
    <table border="0" align="Center">
        <tr>
            <td><label for="nama">Nama Kelas</label></td>
            <td>:</td>
            <td><input type="text" name="nama" id="nama" required></td>
            <td>&nbsp;</td>
            <td><label for="jurusan_id">Jurusan</label></td>
            <td>:</td>
            <td>
                <select name="jurusan_id" id="jurusan_id">
                <?php

                $result_jurusan = mysql_query($query_jurusan);
                $total_jurusan = mysql_num_rows($result_jurusan);

                if($total_jurusan == "0" || $total_jurusan == null) {
                    echo "<option value = '0' selected>Tidak ada Data, Jurusan kosong.</option>";
                } else {
                    echo "<option value='0' selected>- Pilih Jurusan -</option>";
                    while($row_jurusan = mysql_fetch_array($result_jurusan)) {
                        echo "<option value = '$row_jurusan[id_jurusan]'>$row_jurusan[nama_jurusan]</option>";
                    }
                }

                ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="wali_kelas_id">Wali Kelas</label></td>
            <td>:</td>
            <td>
                <select name="wali_kelas_id" id="wali_kelas_id">
                    <?php

                    if($total_wali_kelas == "0" || $total_wali_kelas == null) {
                        echo "<option value = '0' selected>Tidak ada Data, Wali Kelas kosong.</option>";
                    } else {
                        echo "<option value='0' selected>- Pilih Wali Kelas -</option>";
                        while($row_wali_kelas = mysql_fetch_array($result_wali_kelas)) {
                            echo "<option value = '$row_wali_kelas[id_guru]'>$row_wali_kelas[nama_guru]</option>";
                        }
                    }

                    ?>
                </select>
            </td>
            <td>&nbsp;</td>
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
            <td align="Right" colspan="7"><input type="submit" name="button" value="Save">&nbsp;<input type="reset" name="reset" value="Reset"></td>
        </tr>
    </table>
    </fieldset>
</div>
</form>
</Center>