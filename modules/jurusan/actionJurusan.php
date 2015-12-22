<?php

@$actions = $_GET['actions'];
@$id = $_GET['id'];

@$nama = $_REQUEST['nama'];
@$deskripsi = $_REQUEST['deskripsi'];
@$is_active = $_REQUEST['is_active'];
@$created_by = $_SESSION['user'];
@$created_at = date('Y-m-d H:i:s');
	
if($actions == "save") {
	$updated_by = "-";
	$updated_at = "0000-00-00 00:00:00";
	
	$query_name_validation = mysql_query("select * from ms_jurusan where nama_jurusan = '$nama'");
	$name_validation = mysql_num_rows($query_name_validation);

	if($name_validation == 1) {
		echo "<script> document.location = 'index.php?page=masterjurusan&msg=nameexist' </script>";
	} else {
		$query = mysql_query("insert into ms_jurusan values('', '$nama', '$deskripsi', '$is_active', '$created_by', '$updated_by', '$created_at', '')");

    	if($query) {
    		echo "<script> document.location = 'index.php?page=masterjurusan&msg=savesuccess' </script>";
    	} else {
    		echo "<script> document.location = 'index.php?page=masterjurusan&msg=savefailed' </script>";
    	}
	}
} elseif($actions == "update") {
	$updated_by = $_SESSION['user'];
	$updated_at = date('Y-m-d H:i:s');
	
	$sql = "update ms_jurusan set nama_jurusan = '$nama', deskripsi = '$deskripsi', is_active = '$is_active', updated_by = '$updated_by', updated_at = '$updated_at' where id_jurusan = '$id'";
	$query = mysql_query($sql);
	
    if($query) {
    	echo "<script> document.location = 'index.php?page=masterjurusan&msg=updatesuccess' </script>";
    } else {
    	echo "<script> document.location = 'index.php?page=masterjurusan&msg=updatefailed' </script>";
    }
} elseif($actions == "delete") {
	$sql = "delete from ms_jurusan where id_jurusan = '$id'";
	$query = mysql_query($sql);
	
	if($query) {
    	echo "<script> document.location = 'index.php?page=masterjurusan&msg=deletesuccess' </script>";
    } else {
    	echo "<script> document.location = 'index.php?page=masterjurusan&msg=deletefailed' </script>";
    }
}

?>