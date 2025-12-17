<?php
$host = "localhost";
$user = "dlyzyzzj_zpot";
$pass = "zpotsukses1234";
$db   = "dlyzyzzj_zpotdb";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}
