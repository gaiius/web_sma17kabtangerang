<?php 

@$id = $_GET['id'];

$query = mysql_query("SELECT a.nama_lengkap, a.jenis_kelamin, a.tempat_lahir, a.tgl_lahir, a.agama, a.alamat, a.no_telp, a.email, a.sekolah_asal, a.nis, a.nisn, b.nama_kelas AS id_kelas, a.nama_ayah, a.no_telp_ayah, a.nama_ibu, a.no_telp_ibu, c.username AS id_user, a.is_active, a.created_by, a.created_at, a.updated_by, a.updated_at FROM ms_siswa AS a INNER JOIN ms_kelas AS b ON b.id_kelas = a.id_kelas INNER JOIN ms_user AS c ON c.id_user = a.id_user WHERE a.id_siswa = '$id'");
$row = mysql_fetch_array($query);

?>
<h2 style="text-align: center;">Detail Data Siswa "<?php echo $row['nama_lengkap']; ?>"</h2>
<table id="table-sism">
    <thead>
        <tr>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Jenis Kelamin</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $row['nis']; ?></td>
            <td><?php echo $row['nama_lengkap']; ?></td>
            <td><?php echo $row['jenis_kelamin']; ?></td>
            <td><?php if($row['is_active'] == "1") { ?>Aktif<?php } else { ?>Tidak Aktif<?php } ?></td>
        </tr>
    </tbody>
    <thead>
        <tr>
            <th>Tempat, Tanggal Lahir</th>
            <th>Agama</th>
            <th colspan="2">Alamat</th>
        </tr>
    </thead>
    <tbody>
            <td><?php echo $row['tempat_lahir']; ?>, <?php echo $row['tgl_lahir']; ?></td>
            <td><?php echo $row['agama']; ?></td>
            <td colspan="2"><?php echo $row['alamat']; ?></td>
    </tbody>
    <thead>
        <tr>
            <th>No. Telp</th>
            <th>Email</th>
            <th colspan="2">Sekolah Asal</th>
        </tr>
    </thead>
    <tbody>
            <td><?php echo $row['no_telp']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td colspan="2"><?php echo $row['sekolah_asal']; ?></td>
    </tbody>
    <thead>
        <tr>
            <th>NISN</th>
            <th>Username</th>
            <th colspan="2">Siswa berada di Kelas</th>
        </tr>
    </thead>
    <tbody>
            <td><?php echo $row['nisn']; ?></td>
            <td><?php echo $row['id_user']; ?></td>
            <td colspan="2"><?php echo $row['id_kelas']; ?></td>
    </tbody>
    <thead>
        <tr>
            <th>Nama Ayah</th>
            <th>No. Telp Ayah</th>
            <th>Nama Ibu</th>
            <th>No. Telp Ibu</th>
        </tr>
    </thead>
    <tbody>
            <td><?php echo $row['nama_ayah']; ?></td>
            <td><?php echo $row['no_telp_ayah']; ?></td>
            <td><?php echo $row['nama_ibu']; ?></td>
            <td><?php echo $row['no_telp_ibu']; ?></td>
    </tbody>
    <thead>
        <tr>
            <th>Dibuat Oleh</th>
            <th>Tanggal</th>
            <th>Diubah Oleh</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
            <td><?php echo $row['created_by']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td><?php echo $row['updated_by']; ?></td>
            <td><?php if($row['updated_at'] == "0000-00-00 00:00:00") { echo "-"; } else { echo $row['updated_at']; } ?></td>
    </tbody>
</table>
<br>
<a href="?page=mastersiswa" style="float: right;">Kembali</a>