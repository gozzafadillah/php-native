<?php 
include_once("conn.php");
$kd_peg = $_POST['kd_pegawai'];
$nm_peg = $_POST['nm_pegawai'];
$tgl = $_POST['tgl_lahir'];
$kel = $_POST['jns_kel'];
$agm = $_POST['agm'];
$gol = $_POST['gol'];
$jbtn = $_POST['jbt_peg'];
$almt = $_POST['almt_peg'];
$telp = $_POST['telp'];

mysqli_query($conn, "INSERT INTO tbl_data_pegawai VALUE('', '$kd_peg', '$nm_peg', '$tgl', '$kel', '$agm', '$gol', '$jbtn', '$almt', '$telp')");

header("location:index.php");
?>