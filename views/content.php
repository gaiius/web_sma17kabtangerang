<?php

@$page = $_GET['page'];

if(!empty($_SESSION['user']) && !empty($_SESSION['userlevel'])) {
	if($_SESSION['userlevel'] == "Admin") {
		switch($page) {
			case "logout":
				include("modules/login/actionLogout.php");
			break;

			case "master":
				include("master.php");
			break;

			case "masteruser":
				include("modules/user/indexUser.php");
			break;

			case "tambahuser":
				include("modules/user/formUserAdd.php");
			break;

			case "actionuser":
				include("modules/user/actionUser.php");
			break;

			case "ubahuser":
				include("modules/user/formUserEdit.php");
			break;

			case "ubahusersiswapengajar":
				include("modules/user/formUserSiswaPengajarEdit.php");
			break;

			case "masterusersiswapengajar":
				include("modules/user/indexUserSiswaPengajar.php");
			break;

			case "mastersiswa":
				include("modules/siswa/indexSiswa.php");
			break;

			case "detailsiswa":
				include("modules/siswa/detailSiswa.php");
			break;

			case "tambahsiswa":
				include("modules/siswa/formSiswaAdd.php");
			break;

			case "actionsiswa":
				include("modules/siswa/actionSiswa.php");
			break;

			case "ubahsiswa":
				include("modules/siswa/formSiswaEdit.php");
			break;

			case "masterjurusan":
				include("modules/jurusan/indexJurusan.php");
			break;

			case "detailjurusan":
				include("modules/jurusan/detailJurusan.php");
			break;

			case "tambahjurusan":
				include("modules/jurusan/formJurusanAdd.php");
			break;

			case "ubahjurusan":
				include("modules/jurusan/formJurusanEdit.php");
			break;

			case "actionjurusan":
				include("modules/jurusan/actionJurusan.php");
			break;

			case "mastermapel":
				include("modules/mapel/indexMapel.php");
			break;

			case "detailmapel":
				include("modules/mapel/detailMapel.php");
			break;

			case "tambahmapel":
				include("modules/mapel/formMapelAdd.php");
			break;

			case "actionmapel":
				include("modules/mapel/actionMapel.php");
			break;

			case "ubahmapel":
				include("modules/mapel/formMapelEdit.php");
			break;

			case "masterguru":
				include("modules/guru/indexGuru.php");
			break;

			case "detailguru":
				include("modules/guru/detailGuru.php");
			break;

			case "tambahguru":
				include("modules/guru/formGuruAdd.php");
			break;

			case "ubahguru":
				include("modules/guru/formGuruEdit.php");
			break;

			case "actionguru":
				include("modules/guru/actionGuru.php");
			break;

			case "masterkelas":
				include("modules/kelas/indexKelas.php");
			break;

			case "detailkelas":
				include("modules/kelas/detailKelas.php");
			break;

			case "tambahkelas":
				include("modules/kelas/formKelasAdd.php");
			break;

			case "ubahkelas":
				include("modules/kelas/formKelasEdit.php");
			break;

			case "actionkelas":
				include("modules/kelas/actionKelas.php");
			break;
	
			case "settingmapelkelas":
				include("modules/mapelkelas/indexMapelKelas.php");
			break;

			case "detailmapelkelas":
				include("modules/mapelkelas/detailMapelKelas.php");
			break;

			case "tambahmapelkelas":
				include("modules/mapelkelas/formMapelKelasAdd.php");
			break;

			case "actionmapelkelas":
				include("modules/mapelkelas/actionMapelKelas.php");
			break;

			default;
			include("test.php");
		} 
	} elseif($_SESSION['userlevel'] == "Pengajar") {
		switch($page) {
			case "logout":
				include("modules/login/actionLogout.php");
			break;

			case "inputnilai":
				include("modules/nilai/formNilai.php");
			break;

			case "actionnilai":
				include("modules/nilai/actionNilai.php");
			break;

			default;
			include("test.php");
		}
	} elseif($_SESSION['userlevel'] == "Kepsek") {
		switch($page) {
			case "logout":
				include("modules/login/actionLogout.php");
			break;

			case "master":
				include("master.php");
			break;

			case "mastersiswa":
				include("modules/siswa/indexSiswa.php");
			break;

			case "detailsiswa":
				include("modules/siswa/detailSiswa.php");
			break;

			case "masterguru":
				include("modules/guru/indexGuru.php");
			break;

			case "detailguru":
				include("modules/guru/detailGuru.php");
			break;

			default;
			include("test.php");
		}
	} else {
		switch($page) {
			case "logout":
				include("modules/login/actionLogout.php");
			break;
		}
	}
} else {
	switch($page) {
		case "auth":
			include("modules/login/actionLogin.php");
		break;
	
		case "logout":
			include("modules/login/actionLogout.php");
		break;

		default;
		include("login-form.php");
	}
}

?>