<?php
include_once("conn.php");
 
$id = $_GET['id'];
 
$result = mysqli_query($conn, "DELETE FROM tbl_data_pegawai WHERE id=$id");
 
header("Location:index.php");
?>