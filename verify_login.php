<?php 

session_start();

$koneksi = mysqli_connect('localhost', 'root', '', 'warungin');

$name = $_POST['user'];
$password = $_POST['password'];

$sql = "SELECT * FROM tabel_user WHERE nama='$name' && password='$password ";

$result = mysqli_query($koneksi, $sql);
$num_of_rows = mysqli_num_rows($result);

// Jika username sudah terpakai
if ($num_of_rows == 1){
    $_SESSION['user'] = $name;
    header('location:index.php');
} else {
    header('location:login.php');
}


?>