<?php
// menghubungkan database
include_once("../conn.php");

// menangkap dari data setelah user menambahkan data dengan method post
$id = $_POST['id'];
$id_checkout = $_POST['id_checkout'];
$nm_penyewa = $_POST['nm_penyewa'];
$ktp = $_POST['no_ktp'];
$almt = $_POST['almt'];
$kd_kamar = $_POST['kd_kamar'];
$nm_kamar = $_POST['nm_kamar'];
$jenis = $_POST['jns_kamar'];
$tgl_checkin = $_POST['tgl_checkin'];
$tgl_checkout = $_POST['tgl_checkout'];
$jml_kamar = $_POST['jml_kamar']; 

// menambahkan ke dalam table checkout 
mysqli_query($conn, "INSERT INTO checkout VALUES('', '$id_checkout', '$nm_penyewa', '$ktp', '$almt', '$kd_kamar', '$nm_kamar', '$jenis', '$tgl_checkin', '$tgl_checkout', '$jml_kamar')");
mysqli_query($conn, "DELETE FROM checkin WHERE id=$id");

// redirect
header("location:http://localhost:8080/php-native/hotel");