<?php
    include_once("../conn.php");
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM checkin WHERE id = '$id'");
    while($data = mysqli_fetch_array($result)){
        $id_checkin = $data['id_checkin'];
        $nm_penyewa = $data['nm_penyewa'];
        $no_ktp = $data['no_ktp'];
        $almt = $data['almt_penyewa'];
        $kd_kamar = $data['kd_kamar'];
        $nm_kamar = $data['nm_kamar'];
        $jns_kamar = $data['jns_kamar'];
        $tgl_checkin = $data['tgl_checkin'];
        $tgl_checkout = $data['tgl_checkout'];
        $lm_menginap = $data['lama_menginap'];
        $jml_kamar = $data['jml_kamar_disewa'];
        $hrg_sewa = $data['hrg_sewa'];
        $total_bayar = $data['total'];
    }
    $dataCheckin = mysqli_query($conn, "SELECT * FROM checkin");
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
        <form action="./update.php" method="post"> 
            <tr>
                <td><h3 style="text-align: center;">Entry Data Checkin Kamar Hotel</h3></td>
            </tr>
            <tr>
                <td>
                    <table>
                        <tr>
                            <th>Id Checkin</th> 
                            <td><input type="text" name="id_checkin" value="<?= $id_checkin ?>"></td>
                        </tr>
                        <tr>
                            <th>Nama Penyewa</th> 
                            <td><input type="text" name="nm_penyewa" value="<?= $nm_penyewa ?>"></td>
                        </tr>
                        <tr>
                            <th>No KTP</th> 
                            <td><input type="text" name="no_ktp" value="<?= $no_ktp ?>"></td>
                        </tr>
                        <tr>
                            <th>Alamat Penyewa</th> 
                            <td><textarea name="almt" id="almt" cols="30" rows="10"><?= $almt ?></textarea></td>
                        </tr>
                        <tr>
                            <th>Kode Kamar</th> 
                            <td><input type="text" name="kd_kamar" id="kd_kamar" value="<?= $kd_kamar ?>" ></td>
                        </tr>
                        <tr>
                            <th>Nama Kamar</th> 
                            <td><input type="text" name="nm_kamar" id="nm_kamar" value="<?= $nm_kamar ?>" ></td>
                        </tr>
                        <tr>
                            <th>Jenis Kamar</th> 
                            <td><input type="text" name="jns_kamar" value="<?= $jns_kamar ?>"></td>
                        </tr>
                        <tr>
                            <th>Tanggal Checkin</th> 
                            <td><input type="date" id="tgl_checkin" name="tgl_checkin" value="<?= $tgl_checkin ?>"></td>
                        </tr>
                        <tr>
                            <th>Tanggal Checkout</th> 
                            <td><input type="date" id="tgl_checkout" name="tgl_checkout" value="<?= $tgl_checkout ?>" onchange="CalculateTanggal()"></td>
                        </tr>
                        <tr>
                            <th>Lama Menginap</th> 
                            <td><input type="number" name="lm_menginap" id="lm_menginap" value="<?= $lm_menginap ?>"></td>
                        </tr>
                        <tr>
                            <th>Jumlah Kamar disewa</th> 
                            <td><input type="number" name="jml_kamar" id="jml_kamar" value="<?= $jml_kamar ?>" onchange="CekHarga()"></td>
                        </tr>
                        <tr>
                            <th>Harga Sewa/hari</th> 
                            <td><input type="number" name="hrg_sewa" id="hrg_sewa" value="<?= $hrg_sewa ?>"></td>
                        </tr>
                        <tr>
                            <th>Total Bayar</th> 
                            <td><input type="number" id="total_bayar" name="total_bayar" value="<?= $total_bayar ?>"></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <center>
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <button type="submit">Submit</button>
                    <button type="reset">Reset</button>
                    </center>
                </td>
            </tr>
    </form>
        </table>

    </center>

    <script>
        function CalculateTanggal() {
            let tgl_checkin = document.getElementById("tgl_checkin").value
            let tgl_checkout = document.getElementById("tgl_checkout").value

            let checkin = new Date(tgl_checkin)
            let checkout = new Date(tgl_checkout)

            let diff_date_time = checkout.getTime() - checkin.getTime()
            let diff_date_days = diff_date_time / (1000 * 3600 * 24)

            console.log(diff_date_time)
            console.log(diff_date_days)
            
            document.getElementById("lm_menginap").value = diff_date_days
        }
        function CekHarga() {
            // (lama nginap*jml kamar sewa*harga)  
            let lama_menginap = document.getElementById('lm_menginap').value
            let jml_kamar = document.getElementById('jml_kamar').value
            let harga = document.getElementById('hrg_sewa').value

            let total = lama_menginap * jml_kamar * harga

            document.getElementById('total_bayar').value = total
        }
    </script>

</body>
</html>