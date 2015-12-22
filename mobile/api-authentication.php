<?php

require("../config/configuration.php");
header("Content-Type: application/javascript");

if (!empty($_POST['username']) && !empty($_POST['password'])) {
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);

	$query = mysql_query("SELECT * FROM ms_user WHERE username = '$username' AND password = md5('$password') AND level = 'Siswa'");
	$total = mysql_num_rows($query);

	if($total != null) {
		echo "true";
    } else {
    	echo "false";
    }
} else {
	echo "null";
}

?>