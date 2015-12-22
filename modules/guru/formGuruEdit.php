<?php 

@$id_guru = $_GET['idguru'];

$query = mysql_query("SELECT a.id_guru, a.nama_guru, a.jenis_kelamin, a.tempat_lahir, a.tgl_lahir, a.agama, a.alamat, a.no_telp, a.email, a.status_guru, b.id_mapel AS id_mapel, b.nama_mapel AS nama_mapel, a.id_user AS id_user, a.is_active, d.username AS username, d.password AS password FROM ms_guru AS a INNER JOIN ms_mapel AS b ON b.id_mapel = a.id_mapel INNER JOIN ms_user AS d ON d.id_user = a.id_user where id_guru = '$id_guru'");

while($row = mysql_fetch_array($query)) {

?>
<Center>
<form action = "index.php?page=actionguru&actions=update&idguru=<?php echo $row['id_guru']; ?>&iduser=<?php echo $row['id_user']; ?>" method = "post" role="form">
<div id="style">
  <fieldset>
  <legend>&nbsp;Ubah Data Guru "<?php echo $row['nama_guru']; ?>"&nbsp;</legend>
  <table border="0" align="Center">
    <tr>
      <td><label for="nama">Nama Guru</label></td>
      <td> : </td>
      <td><input type="text" name="nama" class="form-control" id="nama" value="<?php echo $row['nama_guru']; ?>" required></td>
      <td>&nbsp;</td>
      <td><label for="jenis_kelamin">Jenis Kelamin</label></td>
      <td> : </td>
      <td>
        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
        <?php if ($row[jenis_kelamin] == 'Laki-laki') { ?>
        <option value="Laki-laki" selected>Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
        <?php } else { ?>
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan" selected>Perempuan</option>
        <?php } ?>
        </select>
      </td>
    </tr>
    <tr>
      <td><label for="tempat_tgl_lahir">Tempat Lahir</label></td>
      <td>:</td>
      <td><input type="text" name="tempat_lahir" class="form-control" id="tempat_tgl_lahir" value="<?php echo $row['tempat_lahir']; ?>" required></td>
       <td>&nbsp;</td>
      <td><label> Tanggal Lahir</label></td>
      <td>:</td>
      <td><input type="date" name="tgl_lahir" class="form-control" id="tempat_tgl_lahir" value="<?php echo $row['tgl_lahir']; ?>" required></td>
    </tr>
    <tr>
      <td><label for="agama">Agama</label></td>
      <td>:</td>
      <td>
      <select name="agama" id="agama" required>
        <option value="<?php echo $row['agama']; ?>" selected><?php echo $row['agama']; ?></option>
        <?php if ($row[agama] == 'Islam') { ?>
        <option value='Kristen'>Kristen</option>
        <option value='Katolik'>Katolik</option>
        <option value='Hindu'>Hindu</option>
        <option value='Buddha'>Buddha</option>
        <?php } elseif ($row[agama] == 'Kristen') { ?>
        <option value='Islam'>Islam</option>
        <option value='Katolik'>Katolik</option>
        <option value='Hindu'>Hindu</option>
        <option value='Buddha'>Buddha</option>
        <?php } elseif ($row[agama] == 'Katolik') { ?>
        <option value='Islam'>Islam</option>
        <option value='Kristen'>Kristen</option>
        <option value='Hindu'>Hindu</option>
        <option value='Buddha'>Buddha</option>
        <?php } elseif ($row[agama]=='Hindu') { ?>
        <option value='Islam'>Islam</option>
        <option value='Kristen'>Kristen</option>
        <option value='Katolik'>Katolik</option>
        <option value='Buddha'>Buddha</option>
        <?php }elseif ($row[agama] == 'Buddha') { ?>
        <option value='Islam'>Islam</option>
        <option value='Kristen'>Kristen</option>
        <option value='Katolik'>Katolik</option>
        <option value='Hindu'>Hindu</option>
        <?php } ?>
      </select>
    </td>
      <td>&nbsp;</td>
      <td><label for="alamat">Alamat</label></td>
      <td>:</td>
      <td><textarea class="form-control" name="alamat" rows="3" id="alamat" required><?php echo $row['alamat']; ?></textarea></td>
    </tr>
    <tr>
      <td><label for="no_telp">No. Telp.</label></td>
      <td>:</td>
      <td><input type="number" name="no_telp" min="0" class="form-control" id="no_telp" value="<?php echo $row['no_telp']; ?>" required></td>
      <td>&nbsp;</td>
      <td><label for="email">Email</label></td>
      <td>:</td>
      <td><input type="email" name="email" class="form-control" id="email" value="<?php echo $row['email']; ?>"></td>
    </tr>
    <tr>
      <td><label for="status_guru">Status Guru</label></td>
      <td>:</td>
      <td>
        <select name="status_guru" id="status_guru" required>
        <?php if($row['status_guru'] == 1) { ?>
          <option value="1">Guru Tetap</option>
        <?php } else { ?>
          <option value="0">Guru Kontrak</option>
        <?php } ?>
        </select>
      </td>
      <td>&nbsp;</td>
      <td><label for="mapel_id">Mata Pelajaran</label></td>
      <td>:</td>
      <td>
      <select name="mapel_id" id="mapel_id">
      <?php

      $query_mapel = "SELECT * FROM ms_mapel WHERE is_active = '1' AND id_mapel != '$row[id_mapel]'";
      $result_mapel = mysql_query($query_mapel);
      $total_mapel = mysql_num_rows($result_mapel);

      if($total_mapel == "0" || $total_mapel == null) {
        echo "<option value = '$row[id_mapel]' selected>$row[nama_mapel]</option>";
      } else {
        echo "<option value = '$row[id_mapel]' selected>$row[nama_mapel]</option>";

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
      <td colspan="7"><hr></td>
    </tr>
    <tr>
      <td><label for="username">Username</label></td>
      <td>:</td>
      <td><input type="text" name="username" id="username" value="<?php echo $row['username']; ?>" readonly></td>
      <td>&nbsp;</td>
      <td><label for="password">Password</label></td>
      <td>:</td>
      <td><input type="password" name="password" id="password" value="<?php echo $row['password']; ?>" required></td>
    </tr>
    <tr>
      <td colspan="7"><hr></td>
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