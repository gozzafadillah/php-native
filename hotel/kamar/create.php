<?php 

include_once("../conn.php");

$kode = $_POST['kd_kamar'];
$nama = $_POST['nm_kamar'];
$jenis = $_POST['jns_kamar'];
$kap = $_POST['kapasitas'];
$lokasi = $_POST['lok_kamar'];
$fasilitas = $_POST['fasilitas'];
$jumlah = $_POST['jum_kamar'];
$sewa = $_POST['sewa'];

mysqli_query($conn, "INSERT INTO data_hotel VALUES('','$kode', '$nama', '$jenis', '$kap', '$lokasi', '$fasilitas', '$jumlah', '$sewa')");

header("location:tambah_kamar.php");
?>