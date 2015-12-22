<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'sisfo-sman17kabtangerang';

$connect = @mysql_connect($host, $user, $pass) or die (mysql_error());
$dbselect = mysql_select_db($dbname) or die (mysql_error());

session_start();
date_default_timezone_set("Asia/Jakarta");

$seminggu = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
$hari = date("w");
$hari_ini = $seminggu[$hari];

$tgl_sekarang = date("Ymd");
$tgl_skrg     = date("d");
$bln_sekarang = date("m");
$thn_sekarang = date("Y");
$jam_sekarang = date("H:i:s");

$nama_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei", 
                    "Juni", "Juli", "Agustus", "September", 
                    "Oktober", "November", "Desember");

?>