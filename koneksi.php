<?php

$hostName = "localhost";
$userName = "root";
$password = "";
$dbName = "db_catering";

$koneksi = mysqli_connect($hostName, $userName, $password, $dbName);
if(! $koneksi){
    echo "koneksi gagal";
}
?>