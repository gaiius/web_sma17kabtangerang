<?php 

@$id = $_GET['id'];

$query = mysql_query("SELECT * FROM ms_mapel WHERE id_mapel = '$id'");
$row = mysql_fetch_array($query);

?>
<h2 style="text-align: center;">Detail Data Mata Pelajaran "<?php echo $row['nama_mapel']; ?>"</h2>
<table id="table-sism">
    <thead>
        <tr>
            <th colspan="2">Nama Mata Pelajaran</th>
            <th colspan="2">Status</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="2"><?php echo $row['nama_mapel']; ?></td>
            <td colspan="2"><?php if($row['is_active'] == "1") { ?>Aktif<?php } else { ?>Tidak Aktif<?php } ?></td>
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
<a href="?page=mastermapel" style="float: right;">Kembali</a>