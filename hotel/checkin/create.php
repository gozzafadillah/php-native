<?php
// connect database
include_once("../conn.php");

// menangkap data setelah user me-submit data dengan method post
$id_checkin = $_POST['id_checkin'];
$nm_penyewa = $_POST['nm_penyewa'];
$ktp = $_POST['no_ktp'];
$almt = $_POST['almt'];
$kd_kamar = $_POST['kd_kamar'];
$nm_kamar = $_POST['nm_kamar'];
$jenis = $_POST['jns_kamar'];
$tgl_checkin = $_POST['tgl_checkin'];
$tgl_checkout = $_POST['tgl_checkout'];
$lm_menginap = $_POST['lm_menginap']; 
$jml_kamar = $_POST['jml_kamar']; 
$harga = $_POST['hrg_sewa']; 
$total_bayar = $_POST['total_bayar']; 

// menambahkan data dalam table checkin
mysqli_query($conn, "INSERT INTO checkin VALUES('', '$id_checkin', '$nm_penyewa', '$ktp', '$almt', '$kd_kamar', '$nm_kamar', '$jenis', '$tgl_checkin', '$tgl_checkout', '$lm_menginap', '$jml_kamar', '$harga', '$total_bayar')");

// Redirect setelah selesai
header("location:http://localhost:8080/php-native/hotel");