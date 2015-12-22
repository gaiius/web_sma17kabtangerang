<?php 

@$id = $_GET['id'];

$query = mysql_query("SELECT a.id_kelas, a.nama_kelas, b.nama_jurusan AS id_jurusan, c.nama_guru AS id_guru, a.is_active, a.created_by, a.created_at, a.updated_by, a.updated_at FROM ms_kelas AS a INNER JOIN ms_jurusan AS b ON b.id_jurusan = a.id_jurusan INNER JOIN ms_guru AS c ON c.id_guru = a.id_guru WHERE a.id_kelas = '$id'");
$row = mysql_fetch_array($query);

?>
<h2 style="text-align: center;">Detail Data Kelas "<?php echo $row['nama_kelas']; ?>"</h2>
<table id="table-sism">
    <thead>
        <tr>
            <th>Nama Kelas</th>
            <th>Wali Kelas</th>
            <th>Jurusan</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $row['nama_kelas']; ?></td>
            <td><?php echo $row['id_guru']; ?></td>
            <td><?php echo $row['id_jurusan']; ?></td>
            <td><?php if($row['is_active'] == "1") { ?>Aktif<?php } else { ?>Tidak Aktif<?php } ?></td>
        </tr>
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
<a href="?page=masterkelas" style="float: right;">Kembali</a>