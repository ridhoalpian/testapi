<?php
include 'koneksi.php';

$username = isset($_POST['username']) ? $_POST['username'] : null;
$newPassword = isset($_POST['password']) ? $_POST['password'] : null;

$cek = "SELECT * FROM user WHERE username = '$username'";
$msql = mysqli_query($koneksi, $cek);
$result = mysqli_num_rows($msql);

if (!empty($username)) {
    if ($result == 0) {
        echo "Akun Tidak Ditemukan";
    } else {
        $updatePasswordQuery = "UPDATE user SET password = '$newPassword' WHERE username = '$username'";
        $updatePasswordResult = mysqli_query($koneksi, $updatePasswordQuery);

        if ($updatePasswordResult) {
            echo "Password berhasil diubah";
        } else {
            echo "Gagal mengubah password";
        }
    }
} else {
    echo "Username tidak ditemukan";
}
?>