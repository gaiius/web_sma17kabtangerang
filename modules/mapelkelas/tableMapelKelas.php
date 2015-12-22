<?php 

$paging_location = "settingmapelkelas";
$total = mysql_num_rows(mysql_query("SELECT a.id_kelas, a.nama_kelas, b.nama_jurusan AS id_jurusan, a.is_active, a.created_by, a.created_at, a.updated_by, a.updated_at FROM ms_kelas AS a INNER JOIN ms_jurusan AS b ON b.id_jurusan=a.id_jurusan ORDER BY a.id_kelas"));

include("config/paging.php");

$query = mysql_query("SELECT a.id_kelas, a.nama_kelas, b.nama_jurusan AS id_jurusan, a.is_active, a.created_by, a.created_at, a.updated_by, a.updated_at FROM ms_kelas AS a INNER JOIN ms_jurusan AS b ON b.id_jurusan=a.id_jurusan LIMIT $offset, $rec_limit");
$total_data = mysql_num_rows($query);

?>
<h2 style="text-align: center;">Setting Mata Pelajaran Kelas</h2>
<table id="table-sism">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Kelas</th>
            <th>Jurusan</th>
            <th>Status</th>
            <th>Dibuat Oleh</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php if($total_data == 0) { ?>
        <tr>
            <td colspan="7" align="center">Tidak ada Data.</td>
        </tr>
    <?php } else { ?>
    <?php while($row = mysql_fetch_array($query)) { ?>
        <?php if($counter%2 == 0) { ?><tr class="alt"><?php } else { ?><tr><?php } ?>
            <td><?php echo $counter++; ?></td>
            <td><?php echo $row['nama_kelas']; ?> </td>
            <td><?php echo $row['id_jurusan']; ?> </td>
            <td><?php if($row['is_active'] == "1") { ?>Aktif<?php } else { ?>Tidak Aktif<?php } ?></td>
            <td><?php echo $row['created_by']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td><a href="index.php?page=detailmapelkelas&id=<?php echo $row['id_kelas']; ?>" title="Ubah">DETAIL</a></td>
        </tr>
    <?php } ?>
    <?php } ?>
    </tbody>
</table>
<br>
<?php include("config/paging-views.php"); ?>