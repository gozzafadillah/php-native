<?php

include_once("../conn.php");

$id_checkout = $_POST['id_checkout'];
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

mysqli_query($conn, "INSERT INTO checkout VALUES('', '$id_checkin', '$nm_penyewa', '$ktp', '$almt', '$kd_kamar', '$nm_kamar', '$jenis', '$tgl_checkin', '$tgl_checkout', '$lm_menginap', '$jml_kamar')");

header("location:checkout.php");