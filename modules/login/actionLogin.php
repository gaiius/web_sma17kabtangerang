<?php

if((isset($_POST['username'])) && (isset($_POST['password']))) {
	$username = mysql_real_escape_string($_REQUEST['username']);
	$password = mysql_real_escape_string($_REQUEST['password']);

	$query = mysql_query("SELECT * FROM ms_user WHERE username = '$username' AND password = md5('$password')");
	$result = mysql_fetch_object($query);
	$total = mysql_num_rows($query);

	if($total != null) {
		$_SESSION['user'] = $username;
		$_SESSION['userlevel'] = $result->level;

		if($_SESSION['userlevel'] == "Admin" || $_SESSION['userlevel'] == "Kepsek") {
			echo "<script> document.location = 'index.php' </script>";
		} elseif($_SESSION['userlevel'] == "Pengajar") {
			echo "<script> document.location = 'index.php' </script>";
		} else {
			echo "<script> alert('Akun anda tidak memiliki hak akses untuk login!'); document.location = 'index.php?page=logout' </script>";
		}
	} else {
		if($total == null) {
			echo "<script> document.location = 'index.php?msg=notaccount' </script>";
		} else {
			echo "<script> document.location = 'index.php?msg=loginfailed' </script>";	
		}
	}
}

?>