<?php
// connect database
include_once("../conn.php");

// menangkap id
$id = $_GET['id'];

// menghapus data by id
$result = mysqli_query($conn, "DELETE FROM data_hotel WHERE id=$id");

// redirect
header("Location:tambah_kamar.php");
?>