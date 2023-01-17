<?php
    // connect database
    include_once("../conn.php");
    
    // menangkap id dari url dengan method get
    $id = $_GET['id'];

    // mengambil data checkin by id_checkind
    $result = mysqli_query($conn, "SELECT * FROM checkin WHERE id_checkin = '$id'");

    // fect data $result agar dapat ditampilkan dalam table
    while($data = mysqli_fetch_array($result)){
        $id = $data['id'];
        $id_checkin = $data['id_checkin'];
        $kd = $data['kd_kamar'];
        $nm_kamar = $data['nm_kamar'];
        $jenis = $data['jns_kamar'];
        $sewa = $data['hrg_sewa'];
        $tgl_checkin = $data['tgl_checkin'];
        $tgl_checkout = $data['tgl_checkout'];
        $lm_menginap = $data['lama_menginap'];
        $nm_penyewa = $data['nm_penyewa'];
        $ktp = $data['no_ktp'];
        $almt = $data['almt_penyewa'];
        $jml = $data["jml_kamar_disewa"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkin</title>
    <style>
        td,th {
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    <center>
        <table border="1">
        <form action="./create.php" method="post"> 
            <tr>
                <td><h3 style="text-align: center;">Entry Data Checkout Kamar Hotel</h3></td>
            </tr>
            <tr>
                <td>
                    <table>
                        <tr>
                            <td>
                                <input type="hidden" name="id" value="<?= $id ?>">
                            </td>
                        </tr>
                        <tr>
                            <th>Id Checkout</th> 
                            <td><input type="text" name="id_checkout" value="<?= $id_checkin . "-out" ?>"></td>
                        </tr>
                        <tr>
                            <th>Nama Penyewa</th> 
                            <td><input type="text" name="nm_penyewa" value="<?= $nm_penyewa ?>"></td>
                        </tr>
                        <tr>
                            <th>No KTP</th> 
                            <td><input type="text" name="no_ktp" value="<?= $ktp ?>"></td>
                        </tr>
                        <tr>
                            <th>Alamat Penyewa</th> 
                            <td><textarea name="almt" id="almt" cols="30" rows="10"><?= $almt ?></textarea></td>
                        </tr>
                        <tr>
                            <th>Kode Kamar</th> 
                            <td><input type="text" name="kd_kamar" id="kd_kamar" value="<?= $kd ?>" ></td>
                        </tr>
                        <tr>
                            <th>Nama Kamar</th> 
                            <td><input type="text" name="nm_kamar" id="nm_kamar" value="<?= $nm_kamar ?>" ></td>
                        </tr>
                        <tr>
                            <th>Jenis Kamar</th> 
                            <td><input type="text" name="jns_kamar" value="<?= $jenis ?>"></td>
                        </tr>
                        <tr>
                            <th>Tanggal Checkin</th> 
                            <td><input type="date" id="tgl_checkin" name="tgl_checkin" value="<?= $tgl_checkin ?>"></td>
                        </tr>
                        <tr>
                            <th>Tanggal Checkout</th> 
                            <td><input type="date" id="tgl_checkout" name="tgl_checkout" value="<?= $tgl_checkout ?>"></td>
                        </tr>
                        <tr>
                            <th>Jumlah Kamar disewa</th> 
                            <td><input type="number" name="jml_kamar" id="jml_kamar" value="<?= $jml ?>"></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <center>
                    <button type="submit">Submit</button>
                    <button type="reset">Reset</button>
                    </center>
                </td>
            </tr>
    </form>
        </table>
    </center>


</body>
</html>