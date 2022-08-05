<?php
    // connect database
    include_once("../conn.php");
    // menangkap kd dari url dengan method get
    $kd = $_GET['kd'];

    // memanggil data_hotel by kd_kamar
    $result = mysqli_query($conn, "SELECT * FROM data_hotel WHERE kd_kamar = '$kd'");
    
    // fecth data result agar dapat ditampilkan dalam table
    while($data = mysqli_fetch_array($result)){
        $kd = $data['kd_kamar'];
        $nm_kamar = $data['nm_kamar'];
        $jenis = $data['jns_kamar'];
        $sewa = $data['hrg_sewa'];
    }

    // memanggil semua data dari table checkin
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
        <form action="./create.php" method="post"> 
            <tr>
                <td><h3 style="text-align: center;">Entry Data Checkin Kamar Hotel</h3></td>
            </tr>
            <tr>
                <td>
                    <table>
                        <tr>
                            <th>Id Checkin</th> 
                            <td><input type="text" name="id_checkin"></td>
                        </tr>
                        <tr>
                            <th>Nama Penyewa</th> 
                            <td><input type="text" name="nm_penyewa"></td>
                        </tr>
                        <tr>
                            <th>No KTP</th> 
                            <td><input type="text" name="no_ktp"></td>
                        </tr>
                        <tr>
                            <th>Alamat Penyewa</th> 
                            <td><textarea name="almt" id="almt" cols="30" rows="10"></textarea></td>
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
                            <td><input type="date" id="tgl_checkin" name="tgl_checkin"></td>
                        </tr>
                        <tr>
                            <th>Tanggal Checkout</th> 
                            <td><input type="date" id="tgl_checkout" name="tgl_checkout" onchange="CalculateTanggal()"></td>
                        </tr>
                        <tr>
                            <th>Lama Menginap</th> 
                            <td><input type="number" name="lm_menginap" id="lm_menginap"></td>
                        </tr>
                        <tr>
                            <th>Jumlah Kamar disewa</th> 
                            <td><input type="number" name="jml_kamar" id="jml_kamar" onchange="CekHarga()"></td>
                        </tr>
                        <tr>
                            <th>Harga Sewa/hari</th> 
                            <td><input type="number" name="hrg_sewa" id="hrg_sewa" value="<?= $sewa ?>"></td>
                        </tr>
                        <tr>
                            <th>Total Bayar</th> 
                            <td><input type="number" id="total_bayar" name="total_bayar"></td>
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

        <table border="1" style="margin: 100px 0;">
                <tr>
                    <th colspan="13"><h3>Check-in</h3></th>
                </tr>
                <tr>
                    <th>ID Checkin</th>
                    <th>Nama Penyewa</th>
                    <th>No KTP</th>
                    <th>Alamat Penyewa</th>
                    <th>Kode Kamar</th>
                    <th>Nama Kamar</th>
                    <th>Jenis Kamar</th>
                    <th>Tanggal Checkin</th>
                    <th>Tanggal Checkout</th>
                    <th>Jumlah Kamar</th>
                    <th>Harga Sewa</th>
                    <th>Total Bayar</th>
                    <th>Edit & Hapus</th>
                </tr>
                <?php
                // menampilkan $datacheckin dalam table
                    while($data = mysqli_fetch_array($dataCheckin)) {         
                        echo "<tr>";
                        echo "<td>".$data['id_checkin']."</td>";
                        echo "<td>".$data['nm_penyewa']."</td>";
                        echo "<td>".$data['no_ktp']."</td>";
                        echo "<td>".$data['almt_penyewa']."</td>";
                        echo "<td>".$data['kd_kamar']."</td>";
                        echo "<td>".$data['nm_kamar']."</td>";
                        echo "<td>".$data['jns_kamar']."</td>";
                        echo "<td>".$data['tgl_checkin']."</td>";
                        echo "<td>".$data['tgl_checkout']."</td>";
                        echo "<td>".$data['jml_kamar_disewa']."</td>";
                        echo "<td>".$data['hrg_sewa']."</td>";
                        echo "<td>".$data['total']."</td>";
                        echo "<td><a href='edit.php?id=$data[id]'>Edit</a> | <a href='delete.php?id=$data[id]'>Delete</a></td></tr>";
                    }
                ?>
        </table>

    </center>

    <script>
        // calculatsi tanggal
        function CalculateTanggal() {
            let tgl_checkin = document.getElementById("tgl_checkin").value
            let tgl_checkout = document.getElementById("tgl_checkout").value
            
            // konvert data dari string ke date
            let checkin = new Date(tgl_checkin)
            let checkout = new Date(tgl_checkout)
            
            // tgl_checkout - tgl_checkin
            let diff_date_time = checkout.getTime() - checkin.getTime()
            // mengubah data dari date by time ke date by days
            // diff_date_day = diff_date_time / (100 * 36000 * 24)
            let diff_date_days = diff_date_time / (1000 * 3600 * 24)

            // memasukan diff_date_days dalam value id "lm_menginap" 
            document.getElementById("lm_menginap").value = diff_date_days
        }
        function CekHarga() {
            // (lama nginap*jml kamar sewa*harga)  
            let lama_menginap = document.getElementById('lm_menginap').value
            let jml_kamar = document.getElementById('jml_kamar').value
            let harga = document.getElementById('hrg_sewa').value
            // total kalkulasi
            let total = lama_menginap * jml_kamar * harga
            // memasukan total dalam value id "total_bayar" 
            document.getElementById('total_bayar').value = total
        }
    </script>

</body>
</html>