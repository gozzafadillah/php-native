<?php
// Create database connection using config file
include_once("./conn.php");
 
// Fetch all users data from database
$result = mysqli_query($conn, "SELECT * FROM tbl_data_pegawai");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Pegawai</title>
    <style>
        th, td {
        padding-top: 0;
        padding-bottom: 0;
        padding-left: 30px;
        padding-right: 40px;
}
    </style>
</head>
<body>
    <center>
        <table border="1">
            <form action="add.php" method="post">
            <tr>
                <td>
                    <h2 style="text-align:center; margin:0;" id="judul">Input Data Pegawai</h2>   
                </td>
            </tr>
            <tr>
                <td>
                        <table>
                            
                        
                            <tr>
                                <th>
                                    <h5>kode pegawai</h5>
                                </th>
                                <td>
                                    <input type="text" name="kd_pegawai">
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h5>nama pegawai</h5>
                                </th>
                                <td>
                                    <input type="text" name="nm_pegawai">
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h5>tanggal lahir</h5>
                                </th>
                                <td>
                                    <input type="date" name="tgl_lahir">
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h5>jenis kelamin</h5>
                                </th>
                                <td>
                                    <input type="text" name="jns_kel">
                                </td>
                            </tr>
                           
                            <tr>
                                <th>
                                    <h5>agama</h5>
                                </th>
                                <td>
                                    <input type="text" name="agm">
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h5>golongan</h5>
                                </th>
                                <td>
                                    <input type="text" name="gol">
                                </td>
                            </tr>


                            <tr>
                                <th>
                                    <h5>jabatan pegawai</h5>
                                </th>
                                <td>
                                    <input type="text" name="jbt_peg">
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h5>alamat pegawai</h5>
                                </th>
                                <td>
                                    <input type="text" name="almt_peg">
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h5>telepon</h5>
                                </th>
                                <td>
                                    <input type="text" name="telp">
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
   

    <table border="1" style="margin-top: 20px;">
        <tr>
            <th>Kode Pegawai</th>
            <th>Nama Pegawai</th>
            <th>Tgl Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Golongan</th>
            <th>Jabatan Pegawai</th>
            <th>Alamat Pegawai</th>
            <th>Telpon</th>
            <th colspan="2">Edit dan Hapus</th>
        </tr>
        <?php  
            while($peg = mysqli_fetch_array($result)) {         
                echo "<tr>";
                echo "<td>".$peg['kd_peg']."</td>";
                echo "<td>".$peg['nm_peg']."</td>";
                echo "<td>".$peg['tgl_lahir']."</td>";
                echo "<td>".$peg['jns_klm']."</td>";
                echo "<td>".$peg['agm']."</td>";
                echo "<td>".$peg['gol']."</td>";
                echo "<td>".$peg['jbtn']."</td>";
                echo "<td>".$peg['almt']."</td>";
                echo "<td>".$peg['no_tlp']."</td>";
                echo "<td><a href='edit.php?id=$peg[id]'>Edit</a> | <a href='delete.php?id=$peg[id]'>Delete</a></td></tr>";        
            }
    ?>
    </table>

    </center>
</body>
</html>