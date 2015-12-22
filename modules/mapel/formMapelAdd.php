<Center>
<form action="index.php?page=actionmapel&actions=save" method="post">
<div id="style">
  <fieldset>
  <legend>&nbsp;Tambah Mata Pelajaran&nbsp;</legend>
  <table border="0" align="Center">
    <tr>
      <td><label for="nama_mapel">Nama Mapel</label></td>    
      <td>:</td>
      <td><input type="text" name="nama_mapel" id="nama_mapel" required></td>
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