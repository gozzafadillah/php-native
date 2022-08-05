<?php
// Create database connection using config file
include_once("../conn.php");
 
// Fetch all users data from database
$result = mysqli_query($conn, "SELECT * FROM data_hotel");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <style>
        table {
            margin: 50px 0;
        }
        tr,th,td {
            padding: 10px 30px;
        }
    </style>
</head>
<body>
<center>
        <table border="1">
            <form action="./create.php" method="post">
            <tr>
                <td>
                    <h2 style="text-align:center; margin:0;" id="judul">Input Data Hotel</h2>   
                </td>
            </tr>
            <tr>
                <td>
                        <table>
                            <tr>
                                <th>
                                    <h5>Kode Kamar</h5>
                                </th>
                                <td>
                                    <input type="text" name="kd_kamar">
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h5>Nama Kamar</h5>
                                </th>
                                <td>
                                    <input type="text" name="nm_kamar">
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h5>Jenis Kamar</h5>
                                </th>
                                <td>
                                    <input type="text" name="jns_kamar">
                                </td>
                            </tr>
                           
                            <tr>
                                <th>
                                    <h5>Kapasitas Kamar (org)</h5>
                                </th>
                                <td>
                                    <input type="number" name="kapasitas">
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h5>Lokasi Kamar</h5>
                                </th>
                                <td>
                                    <input type="text" name="lok_kamar">
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h5>Fasilitas</h5>
                                </th>
                                <td>
                                    <textarea name="fasilitas" id="fasilitas" cols="30" rows="10"></textarea>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h5>Jumlah Kamar</h5>
                                </th>
                                <td>
                                    <input type="number" name="jum_kamar">
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h5>Harga Sewa/hari (Rp)</h5>
                                </th>
                                <td>
                                    <input type="number" name="sewa">
                                </td>
                            </tr>

                        </table>

                    </td>
                </tr>
                <tr>
                    <td>
                        <center>
                            <button type="submit">submit</button>
                            <button type="reset">batal</button>
                        </center>
                    </td>
                </tr>
            </form>
        </table>

        <table border="1">
            <tr>
                <th>Kode Kamar</th>
                <th>Nama Kamar</th>
                <th>Jenis Kamar</th>
                <th>Kapasitas Kamar (org)</th>
                <th>Lokasi Kamar</th>
                <th>Fasilitas</th>
                <th>Jumlah Kamar</th>
                <th>Harga Sewa/hari (Rp)</th>
                <th>Edit dan Hapus</th>
            </tr>
            <?php  
            while($data = mysqli_fetch_array($result)) {         
                echo "<tr>";
                echo "<td>".$data['kd_kamar']."</td>";
                echo "<td>".$data['nm_kamar']."</td>";
                echo "<td>".$data['jns_kamar']."</td>";
                echo "<td>".$data['kps_kamar']."</td>";
                echo "<td>".$data['lok_kamar']."</td>";
                echo "<td>".$data['fas_kamar']."</td>";
                echo "<td>".$data['jml_kamar']."</td>";
                echo "<td>".$data['hrg_sewa']."</td>";
                echo "<td><a href='edit.php?id=$data[id]'>Edit</a> | <a href='delete.php?id=$data[id]'>Delete</a></td></tr>";        
            }
        ?>
        </table>
    </center>
</body>
</html>