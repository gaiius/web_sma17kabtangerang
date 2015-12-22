<?php 

$paging_location = "mastermapel";
$total = mysql_num_rows(mysql_query("SELECT * FROM ms_mapel ORDER BY id_mapel"));

include("config/paging.php");

$query = mysql_query("SELECT * FROM ms_mapel LIMIT $offset, $rec_limit");
$total_data = mysql_num_rows($query);

?>
<?php if(@$_GET['msg'] == "savesuccess") { ?>
<h4 style="color: blue; text-align: center;">Mata Pelajaran Berhasil Ditambahkan..</h4>
<?php } elseif(@$_GET['msg'] == "savefailed") { ?>
<h4 style="color: red;text-align: center;">Mata Pelajaran Gagal Ditambahkan..</h4>
<?php } elseif(@$_GET['msg'] == "updatesuccess") { ?>
<h4 style="color: blue; text-align: center;">Mata Pelajaran Berhasil Diubah..</h4>
<?php } elseif(@$_GET['msg'] == "updatefailed") { ?>
<h4 style="color: red;text-align: center;">Mata Pelajaran Gagal Diubah..</h4>
<?php } elseif(@$_GET['msg'] == "deletesuccess") { ?>
<h4 style="color: blue; text-align: center;">Mata Pelajaran Berhasil Dihapus..</h4>
<?php } elseif(@$_GET['msg'] == "deletefailed") { ?>
<h4 style="color: red; text-align: center;">Mata Pelajaran Gagal Dihapus..</h4>
<?php } ?>
<h2 style="text-align: center;">Master Mata Pelajaran</h2>
<table id="table-sism">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Mata Pelajaran</th>
            <th>Status</th>
            <th colspan="3">Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php if($total_data == 0) { ?>
        <tr>
            <td colspan="6" align="center">Tidak ada Data.</td>
        </tr>
    <?php } else { ?>
    <?php while($row = mysql_fetch_array($query)) { ?>
        <?php if($counter%2 == 0) { ?><tr class="alt"><?php } else { ?><tr><?php } ?>
            <td><?php echo $counter++; ?></td>
            <td><?php echo $row['nama_mapel']; ?> </td>
            <td><?php if($row['is_active'] == "1") { ?>Aktif<?php } else { ?>Tidak Aktif<?php } ?></td>
            <td><a href="index.php?page=detailmapel&id=<?php echo $row['id_mapel']; ?>" title="Lihat Detail Data">DETAIL</a></td>
            <td><a href="index.php?page=ubahmapel&actions=edit&id=<?php echo $row['id_mapel']; ?>" title="Ubah Data">EDIT</a>
            <td><a href="index.php?page=actionmapel&actions=delete&id=<?php echo $row['id_mapel']; ?>" onclick="return confirm('Anda Yakin Ingin Menghapus?');" title="Hapus Data">DELETE</a></td>
        </tr>
    <?php } ?>
    <?php } ?>
    </tbody>
</table>
<br>
<?php include("config/paging-views.php"); ?>
<a href="?page=tambahmapel">Tambah Mata Pelajaran</a>