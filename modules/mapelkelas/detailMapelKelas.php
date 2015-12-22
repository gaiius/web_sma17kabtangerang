<?php 

@$id = $_GET['id'];

$query = mysql_query("SELECT a.id_kelas, a.nama_kelas, b.nama_jurusan AS id_jurusan, c.nama_guru AS id_guru FROM ms_kelas AS a INNER JOIN ms_jurusan AS b ON b.id_jurusan = a.id_jurusan INNER JOIN ms_guru AS c ON c.id_guru = a.id_guru WHERE a.id_kelas = '$id'");
$query2 = mysql_query("SELECT b.nama_mapel, a.hari, a.jam FROM ms_mapel_kelas AS a INNER JOIN ms_mapel b ON b.id_mapel = a.id_mapel WHERE a.id_kelas = '$id' ORDER BY a.id_mapel_kelas");

@$total = mysql_num_rows($query2);

?>
<?php if(@$_GET['msg'] == "savesuccess") { ?>
<h4 style="color: blue; text-align: center;">Mata Pelajaran Berhasil Ditambahkan..</h4>
<?php } elseif(@$_GET['msg'] == "savefailed") { ?>
<h4 style="color: red;text-align: center;">Mata Pelajaran Gagal Ditambahkan..</h4>
<?php } ?>
<table id="table-sism">
    <thead>
        <tr>
            <th>Nama Kelas</th>
            <th>Wali Kelas</th>
            <th colspan="2">Jurusan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <?php while($row = mysql_fetch_array($query)) { ?>
            <td><?php echo $row['nama_kelas']; ?></td>
            <td><?php echo $row['id_guru']; ?></td>
            <td colspan="2"> <?php echo $row['id_jurusan']; ?></td>
        <?php } ?>
        </tr>
    </tbody>
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Mata Pelajaran</th>
            <th>Hari</th>
            <th>Jam</th>
        </tr>
    </thead>
    <tbody>
    <?php if($total == 0) { ?>
        <tr>
            <td colspan="4" align="center">Tidak ada Data.</td>
        </tr>
    <?php } else { ?>
    <?php $counter = 1; ?>
    <?php while($row2 = mysql_fetch_array($query2)) { ?>
        <?php if($counter%2 == 0) { ?><tr class="alt"><?php } else { ?><tr><?php } ?>
            <td><?php echo $counter++; ?></td>
            <td><?php echo $row2['nama_mapel']; ?></td>
            <td><?php echo $row2['hari']; ?></td>
            <td><?php echo $row2['jam']; ?></td>
        </tr>
    <?php } ?>
    <?php } ?>
    </tbody>
</table>
<br>
<a href="?page=tambahmapelkelas&id=<?php echo $id; ?>">Tambahkan Mata Pelajaran</a>
<a href="?page=settingmapelkelas" style="float: right;">Kembali</a>