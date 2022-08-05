<?php
include_once("../conn.php");

    $id = $_POST['id'];
    $kd_kamar = $_POST['kd_kamar'];
    $nm_kamar = $_POST['nm_kamar'];
    $jns_kamar = $_POST['jns_kamar'];
    $kps_kamar = $_POST['kapasitas'];
    $lok_kamar = $_POST['lok_kamar'];
    $fas_kamar = $_POST['fasilitas'];
    $jml_kamar = $_POST['jum_kamar'];
    $hrg_sewa = $_POST['sewa'];

    $result = mysqli_query($conn, "UPDATE data_hotel SET kd_kamar='$kd_kamar', nm_kamar='$nm_kamar', jns_kamar='$jns_kamar', kps_kamar='$kps_kamar', lok_kamar='$lok_kamar', fas_kamar='$fas_kamar', jml_kamar=$jml_kamar, hrg_sewa=$hrg_sewa WHERE id=$id");

    header("location:tambah_kamar.php?kd=KMR_001");
?>