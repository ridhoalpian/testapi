<?php
include 'koneksi.php';

// Ubah kueri untuk mendapatkan data dari tabel kue
$query = "SELECT nama_kue, kategori FROM kue";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    echo "Gagal mengambil data kue";
} else {
    $data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    echo json_encode($data);
}
?>