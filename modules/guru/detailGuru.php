<?php 

@$id = $_GET['id'];

$query = mysql_query("SELECT a.nama_guru, a.jenis_kelamin, a.tempat_lahir, a.tgl_lahir, a.agama, a.alamat, a.no_telp, a.email, a.status_guru, b.nama_mapel AS id_mapel, c.username AS id_user, a.is_active, a.created_by, a.created_at, a.updated_by, a.updated_at FROM ms_guru AS a INNER JOIN ms_mapel AS b ON b.id_mapel = a.id_mapel INNER JOIN ms_user AS c ON c.id_user = a.id_user WHERE a.id_guru = '$id'");
$row = mysql_fetch_array($query);

?>
<h2 style="text-align: center;">Detail Data Guru "<?php echo $row['nama_guru']; ?>"</h2>
<table id="table-sism">
    <thead>
        <tr>
            <th>Nama Guru</th>
            <th>Jenis Kelamin</th>
            <th>Username</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $row['nama_guru']; ?></td>
            <td><?php echo $row['jenis_kelamin']; ?></td>
            <td><?php echo $row['id_user']; ?></td>
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
            <th>Status Guru</th>
            <th>Guru Mata Pelajaran</th>
        </tr>
    </thead>
    <tbody>
            <td><?php echo $row['no_telp']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php if($row['status_guru'] == "1") { ?>Guru Tetap<?php } else { ?>Guru Kontrak<?php } ?></td>
            <td><?php echo $row['id_mapel']; ?></td>
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
<a href="?page=masterguru" style="float: right;">Kembali</a>