<?php
include 'koneksi.php';

$username = $_GET['username'];
$password = $_GET['password'];

$cek = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
$msql = mysqli_query($koneksi, $cek);
$result = mysqli_num_rows($msql);
if(!empty($username)&&!empty($password)){
    if($result == 0){
        echo"Password Tidak Sesuai";
    }else{
        echo "Tolong Masukkan Password Baru";
    }
}else{
    echo "Ada data yang masih kosong";
}
?>