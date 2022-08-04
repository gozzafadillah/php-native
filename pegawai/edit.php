<?php 
include_once("./conn.php");
if (isset($_POST["update"])){
    $id = $_POST['id'];
    $kd_peg = $_POST['kd_pegawai'];
    $nm_peg = $_POST['nm_pegawai'];
    $tgl = $_POST['tgl_lahir'];
    $kel = $_POST['jns_kel'];
    $agm = $_POST['agm'];
    $gol = $_POST['gol'];
    $jbtn = $_POST['jbt_peg'];
    $almt = $_POST['almt_peg'];
    $telp = $_POST['telp'];
    
    $result = mysqli_query($conn, "UPDATE tbl_data_pegawai SET kd_peg='$kd_peg',nm_peg='$nm_peg', tgl_lahir='$tgl',jns_klm='$kel',agm='$agm',gol='$gol',jbtn='$jbtn',almt='$almt',no_tlp='$telp' WHERE id=$id");
    
    header("location:index.php");
}
?>
<?php
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM tbl_data_pegawai WHERE id = $id");
    while($peg = mysqli_fetch_array($result)){
            $kode    = $peg['kd_peg'];
            $nama = $peg['nm_peg'];
            $tgl_lahir = $peg['tgl_lahir'];
            $jns_kel = $peg['jns_klm'];
            $agm = $peg['agm'];
            $gol = $peg['gol'];
            $jbtn = $peg['jbtn'];
            $alamat = $peg['almt'];
            $telp = $peg['no_tlp'];
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
    <table border="1">
        <form name="update" action="edit.php" method="post">
            <tr>
                <td>
                    <h2 style="text-align:center; margin:0;" id="judul">Input Data Pegawai</h2>   
                </td>
            </tr>
            <tr>
                <td>
                        <table>
                            <tr>
                                <td><input type="hidden" name="id" value="<?= $_GET['id']; ?>"></td>
                            </tr>

                            <tr>
                                <th>
                                    <h5>kode pegawai</h5>
                                </th>
                                <td>
                                    <input type="text" name="kd_pegawai" value="<?= $kode ?>">
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h5>nama pegawai</h5>
                                </th>
                                <td>
                                    <input type="text" name="nm_pegawai" value="<?= $nama ?>">
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h5>tanggal lahir</h5>
                                </th>
                                <td>
                                    <input type="date" name="tgl_lahir" value="<?= $tgl_lahir ?>">
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h5>jenis kelamin</h5>
                                </th>
                                <td>
                                    <input type="text" name="jns_kel" value="<?= $jns_kel ?>">
                                </td>
                            </tr>
                           
                            <tr>
                                <th>
                                    <h5>agama</h5>
                                </th>
                                <td>
                                    <input type="text" name="agm" value="<?= $agm ?>">
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h5>golongan</h5>
                                </th>
                                <td>
                                    <input type="text" name="gol" value="<?= $gol ?>">
                                </td>
                            </tr>


                            <tr>
                                <th>
                                    <h5>jabatan pegawai</h5>
                                </th>
                                <td>
                                    <input type="text" name="jbt_peg" value="<?= $jbtn ?>">
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h5>alamat pegawai</h5>
                                </th>
                                <td>
                                    <input type="text" name="almt_peg" value="<?= $alamat ?>">
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h5>telepon</h5>
                                </th>
                                <td>
                                    <input type="text" name="telp" value="<?= $telp ?>">
                                </td>
                            </tr>

                        </table>

                    </td>
                </tr>
                <tr>
                    <td>
                        <center>
                            <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
                            <button type="submit" name="update">submit</button>
                            <button type="reset">batal</button>
                        </center>
                    </td>
                </tr>
            </form>
        </table>
    </center>
</body>
</html>