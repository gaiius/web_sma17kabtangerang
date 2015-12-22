<?php if((!isset($_SESSION['user'])) || (empty($_SESSION['user']))) { ?>
<?php } else { ?>
	<?php if($_SESSION['userlevel'] == "Admin" || $_SESSION['userlevel'] == "Kepsek") { ?>
	<a href="?page=home">Home</a>
	<a href="?page=master">Master</a>
	<?php } elseif($_SESSION['userlevel'] == "Pengajar") { ?>
	<a href="?page=home">Home</a>
	<a href="?page=inputnilai">Input Nilai</a>
	<?php } ?>
<?php } ?>