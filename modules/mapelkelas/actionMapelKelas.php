<?php

@$actions = $_GET['actions'];
@$id = $_GET['id'];

@$id_kelas = $_REQUEST['id_kelas'];
@$id_mapel = $_REQUEST['id_mapel'];
@$hari = $_REQUEST['hari'];
@$jam = $_REQUEST['jam'];
@$is_active = $_REQUEST['is_active'];
@$created_by = $_SESSION['user'];
@$created_at = date('Y-m-d H:i:s');
	
if($actions == "save") {
	$updated_by = "-";
	$updated_at = "0000-00-00 00:00:00";

		$query = mysql_query("insert into ms_mapel_kelas values('', '$id_kelas', '$id_mapel', '$hari', '$jam', '$is_active', '$created_by', '$updated_by', '$created_at', '')");

    	if($query) {
    		echo "<script> document.location = 'index.php?page=detailmapelkelas&id=".$id_kelas."&msg=savesuccess' </script>";
    	} else {
    		echo "<script> document.location = 'index.php?page=detailmapelkelas&&msg=savefailed' </script>";
    	}
}

?>