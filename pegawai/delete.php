<?php
// memanggil db
include_once("conn.php");
 
// menangkap id
$id = $_GET['id'];

// menghapus data 
$result = mysqli_query($conn, "DELETE FROM tbl_data_pegawai WHERE id=$id");

// redirect
header("Location:index.php");
?>