<?php 

@$id = $_GET['id'];

$query = mysql_query("SELECT a.id_kelas, a.nama_kelas, b.id_jurusan, b.nama_jurusan AS nama_jurusan, a.id_guru, c.nama_guru AS nama_guru, a.is_active, a.created_by, a.created_at, a.updated_by, a.updated_at FROM ms_kelas AS a INNER JOIN ms_jurusan AS b ON b.id_jurusan=a.id_jurusan INNER JOIN ms_guru AS c ON c.id_guru=a.id_guru WHERE a.id_kelas = '$id'");

while($row = mysql_fetch_array($query)) {
    
?>
<Center>
<form action="index.php?page=actionkelas&actions=update&id=<?php echo $row['id_kelas']; ?>" method="post">
<div id="style">
    <fieldset>
    <legend>&nbsp;Ubah Data Kelas "<?php echo $row['nama_kelas']; ?>"&nbsp;</legend>
    <table border="0" align="Center">
        <tr>
            <td><label for="nama">Nama Kelas</label></td>
            <td>:</td>
            <td><input type="text" name="nama" id="nama" value="<?php echo $row['nama_kelas']; ?>" required></td>
            <td>&nbsp;</td>
            <td><label for="jurusan_id">Jurusan</label></td>
            <td>:</td>
            <td>
                <select name="jurusan_id" id="jurusan_id">
                <?php

                $query_jurusan = "SELECT * FROM ms_jurusan WHERE id_jurusan != '$row[id_jurusan]'";
                $result_jurusan = mysql_query($query_jurusan);
                $total_jurusan = mysql_num_rows($result_jurusan);

                if($total_jurusan == "0" || $total_jurusan == null) {
                    while($row_jurusan = mysql_fetch_array($result_jurusan)) {
                        echo "<option value='$row[id_jurusan]' selected>$row[nama_jurusan]</option>";
                        echo "<option value = '$row_jurusan[id_jurusan]'>$row_jurusan[nama_jurusan]</option>";
                    }
                } else {
                    echo "<option value='$row[id_jurusan]' selected>$row[nama_jurusan]</option>";

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

                $query_wali_kelas = "SELECT * FROM ms_guru WHERE id_guru != '$row[id_guru]'";
                $result_wali_kelas = mysql_query($query_wali_kelas);
                $total_wali_kelas = mysql_num_rows($result_wali_kelas);

                if($total_wali_kelas == "0" || $total_wali_kelas == null) {
                    echo "<option value='$row[id_guru]' selected>$row[nama_guru]</option>";
                } else {
                    echo "<option value='$row[id_guru]' selected>$row[nama_guru]</option>";

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
                <?php if($row['is_active'] == 1) { ?>
                    <label><input type="radio" name="is_active" id="is_active" value="1" checked>Aktif</label>
                    <label><input type="radio" name="is_active" id="is_active" value="0">Tidak Aktif</label>
                <?php } else { ?>
                    <label><input type="radio" name="is_active" id="is_active" value="1">Aktif</label>
                    <label><input type="radio" name="is_active" id="is_active" value="0" checked>Tidak Aktif</label>
                <?php } ?>
                </div>
            </td>
        </tr>
        <tr>
            <td align="Right" colspan="7"><input type="submit" name="button" value="Update">&nbsp;<input type="reset" name="reset" value="Reset"></td>   
        </tr>
    </table>
    </fieldset>
</div>
</form>
</Center>
<?php } ?>