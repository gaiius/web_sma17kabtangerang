<?php

$query_siswa = "SELECT * FROM ms_siswa WHERE is_active = '1'";
$query_mapel = "SELECT * FROM ms_mapel WHERE is_active = '1'";

?>
<Center>
<form action="index.php?page=actionnilai&actions=save" method="post">
<div id="style">
    <fieldset>
    <legend> &nbsp;Input Nilai Siswa&nbsp; </legend>
    <table border="0" align="Center">
        <tr>
            <td colspan="7"><hr></td>
        </tr>
        <tr>
            <td><label for="id_siswa">Siswa</label></td>
            <td>:</td>
            <td>
                <select name="id_siswa" id="id_siswa" required>
                <?php

                $result_siswa = mysql_query($query_siswa);
                $total_siswa = mysql_num_rows($result_siswa);

                if($total_siswa == "0" || $total_siswa == null) {
                    echo "<option value = '' selected>No result, siswa is empty.</option>";
                } else {
                    echo "<option value = '0' selected>- Pilih Siswa -</option>";
                    while($row_siswa = mysql_fetch_array($result_siswa)) {
                        echo "<option value = '$row_siswa[id_siswa]'>$row_siswa[nama_lengkap]</option>";
                    }
                }

                ?>
                </select>
            </td>
            <td>&nbsp;</td>
            <td><label for="id_mapel">Mata Pelajaran</label></td>
            <td>:</td>
            <td>
                <select name="id_mapel" id="id_mapel" required>
                <?php

                $result_mapel = mysql_query($query_mapel);
                $total_mapel = mysql_num_rows($result_mapel);

                if($total_mapel == "0" || $total_mapel == null) {
                    echo "<option value = '' selected>No result, mapel is empty.</option>";
                } else {
                    echo "<option value = '0' selected>- Pilih Mata Pelajaran -</option>";
                    while($row_mapel = mysql_fetch_array($result_mapel)) {
                        echo "<option value = '$row_mapel[id_mapel]'>$row_mapel[nama_mapel]</option>";
                    }
                }

                ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="7"><hr></td>
        </tr>
        <tr>
            <td><label for="nilai_tugas_1">Nilai Tugas 1</label></td>
            <td>:</td>
            <td><input type="text" name="nilai_tugas_1" id="nilai_tugas_1" required></td>
            <td>&nbsp;</td>
            <td><label for="nilai_tugas_2">Nilai Tugas 2</label></td>
            <td>:</td>
            <td><input type="text" name="nilai_tugas_2" id="nilai_tugas_2" required></td>
        </tr>
        <tr>
            <td><label for="nilai_tugas_3">Nilai Tugas 3</label></td>
            <td>:</td>
            <td><input type="text" name="nilai_tugas_3" id="nilai_tugas_3" required></td>
            <td>&nbsp;</td>
            <td><label for="nilai_tugas_4">Nilai Tugas 4</label></td>
            <td>:</td>
            <td><input type="text" name="nilai_tugas_4" id="nilai_tugas_4" required></td>
        </tr>
        <tr>
            <td><label for="nilai_tugas_5">Nilai Tugas 5</label></td>
            <td>:</td>
            <td><input type="text" name="nilai_tugas_5" id="nilai_tugas_5" required></td>
        </tr>
        <tr>
            <td><label for="nilai_ulangan_1">Nilai Ulangan 1</label></td>
            <td>:</td>
            <td><input type="text" name="nilai_ulangan_1" id="nilai_ulangan_1" required></td>
            <td>&nbsp;</td>
            <td><label for="nilai_ulangan_2">Nilai Ulangan 2</label></td>
            <td>:</td>
            <td><input type="text" name="nilai_ulangan_2" id="nilai_ulangan_2" required></td>
        </tr>
        <tr>
            <td><label for="nilai_ulangan_3">Nilai Ulangan 3</label></td>
            <td>:</td>
            <td><input type="text" name="nilai_ulangan_3" id="nilai_ulangan_3" required></td>
            <td>&nbsp;</td>
            <td><label for="nilai_ulangan_4">Nilai Ulangan 4</label></td>
            <td>:</td>
            <td><input type="text" name="nilai_ulangan_4" id="nilai_ulangan_4" required></td>
        </tr>
        <tr>
            <td><label for="nilai_ulangan_5">Nilai Ulangan 5</label></td>
            <td>:</td>
            <td><input type="text" name="nilai_ulangan_5" id="nilai_ulangan_5" required></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td><label for="nilai_uts">Nilai UTS</label></td>
            <td>:</td>
            <td><input type="text" name="nilai_uts" id="nilai_uts" required></td>
            <td>&nbsp;</td>
            <td><label for="nilai_uas">Nilai UAS</label></td>
            <td>:</td>
            <td><input type="text" name="nilai_uas" id="nilai_uas" required></td>
        </tr>
        <tr>
            <td align="Right" colspan="7"><input type="submit" name="button" value="Save">&nbsp;<input type="reset" name="reset" value="Reset"></td>
        </tr>
    </table>
    </fieldset>
</div>
</form>
</Center>