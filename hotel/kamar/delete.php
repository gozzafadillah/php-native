<?php
include_once("../conn.php");
 
$id = $_GET['id'];
 
$result = mysqli_query($conn, "DELETE FROM data_hotel WHERE id=$id");
 
header("Location:tambah_kamar.php");
?>