<?php 
// connect ke database
include_once("./conn.php");
// mengambil pada table data hotel
$result = mysqli_query($conn, "SELECT * FROM data_hotel");
// mengambil data checkin
$pemesan = mysqli_query($conn, "SELECT * FROM checkin");
// mengambil data checkout
$dataCheckout = mysqli_query($conn, "SELECT * FROM checkout");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Hotel</title>
    <style>
        th {
            padding: 10px 30px;
        }
        .tambah {
            margin: 20px 0;
        }
        .action {
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Sistem Informasi Hotel</h1>

    <center>
        <div class="tambah">
            <a href="./kamar/tambah_kamar.php"><h4>Tambah Kamar</h4></a>
        </div>
    <table border="1" style="margin:40px 0 ;">
        <tr>
            <th colspan="8"><h3>Stok Kamar</h3></th>
        </tr>
        <tr>
            <th>Kode Kamar</th>
            <th>Nama Kamar</th>
            <th>Jenis Kamar</th>
            <th>Kapasitas Kamar(org)</th>
            <th>Lokasi Kamar</th>
            <th>Jumlah Kamar</th>
            <th>Harga Sewa</th>
            <th>Action</th>
        </tr>
        <?php  
            while($data = mysqli_fetch_array($result)) {         
                echo "<tr>";
                echo "<td>".$data['kd_kamar']."</td>";
                echo "<td>".$data['nm_kamar']."</td>";
                echo "<td>".$data['jns_kamar']."</td>";
                echo "<td>".$data['kps_kamar']."</td>";
                echo "<td>".$data['lok_kamar']."</td>";
                echo "<td>".$data['jml_kamar']."</td>";
                echo "<td>".$data['hrg_sewa']."</td>";
                echo "<td><a href='./checkin/checkin.php?kd=". $data['kd_kamar'] ."'>Pesan Kamar</a></td>";
            }
            ?>
    </table>
   <div class="action">
   <table border="1" style="margin: 50px 0;">
    <tr>
        <th colspan="4"><h3>Penyewa yang Check-in</h3></th>
    </tr>
    <tr>
        <th>Nama</th>
        <th>ID Checkin</th>
        <th>Tanggal Checkin</th>
        <th>Action</th>
    </tr>
    <?php
    while($data = mysqli_fetch_array($pemesan)) {         
        echo "<tr>";
        echo "<td>".$data['nm_penyewa']."</td>";
        echo "<td>".$data['id_checkin']."</td>";
        echo "<td>".$data['tgl_checkin']."</td>";
        echo "<td><a href='./checkout/checkout.php?id=$data[id_checkin]'>Checkout</a>";
    }
    ?>
   </table>
   </div>
   <div class="checkout">
    <table border="1">
                <tr>
                    <th colspan="10"><h3>Checkout</h3></th>
                </tr>
                <tr>
                    <th>ID Checkout</th>
                    <th>Nama Penyewa</th>
                    <th>No KTP</th>
                    <th>Alamat Penyewa</th>
                    <th>Kode Kamar</th>
                    <th>Nama Kamar</th>
                    <th>Jenis Kamar</th>
                    <th>Tanggal Checkin</th>
                    <th>Tanggal Checkout</th>
                    <th>Jumlah Kamar</th>
                </tr>
                <?php
                    while($data = mysqli_fetch_array($dataCheckout)) {         
                        echo "<tr>";
                        echo "<td>".$data['id_checkout']."</td>";
                        echo "<td>".$data['nm_penyewa']."</td>";
                        echo "<td>".$data['no_ktp']."</td>";
                        echo "<td>".$data['almt_penyewa']."</td>";
                        echo "<td>".$data['kd_kamar']."</td>";
                        echo "<td>".$data['nm_kamar']."</td>";
                        echo "<td>".$data['jns_kamar']."</td>";
                        echo "<td>".$data['tgl_checkin']."</td>";
                        echo "<td>".$data['tgl_checkout']."</td>";
                        echo "<td>".$data['jml_kamar_disewa']."</td>";
                    }
                ?>
        </table>
   </div>
    </center>
</body>
</html>