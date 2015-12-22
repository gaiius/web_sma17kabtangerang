<?php 

@$id_siswa = $_GET['idsiswa'];

$query = mysql_query("SELECT a.id_siswa, a.nama_lengkap, a.jenis_kelamin, a.tempat_lahir, a.tgl_lahir, a.agama, a.alamat, a.no_telp, a.email, a.sekolah_asal, a.nisn, a.nis, c.nama_kelas AS nama_kelas, c.id_kelas AS id_kelas, c.nama_kelas AS nama_kelas, a.nama_ayah, a.nama_ibu, a.no_telp_ayah, a.no_telp_ibu, a.id_user AS id_user, d.username AS username, a.is_active, a.created_by, a.created_at, a.updated_by, a.updated_at FROM ms_siswa AS a INNER JOIN ms_kelas AS c ON c.id_kelas=a.id_kelas INNER JOIN ms_user AS d ON d.id_user=a.id_user WHERE a.id_siswa = '$id_siswa'");
while($row = mysql_fetch_array($query)) {

?>
<Center>
<form action = "index.php?page=actionsiswa&actions=update&idsiswa=<?php echo $row['id_siswa']; ?>&iduser=<?php echo $row['id_user']; ?>" method = "post" role="form">
<div id="style">
  <fieldset>
  <legend>&nbsp;Ubah Data Siswa "<?php echo $row['nama_lengkap']; ?>"&nbsp;</legend>
  <table border="0" align="Center">
    <tr>
      <td><label for="nama_lengkap">Nama Lengkap</label></td>
      <td>:</td>
      <td><input type="text" name="nama_lengkap" id="nama_lengkap" value="<?php echo $row['nama_lengkap']; ?>" required></td>
      <td>&nbsp;</td>
      <td><label for="jenis_kelamin">Jenis Kelamin</label></td>
      <td>:</td>
      <td>
        <select name="jenis_kelamin" id="jenis_kelamin" required>
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
      <td><input type="text" name="tempat_lahir" id="tempat_tgl_lahir" value="<?php echo $row['tempat_lahir']; ?>" required></td>
      <td>&nbsp;</td>
      <td><label> Tanggal Lahir</label></td>
      <td>:</td>
      <td><input type="date" name="tgl_lahir" id="tempat_tgl_lahir" value="<?php echo $row['tgl_lahir']; ?>" required></td>
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
          <?php } elseif ($row[agama] == 'Hindu') { ?>
          <option value='Islam'>Islam</option>
          <option value='Kristen'>Kristen</option>
          <option value='Katolik'>Katolik</option>
          <option value='Buddha'>Buddha</option>
          <?php } elseif ($row[agama] == 'Buddha') { ?>
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
      <td><textarea name="alamat" rows="3" id="alamat" required><?php echo $row['alamat']; ?></textarea></td>
    </tr>
    <tr>
      <td><label for="no_telp">No. Telp.</label></td>
      <td>:</td>
      <td><input type="number" name="no_telp" min="0" id="no_telp" value="<?php echo $row['no_telp']; ?>"></td>
      <td>&nbsp;</td>
      <td><label for="email">Email</label></td>
      <td>:</td>
      <td><input type="email" name="email" id="email" value="<?php echo $row['email']; ?>"></td>
    </tr>
    <tr>
      <td><label for="sekolah_asal">Sekolah Asal</label></td>
      <td>:</td>
      <td><input type="text" name="sekolah_asal" id="sekolah_asal" value="<?php echo $row['sekolah_asal']; ?>"></td>
      <td>&nbsp;</td>
      <td><label for="id_kelas">Kelas</label></td>
      <td>:</td>
      <td>
        <select name="id_kelas" id="id_kelas" required>
        <?php

        $query_kelas = "SELECT * FROM ms_kelas WHERE id_kelas != '$row[id_kelas]'";
        $result_kelas = mysql_query($query_kelas);
        $total_kelas = mysql_num_rows($result_kelas);

        if($total_kelas == "0" || $total_kelas == null) {
          while($row_kelas = mysql_fetch_array($result_kelas)) {
            echo "<option value='$row[id_kelas]' selected>$row[nama_kelas]</option>";
            echo "<option value = '$row_kelas[id_kelas]'>$row_kelas[nama_kelas]</option>";
          }
        } else {
          echo "<option value='$row[id_kelas]' selected>$row[nama_kelas]</option>";

          while($row_kelas = mysql_fetch_array($result_kelas)) {
            echo "<option value = '$row_kelas[id_kelas]'>$row_kelas[nama_kelas]</option>";
          }
        }

        ?>
        </select>
      </td>
    </tr>
    <tr>
      <td><label for="nisn">NISN</label></td>
      <td>:</td>
      <td><input type="text" name="nisn" id="nisn" value="<?php echo $row['nisn']; ?>"required></td>
      <td>&nbsp;</td>
      <td><label for="nis">NIS</label></td>
      <td>:</td>
      <td><input type="text" name="nis" id="nis" value="<?php echo $row['nis']; ?>" readonly></td>
    </tr>
    <tr>
      <td><label for="nama_ayah">Nama Ayah</label></td>
      <td>:</td>
      <td><input type="text" name="nama_ayah" id="nama_ayah" value="<?php echo $row['nama_ayah']; ?>" required></td>
      <td>&nbsp;</td>
      <td><label for="nama_ibu">Nama Ibu</label></td>
      <td>:</td>
      <td><input type="text" name="nama_ibu" id="nama_ibu" value="<?php echo $row['nama_ibu']; ?>" required></td>
    </tr>
    <tr>
      <td><label for="no_telp_ayah">No. Telp. Ayah</label></td>
      <td>:</td>
      <td><input type="number" name="no_telp_ayah" min="0" id="no_telp_ayah" value="<?php echo $row['no_telp_ayah']; ?>" required></td>
      <td>&nbsp;</td>
      <td><label for="no_telp_ibu">No. Telp. Ibu</label></td>
      <td>:</td>
      <td><input type="number" name="no_telp_ibu" min="0" id="no_telp_ibu" value="<?php echo $row['no_telp_ibu']; ?>" required></td>
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
      <td align="Right" colspan="7"><input type="submit" name="button" value="Update"> &nbsp; <input type="reset" name="reset" value="Reset"></td>
    </tr>
  </table>
  </fieldset>
</div>
</form>
</Center>
<?php } ?>