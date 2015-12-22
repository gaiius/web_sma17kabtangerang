<!DOCTYPE html>
<html>
	<head>
<?php include("views/header.php"); ?>
	</head>
	<body onload="startclock()">
		<div id="container">
			<div id="pages">
				<div id="menu"><?php include("views/menu.php"); ?></div>
				<div id="header"></div>
				<div id="block">
				<?php echo "Waktu server : $hari_ini, <span id='date'></span><span id='clock'></span> | "; ?>
				<?php echo "Login : ".$_SESSION['user']." (".$_SESSION['userlevel'].")"; ?>&nbsp;>>&nbsp;<a href="?page=logout">Keluar</a></div>
				<div id="content"><?php include("views/content.php"); ?></div>
				<?php include("views/footer.php"); ?>
			</div>
		</div>
	</body>
</html>