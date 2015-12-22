<?php

$query = mysql_query("SELECT * FROM ms_user WHERE level = 'Admin'");
@$total = mysql_num_rows($query);

?>
<?php if(@$_GET['msg'] == "savesuccess") { ?>
<h4 style="color: blue; text-align: center;">User Berhasil Ditambahkan..</h4>
<?php } elseif(@$_GET['msg'] == "savefailed") { ?>
<h4 style="color: red; text-align: center;">User Gagal Ditambahkan..</h4>
<?php } elseif(@$_GET['msg'] == "updatesuccess") { ?>
<h4 style="color: blue; text-align: center;">User Berhasil Diubah..</h4>
<?php } elseif(@$_GET['msg'] == "updatefailed") { ?>
<h4 style="color: red; text-align: center;">User Gagal Diubah..</h4>
<?php } elseif(@$_GET['msg'] == "deletesuccess") { ?>
<h4 style="color: blue; text-align: center;">User Berhasil Dihapus..</h4>
<?php } elseif(@$_GET['msg'] == "deletefailed") { ?>
<h4 style="color: red; text-align: center;">User Gagal Dihapus..</h4>
<?php } ?>
<h2 style="text-align: center;">Master User Admin</h2>
<table id="table-sism">
    <thead>
        <tr>
            <th>#</th>
            <th>User Name</th>
            <th>Level User</th>
            <th>Status</th>
            <th>Dibuat Oleh</th>
            <th>Tanggal</th>
            <th colspan="2"><center>Aksi</center></th>
        </tr>
    </thead>
    <tbody>
    <?php if($total == 0) { ?>
        <tr>
            <td colspan="7" align="center">Tidak ada Data.</td>
        </tr>
    <?php } else { ?>
    <?php $counter = 1; ?>
    <?php while($row = mysql_fetch_array($query)) { ?>
        <?php if($counter%2 == 0) { ?><tr class="alt"><?php } else { ?><tr><?php } ?>
            <td><?php echo $counter++; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['level']; ?></td>
            <td><?php if($row['is_active'] == "1") { ?>Aktif<?php } else { ?>Tidak Aktif<?php } ?></td>
            <td><?php echo $row['created_by']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td><a href="index.php?page=ubahuser&id=<?php echo $row['id_user']; ?>" title="Ubah Data">EDIT</a></td>
            <td><a href="index.php?page=actionuser&actions=delete&id=<?php echo $row['id_user']; ?>" onclick = "return confirm('Anda Yakin Ingin Menghapus?');" title="Hapus Data">DELETE</a></td>
        </tr>
    <?php } ?>
    <?php } ?>
    </tbody>
</table>
<br>
<a href="?page=tambahuser">Tambah User Admin</a>