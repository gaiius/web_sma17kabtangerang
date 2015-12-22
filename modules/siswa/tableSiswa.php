<?php 

$paging_location = "mastersiswa";
$total = mysql_num_rows(mysql_query("SELECT * FROM ms_siswa ORDER BY id_siswa"));

include("config/paging.php");
    
$query = mysql_query("SELECT * FROM ms_siswa ORDER BY id_siswa LIMIT $offset, $rec_limit");
$total_data = mysql_num_rows($query);

?>
<?php if(@$_GET['msg'] == "savesuccess") { ?>
<h4 style="color: blue;text-align: center;">Siswa Berhasil Ditambahkan..</h4>
<?php } elseif(@$_GET['msg'] == "savefailed") { ?>
<h4 style="color: red;text-align: center;">Siswa Gagal Ditambahkan..</h4>
<?php } elseif(@$_GET['msg'] == "updatesuccess") { ?>
<h4 style="color: blue;text-align: center;">Siswa Berhasil Diubah..</h4>
<?php } elseif(@$_GET['msg'] == "updatefailed") { ?>
<h4 style="color: red;text-align: center;">Siswa Gagal Diubah..</h4>
<?php } elseif(@$_GET['msg'] == "deletesuccess") { ?>
<h4 style="color: blue;text-align: center;">Siswa Berhasil Dihapus..</h4>
<?php } elseif(@$_GET['msg'] == "deletefailed") { ?>
<h4 style="color: red; text-align: center;">Siswa Gagal Dihapus..</h4>
<?php } ?>
<h2 style="text-align: center;">Master Siswa</h2>
<table id="table-sism">
    <thead>
        <tr>
            <th>#</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Status</th>
            <?php if($_SESSION['userlevel'] == "Admin") { ?>
            <th colspan="3"><center>Aksi</center></th>
            <?php } else { ?>
            <th><center>Aksi</center></th>
            <?php } ?>
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
            <td><?php echo $row['nis']; ?></td>
            <td><?php echo $row['nama_lengkap']; ?></td>
            <td><?php if($row['is_active'] == "1") { ?>Aktif<?php } else { ?>Tidak Aktif<?php } ?></td>
            <?php if($_SESSION['userlevel'] == "Admin") { ?>
            <td><a href="index.php?page=detailsiswa&id=<?php echo $row['id_siswa']; ?>" title="Lihat Detail Data">DETAIL</a></td>
            <td><a href="index.php?page=ubahsiswa&idsiswa=<?php echo $row['id_siswa']; ?>" title="Ubah Data">EDIT</a>
            <td><a href="index.php?page=actionsiswa&actions=delete&idsiswa=<?php echo $row['id_siswa']; ?>&iduser=<?php echo $row['id_user']; ?>" onclick="return confirm('Anda Yakin Ingin Menghapus?');" title="Hapus Data">DELETE</a>
            <?php } else { ?>
            <td><a href="index.php?page=detailsiswa&id=<?php echo $row['id_siswa']; ?>" title="Lihat Detail Data">DETAIL</a></td>
            <?php } ?>
            </td>
        </tr>
    <?php } ?>
    <?php } ?>
    </tbody>
</table>
<br>
<?php include("config/paging-views.php"); ?>
<?php if($_SESSION['userlevel'] == "Admin") { ?>
<a href="?page=tambahsiswa">Tambah Siswa</a>
<?php } ?>