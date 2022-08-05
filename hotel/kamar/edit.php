<?php
include_once('../conn.php');
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM data_hotel WHERE id = $id");
while($data = mysqli_fetch_array($result)){
    $id = $data['id'];
    $kd_kamar = $data['kd_kamar'];
    $nm_kamar = $data['nm_kamar'];
    $jns_kamar = $data['jns_kamar'];
    $kps_kamar = $data['kps_kamar'];
    $lok_kamar = $data['lok_kamar'];
    $fas_kamar = $data['fas_kamar'];
    $jml_kamar = $data['jml_kamar'];
    $hrg_sewa = $data['hrg_sewa'];
}
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
            <form name="update" action="./update.php" method="post">
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
                                    <input type="text" name="kd_kamar" value="<?= $kd_kamar ?>">
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h5>Nama Kamar</h5>
                                </th>
                                <td>
                                    <input type="text" name="nm_kamar" value="<?= $nm_kamar ?>">
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h5>Jenis Kamar</h5>
                                </th>
                                <td>
                                    <input type="text" name="jns_kamar" value="<?= $jns_kamar ?>">
                                </td>
                            </tr>
                           
                            <tr>
                                <th>
                                    <h5>Kapasitas Kamar (org)</h5>
                                </th>
                                <td>
                                    <input type="number" name="kapasitas" value="<?= $kps_kamar ?>">
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h5>Lokasi Kamar</h5>
                                </th>
                                <td>
                                    <input type="text" name="lok_kamar" value="<?= $lok_kamar ?>">
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h5>Fasilitas</h5>
                                </th>
                                <td>
                                    <textarea name="fasilitas" id="fasilitas" cols="30" rows="10"><?= $fas_kamar ?></textarea>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h5>Jumlah Kamar</h5>
                                </th>
                                <td>
                                    <input type="number" name="jum_kamar" value="<?= $jml_kamar ?>">
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h5>Harga Sewa/hari (Rp)</h5>
                                </th>
                                <td>
                                    <input type="number" name="sewa" value="<?php echo $hrg_sewa ?>">
                                </td>
                            </tr>

                        </table>

                    </td>
                </tr>
                <tr>
                    <td>
                        <center>
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <button type="submit">submit</button>
                            <button type="reset">batal</button>
                        </center>
                    </td>
                </tr>
            </form>
        </table>
    </center>
</body>
</html>