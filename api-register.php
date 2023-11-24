<?php
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
$kecamatan = $_POST['kecamatan'];
$alamat = $_POST['alamat_lengkap'];
$nama = $_POST['nama'];
$telp = $_POST['telp'];
$security = $_POST['security'];

$queryRegister = "SELECT * FROM user WHERE username = '".$username."'";

$msql = mysqli_query($koneksi,$queryRegister);

$result = mysqli_num_rows($msql);

if(!empty ($username) && !empty($password) && !empty($kecamatan) && !empty($alamat) && !empty($nama) && !empty($telp) && !empty($security)){
if($result == 0){
    $regis = "INSERT INTO user (username, password, kecamatan, alamat_lengkap, nama, telp, security) VALUES ('$username', '$password', '$kecamatan', '$alamat', '$nama', '$telp', '$security')";
    $msqlRegis = mysqli_query($koneksi,$regis);
    echo "Daftar Berhasil";
}else{
    echo "Username Sudah Digunakan";
}
}else{
    echo "Semua data harus diisi";

}
?>