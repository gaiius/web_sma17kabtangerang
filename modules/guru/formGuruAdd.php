<?php

$query = mysql_query("select * from ms_guru order by id_guru");
$query_mapel = "SELECT * FROM ms_mapel WHERE is_active = '1'";

?>
<Center>
<form action = "index.php?page=actionguru&actions=save" method = "post" role="form">
<div id="style">
  <fieldset>
  <legend>&nbsp;Tambah Guru&nbsp;</legend>
  <table border="0" align="Center">
    <tr>
      <td><label for="nama">Nama Guru</label></td>
      <td>:</td>
      <td><input type="text" name="nama" id="nama" required></td>
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
      <td><label for="status_guru">Status Guru</label></td>
      <td>:</td>
      <td>
      <select name="status_guru" id="status_guru" required>
        <option value="" selected>- Pilih Status Guru -</option>
        <option value="1">Guru Tetap</option>
        <option value="0">Guru Kontrak</option>
      </select>
    </td>
      <td>&nbsp;</td>
      <td><label for="mapel_id">Mata Pelajaran</label></td>
      <td>:</td>
      <td>
      <select name="mapel_id" id="mapel_id">
      <?php

      $result_mapel = mysql_query($query_mapel);
      $total_mapel = mysql_num_rows($result_mapel);

      if($total_mapel == "0" || $total_mapel == null) {
        echo "<option value = '0' selected>Tidak ada Data, Mata Pelajaran kosong.</option>";
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
      <td align="Right" colspan="7"><input type="submit" name="button" value="Save">&nbsp;<input type="reset" name="reset" value="Reset"></td>
    </tr>
  </table>
  </fieldset>
</div>
</form>
</Center>