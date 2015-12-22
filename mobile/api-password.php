<?php

require("../config/configuration.php");
header("Content-Type: application/javascript");

if (!empty($_POST['password'])) {
	$password_update = md5($_POST['password']);
	$updated_by = $_POST['username'];
	$updated_at = date('Y-m-d H:i:s');

	$query = mysql_query("update ms_user set password = '$password_update', updated_by = '$updated_by', updated_at = '$updated_at' where username = '$updated_by'") or die(mysql_error());

	if($query) {
		echo "true";
    } else {
    	echo "false";
    }
} else {
	echo "null";
}

?>