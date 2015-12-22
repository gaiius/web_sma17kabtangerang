<?php

if(isset($_SESSION['user'])) {
	unset($_SESSION['user']);
}

session_destroy();

echo "<script> document.location = 'index.php' </script>";

?>