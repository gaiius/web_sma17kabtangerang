<?php

@$id = $_GET['id'];

$query_mapel = "SELECT * FROM ms_mapel WHERE is_active = '1'";

?>
<Center>
<form action="index.php?page=actionmapelkelas&actions=save" method="post">
<div id="style">
  <fieldset>
  <legend>&nbsp;Tambahkan Mata Pelajaran ke Kelas&nbsp;</legend>
  <input type="hidden" name="id_kelas" id="id_kelas" value="<?php echo $id; ?>"></td>
  <table border="0" align="Center">
    <tr>
      <td><label for="id_mapel">Nama Mapel</label></td>    
      <td>:</td>
      <td>
        <select name="id_mapel" id="id_mapel">
        <?php

        $result_mapel = mysql_query($query_mapel);
        $total_mapel = mysql_num_rows($result_mapel);

        if($total_mapel == "0" || $total_mapel == null) {
          echo "<option value = '0' selected>No result, Mapel is empty.</option>";
        } else {
          echo "<option value='0' selected>- Pilih Mapel -</option>";

          while($row_mapel = mysql_fetch_array($result_mapel)) {
            echo "<option value = '$row_mapel[id_mapel]'>$row_mapel[nama_mapel]</option>";
          }
        }

        ?>
        </select>
      </td>
      <td>&nbsp;</td>
      <td><label for="hari">Hari</label></td>
      <td>:</td>
      <td>
        <select name="hari" id="hari" required>
          <option value="">- Pilih Hari -</option>
          <option value="Senin">Senin</option>
          <option value="Selasa">Selasa</option>
          <option value="Rabu">Rabu</option>
          <option value="Kamis">Kamis</option>
          <option value="Jumat">Jumat</option>
        </select>
      </td>
    </tr>
    <tr>
      <td><label for="jam">Jam</label></td>
      <td>:</td>
      <td><textarea name="jam" id="jam" required></textarea></td>
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