<?php 

session_start();
header('location: daftar.php');

$koneksi = mysqli_connect('localhost', 'root', '', 'warungin');

$name = $_POST['user'];
$password = $_POST['password'];

$sql = "SELECT * FROM tabel_user WHERE nama='$name'";

$result = mysqli_query($koneksi, $sql);
$num_of_rows = mysqli_num_rows($result);

// Jika username sudah terpakai
if ($num_of_rows == 1){
    echo "Username Has Already Taken!";
} /* Masukkan data user ke dalam tabel */ else {
    $register = "INSERT INTO tabel_user(nama, password) VALUES('$name', '$password')";
    mysqli_query($koneksi, $register);
    echo "daftar berhasil";
}


?>