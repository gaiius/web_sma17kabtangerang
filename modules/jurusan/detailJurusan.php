<?php 

@$id = $_GET['id'];

$query = mysql_query("SELECT * FROM ms_jurusan WHERE id_jurusan = '$id'");
$row = mysql_fetch_array($query);

?>
<h2 style="text-align: center;">Detail Data Jurusan "<?php echo $row['nama_jurusan']; ?>"</h2>
<table id="table-sism">
    <thead>
        <tr>
            <th>Jurusan</th>
            <th colspan="2">Deskripsi</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $row['nama_jurusan']; ?></td>
            <td colspan="2"><?php echo $row['deskripsi']; ?></td>
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
<a href="?page=masterjurusan" style="float: right;">Kembali</a>