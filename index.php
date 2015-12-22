<?php

require("config/configuration.php");
ini_set('display_errors', 1); error_reporting(E_ALL); 

if(!empty($_SESSION['user']) && !empty($_SESSION['userlevel'])) {
	include("views/home.php");
} else {
	include("views/login.php");
}

?>