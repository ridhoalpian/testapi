<?php
include 'koneksi.php';

$username = $_GET['username'];

$cek = "SELECT * FROM user WHERE username = '$username'";
$msql = mysqli_query($koneksi, $cek);
$result = mysqli_num_rows($msql);

if (!empty($username)) {
    if ($result == 0) {
        echo "Akun Tidak Ditemukan";
    } else {
        $data = mysqli_fetch_assoc($msql);

        echo json_encode($data);
    }
} else {
    echo "Ada data yang masih kosong";
}