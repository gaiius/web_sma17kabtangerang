<?php

@$actions = $_GET['actions'];
@$idsiswa = $_GET['idsiswa'];
@$iduser = $_GET['iduser'];

@$nama_lengkap = $_REQUEST['nama_lengkap'];
@$jenis_kelamin = $_REQUEST['jenis_kelamin'];
@$tempat_lahir = $_REQUEST['tempat_lahir'];
@$tgl_lahir = $_REQUEST['tgl_lahir'];
@$agama = $_REQUEST['agama'];
@$alamat = $_REQUEST['alamat'];
@$no_telp = $_REQUEST['no_telp'];
@$email = $_REQUEST['email'];
@$sekolah_asal = $_REQUEST['sekolah_asal'];
@$nisn = $_REQUEST['nisn'];
@$nis = $_REQUEST['nis'];
@$id_kelas = $_REQUEST['id_kelas'];
@$nama_ayah = $_REQUEST['nama_ayah'];
@$nama_ibu = $_REQUEST['nama_ibu'];
@$no_telp_ayah = $_REQUEST['no_telp_ayah'];
@$no_telp_ibu = $_REQUEST['no_telp_ibu'];
@$is_active = $_REQUEST['is_active'];
@$created_by = $_SESSION['user'];
@$created_at = date('Y-m-d H:i:s');

@$username = $_REQUEST['username'];
@$level = "Siswa";

if($actions == "save") {
	@$password = md5($_REQUEST['password']);
	$updated_by = "-";
	$updated_at = "0000-00-00 00:00:00";

	$query_username_validation = mysql_query("select * from ms_user where username = '$username'");
	$username_validation = mysql_fetch_array($query_username_validation);

	if($username == $username_validation['username']) {
		echo "<script> alert('Username sudah terdaftar!'); window.history.back(-1); </script>";
	} else {
		$query = mysql_query("insert into ms_user values('', '$username', '$password', '$level', '$is_active', '$created_by', '$updated_by', '$created_at', '$updated_at')") or die(mysql_error());

		$query_username = mysql_fetch_object(mysql_query("select id_user from ms_user where username = '$username'"));

		$query2 = mysql_query("insert into ms_siswa values('', '$nama_lengkap', '$jenis_kelamin', '$tempat_lahir', '$tgl_lahir', '$agama', '$alamat', '$no_telp', '$email', '$sekolah_asal', '$nisn', '$nis', '$id_kelas', '$nama_ayah', '$nama_ibu', '$no_telp_ayah', '$no_telp_ibu', '$query_username->id_user', '$is_active', '$created_by', '$updated_by', '$created_at', '$updated_at')") or die(mysql_error());

		if($query2) {
			echo "<script> document.location = 'index.php?page=mastersiswa&msg=savesuccess' </script>";
		} else {
    		echo "<script> document.location = 'index.php?page=mastersiswa&msg=savefailed' </script>";
    	}
	}
} elseif($actions == "update") {
	@$password = $_REQUEST['password'];
	$updated_by = $_SESSION['user'];
	$updated_at = date('Y-m-d H:i:s');

	$query_password_validation = mysql_query("select * from ms_user where username = '$username'");
	$password_validation = mysql_fetch_array($query_password_validation);

	if($password == $password_validation['password']) {
		$query = mysql_query("update ms_user set password = '$password', updated_by = '$updated_by', updated_at = '$updated_at' where id_user = '$iduser'") or die(mysql_error());
	} else {
		@$password_update = md5($_REQUEST['password']);
		$query = mysql_query("update ms_user set password = '$password_update', updated_by = '$updated_by', updated_at = '$updated_at' where id_user = '$iduser'") or die(mysql_error());
	}
	
	$query2 = mysql_query("update ms_siswa set nama_lengkap = '$nama_lengkap', jenis_kelamin = '$jenis_kelamin', tempat_lahir = '$tempat_lahir', tgl_lahir = '$tgl_lahir', agama = '$agama', alamat = '$alamat', no_telp = '$no_telp', email = '$email', sekolah_asal = '$sekolah_asal', nisn = '$nisn', nis = '$nis', id_kelas = '$id_kelas', nama_ayah = '$nama_ayah', nama_ibu = '$nama_ibu', no_telp_ayah = '$no_telp_ayah', no_telp_ibu = '$no_telp_ibu', is_active = '$is_active', updated_by = '$updated_by', updated_at = '$updated_at' where id_siswa = '$idsiswa'") or die(mysql_error());

	if($query && $query2) {
		echo "<script> document.location = 'index.php?page=mastersiswa&msg=updatesuccess' </script>";
    } else {
    	echo "<script> document.location = 'index.php?page=mastersiswa&msg=updatefailed' </script>";	
	}
} elseif($actions == "delete") {
	$query = mysql_query("delete from ms_siswa where id_siswa = '$idsiswa'") or die(mysql_error());
	$query2 = mysql_query("delete from ms_user where id_user = '$iduser'") or die(mysql_error());
	
	if($query && $query2) {
		echo "<script> document.location = 'index.php?page=mastersiswa&msg=deletesuccess' </script>";
    } else {
    	echo "<script> document.location = 'index.php?page=mastersiswa&msg=deletefailed' </script>";
    }
}

?>