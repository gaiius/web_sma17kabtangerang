<?php 

require("../config/configuration.php");
header("Content-Type: application/javascript");

if (!empty($_GET['callback'])) {
	$querySiswa=mysql_query("SELECT a.nama_lengkap, a.jenis_kelamin, a.tempat_lahir, a.tgl_lahir, a.agama, a.alamat, a.no_telp, a.email, a.sekolah_asal, a.nisn, a.nis FROM ms_siswa AS a
								INNER JOIN ms_user AS b ON b.id_user = a.id_user WHERE b.username = '$_GET[username]'");
	$json = $_GET["callback"].'([';
	while ($dataSiswa=mysql_fetch_array($querySiswa)) {
		$dataJSON = '{ "nama_lengkap":'.json_encode($dataSiswa['nama_lengkap']).' 
			,"jenis_kelamin":'.json_encode($dataSiswa['jenis_kelamin']).'
			,"tempat_lahir":'.json_encode($dataSiswa['tempat_lahir']).'
			,"tgl_lahir":'.json_encode($dataSiswa['tgl_lahir']).'
			,"agama":'.json_encode($dataSiswa['agama']).'
			,"alamat":'.json_encode($dataSiswa['alamat']).'
			,"no_telp":'.json_encode($dataSiswa['no_telp']).'
			,"email":'.json_encode($dataSiswa['email']).'
			,"sekolah_asal":'.json_encode($dataSiswa['sekolah_asal']).'
			,"nisn":'.json_encode($dataSiswa['nisn']).'
			,"nis":'.json_encode($dataSiswa['nis']).'}, ';
		$json .=$dataJSON;
	}
	$json .= '])';                   
	echo str_replace('}, ])', '} ])', $json );
}

?>