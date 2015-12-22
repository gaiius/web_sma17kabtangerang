<?php 

@$id = $_GET['id'];

$query = mysql_query("SELECT * FROM ms_mapel WHERE id_mapel = '$id'");

while($row = mysql_fetch_array($query)) { 

?>
<Center>
<form action="index.php?page=actionmapel&actions=update&id=<?php echo $row['id_mapel']; ?>" method="post">
<div id="style">
  <fieldset>
  <legend>&nbsp;Ubah Data Mata Pelajaran "<?php echo $row['nama_mapel']; ?>"&nbsp;</legend>
  <table border="0" align="Center">
    <tr>
      <td><label for="nama_mapel">Nama Mapel</label></td>    
      <td>:</td>
      <td><input type="text" name="nama_mapel" id="nama_mapel" value="<?php echo $row['nama_mapel']; ?>" required></td>    
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