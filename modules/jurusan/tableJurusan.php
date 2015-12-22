<?php 

$paging_location = "masterjurusan";
$total = mysql_num_rows(mysql_query("SELECT * FROM ms_jurusan ORDER BY id_jurusan"));

include("config/paging.php");

$query = mysql_query("SELECT * FROM ms_jurusan LIMIT $offset, $rec_limit");
$total_data = mysql_num_rows($query);

?>
<?php if(@$_GET['msg'] == "savesuccess") { ?>
<h4 style="color: blue; text-align: center;">Jurusan Berhasil Ditambahkan..</h4>
<?php } elseif(@$_GET['msg'] == "savefailed") { ?>
<h4 style="color: red; text-align: center;">Jurusan Gagal Ditambahkan..</h4>
<?php } elseif(@$_GET['msg'] == "updatesuccess") { ?>
<h4 style="color: blue; text-align: center;">Jurusan Berhasil Diubah..</h4>
<?php } elseif(@$_GET['msg'] == "updatefailed") { ?>
<h4 style="color: red; text-align: center;">Jurusan Gagal Diubah..</h4>
<?php } elseif(@$_GET['msg'] == "deletesuccess") { ?>
<h4 style="color: blue; text-align: center;">Jurusan Berhasil Dihapus..</h4>
<?php } elseif(@$_GET['msg'] == "deletefailed") { ?>
<h4 style="color: red; text-align: center;">Jurusan Gagal Dihapus..</h4>
<?php } ?>
<h2 style="text-align: center;">Master Jurusan</h2>
<table id="table-sism">
    <thead>
        <tr>
            <th>#</th>
            <th>Jurusan</th>
            <th>Deskripsi</th>
            <th>Status</th>
            <th colspan="3"><center>Aksi</center></th>
        </tr>
    </thead>
    <tbody>
    <?php if($total == 0) { ?>
        <tr>
            <td colspan="7" align="center">Tidak ada Data.</td>
        </tr>
    <?php } else { ?>
    <?php while($row = mysql_fetch_array($query)) { ?>
        <?php if($counter%2 == 0) { ?><tr class="alt"><?php } else { ?><tr><?php } ?>
            <td><?php echo $counter++; ?></td>
            <td><?php echo $row['nama_jurusan']; ?></td>
            <td><?php echo $row['deskripsi']; ?></td>
            <td><?php if($row['is_active'] == "1") { ?>Aktif<?php } else { ?>Tidak Aktif<?php } ?></td>
            <td><a href="index.php?page=detailjurusan&id=<?php echo $row['id_jurusan']; ?>" title="Lihat Detail Data">DETAIL</a></td>
            <td><a href="index.php?page=ubahjurusan&id=<?php echo $row['id_jurusan']; ?>" title="Ubah Data">EDIT</a></td>
            <td><a href="index.php?page=actionjurusan&actions=delete&id=<?php echo $row['id_jurusan']; ?>" onclick="return confirm('Anda Yakin Ingin Menghapus?');" title="Hapus Data">DELETE</a></td>
        </tr>
    <?php } ?>
    <?php } ?>
    </tbody>
</table>
<br>
<?php include("config/paging-views.php"); ?>
<a href="?page=tambahjurusan">Tambah Jurusan</a>