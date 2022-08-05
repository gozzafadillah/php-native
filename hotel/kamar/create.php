<?php 
// connect database
include_once("../conn.php");

// menangkap data setelah user menambahkan data dengan method post
$kode = $_POST['kd_kamar'];
$nama = $_POST['nm_kamar'];
$jenis = $_POST['jns_kamar'];
$kap = $_POST['kapasitas'];
$lokasi = $_POST['lok_kamar'];
$fasilitas = $_POST['fasilitas'];
$jumlah = $_POST['jum_kamar'];
$sewa = $_POST['sewa'];

// menambahkan data ke table data_hotel
mysqli_query($conn, "INSERT INTO data_hotel VALUES('','$kode', '$nama', '$jenis', '$kap', '$lokasi', '$fasilitas', '$jumlah', '$sewa')");

// redirect setelah selesai
header("location:tambah_kamar.php");
?>