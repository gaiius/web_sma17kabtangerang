<?php

@$actions = $_GET['actions'];
@$id = $_GET['id'];

@$id_siswa = $_REQUEST['id_siswa'];
@$nilai_tugas_1 = $_REQUEST['nilai_tugas_1'];
@$nilai_tugas_2 = $_REQUEST['nilai_tugas_2'];
@$nilai_tugas_3 = $_REQUEST['nilai_tugas_3'];
@$nilai_tugas_4 = $_REQUEST['nilai_tugas_4'];
@$nilai_tugas_5 = $_REQUEST['nilai_tugas_5'];
@$nilai_ulangan_1 = $_REQUEST['nilai_ulangan_1'];
@$nilai_ulangan_2 = $_REQUEST['nilai_ulangan_2'];
@$nilai_ulangan_3 = $_REQUEST['nilai_ulangan_3'];
@$nilai_ulangan_4 = $_REQUEST['nilai_ulangan_4'];
@$nilai_ulangan_5 = $_REQUEST['nilai_ulangan_5'];
@$nilai_uts = $_REQUEST['nilai_uts'];
@$nilai_uas = $_REQUEST['nilai_uas'];
@$id_mapel = $_REQUEST['id_mapel'];
@$is_active = '1';
@$created_by = $_SESSION['user'];
@$created_at = date('Y-m-d H:i:s');
	
if($actions == "save") {
	$updated_by = "-";
	$updated_at = "0000-00-00 00:00:00";

	$query_null = mysql_num_rows(mysql_query("select * from ms_nilai_hd where id_siswa = '$id_siswa'"));

	if($query_null == null) {
		$query = mysql_query("insert into ms_nilai_hd values('', '$id_siswa', '$is_active', '$created_by', '$updated_by', '$created_at', '$updated_at')");
	}

	$query_check = mysql_fetch_object(mysql_query("select id_nilai_hd from ms_nilai_hd where id_siswa = '$id_siswa'"));
	$query2 = mysql_query("insert into ms_nilai_dt values('', '$nilai_tugas_1', '$nilai_tugas_2', '$nilai_tugas_3', '$nilai_tugas_4', '$nilai_tugas_5', '$nilai_ulangan_1', '$nilai_ulangan_2', '$nilai_ulangan_3', '$nilai_ulangan_4', '$nilai_ulangan_5', '$nilai_uts', '$nilai_uas', '$id_mapel', '$query_check->id_nilai_hd', '$is_active', '$created_by', '$updated_by', '$created_at', '$updated_at')");

	if($query2) {
		echo "<script> alert('Nilai berhasil ditambahkan!'); document.location = 'index.php?page=inputnilai' </script>";
	} else {
		echo "<script> alert('Nilai gagal ditambahkan!'); document.location = 'index.php?page=inputnilai' </script>";
    }
} elseif($actions == "update") {
	$updated_by = $user_login->username;
	$updated_at = date('Y-m-d H:i:s');
	
	$sql = "update ms_agama set nama = '$nama', is_active = '$is_active', updated_by = '$updated_by', updated_at = '$updated_at' where id = '$id'";
	$query = mysql_query($sql);
	
    if($query) {
    	echo "<script> document.location = 'ma/?msg=updatesuccess' </script>";
    } else {
    	echo "<script> document.location = 'ma/?msg=updatefailed' </script>";
    }
} elseif($actions == "delete") {
	$sql = "delete from ms_agama where id = '$id'";
	$query = mysql_query($sql);
	
	if($query) {
    	echo "<script> document.location = 'ma/?msg=deletesuccess' </script>";
    } else {
    	echo "<script> document.location = 'ma/?msg=deletefailed' </script>";
    }
}

?>