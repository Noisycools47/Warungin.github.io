<!-- ==================== -->
<?php 

session_start();
if (!isset($_SESSION['user'])){
    header("Location: login.php");
}

?>
<!-- ==================== -->

<?php 

$koneksi = mysqli_connect('localhost', 'root', '', 'warungin');



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <table border="1">
    <tr>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th>Total</th>
        <th></th>
    </tr>

    <tr>
        <?php 
            $nama = $_SESSION['nama_barang'];
            $showData = "SELECT * FROM daftar_belanja WHERE nama_barang='$nama'";
            $result1 = mysqli_query($koneksi, $showData);

            $row = mysqli_fetch_assoc($result1);
            $nama_barang = $row['nama_barang'];
            $harga_barang = $row['harga_barang'];
            $qty = $row['qty'];
        ?>
        <td><?php echo $row['nama_barang'] ?></td>
        <td><?php echo $qty ?></td>
        <td><?php echo $harga_barang ?></td>
        <td> tes<?php //echo number_format($row[0] * $row[2], 2); ?></td>
        <td><a href="daftar_belanja.php?action=delete&id=<?php echo $values['item_id']; ?>">Hapus</a></td>
    </tr>

    <tr>
        <td>Total</td>
        <td colspan="3">Rp. tes<?php //echo number_format($total, 2); ?></td>
        <td></td>
    </tr>
    </table>
    <form action="daftar_belanja.php?action=cek" method="post">
        <input style="color: black;" type="submit" name="cek_total" value="Cek Total">
    </form>
</body>
</html>