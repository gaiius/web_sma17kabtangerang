<?php

@$actions = $_GET['actions'];
@$id = $_GET['id'];

@$nama = $_REQUEST['nama'];
@$jurusan_id = $_REQUEST['jurusan_id'];
@$wali_kelas_id = $_REQUEST['wali_kelas_id'];
@$is_active = $_REQUEST['is_active'];
@$created_by = $_SESSION['user'];
@$created_at = date('Y-m-d H:i:s');
	
if($actions == "save") {
	$updated_by = "-";
	$updated_at = "0000-00-00 00:00:00";
	
	$query_name_validation = mysql_query("select * from ms_kelas where nama_kelas = '$nama'");
	$name_validation = mysql_num_rows($query_name_validation);

	if($name_validation == 1) {
		echo "<script> document.location = 'index.php?page=masterfrmke&s/?actions=create&msg=nameexist' </script>";
	} else {
		$query = mysql_query("insert into ms_kelas values('', '$nama', '$jurusan_id', '$wali_kelas_id', '$is_active', '$created_by', '$updated_by', '$created_at', '')");

    	if($query) {
    		echo "<script> document.location = 'index.php?page=masterkelas&msg=savesuccess' </script>";
    	} else {
    		echo "<script> document.location = 'index.php?page=masterkelas&msg=savefailed' </script>";
    	}
	}
} elseif($actions == "update") {
	$updated_by = $_SESSION['user'];
	$updated_at = date('Y-m-d H:i:s');
	
	$sql = "update ms_kelas set nama_kelas = '$nama', id_jurusan = '$jurusan_id', id_guru = '$wali_kelas_id', is_active = '$is_active', updated_by = '$updated_by', updated_at = '$updated_at' where id_kelas = '$id'";
	$query = mysql_query($sql);
	
    if($query) {
    	echo "<script> document.location = 'index.php?page=masterkelas&msg=updatesuccess' </script>";
    } else {
    	echo "<script> document.location = 'index.php?page=masterkelas&msg=updatefailed' </script>";
    }
} elseif($actions == "delete") {
	$sql = "delete from ms_kelas where id_kelas = '$id'";
	$query = mysql_query($sql);
	
	if($query) {
    	echo "<script> document.location = 'index.php?page=masterkelas&msg=deletesuccess' </script>";
    } else {
    	echo "<script> document.location = 'index.php?page=masterkelas&msg=deletefailed' </script>";
    }
}

?>