<?php

@$actions = $_GET['actions'];
@$id = $_GET['id'];

@$nama_mapel = $_REQUEST['nama_mapel'];
@$is_active = $_REQUEST['is_active'];
@$created_by = $_SESSION['user'];
@$created_at = date('Y-m-d H:i:s');
	
if($actions == "save") {
	$updated_by = "-";
	$updated_at = "0000-00-00 00:00:00";
	
	$query_name_validation = mysql_query("select * from ms_mapel where nama_mapel = '$nama_mapel'");
	$name_validation = mysql_num_rows($query_name_validation);

	if($name_validation == 1) {
		echo "<script> document.location = 'index.php?page=masterfrmmapel&actions=create&msg=nameexist' </script>";
	} else {
		$query = mysql_query("insert into ms_mapel values('', '$nama_mapel', '$is_active', '$created_by', '$updated_by', '$created_at', '')");

    	if($query) {
    		echo "<script> document.location = 'index.php?page=mastermapel&msg=savesuccess' </script>";
    	} else {
    		echo "<script> document.location = 'index.php?page=mastermapel&msg=savefailed' </script>";
    	}
	}
} elseif($actions == "update") {
	$updated_by = $_SESSION['user'];
	$updated_at = date('Y-m-d H:i:s');
	
	$sql = "update ms_mapel set nama_mapel = '$nama_mapel', is_active = '$is_active', updated_by = '$updated_by', updated_at = '$updated_at' where id_mapel = '$id'";
	$query = mysql_query($sql);
	
    if($query) {
    	echo "<script> document.location = 'index.php?page=mastermapel&msg=updatesuccess' </script>";
    } else {
    	echo "<script> document.location = 'index.php?page=mastermapel&msg=updatefailed' </script>";
    }
} elseif($actions == "delete") {
	$sql = "delete from ms_mapel where id_mapel = '$id'";
	$query = mysql_query($sql);
	
	if($query) {
    	echo "<script> document.location = 'index.php?page=mastermapel&msg=deletesuccess' </script>";
    } else {
    	echo "<script> document.location = 'index.php?page=mastermapel&msg=deletefailed' </script>";
    }
}

?>