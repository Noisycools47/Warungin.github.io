<?php 

session_start();
$koneksi = mysqli_connect('localhost', 'root', '', 'warungin');

$name = $_POST['user'];
$password = $_POST['password'];

$query = "SELECT * FROM tabel_user WHERE nama='$name' and password='$password'";
$result = mysqli_query($koneksi, $query);
$num = mysqli_num_rows($result);

$tabel_user = mysqli_fetch_assoc($query);

if (empty($_POST['user'])) {
    header("location:login.php?error=Username Masih Kosong!");
} else if (empty($_POST['password'])){
    header("location:login.php?error=Password Masih Kosong!");
} else {
    //$password = md5($password);
    if ($num > 0){
        $_SESSION['user'] = $row['nama'];
        $_SESSION['email'] = $row['email'];
        header("Location:index.php");
        exit();
    } else {
        header("location:login.php?error=Username atau Password Salah!");
    }
}

?>