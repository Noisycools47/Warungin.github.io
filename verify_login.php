<?php 

session_start();
$koneksi = mysqli_connect('localhost', 'root', '', 'warungin');

$name = $_POST['user'];
$password = $_POST['password'];

$query = "SELECT * FROM tabel_user WHERE nama='$name' and password='$password'";
$result = mysqli_query($koneksi, $query);
$num = mysqli_num_rows($result);

$tabel_user = mysqli_fetch_assoc($query);

if ($num > 0){
    header("location:index.php");
} else {
    header("location:login.php");
}

if (empty($_POST['user']) ||
    empty($_POST['password'])
    ) {
        // pesan : isi data dulu
        //die('isi kolom dulu');
    }
?>