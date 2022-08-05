<?php

include_once("../conn.php");

$id = $_POST['id'];
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

mysqli_query($conn, "UPDATE checkin SET id_checkin='$id_checkin', nm_penyewa='$nm_penyewa', no_ktp='$ktp', almt_penyewa='$almt', kd_kamar='$kd_kamar', nm_kamar='$nm_kamar', jns_kamar='$jenis', tgl_checkin='$tgl_checkin', tgl_checkout='$tgl_checkout', lama_menginap='$lm_menginap', jml_kamar_disewa='$jml_kamar', hrg_sewa='$harga', total='$total_bayar' WHERE id = $id");

header("location:http://localhost:8080/php-native/hotel/checkin/checkin.php?kd=KMR_001");