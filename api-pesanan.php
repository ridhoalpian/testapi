<?php
include 'koneksi.php';

// Mendapatkan data dari request
$id_pesanan = $_POST['id_pesanan'];
$id_user = $_POST['id_user'];
$total_harga = $_POST['total_harga'];
$pesan = $_POST['pesan'];
$tgl_pesan = $_POST['tgl_pesan'];
$tgl_terima = $_POST['tgl_terima'];

// Data untuk detail_pesanan
$id_detailpesanan = $_POST['id_detailpesanan'];
$id_kue = $_POST['id_kue'];
$jumlah_pesan = $_POST['jumlah_pesan'];
$harga = $_POST['harga'];

// Mengecek apakah bukti ada dalam request
if (isset($_POST['bukti'])) {
    $bukti = $_POST['bukti'];
} else {
    $bukti = null;
}

// Memastikan data tidak kosong
if (!empty($id_user) && !empty($total_harga) && !empty($tgl_pesan) && !empty($tgl_terima) && !empty($pesan) && !empty($id_detailpesanan) && !empty($id_kue) && !empty($jumlah_pesan) && !empty($harga)) {

    // Query untuk memasukkan data ke dalam tabel pesanan
    $insertPesananQuery = "INSERT INTO pesanan (id_pesanan, id_user, total_harga, tgl_pesan, tgl_terima, bukti, pesan) VALUES ('$id_pesanan', '$id_user', '$total_harga', '$tgl_pesan', '$tgl_terima', '$bukti', '$pesan')";

    // Eksekusi query pesanan
    $resultPesanan = mysqli_query($koneksi, $insertPesananQuery);

    // Query untuk memasukkan data ke dalam tabel detail_pesanan
    $insertDetailPesananQuery = "INSERT INTO detail_pesanan (id_detailpesanan, id_kue, jumlah_pesan, harga, id_pesanan) VALUES ('$id_detailpesanan', '$id_kue', '$jumlah_pesan', '$harga', '$id_pesanan')";

    // Eksekusi query detail_pesanan
    $resultDetailPesanan = mysqli_query($koneksi, $insertDetailPesananQuery);

    // Mengecek apakah kedua query berhasil dieksekusi
    if ($resultPesanan && $resultDetailPesanan) {
        echo "Pesanan berhasil dibuat!";
    } else {
        echo "Gagal memasukkan data atau ada kesalahan";
        echo mysqli_error($koneksi);
    }
} else {
    echo "Semua data harus diisi";
}
?>