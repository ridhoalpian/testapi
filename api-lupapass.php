<?php
include 'koneksi.php';

$username = $_GET['username'];
$security = $_GET['security'];

$cek = "SELECT * FROM user WHERE username = '$username' AND security = '$security'";
$msql = mysqli_query($koneksi, $cek);
$result = mysqli_num_rows($msql);
if(!empty($username)&&!empty($security)){
    if($result == 0){
        echo"Akun Tidak Ditemukan";
    }else{
        echo "Tolong Masukkan Password Baru";
    }
}else{
    echo "Ada data yang masih kosong";
}
?>