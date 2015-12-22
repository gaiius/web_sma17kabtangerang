<?php 

require("../config/configuration.php");
header("Content-Type: application/javascript");

if (!empty($_GET['callback'])) {
	if (empty($_GET['mapel'])) {
		$queryMapel=mysql_query("select * from ms_mapel");
	    $json = $_GET["callback"].'([';
	    while ($dataMapel=mysql_fetch_array($queryMapel)) {
			$dataJSON = '{ "id_mapel":'.json_encode($dataMapel['id_mapel']).' ,"nama_mapel":'.json_encode($dataMapel['nama_mapel']).'}, ';
			$json .=$dataJSON;
		}
		$json .= '])';                   
		echo str_replace('}, ])', '} ])', $json );
	} else {
		$queryNilai=mysql_query("SELECT a.id_siswa, b.nama_lengkap AS nama_siswa, d.nama_mapel AS nama_mapel, c.nilai_tugas_1 AS nilai_tugas_1, c.nilai_tugas_2 AS nilai_tugas_2, c.nilai_tugas_3 AS nilai_tugas_3, c.nilai_tugas_4 AS nilai_tugas_4, c.nilai_tugas_5 AS nilai_tugas_5, c.nilai_ulangan_1 AS nilai_ulangan_1, c.nilai_ulangan_2 AS nilai_ulangan_2, c.nilai_ulangan_3 AS nilai_ulangan_3, c.nilai_ulangan_4 AS nilai_ulangan_4, c.nilai_ulangan_5 AS nilai_ulangan_5, c.nilai_uts AS nilai_uts, c.nilai_uas AS nilai_uas FROM ms_nilai_hd AS a INNER JOIN ms_siswa AS b ON b.id_siswa = a.id_siswa INNER JOIN ms_nilai_dt AS c ON c.id_nilai_hd = a.id_nilai_hd INNER JOIN ms_mapel AS d ON d.id_mapel = c.id_mapel INNER JOIN ms_user AS e ON e.id_user = b.id_user WHERE c.id_mapel = '$_GET[mapel]' AND e.username = '$_GET[username]'");
	    $json = $_GET["callback"].'([';
	    while ($dataNilai=mysql_fetch_array($queryNilai)) {
			$dataJSON = '{ "id_siswa":'.json_encode($dataNilai['id_siswa']).' ,"nama_siswa":'.json_encode($dataNilai['nama_siswa']).',"nama_mapel":'.json_encode($dataNilai['nama_mapel']).',"nilai_tugas_1":'.json_encode($dataNilai['nilai_tugas_1']).',"nilai_tugas_2":'.json_encode($dataNilai['nilai_tugas_2']).',"nilai_tugas_3":'.json_encode($dataNilai['nilai_tugas_3']).',"nilai_tugas_4":'.json_encode($dataNilai['nilai_tugas_4']).',"nilai_tugas_5":'.json_encode($dataNilai['nilai_tugas_5']).',"nilai_ulangan_1":'.json_encode($dataNilai['nilai_ulangan_1']).',"nilai_ulangan_2":'.json_encode($dataNilai['nilai_ulangan_2']).',"nilai_ulangan_3":'.json_encode($dataNilai['nilai_ulangan_3']).',"nilai_ulangan_4":'.json_encode($dataNilai['nilai_ulangan_4']).',"nilai_ulangan_5":'.json_encode($dataNilai['nilai_ulangan_5']).',"nilai_uts":'.json_encode($dataNilai['nilai_uts']).',"nilai_uas":'.json_encode($dataNilai['nilai_uas']).'}, ';
			$json .=$dataJSON;
		}
		$json .= '])';                   
		echo str_replace('}, ])', '} ])', $json );
	}
}

?>