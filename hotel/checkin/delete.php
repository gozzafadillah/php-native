<?php
// connect database
include_once("../conn.php");
// menangkap id dengan method get
$id = $_GET['id'];

// delete data by id
$result = mysqli_query($conn, "DELETE FROM checkin WHERE id=$id");

// Redirect
header("Location:checkin.php?kd=KMR_001");
?>