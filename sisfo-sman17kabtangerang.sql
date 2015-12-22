-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 03. Agustus 2015 jam 14:20
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sisfo-sman17kabtangerang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_guru`
--

CREATE TABLE IF NOT EXISTS `ms_guru` (
  `id_guru` int(11) NOT NULL AUTO_INCREMENT,
  `nama_guru` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tempat_lahir` varchar(15) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `status_guru` tinyint(1) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `updated_by` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_guru`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `ms_guru`
--

INSERT INTO `ms_guru` (`id_guru`, `nama_guru`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `agama`, `alamat`, `no_telp`, `email`, `status_guru`, `id_mapel`, `id_user`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Heriyanto', 'Laki-laki', 'Tangerang', '1989-01-01', 'Buddha', '-', '0', 'a@b.com', 1, 2, 3, 1, 'admin', '-', '2015-07-22 02:53:15', '0000-00-00 00:00:00'),
(2, 'Apong Kartika , S.Pd', 'Perempuan', 'Tangerang', '1968-02-07', 'Islam', 'legok indah', '081233556677', 'apong@yahoo.com', 1, 4, 4, 1, 'admin', '-', '2015-08-03 09:17:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_jurusan`
--

CREATE TABLE IF NOT EXISTS `ms_jurusan` (
  `id_jurusan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jurusan` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `updated_by` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `ms_jurusan`
--

INSERT INTO `ms_jurusan` (`id_jurusan`, `nama_jurusan`, `deskripsi`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'IPA', '-', 1, 'admin', '-', '2015-06-29 08:16:33', '0000-00-00 00:00:00'),
(2, 'IPS', '-', 1, 'admin', '-', '2015-06-29 08:16:41', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_kelas`
--

CREATE TABLE IF NOT EXISTS `ms_kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(30) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `updated_by` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `ms_kelas`
--

INSERT INTO `ms_kelas` (`id_kelas`, `nama_kelas`, `id_jurusan`, `id_guru`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '10 IPA', 1, 1, 1, 'admin', '-', '2015-06-29 08:21:24', '0000-00-00 00:00:00'),
(2, '10 IPS', 2, 2, 1, 'admin', '-', '2015-06-29 08:21:36', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_mapel`
--

CREATE TABLE IF NOT EXISTS `ms_mapel` (
  `id_mapel` int(11) NOT NULL AUTO_INCREMENT,
  `nama_mapel` varchar(30) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `updated_by` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_mapel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `ms_mapel`
--

INSERT INTO `ms_mapel` (`id_mapel`, `nama_mapel`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Bhs. Indonesia', 1, 'admin', '-', '2015-06-29 08:17:45', '0000-00-00 00:00:00'),
(2, 'Matematika', 1, 'admin', '-', '2015-06-29 08:17:53', '0000-00-00 00:00:00'),
(3, 'Bhs. Inggris', 1, 'admin', '-', '2015-06-29 08:18:01', '0000-00-00 00:00:00'),
(4, 'Biologi', 1, 'admin', '-', '2015-06-29 08:18:16', '0000-00-00 00:00:00'),
(5, 'Fisika', 1, 'admin', '-', '2015-06-29 08:22:33', '0000-00-00 00:00:00'),
(6, 'Olahraga', 1, 'admin', '-', '2015-06-29 08:22:46', '0000-00-00 00:00:00'),
(7, 'Kimia', 1, 'admin', '-', '2015-06-29 08:22:33', '0000-00-00 00:00:00'),
(8, 'Sejarah', 1, 'admin', '-', '2015-06-29 08:22:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_mapel_kelas`
--

CREATE TABLE IF NOT EXISTS `ms_mapel_kelas` (
  `id_mapel_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelas` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam` text NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `updated_by` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_mapel_kelas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data untuk tabel `ms_mapel_kelas`
--

INSERT INTO `ms_mapel_kelas` (`id_mapel_kelas`, `id_kelas`, `id_mapel`, `hari`, `jam`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Senin', '08:00-10:00', 1, 'admin', '-', '2015-06-29 08:27:19', '0000-00-00 00:00:00'),
(2, 1, 2, 'Senin', '10:00-12:00', 1, 'admin', '-', '2015-06-29 08:28:10', '0000-00-00 00:00:00'),
(3, 1, 3, 'Senin', '13:00-14:00', 1, 'admin', '-', '2015-06-29 08:28:33', '0000-00-00 00:00:00'),
(4, 1, 6, 'Selasa', '08:00-10:00', 1, 'admin', '-', '2015-06-29 08:30:27', '0000-00-00 00:00:00'),
(5, 1, 2, 'Selasa', '10:00-12:00', 1, 'admin', '-', '2015-06-29 08:30:46', '0000-00-00 00:00:00'),
(6, 1, 4, 'Selasa', '13:00-14:00', 1, 'admin', '-', '2015-06-29 08:31:08', '0000-00-00 00:00:00'),
(7, 1, 1, 'Rabu', '08:00-10:00', 1, 'admin', '-', '2015-06-29 08:31:35', '0000-00-00 00:00:00'),
(8, 1, 5, 'Rabu', '10:00-12:00', 1, 'admin', '-', '2015-06-29 08:50:41', '0000-00-00 00:00:00'),
(9, 1, 3, 'Rabu', '13:00-14:00', 1, 'admin', '-', '2015-06-29 08:52:34', '0000-00-00 00:00:00'),
(10, 2, 2, 'Senin', '08:00-10:00', 1, 'admin', '-', '2015-06-29 08:56:29', '0000-00-00 00:00:00'),
(11, 2, 1, 'Senin', '10:00-12:00', 1, 'admin', '-', '2015-06-29 08:56:45', '0000-00-00 00:00:00'),
(12, 2, 4, 'Senin', '13:00-14:00', 1, 'admin', '-', '2015-06-29 08:57:09', '0000-00-00 00:00:00'),
(13, 2, 2, 'Selasa', '08:00-10:00', 1, 'admin', '-', '2015-06-29 08:57:38', '0000-00-00 00:00:00'),
(14, 2, 1, 'Selasa', '10:00-12:00', 1, 'admin', '-', '2015-06-29 08:58:07', '0000-00-00 00:00:00'),
(15, 2, 3, 'Selasa', '13:00-14:00', 1, 'admin', '-', '2015-06-29 08:58:31', '0000-00-00 00:00:00'),
(16, 2, 6, 'Rabu', '08:00-10:00', 1, 'admin', '-', '2015-06-29 08:58:47', '0000-00-00 00:00:00'),
(17, 2, 3, 'Rabu', '10:00-12:00', 1, 'admin', '-', '2015-06-29 08:59:16', '0000-00-00 00:00:00'),
(18, 2, 5, 'Rabu', '13:00-14:00', 1, 'admin', '-', '2015-06-29 08:59:32', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_nilai_dt`
--

CREATE TABLE IF NOT EXISTS `ms_nilai_dt` (
  `id_nilai_dt` int(11) NOT NULL AUTO_INCREMENT,
  `nilai_tugas_1` int(11) NOT NULL,
  `nilai_tugas_2` int(11) NOT NULL,
  `nilai_tugas_3` int(11) NOT NULL,
  `nilai_tugas_4` int(11) NOT NULL,
  `nilai_tugas_5` int(11) NOT NULL,
  `nilai_ulangan_1` int(11) NOT NULL,
  `nilai_ulangan_2` int(11) NOT NULL,
  `nilai_ulangan_3` int(11) NOT NULL,
  `nilai_ulangan_4` int(11) NOT NULL,
  `nilai_ulangan_5` int(11) NOT NULL,
  `nilai_uts` int(11) NOT NULL,
  `nilai_uas` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_nilai_hd` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `updated_by` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_nilai_dt`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `ms_nilai_dt`
--

INSERT INTO `ms_nilai_dt` (`id_nilai_dt`, `nilai_tugas_1`, `nilai_tugas_2`, `nilai_tugas_3`, `nilai_tugas_4`, `nilai_tugas_5`, `nilai_ulangan_1`, `nilai_ulangan_2`, `nilai_ulangan_3`, `nilai_ulangan_4`, `nilai_ulangan_5`, `nilai_uts`, `nilai_uas`, `id_mapel`, `id_nilai_hd`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 100, 90, 100, 100, 70, 98, 70, 100, 100, 70, 80, 90, 4, 1, 1, 'apong', '-', '2015-08-03 09:18:26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_nilai_hd`
--

CREATE TABLE IF NOT EXISTS `ms_nilai_hd` (
  `id_nilai_hd` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `updated_by` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_nilai_hd`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `ms_nilai_hd`
--

INSERT INTO `ms_nilai_hd` (`id_nilai_hd`, `id_siswa`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'apong', '-', '2015-08-03 09:18:26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_siswa`
--

CREATE TABLE IF NOT EXISTS `ms_siswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tempat_lahir` varchar(15) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `sekolah_asal` varchar(20) NOT NULL,
  `nisn` varchar(15) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nama_ayah` varchar(30) NOT NULL,
  `nama_ibu` varchar(30) NOT NULL,
  `no_telp_ayah` varchar(15) NOT NULL,
  `no_telp_ibu` varchar(15) NOT NULL,
  `id_user` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `updated_by` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `ms_siswa`
--

INSERT INTO `ms_siswa` (`id_siswa`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `agama`, `alamat`, `no_telp`, `email`, `sekolah_asal`, `nisn`, `nis`, `id_kelas`, `nama_ayah`, `nama_ibu`, `no_telp_ayah`, `no_telp_ibu`, `id_user`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Rizki', 'Laki-laki', 'Tangerang', '1997-01-01', 'Islam', '-', '0', 'a@b.com', '-', '-', '141500001', 1, '-', '-', '0', '0', 4, 1, 'admin', '-', '2015-07-22 02:58:04', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_user`
--

CREATE TABLE IF NOT EXISTS `ms_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(10) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `updated_by` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `ms_user`
--

INSERT INTO `ms_user` (`id_user`, `username`, `password`, `level`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 1, '-', '-', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'kepsek', '8561863b55faf85b9ad67c52b3b851ac', 'Kepsek', 1, 'admin', '-', '2015-07-22 02:53:15', '0000-00-00 00:00:00'),
(3, 'heri', '6812af90c6a1bbec134e323d7e70587b', 'Pengajar', 1, 'admin', '-', '2015-07-22 02:53:15', '0000-00-00 00:00:00'),
(4, 'rizki', '3e089c076bf1ec3a8332280ee35c28d4', 'Siswa', 1, 'admin', '-', '2015-07-22 02:58:04', '0000-00-00 00:00:00'),
(5, 'apong', '834413c290672a1fa626b8681265fec9', 'Pengajar', 1, 'admin', '-', '2015-08-03 09:17:14', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
