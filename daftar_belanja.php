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

if (isset($_POST['add_to_cart'])){
    if (isset($_SESSION['daftar_belanja'])){
        $barang_array_id = array_column($_SESSION['daftar_belanja'], "item_id");
        if (!in_array($_GET['id'], $barang_array_id)){
            $count = count($_SESSION['daftar_belanja']);
            $barang_array = array (
                'item_id'     => $_GET['id'],
                'nama_barang'   => $_POST['hidden_name'],
                'harga_barang'  => $_POST['hidden_price'],
                'jumlah_barang' => $_POST['jumlah']
            );
            $_SESSION['daftar_belanja'][$count] = $barang_array;
        } else {
            echo '<script>alert("Barang Sudah Ada Di Daftar Belanja!")</script>';
            echo '<script>window.location="index.php"</script>';
        }
    } else {
        $barang_array = array (
            'item_id'     => $_GET['id'],
            'nama_barang'   => $_POST['hidden_name'],
            'harga_barang'  => $_POST['hidden_price'],
            'jumlah_barang' => $_POST['jumlah']
        );
        $_SESSION['daftar_belanja'][0] = $barang_array;
    }
}

if (isset($_GET['action'])){
    if ($_GET['action'] == "delete"){
        foreach ($_SESSION['daftar_belanja'] as $keys => $values){
            if ($values["item_id"] == $_GET['id']){
                unset($_SESSION['daftar_belanja'][$keys]);
                echo '<script>alert("Barang Dihapus dari Daftar Belanja!")</script>';
                echo '<script>window.location="daftar_belanja.php"</script>';
            }
        }
    }
}

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
    <?php 
    if (!empty($_SESSION['daftar_belanja'])){
        $total = 0;
        foreach($_SESSION['daftar_belanja'] as $keys => $values){
    ?>
    <tr>
        <td><?php echo $values['nama_barang']; ?></td>
        <td><?php echo $values['jumlah_barang']; ?></td>
        <td><?php echo $values['harga_barang']; ?></td>
        <td><?php echo number_format($values["jumlah_barang"] * $values['harga_barang'], 2); ?></td>
        <td><a href="daftar_belanja.php?action=delete&id=<?php echo $values['item_id']; ?>">Hapus</a></td>
    </tr>
    <?php
        $total += ($values["jumlah_barang"] * $values['harga_barang']);
    ?>
    <?php
        } ?>
    <?php 
    if (isset($_GET['action'])){
        if ($_GET['action'] == "cek"){
        ?>
            <tr>
            <td>Total</td>
            <td colspan="3">Rp. <?php echo number_format($total, 2); ?></td>
            <td></td>
            </tr>
        <?php
        }
    }
    ?>
    <?php
    }
    ?>
    </table>
    <form action="daftar_belanja.php?action=cek" method="post">
        <input style="color: black;" type="submit" name="cek_total" value="Cek Total">
    </form>
</body>
</html>