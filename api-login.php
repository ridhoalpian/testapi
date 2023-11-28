<?php
include 'koneksi.php';

$username = $_GET['username'];
$password = $_GET['password'];

$cek = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
$msql = mysqli_query($koneksi, $cek);
$result = mysqli_num_rows($msql);

if (!empty($username) && !empty($password)) {
    if ($result > 0) {
        // Pengguna ditemukan, kembalikan data pengguna
        $userData = mysqli_fetch_assoc($msql);
        echo json_encode($userData);
    } else {
        echo "0"; // Username atau password salah
    }
} else {
    echo "Ada data yang masih kosong";
}
?>