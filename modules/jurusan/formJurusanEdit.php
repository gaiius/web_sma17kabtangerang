<?php 

@$id = $_GET['id'];

$query = mysql_query("select * from ms_jurusan where id_jurusan = '$id'");

while($row = mysql_fetch_array($query)) {

?>
<Center>
<form action="index.php?page=actionjurusan&actions=update&id=<?php echo $row['id_jurusan']; ?>" method="post">
<div id="style">
  <fieldset>
  <legend>&nbsp;Ubah Data Jurusan "<?php echo $row['nama_jurusan']; ?>"&nbsp;</legend>
  <table border="0" align="Center">
    <tr>
      <td><label for="nama">Jurusan</label></td>
      <td>:</td>
      <td><input type="text" name="nama" id="nama" value="<?php echo $row['nama_jurusan']; ?>" required></td>
      <td>&nbsp;</td>
      <td><label for="deskripsi">Deskripsi</label></td>
      <td>:</td>
      <td><textarea name="deskripsi" rows="3" id="deskripsi"><?php echo $row['deskripsi']; ?></textarea></td>
    </tr>
    <tr>
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