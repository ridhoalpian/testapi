<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pastikan data yang diterima adalah metode POST
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat_lengkap'];

    // Perbarui data pengguna berdasarkan username
    $updateQuery = "UPDATE user SET nama = '$nama', telp = '$telp', alamat_lengkap = '$alamat' WHERE username = '$username'";
    $updateResult = mysqli_query($koneksi, $updateQuery);

    if ($updateResult) {
        // Jika berhasil memperbarui data, kirim respons sukses
        echo json_encode(array("status" => "success", "message" => "Data berhasil diperbarui"));
    } else {
        // Jika gagal memperbarui data, kirim respons error
        echo json_encode(array("status" => "error", "message" => "Gagal memperbarui data"));
    }
} else {
    // Jika bukan metode POST, kirim respons error
    echo json_encode(array("status" => "error", "message" => "Metode tidak diizinkan"));
}
?>