<?php

@$actions = $_GET['actions'];
@$id = $_GET['id'];

@$username = $_REQUEST['username'];
@$password = md5($_REQUEST['password']);
@$level_id = $_REQUEST['level_id'];
@$is_active = $_REQUEST['is_active'];
@$created_by = $_SESSION['user'];
@$created_at = date('Y-m-d H:i:s');

if($actions == "save") {
	$updated_by = "-";
	$updated_at = "0000-00-00 00:00:00";

	$query_username_validation = mysql_query("select * from ms_user where username = '$username'");
	$username_validation = mysql_fetch_array($query_username_validation);
	
	if($username == $username_validation['username']) {
		echo "<script> alert('Username sudah terdaftar!'); window.history.back(-1); </script>";
	} else {
		$query = mysql_query("insert into ms_user values('', '$username', '$password', '$level_id', '$is_active', '$created_by', '$updated_by', '$created_at', '$updated_at')") or die(mysql_error());

		if($query) {
			echo "<script> document.location = 'index.php?page=masteruser&msg=savesuccess' </script>";
		} else {
			echo "<script> document.location = 'index.php?page=masteruser&msg=savefailed' </script>";
    	}
    }
} elseif($actions == "update") {
	$updated_by = $_SESSION['user'];
	$updated_at = date('Y-m-d H:i:s');
	
	if (!empty($_REQUEST['password'])) {
		$query = mysql_query("update ms_user set password = '$password', is_active = '$is_active', updated_by = '$updated_by', updated_at = '$updated_at' where id_user = '$id'") or die(mysql_error());
	} else {
		$query = mysql_query("update ms_user set is_active = '$is_active', updated_by = '$updated_by', updated_at = '$updated_at' where id_user = '$id'") or die(mysql_error());
    }

    if($query) {
    	echo "<script> document.location = 'index.php?page=masteruser&msg=updatesuccess' </script>";
    } else {
    	echo "<script> document.location = 'index.php?page=masteruser&msg=updatefailed' </script>";
    }
} elseif($actions == "updatesiswapengajar") {
	$updated_by = $_SESSION['user'];
	$updated_at = date('Y-m-d H:i:s');
	
	if (!empty($_REQUEST['password'])) {
		$query = mysql_query("update ms_user set password = '$password', is_active = '$is_active', updated_by = '$updated_by', updated_at = '$updated_at' where id_user = '$id'") or die(mysql_error());
	} else {
		$query = mysql_query("update ms_user set is_active = '$is_active', updated_by = '$updated_by', updated_at = '$updated_at' where id_user = '$id'") or die(mysql_error());
    }

    if($query) {
    	echo "<script> document.location = 'index.php?page=masterusersiswapengajar&msg=updatesuccess' </script>";
    } else {
    	echo "<script> document.location = 'index.php?page=masterusersiswapengajar&msg=updatefailed' </script>";
    }
} elseif($actions == "delete") {
	$query = mysql_query("delete from ms_user where id_user = '$id'") or die(mysql_error());
	
	if($query) {
		echo "<script> document.location = 'index.php?page=masteruser&msg=deletesuccess' </script>";
    } else {
    	echo "<script> document.location = 'index.php?page=masteruser&msg=deletefailed' </script>";
    }
}

?>