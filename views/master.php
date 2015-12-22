<ul>
	<?php if($_SESSION['userlevel'] == "Admin") { ?>
	<li>
		<a href="?page=masterguru">Master Guru</a>
	</li>
	<li>
		<a href="?page=masterjurusan">Master Jurusan</a>	
	</li>
	<li>
		<a href="?page=masterkelas">Master Kelas</a>
	</li>
	<li>
		<a href="?page=mastermapel">Master Mata Pelajaran</a>
	</li>
	<li>
		<a href="?page=mastersiswa">Master Siswa</a>
	</li>
	<li>
		<a href="?page=masteruser">Master User Admin</a>
	</li>
	<li>
		<a href="?page=masterusersiswapengajar">Master User Siswa & Pengajar</a>
	</li>
	<li>
		<a href="?page=settingmapelkelas">Setting Mapel Kelas</a>
	</li>
	<?php } elseif($_SESSION['userlevel'] == "Kepsek") { ?>
	<li>
		<a href="?page=masterguru">Master Guru</a>
	</li>
	<li>
		<a href="?page=mastersiswa">Master Siswa</a>
	</li>	
	<?php } ?>
</ul>