<?php 

$paging_location = "masterkelas";
$total = mysql_num_rows(mysql_query("SELECT a.id_kelas, a.nama_kelas, b.nama_jurusan AS id_jurusan, a.is_active FROM ms_kelas AS a INNER JOIN ms_jurusan AS b ON b.id_jurusan = a.id_jurusan ORDER BY a.id_kelas"));

include("config/paging.php");

$query = mysql_query("SELECT a.id_kelas, a.nama_kelas, b.nama_jurusan AS id_jurusan, a.is_active FROM ms_kelas AS a INNER JOIN ms_jurusan AS b ON b.id_jurusan = a.id_jurusan LIMIT $offset, $rec_limit");
$total_data = mysql_num_rows($query);

?>
<?php if(@$_GET['msg'] == "savesuccess") { ?>
<h4 style="color: blue; text-align: center;">Kelas Berhasil Ditambahkan..</h4>
<?php } elseif(@$_GET['msg'] == "savefailed") { ?>
<h4 style="color: red; text-align: center;">Kelas Gagal Ditambahkan..</h4>
<?php } elseif(@$_GET['msg'] == "updatesuccess") { ?>
<h4 style="color: blue; text-align: center;">Kelas Berhasil Diubah..</h4>
<?php } elseif(@$_GET['msg'] == "updatefailed") { ?>
<h4 style="color: red; text-align: center;">Kelas Gagal Diubah..</h4>
<?php } elseif(@$_GET['msg'] == "deletesuccess") { ?>
<h4 style="color: blue; text-align: center;">Kelas Berhasil Dihapus..</h4>
<?php } elseif(@$_GET['msg'] == "deletefailed") { ?>
<h4 style="color: red; text-align: center;">Kelas Gagal Dihapus..</h4>
<?php } ?>
<h2 style="text-align: center;">Master Kelas</h2>
<table id="table-sism">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Kelas</th>
            <th>Jurusan</th>
            <th>Status</th>
            <th colspan="3"><center>Aksi</center></th>
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
            <td><?php echo $row['nama_kelas']; ?></td>
            <td><?php echo $row['id_jurusan']; ?></td>
            <td><?php if($row['is_active'] == "1") { ?>Aktif<?php } else { ?>Tidak Aktif<?php } ?></td>
            <td><a href="index.php?page=detailkelas&id=<?php echo $row['id_kelas']; ?>" title="Lihat Detail Data">DETAIL</a></td>
            <td><a href="index.php?page=ubahkelas&id=<?php echo $row['id_kelas']; ?>" title="Ubah Data">EDIT</a></td>
            <td><a href="index.php?page=actionkelas&actions=delete&id=<?php echo $row['id_kelas']; ?>" onclick="return confirm('Anda Yakin Ingin Menghapus?');" title="Hapus Data">DELETE</a></td>
        </tr>
    <?php } ?>
    <?php } ?>
    </tbody>
</table>
<br>
<?php include("config/paging-views.php"); ?>
<a href="?page=tambahkelas">Tambah Kelas</a>