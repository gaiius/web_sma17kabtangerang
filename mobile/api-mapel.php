<?php 

require("../config/configuration.php");
header("Content-Type: application/javascript");

if (!empty($_GET['callback'])) {
	$queryMapel=mysql_query("SELECT b.nama_mapel, a.hari, a.jam FROM ms_mapel_kelas AS a INNER JOIN ms_mapel b ON b.id_mapel=a.id_mapel INNER JOIN ms_siswa c ON c.id_kelas=a.id_kelas INNER JOIN ms_user AS d ON d.id_user = c.id_user WHERE d.username = '$_GET[username]' AND hari in ('Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat')");
	$json = $_GET["callback"].'([';
	while ($dataMapel=mysql_fetch_array($queryMapel)) {
		$dataJSON = '{ "nama_mapel":'.json_encode($dataMapel['nama_mapel']).' 
			,"hari":'.json_encode($dataMapel['hari']).'
			,"jam":'.json_encode($dataMapel['jam']).'}, ';
		$json .=$dataJSON;
	}
	$json .= '])';                   
	echo str_replace('}, ])', '} ])', $json );
}

?>