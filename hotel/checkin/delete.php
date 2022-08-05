<?php
include_once("../conn.php");
 
$id = $_GET['id'];
 
$result = mysqli_query($conn, "DELETE FROM checkin WHERE id=$id");
 
header("Location:checkin.php?kd=KMR_001");
?>