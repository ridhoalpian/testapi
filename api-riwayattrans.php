<?php
include 'koneksi.php';

// Periksa apakah parameter id_user dan ket ada dalam URL
if (isset($_GET['id_user']) && isset($_GET['ket'])) {
    $id_user = $_GET['id_user'];
    $ket = $_GET['ket'];

    // Ubah kueri untuk mendapatkan data dari tabel pesanan, detail_pesanan, dan kue
    $query = "SELECT p.id_user, p.total_harga, p.ket, dp.jumlah_pesan, dp.id_kue, k.nama_kue, k.gambar, k.satuan 
              FROM pesanan p 
              INNER JOIN detail_pesanan dp ON p.id_pesanan = dp.id_pesanan 
              INNER JOIN kue k ON k.id_kue = dp.id_kue 
              WHERE p.id_user = '$id_user' AND p.ket = '$ket'";
} else {
    // Jika tidak ada parameter id_user dan ket, kembalikan pesan kesalahan
    echo json_encode(array('error' => 'Parameter id_user dan ket diperlukan'));
    exit;
}

$result = mysqli_query($koneksi, $query);

if (!$result) {
    echo json_encode(array('error' => 'Gagal mengambil data pesanan'));
} else {
    $data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        // Mengonversi data blob ke dalam format base64 agar dapat disertakan dalam JSON
        $row['gambar'] = base64_encode($row['gambar']);
        $data[] = $row;
    }

    echo json_encode($data);
}
?>
