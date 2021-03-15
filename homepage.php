
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
                echo '<script>window.location="index.php"</script>';
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="ind">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsive.css">
</head>
<body>

    <!-- Awal Navbar -->
    <div class="navbar">
        <img src="img/WarungIn.png" alt="">
        <ul class="nav">
            <li><a href="#home">Home</a></li>
            <li><a href="#product">Product</a></li>
            <li>Contact Us</li>
            <li>WarungKu</li>
        </ul>
        <div class="user">
           <!-- ==================== -->
           <span><a class="a" href="logout.php">Logout</a></span>
            <!-- ==================== -->
        </div>
        <span class="check">
            <div class="hamburger"></div>
        </span>
    </div>
    <!-- Akhir Navbar -->
    
    <div class="container">
        <div class="jumbotron" id="home">
            <div class="jumboText">
                <h1>WarungIn</h1>
                <p>Pengen nyetok warung jadi lebih praktis dan terorganisir ?<br>
                    Males keluar Rumah untuk belanja stok di warung ?
                </p>
                <div class="continue">
                    <p>Coba WarungIn Aja Dengan</p>
                    <span class="sosmed"><img src="img/google.png" alt=""> With Google</span>
                    <span class="garus">|</span>
                    <span class="sosmed fb"><img src="img/fb.png" alt=""> With Facebook</span>
                </div>
            </div>
            <div class="img">
                <img src="img/jumbotron.png" alt="">
                <img class="jumbo2" src="img/jumbotron2.png" alt="">
            </div>
        </div>
        <div class="searchBox" id="product">
            <input class="searchInput" type="text" placeholder="Search">
            <span class="search">Lokasi</span>
            <span class="search">Radius</span>
        </div>
        <div class="product">
            <div class="prod">
                <h1>Best Seller</h1>

                <!-- IMPOSTOR -->
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
                    <td><a href="index.php?action=delete&id=<?php echo $values['item_id']; ?>">Hapus</a></td>
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
                <!-- IMPOSTOR -->
                <span>Lihat Semua</span>
                <div class="slider"><img src="img/slider.png" alt=""></div>
                <div class="items">
                    <?php 

                    $sql = "SELECT * FROM tabel_barang ORDER BY barang_id ASC";
                    $result = mysqli_query($koneksi, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)){
                    ?>
                            <form method="post" action="daftar_belanja.php?action=add&id=<?php echo $row['barang_id']; ?>">
                                <div id="item" class="item"><img src="<?php echo $row['foto_barang']; ?>" >
                                    <p><?php echo $row['nama_barang']; ?></p>
                                    <span>
                                        <?php echo $row['pemilik_barang']; ?> <br>
                                        Rp. <?php echo $row['harga_barang'].' /'.$row['satuan_barang']; ?> <br>
                                        Jl. Kebon Jeruk
                                    </span>
                                    <input type="text" name="jumlah" value="1">
                                    <input type="submit" name="add_to_cart" value="Tambahkan Ke Daftar Belanja">
                                    <input type="hidden" name="hidden_name" value="<?php echo $row['nama_barang']; ?>">
                                    <input type="hidden" name="hidden_price" value="<?php echo $row['harga_barang']; ?>">
                                </div>
                            </form>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <img src="img/WarungIn.png" alt="">
        <ul>
            <li><a href="">Kerja Sama</a></li>
            <li><a href="">About</a></li>
            <li><a href="">Contact Us</a></li>
        </ul>
    </footer>

    <script src="script.js"></script>
</body>
</html>
