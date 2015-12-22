<Center>
<form action="index.php?page=actionjurusan&actions=save" method="post">
<div id="style">
  <fieldset>
  <legend>&nbsp;Tambah Jurusan&nbsp;</legend>
  <table border="0" align="Center">
    <tr>
      <td><label for="nama">Jurusan</label></td>
      <td>:</td>
      <td><input type="text" name="nama" id="nama" required></td>
      <td>&nbsp;</td>
      <td><label for="deskripsi">Deskripsi</label></td>
      <td>:</td>
      <td><textarea name="deskripsi" rows="3" id="deskripsi"></textarea></td>
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
      <td align="Right" colspan="7"><input type="submit" name="button" value="Save">&nbsp;<input type="reset" name="reset" value="Reset"></td>
    </tr>
  </table>
  </fieldset>
</div>
</form>
</Center>